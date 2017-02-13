<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/www/Public/Admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/www/Public/Admin/css/main.css"/>
    <script type="text/javascript" src="/www/Public/Admin/js/libs/modernizr.min.js"></script>
</head>
<body  onload="startTime()">
<div class="result-wrap">
    <div class="result-title">
        <h1>系统信息</h1>
    </div>
    <div class="result-content">
        <ul class="sys-info-list">
            <li>
                <label class="res-lab">操作系统</label><span class="res-info"><?php echo ($data["sys"]); ?></span>
            </li>
            <li>
                <label class="res-lab">运行环境</label><span class="res-info"><?php echo ($data["server"]); ?></span>
            </li>
            <li>
                <label class="res-lab">PHP运行方式</label><span class="res-info"><?php echo ($data["sapi"]); ?></span>
            </li>
            <li>
                <label class="res-lab">ThinkPHP版本</label><span class="res-info"><?php echo ($data["thinkVersion"]); ?></span>
            </li>
            <li>
                <label class="res-lab">上传附件限制</label><span class="res-info"><?php echo ($data["upload_max"]); ?></span>
            </li>
            <li>
                <label class="res-lab">服务器时间</label><span class="res-info"><?php echo ($data["time"]); ?></span>
            </li>
            <li>
                <label class="res-lab">北京时间</label><span class="res-info" id="beijingTime"></span>
            </li>
            <li>
                <label class="res-lab">服务器域名/IP</label><span class="res-info"><?php echo ($data["serverName"]); ?></span>
            </li>
        </ul>
    </div>
</div>
<div class="result-wrap">
    <div class="result-title">
        <h1>使用帮助</h1>
    </div>
    <div class="result-content">
        <ul class="sys-info-list">
        </ul>
    </div>
</div>
</body>
<script>
    function startTime()
    {
        var today=new Date()
        var h=today.getHours()
        var m=today.getMinutes()
        var s=today.getSeconds()
// add a zero in front of numbers<10
        m=checkTime(m)
        s=checkTime(s)
        document.getElementById('beijingTime').innerHTML=h+":"+m+":"+s
        t=setTimeout('startTime()',500)
    }

    function checkTime(i)
    {
        if (i<10)
        {i="0" + i}
        return i
    }
</script>
</html>