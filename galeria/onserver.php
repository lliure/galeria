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

require_once('config.php');

//echo '<pre>' . print_r($_GET, true) . '</pre>';

switch(isset($_GET['p'])?$_GET['p']:null){

	case 'new':

		require_once('new.php');

	break;

	case 'step':

		require_once('step.php');

	break;

	case 'video':

		require_once('video.php');

	break;

	case 'videoacoes':

		require_once('videoacoes.php');

	break;

}

?>
