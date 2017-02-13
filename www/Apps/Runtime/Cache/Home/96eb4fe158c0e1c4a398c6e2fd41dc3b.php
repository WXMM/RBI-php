<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
    <title>主界面</title>
    <link href="/www/Public/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="/www/Public/Home/css/manage_index.css" rel="stylesheet">
    <link href="/www/Public/Font-Awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/www/Public/Home/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/jquery-ui.theme.min.css" type="text/css">
    <style>
        .notice{
            display:block;
            background:#f00;
            border-radius:50%;
            width:5px;
            height:5px;
            top:0px;
            right:20px;
            position:absolute;
        }
        .input-group{
            width: 100%;
        }
        .input-group span{
            width: 30%;
        }
        .input-group select,.input-group input{
            width: 70%;
        }
        #myModalMission .modal-dialog{
            position: absolute;
            right:10px;
            bottom:0;
        }
        .dropdown-menu li{
            width: 200px;
        }
        .dropdown-menu li span{
            padding-right:8px;
            background-color: #4796cc;
        }
        #alterPasswordModal .modal-dialog{
            margin: 100px auto;
        }
    </style>
    <script src="/www/Public/Jquery/jquery-2.0.3.min.js"></script>
    <script src="/www/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
    <script>
        $(function () {
            var nav_selfLi=$(".menu_self .nav_self li");
            nav_selfLi.mouseover(function () {
                $(this).find("a").addClass("current");
                $(this).find(".box").stop().slideDown(200);
            })
            nav_selfLi.mouseleave(function(){
                $(this).find("a").removeClass("current");
                $(this).find(".box").stop().slideUp(200);
            })
        })
    </script>
</head>
<body>
<header>
    <!--//头部导航栏-->
    <div class="menu_self">
        <div class="head_menu">

        <ul class="head_icon" >
                <div>
                    <a href="#" id="loginOut" data-data="<?php echo ($_SESSION['uid']); ?>">
                        <span class="glyphicon glyphicon-user"></span>注销
                    </a>
                </div>
                <div class="dropdown">
                    <a type="button" class="dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown">
                        <i class="fa fa-gear"></i>
                        设置
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu2">
                        <li role="presentation" id="alterPassword">

                            <a role="menuitem" tabindex="-1"  >
                                <i class="fa fa-puzzle-piece" style="padding-right: 5px"></i>
                                修改密码

                            </a>

                            <!--<i class="fa fa-puzzle-piece"></i>-->
                            <!--<a role="menuitem" tabindex="-1" href="#"></a>-->
                        </li>
                        <!--<li role="presentation" id="readMission">-->
                        <!--<a role="menuitem" tabindex="-1" href="<?php echo U('Schedule/missionList');?>" target="main">查看任务</a>-->
                        <!--</li>-->
                        <!--<li role="presentation" class="divider"></li>-->
                        <!--<li role="presentation" id="noticeSetUp">-->
                        <!--<a role="menuitem" tabindex="-1" href="#" >-->
                        <!--<i class="fa fa-wrench" style="padding-right: 5px"></i>-->
                        <!--任务设置-->
                        <!--</a>-->
                        <!--</li>-->
                    </ul>
                </div>
                <div class="dropdown">
                    <a type="button" class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                        通知
                        <i class="fa fa-angle-down"></i>
                        <i class="notice"></i>
                    </a>
                    <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1">
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="<?php echo U('Schedule/index');?>" target="main">
                                <span class="badge pull-right" id= "scheduleLength" style="text-align: center"><?php echo ($scheduleLength); ?></span>
                                <i class="fa fa-commenting" style="padding-right: 5px"></i>
                                待办事项

                            </a>
                        </li>
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="<?php echo U('AlertRecordManage/index');?>" target="main">
                                <span class="badge pull-right" style="text-align: center"><?php echo ($alarmCount); ?></span>
                                <i class="fa fa-exclamation-triangle" style="padding-right: 5px"></i>
                                风险预警
                            </a>
                        </li>
                        <!--<li role="presentation">-->
                        <!--<a role="menuitem" tabindex="-1" href="#">-->
                        <!--<span class="badge pull-right" style="text-align: center"><?php echo ($alarmCount); ?></span>-->
                        <!--<i class="fa fa-bell" style="padding-right: 5px"></i>-->
                        <!--任务提醒-->
                        <!--</a>-->
                        <!--</li>-->
                    </ul>
                </div>
                <div style="padding-right: 10px ">
                    欢迎您！&nbsp&nbsp<?php echo ($_SESSION['username']); ?>
                </div>
            </ul>
            <ul class="nav_self">
                <li>
                    <a href="<?php echo U('Visualization/oneLevelMap');?>" target="main">可视化管理</a>
                </li>
                <li>
                    <a href="#">档案管理</a>
                    <div class="box">
                        <a href="<?php echo U('Manage/tankInfo');?>" target="main">常压储罐基本信息</a>
                        <!--<a href="#">缺陷隐患记录</a>-->
                        <!--<a href="#">报废记录</a>-->
                        <a href="<?php echo U('Manage/thicknessOrigin');?>" target="main">测厚原始记录</a>
                    </div>
                </li>
                <li>
                    <a href="#">运行管理</a>
                    <div class="box">
                        <a href="<?php echo U('Inspect/thickness');?>" target="main">定点测厚管理</a>
                        <a href="<?php echo U('RunRecord/index');?>" target="main">运行记录管理</a>
                        <a href="<?php echo U('DailyManagement/index');?>" target="main">日常维护管理</a>
                        <!--<a href="#">工况异常与变动管理</a>-->
                        <!--<a href="#">辅助（监督）检查</a>-->
                    </div>
                </li>
                <li>
                    <a href="#">检验与维修</a>
                    <div class="box">

                        <a href="<?php echo U('InspectRecord/index');?>" target="main">检验记录管理</a>
                        <a href="<?php echo U('MaintenanceRecord/index');?>" target="main">维修记录管理</a>
                    </div>
                </li>
                <li>
                    <a href="#">完整性评价</a>
                    <div class="box">
                        <a href="<?php echo U('RiskCalculation/tankCal');?>" target="main">风险分析</a>
                        <!--<a href="<?php echo U('AttachmentEvaluation/index');?>" target="main">附属设备评价</a>-->
                        <a href="<?php echo U('RiskStatistics/index');?>" target="main">风险统计</a>
                        <a href="<?php echo U('AlertRecordManage/index');?>" target="main">报警信息管理</a>
                    </div>
                </li>
            </ul>


        </div>

    </div>

    <div class="modal fade" id="noticeSetUpModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        添加任务
                    </h4>
                </div>
                <form class="bs-example bs-example-form" id="noticeSetUpForm" role="form" action="<?php echo U('Public/addMission');?>" method="post">
                    <div class="modal-body">

                        <div class="input-group">
                            <span class="input-group-addon">任务描述</span>
                            <input type="text" class="form-control" placeholder="任务描述" name="title">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">开始时间</span>
                            <input type='datePicker' class="form-control" placeholder="提醒时间" name="startDate" value="<?php echo ($nowDate); ?>">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">提醒类型</span>
                            <select  class="form-control" name="circle">
                                <option value="0">单次提醒</option>
                                <option value="1">每天提醒</option>
                                <option value="2">每周提醒</option>
                                <option value="3">每月提醒</option>
                                <option value="4">每年提醒</option>
                            </select>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">备注</span>
                            <textarea  class="form-control" placeholder="备注" name="remark"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                        </button>
                        <button type="submit" class="btn btn-primary">
                            提交
                        </button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
    <div class="modal fade" id="alterPasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title">
                        修改密码
                    </h4>
                </div>
                <form class="bs-example bs-example-form" role="form" id="alterPasswordForm" action="<?php echo U('Manage/alterPassword');?>" method="post">
                    <div class="modal-body">

                        <div class="input-group">
                            <span class="input-group-addon">用户名</span>
                            <input type="text" class="form-control" value="<?php echo ($_SESSION['username']); ?>" readonly="readOnly">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">旧密码</span>
                            <input type="password" class="form-control" name="password" placeholder="请输入原密码">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">新密码</span>
                            <input type="password" class="form-control" name="newPassword" placeholder="请输入新密码">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">确认新密码</span>
                            <input type="password" class="form-control" name="reNewPassword" placeholder="确认新密码">
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                        </button>
                        <button type="submit" class="btn btn-primary">
                            提交
                        </button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
</header>
<!--主体信息-->
<section class="main">
    <iframe name="main" src="<?php echo U('Visualization/oneLevelMap');?>" frameborder="0"  scrolling="no" width="100%" height="100%"></iframe>
</section>
<!--底部菜单栏-->
<!--<footer>-->

<!--</footer>-->
<!-- 模态框（Modal） -->
<div class="modal fade" id="myModalMission" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModal">任务提醒</h4>
            </div>
            <div class="modal-body" style="height: 400px">
                <iframe name="main" src="<?php echo U('Schedule/missionNotice');?>" frameborder="0"  scrolling="yes" width="100%" height="100%"></iframe>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<button id="myModalMissionBtn" data-toggle="modal" data-target="#myModalMission" style="display: none"></button>
</body>
<script type="text/javascript" src="/www/Public/Home/js/jquery.form.js"></script>
<script type="text/javascript" src="/www/Public/Home/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/www/Public/Home/js/jquery.cookie.js"></script>
<script>
    $(function(){
        //    初始化确认屏幕高度

//        window.open ('missionNotice.html');

//        $("#myModalMission").modal("show");

        $(".main").css("height",$(window).height());

        $("#noticeSetUp").click(function(){
            $("#noticeSetUpModal").modal("show");
        })
        $("#alterPassword").click(function(){
            $("#alterPasswordModal input[type='password']").val('');
            $("#alterPasswordModal").modal("show");
        })

        $("#alterPasswordForm").ajaxForm({
            beforeSubmit: function showRequest() {
            },
            success: function showResponse(data) {
                if(data.statusCode==100){
                    alert(data.msg);
                }else{
                    alert(data.msg);
                    location.reload();
                }
            }
        })

        $("#noticeSetUpForm").ajaxForm({
            beforeSubmit: function showRequest() {
            },
            success: function showResponse(data) {
                if(data.statusCode==0){
                    alert(data.msg);
                }else{
                    alert(data.msg);
                    location.reload();
                }
            }
        })

        //注销
        $("#loginOut").click(function(){
            var id=$(this).attr("data-data");
            $.post("<?php echo U('Admin/Index/loginOut');?>",{id:id},function(data){
                alert(data.msg);
                location.href="<?php echo U('Admin/Index/index');?>";
            },"JSON")
        })

        //激活日历控件
        $.datepicker.regional["zh-CN"] = { closeText: "关闭", prevText: "&#x3c;上月", nextText: "下月&#x3e;", currentText: "今天", monthNames: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"], monthNamesShort: ["一", "二", "三", "四", "五", "六", "七", "八", "九", "十", "十一", "十二"], dayNames: ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"], dayNamesShort: ["周日", "周一", "周二", "周三", "周四", "周五", "周六"], dayNamesMin: ["日", "一", "二", "三", "四", "五", "六"], weekHeader: "周", dateFormat: "yy-mm-dd", firstDay: 1, isRTL: !1, showMonthAfterYear: !0, yearSuffix: "年" }
        $.datepicker.setDefaults($.datepicker.regional["zh-CN"]);
        $( "input[type='datePicker']" ).datepicker(
                {
                    showOtherMonths: true,
                    selectOtherMonths: true,
                    showButtonPanel: true,
                    dateFormat : "yy-mm-dd"
                }
        );
        $("#ui-datepicker-div").css('font-size','18px');
    })
</script>
</html>