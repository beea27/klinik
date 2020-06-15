
<?php

include 'conecta.php';

header('Content-Type: text/html; charset=utf-8');

	$id = $_POST['id'];
	$cpf_paciente = $_POST["cpf_paciente"];
	$crm = $_POST["crm"];
	$data_consulta = $_POST["data_consulta"];
	$horario = $_POST["horario"];
	$diagnostico = $_POST["diagnostico"];
	$tratamento = $_POST["tratamento"];
	$exames = $_POST["exames"];
	

	mysqli_select_db($conecta, "n2") or print(mysqli_error());
	
	if(!is_null($id)){
	$sql = "UPDATE `tb_consulta`
               SET diagnostico = '$diagnostico',
                   tratamento = '$tratamento',
                   exames = '$exames'
			WHERE id = '$id'";    
			echo"<script>alert(\"Dados salvos com sucesso!\");location.href=\"../index.php\";</script>";
	}else{

	$sql_verifica = "SELECT * FROM tb_paciente
		WHERE cpf = '$cpf_paciente'";

	$result=mysqli_query($conecta,$sql_verifica);
	$verifica_OK = 0;
	while($consulta=mysqli_fetch_array($result))
    {
        //Existe este usuario
        $verifica_OK = 1;

		$sql = "INSERT INTO `tb_consulta` (`cpf_paciente`,`crm`, `data_consulta`,`horario`) 
				VALUES ('$cpf_paciente','$crm','$data_consulta','$horario')";
				echo"<script>alert(\"Consulta marcada com sucesso!\");location.href=\"../index.php\";</script>";
	}

	if ($verifica_OK == 0){ 
        echo"<script>alert(\"Paciente não cadastrado!\");location.href=\"../cadastrar_paciente.php\";</script>";
    }

	}

	//echo $sql;
	//header("location:../index.php");

	
	
	mysqli_query($conecta, $sql);

	mysqli_close($conecta); 

?>