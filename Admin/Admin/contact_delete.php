<?php
include(__DIR__ . '/../../model/model.php');

$getdata = new content();
$delete = $getdata->delete_news($_GET['id']);

if ($delete) {
    echo "<script> 
            alert('Bài viết đã được xóa');
            window.location='../Admin/contact_select.php';
          </script>";
} else {
    echo "<script> alert('Bài viết chưa được xóa');</script>";
}
?>
