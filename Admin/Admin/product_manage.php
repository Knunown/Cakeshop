<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cake Store Management</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <?php include('head_top.php') ?>
        <!-- /. NAV TOP  -->
        <?php include('head_nav.php') ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Danh sách SẢN PHẨM</h1>
                        <h1 class="page-subhead-line">Sửa xóa sản phẩm tại đây
                        </h1>

                    </div>
                </div>
                <!-- /. ROW  -->

    
                <div class="panel panel-info">
                    <table class="table table-striped table-bordered table-hover">
                    <thead>    
                        <tr>
                            <td>ID</td>
                            <td>TÊN BÁNH</td>
                            <td>LOẠI BÁNH</td>
                            <td>GIÁ TIỀN</td>
                            <td>MÔ TẢ PHỤ</td>
                            <td>MÔ TẢ CHÍNH</td>
                            <td>HÌNH ẢNH MÔ TẢ</td>
                            <td></td>
                        </tr> 
                    </thead>    
                        <tbody>  
                                <?php
                                    include('../../model/model.php');
    
                                    $data = new cakes_data();
                                    $cakes = $data->select_cake();
                                    foreach($cakes as $i)
                                        {
                                            $cakestype = $data->select_cake_type_by_id($i['c_type']);
                                            $cakestypename = $cakestype ->fetch_assoc();
                                            ?>
                                                <tr>
                                                    <td style="max-width:500px"><?php echo $i['c_index'] ?></td>
                                                    <td><?php echo $i['c_name'] ?></td>
                                                    <td><?php echo $cakestypename['ct_name'] ?></td>
                                                    <td><?php echo $i['c_price'] ?></td>
                                                    <td><?php echo $i['c_short_description'] ?></td>
                                                    <td style="max-width:500px;word-break: break-word; white-space: normal;"><?php echo $i['c_long_description'] ?></td>
                                                    <td><img src="../../upload/<?php echo $i['c_image'] ?>" alt="Không có ảnh minh họa" style="height:200px"></td>
                                                    <td><a class="btn btn-danger" href="product_delete.php?del=<?php echo $i['c_index'] ?>" onClick=" if(confirm('Bạn có chắc chắn xóa?')) return true; else return false;">Xóa</a>
                                                        <a class="btn btn-danger" style="background-color:blue" href="product_update.php?up=<?php echo $i['c_index'] ?>">Sửa</a></td>
                                                </tr>
                                            <?php
                                        }
                                ?>
                        </tbody>
                    </table>
                </div>
                <!-- /. ROW  -->

                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">
        &copy; 2024 Lập trình Website PHP | Teacher Van
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>

</html>