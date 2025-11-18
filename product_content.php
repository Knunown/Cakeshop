<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('ztemp_head.php')?>
</head>

<body>
    
    <?php include('ztemp_navbar.php')?>
    


    <!-- Products Start -->
    <?php
        $data = new cakes_data();
        
        $cakes = $data -> select_cake_by_id($_GET['id']);
        
        foreach($cakes as $i)
        {
            $cakestype = $data -> select_cake_type_by_id($i['c_type']);
            $cakesname = $cakestype->fetch_assoc();
    ?>
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Menu & Pricing</h2>
                <h1 class="display-4 text-uppercase"><?php echo $cakesname['ct_name']?></h1>
            </div>
            <div class="row gx-5" style="">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="upload/<?php echo $i['c_image']?>" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pb-5">
                    <h4 class="mb-4" style="font-size: 60px;"><?php echo $i['c_name']?></h4>
                    <p class="mb-5" style="font-weight:700;color:black;font-size: 15px;flex-wrap: wrap;word-break: break-word;"><?php echo $i['c_long_description']?></p>
                    <p class="mb-5" style="font-size: 20px;flex-wrap: wrap;word-break: break-word;color:red;font-weight:bold">Giá: <?php echo $i['c_price']?>₫</p>
                    <div class="row g-5">
                        <div class="col-sm-6">
                            <a href="insert_cart.php?id=<?php echo $_GET['id']?>">
                            <div class="d-flex align-items-center justify-content-center bg-primary mb-4" style=" height: 90px;border-radius: 10px;">
                                <i class="fa-solid fa-cart-shopping fa-2x text-white"></i>
                                <p class="text-white" style="margin: 0 0 0 10px;font-weight: bold;">Thêm vào giỏ hàng</p>
                            </div>
                            </a>
                        </div>
                        <div class="col-sm-6" >
                            <a href="<?php if(empty($_SESSION['user'])){echo 'login.php';} else{ echo 'purchase2.php?id=' . $_GET['id'];}?>">
                            <div class="d-flex align-items-center justify-content-center bg-primary mb-4" style="height: 90px;border-radius: 10px;">
                                <i class="fa-solid fa-receipt fa-2x text-white"></i>
                                <p class="text-white" style="margin: 0 0 0 10px;font-weight: bold;">Mua</p>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <!-- Products End -->


    <!-- Offer Start -->
    <div class="container-fluid bg-offer my-5 py-5">
        <div class="container py-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-7 text-center">
                    <div class="section-title position-relative text-center mx-auto mb-4 pb-3" style="max-width: 600px;">
                        <h2 class="text-primary font-secondary">Special Kombo Pack</h2>
                        <h1 class="display-4 text-uppercase text-white">Super Crispy Cakes</h1>
                    </div>
                    <p class="text-white mb-4">Eirmod sed tempor lorem ut dolores sit kasd ipsum. Dolor ea et dolore et at sea ea at dolor justo ipsum duo rebum sea. Eos vero eos vero ea et dolore eirmod et. Dolores diam duo lorem. Elitr ut dolores magna sit. Sea dolore sed et.</p>
                    <a href="" class="btn btn-primary border-inner py-3 px-5 me-3">Shop Now</a>
                    <a href="" class="btn btn-dark border-inner py-3 px-5">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->
    

    <!-- Footer Start -->
    <?php include ('ztemp_footer.php')?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-inner py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>