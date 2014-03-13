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

$sql = '
	SELECT
		a.id, a.video, if(a.id = b.capa, 1, 0) as capa, b.id as album
	FROM
		' . $pluginTable . '_videos a

		LEFT JOIN
			' . $pluginTable . ' b
		ON
			b.id = a.galeria

	WHERE
		a.id = "' . $_GET['id'] . '"
	LIMIT
		1

';

$dados = mysql_fetch_assoc(mysql_query($sql));

switch(isset($_GET['ac'])?$_GET['ac']:null){

	case 'apagar':

		$delete['id'] = $dados['id'];

		if ($erro = jf_delete($pluginTable . '_videos', $delete))
			echo $erro;
	
		if ($dados['capa'] == 1){
		
			$sql = '
				SELECT
					a.id
				FROM
					' . $pluginTable . '_videos a

				WHERE
					a.galeria = "' . $dados['album'] . '"

				ORDER BY
					rand()

				LIMIT
					1
			';

			$novo = mysql_fetch_assoc(mysql_query($sql));

			$update['capa'] = $novo['id'];
			$id['id'] = $dados['album'];

			if ($erro = jf_update($pluginTable, $update, $id))
				echo $erro;

		}

		//$frase = 'Video apagado!';
	
	break;

	case 'capa':

		$update['capa'] = $dados['id'];
		$id['id'] = $dados['album'];
		
		if ($erro = jf_update($pluginTable, $update, $id))
			echo $erro;

		//$frase = 'Video principal modificado!';
	
	break;

}

header('Location: onserver.php' . $pluginHome. '&p=video&album=' . $dados['album'] . (isset($frase)? '&alerta=' . $frase: ''));

?>
