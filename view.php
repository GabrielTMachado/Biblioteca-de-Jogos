<?php
require 'conectabd.php';
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Detalhes do Jogo</title>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12"> 
            <div class="card">
                <div class="card-header">
                    <h4>Dados do Jogo
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
                            $tab_jogo = mysqli_fetch_assoc($query_run);
                            ?>
                            <div class="mb-3">
                                <label>Nome</label>
                                <p class="form-control"><?= $tab_jogo['nome_jogo']; ?></p>
                            </div>
                            <div class="mb-3">
                                <label>Descrição</label>
                                <p class="form-control"><?= $tab_jogo['desc_jogo']; ?></p>
                            </div>
                            <div class="mb-3">
                                <label>Imagem do Jogo</label>
                                <p class="form-control">
                                    <img style="max-width: 100px; max-height: 100px;" src="<?= $tab_jogo['img_jogo']; ?>">
                                </p>
                            </div>
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
