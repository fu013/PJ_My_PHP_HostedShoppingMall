const priceJ = /^[0-9]*$/;
const commentJ = /^[A-Za-z가-힣0-9]{1,500}$/;

function numberMaxLength(e) {
    if (e.value.length > e.maxLength) {
        e.value = e
            .value
            .slice(0, e.maxLength);
    }
}

window.onload = function () {
    const randomCreate = document.getElementById('randomCreate');
    const register = document.getElementById('product_register');
    register.addEventListener('click', function (e) {
        let guideline = document.getElementById('product_guideline');
        let num = document.getElementById('product_no');
        let price = document.getElementById('product_price');
        let name = document.getElementById('product_name');
        let comment = document.getElementById('product_comment');

        if (name.value == '') {
            alert('상품명을 입력해주세요.');
            name.focus();
            e.preventDefault();
            return false;
        } else if (price.value == '') {
            alert('상품가격을 입력해주세요.');
            price.focus();
            e.preventDefault();
            return false;
        } else if (priceJ.test(price.value) == false) {
            alert('상품가격이 양식에 맞지않습니다. 숫자만 입력부탁드립니다.');
            price.focus();
            e.preventDefault();
            return false;
        }
    })
}