<?php
include('../../model/model.php');

$getdata = new data_user();
$delete = $getdata->delete_user($_GET['id']);

if ($delete) {
    echo "<script> 
            alert('Người dùngs đã được xóa');
            window.location='users_manage.php';
          </script>";
} else {
    echo "<script> alert('Người dùng chưa được xóa');
                    window.location='users_manage.php';
    </script>     
    ";
}
?>
