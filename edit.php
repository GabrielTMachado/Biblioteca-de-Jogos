<?php
if(!isset($_SESSION)){
    session_start();
    }
require 'conectabd.php';
require 'protect.php';
?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Game edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Jogo 
                            <a href="index.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['pk_id_jogo']))
                        {
                            $id_jogo = mysqli_real_escape_string($con, $_GET['pk_id_jogo']);
                            $query = "SELECT * FROM tab_jogo WHERE pk_id_jogo='$id_jogo' ";
                            $query_run = mysqli_query($con, $query);
                            


                            if(mysqli_num_rows($query_run) > 0){
                                $tab_jogo = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="pk_id_jogo" value="<?=$tab_jogo['pk_id_jogo']; ?>">

                                    <div class="mb-3">
                                        <label>Nome</label>
                                        <input type="text" name="nome_jogo" value="<?=$tab_jogo['nome_jogo'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Descrição</label>
                                        <input type="text" name="desc_jogo" value="<?=$tab_jogo['desc_jogo'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Imagem</label>
                                        <input type="file" name="img_jogo" value="<?=$tab_jogo['img_jogo'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_jogo" class="btn btn-primary">
                                            Atualizar Jogo
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>Nenhum ID encontrado</h4>";
                            }
                        }
                        else
                        {
                            echo "<h4>ID do jogo não fornecido</h4>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>