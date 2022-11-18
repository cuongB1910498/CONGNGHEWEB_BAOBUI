<?php
    $stmt = $pdo->prepare(
        "UPDATE users SET nhatuyendung = :ntd WHERE username = :usn"
    );
    $stmt->execute([
        'ntd' => 1,
        'usn' => $_GET['usn']
    ]);
    header("Location: index.php?quanly=acc");
?>