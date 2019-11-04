$('.l-btn').click(function() {
    const username = $('.u-name').val();
    const password = $('.u-pwd').val();

    $.ajax({
        type: 'post',
        data: {
            type: 'login',
            username, password
        },
        url: '../controller/UserDao.php',
        success(res) {
            console.log(res);
            //登陆成功跳转后台管理页面
        }
    });
});

$('.r-btn').click(function() {
    const username = $('.r-name').val();
    const password = $('.r-pwd').val();
    // const avatar = $('.r-avatar').val();
    const tel = $('.r-tel').val();
    const sex = $('.r-sex').val();

    $.ajax({
        type: 'post',
        data: {
            type: 'register',
            username, password, tel, sex
        },
        url: '../controller/UserDao.php',
        success(res) {
            console.log(res);
        }
    });
});
