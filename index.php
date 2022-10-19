<?php
$erroEmail ="";
$erroSenha ="";
$login = "LOGIN";

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

         //VERIFICAR SE ESTÁ VAZIO O POST EMAIL
        if (empty($_POST['email'])){
            $erroEmail = "Por favor, informe um e-mail";
        }else{
            $email = limpaPost($_POST['email']);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $erroEmail = "E-mail inválido";
            }
        }

         //VERIFICAR SE ESTÁ VAZIO O POST SENHA
         if (empty($_POST['senha'])){
            $erroSenha = "Por favor, informe uma senha";
        }else{
            $senha = limpaPost($_POST['senha']);
            if(strlen($senha) <6){
                $erroSenha = "A senha precisa ter no mínimo 6 dígitos";
            }
        }

        //SE NÃO TIVER NENHUM ERRO ENVIAR PARA OBRIGADO
       if(($erroEmail=="") && ($erroSenha=="")){
           header ("Localize: #");
       } 

    }

    function limpaPost($valor){
        $valor = trim($valor);
        $valor = stripslashes($valor);
        $valor = htmlspecialchars($valor);
        return $valor;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="login.png">
    <title>Login</title>
</head>
<body>
    <div class="main-login">
        <div class="left-login">
            <h1>Faça login <br>E entre para o nosso time</h1>
            <img src="animate.svg">
        </div>
        <div class="right-login">
            <form method="post" class="card-login">
                <h2>LOGIN</h2>
                <div class="textfield">
                    <label for="email">Email</label>
                    <input type="email"  <?php if(!empty($erroEmail)){echo "class='invalido'";}?> <?php if (isset($_POST['email'])){ echo "value='".$_POST['email']."'";} ?> name="email" placeholder="Digite seu email">
                    <br><span class="erro"><?php echo $erroEmail; ?></span>
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="password" <?php if(!empty($erroSenha)){echo "class='invalido'";}?> <?php if (isset($_POST['senha'])){ echo "value='".$_POST['senha']."'";} ?> name="senha" placeholder="Digite sua senha">
                    <br><span class="erro"><?php echo $erroSenha; ?></span>
                </div>
                <button class="btn-login" type="submit">Login</button>
            </form>
        </div>
    </div>
    
</body>
</html>