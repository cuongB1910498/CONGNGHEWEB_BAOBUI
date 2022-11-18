<?php
    $username = $_SESSION['dangnhap'];
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
       $tenbaiviet = $_POST['tenbaiviet'];
       $mota  = $_POST['mota'];
       $danhmuc = $_POST['danhmuc'];
       $stmt = $pdo->prepare("SELECT * FROM danhmucviec WHERE tendanhmuc = :tendm");
       $stmt->execute(['tendm'=>$danhmuc]);
       $dm = $stmt->fetch();
       $id_danhmuc=$dm['id_danhmuc'];

       

       
       if(!empty($_FILES['file']['name'])){
            //xu ly hinh anh
            $hinhanh = $_FILES['file']['name'];
            $hinhanh_tmp = $_FILES['file']['tmp_name'];
            $location ='src/modules/ql_cv/uploads/';

            $file_extension = pathinfo($location, PATHINFO_EXTENSION);
                    
            $file_extension = strtolower($file_extension);
            
            // Valid image extension
            $valid_extension = array("png","jpeg","jpg");

            $hinhanh_pro = time()."_".$hinhanh.$file_extension;

            move_uploaded_file($hinhanh_tmp, $location.$hinhanh_pro);
            $sql = $pdo->prepare(
            "INSERT INTO vieclam(id_danhmuc, tenviec, mota, username, anhbia, trangthai)
            VALUES (:id, :ten, :mota, :usn, :anh, :tt)");
            $sql ->execute([
                'id' => $id_danhmuc,
                'ten' => $tenbaiviet,
                'mota' => $mota,
                'usn' => $username,
                'anh' => $hinhanh_pro,
                'tt' => 0
            ]);

            header("Location: index.php?quanly=job");
        }else{
            $sql = $pdo->prepare(
                "INSERT INTO vieclam(id_danhmuc, tenviec, mota, username, trangthai)
                VALUES (:id, :ten, :mota, :usn, :tt)");
                $sql ->execute([
                    'id' => $id_danhmuc,
                    'ten' => $tenbaiviet,
                    'mota' => $mota,
                    'usn' => $username,
                    'tt' => 0
                ]);
    
                header("Location: index.php?quanly=job");
        }
    }
?>

<form method="post" class="row offset-1" enctype='multipart/form-data'>
    <h2 class="mb-3">THÊM BÀI VIẾT TÌM ỨNG VIÊN</h2>
    <div class="form-group row mb-3">
        <label for="tenbaiviet" class="col-2">TÊN BÀI VIẾT: </label>
        <div class="col-5"><input id="tenbaiviet" class="form-control" type="text" name="tenbaiviet"></div>
    </div>

    <div class="form-group row mb-3">
        <label for="mota" class="col-2">MÔ TẢ CÔNG VIỆC:</label>
        <div class="col"><textarea name="mota" id="mota" cols="30" rows="10"></textarea></div>
    </div>

    <div class="form-group row mb-3">
        <label for="hinhanh" class="col-2">Hình ảnh(nếu có):</label>
        <div class="col"><input type="file" name="file" id="file"></div>
    </div>

    <?php
        $query = $pdo->prepare("SELECT * FROM danhmucviec");
        $query->execute();
        
    ?>  
    <div class="form-group mb-3">
        <label for="danhmucviec">DANH MỤC VIỆC:</label>
        <select id="danhmuc" name="danhmuc">
            <?php
                while($row = $query->fetch()){

            ?>
            <option><?php echo $row['tendanhmuc']?></option>
            <?php
                }
            ?>
        </select>
    </div>


    <div class="form-group row mb-3">
        <button class="btn btn-primary col-1 offset-3" type="submit">THÊM</button>
    </div>

</form>
<a class="btn btn-warning col-1" href="index.php?quanly=job">Back</a>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#mota' ) )
        .then( editor => {
            console.log( editor );
            } )
        .catch( error => {
            console.error( error );
        } );
</script>

<script>
    ClassicEditor
        .create( document.querySelector( '#yeucau' ) )
        .then( editor => {
            console.log( editor );
            } )
        .catch( error => {
            console.error( error );
        } );
</script>

