const idJ = /^[a-z]+[a-z0-9]{5,19}$/i; // 아이디는 영문자로 시작하는 6~20자 영문자 또는 숫자이어야 합니다.
const pwJ = /^[a-z]+[a-z0-9]{5,19}$/i; // 알파벳 a~b 대문자가능, 숫자 0~9까지가능 특문안됨, 길이 4~12
const nicknameJ = /^[A-Za-z가-힣0-9]{2,20}$/; // 알파벳 대문자,소문자,숫자,한국어 포함해서 최소2자리, 최대20자리가능
const nameJ = /^[가-힣]{2,6}$/; // 2~6자리 한글만됨
const mailJ = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i; // 숫자 알파벳 대문자가능 + @ 영어+숫자조합 대문자가능하고,이후에 com들어오는자리 2~3자리만가능
const phoneJ = /^[0-9]{3,4}$/;
const int = /^[0-9]{2,9}$/;


// change 유효성 검사
function validateID(){
  let user_id = document.getElementById('user_id').value;
  if(idJ.test(user_id) == false) { 
      alert('아이디는 영소문자로 시작하는 6~20자 영문자 또는 숫자이어야 합니다.');
      document.getElementById('user_id').focus();
      return false;
  }
}
function validateNn(){
  let user_nickname = document.getElementById('user_nickname').value;
  if(nicknameJ.test(user_nickname) == false) { 
      alert('닉네임은 특수문자제외 어떤문자숫자든 최소2자리, 최대20자리까지 가능합니다.');
      document.getElementById('user_nickname').focus();
      return false;
  }
}
function validatePw(){
  let user_pw = document.getElementById('user_pw').value;
  if(pwJ.test(user_pw) == false) { 
    alert('비밀번호는 영문자로 시작하는 6~20자 영문자 또는 숫자로 이루어져 있어야 합니다.');
    document.getElementById('user_pw').focus();
    return false;
  }
}
function validatePw_c(){
  let user_pw = document.getElementById('user_pw').value;
  let user_pw_c = document.getElementById('user_pw_c').value;
  if(user_pw !== user_pw_c) { 
    alert('비밀번호 재확인란의 입력값은 비밀번호란과 같아야합니다.');
    document.getElementById('user_pw_c').focus();
    return false;
  }
}
function validateName(){
  let user_name = document.getElementById('user_name').value;
  if(nameJ.test(user_name) == false) { 
    alert('이름은 2~6자리, 한글만 가능합니다.');
    document.getElementById('user_name').focus();
    return false;
  }
}
function validateEmail(){
  let user_email = document.getElementById('user_email').value;
  if(mailJ.test(user_email) == false) { 
    alert('메일 형식에 맞게 입력해주세요.');
    document.getElementById('user_email').focus();
    return false;
  }
}


function validatePhone2(){
  let user_phone2 = document.getElementById('user_phone2').value;
  if(phoneJ.test(user_phone2) == false) { 
    alert('휴대폰번호에는 숫자3-4자리만 입력해주세요.');
    document.getElementById('user_phone2').focus();
    return false;
  }
}
function validatePhone3(){
  let user_phone3 = document.getElementById('user_phone3').value;
  if(phoneJ.test(user_phone3) == false) { 
    alert('휴대폰번호에는 숫자3-4자리만 입력해주세요.');
    document.getElementById('user_phone3').focus();
    return false;
  }
}


// 회원가입 예외처리
// window.onload = function() { // 전체를 한번 로드한다. 여기서 서브밋타입 버튼을 찾는다

//   // 첫번쨰자리 010~ 019 가능 , 두번쨰 0~9 3,4자리, 3번쨰 무조건4자리
window.onload = function() { 

let origin_user_id = document.getElementById('origin_user_id').value;
let duplicate_check_id = document.getElementById('duplicate_check_id').value;
let duplicate_check_nickname = document.getElementById('duplicate_check_nickname').value;
let duplicate_check_email = document.getElementById('duplicate_check_email').value;
let duplicate_check_pw = document.getElementById('duplicate_check_pw').value;

$("#check_repeat_id").on('click', function () {
let user_id = document.getElementById('user_id').value;
if (user_id == '') {
  alert('아이디를 입력해주세요.');
} else if (idJ.test(user_id) == false) {     
  alert('아이디는 영소문자로 시작하는 6~20자 영문자 또는 숫자이어야 합니다.');
} else {
  const user_id_data_json = {
      "request_user_id":user_id
  };
  $.ajax({
    type: "post",
    data: user_id_data_json,
    url: "inspection/user_id_inspection.php",
    dataType: "html",
    success: function(data) {
      alert(data);
      duplicate_check_id = `${data}`;
    }
  });
}
});

$("#check_repeat_nickname").on('click', function () {
let user_nickname = document.getElementById('user_nickname').value;
if (nicknameJ.test(user_nickname) == false) {
  alert('닉네임은 특수문자제외 어떤문자숫자든 최소2자리, 최대20자리까지 가능합니다.');
} else if (user_nickname == '') {
  alert('닉네임을 입력해주세요.');
} else {
  const user_nickname_data_json = {
      "request_user_nickname":user_nickname
  };
  $.ajax({
    type: "post",
    data: user_nickname_data_json,
    url: "inspection/user_nickname_inspection.php",
    dataType: "html",
    success: function(data) {
      alert(data);
      duplicate_check_nickname = `${data}`;
    }
  });
}
});

$("#check_repeat_email").on('click', function () {
let user_email = document.getElementById('user_email').value;
if (mailJ.test(user_email) == false) {
  alert('메일 형식에 맞게 입력해주세요.');
} else if (user_email == '') {
  alert('이메일을 입력해주세요.');
} else {
  const user_email_data_json = {
      "request_user_email":user_email
  };
  $.ajax({
    type: "post",
    data: user_email_data_json,
    url: "inspection/user_email_inspection.php",
    dataType: "html",
    success: function(data) {
      alert(data);
      duplicate_check_email = `${data}`;
    }
  });
}
});

$("#check_repeat_pw").on('click', function () {
  let user_origin_password = document.getElementById('origin_password').value;
  if (pwJ.test(user_origin_password) == false) {
    alert('비밀번호 형식에 맞게 입력해주세요.');
  } else if (user_origin_password == '') {
    alert('기존 비밀번호를 입력해주세요.');
  } else {
    const user_email_data_json = {
        "request_user_pw":user_origin_password, "origin_user_id":origin_user_id
    };
    $.ajax({
      type: "post",
      data: user_email_data_json,
      url: "inspection/user_password_inspection.php",
      dataType: "html",
      success: function(data) {
        alert(data);
        duplicate_check_pw = `${data}`;
      }
    });
  }
  });

const register = document.getElementById('btn_save'); // 찾은 서브밋타입 버튼
register.addEventListener('click', function(){ // 클릭했을때 onload + 클릭했을때니깐 클릭하기전에 모든걸 한번더 읽었을경우라는 전제가 포함된다.
// 예를들어 처음에 한번 페이지에 들어왔을때 onload로 모든데이터를 파악 => 이때는 아무런 인풋에 값이 들어가지않은 상태일거임
// 그다음 서브밋을 클릭했을때는, 어떠한값이 들어있었다고할때, 서브밋 전에 있었던 엘리먼트를 한번더 데이터를 읽었다는 전제하에 (서브밋태그가 가장밑에있으므로 그위에있는 데이터는
// 모두 읽힌상태) 요청을 보내기때문에, 어떠한 값이 들어온상태에서 보내게된다.

// 해당 ID를 가진 요소의 값
let user_id = document.getElementById('user_id').value;
let user_nickname = document.getElementById('user_nickname').value;
let user_pw = document.getElementById('user_pw').value;
let user_pw_c = document.getElementById('user_pw_c').value;
let user_name = document.getElementById('user_name').value;
let user_birth = document.getElementById('user_birth').value;
let user_email = document.getElementById('user_email').value;
let user_phone1 = document.getElementById('user_phone1').value;
let user_phone2 = document.getElementById('user_phone2').value;
let user_phone3 = document.getElementById('user_phone3').value;
let origin_password = document.getElementById('origin_password').value;


// 입력여부 검사
if(user_id == '') {
  alert('아이디를 입력해주세요.');
  document.getElementById('user_id').focus();
  return false;
}
if(idJ.test(user_id) == false) { 
    alert('아이디는 영소문자로 시작하는 6~20자 영문자 또는 숫자이어야 합니다.');
    document.getElementById('user_id').focus();
    return false;
}


if(user_nickname == '') {
  alert('닉네임을 입력해주세요.');
  document.getElementById('user_nickname').focus();
  return false;
}
if(nicknameJ.test(user_nickname) == false) { 
  alert('닉네임은 특수문자제외 어떤문자숫자든 최소2자리, 최대20자리까지 가능합니다.');
  document.getElementById('user_nickname').focus();
  return false;
}


if(user_pw == '') {
  alert('비밀번호를 입력해주세요.');
  document.getElementById('user_pw').focus();
  return false;
}
if(pwJ.test(user_pw) == false) { 
alert('비밀번호는 영문자로 시작하는 6~20자 영문자 또는 숫자로 이루어져 있어야 합니다.');
document.getElementById('user_pw').focus();
return false;
}


if(user_pw_c == '') {
  alert('비밀번호_확인을 입력해주세요.');
  document.getElementById('user_pw_c').focus();
  return false;
}
if(user_pw !== user_pw_c) { 
  alert('비밀번호 재확인란의 입력값은 비밀번호란과 같아야합니다.');
  document.getElementById('user_pw_c').focus();
  return false;
}


if(user_name == '') {
  alert('이름을 입력해주세요.');
  document.getElementById('user_name').focus();
  return false;
}
if(nameJ.test(user_name) == false) { 
  alert('이름은 2~6자리, 한글만 가능합니다.');
  document.getElementById('user_name').focus();
  return false;
}


if(user_birth == '') {
  alert('생년월일을 입력해주세요.');
  document.getElementById('user_pw_c').focus();
  return false;
} 

if(user_email == '') {
  alert('이메일을 입력해주세요.');
  document.getElementById('user_email').focus();
  return false;
}
if(mailJ.test(user_email) == false) { 
  alert('메일 형식에 맞게 입력해주세요.');
  document.getElementById('user_email').focus();
  return false;
}


if(user_phone1 == '' || user_phone2 == '' || user_phone3 == '') {
  alert('핸드폰번호를 입력해주세요.');
  document.getElementById('user_phone2').focus();
  return false;
}
if(phoneJ.test(user_phone2) == false) { 
  alert('휴대폰번호에는 숫자3-4자리만 입력해주세요.');
  document.getElementById('user_phone2').focus();
  return false;
}
if(phoneJ.test(user_phone3) == false) { 
  alert('휴대폰번호에는 숫자3-4자리만 입력해주세요.');
  document.getElementById('user_phone3').focus();
  return false;
}

if(user_id == user_pw) {
  alert('아이디와 비밀번호가 같으면 안됩니다.');
  document.getElementById('user_id').focus();
  return false;
}

if(user_id == user_pw) {
  alert('아이디와 비밀번호가 같으면 안됩니다.');
  document.getElementById('user_id').focus();
  return false;
}
if(origin_password == user_pw) {
  alert('새 비밀번호가 기존의 비밀번호와 일치합니다.');
  document.getElementById('origin_password').focus();
  return false;
}


if(duplicate_check_id != '이 아이디는 사용하셔도 좋습니다.') { 
  alert('아이디 중복검사를 안했거나 아이디가 중복입니다..');
  document.getElementById('user_id').focus();
  return false;
} else {
  // 텍스트 메세지 "이 아이디는 사용하셔도 좋습니다" => 히든 value값의 값으로 등록되는데, 이값이 일치(등록) 되면,
  // 체크됬다는 표시생성
  // 등록되지 않았다면 위에서 hide 등록되었으면 show
}
if(duplicate_check_nickname != '이 닉네임은 사용하셔도 좋습니다.') { 
  alert('닉네임 중복검사를 안했거나 닉네임이 중복입니다.');
  document.getElementById('user_nickname').focus();
  return false;
}
if(duplicate_check_email != '이 이메일은 사용하셔도 좋습니다.') { 
  alert('이메일 중복검사를 안했거나 이메일이 중복입니다.');
  document.getElementById('user_email').focus();
  return false;
}
if(duplicate_check_pw != '비밀번호가 일치합니다.') { 
  alert('기존 비밀번호를 인증하지않았거나, 비밀번호가 일치하지 않습니다.');
  document.getElementById('origin_password').focus();
  return false;
}
    
    
    let user_fix_data_json = {
      "user_id":user_id, "user_nickname":user_nickname, "user_pw":user_pw, "user_name":user_name, 
      "user_birth":user_birth, "user_email":user_email, "user_phone1":user_phone1,
      "user_phone2":user_phone2, "user_phone3":user_phone3, "origin_user_id":origin_user_id
    };

    $.ajax({
      type: "post",
      data: user_fix_data_json,
      url: "action/signUp_data_fix.php",
      dataType: "html",
      success: function(data) {
        alert('회원정보가 수정되었습니다(자동 재로그인).');
        location.href = 'action/logout.php';
      }
    });
  })
}