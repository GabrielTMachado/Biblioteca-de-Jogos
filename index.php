<?php
 if(!isset($_SESSION)){
    session_start();
    }
    require 'conectabd.php';
    
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Biblioteca de Jogos</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <u><h4 style="text-align: center;">Biblioteca de Jogos</h4></u>
                        <div style="display: flex; flex-direction: row; justify-content: space-between">
                        <?php 



                        if($_SESSION['log'] == 'deslogado'){                            
                         echo "<div>
                                <a href='Login.php'><button type='button' class='btn btn-primary btn-sm'>Login</button></a>
                                <a href='Registrar.php'><button type='button' class='btn btn-primary btn-sm'>Registrar-se</button></a>
                            </div>";
                        }
                        else if($_SESSION['log'] == 'logado'){
                        echo "
                            <div>
                                <h4>Bem Vindo(a) ". $_SESSION['nome_usu'] . "</h4>
                            </div>
                            <div>
                                <a href='create.php'><button type='button' class='btn btn-primary btn-sm'>Adicionar Jogo</button></a>
                                <a href='Logout.php'><button type='button' class='btn btn-secondary btn-sm'>Sair</button></a>
                            </div>";
                        }
                         ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Descricão</th>
                                    <th>Imagem</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM tab_jogo";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $tab_jogo)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $tab_jogo['pk_id_jogo']; ?></td>
                                                <td><?= $tab_jogo['nome_jogo']; ?></td>
                                                <td><?= $tab_jogo['desc_jogo']; ?></td>
                                                <td><img style="max-width: 100px; max-height: 100px;" src="<?php echo $tab_jogo['img_jogo']; ?>"></td>
                                                <td>
                                                    <a href="view.php?pk_id_jogo=<?= $tab_jogo['pk_id_jogo']; ?>" class="btn btn-info btn-sm">Visualizar</a>
                                                    <a href="edit.php?pk_id_jogo=<?= $tab_jogo['pk_id_jogo']; ?>" class="btn btn-success btn-sm">Editar</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_jogo" value="<?=$tab_jogo['pk_id_jogo'];?>" class="btn btn-danger btn-sm">Deletar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> Nenhum jogo cadastrado </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>