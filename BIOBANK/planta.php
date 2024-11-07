<?php		
	require_once('conexao.php');
	
		$id_ani = "";
		$nomeanimal = "";
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
			
				$idanimal = filter_input(INPUT_POST, 'idanimal');
				
			//PESQUISA POR NOME POPULAR
			if ($idanimal == "txtanipopular"){		
			
			$nomeani = $_REQUEST["nomeani"];
		
			$sql = "select nomecientificopla , habitatpla , familiapla , corpla, cultivopla, txtpla, imgpla from tblplanta where nomepla ='".$nomeani."'";
			
			$dados = mysqli_query($conexao, $sql);

			if(mysqli_affected_rows($conexao)>0){
			
			$registro = mysqli_fetch_array($dados);

			$nomeanimal = $_REQUEST["nomeani"];
			$nomecieoani = $registro["nomecientificopla"];
			$habitatani = $registro["habitatpla"];
			$familiaani = $registro["familiapla"];
			$corani = $registro["corpla"];
			$situaçãoani = $registro["cultivopla"];
			$txtani = $registro["txtpla"];
			$imgani = $registro["imgpla"];
			
			//echo "<script>alert('ok');</script>";
			
		}
			else {
				echo "<script>alert('falha ao encontrar a planta');</script>";
			}
		} 
			
			//PESQUISA POR NOME CIENTIFICO
			if ($idanimal == "txtanicientifico"){		
			
			$nomecieoani = $_REQUEST["nomeani"];
		
			$sql = "select nomepla , habitatpla , familiapla , corpla, cultivopla, txtpla, imgpla from tblplanta where nomecientificopla ='".$nomeani."'";
			
			$dados = mysqli_query($conexao, $sql);

			if(mysqli_affected_rows($conexao)>0){
			
			$registro = mysqli_fetch_array($dados);
			
			$nomeanimal = $_REQUEST["nomeani"];
			$nomecieoani = $registro["nomecientificopla"];
			$habitatani = $registro["habitatpla"];
			$familiaani = $registro["familiapla"];
			$corani = $registro["corpla"];
			$situaçãoani = $registro["cultivopla"];
			$txtani = $registro["txtpla"];
			$imgani = $registro["imgpla"];
			
			//echo "<script>alert('ok');</script>";
			
		}
			else {
				echo "<script>alert('falha ao encontrar a planta');</script>";
			}
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
    <title>Animais</title>
	<script language="javascript" type="text/jscript">
	
                document.querySelector("form").addEventListener("submit", (e)=>{
   if(!document.querySelector("input[name='idanimal']").checked){
      alert("Marque o radio button");
      e.preventDefault();
   }
});

            	function fnConsultarDados(){
                	document.frmWebPrincipal.action = './planta.php?acao=consultar';
                	document.frmWebPrincipal.submit();
                	return false;
            }

                function fnLimparDados() {
                document.frmWebPrincipal.action = './planta.php?acao=limpar';
                document.frmWebPrincipal.submit();
                return false;
            }

	</script>
	
	<link rel= "stylesheet" type="text/css" href="./css/geral.css"/>
	<link rel= "stylesheet" type="text/css" href="./css/colunas.css"/>
	<link rel= "stylesheet" type="text/css" href="./css/ani_plan.css"/>
	
</head>
<body>
	
					<header>
			<div class="cont_logo">
			
			<a href="index.php" class="hip_logo"><img class="img_logo" src="./imagens/logo.png"> BioBank</a>
			</div>

		
			<!--barra
			
				<div class="search-box" id="search-box">
				
                    <div  class="search-txt"  id="search-txt"> A mente humana não evoluiu para acreditar na biologia  </div>
				
                    <a href="#" id="search-btn" class="search-btn">
                        <img src="./imagens/biobank.png" alt="lupa" class="imglupa" id="imglupa">
                    </a>
                        
                </div>
			
	-->
			
		</header>
		<div class="headerzinho">
			<div class="hlinkcontainer">
				<a class="hlink_headerzinho" href="index.php">Início</a>
				<a class="hlink_headerzinho" href="animal.php">Animais</a>
				<a class="hlink_headerzinho" href="planta.php">Plantas</a>
					<div class="arearestrita">
				<a class="hlink_arearestrita" href="login.php">Área Restrita</a>
			</div>
			</div>
			
		</div>
			
		</div>
		
		
		<div class="espacodokrl">
		<main>
			
		   <form id="frmWebPrincipal" name="frmWebPrincipal" method="post" action="">
		   <div class="tudin">
		   <div class="buscaani_plan col-3-lg">
				<h2>Como você deseja procurar a planta?</h2>
				</br>
				<div class="radiochave">
				
				<div><input type = "radio" name = "idanimal" id = "idanimal" value = "txtanipopular">Nome Popular </div>
				
				</div>
				
				
				</br>
				<div><input type="text" class="nomebusc" name="nomeani" id="nomeani" value = "" placeholder="Insira o nome da planta" size = "30px"></div>
				</br>
				
				<div class="osbtnchave">
					<input class="btnchave" type = "button" id = "btnconsultar" name = "btnconsultar"  value = "Consultar" onclick = "fnConsultarDados()"/>
					<input class="btnchave" type = "button" id = "btnlimpar" name = "btnlimpar"  value = "Limpar" onclick = "fnLimparDados()"/>
				</div>
				
			</div>
				
			<div class="mostani_plan col-8-lg">	
				<div class="imgani_plan">
					<img class="imagemaniplan" src = "./img_pla/<?php echo "$imgani"?>">
				</div>
				
				<div class="infoani_plan">
				<div class="linha">		Nome Popoular: <?php echo "$nomeanimal"?></br> </div>
				<div class="linha"> 	Nome Cientifico: <?php echo "$nomecieoani"?></br> </div>
				<div class="linha"> 	Habitat natural: <?php echo "$habitatani"?></br> </div>
				<div class="linha"> 	Famlilia: <?php echo "$familiaani"?></br> </div>
				<div class="linha"> 	Cor: <?php echo "$corani"?></br> </div>
				<div class="linha">		Forma de cultivo: <?php echo "$situaçãoani"?></br> </div>
				</div>
				
				<div class="textanim_plan">
					ASS: <?php echo "$txtani"?></br>
				</div>
				
			</div>
			
			</form>
				
		</main>
		</form>
		</div>
	
	</div>
	
	<footer>
			<p class="pfooter">BioBank</p>
			<div class="textofoot">biobank@gmail.com</br>
			2023 por BioBank. Orgulhosamente criado por Kayky, Laiz, Eduardo e Luiz.</div>
	</footer>
	
</body>
</html>