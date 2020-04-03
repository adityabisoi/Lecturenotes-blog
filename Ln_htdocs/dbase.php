<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post">
      First name:<input type="text" name="fname"><br>
      <br>
      Last name:<input type="text" name="lname"><br>
      <br>
      E-mail:<input type="email" name="email"><br>
      <br>
      Password:<input type="password" name="pass"><br><br>
      <input type="submit" name="submit" value="submit">
    </form>
    <?php
    $fname=$lname=$email=$pass="";
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $pass=sha1($_POST['pass']);
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="blognew";
    //create connection
    $conn=new mysqli($servername,$username,$password,$dbname);
    //check connection
    if($conn -> connect_error)
    {
      die("Connection failed".$conn -> connect_error);
    }

    else {
      echo "connection successful";
    }
    $sql="INSERT INTO  users (first_name,last_name,email,password)
    VALUES ('$fname','$lname','$email','$pass')";

    if($conn -> query($sql))
    {
      echo "New record created successfully";
    }
    else{
      echo "Error".$sql."<br>".$conn -> error;
    }
    $conn -> close();
     ?>
  </body>
</html>
