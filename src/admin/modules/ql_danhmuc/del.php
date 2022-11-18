<?php
    $id_danhmuc = $_GET['id'];
    $query = $pdo->prepare("DELETE FROM danhmucviec WHERE id_danhmuc = :id");
    $query -> execute(['id' => $id_danhmuc]);
    header("Location: index.php?quanly=list");
?>