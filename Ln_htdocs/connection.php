<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $servername="localhost";
    $username="root";
    $password="";
    //create connection
    $conn=new mysqli($servername,$username,$password);
    //check connection
    if($conn -> connect_error)
    {
      die("Connection failed".$conn -> connect_error);
    }

    else {
      echo "connection successful";
    }
     ?>
  </body>
</html>
