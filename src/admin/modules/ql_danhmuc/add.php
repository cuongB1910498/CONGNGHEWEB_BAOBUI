<?php
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $tendanhmuc = $_POST['tendanhmuc'];
        $trangthai = $_POST['trangthai'];

        $sql = $pdo->prepare(
            "INSERT INTO danhmucviec(tendanhmuc, trangthai_dm) VALUE(:ten, :tt)"
        );
        $sql->execute([
            'ten' => $tendanhmuc,
            'tt' => $trangthai
        ]);

       
        header("Location: index.php?quanly=list");
        
    }
?>
<form method="post" class="row offset-2">
    <h2 class="mb-3">THÊM DANH MỤC VIỆC LÀM</h2>
    <div class="form-group row mb-3">
        <label for="tendanhmuc" class="col-2">TÊN DANH MỤC</label>
        <div class="col-5"><input id="tendanhmuc" class="form-control" type="text" name="tendanhmuc"></div>
    </div>

    <div class="form-group row mb-3">
        <label for="trangthai" class="col-2">TRẠNG THÁI</label>
        <div class="col-5"><input id="trangthai" class="form-control" type="text" name="trangthai"></div>
    </div>

    <div class="form-group row mb-3">
        <button class="btn btn-primary col-1 offset-3" type="submit">THÊM</button>
    </div>

</form>
<a class="btn btn-warning col-1" href="index.php?quanly=list">Back</a>