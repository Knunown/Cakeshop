<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('ztemp_head.php')?>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body style="overflow: hidden;background-image: linear-gradient(to top left,rgb(222,54,114), rgb(253, 146, 34));width: 100%;height: 100%;">
    
    <div style="margin: 60px auto;width: 1200px;border-radius: 20px;display: grid; grid-auto-flow: column; justify-content: end;background-image: linear-gradient(to bottom right,rgb(222,54,114), rgb(253, 146, 34));">
        <div style="text-align: center;width: 500px;margin-top: 90px;">
            <h1 class="m-0 text-uppercase text-white " style="font-size: 100px;">DABAKERY</h1>
            <p style="color: white;font-weight: 700;"><i class="fa fa-birthday-cake fs-1 text-primary me-3" style="color: white;"></i>Vị ngon theo cách của bạn</p>
        </div>
        <div style="width:700px;background-color:white;border-radius: 20px;">
            <div style="padding: 100px 40px 100px 120px;position: relative;">
                <img src="img/cake.png" alt="" style="position: absolute;left: -370px;bottom: 0;">
                <table>
                    <h1 style="font-size: 70px;margin-bottom: 50px;">Tạo tài khoản</h1>
                    <form action="controller/controller.php" method="POST" role="form">
                        <div style="margin-top: 20px;">
                            <label style="color: black;font-weight: bold;margin-bottom: 5px;">Tên đăng nhập:</label>
                            <input name="username" type="text"  style="border: solid 1px gray;border-radius: 5px;font-size: 15px;width: 100%;height: 50px;padding-left: 10px;">
                        </div>
                        <div style="margin-top: 20px;">
                            <p style="color: black;font-weight: bold;margin-bottom: 5px;">Mật khẩu:</p>
                            <input name="password" type="text"  style="border: solid 1px gray;border-radius: 5px;font-size: 15px;width: 100%;height: 50px;padding-left: 10px;">
                        </div>
                        <div style="margin-top: 20px;">
                            <p style="color: black;font-weight: bold;margin-bottom: 5px;">Nhập lại mật khẩu:</p>
                            <input name="repassword" type="text"  style="border: solid 1px gray;border-radius: 5px;font-size: 15px;width: 100%;height: 50px;padding-left: 10px;">
                        </div>
                        <div style="margin-top: 20px;">
                            <p style="color: black;font-weight: bold;margin-bottom: 5px;">Email:</p>
                            <input name="email" type="text"  style="border: solid 1px gray;border-radius: 5px;font-size: 15px;width: 100%;height: 50px;padding-left: 10px;">
                        </div>
                        <div style="margin-top: 20px;">
                            <input type="submit" value="Đăng Ký" name="register" style="border: none;border-radius: 5px;font-size: 30px;width: 100%;background-color: rgb(253, 146, 34);color: white;font-family: 'Oswald', sans-serif;font-weight: 600;height: 50px;">
                        </div>
                        <div style="margin-top: 20px;">
                            <p>Đã có tài khoản? Đăng nhập <a href="login.php" style="text-decoration: underline;">tại đây.</a></p>
                        </div>
                    
                    </form>
                </table>
            </div>
        </div>
    </div>

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