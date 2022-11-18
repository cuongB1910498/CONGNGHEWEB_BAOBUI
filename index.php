<?php
  session_start();
  include ("src/conect/conect.php");
  if(isset($_SESSION['thongbao'])){
    echo "<script type='text/javascript'>alert('BẠN ĐÃ ĐĂNG NHẬP');</script>";
    unset($_SESSION['thongbao']);
  }
  if(isset($_SESSION['dangky'])){
    echo "<script type='text/javascript'>alert('ĐĂNG KÝ THÀNH CÔNG');</script>";
    unset($_SESSION['dangky']);
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>INDEX</title>
  <!-- bootrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- font anwsome -->
  <script src="https://kit.fontawesome.com/5644bf12f0.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="src/css/style.css">
</head>
<body>
  
    
 
  <?php
    include("src/header.php");
    include("src/main.php");
    include("src/footer.php");
  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
</body>
</html>