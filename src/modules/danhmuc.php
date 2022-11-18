<?php
    $sql = $pdo->prepare(
        "SELECT * FROM danhmucviec as a, vieclam as b WHERE a.id_danhmuc = :dm
        AND a.id_danhmuc = b.id_danhmuc AND trangthai = :tt"
    );
    $sql->execute([
        'dm' => $_GET['id'],
        'tt' => 1
    ]);
    
    
?>

<div class="row offset-lg-1 offset-2" id="hienthi">
      <?php
        while($row = $sql->fetch()){
      ?>

    <div class="card" style="width: 15rem;" class="col-lg-3 col-md-4 col-sm-4 col-12" 
        data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $row['tenviec'] ?>">
        <?php
            if($row['anhbia'] == ''){
        ?>
        
        <img src="src/img/defound.jpg" class="card-img-top" alt="error" height="150px">

        <?php
            }else{
        ?>
        
        <img src="src/modules/ql_cv/uploads/<?php echo $row['anhbia'] ?>" alt="error" height="150px" >

        <?php
            }
        ?>

            <div class="card-body">
            <h5 class="card-title"><?php echo $row['tenviec'] ?></h5>
            <?php
                $id = $row['id'];
                $query = $pdo->prepare(
                    "SELECT mota FROM vieclam WHERE id = :id"
                );
                $query->execute(['id' => $id]);
                $mota = $query->fetch();
                
            ?>
            <p class="card-text"><?php echo substr($mota['mota'], 0, 50).'......' ?></p>
            <a href="index.php?quanly=chitietbai&id=<?php echo $row['id'] ?>" class="btn btn-primary stretched-link">Xem chi tiết</a>
        </div>
    </div>

    <?php
        }
    ?>
</div>