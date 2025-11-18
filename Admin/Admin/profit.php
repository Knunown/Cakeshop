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
                        <h1 class="page-head-line">Xem danh sách hóa đơn</h1>
                        <h1 class="page-subhead-line">Xem danh sách hóa đơn tại đây
                        </h1>

                    </div>
                </div>
                <!-- /. ROW  -->

    
                <div class="panel panel-info">
                    <table class="table table-striped table-bordered table-hover">
                    <thead>    
                        <tr>
                            <td>ID</td>
                            <td>NGƯỜI DÙNG</td>
                            <td>TÊN NGƯỜI DÙNG</td>
                            <td>TỔNG HÓA ĐƠN</td>
                        </tr> 
                    </thead>    
                        <tbody>  
                                <?php
                                    include('../../model/model.php');
    
                                    $data = new cart_data();
                                    $cakes = $data->select_receipt();
                                    $data2 = new data_user();
                                    foreach($cakes as $i)
                                        {
                                            $user =  $data2-> select_all_id($i['r_user']);
                                            $user =  $user -> fetch_assoc();
                                            ?>
                                                <tr>
                                                    <td style="max-width:500px"><?php echo $i['r_index'] ?></td>
                                                    <td><?php echo $i['r_user'] ?></td>
                                                    <td><?php echo $user['us_username'] ?></td>
                                                    <td><?php echo $i['r_total'] ?></td>
                                                    
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