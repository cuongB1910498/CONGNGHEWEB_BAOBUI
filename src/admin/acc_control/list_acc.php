<?php
    $stmt = $pdo->prepare(
        "SELECT * FROM users WHERE nhatuyendung = :ntd"
    );
    $stmt->execute([
        'ntd' => 2
    ]);
?>

<h2>Tài Khoảng yêu cầu duyệt</h2>
<table class="table">
  <thead>
    <tr>
      <th scope="col">USERNAME</th>
      <th scope="col">ĐỊA CHỈ</th>
      <th scope="col">SĐT</th>
      <th scope="col">CÔNG TI</th>
      <th>THAO TÁC</th>
    </tr>
  </thead>
  <tbody>
    <?php
        while ($row = $stmt->fetch()){
    ?>
    <tr>
      <td><?php echo $row['username'] ?></td>
      <td><?php echo $row['address'] ?></td>
      <td><?php echo $row['phone'] ?></td>
      <td>COMMING SOON</td>
      <td> <a href="index.php?quanly=duyet_acc& usn=<?php echo $row['username'] ?>" class="btn btn-primary">Duyệt</a> <?php ?></td>
    </tr>
    <?php
        }
    ?>
    
    </tr>
  </tbody>
</table>