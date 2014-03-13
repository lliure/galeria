<?php
/**
*
* Galeria | lliure 4.10
*
* @Versão 4.0
* @Desenvolvedor Jeison Frasson <jomadee@lliure.com.br>
* @Colaborador Rodrigo Dechen <rodrigo@grapestudio.com.br>
* @Entre em contato com o desenvolvedor <jomadee@lliure.com.br> http://www.newsmade.com.br/
* @Licença http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

//echo '<pre>' . print_r($_GET, true) . '</pre>';
//echo '<pre>' . print_r($_ll, true) . '</pre>';

if (isset($_GET['video'])){

	$concluido = false;

	$_GET['video'] = urldecode($_GET['video']);
	$_GET['video'] = explode('?', $_GET['video']);
	if (count($_GET['video']) > 1)
		$_GET['video'] = explode('&', $_GET['video'][1]);
	foreach($_GET['video'] as $chave => $valor){
		$partes = explode('=', $valor);
		if (count($partes) > 1)
			$dados[$partes[0]] = $partes[1];
	}
	$_GET['video'] = isset($dados)? $dados: array('v' => $_GET['video'][0]);
	
	$totao = 0;
	$xml = @file_get_contents('http://gdata.youtube.com/feeds/api/videos?q='.$_GET['video']['v']);
	if ($xml != null){
		$quem = '<openSearch:totalResults>';
		$mais = strlen($quem);
		$totao = substr($xml, strpos($xml, $quem) + $mais, 1);
	}

	if (isset($_GET['video']['v']) and $totao == 1)
		$concluido = true;
	else
		$_GET['alerta'] = 'Video não encontrado!';
	
	//echo '<pre>' . $totao . '</pre>';
	//echo '<pre>' . print_r($_GET, true) . '</pre>';

	if ($concluido == true){
		
		$insert['galeria'] = $_GET['album'];
		$insert['video'] = $_GET['video']['v'];
		if ($erro = jf_insert($pluginTable.'_videos', $insert))
			echo $erro;
			
		$idVideos = $jf_ultimo_id;

		$sql = '
			SELECT
				a.capa
			FROM
				' . $pluginTable . ' a

			WHERE
				a.id = "' . $_GET['album'] . '"
		';
		
		//echo '<pre>' . $sql . '</pre>'; 

		$capa = mysql_fetch_assoc(mysql_query($sql));
		
		if ($capa['capa'] == null){
			$update['capa'] = $idVideos;
			$id['id'] = $_GET['album'];
			if ($erro = jf_update($pluginTable, $update, $id))
				echo $erro;
		}
	}
}

$sql = '
	SELECT
		a.id, a.video, if(a.id = b.capa, 1, 0) as capa
	FROM
		' . $pluginTable . '_videos a
		
		LEFT JOIN
			' . $pluginTable . ' b
		ON
			b.id = a.galeria
	
	WHERE
		a.galeria = "' . $_GET['album'] . '"
';

$videos = mysql_query($sql);

if (mysql_num_rows($videos) > 0){

	while($video = mysql_fetch_assoc($videos)){?>

		<div class="galdiv<?php echo $video['capa']? ' capa':'';?>" id="div_<?php echo $video['id']?>">
		
			<div class="divblock">
				<a class="trash" href="<?php echo 'onserver.php'.$pluginHome.'&p=videoacoes&ac=apagar&id='.$video['id']?>" title="Apagar Video">
					<img src="<?php echo $_ll['app']['pasta'] ?>img/delete.png" alt="apagar" />
				</a>
				<a class="favorite" href="<?php echo 'onserver.php'.$pluginHome.'&p=videoacoes&ac=capa&id='.$video['id']?>" title="Marcar como principal">
					<img src="<?php echo $_ll['app']['pasta'] ?>img/star_fav.png" alt="Marcar capa" />
				</a>	
			</div>
			
			<img class="img" src="http://i3.ytimg.com/vi/<?php echo $video['video']?>/default.jpg " />
			
		</div>
		
		<?php

	}

}else{?>
	<div class="mensagem"><span>Nenhum Vídeo encontrado</span></div>
	<?php
}?>

<script type="text/javascript">
	$('.galdiv').bind({
		mouseenter :function(){
			($(this).children('.divblock')).show();
		},
		mouseleave :function(){
			($(this).children('.divblock')).fadeOut(150);
		}
	});
	$('div.galdiv div.divblock a').click(function(){
		$('.videos').load($(this).attr('href'));
		return false;
	});
	<?php
	if (isset($_GET['alerta'])){?>
		jfAlert('<?php echo $_GET['alerta']; ?>');
		<?php
	}?>
</script>
