<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
</head>

<body>
  <?php
    $x=3000;
    if($x<=100)
      $gift="rose";
    else if($x>100 && $x<=500)
      $gift="Perfume" ;
    else if($x>500 && $x<=2000)
      $gift="Date";
    else{
      $gift="Ring";
    }
    echo $gift;
    ?>
</body>

</html>
