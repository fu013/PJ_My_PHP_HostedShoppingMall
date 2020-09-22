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
        <link rel="stylesheet" href="css/my_page.css">
        <link rel="stylesheet" href="css/my_page_withdrawal.css">
    </head>
    <body>

        <?php include "header.php";?>
        <?php include "fixed_header.php";?>
        <?php include "auth/auth_member.php";?>
        <?php include "mypage_common.php";?>

        <div class="content" style="width: 900px; margin-bottom: 50px;">
            <h2>회원탈퇴</h2>
            <div class="withdrawal">
                <p>앞으로 더 나은 모습으로 고객님을 다시 만날 수 있도록 노력하겠습니다. 그동안 이용해주신 것을 진심으로 감사드립니다.</p>
                <textarea class="withdrawal_reason" placeholder="탈퇴사유"></textarea>
                <center>
                    <button class="user_withdrawal_button" type="button">회원탈퇴</button>
                    <input type="hidden" id="delete_user_id" value="<?=$user_id?>">
                </center>
            </div>
        </div>
    </section>
    <?php include "footer.php";?>
    <script src="js/user_withdrawal.js"></script>
</body>
</html>