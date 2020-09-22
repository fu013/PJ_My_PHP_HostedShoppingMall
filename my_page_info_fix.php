<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device=width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>회원정보 수정</title>
        <link
            rel="stylesheet"
            href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/my_page.css">
        <link rel="stylesheet" href="css/my_page_info_fix.css">
    </head>
    <body>

        <?php include "header.php";?>
        <?php include "fixed_header.php";?>
        <?php include "auth/auth_member.php";?>
        <?php include "mypage_common.php";?>

        <div class="content" style="margin-bottom: 100px; margin-left: 150px;">
            <h2>회원정보 수정</h2>
            <div class="con">
                <table class="type1">
                    <caption>
                        <details>
                            <summary class="summary">회원정보 수정폼</summary>
                            <div class="summary">아이디, 비밀번호, 비밀번호 재확인, 이름, 생년월일, 주소, 성별, 본인 확인 이메일, 휴대전화</div>
                        </details>
                    </caption>
                    <colgroup>
                        <col class="colvalue">
                        <col>
                    </colgroup>
                    <form>
                        <tbody>
                            <tr>
                                <th>
                                    <label for="id">아이디</label>
                                    <span>*<em class="hide">필수입력</em></span></th>
                                <td>
                                    <input type="text" id="user_id" placeholder="아이디를 입력해 주세요." name="register_ID" onchange="validateID()">
                                    <button class="check_repeat" id="check_repeat_id" type="button">중복확인</button>
                                    <input type="hidden" id="duplicate_check_id" value="">
                                    <input type="hidden" name="origin_user_id" id="origin_user_id" value="<?=$user_id?>"/>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="text">닉네임</label>
                                </th>
                                <td><input type="text" id="user_nickname" placeholder="닉네임만 입력해주세요" name="fix_ADDRESS" onchange="validateNn()"></td>
                                <button class="check_repeat" id="check_repeat_nickname" type="button">중복확인</button>
                                <input type="hidden" id="duplicate_check_nickname" value="">
                            </tr>
                            <tr>
                                <th>
                                    <label for="origin_password">기존비밀번호</label>
                                    <span>*<em class="hide">필수입력</em></span></th>
                                <td><input
                                    type="password"
                                    id="origin_password"
                                    placeholder="비밀번호를 입력해 주세요."
                                    name="origin_PASS"></td>
                                    <button class="check_repeat" id="check_repeat_pw" type="button">인증버튼</button>
                                    <input type="hidden" id="duplicate_check_pw" value="">
                            </tr>
                            <tr>
                                <th>
                                    <label for="user_pw">새 비밀번호</label>
                                    <span>*<em class="hide">필수입력</em></span></th>
                                <td><input
                                    type="password"
                                    id="user_pw"
                                    onchange="validatePw()"
                                    placeholder="비밀번호를 입력해 주세요."
                                    name="user_pw"></td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="user_pw_c">새 비밀번호 재확인</label>
                                    <span>*<em class="hide">필수입력</em></span></th>
                                <td><input
                                    type="password"
                                    id="user_pw_c"
                                    onchange="validatePw_c()"
                                    placeholder="비밀번호를 입력해 주세요."
                                    name="user_pw_c"></td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="name">이름</label>
                                    <span>*<em class="hide">필수입력</em></span></th>
                                <td><input type="text" id="user_name" placeholder="이름만 입력해주세요." name="fix_NAME" onchange="validateName()"></td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="birth">생년월일</label>
                                </th>
                                <td><input type="date" id="user_birth" placeholder="숫자만 입력해주세요" name="fix_BIRTH" ></td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="email">본인확인 이메일</label>
                                    <span>*<em class="hide">필수입력</em></span></th>
                                <td><input type="text" id="user_email" placeholder="이메일을 입력해 주세요." name="fix_EMAIL" onchange="validateEmail()"></td>
                                <button class="check_repeat" id="check_repeat_email" type="button">중복확인</button>
                                <input type="hidden" id="duplicate_check_email" value="">
                            </tr>
                            <tr>
                                <th>
                                    <label for="phone">휴대전화</label>
                                </th>
                                <td>
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
                                    -
                                    <input type="tel" id="user_phone2" name="fix_PHONE2" onchange="validatePhone2()"> -
                                    <input type="tel" id="user_phone3" name="fix_PHONE3" onchange="validatePhone3()">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="txt_center">
                    <button class="btn_cancel" type="submit">취소</button>
                    <button type="button" id="btn_save" class="btn_save">수정</button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php include "footer.php";?>

<script src="js/fix_userinfo.js"></script>

</body>
</html>