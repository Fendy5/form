<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <link href="https://cdn.bootcss.com/weui/1.1.2/style/weui.min.css" rel="stylesheet">
    <title>扫码结果</title>
</head>
<body>
<div class="weui-msg">
    <div class="weui-msg__icon-area"><i class="weui-icon-success weui-icon_msg"></i></div>
    <div class="weui-msg__text-area">
        <h2 class="weui-msg__title">登录成功</h2>
        <p class="weui-msg__desc">微信登录成功，正在跳转到首页~</p>
    </div>
    <div class="weui-msg__opr-area">
        <p class="weui-btn-area">
            <a href="javascript:WeixinJSBridge.call('closeWindow');" class="weui-btn weui-btn_primary">关闭页面</a>
        </p>
    </div>
    <div class="weui-msg__extra-area">
        <div class="weui-footer">
            <p class="weui-footer__links">
                <a href="javascript:" class="weui-footer__link">秋霁问卷</a>
            </p>
            <p class="weui-footer__text">Copyright © 2020 </p>
        </div>
    </div>
</div>
</body>
</html>
