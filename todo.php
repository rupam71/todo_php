<?php 
session_start();
$id=$_SESSION["id"];
$name=$_SESSION["name"];
$email=$_SESSION["email"];
$password=$_SESSION["password"];
$phone=$_SESSION["phone"];
$t=time()+10000; 
$todo =@$_POST['todo'];

if(empty($id)){
    header("Location: http://localhost/todo/index.html");
        exit();
}

    $link = mysqli_connect("localhost","root","","todo");
    if($link === false) {
        die ("ERROR: Could Not Connect");
    }

    if (isset($_POST['save'])) {
        $sql = "INSERT INTO todotable (todoId, userId, todo) 
        VALUES ('$t','$id', '$todo')";

        if(mysqli_query($link, $sql)){
            $message = "add"; 
        } else {
        echo "ERROR: Could Not Able To Execute $sql."; 
        }
    }

    if (isset($_GET['del'])) {
         $delId = $_GET['del'];
         mysqli_query($link, "DELETE FROM todotable WHERE todoId=$delId");
    }

    if(isset($_GET['bel'])){
        $_SESSION["id"] = '';
        $_SESSION["name"] = '';
        $_SESSION["email"] = '';
        $_SESSION["password"] = '';
        $_SESSION["phone"] = '';
        header("Location: http://localhost/todo/index.html");
        exit();
    }

     mysqli_close($link);
?> 






<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="style.css">

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d3a491f6c0.js" crossorigin="anonymous"></script>
   <!-- // <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />
     -->
    <title>
      TodoLand
    </title>

    <script src="style.js"></script>
   

  </head>

  <body class="body"> 
    
    <nav class="navbar navbar-dark navbar-expand" style="background-color: #48484A;">
        <a class="navbar-brand text-white" href="#" onClick="window.location.reload();">
          <i class="fas fa-clipboard-list"></i>
          Todo Land
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
          <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-item nav-link" ><?php echo $_SESSION["name"] ?></a>
              <a class="nav-item nav-link" href='todo.php?bel=logout '>Logout</a>
            </div>
          </div>
    </nav>

   <div class="container">
    
    <h1 class="text-center">Your Todo</h1>

    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col" class="col-9">Todo</th>
            <th scope="col" class="col-2">Time</th>
            <th scope="col" class="col-1">Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $link = mysqli_connect("localhost","root","","todo");
            if($link === false) {
                die ("ERROR: Could Not Connect");
            }
            $sql = "SELECT * FROM todotable WHERE userId='$id'";
            $result = $link->query($sql);
            while($row = $result->fetch_assoc()) {
                echo '
                    <tr>
                        <td>' . $row["todo"] . '</td>
                        <td>' . $row["time"] . '</td>
                        <td>
                            <a href="todo.php?del= ' . $row["todoId"] . ' " ><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                ';
            }

            mysqli_close($link);
        ?> 
        </tbody>
    </table>

    <form method="post" action="todo.php" >
      <div class="input-group mb-3 mt-3">
        <input type="text" class="form-control" placeholder="Add Todo" name="todo" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit" name="save">+</button>
        </div>
      </div>
    </form>


   </div>
   
     

</body>
</html>
