<?php
if(isset($_SESSION['dangnhap'])){
  if(isset($_SESSION['nhatuyendung'])){
    $sql = $pdo->prepare(
        "SELECT * FROM vieclam as a, danhmucviec as b WHERE username = :usn AND a.id_danhmuc = b.id_danhmuc"
    );

    $sql->execute([
        'usn' => $_SESSION['dangnhap']
    ]);
  
  $rows = $sql->fetchAll()
    
?>
<h2>Lịch sử tạo việc</h2>
<table class="table">
  <thead>
    <tr>
      
      <th scope="col">Tên việc làm</th>
      <th scope="col">Danh mục Việc</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Ngày tạo</th>
      <th scope="col">Chi tiết</th>
    </tr>
  </thead>
  <tbody>
   
    <?php
        foreach($rows as $row){
    ?>
         <tr>
            
            <td scope="row"><?php echo $row['tenviec'] ?></td>
            <td scope="row"><?php echo $row['tendanhmuc'] ?></td>
            <td scope="row">
              <?php 
              if($row['trangthai'] ==0){
                echo "Chưa duyệt";
              }elseif($row['trangthai'] == 1){
                echo "Đã duyệt";
              }else echo "đã từ chối";
              ?>
            </td>
            <td scope="row"> <?php echo date("d/m/Y",strtotime($row['ngaytao'])) ?></td>
            <td scope="row"><a href="index.php?quanly=chitietbai&id=<?php echo $row['id'] ?>" class="btn btn-primary">Xem</a></td>
        </tr>
    <?php
    }
    ?>
    
  </tbody>
</table>

<a href="index.php?quanly=thembai" class="btn btn-primary">BÀI ĐĂNG MỚI</a>
<?php
    }else{
?>
<h1>BẠN KHÔNG PHẢI NHÀ TUYỂN DỤNG VUI LÒNG ĐĂNG KÝ GÓI NHÀ TUYỂN DỤNG TẠI ĐÂY</h1>

<?php
    }
  } 
?>