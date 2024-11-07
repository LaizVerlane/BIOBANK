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
		
			$sql = "select nomecientificoani , habitatani , familiaani , corani, situaçãoani, txtani, imgani from tblanimal where nomeani ='".$nomeani."'";
			
			$dados = mysqli_query($conexao, $sql);

			if(mysqli_affected_rows($conexao)>0){
			
			$registro = mysqli_fetch_array($dados);

			$nomeanimal = $_REQUEST["nomeani"];
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
			
			//PESQUISA POR NOME CIENTIFICO
			if ($idanimal == "txtanicientifico"){		
			
			$nomecieoani = $_REQUEST["nomeani"];
		
			$sql = "select nomeani, habitatani , familiaani , corani, situaçãoani, txtani, imgani from tblanimal where nomecientificoani ='".$nomecieoani."'";
			
			$dados = mysqli_query($conexao, $sql);

			if(mysqli_affected_rows($conexao)>0){
			
			$registro = mysqli_fetch_array($dados);

			$nomeanimal = $registro["nomeani"];
			$nomecieoani = $_REQUEST["nomeani"];
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
                	document.frmWebPrincipal.action = './animal_consultar.php?acao=consultar';
                	document.frmWebPrincipal.submit();
                	return false;
            }

                function fnLimparDados() {
                document.frmWebPrincipal.action = './animal_consultar.php?acao=limpar';
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
					
					<a href="area_restrita.php" class="hip_logo"><img class="img_logo" src="./imagens/logo.png"> BioBank</a>
					</div>

				
					<!--
						<div class="search-box" id="search-box">
							<input type="text" class="search-txt" id="search-txt" placeholder="Pesquisar">
							<a href="#" id="search-btn" class="search-btn">
								<img src="./imagens/lupa.png" alt="lupa" class="imglupa" id="imglupa">
							</a>
								
						</div>
					-->
					
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
		<main>
			
		   <form id="frmWebPrincipal" name="frmWebPrincipal" method="post" action="">
		   <div class="tudin">
		   <div class="buscaani_plan col-3-lg">
				<h2>Como você deseja procurar o animal?</h2>
				</br>
				<div class="radiochave">
				
				<div><input type = "radio" name = "idanimal" id = "idanimal" value = "txtanipopular">Nome Popular </div>
				<div><input type = "radio" name = "idanimal" id = "idanimal" value = "txtanicientifico">Nome Cientifico </div>
				</div>
				
				
				</br>
				<div><input type="text" class="nomebusc" name="nomeani" id="nomeani" value = "" placeholder="Insira o nome do animal" size = "30px"></div>
				</br>
				
				<div class="osbtnchave">
					<input class="btnchave" type = "button" id = "btnconsultar" name = "btnconsultar"  value = "Consultar" onclick = "fnConsultarDados()"/>
					<input class="btnchave" type = "button" id = "btnlimpar" name = "btnlimpar"  value = "Limpar" onclick = "fnLimparDados()"/>
				</div>
				
			</div>
				
			<div class="mostani_plan col-8-lg fundo">	
				<div class="imgani_plan">
					<img class="imagemaniplan" src = "./img_ani/<?php echo "$imgani"?>">
				</div>
				
				<div class="infoani_plan">
				<div class="linha">	Nome Popoular: <?php echo "$nomeanimal"?></br> </div>
				<div class="linha">		Nome Cientifico: <?php echo "$nomecieoani"?></br> </div>
				<div class="linha">		Habitat natural: <?php echo "$habitatani"?></br> </div>
				<div class="linha">		Famlilia: <?php echo "$familiaani"?></br> </div>
				<div class="linha">		Cor: <?php echo "$corani"?></br> </div>
				<div class="linha">		Situação atual do animal: <?php echo "$situaçãoani"?></br> </div>
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