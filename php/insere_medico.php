
<?php

include 'conecta.php';

header('Content-Type: text/html; charset=utf-8');

	$cpf = $_POST["cpf"];
	$nome_m = $_POST["nome_m"];
	$dt_nasc = $_POST["dt_nasc"];
	$crm = $_POST["crm"];
	$nacionalidade = $_POST["nacionalidade"];
	$especialidade = $_POST["especialidade"];
	$cep = $_POST["cep"];
	$estado = $_POST["estado"];
	$cidade = $_POST["cidade"];
	$bairro = $_POST["bairro"];
	$logradouro = $_POST["logradouro"];
	$numero = $_POST["numero"];
	$complemento = $_POST["complemento"];
	$email = $_POST["email"];
	$celular = $_POST["celular"];
	

	mysqli_select_db($conecta, "n2") or print(mysqli_error());
	
	
	

	

	$sql = "INSERT INTO `tb_medico` (`cpf`,`nome_m`, `dt_nasc`,`crm`, `nacionalidade`,`especialidade`,`cep`, `estado`,`cidade`,`bairro`,`logradouro`,`numero`,`complemento`,`email`,`celular`) 
			VALUES ('$cpf','$nome_m','$dt_nasc','$crm', '$nacionalidade','$especialidade','$cep','$estado','$cidade','$bairro','$logradouro','$numero','$complemento','$email','$celular')";

	

	echo"<script>alert(\"Médico cadastrado com sucesso!\");location.href=\"../index.php\";</script>";

	
	
	mysqli_query($conecta, $sql);

	mysqli_close($conecta); 

?>