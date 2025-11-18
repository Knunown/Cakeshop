<?php
    include('connect.php');
    
    class data_user
    {
        public function select_user($user)
        {
            global $conn;
            $sql = "select * from users where us_username = '$user'";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function register($us_username,$us_password,$us_email)
        {
            global $conn;
            $sql = "insert into users(us_username,us_password,us_email) values('$us_username','$us_password','$us_email')";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function select_all()
        {
            global $conn;
            $sql = "select * from users";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function login($user,$pass)
        {
            global $conn;
            $sql = "select * from users where us_username='$user' and us_password = '$pass'";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function select_all_id($id)
        {
            global $conn;
            $sql = "select * from users where us_index='$id'";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function update_user($id,$username,$password,$email)
        {
            global $conn;
            $sql = "update users set us_username = '$username',us_password = '$password',us_email = '$email' where us_index='$id'";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function delete_user($id)
        {
            global $conn;
            $sql = "delete from users where us_index='$id'";
            $run = mysqli_query($conn,$sql);
            return $run;
        }
        
    }

    class cakes_data
    {
        public function select_cake()
        {
            global $conn;
            $sql = "select * from cakes";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function insert_cake($c_name,$c_type,$c_price,$c_short_description,$c_long_description,$c_image)
        {
            global $conn;
            $sql = "insert into cakes(c_name,c_type,c_price,c_short_description,c_long_description,c_image) values ('$c_name','$c_type','$c_price','$c_short_description','$c_long_description','$c_image')";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function select_cake_type()
        {
            global $conn;
            $sql = "select * from cakestype";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function select_cake_type_by_id($c_type)
        {
            global $conn;
            $sql = "select * from cakestype where ct_index = '$c_type'";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function update_cake_type($ct_index,$ct_name)
        {
            global $conn;
            $sql = "update cakestype set ct_name='$ct_name' where ct_index = '$ct_index'";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function insert_cake_type($ct_name)
        {
            global $conn;
            $sql = "insert into cakestype(ct_name) values ('$ct_name')";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function select_cake_by_type($c_type)
        {
            global $conn;
            $sql = "select * from cakes where c_type = '$c_type'";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function select_cake_by_id($c_index)
        {
            global $conn;
            $sql = "select * from cakes where c_index = '$c_index'";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function update_cake($c_index,$c_name,$c_type,$c_price,$c_short_description,$c_long_description,$c_image)
        {
            global $conn;
            $sql = "update cakes set c_name='$c_name',c_type='$c_type',c_price='$c_price',c_short_description='$c_short_description',c_long_description='$c_long_description',c_image='$c_image' where c_index = '$c_index'";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function delete_cake($c_index)
        {
            global $conn;
            $sql = "delete from cakes where c_index = '$c_index'";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function delete_cake_type($ct_index)
        {
            global $conn;
            $sql = "delete from cakestype where ct_index = '$ct_index'";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function select_cake_img($c_index)
        {
            global $conn;
            $sql = "select c_image from cakes where c_index = '$c_index'";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

    }
    
    class cart_data
    {
        public function insert_cart($sc_user,$sc_cake,$sc_quantity)
        {
            global $conn;
            $sql = "insert into shoppingcart(sc_user,sc_cake,sc_quantity) values('$sc_user','$sc_cake','$sc_quantity')";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function check_cart($sc_cake,$sc_user)
        {
            global $conn;
            $sql = "select * from shoppingcart where sc_cake='$sc_cake' and sc_user='$sc_user'";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function select_cart()
        {
            global $conn;
            $sql = "select * from shoppingcart";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function check_cart_by_user($us_username)
        {
            global $conn;
            $sql = "select * from shoppingcart where sc_user='$us_username'";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function delete_cart($sc_index)
        {
            global $conn;
            $sql = "delete from shoppingcart where sc_index='$sc_index'";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function insert_receipt($r_user,$r_total)
        {
            global $conn;
            $sql = "insert into receipt(r_user,r_total) values('$r_user','$r_total')";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function delete_cart_by_user($sc_user)
        {
            global $conn;
            $sql = "delete from shoppingcart where sc_user='$sc_user'";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function select_receipt()
        {
            global $conn;
            $sql = "select * from receipt";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function select_receipt_by_user($us_username)
        {
            global $conn;
            $sql = "select * from receipt where r_user='$us_username'";
            $run = mysqli_query($conn,$sql);
            return $run;
        }
    }
?>