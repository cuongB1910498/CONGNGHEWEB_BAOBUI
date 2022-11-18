<?php
    $sql = $pdo->prepare('SELECT * FROM danhmucviec');
    $sql->execute();
    
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">TÊN DANH MỤC</th>
            <th scope="col">QUẢN LÝ</th>

            
            
        </tr>
    </thead>
    <tbody>
        <?php
            $i = 0;
            while ($row = $sql->fetch()){
                $i++
            ?>
        <tr>
            <th scope="row"><?php echo $i ?></th>
            <td><?php echo $row['trangthai_dm']?></td>
            <td><?php echo $row['tendanhmuc']?></td>
            <td>
                <a href="index.php?quanly=suadanhmuc&id=<?php echo$row['id_danhmuc']?>" class="btn btn-warning"> SỬA</a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
  					XÓA
				</button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bạn có chắt muốn xóa?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        XÓA LÀ KHÔNG THỂ KHÔI PHỤC!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a class="btn btn-danger" href="index.php?quanly=xoadanhmuc&id=<?php echo$row['id_danhmuc']?>">XÓA</a>
                    </div>
                    </div>
                </div>
                </div>
            </td>
        </tr>

        <?php
            }
        ?>
        
    </tbody>
</table>

<div class="row mb-3">
    
    <a href="index.php?quanly=themdanhmuc" class="btn btn-primary col-2 offset-5">THÊM MỚI</a>
</div>