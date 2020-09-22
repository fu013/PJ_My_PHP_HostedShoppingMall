// 댓글등록 AJAX 요청
$(document).ready(function () {
    $(".btn_register_review").click(function (e) {
        let currentdate = new Date();
        const review_userid = $("#user_id").val();
        const review_comment = $(".review_box_wrap").val();
        const post_no = $("#post_no").val();

        const review_data_json = {
            "review_userid": review_userid,
            "review_comment": review_comment,
            "review_post_no": post_no,
        };
        if (review_userid == '') {
            alert('로그인이 필요한 서비스입니다.');
            e.preventDefault();
            return false;
        } else {
            $.ajax({
                type: "post",
                data: review_data_json,
                url: "Q&A_post.php",
                dataType: "html",
                success: function (data) {
                    $(".review_spot").append(
                        `<li class="unit_review">
                        <ul>
                            <li>
                                <h2>${review_userid}</h2><span>날짜 : ${currentdate}</span>
                                <button class="button_fix" style="top: 23px; height: 40px; width: 80px; right: 30px; position: absolute;}">수정</button>
                                <button class="button_delete" style="height: 40px; width: 80px; right: 30px; position: absolute; top: 65px;">삭제</button>
                            </li>
                            <li class="review_text">내용 : ${review_comment} </li>
                        </ul>
                    </li>`
                    )
                }
            });
        }
    });
});
