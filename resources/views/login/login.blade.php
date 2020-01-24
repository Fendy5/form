<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <link href="https://cdn.bootcss.com/weui/1.1.2/style/weui.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/layer/3.1.0/layer.js"></script>
    <title>秋霁问卷</title>
    <style>
        body
        {
            margin: 0;
            padding: 0;
            background-size: 100%;
            background-position: center;
        }
        .login-contianer{
            position: absolute;
            left: 50%;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
            top: 35px;
            background-color: white;
            padding: 0px;
            width: 40%;
            border-radius: 15px;
        }
        .form-cc
        {    padding: 40px;
            margin-top: 0px;
            float: left;
            width: 100%;
        }

        .userloginheading
        {
            color: #04878c;
            text-align: center;
            padding: 10px;
            border-radius: 30px;
            font-size: 17px;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 2px;
            font-family: sans-serif;

            margin-bottom: 25px;
        }

        .form-control
        {
            background-color: #f2ffffbd;
            border-radius: 8px;
            font-size: 22px;
            text-align: center;
            padding: 9px;
            padding-top: 15px;
            padding-bottom: 20px;
            height: 55px;
            border: 1px solid #55b6bc;
            margin-top: 15px;

        }

        .welcome
        {
            color: white;
            text-align: center;
            font-size: 1em;
            font-family: unset;
            text-transform: uppercase;
            padding-top: 15px;
            letter-spacing: 3px;
        }

        .st0 {
            fill:black !important;
        }
        .subtext
        {
            color: white;
            text-align: center;
            font-family: inherit;
        }

        .anchr{
            color: #1bb79a;
        }

        .submitbtn{
            color: white;
            text-align: center;
            padding: 10px;
            width: 60%;
            border-radius: 30px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-family: sans-serif;
            background-image: linear-gradient(to right top, #00a1b5, #00a6b5, #00acb5, #00b1b4, #00b6b2);
            margin-bottom: 25px;
        }
        .width100{width:100%;}
        .mt40{margin-top:40px;}
        .form-control::placeholder {
            color: black;
            opacity: 1; /* Firefox */
        }
        .m-auto{
            margin:auto;
        }

        .pull-left{float:left;}
        .anchr:hover{cursor:pointer;color:#00a1b5;}
        .box svg
        {
            height: auto;
            width: 100%;
            background-size: 100%;
            background-position: center;
        }

        .bg_top {
            width: 100%;
            height: 330px;
            float: left;
            background-size: 100%;
            background-image: url(https://1.bp.blogspot.com/-XC-quFCZhpI/XZH0Jse0VkI/AAAAAAAATU0/0PHRWZR-HQgmoNWoiwVF8Ux0O6Z4guZ5wCLcBGAsYHQ/s1600/bg-top.png);
        }

        @-webkit-keyframes blink-1 {
            0%,
            50%,
            100% {
                opacity: 1;
            }
            25%,
            75% {
                opacity: 0;
            }
        }
        @keyframes blink-1 {
            0%,
            50%,
            100% {
                opacity: 1;
            }
            25%,
            75% {
                opacity: 0;
            }
        }

        .star1
        {
            -webkit-animation: blink-1 0.6s infinite both;
            animation: blink-1 0.6s infinite both;
        }

        .star2
        {
            -webkit-animation: blink-1 1s infinite both;
            animation: blink-1 1s infinite both;
        }

        .star3
        {
            -webkit-animation: blink-1 1.2s infinite both;
            animation: blink-1 1.2s infinite both;
        }

        .star4
        {
            -webkit-animation: blink-1 1.4s infinite both;
            animation: blink-1 1.4s infinite both;
        }

        .star5
        {
            -webkit-animation: blink-1 1.6s infinite both;
            animation: blink-1 1.6s infinite both;
        }

        .star6
        {
            -webkit-animation: blink-1 1.8s infinite both;
            animation: blink-1 1.8s infinite both;
        }
        .star7
        {
            -webkit-animation: blink-1 1.9s infinite both;
            animation: blink-1 1.9s infinite both;
        }

        .star8
        {
            -webkit-animation: blink-1 2s infinite both;
            animation: blink-1 2s infinite both;
        }

        .star9
        {
            -webkit-animation: blink-1 2.2s infinite both;
            animation: blink-1 2.2s infinite both;
        }

        .star10
        {
            -webkit-animation: blink-1 2.4s infinite both;
            animation: blink-1 2.4s infinite both;
        }


        .box{
            height:600px;
            width:100%;
            margin:auto;
            background-size:100%;
            background-position:center;
        }





        @media (max-width:1024px)  {
            .login-contianer
            {
                top: 1px;
            }


            .bg_top
            {
                height: 75px;
                background-repeat: no-repeat;
            }
            .form-cc
            {
                padding: 5px;
            }
            .form-control
            {
                font-size: 13px;
                padding-top: 10px;
                padding-bottom: 10px;
                height: 16px;
                margin-top: 4px;
            }

            .form-group {
                margin-bottom: 5px;
            }
            .submitbtn
            {
                font-size: 9px;
                padding: 5px;
                margin-bottom: 0px;
                margin-top: 2px;
            }

            .mt40 {
                margin-top: 0px;
            }
            .anchr {
                font-size: 11px;
                margin-top: 10px;
            }

            .userloginheading
            {
                padding: 0px;   margin-bottom: 10px;font-size:10px;
            }

            .welcome
            {
                font-size: 12px;
            }

            .subtext
            {
                font-size:13px;
            }
        }


        @media (max-width:600px)  {
            .login-contianer
            {
                top: 1px;
                width: 60%;
            }
            .bg_top {
                height: 245px;
                background-repeat: no-repeat;
            }


            .form-cc
            {
                padding: 5px;
            }
            .form-control
            {
                font-size: 8px;
                padding-top: 6px;
                padding-bottom: 7px;
                height: 16px;
                margin-top: 0px;
            }

            .form-group {
                margin-bottom: 5px;
            }
            .submitbtn
            {
                font-size: 5px;
                padding: 3px;
                margin-bottom: 0px;
                margin-top: -10px;
            }

            .mt40 {
                margin-top: 0px;
            }
            .anchr {
                font-size: 6px;
                margin-top: -5px;
            }

            .userloginheading
            {
                padding: 0px;   margin-bottom: 10px;font-size: 5px;
            }

            .welcome
            {
                font-size: 4px;
            }

            .subtext
            {
                font-size: 5px;
            }
        }

        @media (max-width:320px)  {

            .login-contianer
            {
                top: 1px;
            }


            .bg_top
            {
                height: 95px;
                background-repeat: no-repeat;
            }
            .form-cc
            {
                padding: 5px;
            }
            .form-control
            {
                font-size: 8px;
                padding-top: 6px;
                padding-bottom: 7px;
                height: 16px;
                margin-top: 0px;
            }

            .form-group {
                margin-bottom: 5px;
            }
            .submitbtn
            {
                font-size: 5px;
                padding: 3px;
                margin-bottom: 0px;
                margin-top: -10px;
            }

            .mt40 {
                margin-top: 0px;
            }
            .anchr {
                font-size: 6px;
                margin-top: -5px;
            }

            .userloginheading
            {
                padding: 0px;   margin-bottom: 10px;font-size: 5px;
            }

            .welcome
            {
                font-size: 4px;
            }

            .subtext
            {
                font-size: 5px;
            }
        }


        @media (max-width:480px)  {
            .login-contianer
            {
                top: 1px;
                width: 55%;
            }


            .bg_top
            {
                height: 245px;
                background-repeat: no-repeat;
            }
            .form-cc
            {
                padding: 5px;
            }
            .form-control
            {
                font-size: 8px;
                padding-top: 6px;
                padding-bottom: 7px;
                height: 16px;
                margin-top: 0px;
            }

            .form-group {
                margin-bottom: 5px;
            }
            .submitbtn
            {
                font-size: 5px;
                padding: 3px;
                margin-bottom: 0px;
                margin-top: -10px;
            }

            .mt40 {
                margin-top: 0px;
            }
            .anchr {
                font-size: 6px;
                margin-top: -5px;
            }

            .userloginheading
            {
                padding: 0px;   margin-bottom: 10px;font-size: 5px;
            }

            .welcome
            {
                font-size: 4px;
            }

            .subtext
            {
                font-size: 5px;
            }
        }
    </style>
</head>
<body>

<div class="box">
<svg version="1.1" id="BACKGROUND" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     viewBox="0 0 750 500" style="enable-background:new 0 0 750 500;" xml:space="preserve">
<style type="text/css">
    .st0{fill:url(#SVGID_1_);}
    .st1{opacity:0.54;}
    .st2{fill:url(#SVGID_2_);}
    .st3{fill:#F3FCD0;}
    .st4{fill:url(#SVGID_3_);}
    .st5{fill:url(#SVGID_4_);}
    .st6{fill:url(#SVGID_5_);}
    .st7{fill:url(#SVGID_6_);}
    .st8{fill:#2F2833;}
    .st9{fill:url(#SVGID_7_);}
    .st10{fill:url(#SVGID_8_);}
    .st11{fill:url(#SVGID_9_);}
    .st12{fill:url(#SVGID_10_);}
    .st13{fill:url(#SVGID_11_);}
    .st14{fill:url(#SVGID_12_);}
    .st15{fill:url(#SVGID_13_);}
    .st16{fill:url(#SVGID_14_);}
    .st17{fill:url(#SVGID_15_);}
    .st18{fill:url(#SVGID_16_);}
    .st19{fill:url(#SVGID_17_);}
    .st20{fill:url(#SVGID_18_);}
    .st21{fill:url(#SVGID_19_);}
    .st22{fill:url(#SVGID_20_);}
    .st23{fill:url(#SVGID_21_);}
    .st24{fill:url(#SVGID_22_);}
    .st25{fill:url(#SVGID_23_);}
    .st26{fill:url(#SVGID_24_);}
    .st27{fill:url(#SVGID_25_);}
    .st28{fill:url(#SVGID_26_);}
    .st29{fill:url(#SVGID_27_);}
    .st30{fill:url(#SVGID_28_);}
    .st31{fill:url(#SVGID_29_);}
    .st32{fill:url(#SVGID_30_);}
    .st33{fill:url(#SVGID_31_);}
    .st34{fill:url(#SVGID_32_);}
    .st35{fill:url(#SVGID_33_);}
    .st36{fill:#0D5770;}
    .st37{fill:#FFFFFF;}
</style>
    <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="749.8101" y1="3.6109" x2="-3.3902" y2="498.7425">
        <stop  offset="0.3227" style="stop-color:#C8EAC0"/>
        <stop  offset="0.4171" style="stop-color:#BFE8C4"/>
        <stop  offset="0.5707" style="stop-color:#A7E1CE"/>
        <stop  offset="0.7643" style="stop-color:#80D7E0"/>
        <stop  offset="0.9587" style="stop-color:#51CAF4"/>
    </linearGradient>
    <rect y="0" class="st0" width="750" height="500"/>
    <g class="st1">
        <linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="666.6797" y1="331.5709" x2="666.6797" y2="164.2492">
            <stop  offset="4.381747e-07" style="stop-color:#3BD4C3"/>
            <stop  offset="1" style="stop-color:#187A93"/>
        </linearGradient>
        <path class="st2" d="M750,164.3c0,0-43.6-2.2-59.6,33.8s-53.5,14.1-58.7,56.7s-48.3,76.8-48.3,76.8H750V164.3z"/>
        <circle class="st3" cx="507.9" cy="286" r="66.8"/>
        <linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="266.4272" y1="331.5709" x2="266.4272" y2="142.531">
            <stop  offset="4.381747e-07" style="stop-color:#3BD4C3"/>
            <stop  offset="1" style="stop-color:#187A93"/>
        </linearGradient>
        <path class="st4" d="M0,143.8c0,0,70.5-11.1,107.5,32.3s69,12,95.7,14s46.7,46.1,85.4,46.7c38.7,0.7,51.4-34.7,82.8-32
		s58.1,104.1,161.5,126.8H0L0,143.8z"/>
        <linearGradient id="SVGID_4_" gradientUnits="userSpaceOnUse" x1="647.9203" y1="331.5709" x2="647.9203" y2="225.4543">
            <stop  offset="0" style="stop-color:#3C3461"/>
            <stop  offset="0.1595" style="stop-color:#3A3A63"/>
            <stop  offset="0.3704" style="stop-color:#354B69"/>
            <stop  offset="0.61" style="stop-color:#2D6672"/>
            <stop  offset="0.8689" style="stop-color:#228C7F"/>
            <stop  offset="1" style="stop-color:#1CA286"/>
        </linearGradient>
        <path class="st5" d="M750,272.4c-3-2.1-8.1-0.8-8.5,3.8c0,0.1,0,0.1,0,0.2c0,0.5-0.2,1.2-0.3,1.8c-3.7-14.9-12.6-32-13.3-40
		c0-0.1,0-0.2,0-0.3c-1.2-11.7-18.3-11.7-19.5,0c0,0.1,0,0.2,0,0.3c-0.5,6.4-6.2,18.4-10.4,30.5c-2.2-5.8-4.2-10.9-4.5-14.1
		c0-0.1,0-0.2,0-0.2c-0.9-8.9-13.9-8.9-14.8,0c0,0.1,0,0.2,0,0.2c-0.3,4-3.3,10.9-6.1,18.4c-1.7-4.6-3.2-8.5-3.4-11.2
		c0-0.1,0-0.2,0-0.2c-0.9-8.9-13.9-8.9-14.8,0c0,0.1,0,0.2,0,0.2c-0.3,3.2-2.2,8.1-4.3,13.7c-5.4-15.2-12.3-30.1-13-38.1
		c0-0.1,0-0.3,0-0.4c-1.5-15.3-23.9-15.3-25.4,0c0,0.1,0,0.3,0,0.4c-0.7,8-7.4,22.6-12.8,37.7c-2.2-5.6-4-10.5-4.2-13.8
		c0-0.1,0-0.2,0-0.3c-1-10.3-16.1-10.3-17.1,0c0,0.1,0,0.2,0,0.3c-0.6,6.7-7.4,20.3-11,32.8c-0.8-2.3-1.5-4.3-1.6-5.8
		c0-0.1,0-0.1,0-0.2c-0.6-6.4-10-6.4-10.7,0c0,0.1,0,0.1,0,0.2c-0.5,5.5-7.7,18.3-8.2,27.3c0,0,0,0,0,0v16H750V272.4z"/>
        <linearGradient id="SVGID_5_" gradientUnits="userSpaceOnUse" x1="375" y1="530.8882" x2="375" y2="331.5709">
            <stop  offset="0" style="stop-color:#18A0B2"/>
            <stop  offset="0.437" style="stop-color:#18A6B2"/>
            <stop  offset="1" style="stop-color:#18B6B2"/>
        </linearGradient>
        <rect x="0" y="331.6" class="st6" width="750" height="168.4"/>
        <g>
            <linearGradient id="SVGID_6_" gradientUnits="userSpaceOnUse" x1="644.5482" y1="365.243" x2="644.5482" y2="266.1657">
                <stop  offset="0" style="stop-color:#1C548E"/>
                <stop  offset="1" style="stop-color:#3CA773"/>
            </linearGradient>
            <path class="st7" d="M656.5,277.2c0-0.1,0-0.3,0-0.4c-1.4-14.3-22.3-14.3-23.8,0c0,0.1,0,0.3,0,0.4c-1.1,13-19.5,44.9-18.1,65
			c1.4,20,20,23,30.1,23c10,0,28.7-3,30.1-23C676,322.2,657.5,290.2,656.5,277.2z"/>
            <path class="st8" d="M645.5,335.8c-0.1-7.5-0.2-8.3-0.3-15c5.3-0.3,10.3-2.7,13.8-6.6l3-3.3l-2.9,2.9c-3.7,3.7-8.7,5.9-13.9,6
			c-0.3-13.6-0.6-30.9-0.6-30.9l-0.8,37.7c-5.2-0.2-10.1-2.3-13.8-6l-2.9-2.9l3,3.3c3.6,3.9,8.5,6.2,13.7,6.6l-0.3,15
			c-5.1-0.3-9.9-2.4-13.5-6l-2.9-2.9l3,3.3c3.5,3.8,8.3,6.1,13.4,6.6l-0.8,35.2h1.9h1.9c0,0-0.5-18.3-0.9-42
			c5.2-0.4,10-2.8,13.5-6.6l3-3.3l-2.9,2.9C655.5,333.4,650.6,335.5,645.5,335.8z"/>
        </g>
        <g>
            <linearGradient id="SVGID_7_" gradientUnits="userSpaceOnUse" x1="693.8455" y1="387.3054" x2="693.8455" y2="288.2281">
                <stop  offset="0" style="stop-color:#1C548E"/>
                <stop  offset="1" style="stop-color:#3CA773"/>
            </linearGradient>
            <path class="st9" d="M705.8,299.3c0-0.1,0-0.3,0-0.4c-1.4-14.3-22.3-14.3-23.8,0c0,0.1,0,0.3,0,0.4c-1.1,13-19.5,44.9-18.1,65
			c1.4,20,20,23,30.1,23c10,0,28.7-3,30.1-23C725.3,344.3,706.8,312.3,705.8,299.3z"/>
            <path class="st8" d="M694.8,357.8c-0.1-7.5-0.2-8.3-0.3-15c5.3-0.3,10.3-2.7,13.8-6.6l3-3.3l-2.9,2.9c-3.7,3.7-8.7,5.9-13.9,6
			c-0.3-13.6-0.6-30.9-0.6-30.9l-0.8,37.7c-5.2-0.2-10.1-2.3-13.8-6l-2.9-2.9l3,3.3c3.6,3.9,8.5,6.2,13.7,6.6l-0.3,15
			c-5.1-0.3-9.9-2.4-13.5-6l-2.9-2.9l3,3.3c3.5,3.8,8.3,6.1,13.4,6.6l-0.8,35.2h1.9h1.9c0,0-0.5-18.3-0.9-42
			c5.2-0.4,10-2.8,13.5-6.6l3-3.3l-2.9,2.9C704.8,355.5,699.9,357.6,694.8,357.8z"/>
        </g>
        <linearGradient id="SVGID_8_" gradientUnits="userSpaceOnUse" x1="151.3932" y1="363.2042" x2="151.3932" y2="221.6723">
            <stop  offset="0" style="stop-color:#3C3461"/>
            <stop  offset="0.1595" style="stop-color:#3A3A63"/>
            <stop  offset="0.3704" style="stop-color:#354B69"/>
            <stop  offset="0.61" style="stop-color:#2D6672"/>
            <stop  offset="0.8689" style="stop-color:#228C7F"/>
            <stop  offset="1" style="stop-color:#1CA286"/>
        </linearGradient>
        <path class="st10" d="M0,331.6h302.8c-2.5-11.8-10-26-10.6-32.6c0-0.1,0-0.2,0-0.2c-0.9-8.9-14-8.9-14.8,0c0,0.1,0,0.2,0,0.2
		c-0.2,2.4-1.4,5.9-2.9,9.9c-4.3-14.6-12.2-30.3-12.8-38.1c0-0.1,0-0.2,0-0.3c-1.2-12.2-19.2-12.2-20.4,0c0,0.1,0,0.2,0,0.3
		c-0.7,8.1-9.1,24.6-13.3,39.7c-1.5-4-2.8-7.5-3-9.8c0-0.1,0-0.1,0-0.2c-0.8-7.7-12-7.7-12.8,0c0,0.1,0,0.1,0,0.2
		c-0.1,1.5-0.7,3.5-1.5,5.8c-4.8-20.3-17.1-43.8-18-54.9c0-0.1,0-0.3,0-0.4c-1.6-15.6-24.5-15.6-26,0c0,0.1,0,0.3,0,0.4
		c-0.7,8.3-7.9,23.7-13.4,39.5c-1-3-1.7-5.6-1.8-7.6c0-0.1,0-0.2,0-0.3c-1.2-11.9-18.7-11.9-19.9,0c0,0.1,0,0.2,0,0.3
		c-0.2,2.9-1.5,7-3.3,11.7c-6.4-18-14.5-35.4-15.2-44.9c0-0.2,0-0.3,0-0.5c-1.8-18.3-28.7-18.3-30.5,0c0,0.2,0,0.3,0,0.5
		c-0.8,9.6-9,27.4-15.5,45.6c-3.9-10.2-7.9-19.5-8.3-25c0-0.1,0-0.2,0-0.3c-1.2-12.2-19.2-12.2-20.4,0c0,0.1,0,0.2,0,0.3
		c-0.3,3.5-2.1,8.7-4.3,14.6c-6.5-19.6-16.1-39.4-16.9-49.8c0-0.2,0-0.3,0-0.5c-1-9.6-9-14-16.5-13.3V331.6z"/>
        <g>
            <linearGradient id="SVGID_9_" gradientUnits="userSpaceOnUse" x1="83.856" y1="384.7663" x2="83.856" y2="250.9296">
                <stop  offset="0" style="stop-color:#1C548E"/>
                <stop  offset="1" style="stop-color:#3CA773"/>
            </linearGradient>
            <path class="st11" d="M100,265.9c0-0.2,0-0.3,0-0.5c-1.9-19.3-30.2-19.3-32.1,0c0,0.2,0,0.3,0,0.5c-1.5,17.6-26.3,60.7-24.5,87.8
			c1.8,27.1,27.1,31.1,40.6,31.1c13.5,0,38.8-4,40.6-31.1C126.3,326.6,101.4,283.4,100,265.9z"/>
            <path class="st8" d="M85.1,344.9c-0.2-10.2-0.2-11.3-0.4-20.3c7.1-0.5,13.9-3.6,18.7-8.9l4.1-4.4l-4,4c-5,5-11.8,7.9-18.8,8.1
			c-0.4-18.3-0.8-41.7-0.8-41.7l-1,50.9c-7-0.3-13.7-3.1-18.7-8.1l-4-4l4.1,4.4c4.8,5.2,11.4,8.4,18.5,8.9l-0.4,20.3
			c-6.9-0.4-13.3-3.2-18.2-8.1l-4-4l4.1,4.4c4.7,5.1,11.2,8.3,18.1,8.9l-1.1,47.5h2.6h2.6c0,0-0.6-24.8-1.3-56.7
			c7-0.6,13.5-3.7,18.3-8.9l4.1-4.4l-4,4C98.6,341.8,92,344.6,85.1,344.9z"/>
        </g>
        <g>
            <linearGradient id="SVGID_10_" gradientUnits="userSpaceOnUse" x1="187.7813" y1="411.7939" x2="187.7813" y2="303.985">
                <stop  offset="0" style="stop-color:#1C548E"/>
                <stop  offset="1" style="stop-color:#3CA773"/>
            </linearGradient>
            <path class="st12" d="M200.7,316c0-0.1,0-0.3,0-0.4c-1.5-15.5-24.3-15.5-25.9,0c0,0.1,0,0.3,0,0.4c-1.2,14.1-21.2,48.9-19.7,70.7
			c1.5,21.8,21.8,25,32.7,25c10.9,0,31.2-3.2,32.7-25C222,364.9,201.9,330.2,200.7,316z"/>
            <path class="st8" d="M188.8,379.7c-0.2-8.2-0.2-9.1-0.3-16.4c5.8-0.4,11.2-2.9,15.1-7.2l3.3-3.6l-3.2,3.2c-4,4-9.5,6.4-15.2,6.5
			c-0.3-14.7-0.7-33.6-0.7-33.6l-0.8,41c-5.6-0.2-11-2.5-15-6.5l-3.2-3.2l3.3,3.6c3.9,4.2,9.2,6.8,14.9,7.2l-0.3,16.4
			c-5.5-0.3-10.8-2.6-14.7-6.5l-3.2-3.2l3.3,3.6c3.8,4.1,9,6.7,14.6,7.2l-0.9,38.3h2.1h2.1c0,0-0.5-19.9-1-45.7
			c5.6-0.4,10.9-3,14.7-7.2l3.3-3.6l-3.2,3.2C199.7,377.1,194.4,379.5,188.8,379.7z"/>
        </g>
        <g>
            <linearGradient id="SVGID_11_" gradientUnits="userSpaceOnUse" x1="605.9787" y1="373.6999" x2="605.9787" y2="299.3132">
                <stop  offset="0" style="stop-color:#3C778E"/>
                <stop  offset="1" style="stop-color:#A9D99F"/>
            </linearGradient>
            <path class="st13" d="M614.9,307.6c0-0.1,0-0.2,0-0.3c-1.1-10.7-16.8-10.7-17.8,0c0,0.1,0,0.2,0,0.3c-0.8,9.8-14.6,33.7-13.6,48.8
			c1,15,15,17.3,22.6,17.3c7.5,0,21.5-2.2,22.6-17.3C629.6,341.4,615.7,317.4,614.9,307.6z"/>
            <path class="st8" d="M606.7,351.6c-0.1-5.6-0.1-6.3-0.2-11.3c4-0.3,7.7-2,10.4-5l2.3-2.5l-2.2,2.2c-2.8,2.8-6.5,4.4-10.5,4.5
			c-0.2-10.2-0.5-23.2-0.5-23.2l-0.6,28.3c-3.9-0.1-7.6-1.7-10.4-4.5l-2.2-2.2l2.3,2.5c2.7,2.9,6.4,4.7,10.3,5l-0.2,11.3
			c-3.8-0.2-7.4-1.8-10.1-4.5l-2.2-2.2l2.3,2.5c2.6,2.9,6.2,4.6,10.1,4.9l-0.6,26.4h1.4h1.4c0,0-0.4-13.8-0.7-31.5
			c3.9-0.3,7.5-2.1,10.2-4.9l2.3-2.5l-2.2,2.2C614.2,349.8,610.5,351.4,606.7,351.6z"/>
        </g>
        <g>
            <linearGradient id="SVGID_12_" gradientUnits="userSpaceOnUse" x1="133.5098" y1="425.7979" x2="133.5098" y2="317.848">
                <stop  offset="0" style="stop-color:#3C778E"/>
                <stop  offset="1" style="stop-color:#A9D99F"/>
            </linearGradient>
            <path class="st14" d="M146.5,329.9c0-0.1,0-0.3,0-0.4c-1.5-15.5-24.3-15.5-25.9,0c0,0.1,0,0.3,0,0.4c-1.2,14.2-21.2,49-19.8,70.8
			c1.5,21.8,21.8,25.1,32.7,25.1c10.9,0,31.3-3.2,32.7-25.1C167.7,378.9,147.7,344.1,146.5,329.9z"/>
            <path class="st8" d="M134.5,393.7c-0.2-8.2-0.2-9.1-0.3-16.4c5.8-0.4,11.2-2.9,15.1-7.2l3.3-3.6l-3.2,3.2c-4,4-9.5,6.4-15.2,6.6
			c-0.3-14.8-0.7-33.7-0.7-33.7l-0.8,41.1c-5.7-0.2-11-2.5-15-6.6l-3.2-3.2l3.3,3.6c3.9,4.2,9.2,6.8,14.9,7.2l-0.3,16.4
			c-5.5-0.3-10.8-2.6-14.7-6.5l-3.2-3.2l3.3,3.6c3.8,4.1,9,6.7,14.6,7.2l-0.9,38.3h2.1h2.1c0,0-0.5-20-1-45.7
			c5.6-0.4,10.9-3,14.7-7.2l3.3-3.6l-3.2,3.2C145.4,391.1,140.1,393.4,134.5,393.7z"/>
        </g>
        <g>
            <linearGradient id="SVGID_13_" gradientUnits="userSpaceOnUse" x1="252.8327" y1="452.2959" x2="252.8327" y2="367.1655">
                <stop  offset="0" style="stop-color:#3C778E"/>
                <stop  offset="1" style="stop-color:#A9D99F"/>
            </linearGradient>
            <path class="st15" d="M263.1,376.7c0-0.1,0-0.2,0-0.3c-1.2-12.2-19.2-12.2-20.4,0c0,0.1,0,0.2,0,0.3
			c-0.9,11.2-16.8,38.6-15.6,55.8c1.2,17.2,17.2,19.8,25.8,19.8c8.6,0,24.7-2.6,25.8-19.8C279.8,415.3,264,387.8,263.1,376.7z"/>
            <path class="st8" d="M253.6,427c-0.1-6.5-0.1-7.2-0.3-12.9c4.5-0.3,8.8-2.3,11.9-5.7l2.6-2.8l-2.5,2.5c-3.2,3.2-7.5,5-12,5.2
			c-0.2-11.6-0.5-26.5-0.5-26.5l-0.6,32.4c-4.5-0.2-8.7-2-11.9-5.2l-2.5-2.5l2.6,2.8c3.1,3.3,7.3,5.4,11.8,5.7l-0.3,12.9
			c-4.4-0.2-8.5-2.1-11.6-5.2l-2.5-2.5l2.6,2.8c3,3.3,7.1,5.3,11.5,5.7l-0.7,30.2h1.6h1.6c0,0-0.4-15.8-0.8-36
			c4.4-0.4,8.6-2.4,11.6-5.7l2.6-2.8l-2.5,2.5C262.2,424.9,258,426.8,253.6,427z"/>
        </g>
        <linearGradient id="SVGID_14_" gradientUnits="userSpaceOnUse" x1="228.8019" y1="502.553" x2="252.2792" y2="463.8535">
            <stop  offset="0" style="stop-color:#44757A;stop-opacity:0"/>
            <stop  offset="1" style="stop-color:#44757A"/>
        </linearGradient>
        <polygon class="st16" points="234.1,500 254.5,463.8 251.2,463.8 226.6,500 	"/>

        <linearGradient id="SVGID_15_" gradientUnits="userSpaceOnUse" x1="-1014.2798" y1="441.4471" x2="-987.5826" y2="397.4398" gradientTransform="matrix(-1 0 0 1 -287.6739 0)">
            <stop  offset="0" style="stop-color:#44757A;stop-opacity:0"/>
            <stop  offset="1" style="stop-color:#44757A"/>
        </linearGradient>
        <polygon class="st17" points="695.7,400.7 736.9,442 728.9,442 692,400.7 	"/>

        <linearGradient id="SVGID_16_" gradientUnits="userSpaceOnUse" x1="-964.9662" y1="419.3847" x2="-938.269" y2="375.3775" gradientTransform="matrix(-1 0 0 1 -287.6739 0)">
            <stop  offset="0" style="stop-color:#44757A;stop-opacity:0"/>
            <stop  offset="1" style="stop-color:#44757A"/>
        </linearGradient>
        <polygon class="st18" points="646.4,378.6 687.6,419.9 679.5,419.9 642.6,378.6 	"/>

        <linearGradient id="SVGID_17_" gradientUnits="userSpaceOnUse" x1="-927.6013" y1="424.7151" x2="-900.6203" y2="380.2401" gradientTransform="matrix(-1 0 0 1 -287.6739 0)">
            <stop  offset="0" style="stop-color:#44757A;stop-opacity:0"/>
            <stop  offset="1" style="stop-color:#44757A"/>
        </linearGradient>
        <polygon class="st19" points="607.4,383.8 650.7,425 642.6,425 604.6,383.8 	"/>
        <linearGradient id="SVGID_18_" gradientUnits="userSpaceOnUse" x1="161.1523" y1="465.356" x2="185.5105" y2="425.2044">
            <stop  offset="0" style="stop-color:#44757A;stop-opacity:0"/>
            <stop  offset="1" style="stop-color:#44757A"/>
        </linearGradient>
        <polygon class="st20" points="185.7,426.4 154.8,467.7 162.8,467.7 189.8,426.4 	"/>
        <linearGradient id="SVGID_19_" gradientUnits="userSpaceOnUse" x1="106.8848" y1="479.3975" x2="131.2674" y2="439.2057">
            <stop  offset="0" style="stop-color:#44757A;stop-opacity:0"/>
            <stop  offset="1" style="stop-color:#44757A"/>
        </linearGradient>
        <polygon class="st21" points="131.4,440.4 100.5,481.7 108.5,481.7 135.6,440.4 	"/>
        <linearGradient id="SVGID_20_" gradientUnits="userSpaceOnUse" x1="57.1626" y1="442.0329" x2="81.7643" y2="401.4798">
            <stop  offset="0" style="stop-color:#44757A;stop-opacity:0"/>
            <stop  offset="1" style="stop-color:#44757A"/>
        </linearGradient>
        <polygon class="st22" points="81.4,402.9 50.4,444.2 58.4,444.2 86.4,402.9 	"/>
        <g>
            <linearGradient id="SVGID_21_" gradientUnits="userSpaceOnUse" x1="61.5778" y1="546.8271" x2="61.5778" y2="412.9905">
                <stop  offset="0" style="stop-color:#1C548E"/>
                <stop  offset="1" style="stop-color:#3CA773"/>
            </linearGradient>
            <path class="st23" d="M100.9,500c-5-25.9-22-57.6-23.2-72c0-0.2,0-0.3,0-0.5c-1.9-19.3-30.2-19.3-32.1,0c0,0.2,0,0.3,0,0.5
			c-1.2,14.4-18.2,46.2-23.2,72H100.9z"/>
            <path class="st8" d="M60.5,495.9l-0.1,4.1h2.2c-0.1-4.5-0.1-6.9-0.3-13.3c7.1-0.5,13.9-3.6,18.7-8.9l4.1-4.4l-4,4
			c-5,5-11.8,7.9-18.8,8.1c-0.4-18.3-0.8-41.7-0.8-41.7l-1,50.9c-7-0.3-13.7-3.1-18.7-8.1l-4-4L42,487
			C46.8,492.2,53.5,495.4,60.5,495.9z"/>
        </g>
        <g>
            <linearGradient id="SVGID_22_" gradientUnits="userSpaceOnUse" x1="728.8566" y1="485.8102" x2="728.8566" y2="392.7226">
                <stop  offset="0" style="stop-color:#3C778E"/>
                <stop  offset="1" style="stop-color:#A9D99F"/>
            </linearGradient>
            <path class="st24" d="M750,413.8c-1.5-4.2-2.6-7.9-2.8-10.6c0-0.1,0-0.2,0-0.4c-1.3-13.4-21-13.4-22.3,0c0,0.1,0,0.2,0,0.4
			c-1,12.2-18.3,42.2-17,61.1c1.3,18.8,18.8,21.6,28.2,21.6c3.9,0,9.1-0.5,14-2.3V413.8z"/>
            <path class="st8" d="M750,452.4v-0.2l-0.3,0.3c-3.4,3.4-8,5.4-12.8,5.6c-0.1-7.1-0.2-7.8-0.3-14.1c5-0.3,9.6-2.5,13-6.2l0.4-0.4
			v-0.2l-0.3,0.3c-3.5,3.5-8.2,5.5-13.1,5.7c-0.3-12.7-0.6-29-0.6-29l-0.7,35.4c-4.9-0.2-9.5-2.2-13-5.6l-2.8-2.8l2.8,3.1
			c3.3,3.6,8,5.9,12.9,6.2l-0.3,14.1c-4.8-0.2-9.3-2.2-12.7-5.6l-2.8-2.8l2.8,3.1c3.3,3.6,7.8,5.8,12.6,6.2l-0.8,33h3.6
			c0,0-0.4-17.2-0.9-39.4c4.9-0.4,9.4-2.6,12.7-6.2L750,452.4z"/>
        </g>
        <g>
            <linearGradient id="SVGID_23_" gradientUnits="userSpaceOnUse" x1="371.612" y1="369.8643" x2="371.612" y2="333.8302">
                <stop  offset="0" style="stop-color:#1C548E"/>
                <stop  offset="1" style="stop-color:#6DA77D"/>
            </linearGradient>
            <path class="st25" d="M371.1,333.8c-9.9,0.3-17.5,8.9-17.5,18.8v6.3c0,6.1,4.9,11,11,11h14.1c6.1,0,11-4.9,11-11v-7.1
			C389.6,341.7,381.3,333.5,371.1,333.8z"/>
            <path class="st8" d="M372.3,360.6c-0.1-3.3-0.1-2.8-0.2-5.7c4-0.2,7.8-2.1,10.6-3.8l2.3-1.5l-2.2,1.3c-2.8,1.6-6.6,2.6-10.6,2.7
			c-0.2-6-0.5-13.7-0.5-13.7l-0.6,16.7c-4-0.1-7.7-1-10.5-2.7l-2.2-1.3l2.3,1.5c2.7,1.7,6.5,3.7,10.5,3.8l-0.2,5.7
			c-3.9-0.1-7.5-1.1-10.3-2.7l-2.2-1.3l2.3,1.5c2.7,1.7,6.3,3.6,10.2,3.8l-0.2,8.2h2.1c-0.1-2.6-0.2-8-0.3-11.2
			c3.9-0.2,7.6-2.1,10.3-3.8l2.3-1.5l-2.2,1.3C379.9,359.5,376.2,360.5,372.3,360.6z"/>
        </g>
        <g>
            <linearGradient id="SVGID_24_" gradientUnits="userSpaceOnUse" x1="294.1937" y1="361.3266" x2="294.1937" y2="325.2924">
                <stop  offset="0" style="stop-color:#1C548E"/>
                <stop  offset="1" style="stop-color:#6DA77D"/>
            </linearGradient>
            <path class="st26" d="M293.6,325.3c-9.9,0.3-17.5,8.9-17.5,18.8v6.3c0,6.1,4.9,11,11,11h14.1c6.1,0,11-4.9,11-11v-7.1
			C312.2,333.2,303.8,325,293.6,325.3z"/>
            <path class="st8" d="M294.9,352.1c-0.1-3.3-0.1-2.8-0.2-5.7c4-0.2,7.8-2.1,10.6-3.8l2.3-1.5l-2.2,1.3c-2.8,1.6-6.6,2.6-10.6,2.7
			c-0.2-6-0.5-13.7-0.5-13.7l-0.6,16.7c-4-0.1-7.7-1-10.5-2.7l-2.2-1.3l2.3,1.5c2.7,1.7,6.5,3.7,10.5,3.8l-0.2,5.7
			c-3.9-0.1-7.5-1.1-10.3-2.7l-2.2-1.3l2.3,1.5c2.7,1.7,6.3,3.6,10.2,3.8l-0.2,8.2h2.1c-0.1-2.6-0.2-8-0.3-11.2
			c3.9-0.2,7.6-2.1,10.3-3.8l2.3-1.5l-2.2,1.3C302.5,351,298.8,352,294.9,352.1z"/>
        </g>
        <g>
            <linearGradient id="SVGID_25_" gradientUnits="userSpaceOnUse" x1="345.8059" y1="374.9676" x2="345.8059" y2="347.0263">
                <stop  offset="0" style="stop-color:#3C778E"/>
                <stop  offset="1" style="stop-color:#BDD98E"/>
            </linearGradient>
            <path class="st27" d="M345.4,347c-7.6,0.2-13.5,6.9-13.5,14.5v4.9c0,4.7,3.8,8.5,8.5,8.5h10.9c4.7,0,8.5-3.8,8.5-8.5V361
			C359.8,353.1,353.3,346.8,345.4,347z"/>
            <path class="st8" d="M346.4,367.8c-0.1-2.6-0.1-2.2-0.2-4.5c3.1-0.1,6.1-1.6,8.2-3l1.8-1.1l-1.7,1c-2.2,1.3-5.2,2-8.2,2.1
			c-0.2-4.7-0.4-10.6-0.4-10.6l-0.4,12.9c-3.1-0.1-6-0.8-8.2-2.1l-1.7-1l1.8,1.1c2.1,1.3,5,2.9,8.1,3l-0.2,4.5c-3-0.1-5.8-0.8-8-2.1
			l-1.7-1l1.8,1.1c2.1,1.3,4.9,2.8,7.9,3l-0.2,6.4h1.6c-0.1-2-0.2-6.2-0.3-8.7c3.1-0.1,5.9-1.7,8-3l1.8-1.1l-1.7,1
			C352.3,367,349.4,367.7,346.4,367.8z"/>
        </g>
        <g>
            <linearGradient id="SVGID_26_" gradientUnits="userSpaceOnUse" x1="398.9275" y1="374.9676" x2="398.9275" y2="347.0263">
                <stop  offset="0" style="stop-color:#3C778E"/>
                <stop  offset="1" style="stop-color:#BDD98E"/>
            </linearGradient>
            <path class="st28" d="M398.5,347c-7.6,0.2-13.5,6.9-13.5,14.5v4.9c0,4.7,3.8,8.5,8.5,8.5h10.9c4.7,0,8.5-3.8,8.5-8.5V361
			C412.9,353.1,406.4,346.8,398.5,347z"/>
            <path class="st8" d="M399.5,367.8c-0.1-2.6-0.1-2.2-0.2-4.5c3.1-0.1,6.1-1.6,8.2-3l1.8-1.1l-1.7,1c-2.2,1.3-5.2,2-8.2,2.1
			c-0.2-4.7-0.4-10.6-0.4-10.6l-0.4,12.9c-3.1-0.1-6-0.8-8.2-2.1l-1.7-1l1.8,1.1c2.1,1.3,5,2.9,8.1,3l-0.2,4.5c-3-0.1-5.8-0.8-8-2.1
			l-1.7-1l1.8,1.1c2.1,1.3,4.9,2.8,7.9,3l-0.2,6.4h1.6c-0.1-2-0.2-6.2-0.3-8.7c3.1-0.1,5.9-1.7,8-3l1.8-1.1l-1.7,1
			C405.4,367,402.5,367.7,399.5,367.8z"/>
        </g>
        <g>
            <linearGradient id="SVGID_27_" gradientUnits="userSpaceOnUse" x1="562.1383" y1="374.9676" x2="562.1383" y2="347.0263">
                <stop  offset="0" style="stop-color:#3C778E"/>
                <stop  offset="1" style="stop-color:#BDD98E"/>
            </linearGradient>
            <path class="st29" d="M561.7,347c-7.6,0.2-13.5,6.9-13.5,14.5v4.9c0,4.7,3.8,8.5,8.5,8.5h10.9c4.7,0,8.5-3.8,8.5-8.5V361
			C576.1,353.1,569.6,346.8,561.7,347z"/>
            <path class="st8" d="M562.7,367.8c-0.1-2.6-0.1-2.2-0.2-4.5c3.1-0.1,6.1-1.6,8.2-3l1.8-1.1l-1.7,1c-2.2,1.3-5.2,2-8.2,2.1
			c-0.2-4.7-0.4-10.6-0.4-10.6l-0.4,12.9c-3.1-0.1-6-0.8-8.2-2.1l-1.7-1l1.8,1.1c2.1,1.3,5,2.9,8.1,3l-0.2,4.5c-3-0.1-5.8-0.8-8-2.1
			l-1.7-1l1.8,1.1c2.1,1.3,4.9,2.8,7.9,3l-0.2,6.4h1.6c-0.1-2-0.2-6.2-0.3-8.7c3.1-0.1,5.9-1.7,8-3l1.8-1.1l-1.7,1
			C568.6,367,565.7,367.7,562.7,367.8z"/>
        </g>
        <linearGradient id="SVGID_28_" gradientUnits="userSpaceOnUse" x1="340.2532" y1="392.7838" x2="340.2532" y2="377.495">
            <stop  offset="0" style="stop-color:#44757A;stop-opacity:0"/>
            <stop  offset="1" style="stop-color:#44757A"/>
        </linearGradient>
        <polygon class="st30" points="345,377.5 333.9,392.8 337.6,392.8 346.6,377.5 	"/>
        <linearGradient id="SVGID_29_" gradientUnits="userSpaceOnUse" x1="288.6596" y1="379.8748" x2="288.6596" y2="364.5861">
            <stop  offset="0" style="stop-color:#44757A;stop-opacity:0"/>
            <stop  offset="1" style="stop-color:#44757A"/>
        </linearGradient>
        <polygon class="st31" points="293.2,364.6 282.1,379.9 285.8,379.9 295.2,364.6 	"/>
        <linearGradient id="SVGID_30_" gradientUnits="userSpaceOnUse" x1="366.0595" y1="388.4126" x2="366.0595" y2="373.1238">
            <stop  offset="0" style="stop-color:#44757A;stop-opacity:0"/>
            <stop  offset="1" style="stop-color:#44757A"/>
        </linearGradient>
        <polygon class="st32" points="370.6,373.1 359.5,388.4 363.2,388.4 372.7,373.1 	"/>
        <linearGradient id="SVGID_31_" gradientUnits="userSpaceOnUse" x1="393.3701" y1="392.7838" x2="393.3701" y2="377.495">
            <stop  offset="0" style="stop-color:#44757A;stop-opacity:0"/>
            <stop  offset="1" style="stop-color:#44757A"/>
        </linearGradient>
        <polygon class="st33" points="398.1,377.5 387,392.8 390.7,392.8 399.7,377.5 	"/>

        <linearGradient id="SVGID_32_" gradientUnits="userSpaceOnUse" x1="-925.507" y1="392.7838" x2="-925.507" y2="377.495" gradientTransform="matrix(-1 0 0 1 -357.8618 0)">
            <stop  offset="0" style="stop-color:#44757A;stop-opacity:0"/>
            <stop  offset="1" style="stop-color:#44757A"/>
        </linearGradient>
        <polygon class="st34" points="562.9,377.5 574,392.8 570.3,392.8 561.3,377.5 	"/>
        <linearGradient id="SVGID_33_" gradientUnits="userSpaceOnUse" x1="464.9633" y1="312.6603" x2="667.3596" y2="529.5561">
            <stop  offset="2.165098e-07" style="stop-color:#7EA596"/>
            <stop  offset="0.3857" style="stop-color:#4E8C95"/>
            <stop  offset="0.794" style="stop-color:#217493"/>
            <stop  offset="1" style="stop-color:#0F6B93"/>
        </linearGradient>
        <path class="st35" d="M439.3,362.8c6.3,7.2,14.5,11.8,22.6,15.6c8.2,3.8,16.6,6.7,25,9.3c16.8,5.3,33.5,9.7,49.8,14.8
		c16.2,5.1,32.1,10.7,46.4,18.2c14.3,7.4,26.9,16.6,35.5,27.9c4.4,5.6,7.7,11.7,10.2,18.1c2.7,7.1,4.8,14.4,6,21.4
		c0.7,4.1,1.1,8.1,1.1,12h42.3c-0.9-7.6-2.5-15-4.7-21.9c-3.1-9.7-7.1-18.7-11.7-27.2c-5-9.2-11.3-17.6-18.6-24.8
		c-14.6-14.4-32.2-23.5-49.6-29.9c-34.9-12.5-70-15.3-103.5-21.3c-8.4-1.5-16.6-3.3-24.6-5.7c-7.9-2.5-15.6-5.7-21.4-10.9
		c-2.9-2.6-5.4-5.9-6.9-9.4c-1.5-3.5-1.5-7.4,0.3-10.9c1.2-2.4,3.2-4.6,5.4-6.5h-3.7c-1.7,1.3-3.3,2.9-4.6,4.8
		c-1.3,2-2.3,4.3-2.7,6.7c-0.4,2.5-0.1,5,0.5,7.3C433.9,355.1,436.3,359.2,439.3,362.8z"/>
        <path class="st36" d="M641.5,427.6c7.3,7.2,13.5,15.7,18.5,24.9c4.5,8.6,8.5,17.5,11.5,27.3c2,6.4,3.5,13.2,4.4,20.2h2.4
		c-0.9-7.6-2.5-15-4.7-21.9c-3.1-9.7-7.1-18.7-11.7-27.2c-5-9.2-11.3-17.6-18.6-24.8c-14.6-14.4-32.2-23.5-49.6-29.9
		c-34.9-12.5-69.9-15.3-103.5-21.3c33.3,6.2,67.4,9.7,102.1,22.4C609.5,403.8,627,413,641.5,427.6z"/>
        <path class="st36" d="M442.9,358.3c5.8,5.3,13.5,8.5,21.3,11.1c7.9,2.5,16.9,3.9,25.2,5.5c0.2,0,0.3,0.1,0.5,0.1
		c-8.4-1.5-16.6-3.3-24.5-5.7c-7.9-2.5-15.6-5.7-21.4-10.9c-2.9-2.6-5.4-5.9-6.9-9.4c-1.5-3.5-1.5-7.4,0.3-10.9
		c1.2-2.4,3.2-4.6,5.4-6.5H442c-2.3,1.9-4.2,4-5.5,6.4c-1.9,3.5-1.8,7.4-0.4,10.9C437.6,352.3,440.1,355.7,442.9,358.3z"/>
    </g>
    <polygon class="st37 star1" points="698.7,57.6 697,57.3 696.3,55.8 695.5,57.3 693.8,57.6 695.1,58.8 694.8,60.5 696.3,59.7 697.8,60.5
	697.5,58.8 "/>
    <polygon class="st37 star2" points="177.2,70.3 175.5,70.1 174.7,68.5 174,70.1 172.3,70.3 173.5,71.5 173.2,73.2 174.7,72.4 176.2,73.2
	175.9,71.5 "/>
    <polygon class="st37 star3" points="440.5,31.9 438.8,31.7 438.1,30.2 437.3,31.7 435.6,31.9 436.8,33.1 436.6,34.8 438.1,34 439.6,34.8
	439.3,33.1 "/>
    <polygon class="st37 star4" points="299.3,34.3 297.6,34 296.9,32.5 296.1,34 294.4,34.3 295.6,35.5 295.4,37.1 296.9,36.3 298.4,37.1
	298.1,35.5 "/>
    <polygon class="st37 star5" points="86.3,59.9 84.6,59.7 83.9,58.1 83.1,59.7 81.4,59.9 82.6,61.1 82.3,62.8 83.9,62 85.4,62.8 85.1,61.1
	"/>
    <polygon class="st37 star6" points="45.6,20.5 43.9,20.2 43.2,18.7 42.4,20.2 40.7,20.5 41.9,21.7 41.6,23.3 43.2,22.5 44.7,23.3
	44.4,21.7 "/>
    <polygon class="st37 star7" points="586.6,49.8 584.9,49.5 584.2,48 583.4,49.5 581.7,49.8 582.9,50.9 582.7,52.6 584.2,51.8 585.7,52.6
	585.4,50.9 "/>
    <polygon class="st37 star8" points="157.4,132 155.8,131.8 155,130.3 154.2,131.8 152.6,132 153.8,133.2 153.5,134.9 155,134.1
	156.5,134.9 156.2,133.2 "/>
    <polygon class="st37 star9" points="45.6,115.5 43.9,115.3 43.2,113.8 42.4,115.3 40.7,115.5 41.9,116.7 41.6,118.4 43.2,117.6
	44.7,118.4 44.4,116.7 "/>
    <polygon class="st37 star10" points="629.5,142 627.8,141.7 627.1,140.2 626.3,141.7 624.6,142 625.8,143.2 625.5,144.9 627.1,144.1
	628.6,144.9 628.3,143.2 "/>
    <polygon class="st37 star1" points="683.1,152.4 681.4,152.1 680.7,150.6 679.9,152.1 678.2,152.4 679.4,153.5 679.2,155.2 680.7,154.4
	682.2,155.2 681.9,153.5 "/>
    <polygon class="st37 star2" points="563.7,182.7 562,182.5 561.3,181 560.5,182.5 558.8,182.7 560,183.9 559.8,185.6 561.3,184.8
	562.8,185.6 562.5,183.9 "/>
</svg>

</div>
<div class="container">


    <div class="login-contianer">
        <div class="bg_top">
            <h3 class="welcome">Welcome to My Page</h3>

            <p class="subtext">
                Thank you for visiting.
            </p>
        </div>

        <div class="form-cc">
            <div class="col-sm-12 col-md-12">
                <div class="col-md-6 m-auto">

                    <div class="userloginheading">User Login</div>
                </div>
                <form>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 width100 mt40 text-center">
                            <button type="submit" class="submitbtn btn btn-primary" href="">Sign in</button>

                            <!--<a id="show" class="col-md-12 pull-left anchr">Dark Night</a>-->
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<script>
    $(document).ready(function(){
        $(".anchr").click(function() {
            $(".st0,.st3").css("fill", "white !important");
        });
    });
</script>
</body>
</html>
