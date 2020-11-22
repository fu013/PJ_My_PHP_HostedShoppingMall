<?php include "info/admin_user_pagination.php";?>
<!DOCTYPE html>
<html lang="ko">
<head>
	   <meta charset="utf-8">
	   <meta name="viewport" content="width=device=width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
	   <title> ADMIN_INDEX</title>
     <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <link rel="stylesheet" href="css/admin_index.css">
     <Style>
        th, td {
            border: 1px solid black;
            padding: 10px;
            font-family: 'Open Sans';
        }
        section { background: #fff; margin-bottom: 0;}
        /*Button of pagination except for Previous, Next*/
        section .page-item { display: inline-block; width: 40px; height: 40px; line-height: 40px; margin: 0 3px; }
        section .page-item > a { color: black; }
        section .page-item:hover { background: #ddddff; }
        /*Previous Button*/
        section .page-item:first-child {  width: 80px; height: 40px; line-height: 40px; margin: 0 6px; }
        /*Next Button*/
        section .page-item:last-child {  width: 80px; height: 40px; line-height: 40px; margin: 0 6px; }
     </Style>
</head>
<body>
  <?php include "header.php";?>
  <?php include "fixed_header.php";?>
  <?php include "auth/auth_admin.php";?>
  <?php include "admin_common.php";?>

  <div class="post_arrange_wrap" style="display: inline-block;">
    <h1> 유저 관리 - 등록 현황 </h1>
    <table style="border: 1px solid black;">
        <tbody>
            <tr>
                <th>유저번호</th>
                <th>아이디</th>
                <th>닉네임</th>
                <th>비번</th>
                <th>이름</th>
                <th>생일</th>
                <th>성별</th>
                <th>이메일</th>
                <th>핸드폰</th>
                <th>등급</th>
            </tr>
        <?php
            while($product_row_post = mysqli_fetch_array($product_select_result)) {   
                echo "  
                        <tr>
                        <td>{$product_row_post['user_no']}</td>
                        <td>{$product_row_post['user_id']}</td>
                        <td>{$product_row_post['user_nickname']}</td>
                        <td>{$product_row_post['user_pw']}</td>
                        <td>{$product_row_post['user_name']}</td>
                        <td>{$product_row_post['user_birth']}</td>
                        <td>{$product_row_post['user_gender']}</td>
                        <td>{$product_row_post['user_email']}</td>
                        <td>{$product_row_post['user_phone']}</td>
                        <td>{$product_row_post['comment']}</td>
                        </tr>
                    ";
        }
        ?>
        </tbody>
    </table>
        <div class="container">
            <?=$paging?>
        </div>
  </div>  
</section>

  <?php include "footer.php";?>

</body>
</html>