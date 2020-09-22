 <!-- 로그인 팝업창 -->
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<meta charset="utf-8">
	<meta name="viewport" content="width=device=width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>INDEX</title>
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/login.css">
 	<script>
    $(document).ready(function(){
       $(function() {
    		$(".login_open").on('click',function(){
               $(".popup_login").fadeIn(200);
               $(".dim").fadeIn(300);
           });
           $(".popup_login .close").on('click',function(){
               $(this).parent().fadeOut(200);
               $(".dim").fadeOut(300);
           });
        });
    });
 	</script>
 </head>
 <body>
 	<div class="popup_login">
            <h2>LOGIN</h2>
            <div class="con">
            <table class="type1">
                <caption>
                    <details>
                        <summary class="summary">로그인 폼</summary>
                        <div class="summary">아이디 ,비밀번호, 비밀번호 찾기, 아이디 찾기</div>
                    </details>
                    </caption>
                    <colgroup>
                    <col class="colvalue">
                    <col>
                    </colgroup>
                <div id="form_frame">
                    <form name="login_porm" action="action/login_action.php" method="post">
                        <tbody>
                        <tr>
                            <td>
                                <input type="text" id="login_id" name="login_id" placeholder="아이디">
                                <p id="vali_id">올바르지 않은 아이디 형식입니다.</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" id="login_password" name="login_pw" placeholder="비밀번호">
                                <p id="vali_pw">올바르지 않은 비밀번호 형식입니다.</p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                    <div class="txt_center">
                        <button type="submit" class="btn_login" id="login_submit">로그인</button>
                            </form>
                    </div>
                    <a href="#a" class="close">닫기</a>
                </div>
        <div class="dim"></div>
        <script type="text/javascript" src="js/login.js"></script>
 </body>
 </html>