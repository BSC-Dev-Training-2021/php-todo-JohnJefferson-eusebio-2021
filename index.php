<?php
    session_start();
     
     require_once 'PHP/component.php';

     
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>To Do List</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/app.js"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/font-awesome.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">To Do</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="completed.php">Completed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="settings.html">Settings</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="" method="post" class="input-group input-group-lg mt-5">
                       
                        <input type="text" name="todoname" class="form-control" aria-label="Text inout with segmented dropdown button">
                        <div class="input-group-append">
                            <button type="submit" name="create_todo" class="btn btn-primary">Create Todo</button>
                        </div>
                    </form>

                    <?php

                          if(isset($_POST['create_todo'])){
                            include 'PHP/db.php';
                            require_once 'PHP/component.php';
                            $todoname = $_POST['todoname'];

                
                            $obj = new TODODB();
                            $obj -> insertData($todoname);
                           
                        }
                      
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <!-- Tasks section-->
                    <section>
                        <ul class="list-group list-group-flush">
                            <?php
                                include 'PHP/db.php';
                                $obj = new TODODB();
                                $result = $obj->getData();
                                while($row = mysqli_fetch_assoc($result)){
                                    component($row['todo_name'], $row['id']);
                                } 

                                
                            ?>
                            <?php
                        
                                if(isset($_POST['complete_todo'])){

                                    $todoname = $_POST['todoname'];
                                        $obj1 = new TODODB();
                                        $obj1 -> insertCompleteData($todoname);
                                    
                                   
                                
                                }
                            ?>
                            <?php
                        
                                if(isset($_POST['remove'])){

                                    $todoname = $_POST['todoname'];
                                        $obj2 = new TODODB();
                                        $obj2 -> deleteData($todoname);
                                    
                                
                                
                                }
                            ?>
                        </ul>
                    </section>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <section>
                <div class="modal" id="deleteConfirmModal" tabindex="-1" data-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Task?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete this task?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>