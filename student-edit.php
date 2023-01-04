<?php
session_start();
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="student-create.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Editar Estudante</title>
  </head>
  <body>

    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col">
                <div class="card position-absolute top-50 start-50 translate-middle col-md-6">
                    <div class="card-header">
                        <h4>Editar Estudante
                            <a href="index.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">

                    <?php
                    if(isset($_GET['id'])) 
                    {
                        $student_id = mysqli_real_escape_string($con, $_GET['id']);
                        $query = "SELECT * FROM students WHERE id='$student_id'";
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            $student = mysqli_fetch_array($query_run);
                            ?>


                            <form action="code.php" method="POST">
                                <input type="hidden" name="student_id" value="<?= $student['id']; ?>">
                                <div class="mb-3">
                                    <label>Nome do Estudante</label>
                                    <input type="text" name="name" value="<?=$student['name'];?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Email do Estudante</label>
                                    <input type="email" name="email" value="<?=$student['email'];?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Numero do Estudante</label>
                                    <input type="text" name="phone" value="<?=$student['phone'];?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Curso do Estudante</label>
                                    <input type="text" name="course" value="<?=$student['course'];?>" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <button type="submit" name="update_student" class="btn btn-primary">Atualizar Estudante</button>
                                </div>

                            </form>

                        
                        <?php
                        }
                        else 
                        {
                            echo "<h4>No Such Id Found</h4>";
                        }
                    }
                    ?>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>