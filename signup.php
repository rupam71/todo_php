<?php 
session_start();
$name=@$_POST['name']; 
$email=@$_POST['email'];
$password=@$_POST['password']; 
$phone=@$_POST['phone'];
$t=time();
$message = "Null";
$link = mysqli_connect("localhost","root","","todo");

if($link === false) {
    die ("ERROR: Could Not Connect");
}

$result=mysqli_query($link,"SELECT count(email) as total from usertable WHERE email='$email'");
$data=mysqli_fetch_assoc($result);

if ($data['total'] == 0){
    $sql = "INSERT INTO usertable (id, name, email, password, phone) 
    VALUES ('$t','$name', '$email','$password', '$phone')";

    if(mysqli_query($link, $sql)){
        $message = "add"; 
    } else {
    echo "ERROR: Could Not Able To Execute $sql."; 
    }
} else {
    $message = "user"; 
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
        <a class="navbar-brand text-white" href="index.html">
          <i class="fas fa-clipboard-list"></i>
          Todo Land
        </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
          <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-item nav-link" id="signup" href="#">Sign Up</a>
              <a class="nav-item nav-link" href="#" id="login">Login</a>
            </div>
          </div>
    </nav>

    <div class="container">
        <div class="row header">
            <div class="col-md-4" style="padding: 102px 16px 0;">
                <img class="image-left" src="welcome-left.png" alt="left">
            </div>
            <div class="col-md-4" style="align-self: center;">
                <div id="mid" class="text-center">
                <?php 
                    if(empty($name)){
                        echo '
                            <h1>Todo Land</h1>
                            <h4>Create Todo, Save Time</h4>
                            <button id="signup2" type="button" class="btn btn-primary m-3">Sign Up</button>
                            <button id="login2" type="button" class="btn btn-info m-3">Login</button>
                        ';
                    } else if($message=='add'){
                        echo '
                            <h1>Welcome To Todo Land</h1>
                            <h4>Login, And Create Unlimited Todo With Us.</h4>
                            <button id="login2" type="button" class="btn btn-info m-3">Login</button>
                        ';
                    } else {
                        echo '
                            <h1>Email Already Used</h1>
                            <h4>Please Sign Up again with unique email.</h4>
                            <div style="text-align: left;">
                            <form action="signup.php" method="POST">
                                            <div class="form-group">
                                                <label">Name</label>
                                                <input type="text" name="name" class="form-control" required placeholder="Enter Name">
                                            </div>
                                            <div class="form-group">
                                                <label">Email address</label>
                                                <input type="email" name="email" class="form-control" required placeholder="Enter email">
                                            </div>
                                            <div class="form-group">
                                                <label">Password</label>
                                                <input type="password" name="password" class="form-control" required placeholder="Password">
                                            </div> 
                                            <div class="form-group">
                                                <label">Phone Number</label>
                                                <input type="text" name="phone" class="form-control" required placeholder="Enter Phone Number">
                                            </div>      
                                            <button type="submit" class="btn btn-primary m-2">Submit</button>
                                        </form>
                                        <button onClick="window.location.reload();" class="btn btn-primary m-2">Cancel</button></div>;
                        ';
                    }
                ?>
                </div>
            </div>
            <div class="col-md-4" style="padding: 44px 0 0 100px;">
                <img class="image-right" src="welcome-right.png" alt="right" >
            </div>
        </div>
    </div>

</body>
</html>
