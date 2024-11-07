<?php
	//variavel banco
	$servidor = "localhost";
	$usuario="root";
	$senha ="root";
	$banco = "bdbiobank";
	
	$conexao = mysqli_connect($servidor,$usuario,$senha,$banco);
	
	if(!$conexao){
		echo "<script>alert('Problema na conexão com o servidor');</script>";		
	}
		else{
		$aberto = mysqli_select_db($conexao,$banco);
		//echo "<script>alert('conectado');</script>";	
	}
?>