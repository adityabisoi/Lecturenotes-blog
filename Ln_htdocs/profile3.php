<?php //starting session
session_start();

$servername= "localhost";
$username= "root";
$password= "";
$dbname="blognew";
 $com= new mysqli($servername, $username, $password,$dbname); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="styles1.css">
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script type="text/javascript">
    $(window).on('scroll', function() {
      if ($(window).scrollTop()) {
        $('nav').addClass('black');

      } else {
        $('nav').removeClass('black');
      }
    })
  </script>
   <style>
        .wrapper1{
          display:grid;
          grid-template-columns: 30% 70%;
          /*
          grid-column-gap:1em;
          grid-row-gap:1em;*/
    
        }
        .wrapper1 > div{
          background:cyan;
          padding:1em;
    
        }
        .wrapper1 > div:nth-child(odd){
          background:#ddd;
        }
      </style>
</head>
<body>
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
         exit;                      

 }

  }
 ?>



<div class="wrapper">
        <nav>
         <img class="logo" src="logo.png">
            <ul>
              <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>

    <section class="sec1">

    </section>
 
            <div class="wrapper1">
                    <div>
                    <center>
                    <?php

                        if($_SESSION['loggedin']===true)

                              {
                                echo '<img src="'.$_SESSION['userDetails']['image'].'" alt="OOPS !!!" width="250" height="250" style=" border-radius:1000px"/>'."<br>";
                                echo "Name:".$_SESSION['userDetails']['first_name']."   ".$_SESSION['userDetails']['last_name']."<br>"."<br>";
                                 echo "E-mail:".$_SESSION['userDetails']['email']."<br>";
                                     }
                                       else{
                                            header('Location: login.php');
                                               }
                     ?>
                     </center>
                    
                      
                
                    </div>
                    <div>
                    <h2 >Create a post</h2>
                    <form method="post">
   Title:<br>
   <input type="text" name="title"><br><br>
   <?php echo $titleErr."<br>" ?>
   Description:<br>
   <textarea name="description" rows="10" cols="80"></textarea><br>
   <?php echo $descErr."<br>" ?>
   <input type="submit" value="submit" name="submit">

 </form>
 <?php
    $sql1="SELECT title, description from post INNER JOIN signup ON post.user_id=signup.id WHERE user_id=$id order by title,description desc";
    // die($sql1);
    if($postsresult = $com->query($sql1)) {

    while ($row=$postsresult->fetch_assoc()) {
        echo "<div><h1><u>".$row['title']."</u></h1>";
        echo "<p>".$row['description']."</p></div>";
    }
  } //else {
    //die($com->error);
  //}
    $com -> close();

    ?>
                          
                    </div>
                  </div>


             </div>
 
     
</body>
</html>