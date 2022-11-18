<?php
    include("../../../conect/conect.php");
    $stmt = $pdo->prepare(
        "UPDATE vieclam SET trangthai = :tt WHERE id = :id"
    );
    $stmt ->execute([
        'tt' => 1,
        'id' => $_GET['id']
    ]);
    header("location: ../../index.php?quanly=duyet");
?>