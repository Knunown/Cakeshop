<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('ztemp_head.php')?>
</head>

<body>
    <?php session_start()?>
    <form action="controller/controller.php" method="post"> 
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-0" style="justify-content: space-between;">
        
        <a href="javascript:history.back()" style="font-family: 'Oswald', sans-serif;font-size: 50px;text-align: center;color: white;margin-bottom: 0;line-height:100px;width:300px;margin:0 50px"><i class="fa-solid fa-chevron-left"></i>Về giỏ hàng</a>
        
        <p style="font-family: 'Oswald', sans-serif;font-size: 50px;text-align: center;color:#E88F2A ;margin-bottom: 0;line-height:100px;width:300px;margin:0 50px">THANH TOÁN</p>
        <button type="submit" name="accept" style="font-family: 'Oswald', sans-serif;font-size: 50px;text-align: center;color: white;margin-bottom: 0;background-color: red;border: none;border-radius: 20px;width:300px;margin:0 50px">
                Đặt hàng
            </button>
    </nav>
    


    <!-- Products Start -->
    <?php
        include('model/model.php');
        $data = new cakes_data();
        $data2 = new cart_data();
        $stocks = $data2 -> check_cart_by_user($_SESSION['user']);
        
        $total = 0;
        
        foreach($stocks as $i)
        {
            $cakes = $data -> select_cake_by_id($i['sc_cake']);
            $cakesname = $cakes->fetch_assoc();
    ?>
    
    <div class="container-fluid pt-5" >
        <div class="container" >
            <div class="row gx-5" style="background-color: #2B2825;border-radius: 10px;">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 400px;padding: 0;width: 400px;">
                    <div class="position-relative h-100" style="display: flex;justify-content: center;">
                        <img class="position-absolute " src="upload/<?php echo $cakesname['c_image']?>" style="object-fit: cover;width: 300px;height: 300px;border-radius: 10px;margin-top: 30px;">
                    </div>
                </div>
                <div class="col-lg-6 pb-5" style="margin-top: 30px;width: 700px;">
                    <h4 class="mb-4" style="font-size: 60px;color: white;"><?php echo $cakesname['c_name']?></h4>
                    <div style="display:flex;justify-content:space-between">
                    <div style="">
                        <p style="margin:0;font-weight:bold;color:rgb(224, 65, 65)">Đơn giá:</p>
                        <p style="font-weight:700;color:white;font-size: 25px;flex-wrap: wrap;word-break: break-word;margin-bottom:10px;color:rgb(224, 65, 65)"><?php echo $cakesname['c_price']?>₫</p>
                        
                    </div>
                    <p style="color:white;font-size:20px">Số lượng: <?php echo $_POST['quantity'.$i['sc_cake']]?></p>
                     
                    
                        </div>
                        <div style="margin-top:30px">
                        <p style="margin:0;font-weight:bold;color:white">Thành tiền:</p>
                        <p style="font-weight:700;color:white;font-size: 35px;flex-wrap: wrap;word-break: break-word;margin-bottom:10px"><?php echo $cakesname['c_price'] * $_POST['quantity'.$i['sc_cake']];$total += $cakesname['c_price'] * $_POST['quantity'.$i['sc_cake']]?>₫</p>
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
    
    
    <?php
        }
        
    ?>
    
    <div class="container-fluid pt-5" >
        <div class="container" >
            <div class="row gx-5" style="background-color: #2B2825;border-radius: 10px">
                <p style="color:white;font-weight:bold;line-height:100px;margin-bottom:0;font-size:30px;">Tổng hóa đơn: <?php echo $total;?>₫</p>
            </div>
        </div>
    </div>
        <input type="hidden" name="total" value="<?php echo $total?>">

    </form>
        <script>
            function increaseQty(button) 
            {
                const input = button.previousElementSibling;
                if (parseInt(input.value) < 10 ) {
                    input.value = parseInt(input.value) + 1;
                }
                
            }

            function decreaseQty(button) 
            {
                const input = button.nextElementSibling;
                if (parseInt(input.value) > 1 ) {
                    input.value = parseInt(input.value) - 1;
                }
            }


        </script>
    <!-- Products End -->


    <div style="height:50px"></div>


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