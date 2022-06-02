<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Sistema de Busca</title>
</head>

<body>

    <section>
        <div class="container mt-4">
            <div class="d-flex justify-content-center bg-dark text-white">
                <h3>Busca de Livros</h3>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <div class="content-form d-flex justify-content-center">
                    <form method="get" action="">
                        <div class="mb-3 mt-3">
                            <label class="form-label">Nome do Livro</label>
                            <input type="text" name="livro" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-dark">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="d-flex justify-content-center bg-dark text-white mt-5">
                <h5>Registro Livros</h5>
            </div>
            <div class="mt-5 reg-livros">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Livro</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        require('conexao.php');
                        error_reporting(0);

                        $nome_livro = "%". trim($_GET['livro']) . "%";

                        if(!isset($_GET['livro'])){                           
                            exit;

                        }else{
                            $sql = "SELECT id_livro, nome FROM `livro` WHERE `nome` LIKE :nome";
                            $result = $pdo->prepare($sql);
                            $result->bindParam(':nome', $nome_livro);
                            $result->execute();
    
                            $row = $result->fetchAll(PDO::FETCH_ASSOC); 
                        }

                        

                        foreach($row as $rows){?> 
                        <tr>
                            <th scope="row"><?php echo $rows['id_livro'] ?></th>
                            <td><?php echo $rows['nome']?></td>
                        </tr>
                        
                        <?php } ?>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </section>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>