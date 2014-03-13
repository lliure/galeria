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
$botoes[] = array('href' => $backReal, 'img' => $_ll['tema']['icones'].'br_prev.png', 'title' => $backNome);
	
if(!isset($_GET['id'])){
	if(!isset($_GET['gal'])){
		$botoes[] = array(
			'href' => 'onserver.php'.$pluginHome.'&p=new&ac=gal',
			'img' => $_ll['tema']['icones'].'folder.png',
			'title' => 'Criar galeria',
			'attr' => 'class="criar"'
		);
	} else {
		$botoes[] = array(
			'href' => 'onserver.php'.$pluginHome.'&p=new&ac=abu&tipo=foto&gal='.$linkGal,
			'img' => $_ll['tema']['icones'].'picture.png',
			'title' => 'Criar álbum de Fotos',
			'attr' => 'class="criar"'
		);
		$botoes[] = array(
			'href' => 'onserver.php'.$pluginHome.'&p=new&ac=abu&tipo=video&gal='.$linkGal,
			'img' => $_ll['tema']['icones'].'movie.png',
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
		$('.criar').jfbox({abreBox: false},function(){
			navigi_start();
		});
	});
</script>
<?php

if(isset($_GET['acoes'])){
	$gAcoes = $_GET['acoes'];
	switch($gAcoes){
		case 'editar':
			require_once('edit.php');
		break;
		
		case 'rfotos':
			require_once('api/refotos.php');
		break;
	}	
} else {
	require_once('home.php');
}
?>
