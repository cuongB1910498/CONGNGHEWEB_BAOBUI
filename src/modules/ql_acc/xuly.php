<?php
    session_start();
    include("../../conect/conect.php");
    $username = $_SESSION['dangnhap'];
    $stmt = $pdo->prepare(
        "UPDATE users SET nhatuyendung = :ntd WHERE username = :usn"
    );
    $stmt->execute([
        'ntd'=>2,
        'usn'=>$username
    ]);
    header("Location: ../../../index.php?quanly=acc_info");
?>