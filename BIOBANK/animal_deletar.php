<?php		
	require_once('conexao.php');
	
		$id_ani = "";
		$nomeani = "";
		$nomecieoani = "";
		$habitatani = "";
		$familiaani = "";
		$corani = "";
		$situaçãoani = "";
		$txtani = "";
		$imgani = "";
	
	if($_POST){
		
		if(isset($_REQUEST["acao"])){
			$acao = $_REQUEST["acao"];
				
		}
		
		if ($acao == "consultar"){
			$id_ani = $_REQUEST["idani"];
			
			$sql = "select nomeani, nomecientificoani , habitatani , familiaani , corani, situaçãoani, txtani, imgani from tblanimal where id_ani = '".$id_ani."'";
			$dados = mysqli_query($conexao, $sql);
			
		
		if(mysqli_affected_rows($conexao)>0){
			
		$registro = mysqli_fetch_array($dados);

		$id_ani = $_REQUEST["idani"];
		$nomeani = $registro["nomeani"];
		$nomecieoani = $registro["nomecientificoani"];
		$habitatani = $registro["habitatani"];
		$familiaani = $registro["familiaani"];
		$corani = $registro["corani"];
		$situaçãoani = $registro["situaçãoani"];
		$txtani = $registro["txtani"];
		$imgani = $registro["imgani"];
			
			//echo "<script>alert('ok');</script>";
			
		}
		else {
			echo "<script>alert('falha ao encontrar o animal');</script>";
		}
		}
		
		if ($acao == "deletar"){
		
		$id_ani = $_REQUEST["idani"];
		
		$sql = "DELETE FROM tblanimal WHERE id_ani = '".$id_ani."'";
		
		$dados = mysqli_query($conexao, $sql);
		
		if(mysqli_affected_rows($conexao)>0){
			
			echo "<script>alert('Animal deltado com sucesso');</script>";
			
			$id_ani = "";
		}
		else {
			echo "<script>alert('falha ao deltar o animal');</script>";
		}
			}
				
		if($acao == "limpar"){
			
		$id_ani = "";
		$nomeani = "";
		$nomecieoani = "";
		$habitatani = "";
		$familiaani = "";
		$corani = "";
		$situaçãoani = "";
		$txtani = "";
		$imgani = "";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>		
    <title>Deletar</title>
	<script language="javascript" type="text/jscript">
                function fnAlterarDados(){
                //verificar se o campo esta vazio 
                if(document.getElementById('idani').value == ''){
                    alert('campo id obrigatorio');
                    document.getElementById('idani').focus();
                }
                		else if(document.getElementById('nomeani').value == ''){
                    		alert('CONSULTE ANTES DE DELETAR');
                    		document.getElementById('btnconsultar').focus();
                		}
                		else if (document.getElementById('nomecieani').value == ''){
                    		alert('CONSULTE ANTES DE DELETAR');
                    		document.getElementById('btnconsultar').focus();
                		}
                		else if (document.getElementById('habitatani').value == ''){
                    		alert('CONSULTE ANTES DE DELETAR');
                    		document.getElementById('btnconsultar').focus();
                		}
                		else if (document.getElementById('familiaani').value == ''){
                    		alert('CONSULTE ANTES DE DELETAR');
                    		document.getElementById('btnconsultar').focus();
                		}
                		else if (document.getElementById('corani').value == ''){
                    		alert('CONSULTE ANTES DE DELETAR');
                    		document.getElementById('btnconsultar').focus();
                		}
                		else if (document.getElementById('situaçãoani').value == ''){
                    		alert('CONSULTE ANTES DE DELETAR');
                    		document.getElementById('btnconsultar').focus();
                		}
                		else if (document.getElementById('txtani').value == ''){
                    		alert('CONSULTE ANTES DE DELETAR');
                    		document.getElementById('btnconsultar').focus();
                		}           	
                	else{
                    	document.frmWebPrincipal.action = './animal_deletar.php?acao=deletar';
                    	document.frmWebPrincipal.submit();
                	}
                return false;
            }
            	function fnConsultarDados(){
            	if(document.getElementById('idani').value == ''){
                    alert('campo id obrigatorio');
                    document.getElementById('idani').focus();
                }
            	else{
                	document.frmWebPrincipal.action = './animal_deletar.php?acao=consultar';
                	document.frmWebPrincipal.submit();
                	return false;
            }
            }
                function fnLimparDados() {
                document.frmWebPrincipal.action = './animal_deletar.php?acao=limpar';
                document.frmWebPrincipal.submit();
                return false;
            }

	</script>
	
		<link rel= "stylesheet" type="text/css" href="./css/geral.css"/>
		<link rel= "stylesheet" type="text/css" href="./css/colunas.css"/>
		<link rel= "stylesheet" type="text/css" href="./css/alterar.css"/>
</head>
<body>

			<header>
					<div class="cont_logo">
					
					<a href="area_restrita.php" class="hip_logo"><img class="img_logo" src="./imagens/logo.png"> BioBank</a>
					</div>

				
					<!--barra de pesquisa-->
						<div class="search-box" id="search-box">
							<input type="text" class="search-txt" id="search-txt" placeholder="Pesquisar">
							<a href="#" id="search-btn" class="search-btn">
								<img src="./imagens/lupa.png" alt="lupa" class="imglupa" id="imglupa">
							</a>
								
						</div>
					<!--barra de pesquisa-->
					
				</header>
				<div class="headerzinho">
					<div class="hlinkcontainer">
	
					
						<div class="hlink_headerzinho"><a class="hlink_arearestrita" href="area_restrita.php">Inicio</a>  </div>
						<div class="hlink_headerzinho"> </div>
						<div class="hlink_headerzinho"> </div>
							<div class="arearestrita">
						<a class="hlink_arearestrita" href="index.php">Sair da Área Restrita</a>
					</div>
					</div>
					
				</div>


<div class="espacodokrl">

	<div class="centro">
			
		<div class="cadastro col-10-lg">
			<main>
				<h2>Deletar animal</h2>
			   <form id="frmWebPrincipal" name="frmWebPrincipal" method="post" action="">
				   <div class="campos">
						
						<div class="campinhos">
							<div><input type="text" class="campo" name="idani" id="idani" value = "<?php  echo "$id_ani"?>" placeholder="Insira o id do animal que deseja alterar" size = "30px"></div>
							<div><input type="text" class="campo" name="nomeani" id="nomeani" value = "<?php echo "$nomeani"?>" placeholder="Insira o nome popular do animal" size = "30px"></div>
							<div><input type="text" class="campo" name="nomecieani" id="nomecieani" value = "<?php echo "$nomecieoani"?>" placeholder="Insira o nome cientifico do animal" size = "30px"></div>
							<div><input type="text" class="campo" name="habitatani" id="habitatani" value = "<?php echo "$habitatani"?>" placeholder="Insira o habitat principal do animal" size = "30px"></div>
							<div><input type="text" class="campo" name="familiaani" id="familiaani" value = "<?php echo "$familiaani"?>" placeholder="Insira a familia pertencente do animal" size = "30px"></div>
							<div><input type="text" class="campo" name="corani" id="corani" value = "<?php echo "$corani"?>" placeholder="Insira a cor predominante do animal" size = "30px"></div>
							<div><input type="text" class="campo" name="situaçãoani" id="situaçãoani" value = "<?php echo "$situaçãoani"?>" placeholder="Insira a situação presente do animal" size = "30px"></div>
						</div>
						
						<div class="campinhoimg">
							<div class="campoimg">
								<img class="imgcadast" src = "./img/<?php echo "$imgani"?>">	
							</div>
		

						</div>	
						
						<textarea class="campotexto" type="text" name="txtani" id="txtani" value = "<?php echo "$txtani"?>" placeholder="Insira um breve texto sobre o animal" size = "150px" height=1000></textarea>	
					</div>
					
					</form>
					</br>
						<input class="botaochave" type = "button" id = "btnconsultar" name = "btnconsultar"  value = "consultar" onclick = "fnConsultarDados()"/>
						<input class="botaochave" type = "button" id = "btnalterar" name = "btnalterar"  value = "deletar" onclick = "fnAlterarDados()"/>
						<input class="botaochave" type = "button" id = "btnlimpar" name = "btnlimpar"  value = "limpar" onclick = "fnLimparDados()"/>
			</main>
			</form>
	</div>
	</div>
	
</div>	
	<footer>
			<p class="pfooter">BioBank</p>
			<div class="textofoot">biobank@gmail.com</br>
			2023 por BioBank. Orgulhosamente criado por Kayky, Laiz, Eduardo e Luiz.</div>
	</footer>
</body>
</html>