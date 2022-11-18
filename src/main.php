<div class="container">
        
  <div class="main mb-3">
    <?php
      if(isset($_GET['quanly'])){
        $tam = $_GET['quanly'];
      }else{
        $tam = '';
      }
      
      if($tam == 'job'){
        include("modules/ql_cv/history.php");
      }elseif($tam == 'thembai'){
        include("modules/ql_cv/thembai.php");
      }elseif($tam == 'chitietbai'){
        include("modules/ql_cv/chitietbai.php");
      }elseif($tam == 'suabai'){
        include("modules/ql_cv/suabai.php");
      }elseif($tam == 'xoabai'){
        include("modules/ql_cv/xoabai.php");
      }elseif($tam == 'danhmuc'){
        include("modules/danhmuc.php");
      }elseif($tam == 'danhmuc'){
        include("modules/danhmuc.php");
      }elseif($tam == 'acc_info'){
        include("modules/ql_acc/acc_info.php");
      }elseif($tam == 'timkiem'){
        include("modules/timkiem.php");
      }
      
      else{
        include("modules/index.php");
      }
      
      
    ?>
    

  </div>
        
</div>