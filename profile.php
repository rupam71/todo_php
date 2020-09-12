<?php 
session_start();
$id=0;
$name="";
$email="";
$password="";
$phone="";
 
$email=$_POST['loginEmail']; echo $email; echo '<br/>';
$password=$_POST['loginPassword']; echo $password;echo '<br/>';

if(empty($email) || empty($password)){
    header("Location: http://localhost/todo/index.html");
    exit();
}

$link = mysqli_connect("localhost","root","","todo");

if($link === false) {
    die ("ERROR: Could Not Connect");
}

$sql = "SELECT id, name, email, password, phone FROM usertable WHERE email='$email'";
$result = $link->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if ($row["password"]==$password){
        $_SESSION["id"]=$row["id"]; 
        $_SESSION["name"]=$row["name"]; 
        $_SESSION["email"]=$row["email"]; 
        $_SESSION["password"]=$row["password"]; 
        $_SESSION["phone"]=$row["phone"];

        header("Location: http://localhost/todo/todo.php");
        exit();
    } else {
       //  echo "Password Not Matched";
       header("Location: http://localhost/todo/loginnotmatch.html");
       exit();
    }
  }
} else {
  // echo "Email Not Matched";
  header("Location: http://localhost/todo/loginnotmatch.html");
 exit();
}

mysqli_close($link);
?>
