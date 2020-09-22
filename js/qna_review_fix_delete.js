// 버튼을 눌렀을때, 화면단에서 보여주는 방식 설정 및 클릭했을때 AJAX 데이터 요청보내기
$(document).ready(function() {
    $(".fix_button").click(function(){
        let comment = $(this).siblings('.fix_comment').val();
        if (comment) {
            $(this).siblings('.delete_button').hide();
            $(this).siblings('.fix_comment').show();
            $(this).siblings('.fix_register').show();
            $(this).siblings('.cancel_fix').show();
        } else {
            $(this).hide();
            $(this).siblings('.delete_button').hide();
            $(this).before(`<textarea class="fix_comment" id="comment_fix" style="width: 80%; height: 100px;" placeholder='수정할 내용을 입력하세요.'></textarea>`);
            $(this).after(`<button type="button" class="fix_register">등록</button>`);
            $(this).after(`<button type="button" class="cancel_fix">취소</button>`);
        }

        $(".fix_register").on('click', function(){
            const comment_no = $(this).siblings(".comment_no").val(); // 코멘트 넘버
            let fixed_review = $(this).siblings(".fix_comment").val(); // 수정할 내용
            let AjaxFixedReview = $(this).parent().siblings('.review_text'); // 댓글을 수정할 텍스트 에이리어 영역
            const fixedReview_json = { "fix_comment_no":comment_no, "fixed_review":fixed_review };
            $.ajax({
                type:"post",
                data: fixedReview_json,
                url:"Q&A_post.php",
                dataType:"html",
                success:function(data){ 
                    AjaxFixedReview.text(`수정된 댓글 : ${fixed_review}`);
                }
            });
        });

        $(".cancel_fix").on('click', function(){
            $(this).hide();
            $(this).siblings('.fix_comment').hide();
            $(this).siblings('.fix_register').hide();
            $(this).siblings('.delete_button').show();
            $(this).siblings('.fix_button').show();
        });
    });

    $(".delete_button").on('click', function(){
        let delete_real = $(this).siblings('.real_delete_button').val();
        if(delete_real) {
            $(this).hide();
            $(this).siblings('.cancel_delete').show();
            $(this).siblings('.fix_button').hide();
            $(this).siblings('.real_delete_button').show();
        } else {
            $(this).hide();
            $(this).siblings('.fix_button').hide();
            $(this).after(`<button type="button" class="cancel_delete">취소</button>`);
            $(this).after(`<button type="button" class="real_delete_button" id="delete_real_button">삭제확인</button>`);
        }

        $(".real_delete_button").on('click', function(){
            $(this).parents('.unit_review').hide();
            const comment_no = $(this).siblings(".comment_no").val(); // 코멘트 넘버
            const fixedDelete_json = { "delete_comment_no":comment_no };
            $.ajax({
                type:"post",
                data: fixedDelete_json,
                url:"Q&A_post.php",
                dataType:"html",
            });
        });
        $(".cancel_delete").on('click', function(){
            $(this).hide();
            $(this).siblings('.real_delete_button').hide();
            $(this).siblings('.delete_button').show();
            $(this).siblings('.fix_button').show();
        });
    });
});

// 데이터베이스에 들어가는건 보내자마자 들어가지만 , 에코로 띄우는건 바로 띄워지지않으므로 append(로딩하면 없어짐), 을통해서 로딩하기전에 append로 미리 띄워주고
// 로딩후엔 데이터베이스에 있는값을 띄워주는 형식으로 댓글을 구성한다.

// 수정사항 해당겟 페이지번호의 댓글만 해당 페이지번호에 보여주도록한다. ex) product_autNum 이 21이면 21번의 댓글만 보여줌. 셀렉트 할때 이너조인으로 프로덕트 오토넘이랑
// 7월 1일 7월의 새로운 할일 => 댓글의 수정 / 삭제를 Ajax 방식으로 만든다.