<?php include "info/admin_post_pagination.php";?>
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
    <h1> 게시물 관리 - 등록 현황 </h1>
    <table style="border: 1px solid black;">
        <tbody>
            <tr>
                <th>상품번호</th>
                <th>이름</th>
                <th>카테고리</th>
                <th>가격</th>
                <th>사이즈</th>
                <th>좋아요</th>
                <th>조회수</th>
                <th>등록일</th>
            </tr>
        <?php
            while($product_row_post = mysqli_fetch_array($product_select_result)) {   
                echo "  
                        <tr>
                            <td>{$product_row_post['product_autoNum']}</td>
                            <td>{$product_row_post['product_name']}</td>
                            <td>{$product_row_post['product_category']}</td>
                            <td>{$product_row_post['product_price']}원</td>
                            <td>{$product_row_post['product_size']}</td>
                            <td>{$product_row_post['product_like']}</td>
                            <td>{$product_row_post['product_view']}</td>
                            <td>{$product_row_post['created_at']}</td>
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