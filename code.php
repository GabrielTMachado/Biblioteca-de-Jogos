<?php
if(!isset($_SESSION)){
session_start();
}
require 'conectabd.php';

//Deletar o Jogo
if(isset($_POST['delete_jogo']))
{
    require 'protect.php'   ;
    $id_jogo = mysqli_real_escape_string($con, $_POST['delete_jogo']);
    $query = "DELETE FROM tab_jogo WHERE pk_id_jogo='$id_jogo' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Jogo excluido com sucesso";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Não foi possivel excluir o Jogo";
        header("Location: index.php");
        exit(0);
    }
}

// Atualizar o Jogo
if(isset($_POST['update_jogo']))
{
    if(isset($_FILES['img_jogo'])){
        $img_jogo = $_FILES['img_jogo'];

        if($img_jogo['error']){
            header("Location: index.php");
            $_SESSION['message']= "Falha ao enviar arquivo";
            exit(0);}


        $salvarimg = "imgdejogos/";
        $nomeDoArquivo = $img_jogo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

        if($extensao == "jpg" || $extensao == "png" || $extensao == "jpeg"){
        $path = $salvarimg . $novoNomeDoArquivo . "." .$extensao;
        $certo = move_uploaded_file($img_jogo["tmp_name"], $path);
        $img_jogo = $path;
        }else{
            header("Location: edit.php");
            $_SESSION['message']= "Extensão não aceita";
            exit(0);
        }
    }else{
        header("Location: index.php");
        $_SESSION['message']= "Nao deu";
        exit(0);
    }

    $id_jogo = mysqli_real_escape_string($con, $_POST['pk_id_jogo']);
    $nome_jogo = mysqli_real_escape_string($con, $_POST['nome_jogo']);
    $desc_jogo = mysqli_real_escape_string($con, $_POST['desc_jogo']);

    $query = "UPDATE tab_jogo SET nome_jogo='$nome_jogo', desc_jogo='$desc_jogo', img_jogo='$img_jogo' WHERE pk_id_jogo='$id_jogo' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "jogo atualizado com sucesso";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Jogo não atualizado";
        header("Location: index.php");
        exit(0);
    }

}else{
        header("Location: index.php");
        $_SESSION['message']= "erro";
        exit(0);
    }

// Salvar o Jogo
if(isset($_POST['save_jogo']))
{
    if(isset($_FILES['img_jogo'])){
        $img_jogo = $_FILES['img_jogo'];

        if($img_jogo['error'])
            die("Falha ao enviar arquivo");


        $salvarimg = "imgdejogos/";
        $nomeDoArquivo = $img_jogo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

        if($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg")
                die("tipo de arquivo não aceito");
        $path = $salvarimg . $novoNomeDoArquivo . "." .$extensao;
        $certo = move_uploaded_file($img_jogo["tmp_name"], $path);
        $img_jogo = $path;

    }

    $nome_jogo = mysqli_real_escape_string($con, $_POST['nome_jogo']);
    $desc_jogo = mysqli_real_escape_string($con, $_POST['desc_jogo']);

    $query = "INSERT INTO tab_jogo (nome_jogo,desc_jogo,img_jogo) VALUES ('$nome_jogo','$desc_jogo','$img_jogo')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Jogo cadastrado com sucesso!";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Jogo não cadastrado";
        header("Location: create.php");
        exit(0);
    }
}

?>