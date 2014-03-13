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

if (isset($_GET['ac'])){

	if ($_GET['ac'] = 'gal' and !isset($_GET['gal'])){

		$insert['nome'] = 'Nova galeria';
		$insert['tipo'] = '1';
		$insert['data'] = time();

		if ($erro = jf_insert($pluginTable, $insert))
			echo $erro;

	} elseif ($_GET['ac'] = 'abu' and isset($_GET['gal'])) {

		$insert['nome'] = 'Novo album de '.$_GET['tipo'].'s';
		$insert['tipo'] = $_GET['tipo'] == 'foto'? '0':'2';
		$insert['galeria'] = $_GET['gal'];
		$insert['data'] = time();

		if ($erro = jf_insert($pluginTable, $insert))
			echo $erro;
	
	}

}
