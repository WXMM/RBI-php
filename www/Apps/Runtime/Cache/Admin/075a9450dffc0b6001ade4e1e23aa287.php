<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>后台管理系统</title>
    <meta name="author" content="DeathGhost" />
    <link rel="stylesheet" type="text/css" href="/www/Public/Admin/css/style.css" />
    <link href="/www/Public/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        section{
            width: 84%;
            float: right;
            height: 100%;
        }
        .glyphicon{
            padding-left: 10px;
            margin-right: 20px;
        }
        dd{
            display: none;
        }
        dd i{
           margin-right: 40px;
        }
    </style>
<body>
<header>
    <h1><img src="/www/Public/Admin/image/admin_logo.png"/></h1>
    <ul class="rt_nav">
        <li><a>欢迎你 超级管理员</a></li>
        <li><a href="#" class="admin_icon">个人中心</a></li>
        <li><a href="#" class="set_icon">账号设置</a></li>
        <li><a href="<?php echo U('Admin/Index/index');?>" class="quit_icon">安全退出</a></li>
    </ul>
</header>

<!--aside nav-->
<aside class="lt_aside_nav content mCustomScrollbar">
    <ul>
        <li>
            <dl>
                <dt><span class="glyphicon glyphicon-user"></span>权限管理</dt>
                <!--当前链接则添加class:active-->
                <dd><a href="<?php echo U('Rbac/userList');?>" target="center"><i class="fa fa-group fa-fw"></i>用户管理</a></dd>
                <dd><a href="<?php echo U('Rbac/roleList');?>" target="center"><i class="fa fa-user fa-fw"></i>角色管理</a></dd>
                <dd><a href="<?php echo U('Rbac/nodeList');?>" target="center"><i class="fa fa-envelope fa-fw"></i>权限管理</a></dd>
            </dl>
        </li>
        <li>
            <dl>
                <dt><span class="glyphicon glyphicon-lock"></span>数据库管理</dt>
                <dd><a href="<?php echo U('Dictionary/factoryList');?>" target="center"><i class="fa fa-sitemap fa-fw "></i>总公司管理</a></dd>
                <dd><a href="<?php echo U('Dictionary/workshopList');?>" target="center"><i class="fa fa-sitemap fa-fw "></i>分公司管理</a></dd>
                <dd><a href="<?php echo U('Dictionary/areaList');?>" target="center"><i class="fa fa-sitemap fa-fw "></i>罐区/车间管理</a></dd>
                <dd><a href="<?php echo U('Dictionary/dicList?pid=1');?>" target="center"><i class="fa fa-tree fa-fw "></i>设备信息</a></dd>
                <dd><a href="<?php echo U('Dictionary/dicList?pid=2');?>" target="center"><i class="fa fa-tree fa-fw "></i>储罐信息</a></dd>
                <dd><a href="<?php echo U('Dictionary/dicList?pid=3');?>" target="center"><i class="fa fa-tint fa-fw "></i>检验维修</a></dd>
                <dd><a href="<?php echo U('Dictionary/dicList?pid=4');?>" target="center"><i class="fa fa-link fa-fw "></i>附件相关</a></dd>
            </dl>
        </li>
        <li>
            <dl>
                <dt><span class="glyphicon glyphicon-cog"></span>系统管理</dt>
                <dd><a href="<?php echo U('Admin/System/sysInfo');?>" target="center"><i class="fa fa-puzzle-piece fa-fw fa-lg"></i>系统信息</a></dd>
                <dd><a href="<?php echo U('Admin/Rbac/admin');?>" target="center"><i class="fa fa-puzzle-piece fa-fw fa-lg"></i>管理员设置</a></dd>
                <dd><a href="system.html"><i class="fa fa-trash fa-fw fa-lg"></i>清理缓存</a></dd>
            </dl>
        </li>
    </ul>
</aside>

<section class="content">
        <iframe name="center" src="<?php echo U('Admin/System/sysInfo');?>" frameborder="0"  scrolling="yes" width="100%" height="100%" onload="setIframeHeight(ifm1);" id="ifm1"></iframe>
</section>
</body>
<script src="/www/Public/Admin/js/html5.js"></script>
<script src="/www/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/www/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<script>
    function setIframeHeight(iframeId){
        var cwin = document.getElementById(iframeId);
        if (document.getElementById){
            if (cwin && !window.opera){
                if (cwin.contentDocument && cwin.contentDocument.body.offsetHeight){
                    cwin.height = cwin.contentDocument.body.offsetHeight + 20; //FF NS
                }
                else if(cwin.Document && cwin.Document.body.scrollHeight){
                    cwin.height = cwin.Document.body.scrollHeight + 10;//IE
                }
            }else{
                if(cwin.contentWindow.document && cwin.contentWindow.document.body.scrollHeight)
                    cwin.height = cwin.contentWindow.document.body.scrollHeight;//Opera
            }
        }
    };
</script>
<script>
    $(function(){
        $("dt").bind("click",function () {
            if($(this).siblings("dd").is(":visible")) {
                $(this).siblings("dd").hide();
            }else {
                $(this).siblings("dd").show();
            }
        });

        $(window).load(function(){
            $("a[rel='load-content']").click(function(e){
                e.preventDefault();
                var url=$(this).attr("href");
                $.get(url,function(data){
                    $(".content .mCSB_container").append(data); //load new content inside .mCSB_container
                    //scroll-to appended content
                    $(".content").mCustomScrollbar("scrollTo","h2:last");
                });
            });

            $(".content").delegate("a[href='top']","click",function(e){
                e.preventDefault();
                $(".content").mCustomScrollbar("scrollTo",$(this).attr("href"));
            });

        });
    })
</script>
</html>