<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device=width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>INDEX</title>
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/sign_up.css">
</head>
<body>
  <?php include "header.php";?>
  <?php include "fixed_header.php";?>
    <section>
        <div class="sign_up_wrapper" action="action/">
          <h2 style="font-weight: 300;">회원가입</h2>
          <ul class="agreement_photo">
                   <li><i class="xi-document" style="opacity: 0.4;"></i></li>
                   <li><i class="xi-user-plus-o" style="opacity: 1.0;"></i></li>
                   <li><i class="xi-registered" style="opacity: 0.4;"></i></li>
                 </ul>
              <ul>
                   <li class="input_id">
                       <h4>아이디</h4>
                       <input type="text" id="user_id" name="user_id" placeholder="아이디를 입력해주세요." onchange="validateID()">
                       <button class="check_repeat_id" id="check_repeat_id" type="button">중복확인</button>
                       <input type="hidden" id="duplicate_check_id" value="">
                       <p id="alert_info_id" class="alert_info">아이디는 영소문자로 시작하는 6~20자의 영소문자또는 숫자여야 합니다.</p>
                   </li>
                    <li class="input_nickname">
                       <h4>닉네임</h4>
                       <input type="text" id="user_nickname" name="user_nickname" placeholder="닉네임을 입력해주세요." onchange="validateNn()">
                       <button class="check_repeat_nickname" id="check_repeat_nickname" type="button">중복확인</button>
                       <input type="hidden" id="duplicate_check_nickname" value="">
                       <p id="alert_info_nickname" class="alert_info">닉네임은 한영문자숫자만 가능하고, 최소2자리, 최대20자리까지 가능합니다.</p>
                   </li>
                   <li>
                       <h4>비밀번호</h4>
                       <input type="password" id="user_pw" name="user_pw" placeholder="비밀번호를 입력해주세요." onchange="validatePw()">
                       <p id="alert_info_pw" class="alert_info">비밀번호는 영문자로 시작하는 6~20자 영문자 또는 숫자로 이루어져 있어야 합니다.</p>
                   </li>
                   <li>
                       <h4>비밀번호 재확인</h4>
                       <input type="password" id="user_pw_c" name="user_pw_c" placeholder="비밀번호를 입력해주세요." onchange="validatePw_c()">
                       <p id="alert_info_pw_c" class="alert_info">비밀번호 확인란은, 비밀번호란과 일치해야합니다.</p>
                   </li>
                   <li>
                       <h4>이름</h4>
                       <input type="text" id="user_name" name="user_name" placeholder="이름을 입력해주세요." onchange="validateName()">
                       <p id="alert_info_name" class="alert_info">이름은 2~6자리 한글만 가능합니다.</p>
                   </li>
                   <li>
                       <h4>생년월일</h4>
                       <input type="date" id="user_birth" name="user_birth" placeholder="생년월일을 입력해주세요.">
                       <p id="alert_info_birth" class="alert_info">생년월일을 체크해주세요.</p>
                   </li>
                   <li>
                       <h4>성별</h4>
                       <p>
                            <select name="user_gender" class="user_gender" id="user_gender">
                            <option value="남성" selected="selected">남성</option>
                            <option value="여성">여성</option>
                            </select>
                        </p>
                   </li>
                   <li>
                       <h4>본인 확인 이메일</h4>
                       <input type="email" id="user_email" name="user_email" placeholder="이메일을 입력해주세요." onchange="validateEmail()">
                       <button class="check_repeat_email" id="check_repeat_email" type="button">중복확인</button>
                       <input type="hidden" id="duplicate_check_email" value="">
                       <p id="alert_info_email" class="alert_info">이메일을 형식에 맞게 입력해주세요.</p>
                   </li>
                   <li>
                       <h4>휴대전화</h4>
                       <p>
                        <!-- 왼쪽 정렬용도의 p태그 -->
                       <select name="user_phone1" class="select_Fphone" id="user_phone1">
                          <option value="010" selected="selected">010</option>
                          <option value="011">011</option>
                          <option value="012">012</option>
                          <option value="013">013</option>
                          <option value="014">014</option>
                          <option value="015">015</option>
                          <option value="016">016</option>
                          <option value="017">017</option>
                          <option value="018">018</option>
                          <option value="019">019</option>
    
                        </select>
                        &nbsp;-&nbsp;
                       <input type="tel" id="user_phone2" name="user_phone2" placeholder="" style="width: 80px;" onchange="validatePhone2()">&nbsp;-&nbsp;
                       <input type="tel" id="user_phone3" name="user_phone3" placeholder="" style="width: 80px;" onchange="validatePhone3()">
                        </p>
                       <p id="alert_info_phone" class="alert_info">휴대전화는 숫자만 입력해주세요.</p>
                   </li>
                   <li>
                        <h4>등급 선택</h4>
                        <p>
                            <select name="grade" class="select_grade" id="grade">
                                <option value="1" selected="selected">멤버</option>
                                <option value="9">관리자</option>
                            </select>
                        </p>
                        <p id="alert_info_phone" class="alert_info">기본값은 멤버입니다.</p>
                   </li>

                   <li>
                       <button type="submit" class="register" id="register">가입하기</button>
                   </li>
              </ul>
        </div>
    </section>

    <?php include "footer.php";?>
</body>
<script type="text/javascript" src="js/sign_up.js"></script>
</html>