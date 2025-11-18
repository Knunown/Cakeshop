<!---------------------- ADMIN ---------------------->

<?php
    session_start();
    include('../model/model.php');

    $data = new cakes_data();
    $data2 = new data_user();
    $data3 = new cart_data();

    if(isset($_POST['cake_register']))
    {
        move_uploaded_file($_FILES['cake_image']['tmp_name'],'../upload/'.$_FILES['cake_image']['name']);
        
        $c_name = $_POST['cake_name'];
        $c_type = $_POST['cake_type'];
        $c_price = $_POST['cake_price'];
        $c_short_description = $_POST['cake_short_description'];
        $c_long_description = $_POST['cake_long_description'];
        $c_image = $_FILES['cake_image']['name'];

        $insert_cake = $data -> insert_cake($c_name,$c_type,$c_price,$c_short_description,$c_long_description,$c_image);
        
        if($insert_cake)
        {
            echo"
            <script>
                alert('Đăng ký sản phẩm thành công')
                window.location='../Admin/Admin/product.php'
            </script>
            ";
        }
        else
        {
            echo"
            <script>
                alert('Đăng ký sản phẩm thất bại')
                window.location='../Admin/Admin/product.php
            </script>
            ";
        }
    }
?>

<?php
    if(isset($_POST['cake_type_register']))
    {
        $ct_name = $_POST['type_name'];

        $insert_type = $data -> insert_cake_type($ct_name);
        
        if($insert_type)
        {
            echo"
            <script>
                alert('Đăng ký loại bánh thành công')
                window.location='../Admin/Admin/category.php'
            </script>
            ";
        }
        else
        {
            echo"
            <script>
                alert('Đăng ký loại bánh thất bại')
                window.location='../Admin/Admin/category.php
            </script>
            ";
        }
    }
?>

<?php
    if(isset($_POST['cake_update']))
    {
        $c_index = $_GET['up'];
        $oldimg = $data -> select_cake_img($c_index);
        $oldimglink = $oldimg->fetch_assoc();
        $c_name = $_POST['cake_name'];
        $c_type = $_POST['cake_type'];
        $c_price = $_POST['cake_price'];
        $c_short_description = $_POST['cake_short_description'];
        $c_long_description = $_POST['cake_long_description'];
        $c_image = $_FILES['cake_image']['name'];
        
        if(isset($_FILES['cake_image'] ) && $_FILES['cake_image']['error'] === UPLOAD_ERR_OK)
        {
            unlink("../upload/".$oldimglink['c_image']);
            move_uploaded_file($_FILES['cake_image']['tmp_name'],'../upload/'.$_FILES['cake_image']['name']);
            $update_cake = $data -> update_cake($c_index,$c_name,$c_type,$c_price,$c_short_description,$c_long_description,$c_image);
        }
        else
        {
            $update_cake = $data -> update_cake($c_index,$c_name,$c_type,$c_price,$c_short_description,$c_long_description,$oldimglink['c_image']);
        }

        if($update_cake)
        {
            
                echo"
                <script>
                    alert('Sửa thông tin đơn hàng thành công')
                    window.location='../Admin/Admin/product_manage.php'
                </script>
                ";
        }
        else
        {
            echo"
            <script>
                alert('Sửa thông tin đơn hàng thất bại')
                window.location='../Admin/Admin/product_update.php?up=$c_index
            </script>
            ";
        }
    }
?>

<?php
    if(isset($_POST['caketype_update']))
    {
        $ct_index = $_GET['up'];
        $ct_name = $_POST['type_name'];
        
        $update_cake = $data -> update_cake_type($ct_index,$ct_name);
        if($update_cake)
        {
            
                echo"
                <script>
                    alert('Sửa thông tin loại bánh thành công')
                    window.location='../Admin/Admin/category_manage.php'
                </script>
                ";
        }
        else
        {
            echo"
            <script>
                alert('Sửa thông tin loại bánh thất bại')
                window.location='../Admin/Admin/category_update.php?up=$ct_index
            </script>
            ";
        }
    }
?>

<?php
    if(isset($_POST['user_update']))
    {
        $us_index = $_GET['up'];
        $us_username = $_POST['username'];
        $us_password = $_POST['password'];
        $us_email = $_POST['email'];
        
        $update_cake = $data2 -> update_user($us_index,$us_username,$us_password,$us_email);
        if($update_cake)
        {
            
                echo"
                <script>
                    alert('Sửa thông người dùng thành công')
                    window.location='../Admin/Admin/users_manage.php'
                </script>
                ";
        }
        else
        {
            echo"
            <script>
                alert('Sửa thông tin người dùng thất bại')
                window.location='../Admin/Admin/users_update.php?up=$us_index
            </script>
            ";
        }
    }

?>


<!---------------------- USERS ---------------------->

<?php
    

    if(isset($_POST['register']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $email = $_POST['email'];

        if($password != $repassword)
        {
            echo"
            <script>
                alert('Mật khẩu và nhập lại mật khẩu chưa đúng')
                window.location='../register.php'
            </script>
            ";
        }
        elseif(empty($username) || empty($password))
        {
            echo"
                <script>
                    alert('Bạn chưa nhập đủ thông tin')
                    window.location='../register.php'
                </script>
            ";
        }
        else{
            $select_user = $data2->select_user($username);

            if(mysqli_num_rows($select_user)==0)
            {
                $insert = $data2 -> register($username,$password,$email);

                if($insert)
                {
                    echo"
                        <script>
                            alert('Bạn đã đăng ký thành công')
                            window.location = '../login.php'
                        </script>
                    ";
                }
                else
                {
                    echo"
                        <script>
                            alert('Bạn không thực hiện được')
                            window.location = '../register.php'
                        </script>
                    ";
                }
            }

            else{
                echo"
                    <script>
                        alert('User đã có người sử dụng')
                        window.location = '../register.php'
                    </script>
                ";
            }
        }
    }
?>


<?php

    

    if(isset($_POST['login']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(empty($username) || empty($password))
        {
            echo "
                <script>
                    alert('Bạn chưa nhập đủ thông tin')
                    window.location = '../login.php'
                </script>
            ";
        }

        else{
            $log = $data2 -> login($username,$password);

            $num = mysqli_num_rows($log);
            if($num == 1)
            {
                $log = $log -> fetch_assoc();
                $_SESSION['user'] = $log['us_index'];
                echo "
                    <script>
                        alert('Login thành công')
                        window.location = '../index.php'
                    </script>
                
                ";
            }
            else
            {
                echo "
                    <script>
                        alert('Đăng nhập không thành công')
                        window.location = '../login.php'
                    </script>
                ";
            }
        }
    }
?>


<?php
    if(isset($_POST['accept']))
    {
        $user = $_SESSION['user'];
        $total = $_POST['total'];
        $id = $_GET['id'];

        $insert_receipt = $data3 -> insert_receipt($user,$total);
        if($insert_receipt)
            {
                if($id == null)
                {
                    $data3 ->delete_cart_by_user($user);
                }
                    echo "
                    <script>
                        alert('Đặt hàng thành công')
                        window.location = '../index.php'
                    </script>
                
                ";
                
            }
            else
            {
                echo "
                    <script>
                        alert('Đặt hàng không thành công')
                        window.location = '../shopping_cart.php'
                    </script>
                ";
            }
    }
?>