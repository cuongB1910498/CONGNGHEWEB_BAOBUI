<?php
    
    $stmt = $pdo->prepare(
        "SELECT * FROM users WHERE username = :usn"
    );

    $stmt->execute([
        'usn' => $_SESSION['dangnhap']
    ]);
    $row = $stmt->fetch();

    
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        $query = $pdo->prepare(
            "UPDATE users SET phone = :pn, address = :ad WHERE username = :usn"
        );
        $query->execute([
            'pn' => $phone,
            'ad' => $address,
            'usn' => $_SESSION['dangnhap']
        ]); 
        echo '<script type="text/javascript">'; 
        echo 'alert("ĐÃ CẬP NHẬT");';
        echo 'window.location.href = "index.php?quanly=acc_info";';
        echo '</script>';
    }
    

    
?>
<div class="row offset-1">
    <h1>Thông tin tài khoảng</h1>
    <form method="post">

        <div class="form-group row mb-3">
            <label class="col-2" for="username">USERNAME: </label>
            <div class="col-5"><input id="my-input" class="form-control" type="text" name="" disabled value="<?php echo $row['username'] ?>"></div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-2" for="phone">ĐIỆN THOẠI: </label>
            <div class="col-5"><input id="phone" class="form-control" type="text" name="phone" value="<?php echo $row['phone'] ?>"></div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-2" for="diachi">ĐỊA CHỈ: </label>
            <div class="col-5"><input id="diachi" class="form-control" type="text" name="address" value="<?php echo $row['address'] ?>"></div>
        </div>

        <div class="form-group row mb-3">
            <div class="col-2"><button class="btn btn-primary" type="submit" name="capnhat" >CẬP NHẬT</button></div>
        </div>
    </form>


    <?php
        if($row['nhatuyendung'] == 0){
    ?>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary col-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Xin duyệt tài khoản
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">HÃY CHẮT RẰNG BẠN NẮM KỸ CÁC THÔNG TIN SAU</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>- Hãy chắt rằng các thông tin của bạn là chính xác</p>
            <p>- Mọi hành vi lừa đảo sẽ bị Khóa vĩnh viễn</p>
            <p>- Bạn phải chịu trách nhiệm cho những gì mình đăng tải</p>
            <p>- Nếu hợp lệ, bạn sẽ được duyệt trong 24h</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            <a href="src/modules/ql_acc/xuly.php" class="btn btn-primary">Xác nhận</a>
            
        </div>
        </div>
    </div>
    </div>

    <?php
        }elseif($row['nhatuyendung'] == 1){
            echo '<button class="btn btn-primary col-2" type="button" disabled>Đã duyệt</button>';
        }else{
            echo '<button class="btn btn-primary col-2" type="button" disabled>Đang xét duyệt</button>';
        }
    ?>
    
</div>