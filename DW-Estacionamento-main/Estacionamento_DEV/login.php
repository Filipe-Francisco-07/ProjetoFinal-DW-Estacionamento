<?php
include 'acao.php';
include_once 'conexao.php';

?>
<!DOCTYPE html>
<html lang="en">

<head class="simple-linear">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body ">
    <div class="content">

    <h1>Login</h1>
    <form  action="acao.php" name="log_form" id="log_form" method="post" >
       
        <div>
        <input class="inputs required" type="text" id="login_nome" name="login_nome" placeholder="Nome" oninput="nameValidate()">
        <span class="span-required">3 ou mais caracteres</span>
        </div>
         <br>
        <div>
        <input class="inputs required" type="password" id="login_senha" name="login_senha" placeholder="Senha" oninput="senhaValidate()" >
        <span class="span-required">8 ou mais caracteres</span>
        </div>
        <br>   
        <div>
        <button type="submit" class="btn btn-primary" id="log_acao" name='log_acao' value='logar' >Enviar</button> 
        <a href="cad_login.php"><button type="button" class="btn btn-primary" >Registrar</button> </a>
        </div>

    </form>
    </div>
</body>


<script>
 
    const form   = document.getElementById('log_form');
    const campos = document.querySelectorAll('.required');
    const spans  = document.querySelectorAll(".span-required");
    const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
 
    
    function nameValidate(){
        if(campos[0].value.length < 3)
        {
            setError(0);
            return false;
            setError(0);
        }
        else
        {
            removeError(0);
        }
        removeError(0);
        return true;
    }

    function senhaValidate(){
        if(campos[1].value.length < 8)
        {
            setError(1);
            return false;
            setError(1);
        }
        else
        {
            removeError(1);
        }
        removeError(1);
        return true;
    }

    function removeError(index){
        if(!index && index != 0)
        {
            for(var i = 0; i < campos.length-1; i++)
            {
                campos[i].style.border = '';
                spans[i].style.display = 'none';
            }
        }
        else
        {
            campos[index].style.border = '';
            spans[index].style.display = 'none';
        }
        campos[index].style.border = '';
        spans[index].style.display = 'none';
    }
    function setError(index){
        campos[index].style.border = '2px solid #e63636';
        spans[index].style.display = 'block';
    }

   

</script>
