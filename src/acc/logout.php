<?php
    session_start();
    
    if(isset($_SESSION['nhatuyendung'])){
        unset($_SESSION['dangnhap']); 
        unset($_SESSION['nhatuyendung']);
    }else{
         unset($_SESSION['dangnhap']); 
    }
    
    

    header("Location: ../../index.php");
?>