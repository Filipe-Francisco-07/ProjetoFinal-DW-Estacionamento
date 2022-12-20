<?php
    include 'acao.php';
    include_once 'conexao.php';

    if(!isset($_SESSION['usuario'])){
        header('location: login.php');
      }

    $acao = isset($_GET['acao'])?$_GET['acao']:"";
    $id = isset($_GET['id'])?$_GET['id']:"";


    $nome = isset($_POST['nome'])?$_POST['nome']:"";
    $sobrenome = isset($_POST['sobrenome'])?$_POST['sobrenome']:"";
    $email = isset($_POST['email'])?$_POST['email']:"";
    $senha = isset($_POST['senha'])?$_POST['senha']:"";
    $cidade = isset($_POST['cidade'])?$_POST['cidade']:"";


    if ($acao == 'editar'){
        //busca dados do usuario
        try{
            $conexao = new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);//cria conexão com banco de dados
            $query = 'SELECT * FROM cliente WHERE id = :id';
           
            // Monta consulta
            $stmt = $conexao->prepare($query);

            //Vincula váriaveis com a consulta
            $stmt->bindValue(':id',$id);
            $stmt->execute();
            $cliente = $stmt->fetch();

    }catch(PDOException $e){
        print("Erro ao conectar com o banco de dados...<br>".$e->getMessage());
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Cadastro</title>
    <script>
        function excluir(url){
            if(confirm("Confirmar Exclusão?"))
                window.location.href=url;
        }
    </script>
</head>
<body >
<div class="content">
    <br>

    <br><br>
    <h1>Cadastro cliente</h1> 
    <a href="clindex.php"><button type="button" class="btn btn-primary">Voltar</button></a>
    <br><br>
    <form action="acao.php" method="post">
        <div class="form-floating">
        <input type="text" class="form-control" id="id" name="id"placeholder="ID" value=<?php if (isset($cliente)) echo $cliente['id']; else echo 0; ?>>
        <label for="id">ID</label>
        </div><br>
        <div class="form-floating">
        <input class="form-control inputs required" oninput="nameValidate()" type="text" id="nome" name="nome"value=<?php if(isset($cliente))echo $cliente['nome'] ?>>
        <label for="nome">Nome</label>
        <span class="span-required">3 ou mais caracteres</span>
        </div><br>
        <div class="form-floating">
        <input class="form-control inputs required" oninput="sobrenomeValidate()" type="text" id="sobrenome" name="sobrenome"value=<?php if(isset($cliente))echo $cliente['sobrenome'] ?>>
        <label for="sobrenome">Sobrenome</label>
        <span class="span-required">3 ou mais caracteres</span>
        </div><br>
        <div class="form-floating">
        <input class="form-control inputs required" oninput="emailValidate()" type="email" id="email" name="email" value=<?php if (isset($cliente)) echo $cliente['email'] ?>>
        <label for="email">Email</label>
        <span class="span-required">Insira um email válido</span>
        </div><br>
        <div class="form-floating">
        <input class="form-control inputs required" oninput="senhaValidate()" type="password" id="senha" name="senha" value=<?php if (isset($cliente)) echo $cliente['senha'] ?>>
        <label for="senha">Senha</label>
        <span class="span-required">8 ou mais caracteres</span>
        </div><br>
        <div class="form-floating">
        <input class="form-control inputs required" oninput="cidadeValidate()" type="text" id="cidade" name="cidade" value=<?php if (isset($cliente))echo $cliente['cidade'] ?>>
        <label for="cidade">Cidade</label>
        <span class="span-required">1 ou mais caracteres</span>
        </div><br>
        
        <button type="submit" class="btn btn-primary" name='cli_acao' value='registrar'>Enviar</button>
    </form>

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

    function sobrenomeValidate(){
        if(campos[1].value.length < 3)
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

    function emailValidate(){
        if(!emailRegex.test(campos[2].value))
        {
            setError(2);
            return false;
            setError(2);
        }
        else
        {
            removeError(2);
        }
        removeError(2);
        return true;
    }

    function senhaValidate(){
        if(campos[3].value.length < 8)
        {
            setError(3);
            return false;
            setError(3);
        }
        else
        {
            removeError(3);
        }
        removeError(3);
        return true;
    }

    function cidadeValidate(){
        if(campos[4].value.length < 1)
        {
            setError(4);
            return false;
            setError(4);
        }
        else
        {
            removeError(4);
        }
        removeError(4);
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
</html>
