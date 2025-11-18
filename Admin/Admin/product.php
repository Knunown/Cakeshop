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
                        <h1 class="page-head-line">ĐĂNG KÝ SẢN PHẨM</h1>
                        <h1 class="page-subhead-line">Đăng ký bánh tại đây
                        </h1>

                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="panel panel-info">
                                <div class="panel-heading">
                                    ĐĂNG KÝ
                                </div>
                                <div class="panel-body">
                                <form method="POST" action="../../controller/controller.php" role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Tên Bánh</label>
                                            <input class="form-control" type="text" name="cake_name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Loại Bánh</label>
                                            <select class="form-control" name="cake_type" required>
                                                <option value="">---Chọn Loại Bánh---</option>

                                                <?php 
                                                    include('../../model/model.php');
                                                    $data = new cakes_data();
                                                    $cakestype = $data -> select_cake_type();
                                                    foreach ($cakestype as $i)
                                                    {
                                                        ?>
                                                            <option value="<?php echo $i['ct_index']?>"><?php echo $i['ct_name']?></option>
                                                        <?php
                                                    }
                                                ?>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Giá tiền</label>
                                            <input class="form-control" type="text" name="cake_price" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả phụ</label>
                                            <textarea class="form-control" rows="3" name="cake_short_description" maxlength="105" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả chính</label>
                                            <textarea class="form-control" rows="3" name="cake_long_description" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Hình ảnh mô tả</label>
                                            <input class="form-control" type="file" name="cake_image" required>
                                        </div>
                                        <button type="submit" class="btn btn-info" name="cake_register">Đăng ký sản phẩm</button>

                                </form>
                                </div>
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