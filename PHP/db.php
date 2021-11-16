<?php

Class TODODB{

    var $servername = "Localhost";
    var $username = "root";
    var $password = "";
    var $db = "todo";
    var $tbname = "todolist";
    var $tbcomplete = "complete_todo";
    


    public function connect(){

        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->db);
        return $conn;

    }
    //insert data
    public function insertData($todoname){
        $conn=$this->connect();
        mysqli_query($conn, "INSERT INTO ".$this->tbname."(todo_name) VALUES ('$todoname')") or die (mysqli_error($conn));
        
        echo "<script>alert('TODO Added Succesfully!')</script>";
        echo "<script>window.location='index.php'</script>";
        exit();
        
    }

    //get todolist from the database
     public function getData(){
        $conn=$this->connect();

       $result = mysqli_query($conn, "SELECT * FROM ".$this->tbname) or die (mysqli_error($conn));

        if(mysqli_num_rows($result)>0){
            return $result;
        }
    }
    
   //completed todo from 
    public function insertCompleteData($todoname){
        $conn=$this->connect();
        
        mysqli_query($conn, "INSERT INTO ".$this->tbcomplete."(todo_completed) SELECT todo_name FROM todolist WHERE todo_name='$todoname'") or die (mysqli_error($conn));
        

        echo "<script>alert('TODO Added Succesfully!')</script>";
        echo "<script>window.location='index.php'</script>";
        
        exit();
        
    }

    public function deleteData($tbname){
      
    }
  

}