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

//Para iniciar a classe
$navegador = new navigi();

//Define a tabela da consulta
$navegador->tabela = $pluginTable;

//Definendo a query para consulta
$navegador->query = 'select *,nome as idd, if(nome = "", "NULL", nome) as nome from ' . $navegador->tabela . $filtro . ' order by idd asc';

//Define como será a exibição. por ser "lista" ou "icone"
//$navegador->exibicao = 'icone';

$navegador->configSel = 'tipo';
$navegador->delete = true;

//Define as cofigurações da navegação

$click['0']['link'] = $pluginHome."&acoes=editar&id=";
$click['0']['ico'] = $_ll['app']['pasta']."img/album.png";
$click['0']['rename'] = true;
$click['0']['delete'] = true;

$click['1']['link'] = $pluginHome."&gal=";
$click['1']['ico'] = $_ll['app']['pasta']."img/book.png";
$click['1']['rename'] = true;
$click['1']['delete'] = true;

$click['2']['link'] = $pluginHome."&acoes=editar&id=";
$click['2']['ico'] = $_ll['app']['pasta']."img/movie.png";
$click['2']['rename'] = true;
$click['2']['delete'] = true;

$navegador->config = $click;

//Para rodar a classe
$navegador->monta();

?>
