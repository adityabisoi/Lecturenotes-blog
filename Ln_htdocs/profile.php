<?php //starting session
session_start();

$servername= "localhost";
$username= "root";
$password= "";
$dbname="blognew";
 $com= new mysqli($servername, $username, $password,$dbname); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

    if($_SESSION['loggedin']===true)
    {
      echo "Welcome"."<br>";
      echo $_SESSION['userDetails']['id']."<br>";
      echo $_SESSION['userDetails']['first_name']."<br>";
      echo $_SESSION['userDetails']['last_name']."<br>";
      echo $_SESSION['userDetails']['email']."<br>";
    }
    else{
      header('Location: login.php');
    }
     ?>
     <!--session: sstored in server
     cookie: stored in browser
     $_SESSION //available to all the pages
     -->

     <!--php of POST-->
     <?php


     $title=$desc=$titleErr=$descErr=$postsresult="";
     $id=$_SESSION['userDetails']['id'];
     $status= true;
     $servername= "localhost";
     $username= "root";
     $password= "";
     $dbname="blognew";



     if (!empty($_POST)) {

         if (empty($_POST['title'])) {
             $titleErr="Cannot remain empty";
             $status=false;
         }
         else {
             $title=$_POST['title'];
         }
         if (empty($_POST['description'])) {
             $passErr="Cannot remain empty";
             $status=false;
         }
         else {
            $desc=$_POST['description'];
         }

          if ($status) {

              $sql="INSERT INTO post (title,description,user_id) values('$title','$desc','$id')";
             $result=$com->query($sql);//finding out how many rows are being returned

     }

      }
     ?>
     <img src=<?php echo $_SESSION['userDetails']['image']; ?> alt="">
     <a href="logout.php">Logout</a><br><br>

     <form class="wrapper" method="post">
       Title:<input type="text" name="title"><br><br>
       <?php echo $titleErr."<br>" ?>
       Description:<br>
       <textarea name="description" rows="10" cols="80"></textarea><br>
       <?php echo $descErr."<br>" ?>
       <input type="submit" value="submit" name="submit">

     </form>
     <?php
        $sql1="SELECT title, description from post INNER JOIN users ON post.user_id=signup.id WHERE user_id=$id";
        $postsresult = $com->query($sql1);

        while ($row=$postsresult->fetch_assoc()) {
            echo "<div><h1>".$row['title']."</h1>";
            echo "<p>".$row['description']."</p></div>";
        }
        $com -> close();

        ?>
  </body>
</html>//
