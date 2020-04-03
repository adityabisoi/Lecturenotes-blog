<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
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
</head>
<body class="body1">
    <?php

    session_start();    //start the session

    $pass=$email=$emailErr=$passErr="";
    if (!empty($_POST)) {
        $status= true;
        if (empty($_POST['email'])) {
            $emailErr="Cannot remain empty";
            $status=false;
        }
        else {
            $email=$_POST['email'];
        }
        if (empty($_POST['password'])) {
            $passErr="Cannot remain empty";
            $status=false;
        }
        else {
            $pass=sha1($_POST['password']);
        }

        $servername= "localhost";
        $username= "root";
        $password= "";
        $dbname="blognew";

        //create connection
        $com= new mysqli($servername, $username, $password,$dbname);

        //check connection
        if ($com->connect_error ) {
            die("Connection failed ".$com->connect_error);
        }
        else{

        if ($status) {
            $sql="SELECT id,first_name, last_name, email, image
                FROM signup WHERE email='$email' AND password='$pass'";
            $result=$com->query($sql);//finding out how many rows are being returned
            if ($result->num_rows > 0) {
                $record= $result->fetch_assoc();//converting result to associative array
                $_SESSION['loggedin']=true; //loggedin can be anything
                $_SESSION['userDetails']=$record;
               // $_SESSION['']=$record
                echo "Valid user.";
                header ("Location: profile3.php");
            }
            else{
                echo "Invalid credentials. <br>";
            }
        $com->close();
        }
    }

     }
    ?>
               <nav>
                <img class="logo" src="logo.png">
                <ul>
                  <li><a href="home.php">Home</a></li>
                  <li><a href="about.php">About me</a></li>
                  <li><a href="signup.php">Signup</a></li>
                  <li><a class="active" href="login.php">Login</a></li>
                </ul>
              </nav>
        <div class="wrap">
 
    <h1>Login</h1>
    <form method="POST" >
        <p>email:</p>
        <input type="text" name="email" id="email" placeholder="abc@xyz.com"><br>
        <?php echo $emailErr."<br>" ?>
        <p>Password:</p>
        <input type="password" name="password" id="password" placeholder="password"><br>
        <?php echo $passErr."<br>" ?>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
