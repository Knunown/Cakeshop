
<!-- Topbar Start -->
    <div class="container-fluid px-0 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-4 text-center bg-secondary py-3">
                <div class="d-inline-flex align-items-center justify-content-center">
                    <i class="bi bi-envelope fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Email Us</h6>
                        <span>da29022004@gmail.com</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center bg-primary border-inner py-3">
                <div class="d-inline-flex align-items-center justify-content-center">
                    <a href="index.php" class="navbar-brand">
                        <h1 class="m-0 text-uppercase text-white"><i class="fa fa-birthday-cake fs-1 me-3"></i>DABAKERY</h1>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center bg-secondary py-3">
                <div class="d-inline-flex align-items-center justify-content-center">
                    <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Call Us</h6>
                        <span>0868 073 830</span>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php 
        session_start();
        include('model/model.php');
        $data = new data_user();
        $data2 = new cart_data();
        $link = $_SERVER['PHP_SELF'];
        $link_parts = explode("/",$link);
        $checkcart = $data2 ->select_cart();
    ?>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-0" >
        <a href="index.php" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 text-uppercase text-white"><i class="fa fa-birthday-cake fs-1 text-primary me-3"></i>DABAKERY</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto mx-lg-auto py-0">
                <a href="index.php" class="nav-item nav-link <?php if(in_array('index.php',$link_parts)) echo('active')?>">Trang chủ</a>
                <a href="about.php" class="nav-item nav-link <?php if(in_array('about.php',$link_parts)) echo('active')?>">Giới thiệu</a>
                <a href="menu.php" class="nav-item nav-link <?php if(in_array('menu.php',$link_parts)) echo('active')?>">Menu & Giá</a>
                <a href="team.php" class="nav-item nav-link <?php if(in_array('team.php',$link_parts)) echo('active')?>">Đầu bếp</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle <?php if(in_array('service.php',$link_parts) || in_array('testimonial.php',$link_parts)) echo('active')?>" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="service.php" class="dropdown-item <?php if(in_array('service.php',$link_parts)) echo('active')?>">Our Service</a>
                        <a href="testimonial.php" class="dropdown-item <?php if(in_array('testimonial.php',$link_parts)) echo('active')?>">Testimonial</a>
                    </div>
                </div>
                <a href="contact.php" class="nav-item nav-link <?php if(in_array('contact.php',$link_parts)) echo('active')?>">Liên hệ</a>
            </div>

            <div class="navbar-nav ms-auto mx-lg-auto py-0" style="position: absolute;right:40px;display:flex">
                <?php if(!empty($_SESSION['user']))
                {

                    $username = $data -> select_all_id($_SESSION['user']);
                    $username = $username ->fetch_assoc();
                    if(mysqli_num_rows($checkcart)==0){
                    echo '
                            <a class="nav-item nav-link" onmouseover="this.style.color=\'white\'">
                            <i class="fa-regular fa-circle-user" style="margin-right:5px"></i>'.$username['us_username'].
                            '</a>
                            <li class="nav-item nav-link" onmouseover="this.style.color=\'white\'">|</li>
                            <a href="logout.php" class="nav-item nav-link">ĐĂNG XUẤT</a>
                            <a href="shopping_cart.php?id='.$_SESSION['user'].'" class="nav-item nav-link" style="margin-left:10px"> <i class="fa-solid fa-cart-shopping" style="font-size:25px"></i></a>
                        ';
                    }
                    else{
                        echo'
                            <a class="nav-item nav-link" onmouseover="this.style.color=\'white\'">
                            <i class="fa-regular fa-circle-user" style="margin-right:5px"></i>'.$username['us_username'].
                            '</a>
                            <li class="nav-item nav-link" onmouseover="this.style.color=\'white\'">|</li>
                            <a href="logout.php" class="nav-item nav-link">ĐĂNG XUẤT</a>
                            <a href="shopping_cart.php?id='.$_SESSION['user'].'" class="nav-item nav-link" style="margin-left:10px"> <i class="fa-solid fa-cart-shopping" style="font-size:25px"><p style="position:absolute;background-color:red;border-radius:90px;width:15px;line-height:15px;text-align:center;font-size:12px;bottom:10px">'.mysqli_num_rows($checkcart).'</p></i></a>
                            ';
                    }
                }
                else
                {
                    echo '
                            <a href="login.php" class="nav-item nav-link">
                            <i class="fa-regular fa-circle-user" style="margin-right:5px"></i>ĐĂNG NHẬP
                            </a>
                            <li class="nav-item nav-link" onmouseover="this.style.color=\'white\'">|</li>
                            <a href="register.php" class="nav-item nav-link">ĐĂNG KÝ</a>
                            <a href="login.php" class="nav-item nav-link" style="margin-left:10px"><i class="fa-solid fa-cart-shopping" style="font-size:25px"></i></a>
                        ';
                }
                
                ?>
                
            </div>
        </div>
        
        
    </nav>
    <!-- Navbar End -->