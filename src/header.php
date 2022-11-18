<!-- header -->
<div class="header bg-light row mb-3">
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
              if(isset($_SESSION['dangnhap']) || isset($_SESSION['nhatuyendung'])){
            ?>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             <?php if(isset($_SESSION['dangnhap'])) echo $_SESSION['dangnhap']; else echo $_SESSION['nhatuyendung']?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="index.php?quanly=acc_info">Accout information</a></li>
              <li><a class="dropdown-item" href="src/acc/logout.php">Log out</a></li>          
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
            <a class="nav-link <?php
            if(!isset($_SESSION['dangnhap']) && !isset($_SESSION['nhatuyendung'])) echo "disabled";
          ?>" href="index.php?quanly=job"><i class="fa-solid fa-plus"></i> New Memo</a>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              List Job
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <?php 
                $dm = $pdo->prepare("SELECT * FROM danhmucviec");
                $dm -> execute();
                while($dmviec = $dm->fetch()){
              ?>
              <li><a class="dropdown-item" href="index.php?quanly=danhmuc&id=<?php echo $dmviec['id_danhmuc'] ?>"><?php echo $dmviec['tendanhmuc'] ?></a></li>
              <?php
                }
              ?>
            </ul>
          </li>
        </ul>
      </div>
      <form class="d-flex" action="index.php?quanly=timkiem" method="POST">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="key">
        <button class="btn btn-warning" type="submit">Search</button>
      </form>
    </div>
  </nav>
</div>