<!-- slide -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                  
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="src/img/header1.png" class="d-block w-100" alt="error" height="800px">
        </div>
        <div class="carousel-item">
            <img src="src/img/header2.png" class="d-block w-100" alt="error"height="800px">
        </div>
        <div class="carousel-item">
            <img src="src/img/header3.png" class="d-block w-100" alt="error"height="800px">
        </div>
        <div class="carousel-item">
            <img src="src/img/header4.png" class="d-block w-100" alt="error"height="800px">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>         
            
<!-- hien thi viec lam -->
<h2 class="alert alert-primary"><p>VIỆC LÀM MỚI NHẤT</p></h2>
<div class="row offset-lg-1 offset-2" id="hienthi">

    <?php
        $stmt = $pdo->prepare(
            "SELECT * FROM vieclam WHERE trangthai = :tt Limit 8"
        );
        $stmt->execute([
            'tt' =>1
        ]);
        while ($row = $stmt->fetch()){
        
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