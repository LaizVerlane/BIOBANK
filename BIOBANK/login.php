<?php		
	require_once('conexao.php');

	if($_POST){
			
		if(isset($_REQUEST["acao"])){
			$acao = $_REQUEST["acao"];
		}
		
		if ($acao == "login"){		
		$admnome = $_REQUEST["usrnome"];
		$admsenha = $_REQUEST["senha"];
		
		$sql = "select * from tbladm where nomeadm = '".$admnome."' and senhaadm = '" .$admsenha."'";
		$dados = mysqli_query($conexao, $sql);
					if(mysqli_affected_rows($conexao) > 0){
					header("Location: area_restrita.php");
				}
		
		else {
			echo "<script>alert('usuario ou senha ')</script>";
		}
		}	
	}		
?>


<!DOCTYPE html>
<html>
<head>		
    <title>Login</title>
	<link rel="stylesheet" href="./css/style1.css">
	<script language="javascript" type="text/jscript">
	function fnValidarDados(){
                //verificar se o campo esta vazio
                if(document.getElementById('usernome').value == ''){
                    alert('campo usuario vazio');
                    document.getElementById('usernome').focus();
                }
                else if (document.getElementById('senha').value == ''){
                    alert('campo senha vazio');
                    document.getElementById('senha').focus();
                }
                else{
                    document.frmWebPrincipal.action = './login.php?acao=login';
                    document.frmWebPrincipal.submit();
                }
                return false;
            }

                function fnLimparCampos() {
                document.frmWebPrincipal.action = './login.php?acao=limpar';
                document.frmWebPrincipal.submit();
                return false;
            }
	</script>
</head>

<body>

    <main class="container">
        <h2>Login</h2>
       <form id="frmWebPrincipal" name="frmWebPrincipal" method="post" action="">
            <div class="input-field">
                <input type="text" name="usrnome" id="usernome" value = ""
                    placeholder="Insira seu usuario">
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="password" name="senha" id="senha" value = ""
                    placeholder="Insira sua senha">
                <div class="underline"></div>	
            </div>
        </form>
		</br>
			 <input type = "button" class = "brotao2" id = "btnlogin" name = "btnlogin"  value = "continuar" onclick = "fnValidarDados()"/>
			 <input type = "button" class = "brotao"  id = "btnlimpar" name = "btnlimpar"  value = "limpar" onclick = "fnLimparDados()"/>
    </main>
	</form>
</body>
</html>