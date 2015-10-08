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

$consulta = 'select * from '.$pluginTable.' where id = "'.$_GET['id'].'"';
$dados = mysql_fetch_array(mysql_query($consulta));

?>
<div class="boxCenter">
	<form method="post" class="form" action="<?php echo 'onserver.php'.$pluginHome.'&p=step&album='.$dados['id'].'&gal='.$dados['galeria']?>" id="formula" enctype="multipart/form-data">
		<fieldset>
			<div>
				<table>
					<tr>
						<td>
							<label>Título</label>
							<input type="text" value="<?php echo (isset($dados['nome'])?$dados['nome']:'')?>" name="nome" />
							<span class="ex">Este é o titulo que da sua Galeria. <strong>Campo obrigatório</strong></span>
						</td>
						<td style="width: 100px">
							<label>Data</label>
							<input type="text" class="data" value="<?php echo (isset($dados['data'])? date('d/m/Y', $dados['data']) : '' ); ?>" name="data" />
						</td>
					</tr>
				</table>
			</div>
		</fieldset>
		
		<?php
		
		if ($dados['tipo'] == 0){?>

			<fieldset>			
	
					<?php
					
					$galeriaAPI['tabela'] = "galeria";
					$galeriaAPI['ligacaoCampo'] = 'album';
					$galeriaAPI['ligacaoId'] = $_GET['id'];
					
					$galeriaAPI['dir'] = "../uploads/galeria";
					
					$galeriaAPI['capaCampo'] = "capa";
					$galeriaAPI['capaFoto'] = (!empty($dados[$galeriaAPI['capaCampo']])?$dados[$galeriaAPI['capaCampo']]:"");
					
					require_once('api/fotos/index.php');
					?>	
			</fieldset>
		
			<?php
		}elseif ($dados['tipo'] == 2){?>

			<fieldset>
				<div>
					<label>Link do vídeo</label>
					<input type="text" name="video" />
					<span class="ex">Coloque o <strong>link</strong> o vídeo do <strong>youtube</strong> e clique em <strong>Adicionar</strong></span>
					<span class="botao adicionar"><a href="">Adicionar</a></span>
				</div>	
				<div class="videos">
					<script type="text/javascript">
						$('.videos').load('onserver.php<?php echo $pluginHome?>&p=video&album=<?php echo $dados['id']?>');
					</script>
				</div>
				<script type="text/javascript">
					$('.botao.adicionar').click(function(){
						if ($('input[name="video"]').val() != ''){
							//alert(encodeURIComponent($('input[name="video"]').val()));
							$('.videos').load('onserver.php<?php echo $pluginHome?>&p=video&album=<?php echo $dados['id']?>&video='+encodeURIComponent($('input[name="video"]').val()));
							$('input[name="video"]').val('');
							jfAlert('Processando.');
						}
						return false;
					});
				</script>
				
			</fieldset>
		
			<?php
		}?>
		<div class="botoes">
			<a href="<?php echo $backReal?>">Voltar</a>
			<button type="submit" name="salvar" class="confirm">Salvar</button>
			<button type="submit" name="salvar-edit">Salvar e continuar editando</button>
		</div>
	</form>	
</div>

<script type="text/javascript" src="js/jquery.maskedinput.js"></script>
<script>
	ajustaForm();
	$('.data').mask('99/99/9999');
</script>

