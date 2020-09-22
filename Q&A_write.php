<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device=width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
	 <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
     <link rel="stylesheet" href="css/Q&A_write.css">
</head>
<body>
    
    <?php include "header.php";?>
    <?php include "fixed_header.php";?>
    <?php include "auth/auth_member.php";?>


       <div class="inquire_wrapper">
        <h2>문의작성</h2>
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
                <form action="action/QnA_action.php" method="post" name="QnA_Form">
                        <tbody>
                        <tr>
                            <th><label for="inquire_category">분류</label></th>
                            <td><select name="inquire_category" class="inquire_category" title="문의분류선택">
                                <option value="배송문의" selected="selected">배송문의</option>
                                <option value="입금문의">입금문의</option>
                                <option value="환불문의">환불문의</option>
                                <option value="기타문의">기타문의</option>
                                </select>
                        </tr>
                        <tr>
                            <th><label for="inquire_id">유저아이디</label></th>
                            <td><input type="hidden" id="inquire_id" name="inquire_id" value="<?=$user_id?>"><?=$user_id?></td>
                        </tr>
                        </tr>
                        <tr>
                            <th><label for="inquire_title">제목</label></th>
                            <td><input type="text" id="inquire_title"  name="inquire_title"></td>
                        </tr>

                        <tr>
                            <th><label for="inquire_content">내용</label></th>
                            <td><textarea id="inquire_content" placeholder="문의사항을 적어주세요." name="inquire_content"></textarea></td>
                        </tr>
                         
                        </tbody>
                    </table>
                    </div>
                    <div class="txt_center">

                    <button class="btn_list" type="button" onclick="location.href='Q&A.php' ">목록</button>

                    <button class="btn_write" type="submit">글쓰기</button>

                    </div>
                </form>
        </div>
       </div>


    <?php include "footer.php";?>

</body>
</html>