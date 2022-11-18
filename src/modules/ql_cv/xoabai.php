<?php
    $id = $_GET['id'];
    $stmt = $pdo->prepare(
        "DELETE FROM vieclam WHERE id = :id"
    );
    $stmt->execute([
        'id' => $id
    ]);

    $query = $pdo->prepare(
        "SELECT * FROM vieclam WHERE id = :id"
    );
    $query->execute([
        'id' => $id
    ]);
    $row = $query->fetch();
    echo 'modules/ql_cv/uploads/'.$row['anhbia'];

    header("Location: index.php?quanly=job");


?>