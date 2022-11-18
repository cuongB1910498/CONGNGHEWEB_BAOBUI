<?php
    // lấy dữ liệu ra từ csdl
    $stmt = $pdo->prepare(
        "SELECT * FROM vieclam as a, danhmucviec as b 
        WHERE id = :id AND a.id_danhmuc = b.id_danhmuc"
    );
    $stmt->execute([
        'id'=>$_GET['id']
    ]);
    $cv = $stmt->fetch();

    //sửa
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $tenviec = $_POST['tenbaiviet'];
        $mota = $_POST['mota'];
        
        // lay id danh muc
        $danhmuc = $_POST['danhmuc'];
        $stmt = $pdo->prepare("SELECT * FROM danhmucviec WHERE tendanhmuc = :tendm");
        $stmt->execute(['tendm'=>$danhmuc]);
        $dm = $stmt->fetch();
        $id_danhmuc = $dm['id_danhmuc'];

        if(!empty( $_FILES['file']['name'])){
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
                "UPDATE vieclam SET tenviec = :ten, mota = :mt, anhbia = :ab, id_danhmuc = :dm, trangthai = :tt WHERE id = :id"
            );
            $sql->execute([
                'ten' => $tenviec,
                'mt' => $mota,
                'ab' => $hinhanh_pro,
                'dm' => $id_danhmuc,
                'tt'=> 0,
                'id' => $_GET['id']
            ]);
            header("Location: index.php?quanly=job");

        }else{
            $sql = $pdo->prepare(
                "UPDATE vieclam SET tenviec = :ten, mota = :mt, id_danhmuc = :dm, trangthai = :tt WHERE id = :id"
            );
            $sql->execute([
                'ten' => $tenviec,
                'mt' => $mota,
                'dm'=> $id_danhmuc,
                'tt'=>0,
                'id' => $_GET['id']
            ]);
            header("Location: index.php?quanly=job");
        }
        
    }
?>

<form method="post" class="row offset-1" enctype="multipart/form-data">
    <h2 class="mb-3">SỬA BÀI VIẾT</h2>
    <div class="form-group row mb-3">
        <label for="tenbaiviet" class="col-2">TÊN BÀI VIẾT: </label>
        <div class="col-5"><input id="tenbaiviet" class="form-control" type="text" name="tenbaiviet" value="<?php echo $cv['tenviec'] ?>"></div>
    </div>

    <div class="form-group row mb-3">
        <label for="mota" class="col-2">MÔ TẢ CÔNG VIỆC:</label>
        <div class="col"><textarea name="mota" id="mota" ><?php echo $cv['mota'] ?></textarea></div>
    </div>

    <div class="form-group row mb-3">
        <label for="anhcu" class="col-2">Hình ảnh cũ: </label>
        <?php
            if($cv['anhbia'] == ''){
                echo "Không có ảnh bìa!";
            }else{
        ?>
        <img src="src/modules/ql_cv/uploads/<?php echo $cv['anhbia'] ?>" alt="error" height="100px" class="col-2">
        <?php
            }
        ?>
    </div>

    <div class="form-group row mb-3">
        <label for="hinhanh" class="col-2">Hình ảnh mới(nếu có):</label>
        <div class="col"><input type="file" name="file" id="file"></div>
    </div>

    <?php
        $query = $pdo->prepare("SELECT * FROM danhmucviec");
        $query->execute();
        
    ?>  
    <div class="form-group">
        <label for="danhmucviec">DANH MỤC VIỆC:</label>
        <select id="danhmuc" name="danhmuc">
            <?php
                while($row = $query->fetch()){

            ?>
            <option <?php if($row['id_danhmuc'] == $cv['id_danhmuc']) echo "selected" ?>><?php echo $row['tendanhmuc']?></option>
            <?php
                }
            ?>
        </select>
    </div>


    <div class="form-group row mb-3">
        <button class="btn btn-primary col-1 offset-3" type="submit">SỬA</button>
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