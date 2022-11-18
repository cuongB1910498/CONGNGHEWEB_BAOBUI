<?php
    $id_danhmuc = $_GET['id'];
    
    $sql = $pdo->prepare("SELECT * FROM danhmucviec WHERE id_danhmuc = :id");
    $sql->execute(['id' => $id_danhmuc]); 
    $row = $sql->fetch();
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $tendanhmuc = $_POST['tendanhmuc'];
        $trangthai = $_POST['trangthai'];

        $query = $pdo -> prepare(
            "UPDATE danhmucviec SET tendanhmuc = :ten , trangthai = :tt"
        );
        $query->execute([
            'ten'=> $tendanhmuc,
            'tt' => $trangthai
        ]);

        header("Location: index.php?quanly=list");
    }
?>
<form method="post" class="row offset-1">
    <h2 class="mb-3">SỬA DANH MỤC VIỆC LÀM</h2>
    <div class="form-group row mb-3">
        <label for="tendanhmuc" class="col-2">TÊN DANH MỤC</label>
        <div class="col-3">
            <input id="tendanhmuc" class="form-control" type="text" value="<?php echo $row['tendanhmuc'] ?>" disabled>
        </div>
        <div class="col-1">--></div>
        <div class="col-4"><input class="form-control" type="text" name="tendanhmuc"></div>
    </div>

    <div class="form-group row mb-3">
        <label for="trangthai" class="col-2">TRẠNG THÁI</label>
        <div class="col-3">
            <input id="trangthai" class="form-control" type="text" value="<?php echo $row['trangthai'] ?>" disabled>
        </div>
        <div class="col-1">--></div>
        <div class="col-4"><input class="form-control" type="text" name="trangthai"></div>
    </div>

    <div class="form-group row mb-3">
        <button class="btn btn-primary col-1 offset-4" type="submit">Change</button>
        
    </div>
    <a class="btn btn-warning col-1" href="index.php?quanly=list">Back</a>

</form>