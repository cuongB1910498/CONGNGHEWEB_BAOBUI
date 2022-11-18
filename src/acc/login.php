<?php 
    session_start();
    include ("../conect/conect.php");
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $stmt = $pdo->prepare(
            "SELECT * FROM users WHERE username = :usn AND password = :pwd"
        );
        $stmt->execute([
            'usn' => $username,
            'pwd' => $password
        ]);

        $row = $stmt->fetch();
        //echo $row['admin'];
        $count = $stmt->rowCount();
        //echo $row['nhatuyendung'];
        if($count > 0){
            if($row['admin'] == 1){
                $_SESSION['admin'] = $username;
                header("Location: ../admin/index.php");
                
            }
            if($row['nhatuyendung'] == 1){
                $_SESSION['dangnhap'] = $username;
                $_SESSION['nhatuyendung'] = $username;
                $_SESSION['thongbao'] = 1;
                header("Location: ../../index.php");
            }
            if($row['nhatuyendung'] == 0 && $row['admin'] == 0){
                $_SESSION['dangnhap'] = $username;
                $_SESSION['thongbao'] = 1;
                header("Location: ../../index.php");
            }
        }else{
            echo "<script type='text/javascript'>alert('Tài khoảng hoặc mật khẩu chưa đúng');</script>";
        }
        //unset($_SESSION['nhatuyendung']);
        //echo $_SESSION['nhatuyendung'];
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <!-- bootrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- font anwsome -->
    <script src="https://kit.fontawesome.com/5644bf12f0.js" crossorigin="anonymous"></script>
    <title>LOGIN</title>
</head>
<body>
    <section class="form">    
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="../img/draw2.webp"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="post">
                <div class="div_h2">
                    <h2>LOGIN</h2>
                </div>
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="usn">Username: </label>
                    <input type="text" id="usn" class="form-control form-control-lg"
                    placeholder="Enter a valid email address" name="username" />
                    
                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                    <label class="form-label" for="pwd">Password:</label>
                    <input type="password" id="pwd" class="form-control form-control-lg"
                    placeholder="Enter password" name="password" />
                    
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <!-- Checkbox -->
                    <div class="form-check mb-0">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                    <label class="form-check-label" for="form2Example3">
                        Remember me
                    </label>
                    </div>
                    <a href="register.php" class="text-body">Don't have accout? Sign up here</a>
                </div>

                <div class="text-center text-lg-start mt-4 pt-2" id="login">
                    <button type="submit" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;" name="login">Login</button>
                </div>

                </form>
            </div>
            </div>
        </div>
        <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-secondary">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
            Copyright © 2020. All rights reserved.
            </div>
            <!-- Copyright -->

            <!-- Right -->
            <div>
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
            </div>
            <!-- Right -->
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    
</body>
</html>