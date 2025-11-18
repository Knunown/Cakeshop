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
                        <h1 class="page-head-line">DANH SÁCH LOẠI BÁNH</h1>
                        <h1 class="page-subhead-line">Sửa xóa loại bánh tại đây
                        </h1>

                    </div>
                </div>
                <!-- /. ROW  -->

    
                <div class="panel panel-info">
                    <table class="table table-striped table-bordered table-hover">
                    <thead>    
                        <tr>
                            <td>ID</td>
                            <td>TÊN LOẠI BÁNH</td>
                            <td></td>
                        </tr> 
                    </thead>    
                        <tbody>  
                                <?php
                                    include('../../model/model.php');

                                    $data = new cakes_data();
                                    $caketypes = $data->select_cake_type();
                                    foreach($caketypes as $i)
                                        {
                                            ?>
                                                <tr>
                                                    <td><?php echo $i['ct_index'] ?></td>
                                                    <td><?php echo $i['ct_name'] ?></td>
                                                    <td><a class="btn btn-danger" href="category_delete.php?del=<?php echo $i['ct_index'] ?>" onClick=" if(confirm('Bạn có chắc chắn xóa?')) return true; else return false;">Xóa</a>
                                                        <a class="btn btn-danger" style="background-color:blue" href="category_update.php?up=<?php echo $i['ct_index'] ?>">Sửa</a></td>
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