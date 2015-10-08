<?php
/**
*
* Galeria
*
* @Versão 5.0
* @Desenvolvedor Jeison Frasson <jomadee@lliure.com.br>
* @Colaborador Rodrigo Dechen <rodrigo@grapestudio.com.br>
* @Entre em contato com o desenvolvedor <jomadee@lliure.com.br> http://www.newsmade.com.br/
* @Licença http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

//echo '<pre>' . print_r($_ll, true) . '</pre>';

require_once('config.php');

if(isset($_GET['gal'])){
	$filtro = " where galeria = '".$_GET['gal']."'";
	$linkGal = $_GET['gal'];
} else {
	$filtro = " where galeria is NULL";
	$linkGal = '';
}

/**** barra superior */
$botoes[] = array('href' => $backReal, 'fa' => 'fa-chevron-left', 'title' => $backNome);
	
if(!isset($_GET['id'])){
	if(!isset($_GET['gal'])){
		$botoes[] = array(
			'href' => 'onserver.php'.$pluginHome.'&p=new&ac=gal',
			'fa' => 'fa-folder',
			'title' => 'Criar galeria',
			'attr' => 'class="criar"'
		);
	} else {
		$botoes[] = array(
			'href' => 'onserver.php'.$pluginHome.'&p=new&ac=abu&tipo=foto&gal='.$linkGal,
			'fa' => 'fa-picture-o',
			'title' => 'Criar álbum de Fotos',
			'attr' => 'class="criar"'
		);
		$botoes[] = array(
			'href' => 'onserver.php'.$pluginHome.'&p=new&ac=abu&tipo=video&gal='.$linkGal,
			'fa' => 'fa-youtube',
			'title' => 'Criar álbum de Videos',
			'attr' => 'class="criar"'
		);
	}

}
echo app_bar('Galeria de fotos', $botoes);
/*****/

?>
<script type="text/javascript">
	$().ready(function() {
		$('.criar').click(function(){		
			ll_load($(this).attr('href'), function(){
				navigi_start();
			});
			
			return false;
		});
	});
</script>
<?php

if(isset($_GET['acoes'])){
	$gAcoes = $_GET['acoes'];
	switch($gAcoes){
		case 'editar':
			require_once('editar.php');
		break;
		
		case 'rfotos':
			require_once('api/refotos.php');
		break;
	}	
} else {
	require_once('home.php');
}
?>
