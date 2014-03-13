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
$opt = array_keys($_GET);

switch($opt[2]){

	case 'album':
	
		$id = $_GET['album'];
		
		$retorno = isset($_POST['salvar'])? 'salvar': 'salvar-edit';
		unset($_POST['salvar'], $_POST['salvar-edit'], $_POST['video']);
		
		jf_update($pluginTable, $_POST, array('id' => $id));
		
		$_SESSION['aviso'] = array('Álbum alterado com sucesso!', 1);
		
		switch ($retorno){
			case 'salvar':
				$retorno = 'index.php'.$pluginHome.(!empty($_GET['gal'])?'&gal='.$_GET['gal']:'');
			break;
			
			case 'salvar-edit':
				$retorno = 'index.php'.$pluginHome.'&acoes=editar&id='.$id;
			break;		
		}
		
		header('location: '.$retorno);
		
	break;
	
	default:
		header('location index.php'.$pluginHome);
}

?>
