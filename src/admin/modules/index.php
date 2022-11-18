<!-- hien thi viec lam -->
<h2 class="alert alert-primary"><p>Tất cả các bài đăng</p></h2>
<div class="row offset-lg-1 offset-2" id="show_idx">

    <?php
        $stmt = $pdo->prepare(
            "SELECT * FROM vieclam"
        );
        $stmt->execute();
        while ($row = $stmt->fetch()){
        
    ?>

    <div class="card" style="width: 15rem;" class="col-lg-3 col-md-4 col-sm-4 col-12" 
        data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $row['tenviec'] ?>">
        <?php
            if($row['anhbia'] == ''){
        ?>
        
        <img src="../img/defound.jpg" class="card-img-top" alt="error" height="150px">

        <?php
            }else{
        ?>
        
        <img src="../modules/ql_cv/uploads/<?php echo $row['anhbia'] ?>" alt="error" height="150px" >

        <?php
            }
        ?>

            <div class="card-body">
            <h5 class="card-title"><?php echo substr($row['tenviec'], 0, 30) ?></h5>
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