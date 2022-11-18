<?php
    include("../../../conect/conect.php");
    $id =  $_GET['id'];
    $stmt = $pdo ->prepare(
        "UPDATE vieclam SET trangthai =:tt WHERE id=:id"
    );
    $stmt->execute([
        'tt'=>-1,
        'id'=>$id
    ]);
    echo 
    "<script>
        alert('ĐÃ XÓA')
        window.location.replace('../../index.php');
    </script>";
    
?>