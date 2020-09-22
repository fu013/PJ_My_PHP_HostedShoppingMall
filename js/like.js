$(document).ready(function () {
    $(".like_button").on('click', function() {
        const like_post_no = $(this)
            .siblings('.like_post_no').val();
        const like_data_json = {
            "like_post_no": like_post_no
        };
        $.ajax({
            type: "post",
            data: like_data_json,
            url: "info/like.php",
            dataType: "html",
            success: function(data){
                alert(data); 
            }
        });
    });
});