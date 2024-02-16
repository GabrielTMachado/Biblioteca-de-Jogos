<?php
if(!isset($_SESSION)){
    session_start();
    }
require 'conectabd.php';
require 'conected.php';

if (isset($_POST['registro'])) {

    $nome_usu = mysqli_real_escape_string($con, $_POST['nome_usu']);
    $email_usu = mysqli_real_escape_string($con, $_POST['email_usu']);
    $senha_usu = mysqli_real_escape_string($con, $_POST['senha_usu']);

    $query = "SELECT * FROM tab_usuario WHERE email_usu='$email_usu'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0){
        $_SESSION['message'] = "Usuário ou e-mail já registrado. Escolha outros dados.";
        header("Location: Registrar.php");
        exit();
    }

    $query = "INSERT INTO tab_usuario(nome_usu, email_usu, senha_usu) VALUES ('$nome_usu', '$email_usu', '$senha_usu')";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Usuario Cadastrado, Faça o login";
        header('Location: index.php');
        exit();
    } else {
        $_SESSION['message'] = "Email ou senha invalidos";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Registro de Usuario
                    <a href="index.php" class="btn btn-danger float-end">VOLTAR</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php include('message.php'); ?>
                    <form action="Registrar.php" method="post">
                        <div class="mb-3">
                                <label for="nome_usu" class="form-label">Nome:</label>
                                <input type="text" name="nome_usu" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email_usu" class="form-label">Email:</label>
                            <input type="email" name="email_usu" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="senha_usu" class="form-label">Senha:</label>
                            <input type="password" name="senha_usu" class="form-control" required>
                        </div>
                        <button type="submit" name="registro" class="btn btn-primary">Registrar-se</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
