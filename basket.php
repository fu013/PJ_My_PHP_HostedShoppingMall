<?php session_start(); ?>
<?php include "info/basket_pagination.php";?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device=width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>INDEX</title>
        <link
            rel="stylesheet"
            href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/basket.css">
    </head>
    <body>
        <?php include "header.php";?>
        <?php include "fixed_header.php";?>

        <section>
            <div class="basket_wrapper">
                <h2 style="font-weight: 400;">장바구니</h2>
                <ul class="basket_photo">
                    <li>
                        <i class="xi-briefcase" style="opacity: 1.0;"></i>
                    </li>
                    <li>
                        <i class="xi-credit-card" style="opacity: 0.4;"></i>
                    </li>
                    <li>
                        <i class="xi-box" style="opacity: 0.4;"></i>
                    </li>
                </ul>
                <div class="basket_wrapper_2">
                    <div class="bottom_wrapper">
                        <div class="complete">
                            <table>
                                <tr>
                                    <th>상품이미지</th>
                                    <th>상품번호</th>
                                    <th>카테고리</th>
                                    <th>상품이름</th>
                                    <th>가격</th>
                                    <th>사이즈</th>
                                    <th>컬러</th>
                                </tr>


                                <!-- 장바구니 상품 -->
                                <?php
                        // 쇼핑카트에 물건이 존재하면!
                        if(!empty($_SESSION["shopping_cart"])) {
                          for($i=$firstLimit; $i < $secondLimit; $i++) {
                          ?>
                                <tr class="basket_product_tr">
                                    <td class="inner_td">
                                        <input
                                            type="checkbox"
                                            class="inner_checkbox"
                                            name="basket_item_s"
                                            style="margin: 0; padding: 0;"/>
                                        <img
                                            class="basket_item_img"
                                            src="<?=$_SESSION["shopping_cart"][$i]['item_img'];?>">
                                    </td>
                                    <td class="basket_item_num"><?=$_SESSION["shopping_cart"][$i]['item_num'];?></td>
                                    <td class="basket_item_category"><?=$_SESSION["shopping_cart"][$i]['item_category'];?></td>
                                    <td class="basket_item_name"><?=$_SESSION["shopping_cart"][$i]['item_name'];?></td>
                                    <td class="basket_item_price" style="font-size: 15px;"><?=$_SESSION["shopping_cart"][$i]['item_price'];?>
                                        <text>원</text>
                                    </td>
                                    <td class="basket_item_size"><?=$_SESSION["shopping_cart"][$i]['item_size'];?></td>
                                    <td class="basket_item_color"><?=$_SESSION["shopping_cart"][$i]['item_color'];?></td>
                                </tr>
                                <?php
                          } //foreach 끝
                          ?>
                                <?php
                      } //if문 끝
                    ?>
                            </table>

                            <ul class="select_list">
                                <li>
                                    <button type="button" class="selected_item_order">선택상품 주문</button>
                                </li>
                                <li>
                                    <button type="button" class="selected_item_delete">선택상품 삭제</button>
                                </li>
                                <li>
                                    <button type="button" class="all_item_select">상품 전체선택</button>
                                </li>
                                <li>
                                    <button type="button" class="all_item_deselect">전체선택해제</button>
                                </li>
                            </ul>

                        </div>
                        <ul class="paybox">
                            <li class="title">결제금액</li>
                            <li>상품금액<span class="money">0원</span></li>
                            <li>배송료<span class="money">+0원</span></li>
                            <li>총 결제금액<span class="money">0원</span></li>
                            <hr class="_">
                            <li>
                                <button>주문기능은 없습니다</button>
                            </li>
                        </ul>
                    </div>
                </div>

                <?=$paging ?>
                <table class="guide">
                    <tdody>
                        <tr>
                            <th>장바구니 이용안내</th>
                            <td>
                                <ul>
                                    <li>-[전체 상품 주문] 버튼을 누르시면 장바구니의 구분없이 선택된 모든 상품에 대한 주문/결제가 이루어집니다.
                                    </li>
                                    <li>-[상품명]상단 □를 체크 하시고 [선택 상품 주문] 버튼을 누르시면 선택된 상품에 대한 주문/결제가 이루어집니다.</li>
                                    <li>-[장바구니 비우기] 버튼을 누르시면 장바구니에 저장된 상품이 삭제됩니다.</li>
                                    <li>-장바구니에 담긴 상품은 14일 동안 보관됩니다. 보관된 상품은 14일 이후에 삭제되오니 장바구니에서 삭제된 경우 다시 장바구니에
                                        담으시고 좀더 오래 보관 하고 싶으시면 상품명 우측의 ♡를 클릭하시면 [좋아요]코너에 보관됩니다.우측의 X를 누르시면 상품이 삭제 됩니다.</li>
                                    <li>-선택하신 상품의 수량을 변경하실 경우 숫자 좌우의 -,+버튼을 이용하시면 됩니다, 또한 옵션을 변경하실 경우 변경 후 [옵션변경]
                                        버튼누르시면 색상 / 사이즈 변경이 가능 합니다.</li>
                                </ul>
                            </td>
                        </tr>
                    </tdody>
                </table>
            </section>
            <?php include "footer.php";?>
            <script>
                $(document).ready(function () {

                    // 전체선택
                    $('.all_item_select').on('click', function () {
                        $(".inner_checkbox").prop('checked', true);
                        alert('전체 체크');
                    });

                    // 전체선택 헤제
                    $('.all_item_deselect').on('click', function () {
                        $(".inner_checkbox").prop('checked', false);
                        alert('전체 체크해제');
                    });

                    // 한개밖에 못들고옴 값을 전체 다들고올라면 each문이나 map으로 배열형태로 가져와야될듯 그다음에 포문이나 포이치문으로 값을 전부
                    // 받아와야될듯함. 그래서 지금 한개밖에 삭제안됨.
                    $(".selected_item_delete").on('click', function () {
                        let ischecked = $("input:checkbox[name='basket_item_s']:checked").val(); // 체크가 됬는지 안됬는지 알려면 뒤에 꼭! val를 붙여야한다. 체크되면 value값으로 on, 체크가 안되면 undefined를 반환하기때문이다.
                        let checked_item = $("input:checkbox[name='basket_item_s']:checked")
                        if (ischecked) {
                            for (let i = 0; i < $(checked_item).length; i++) {
                                let selected_product_num = $(checked_item[i])
                                    .parent('.inner_td')
                                    .siblings(".basket_item_num")
                                    .text();
                                let this_parent = $(checked_item[i]).parents(".basket_product_tr");
                                let selected_basket_data_json = {
                                    "selected_product_num": selected_product_num
                                };
                                $.ajax({
                                    type: "post",
                                    data: selected_basket_data_json,
                                    url: "info/basket_delete.php",
                                    dataType: "html",
                                    success: function (data) {
                                        this_parent.hide();
                                    }
                                });
                            }
                            alert('선택한 상품이 삭제 되었습니다.');
                        } else {
                            alert('상품을 먼저 선택해주세요.');
                            return false;
                        }
                    });
                });
            </script>

        </body>
    </html>