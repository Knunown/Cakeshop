<?php
include('../../model/model.php');

$data = new cakes_data();
$delete = $data -> delete_cake_type($_GET['del']);

if ($delete) {
    echo "<script> 
            alert('Hàng đã được xóa');
            window.location='product_manage.php';
          </script>";
} else {
    echo "<script> alert('Bài viết chưa được xóa');</script>";
}
?>