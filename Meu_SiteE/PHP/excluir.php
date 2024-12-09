<?php

//conexao com o bd
$conection = mysql_connect("localhost","root","") or die ("Error". mysql_error());
//seleciona o bd
$database = mysql_select_db("site") or die ("Error".mysql_error());





$id = $_POST['id'];
if(isset($_POST['funcao']) == "excluir"){
	$sql_excluir = mysql_query("DELETE FROM mural WHERE id = '$id'") or die ("ERROR".mysql_error());
	
	header ("Location: mural.php");
}
?>