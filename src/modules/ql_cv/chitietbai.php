<?php
   
    $stmt = $pdo->prepare(
        "SELECT * FROM vieclam WHERE id = :id"
    );
    $stmt->execute([
        'id'=>$_GET['id']
    ]);
    $row = $stmt->fetch();
?>

<div class="row">
    <div class="row bg-light">
        <h1 id="chitietbai"><?php echo $row['tenviec'] ?></h1>
    </div>
    <div class="row" id="chitietbai">
        <h3>Mô tả công việc</h3>
        <p><?php echo $row['mota'] ?></p>
    </div>

    <div class="mb-3">
        <h3>ảnh bìa</h3>
        <?php
            if($row['anhbia'] == ''){
                echo "Không có ảnh bìa!";
            }else{
        ?>
        <img src="src/modules/ql_cv/uploads/<?php echo $row['anhbia'] ?>" alt="error" width="10%" height="100px">
        <?php
            }
        ?>
    </div>
</div>


<?php
    if(isset($_SESSION['nhatuyendung']) && $_SESSION['nhatuyendung']==$row['username']){

    
?>
<div class="row">
    <a href="index.php?quanly=suabai&id=<?php echo $row['id'] ?>" class="btn btn-warning col-1">Sửa</a>
    

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger col-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Xóa
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Bạn có chắt muốn xóa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Xóa là không thể khôi phục lại được!
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a href="index.php?quanly=xoabai&id=<?php echo $row['id'] ?>" class="btn btn-danger">Xóa</a>
        </div>
        </div>
    </div>
    </div>
    </div>
<?php
    }
?>