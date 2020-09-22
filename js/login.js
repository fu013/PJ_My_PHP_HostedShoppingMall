// 로그인 공백검사

window.onload = function (){
	const login_submit = document.getElementById('login_submit');


	login_submit.addEventListener('click', function(e){
		let login_id = document.getElementById('login_id');
		let login_password = document.getElementById('login_password');
		if(login_id.value == '') {
			alert('아이디를 입력하세요.');
	        e.preventDefault();
	        return false;
		}
		if(login_password.value == '') {
			alert('비밀번호를 입력하세요.');
	        e.preventDefault();
	        return false;
		}
	})
}