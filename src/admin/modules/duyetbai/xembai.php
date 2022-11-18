<?php
    $stmt = $pdo->prepare(
        "SELECT * FROM vieclam WHERE id = :id"
    );
    $stmt -> execute([
        'id'=>$_GET['id']
    ]);

    $row = $stmt->fetch();
?>

<h2>nội dung chính</h2>
<form class="mb-3">
    <textarea id="mota"><?php echo $row['mota'] ?></textarea>
</form>

<div class="row">
    <div class="col-1"><a href="modules/duyetbai/duyet.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Duyệt</a></div>
    <div class="col-1"><a href="modules/duyetbai/xoa.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Xóa</a></div>
</div>

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