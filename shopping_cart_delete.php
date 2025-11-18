<?php 
    session_start();
    include('model/model.php');
    $data = new cart_data();
    $delete = $data->delete_cart($_GET['id']);

if ($delete) {
    echo "<script> 
            alert('Đơn hàng đã được xóa');
            window.location='shopping_cart.php?id=".$_SESSION['user']."';
          </script>";
} else {
    echo "<script> alert('Đơn hàng chưa được xóa');
            window.location='shopping_cart.php?id=".$_SESSION['user']."';
    </script>     
    ";
}               
?>