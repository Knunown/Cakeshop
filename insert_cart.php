<?php 
    session_start();
    include('model/model.php');
    $data = new cart_data();
    $check = $data -> check_cart($_GET['id'],$_SESSION['user']);
    if(mysqli_num_rows($check)==0){
        $insert_cart = $data -> insert_cart($_SESSION['user'],$_GET['id'],1);
        if($insert_cart){
            echo"
            <script>
                alert('Đã thêm đơn hàng vào giỏ hàng');
                window.location = 'product_content.php?id=".$_GET['id']."';
            </script>
            ";
            }
    }
    else{
        echo"
            <script>
                alert('Không thể thêm vì đơn hàng đã có trong giỏ hàng');
                window.location = 'product_content.php?id=".$_GET['id']."';
            </script>
            ";
        }                
?>