<?php
require_once '../com/autoscout.class.php';

$idObj=$_GET['idObj'];

$autoscout= new Autoscout();
$idCliente= $autoscout->getIdClient();
$html= $autoscout->getHtml("http://cpcms.autoscout24.com/index.php?p=cargallery&a=$idObj&sci=$idCliente");

echo $html;

?>