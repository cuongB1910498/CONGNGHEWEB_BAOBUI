<?php
    session_start();
    if(isset($_SESSION['admin'])){

    }else{
        header("Location: ../acc/login.php");
    }

    include ("../conect/conect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <!-- bootrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- font anwsome -->
    <script src="https://kit.fontawesome.com/5644bf12f0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand">EW JOB</a>
              
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            
            
            <?php
              if(isset($_SESSION['admin'])){
            ?>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             <?php echo $_SESSION['admin'] ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Accout information</a></li>
              <li><a class="dropdown-item" href="../acc/logout_admin.php">Log out</a></li>          
            </ul>

            <?php
              }else{
            ?>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Account
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="src/acc/login.php">Login</a></li>
              <li><a class="dropdown-item" href="src/acc/register.php">Register</a></li>          
            </ul>

            <?php
              }
            ?>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?quanly=list">List control</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="index.php?quanly=duyet">Approval Memo</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="index.php?quanly=acc">Approval Account</a>
          </li>
          
        </ul>
      </div>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-warning" type="submit">Search</button>
      </form>
    </div>
  </nav>
</header>
    
<!-- <div class="container-fluid">
           
<div class="btn-group">
<a href="#" class="btn btn-primary">Quản lý danh mục bài viết</a>
<a href="#" class="btn btn-primary">Duyệt bài viết</a>
<a href="#" class="btn btn-primary"></a>
<a class="btn btn-warning" href="../acc/logout.php">Đăng xuất</a>
</div>
</div> -->
<div class="main">
  <div class="container">  
    <?php
        if(isset($_GET['quanly'])){
          $tam = $_GET['quanly'];
        }else{
          $tam = '';
        }

        if($tam == 'list'){
          include("modules/ql_danhmuc/list.php");
        }elseif($tam == 'themdanhmuc'){
          include("modules/ql_danhmuc/add.php");
        }elseif($tam == 'suadanhmuc'){
          include("modules/ql_danhmuc/edit.php");
        }elseif($tam == 'xoadanhmuc'){
          include("modules/ql_danhmuc/del.php");
        }elseif($tam == 'duyet'){
          include("modules/duyetbai/duyetbai.php");
        }elseif($tam == 'xembai'){
          include("modules/duyetbai/xembai.php");
        }elseif($tam == 'acc'){
          include("acc_control/list_acc.php");
        }elseif($tam == 'duyet_acc'){
          include("acc_control/duyet_acc.php");
        }elseif($tam == 'chitietbai'){
          include("modules/qlbai/chitietbai.php");
        }
        
        else{
            include("modules/index.php");
        }
    ?>

    </div>
</div>

<!-- <footer>
        <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-info"> -->
            <!-- Copyright -->
            <!-- <div class="text-white mb-3 mb-md-0">
            Copyright © 2020. All rights reserved.
            </div> -->
            <!-- Copyright -->

            <!-- Right -->
            <!-- <div>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-google"></i>
            </a>
            <a href="#!" class="text-white">
                <i class="fab fa-linkedin-in"></i>
            </a>
            </div> -->
            <!-- Right -->
        <!-- </div>
    </footer>
     -->
</body>
</html>