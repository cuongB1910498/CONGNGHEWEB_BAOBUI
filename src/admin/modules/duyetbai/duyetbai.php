<?php
    $stmt = $pdo->prepare(
        "SELECT * FROM vieclam WHERE trangthai = :tt"
    );
    $stmt->execute(['tt'=> 0]);
    $row = $stmt->fetchAll();
    
?>
<h1>bài viết chưa duyệt</h1>
    
<table class="table">
  <thead>
    <tr>
      <th scope="col">Tên bài đăng</th>
      <th scope="col">Tác giả</th>
      <th scope="col">Ảnh bìa</th>
      <th scope="col">Ngày đăng</th>
      <th scope="col">Chi tiết</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach($row as $rows){
    ?>
    <tr>
      <td><?php echo $rows['tenviec'] ?></td>
      <td><?php echo $rows['username'] ?></td>
      <td>

      <?php
        if($rows['anhbia'] == ''){
          echo "Không có ảnh bìa";
        }else{
      ?>
      <img src="../modules/ql_cv/uploads/<?php echo $rows['anhbia'] ?>" alt="error" width="100px" height="100px">
      <?php
        }
      ?>
      </td>
      <td><?php echo date("d/m/Y", strtotime($rows['ngaytao'])) ?></td>
      <td><a href="index.php?quanly=xembai&id=<?php echo $rows['id'] ?>" class="btn btn-primary">Xem</a></td>
    </tr>
    <?php
        }
    ?>
    
</table>