// 댓글등록 AJAX 요청
$(document).ready(function () {
    $("#review_button").click(function (e) {
        let currentdate = new Date();
        const review_userNickname = $("#review_userNickname").val();
        const review_comment = $("#review_commnet").val();
        const review_satisfaction = $("#review_satisfaction").val();
        const img_dir = $("#review_imgName").val();
        const post_no = $("#post_no").val();
        const product_name = $("#product_name").val();
        const product_size = $("#product_size").val();
        const review_data_json = {
            "review_userNickname": review_userNickname,
            "review_comment": review_comment,
            "review_satisfaction": review_satisfaction,
            "review_imgName": img_dir,
            "review_post_no": post_no,
            "review_product_name": product_name,
            "review_prodcut_size": product_size
        };
        if (review_userNickname == '') {
            alert('로그인이 필요한 서비스입니다.');
            e.preventDefault();
            return false;
        } else {
            $.ajax({
                type: "post",
                data: review_data_json,
                url: "shop_info.php",
                dataType: "html",
                success: function (data) {
                    $(".review_spot").append(
                        `<div class="simple_review">
                            <p class="product_no">상품넘버 : ${post_no}</p>
                            <p class="product_name">상품이름 : ${product_name}</p>                      
                            <h4 class="size">상품 사이즈 : ${product_size}</h4>
                            <p class="user_nickname">유저닉네임 : ${review_userNickname}</p>  
                            <p class="review_satisfaction"> 상품 만족도 : ${review_satisfaction}</p>
                            <h5 class="content">코멘트 : ${review_comment}</h5>
                            <p class='created_at'> 작성시간 : ${currentdate}</p>
                            <img src="${img_dir}">
                        </div>`
                    )
                }
            });
        }
    });
});

// 데이터베이스에 들어가는건 보내자마자 들어가지만 , 에코로 띄우는건 바로 띄워지지않으므로 append(로딩하면 없어짐), 을통해서
// 로딩하기전에 append로 미리 띄워주고 로딩후엔 데이터베이스에 있는값을 띄워주는 형식으로 댓글을 구성한다. 수정사항 해당겟 페이지번호의
// 댓글만 해당 페이지번호에 보여주도록한다. ex) product_autNum 이 21이면 21번의 댓글만 보여줌. 셀렉트 할때 이너조인으로
// 프로덕트 오토넘이랑 7월 1일 7월의 새로운 할일 => 댓글의 수정 / 삭제를 Ajax 방식으로 만든다.