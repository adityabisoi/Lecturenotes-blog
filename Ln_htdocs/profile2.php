<?php
   // start session
   session_start();
	if($_SESSION['loggedin'] !== true) {
		header('Location: login.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <!-- Fetch Data from another web page -->
    

    <h1>Profile page</h1>
<?php

    echo "welcome user<br>";
        
        echo $_SESSION['userDetails']['id']."<br>";
        echo $_SESSION['userDetails']['first_name']."<br>";
        echo $_SESSION['userDetails']['last_name']."<br>";
        echo $_SESSION['userDetails']['email']."<br><br>";
        $imgs = $_SESSION['userDetails']['images'];
        
      
 ?>
 <a href="logout.php">Logout</a><br><br>
 <img src="<?php echo $imgs ?>" alt="">

 

    <!-- validation and fill value -->
 <?php

 $titleErr =$desErr="";
 $title = $description="";
 $status=true;
 $id= $_SESSION['userDetails']['id'];
 $postsResult="";

 $servername="localhost";
 $username="root";
 $password="";
 $db="blognew";
 $conn = new mysqli($servername, $username, $password, $db);

 //Check Error
         if($conn->connect_error)
         {
             die("Connection Failed: ". $conn->connect_error);
         }


     if(!empty($_POST))
     {
        
         if(empty($_POST['title']))
         {
             $titleErr = "Title must be filled";
             $status=false;
         }
         else {
             $title = $_POST['title'];
         }

         if(empty($_POST['description']))
         {
             $desErr = "Description must be filled";
             $status=false;
         }
         else {
             $description = $_POST['description'];
         }
     

     if($status)
     {
         // Insert Into Database
         $sql="INSERT INTO post (title, description, user_id)
               values('$title','$description', '$id')";
         $result = $conn->query($sql);
            
     }

     }
     
 ?>


    <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">

        Title:<input type="text" name="title"><br><br>
        <p><?php echo $titleErr; ?></p>

        Description:<textarea name="description"  cols="30" rows="10"></textarea><br><br>
        <p><?php echo $desErr; ?></p>


        <input type="submit" name="submit" value="submit">
    </form>


    <?php
    
    $sql = "SELECT title, description FROM post INNER JOIN users ON post.user_id = signup.id WHERE user_id = $id";
	$postsResult = $conn->query($sql);

    while($row = $postsResult->fetch_assoc())
    {
		echo "<div><h3>".$row["title"]."</h3>";
		echo "<p>".$row["description"]."<p></div>";
    }	
    
    $conn->close();
    
    ?>
    
</body>
</html>