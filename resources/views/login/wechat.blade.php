<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery.qrcode/1.0/jquery.qrcode.min.js"></script>
    <script src="https://cdn.bootcss.com/layer/3.1.0/layer.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>微信登录</title>
    <style>
        html {
            background: dimgrey;
        }
        #qr-code {
            left: 50%;
            top: 50%;
            position: absolute;
            transform: translate(-50%, -50%);
            padding: 15px;
            background: white;
        }
    </style>
</head>
<body>
<div data-id="{{$authId}}" id="qr-code"></div>

<script>
    let authId = $("#qr-code").attr('data-id');
    jQuery('#qr-code').qrcode('https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx28a2dc4642ca0a9a&redirect_uri=https%3A%2F%2Fcampus.qiujikeji.com/mp/wechat_login&response_type=code&scope=snsapi_base&state='+authId+'#wechat_redirect')
    let timeout=setInterval(()=>{
        query()
    },3000)

    function query() {
        $.ajax({
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{url('/verifyQrCodeLogin')}}",
            dataType: 'json',
            data: {'authId': authId},
            success: function (res) {
                if (res.code === 1) {
                    clearInterval(timeout);
                    layer.msg(res.msg, {
                        title: '提示',
                        icon: 6,
                        time: 3000
                    }, function () {
                        window.location.href = res.url;
                    })

                }
            },
        });
    }

</script>
</body>
</html>
