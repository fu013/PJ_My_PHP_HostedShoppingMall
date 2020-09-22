$(document).ready(function () {
    $(".basket").on('click', function () {
        const basket_post_no = $(this)
            .siblings('.basket_post_no')
            .val();
        const basket_data_json = {
            "basket_post_no": basket_post_no
        };
        $.ajax({
            type: "post",
            data: basket_data_json,
            url: "info/basket_save.php",
            dataType: "html",
            success: function (data) { // 베스킷.세이브 피에치피의 에코문을 응답으로 받는다. (장바구니에 이미 포함 여부를 출력한다.)
                alert(data);
            }
        });
    });
});