<?php		
	require_once('conexao.php');
	
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
		
		if ($acao == "cadastrar"){
		
		$nomeani = $_REQUEST["nomeani"];
		$nomecieani = $_REQUEST["nomecieani"];
		$habitatani = $_REQUEST["habitatani"];
		$familiaani = $_REQUEST["familiaani"];
		$corani = $_REQUEST["corani"];
		$situaçãoani = $_REQUEST["situaçãoani"];
		$txtani = $_REQUEST["txtani"];
		$imgani = $_REQUEST["imgani"];
		
		$sql =" insert into tblplanta (id_pla, nomepla, nomecientificopla, habitatpla, familiapla, corpla, cultivopla, txtpla, imgpla)
		values (null,'".$nomeani."','".$nomecieani."', '".$habitatani."', '".$familiaani."', '".$corani."', '".$situaçãoani."', '".$txtani."', '".$imgani."' )";
		
		$dados = mysqli_query($conexao, $sql);
		
		if(mysqli_affected_rows($conexao) > 0){
			
			echo "<script>alert('planta cadastrado com sucesso')</script>";
			$nomeani = "";
			$nomecieoani = "";
			$habitatani = "";
			$familiaani = "";
			$corani = "";
			$situaçãoani = "";
			$txtani = "";
			$imgani = "";
			
		}
		else {
			echo "<script>alert('falha ao cadastrar planat')</script>";
		}
		}
		if ($acao == "limpar"){
	
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
    <title>Cadastro</title>
	<script language="javascript" type="text/jscript">
	function fnCadastrarDados(){
                //verificar se o campo esta vazio
                if(document.getElementById('nomeani').value == ''){
                    alert('campo vazio');
                    document.getElementById('nomeani').focus();
                }
                	else if (document.getElementById('nomecieani').value == ''){
                    	alert('campo vazio');
                    	document.getElementById('nomecieani').focus();
                	}
                		else if (document.getElementById('habitatani').value == ''){
                    		alert('campo vazio');
                    		document.getElementById('habitatani').focus();
                		}
                		else if (document.getElementById('familiaani').value == ''){
                    		alert('campo vazio');
                    		document.getElementById('familiaani').focus();
                		}
                		else if (document.getElementById('corani').value == ''){
                    		alert('campo vazio');
                    		document.getElementById('corani').focus();
                		}
                		else if (document.getElementById('situaçãoani').value == ''){
                    		alert('campo vazio');
                    		document.getElementById('situaçãoani').focus();
                		}
                		else if (document.getElementById('txtani').value == ''){
                    		alert('campo vazio');
                    		document.getElementById('txtani').focus();
                		}
                else{
                    document.frmWebPrincipal.action = './planta_cadastrar.php?acao=cadastrar';
                    document.frmWebPrincipal.submit();
                }
                return false;
            }

                function fnLimparDados() {
                document.frmWebPrincipal.action = './planta_cadastrar.php?acao=limpar';
                document.frmWebPrincipal.submit();
                return false;
            }
	</script>
	
	<link rel= "stylesheet" type="text/css" href="./css/geral.css"/>
	<link rel= "stylesheet" type="text/css" href="./css/colunas.css"/>
	<link rel= "stylesheet" type="text/css" href="./css/cadastro.css"/>
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
					<h2 class="tit">Cadastro de plantas</h2>
				 
				 <form id="frmWebPrincipal" name="frmWebPrincipal" method="post" action="">
				   <div class="campos">
						<div class="campinhos">
							<div><input type="text" class="campo" name="nomeani" id="nomeani" value = "<?php  echo "$nomeani"?>" placeholder="Insira o nome popular da planta" size = "30px"></div>
							<div><input type="text" class="campo" name="nomecieani" id="nomecieani" value = "<?php  echo "$nomecieoani"?>" placeholder= "Insira o nome cientifico da planta" size = "30px"></div>
							<div><input type="text" class="campo" name="habitatani" id="habitatani" value = "<?php  echo "$habitatani"?>" placeholder= "Insira o habitat principal da planta" size = "30px"></div>
							<div><input type="text" class="campo" name="familiaani" id="familiaani" value = "<?php  echo "$familiaani"?>" placeholder="Insira a familia pertencente da planta" size = "30px"></div>
							<div><input type="text" class="campo" name="corani" id="corani" value = "<?php  echo "$corani"?>" placeholder="Insira a cor predominante da planta" size = "30px"></div>
							<div><input type="text" class="campo" name="situaçãoani" id="situaçãoani" value = "<?php  echo "$situaçãoani"?>" placeholder="Insira a forma de cultivo da planta" size = "30px"></div>
						</div>
						
						<div class="campinhoimg">
							<div class="campoimg">
						
							</div>
							<input class="tacaimg" type="file" name= "imgani" id="imgani">
						</div>
					</div>
						
						<textarea class="campotexto" name="txtani" id="txtani" value = "<?php  echo "$txtani"?>" placeholder="Insira um breve texto sobre da planta" size = "150px" height=1000></textarea>
						
				
					</br>
					
						 <input class="botaochave" type = "button" id = "btnlogin" name = "btnlogin"  value = "cadastrar" onclick = "fnCadastrarDados()"/>
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