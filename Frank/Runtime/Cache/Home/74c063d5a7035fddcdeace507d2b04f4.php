<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="http://static.weiwubao.com/asset/apps/wap/800927/800927-3/css/style.css"/>
</head>
<body>
<div class="login">
    <img src="http://static.weiwubao.com/asset/apps/wap/800927/800927-3/images/logo.jpg"/>

    <h1>管理员登录</h1>

    <div class="login_log">
        <p>
            <img src="http://static.weiwubao.com/asset/apps/wap/800927/800927-3/images/login.jpg"/>
            <input id="user" type="text" placeholder="请输入您在金税通预约平台登记的手机号码"/>
        </p>

        <p>
            <img src="http://static.weiwubao.com/asset/apps/wap/800927/800927-3/images/pwd.jpg"/>
            <input id="pass" type="password" placeholder="请输入密码"/>
        </p>

        <p class="login_log1">
            <label>记住账号密码</label>
            <input value="1" id="che" name="checkbox" type="checkbox"/>
        </p>
        <a href="javascript:;" id="enter">登 录</a>

        <div>
            <label>!</label>如忘记密码请联系超级管理员
        </div>
        <div class="color" style="text-align:left;width: 100%; color: #bd362f; display: none">
            <p>您输入的手机号或密码有误！</p>
            <p>    请重试或联系超级管理员获取登陆资料。</p>
        </div>
    </div>
    <div class="login_foot">
        <img src="http://static.weiwubao.com/asset/apps/wap/800927/800927-3/images/foot.jpg"/>
        <label>版权所有： 重庆远见金税通信息系统技术有限公司</label>
    </div>
</div>
</body>
<script type="text/javascript" src="http://static.weiwubao.com/asset/apps/wap/800927/800927-3/js/jquery-1.7.1.min.js"></script>
<script src="http://static.weiwubao.com/asset/lib/js/ibox.js"></script>
<script type="text/javascript" src="http://static.weiwubao.com/asset/apps/wap/800927/800927-3/js/public.js"></script>
<script>
    $("#enter").click(function () {
        var user = $("#user").val();
        var pass = $("#pass").val();
        var che = $("#che").attr("checked");
        var date = {
            user: user,
            pass: pass,
            che : che
        };
        $.ajax({
            url: "http://www.123.com/tp/home/index/login",
            dataType: "json",
            type: "post",
            data: date,
            success: function (data) {
                $.iBox.alert(data);
            },
//            error: function (data) {
//                alert(data);
//            }
        })
    })
    
</script>
</html>