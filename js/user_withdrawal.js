$(".user_withdrawal_button").on('click', function () {
    let delete_user_id = document.getElementById('delete_user_id').value;
      const user_id_data_json = {
          "delete_user_id":delete_user_id
        };
        $.ajax({
        type: "post",
        data: user_id_data_json,
        url: "/seungchan/action/user_delete.php",
        dataType: "html",
        success: function(data) {
            alert('회원이 탈퇴되었습니다. 복구는 불가합니다');
            location.href = 'action/logout.php';
        }
    });
});