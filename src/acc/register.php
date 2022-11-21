<?php 
    include ("../conect/conect.php");
    session_start();
    $found = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // kiem tra username
        $find_usn =$pdo->prepare(
            "SELECT * FROM users WHERE username = :usn LIMIT 1"
        );

        $find_usn->execute([
            'usn' => $_POST['username']
        ]);

        $num = $find_usn->rowCount();
        if($num > 0){
            $found = true;
        }else{
            $stmt = $pdo->prepare(
                "insert into users(username, password, phone, address) values (:username, :pw, :phone, :address)"
            );
    
            $stmt->execute([
                'username' => $_POST['username'],
                'pw' => md5($_POST['password']) ,
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
            ]);
        }

        if(isset($stmt)){
            $_SESSION['dangky'] = 1;
            header("Location: ../../index.php");
        }
        

    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <section class="form">
        <div class="container-fluid h-custom mb-3">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="../img/draw2.webp"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="post" id="register_form">
                <div class="div_h2 mb-3">
                    <h2>Register</h2>
                </div>
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="usn">Username : </label>
                    <input type="text" id="usn" class="form-control form-control-lg"
                    placeholder="Enter a valid email address" name="username" />
                    <?php if($found == true){ ?><lable class="error">Tài khoảng đã có người sử dụng!!!</lable><?php } ?>
                    
                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                    <label class="form-label" for="pwd">Password: </label>
                    <input type="password" id="pwd" class="form-control form-control-lg"
                    placeholder="Enter password" name="password" />
                    
                </div>

                <div class="form-outline mb-3">
                    <label class="form-label" for="re_pwd">Repeat password</label>
                    <input type="password" id="re_pwd" class="form-control form-control-lg"
                    placeholder="Repeat password" name="repeat_pass" />
                    
                </div>

                <div class="form-outline mb-3">
                    <label class="form-label" for="phone">Phone number</label>
                    <input type="text" id="phone" class="form-control form-control-lg"
                    placeholder="Phone" name="phone"/>
                    
                </div>

                <div class="form-outline mb-3">
                    <label class="form-label" for="add">address</label>
                    <input type="text" id="add" class="form-control form-control-lg"
                    placeholder="address" name="address"/>
                    
                </div>


                <div class="d-flex justify-content-between align-items-center">
                    <!-- Checkbox -->
                    <div class="form-check mb-0">
                    <div class="grp">
                        <input class="form-check-input me-2" type="checkbox" value="" id="agreee" name="agree"/>
                    </div>
                    <label class="form-check-label" for="agree">
                        Remember me
                    </label>
                    </div>
                    <a href="login.php" class="text-body">You have accout? Login here</a>
                </div>

                <div class="text-center text-lg-start mt-4 pt-2" id="register">
                    <button type="submit" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;" name="register">Register</button>
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

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <script>
		$(document).ready(function (){
			$("#register_form").validate({
				rules:{
					username: {required: true, minlength:5},
					password: {required:true, minlength:6},
                    repeat_pass: {required: true, minlength:6, equalTo: "#pwd"},
                    phone: {required: true, number: true, minlength:10, maxlength:10},
                    address: {required: true, minlength:6},
					agree: {required:true}
				},
				messages:{
					username: {required: "Username không được trống", minlength:"Username quá ngắn!"},
					password: {required:"Mật khẩu không được bỏ trống", minlength:"Mật khẩu quá ngắn"},
                    address: {required: "Không được bỏ trống địa chỉ", minlength:"Địa chỉ quá ngắn"},
                    repeat_pass: {required: "Mật khẩu không được bỏ trống", minlength:"Mật khẩu quá ngắn", equalTo: "Mật Khẩu chưa trùng"},
                    phone: {required: "Số điện thoại không được trống", number: "VUi lòng chỉ nhập số", minlength:"số điện thoại phải có 10 số", maxlength:"số điện thoại phải có 10 số"},
					agree: {required:"Bạn phải chấp nhận quy định của chúng tôi!"}
				}
			})
		});
    </script>
</body>
</html>