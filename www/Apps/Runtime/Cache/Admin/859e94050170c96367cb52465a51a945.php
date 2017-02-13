<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
    <title>登录</title>
    <link href="/www/Public/Home/css/login.css" type="text/css" rel="stylesheet" />
</head>
<body>
<h1>中石油燃料油总公司</br>常压储罐基于风险的检验与管理</h1>
<div class="login" style="margin-top:50px;">
    <div class="web_qr_login" id="web_qr_login" style="display: block; height: 235px;">
        <!--登录-->
        <div class="web_login" id="web_login">
            <div class="login-box">
                <div class="login_form">
                    <form class="form-horizontal"  action='/www/index.php/Admin/Index/checkUser' method="post" name="myForm">
                        <input type="hidden" name="did" value="0"/>
                        <input type="hidden" name="to" value="log"/>
                        <div class="uinArea" id="uinArea">
                            <label class="input-tips" for="u">帐号：</label>
                            <div class="inputOuter" id="uArea">
                                <input type="text"  id="u" name="username" class="inputstyle" placeholder="请输入名字"/>
                            </div>
                        </div>
                        <div class="pwdArea" id="pwdArea">
                            <label class="input-tips" for="p">密码：</label>
                            <div class="inputOuter" id="pArea">
                                <input type="password" id="p" name="password" class="inputstyle" placeholder="请输入密码"/>
                            </div>
                        </div>
                        <div style="padding-left:50px;margin-top:20px;"><input type="submit"  value="登 录" style="width:100px;float: left"  class="button_blue"/>
                            <input type="button" value="注 销" style="width:100px;float: left;margin-left: 8px" id="loginOut" class="button_blue"/></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="advice" style="color: #000000">*推荐使用Chrome内核浏览器和火狐浏览器访问本站</div>
</body>
<script src="/www/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/www/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/www/Public/Home/js/jquery.form.js"></script>
<script>
    var options = {
        beforeSubmit:  showRequest,  // 提交前
        success:       showResponse // 提交后
    }
    $('form[name="myForm"]').ajaxForm(options);
    //提交前进行表单验证
    function showRequest(formData){
        for (var i=0; i < formData.length; i++) {
            if (!formData[i].value) {
                alert('用户名,密码都不能为空!');
                return false;
            }
        }
    }
    //提交后进进行相关的操作
    function showResponse(data) {
        if (data.statusCode == 1) {
            alert(data.msg);
            location.href = "<?php echo U('Home/Manage/index');?>";
        }
        if (data.statusCode == 2) {
            alert(data.msg);
            location.href = "<?php echo U('Admin/Rbac/index');?>";
        }
        if (data.statusCode == 0) {
            alert(data.msg);
        }
    }

    //注销
    $("#loginOut").click(function(){
        var user = $("#u").val();
        var psw  = $("#p").val();
        $.post("<?php echo U('Admin/Index/loginOut');?>",{user:user,psw:psw},function(data){
                alert(data.msg);
        },"JSON")
    })
</script>
</html>