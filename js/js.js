// JavaScript Document
function lof(x)
{
	location.href=x
}
    function login(table) {
        let acc = $('#acc').val();
        let pw = $("#pw").val();
        let ans = $("#ans").val()

        $.get("api/ans.php", {
            ans
        }, function(res) {
            if (parseInt(res)) {
                $.get('api/login.php', {
                    table,
                    acc,
                    pw
                }, function(result) {
                    if (parseInt(result)) {
                        switch (table) {
                            case 'mem':
                                location.href='index.php';
                                break;
                            case 'admin':
                                location.href='backend.php';
                                break;
                        }
                    } else {
                        alert('帳號或密碼錯誤');
                    }
                })
            } else {
                alert("對不起，您輸入驗證碼有誤，請您重新登入，謝謝 ^_^")
            }
        })
    }