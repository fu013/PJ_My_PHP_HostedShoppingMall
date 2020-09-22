<?php

    header('Content-Type: text/html; charset=utf-8');
    session_start();
    if(isset($_SESSION["login_user_id"])) { 
        $user_id = $_SESSION["login_user_id"];
        $post_no  = $_POST["jjim_post_no"];
        $con = mysqli_connect("localhost","seungchanshop25","tmdcks2416!","seungchanshop25");

        $jjim_select = "select count(*) count from seungchanshop25.user_jjim where product_autoNum = $post_no and user_id = '$user_id'";
        $jjim_select_result = mysqli_query($con, $jjim_select);
        $jjim_count_array =  mysqli_fetch_array($jjim_select_result);
        $jjim_count_row = $jjim_count_array['count'];

        if ($jjim_count_row) {
            echo "이미 찜목록에 있는 상품입니다.";
        } else {
            $select_product = "select product_autoNum, p.product_no, p.product_category, p.product_size, p.product_color, p.product_name, p.product_price, im.main_img_dir_name, p.created_at 
            FROM product p inner join images_main im on p.product_no = im.product_no where product_autoNum = $post_no";
            $select_product_result = mysqli_query($con, $select_product);
            $select_product_array = mysqli_fetch_array($select_product_result);

            $insert_jjim = "insert into seungchanshop25.user_jjim(product_autoNum, user_id, main_img_dir_name, product_category, product_name, product_size, product_color, product_price)";
            $insert_jjim .= "values ($select_product_array[product_autoNum], '$user_id', '$select_product_array[main_img_dir_name]', '$select_product_array[product_category]', '$select_product_array[product_name]', '$select_product_array[roduct_size]', '$select_product_array[product_color]', $select_product_array[product_price])";
            mysqli_query($con, $insert_jjim);
            echo "찜목록에 등록되었습니다.";
        }
    } else {
        $user_id = '';
        echo "로그인이 필요한 서비스입니다.";
    }
?>