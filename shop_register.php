<?php include "info/random_num.php"?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device=width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
	 <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
     <link rel="stylesheet" href="css/shop_register.css">
</head>
<body>
    
    <?php include "header.php";?>
    <?php include "fixed_header.php";?>
    <?php include "auth/auth_admin.php";?>


       <div class="inquire_wrapper">
        <h2>게시물작성(SHOP)</h2>
        <div class="con">
            <form name="shop_register_form" action="action/shop_action.php" method="post" enctype="multipart/form-data">
            <table class="type1">
                <caption>
                    <details>
                        <summary class="summary">게시물 작성폼</summary>
                        <div class="summary">상품번호, 상품 가이드라인, 상품명, 사이즈, 색상지정, 배송정보, 상품정보</div>
                    </details>
                    </caption>
                    <colgroup>
                    <col class="colvalue">
                    <col>
                    </colgroup>
  <!--               <form> -->
                        <tbody>
                        <!-- <tr> -->
                            <!-- <th><label for="product_no">상품번호</label></th> -->
                            <!-- <td> -->
                                <input type="hidden" id="product_no" name="product_no" value="<?= $randomNum.'_'.$date.':'.$date_array[0]?>">
                                <!-- <button type="button" id="randomCreate">랜덤숫자생성</button> -->
                            <!-- </td> -->
                        <!-- </tr> -->
                        <tr>
                            <th><label for="product_category">상품종류</label></th>
                            <td><select name="product_category" class="product_category" title="문의분류선택">
                                    <option value="티셔츠" selected="selected">티셔츠</option>
                                    <option value="후드티">후드티</option>
                                    <option value="청바지">청바지</option>
                                    <option value="슬렉스">슬렉스</option>
                                    <option value="운동화">운동화</option>
                                    <option value="슬리퍼">슬리퍼</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="product_name">상품명</label></th>
                            <td><input type="text" id="product_name" name="product_name" placeholder="필수정보입니다.">
                        </tr>
                        <tr>
                            <th><label for="product_price">상품가격</label></th>
                            <td><input type="text" id="product_price" name="product_price" placeholder="필수정보, 숫자만 가능">
                        </tr>
                        <tr>
                            <th><label for="product_guideline">상품 가이드라인</label></th>
                            <td><input type="text" id="product_guideline" name="product_guideline" placeholder="40자 이내로 입력해주세요. " maxlength="40" oninput="numberMaxLength(this);" >
                            </td>
                        </tr>
                        <tr>
                            <th><label for="product_size">사이즈</label></th>
                            <td>
                                <select id="product_size" name="product_size" class="product_size">
                                    <option value="S" selected="selected">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="product_color">색상지정</label></th>
                            <td>
                                <select id="product_color" name="product_color" class="product_color">
                                    <option value="빨강색" selected="selected">빨강색</option>
                                    <option value="파랑색">파랑색</option>
                                    <option value="초록색">초록색</option>
                                    <option value="검정색">검정색</option>
                                    <option value="흰색">흰색</option>
                                    <option value="분홍색">분홍색</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="product_main_img">상품-대표이미지(표지)</label></th>
                            <td><input type="file" id="product_main_img" name="product_main_img"></td>
                        </tr>
                        <tr>
                            <th><label for="product_img">상품-이미지첨부(내부)</label></th>
                            <td><input type="file" multiple id="product_img" name="product_img[]"></td>
                        </tr>
                        <tr>
                            <th><label for="product_comment">상품정보-내용</label></th>
                            <td><textarea id="product_comment" placeholder="상품사진 밑에 적을 내용을 넣어주세요. (500자 이내)" name="product_comment" maxlength="500" oninput="numberMaxLength(this);"></textarea></td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                    <div class="txt_center">
                    <button class="btn_list" type="button" onclick="location.href='admin_index.php' ">취소</button>
                    <button class="btn_write" name="write_post" type="submit" id="product_register">게시물등록</button>
                    </div>
                </form>
            </div>
       </div>


    <?php include "footer.php";?>
    <script type="text/javascript" src="js/shop_register.js"></script>
</body>
</html>