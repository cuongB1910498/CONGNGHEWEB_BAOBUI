<!-- hien thi viec lam -->
<?php
    $key = $_POST['key'];
    $stmt = $pdo->prepare(
        "SELECT * FROM vieclam WHERE tenviec like :tenviec AND trangthai= :tt"
    );
    $stmt->execute([
        'tenviec' => '%'.$key.'%',
        'tt' => 1
    ]);
    $rows = $stmt->fetchAll();
    $i = 0;
?>

<div class="row offset-lg-1 offset-2" id="hienthi">

    <?php
        if($key != ''){
        foreach ($rows as $row){
            $i++;
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
            <p class="card-text"><?php echo substr($row['mota'], 0, 50).'......' ?></p>
            <a href="index.php?quanly=chitietbai&id=<?php echo $row['id'] ?>" class="btn btn-primary stretched-link">Xem chi tiết</a>
        </div>
    </div>
          
    <?php
        }if($i==0) echo "<h1>không có kết quả tìm kiếm cho: '$key'</h1>";
    
    }else {
        echo "<h1>không có kết quả tìm kiếm cho: '$key'</h1>";
    }
    ?>
            
</div>