<!DOCTYPE html>
<html >
<head>

    <title></title>
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

        $fn=$ln=$em=$ps=$ph=$un="";
        $fNameErr= $lNameErr=$passErr= $eMailErr=$phErr=$fileErr=$unErr="";
        $status= true;
        if (!empty($_POST)) {
            if (empty($_POST['fname'])) {
                $fNameErr="Cannot remain empty";
                $status=false;
            }
            else {
                $fn=$_POST['fname'];
            }
            if (empty($_POST['lname'])) {
                $lNameErr="Cannot remain empty";
                $status=false;

            }
            else {
                $ln=$_POST['lname'];
            }
            if (empty($_POST['email'])) {
                $eMailErr="Cannot remain empty";
                $status=false;

            }
            else {
                $em=$_POST['email'];
            }

            if (empty($_POST['pass'])) {
                $passErr="Cannot remain empty";
                $status=false;

            }
            else {
                $ps=sha1($_POST['pass']);
            }
            if (empty($_POST['phone'])) {
                $phErr="Cannot remain empty";
                $status=false;

            }
            else {
                $ph=$_POST['phone'];
            }
            if (empty($_POST['uname'])) {
                $unErr="Cannot remain empty";
                $status=false;

            }
            else {
                $un=$_POST['uname'];
            }
            

            //image upload

            $target_dir="uploads/";
            $target_file=$target_dir.basename($_FILES["profileImg"]["name"]);
            $fileStatus=true;
            //get image

            $imgFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if($imgFileType != "jpg" && $imgFileType !="png")
            {
              $fileErr="Only JPG and PNG files allowed";
              $fileStatus=false;
              $status=false;
            }
            if($fileStatus)
            {
              if(move_uploaded_file($_FILES["profileImg"]["tmp_name"], $target_file)) {
			$status = true;
			//die("File uploaded");
		} else {
			$fileErr= "Issues in file upload";
			$status = false;
		}
            }

        $servername= "localhost";
        $username= "root";
        $paassword= "";
        $dbname="blognew";

        //create connection
        $com= new mysqli($servername, $username, $paassword,$dbname);

        //check coonection
        if ($com->connect_error ) {
            die("Connection failed ".$com->connect_error);
        }
        else{
            if($status){
                $sql="INSERT INTO signup (first_name, last_name, email, password,phone,username,image) values('$fn','$ln','$em','$ps','$ph','$un','$target_file')";

                if ($com->query($sql)) {
                   // echo $ps;

                    echo "New record created successfully.";
                    header ('Location: profile3.php');

                }
                else{
                    echo "Error: ".$sql."<br>".$com->error;
                }
            $com->close();
        }}
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
        <h2>Sign Up here</h2>
        <form  method="POST" enctype="multipart/form-data">

        <input type="text" name="fname" placeholder="Firstname" required autofocus value=<?php echo $fn;?>>
        <p><?php echo $fNameErr ?></p>
        <input type="text" name="lname" placeholder="Lastname" required value=<?php echo $ln;?>>
        <p><?php echo $lNameErr ?></p>
        <input type="email" name="email"  placeholder="abc@xyz.com" value=<?php echo $em;?> >
        <p><?php echo $eMailErr ?></p>
        <input type="number" name="phone" placeholder="Number" value=<?php echo $ph;?> >
        <p><?php echo $phErr ?></p>
        <input type="text" name="uname"  placeholder="UserID" value=<?php echo $un;?> >
        <p><?php echo $unErr ?></p>
        <input type="password" name="pass"  placeholder="password" >
        <p><?php echo $passErr ?></p>

        <input style="color:red" type="file" name="profileImg">
        <p><?php echo $fileErr ?></p>
        <input type="submit" name="submit" value="Submit" >
    </form>
    </div>
</body>

</html>
