<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('ztemp_head.php')?>
</head>

<body>
    <?php session_start()?>
    <form action="purchase.php?id=<?php echo $_SESSION['user']?>" method="post"> 
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-0" style="justify-content: space-between;">
        
        <a href="index.php" style="font-family: 'Oswald', sans-serif;font-size: 50px;text-align: center;color: white;margin-bottom: 0;line-height:100px;width:350px;margin:0 50px"><i class="fa-solid fa-chevron-left"></i>Về trang chủ</a>
        
        <p style="font-family: 'Oswald', sans-serif;font-size: 50px;text-align: center;color:#E88F2A ;margin-bottom: 0;line-height:100px;width:350px;margin:0 50px">GIỎ HÀNG</p>
        <?php 
            include('model/model.php');
            $data = new cakes_data();
            $data2 = new cart_data();
            $stocks = $data2 -> check_cart_by_user($_GET['id']);
            $checkcart = $data2 ->select_cart();
        ?>
            <button <?php if(mysqli_num_rows($checkcart)==0){ echo 'disabled';}?> type="submit" name="purchase" style="font-family: 'Oswald', sans-serif;font-size: 50px;text-align: center;color: white;margin-bottom: 0;background-color: red;border: none;border-radius: 20px;width:350px;margin:0 50px">
                Thanh toán
            </button>
    </nav>
    


    <!-- Products Start -->
    <?php
        
        
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
                    <p style="margin:0;font-weight:bold;color:white">Đơn giá:</p>
                    <div style="display: flex;">
                        <p class="mb-5" style="font-weight:700;color:rgb(224, 65, 65);font-size: 35px;flex-wrap: wrap;word-break: break-word;"><?php echo $cakesname['c_price']?>₫</p>
                        <div style="width: fit-content;display: flex;background-color: gray;height: 30px;margin: 10px 0 0 300px;border-radius: 10px;">
                            <button type="button" onclick="decreaseQty(this)" style="background-color: gray;width: 30px;height: 30px;border: none;margin-right: 10px;border-radius: 10px;">-</button>
                            <!-- <div style="margin-right: 25px;">|</div> -->
                            <input name="quantity<?php echo $i['sc_cake'];?>" type="number" value="1" min="1" readonly style="width: 70px;background-color: gray;border: none;text-align: center;">
                            <!-- <div style="margin-left: 10px;">|</div> -->
                            <button type="button" onclick="increaseQty(this)" style="background-color: gray;width: 30px;height: 30px;border: none;margin-left: 10px;border-radius: 10px;">+</button>
                        </div>
                    </div>
                    
                        
                        <p style="font-size: 20px;flex-wrap: wrap;word-break: break-word;margin-bottom: 0;color: white;">Mô tả: <?php echo $cakesname['c_short_description']?></p>
                        
                        
                        <div style="width: fit-content;display: flex;background-color: red;margin-top:20px;border-radius: 10px;padding: 10px 20px;">
                            <a href="shopping_cart_delete.php?id=<?php echo $i['sc_index']?>" style="color: rgb(207, 207, 42);width:50px;text-align:center;line-height:30px;font-weight: bold;">Xóa</a>
                        </div>
                </div>
            </div>

            
        </div>
    </div>
    
    
    <?php
        }
    ?>

    <?php
        if(mysqli_num_rows($checkcart)==0){
            echo'<h1 style="text-align:center;margin-top:100px;text-decoration:underline">Giỏ hàng trống</h1>';
        }
    ?>
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