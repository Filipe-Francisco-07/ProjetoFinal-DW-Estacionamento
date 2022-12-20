<?php
    include 'acao.php';
    include_once 'conexao.php';

    $acao = isset($_GET['acao'])?$_GET['acao']:"";
    $id = isset($_GET['id'])?$_GET['id']:"";

    if ($acao == 'editar'){
        //busca dados do usuario
        echo("edit main");
        try{
            $conexao = new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);//cria conexão com banco de dados
            $query = 'SELECT * FROM user WHERE id = :id';
           
            // Monta consulta
            $stmt = $conexao->prepare($query);

            //Vincula váriaveis com a consulta
            $stmt->bindValue(':id',$id);
            $stmt->execute();
            $usuario = $stmt->fetch();

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
<body>
<div class="content">
    <h1>Cadastro</h1>
    <br>
    <form action="acao.php" method="post"> <a href="login.php"><button type="button" class="btn btn-primary">Voltar</button></a>
    <br> <br>
        <div class="form-floating">
        <input type="text" class="form-control" id="cad_id" name="cad_id"placeholder="ID" value=<?php if (isset($usuario)) echo $usuario['cad_id']; else echo 0; ?>>
        <label for="id">ID</label>
        </div>
        <br>
        <div class="form-floating">
        <input class="form-control" type="text" id="cad_nome" name="cad_nome"value=<?php if(isset($usuario))echo $usuario['cad_nome'] ?>>
        <label for="nome">Nome</label>
        </div>
        <br>
        <div class="form-floating">
        <input class="form-control" type="email" id="cad_email" name="cad_email" value=<?php if (isset($usuario)) echo $usuario['cad_email'] ?>>
        <label for="email">Email</label>
        </div>
        <br>
        <div class="form-floating">
        <input class="form-control" type="password" id="cad_senha" name="cad_senha" value=<?php if (isset($usuario)) echo $usuario['cad_senha'] ?>>
        <label for="senha">Senha</label>
        </div>
        <br>
        <button type="submit" class="btn btn-primary" name='log_acao' value='registrar'>Cadastrar</button>
    </form>
    </div>

</body>
</html>