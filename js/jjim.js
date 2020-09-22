$(document).ready(function () {
    $(".jjim_button").on('click', function () {
        const jjim_post_no = $(this)
            .siblings('.jjim_post_no').val();
        const jjim_data_json = {
            "jjim_post_no": jjim_post_no
        };
        $.ajax({
            type: "post",
            data: jjim_data_json,
            url: "info/jjim.php",
            dataType: "html",
            success: function(data){
                alert(data); 
            }
        });
    });
});