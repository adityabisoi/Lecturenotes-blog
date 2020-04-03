<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
</head>

<body>
  <?php $fnameErr=$lnameErr=$emailErr="";
    if(!empty($_POST))
    {
     if(empty($_POST['fname']))
       {$fnameErr="Enter first name";}
       if(empty($_POST['lname']))
         {$lnameErr="Enter last name";}
         if(empty($_POST['email']))
           {$emailErr="Enter email";}
    }

    ?>
  <form method="post">
    First name:<input type="text" name="fname"><br>
    <p>
      <?php echo $fnameErr ?>
    </p>
    <br>
    Last name:<input type="text" name="lname"><br>
    <p>
      <?php echo $lnameErr ?>
    </p>
    <br>
    E-mail:<input type="email" name="email"><br>

    <p>
      <?php echo $emailErr ?>
    </p>
    <br>
    <input type="submit" name="submit" value="submit">
  </form>
  <?php
    if(!empty($_POST)){
    echo "First name:".$_POST['fname']."<br>";
    echo "Last name:".$_POST['lname']."<br>";
    echo "Email:".$_POST['email']."<br>";
     }
    ?>


</body>

</html>
