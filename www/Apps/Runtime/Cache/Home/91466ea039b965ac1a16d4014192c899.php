<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href="/model/Public/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/model/Public/Home/css/tabs.css" type="text/css">
    <link rel="stylesheet" href="/model/Public/Home/css/tableList.css" type="text/css">
    <link rel="stylesheet" href="/model/Public/Home/css/tableDetail.css" type="text/css">
    <link rel="stylesheet" href="/model/Public/Home/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/model/Public/Home/css/jquery-ui.theme.min.css" type="text/css">
    <link rel="stylesheet" href="/model/Public/Home/css/box.css" type="text/css">
    <style>

        #content .tab{
            padding-top: 10px;
        }
        #content a{
            cursor: pointer;
            /*background-color: rgb(244, 244, 244);*/
        }
        .breadcrumb > li + li:before {
            color: #CCCCCC;
            content: " > ";
            padding: 0px 5px;
        }
        #content{
            padding-top: 0px;
        }
        .borderedDetail td ul li{
            float: left;
        }
        #riskCalPara .filterInput input{
            margin-left: 10px;
            margin-right: 5px;
        }
        .tankInfoDetail ul{
            width: 100%;
            padding-bottom: 10px;
        }
        .tankInfoDetail ul li{
            width: 25%;
            float: left;
            list-style-type:none;
            margin-top: 5px;
            color: #666;
            text-overflow: ellipsis;

        }
        .tankInfoDetail h4{
            width: 100%;
            float: left;

        }
    </style>
    <title></title>
</head>
<body>
<div style="width: 98%;margin-left: auto;margin-right: auto">
    <table class="borderedDetail" style="padding: 0px">
        <tbody>
        <tr><td>设备位号：</td><td><?php echo ($plant[0]['plantNO']); ?></td>
            <td>检查人员：</td><td>
                <?php echo ($PlantDailyMaintainanceRecord["maintainanceUser"]); ?>
            </td>
            <td>检查区域：</td><td>
                <?php echo ($PlantDailyMaintainanceRecord["maintainanceArea"]); ?>
            </td>
        </tr>
        <tr> <td>检查类型：</td><td id="maintainanceType" data-type="<?php echo ($PlantDailyMaintainanceRecord["maintainanceType"]); ?>">
            <?php switch($PlantDailyMaintainanceRecord["maintainanceType"]): case "day": ?>日检查<?php break;?>
                <?php case "month": ?>月检查<?php break;?>
                <?php case "year": ?>年检查<?php break;?>
                <?php case "normal": ?>常规性检查<?php break;?>
                <?php default: ?>日检查<?php endswitch;?>
        </td>
            <td>检查日期：</td><td><?php echo ($PlantDailyMaintainanceRecord["maintainanceDate"]); ?></td>
            <td>下次检查日期：</td><td><?php echo ($PlantDailyMaintainanceRecord["maintainanceNextDate"]); ?></td>

        </tr>
        <tr><td>备&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp注：</td><td colspan="6">
            <?php echo ($PlantDailyMaintainanceRecord["remark"]); ?>
        </td>
        </tr>
        </tbody>
    </table>
    <button class="submitBtn" type="submit" style="display: none"></button>
    <div class="tabbable">
        <ul id="tabs">
            <li>
                <a href="" title="tab1">检查内容</a>
            </li>
            <li>
                <a href="" title="tab2">相关文件</a>
            </li>
        </ul>
        <div id="content">
            <!-- <a href="" class="btn btn-primary Access" data-access="<?php echo ($Access['IMPORT']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px"><span class="glyphicon glyphicon-import" style="margin-right:5px "></span>导入</a> -->
            <!-- <a href="" class="btn btn-primary Access" data-access="<?php echo ($Access['EXPORT']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px"><span class="glyphicon glyphicon-export" style="margin-right:5px "></span>导出</a> -->
            <a data-messageId="<?php echo ($PlantDailyMaintainanceRecord["id"]); ?>" data-verifierLevel="<?php echo ($PlantDailyMaintainanceRecord["verifierLevel"]); ?>" class="btn btn-primary Access" id="verifiedNo" data-access="<?php echo ($Access['VERIFIED']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px"><span class="glyphicon glyphicon-remove" style="margin-right:5px "></span>审核不通过</a>
            <a data-messageId="<?php echo ($PlantDailyMaintainanceRecord["id"]); ?>" data-verifierLevel="<?php echo ($PlantDailyMaintainanceRecord["verifierLevel"]); ?>" class="btn btn-primary Access" id="verifiedYes" data-access="<?php echo ($Access['VERIFIED']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px"><span class="glyphicon glyphicon-ok" style="margin-right:5px "></span>审核通过</a>

            <div id="tab1" class="tab">
                <div style="clear: both"></div>
                <div id="dayCheck" style="display: none">
                    <table class="bordered">
                        <thead><th>检查项目</th><th>检查结果</th><th>备注</th></thead>
                        <tbody>
                        <?php if(is_array($PlantDailyMaintainanceDetail)): $i = 0; $__LIST__ = $PlantDailyMaintainanceDetail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["checkType"] == 'day') AND ($vo["checkTypeDetail"] == '1')): ?><tr data-alarm="<?php echo ($vo["checkResult"]); ?>">
                                    <td style="width: 50%"><?php echo ($vo["checkItem"]); ?></td>
                                    <td >
                                        <?php switch($vo["checkResult"]): case "1": ?>√<?php break;?>
                                            <?php case "0": ?>×<?php break;?>
                                            <?php case "2": ?>/<?php break; endswitch;?>
                                    </td>
                                    <td><?php echo ($vo["checkManage"]); ?></td></tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
                <div id="monthCheck" style="display: none">
                    <div class="wallInput">
                        <div class="box-container wallInput">
                            <!-- box标题块 -->
                            <div class="box-head box-head-list" >
                                <h3>工艺</h3>
                                <a class="box-head-more">收起</a>
                            </div>
                            <!-- box列表块 -->
                            <ol class="detail">

                                <table class="bordered">
                                    <thead><th>检查项目</th><th>检查结果</th><th>备注</th></thead>
                                    <tbody>
                                    <?php if(is_array($PlantDailyMaintainanceDetail)): $i = 0; $__LIST__ = $PlantDailyMaintainanceDetail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["checkType"] == 'month') AND ($vo["checkTypeDetail"] == '1')): ?><tr data-alarm="<?php echo ($vo["checkResult"]); ?>">
                                                <td style="width: 50%"><?php echo ($vo["checkItem"]); ?></td>
                                                <td >
                                                    <?php switch($vo["checkResult"]): case "1": ?>√<?php break;?>
                                                        <?php case "0": ?>×<?php break;?>
                                                        <?php case "2": ?>/<?php break; endswitch;?>
                                                </td>
                                                <td><?php echo ($vo["checkManage"]); ?></td>
                                            </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                            </ol>
                        </div>
                    </div>
                    <div class="bottomInput">
                        <div class="box-container bottomInput">
                            <!-- box标题块 -->
                            <div class="box-head box-head-list" >
                                <h3>设备</h3>
                                <a class="box-head-more">收起</a>
                            </div>
                            <!-- box列表块 -->
                            <div class="detail" style="width: 100%;">
                                <ol>
                                    <table class="bordered">
                                        <thead><th>检查项目</th><th>检查结果</th><th>备注</th></thead>
                                        <tbody>
                                        <?php if(is_array($PlantDailyMaintainanceDetail)): $i = 0; $__LIST__ = $PlantDailyMaintainanceDetail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["checkType"] == 'month') AND ($vo["checkTypeDetail"] == '2')): ?><tr data-alarm="<?php echo ($vo["checkResult"]); ?>">
                                                    <td style="width: 50%"><?php echo ($vo["checkItem"]); ?></td>
                                                    <td >
                                                        <?php switch($vo["checkResult"]): case "1": ?>√<?php break;?>
                                                            <?php case "0": ?>×<?php break;?>
                                                            <?php case "2": ?>/<?php break; endswitch;?>
                                                    </td>
                                                    <td><?php echo ($vo["checkManage"]); ?></td></tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                    </table>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="topInput">
                        <div class="box-container topInput">
                            <!-- box标题块 -->
                            <div class="box-head box-head-list" >
                                <h3>电气</h3>
                                <a class="box-head-more">收起</a>
                            </div>
                            <!-- box列表块 -->
                            <div class="detail" style="width: 100%;">
                                <ol>
                                    <table class="bordered">
                                        <thead><th>检查项目</th><th>检查结果</th><th>备注</th></thead>
                                        <tbody>
                                        <?php if(is_array($PlantDailyMaintainanceDetail)): $i = 0; $__LIST__ = $PlantDailyMaintainanceDetail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["checkType"] == 'month') AND ($vo["checkTypeDetail"] == '3')): ?><tr data-alarm="<?php echo ($vo["checkResult"]); ?>">
                                                    <td style="width: 50%"><?php echo ($vo["checkItem"]); ?></td>
                                                    <td >
                                                        <?php switch($vo["checkResult"]): case "1": ?>√<?php break;?>
                                                            <?php case "0": ?>×<?php break;?>
                                                            <?php case "2": ?>/<?php break; endswitch;?>
                                                    </td>
                                                    <td><?php echo ($vo["checkManage"]); ?></td></tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody></table>

                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="topInput">
                    <div class="box-container topInput">
                        <!-- box标题块 -->
                        <div class="box-head box-head-list" >
                            <h3>安全</h3>
                            <a class="box-head-more">收起</a>
                        </div>
                        <!-- box列表块 -->
                        <div class="detail" style="width: 100%;">
                            <ol>
                                <table class="bordered">
                                    <thead><th>检查项目</th><th>检查结果</th><th>备注</th></thead>
                                    <tbody>
                                    <?php if(is_array($PlantDailyMaintainanceDetail)): $i = 0; $__LIST__ = $PlantDailyMaintainanceDetail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["checkType"] == 'month') AND ($vo["checkTypeDetail"] == '4')): ?><tr data-alarm="<?php echo ($vo["checkResult"]); ?>">
                                                <td style="width: 50%"><?php echo ($vo["checkItem"]); ?></td>
                                                <td >
                                                    <?php switch($vo["checkResult"]): case "1": ?>√<?php break;?>
                                                        <?php case "0": ?>×<?php break;?>
                                                        <?php case "2": ?>/<?php break; endswitch;?>
                                                </td>
                                                <td><?php echo ($vo["checkManage"]); ?></td></tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                            </ol>
                        </div>
                    </div>
                </div>
                </div>
                <div id="yearCheck" style="display: none">
                    <div class="wallInput">
                        <div class="box-container wallInput">
                            <!-- box标题块 -->
                            <div class="box-head box-head-list" >
                                <h3>工艺</h3>
                                <a class="box-head-more">收起</a>
                            </div>
                            <!-- box列表块 -->
                            <ol class="detail">

                                <table class="bordered">
                                    <thead><th>检查项目</th><th>检查结果</th><th>备注</th></thead>
                                    <tbody>
                                    <?php if(is_array($PlantDailyMaintainanceDetail)): $i = 0; $__LIST__ = $PlantDailyMaintainanceDetail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["checkType"] == 'year') AND ($vo["checkTypeDetail"] == '1')): ?><tr data-alarm="<?php echo ($vo["checkResult"]); ?>">
                                                <td style="width: 50%"><?php echo ($vo["checkItem"]); ?></td>
                                                <td >
                                                    <?php switch($vo["checkResult"]): case "1": ?>√<?php break;?>
                                                        <?php case "0": ?>×<?php break;?>
                                                        <?php case "2": ?>/<?php break; endswitch;?>
                                                </td>
                                                <td><?php echo ($vo["checkManage"]); ?></td></tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                            </ol>
                        </div>
                    </div>
                    <div class="bottomInput">
                        <div class="box-container bottomInput">
                            <!-- box标题块 -->
                            <div class="box-head box-head-list" >
                                <h3>设备</h3>
                                <a class="box-head-more">收起</a>
                            </div>
                            <!-- box列表块 -->
                            <div class="detail" style="width: 100%;">
                                <ol>
                                    <table class="bordered">
                                        <thead><th>检查项目</th><th>检查结果</th><th>备注</th></thead>
                                        <tbody>
                                        <?php if(is_array($PlantDailyMaintainanceDetail)): $i = 0; $__LIST__ = $PlantDailyMaintainanceDetail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["checkType"] == 'year') AND ($vo["checkTypeDetail"] == '2')): ?><tr data-alarm="<?php echo ($vo["checkResult"]); ?>">
                                                    <td style="width: 50%"><?php echo ($vo["checkItem"]); ?></td>
                                                    <td >
                                                        <?php switch($vo["checkResult"]): case "1": ?>√<?php break;?>
                                                            <?php case "0": ?>×<?php break;?>
                                                            <?php case "2": ?>/<?php break; endswitch;?>
                                                    </td>
                                                    <td><?php echo ($vo["checkManage"]); ?></td></tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                    </table>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="topInput">
                        <div class="box-container topInput">
                            <!-- box标题块 -->
                            <div class="box-head box-head-list" >
                                <h3>安全</h3>
                                <a class="box-head-more">收起</a>
                            </div>
                            <!-- box列表块 -->
                            <div class="detail" style="width: 100%;">
                                <ol>
                                    <table class="bordered">
                                        <thead><th>检查项目</th><th>检查结果</th><th>备注</th></thead>
                                        <tbody>
                                        <?php if(is_array($PlantDailyMaintainanceDetail)): $i = 0; $__LIST__ = $PlantDailyMaintainanceDetail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["checkType"] == 'year') AND ($vo["checkTypeDetail"] == '3')): ?><tr data-alarm="<?php echo ($vo["checkResult"]); ?>">
                                                    <td style="width: 50%"><?php echo ($vo["checkItem"]); ?></td>
                                                    <td >
                                                        <?php switch($vo["checkResult"]): case "1": ?>√<?php break;?>
                                                            <?php case "0": ?>×<?php break;?>
                                                            <?php case "2": ?>/<?php break; endswitch;?>
                                                    </td>
                                                    <td><?php echo ($vo["checkManage"]); ?></td></tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                    </table>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="normalCheck" style="display: none">
                    <div class="wallInput">
                        <div class="box-container wallInput">
                            <!-- box标题块 -->
                            <div class="box-head box-head-list" >
                                <h3>工艺</h3>
                                <a class="box-head-more">收起</a>
                            </div>
                            <!-- box列表块 -->
                            <ol class="detail">

                                <table class="bordered">
                                    <thead><th>检查项目</th><th>检查结果</th><th>备注</th></thead>
                                    <tbody>
                                    <?php if(is_array($PlantDailyMaintainanceDetail)): $i = 0; $__LIST__ = $PlantDailyMaintainanceDetail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["checkType"] == 'normal') AND ($vo["checkTypeDetail"] == '1')): ?><tr data-alarm="<?php echo ($vo["checkResult"]); ?>">
                                                <td style="width: 50%"><?php echo ($vo["checkItem"]); ?></td>
                                                <td >
                                                    <?php switch($vo["checkResult"]): case "1": ?>√<?php break;?>
                                                        <?php case "0": ?>×<?php break;?>
                                                        <?php case "2": ?>/<?php break; endswitch;?>
                                                </td>
                                                <td><?php echo ($vo["checkManage"]); ?></td></tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                            </ol>
                        </div>
                    </div>
                    <div class="bottomInput">
                        <div class="box-container bottomInput">
                            <!-- box标题块 -->
                            <div class="box-head box-head-list" >
                                <h3>设备</h3>
                                <a class="box-head-more">收起</a>
                            </div>
                            <!-- box列表块 -->
                            <div class="detail" style="width: 100%;">
                                <ol>
                                    <table class="bordered">
                                        <thead><th>检查项目</th><th>检查结果</th><th>备注</th></thead>
                                        <tbody>
                                        <?php if(is_array($PlantDailyMaintainanceDetail)): $i = 0; $__LIST__ = $PlantDailyMaintainanceDetail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["checkType"] == 'normal') AND ($vo["checkTypeDetail"] == '2')): ?><tr data-alarm="<?php echo ($vo["checkResult"]); ?>">
                                                    <td style="width: 50%"><?php echo ($vo["checkItem"]); ?></td>
                                                    <td >
                                                        <?php switch($vo["checkResult"]): case "1": ?>√<?php break;?>
                                                            <?php case "0": ?>×<?php break;?>
                                                            <?php case "2": ?>/<?php break; endswitch;?>
                                                    </td>
                                                    <td><?php echo ($vo["checkManage"]); ?></td></tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                    </table>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="topInput">
                        <div class="box-container topInput">
                            <!-- box标题块 -->
                            <div class="box-head box-head-list" >
                                <h3>安全</h3>
                                <a class="box-head-more">收起</a>
                            </div>
                            <!-- box列表块 -->
                            <div class="detail" style="width: 100%;">
                                <ol>
                                    <table class="bordered">
                                        <thead><th>检查项目</th><th>检查结果</th><th>备注</th></thead>
                                        <tbody>
                                        <?php if(is_array($PlantDailyMaintainanceDetail)): $i = 0; $__LIST__ = $PlantDailyMaintainanceDetail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["checkType"] == 'normal') AND ($vo["checkTypeDetail"] == '3')): ?><tr data-alarm="<?php echo ($vo["checkResult"]); ?>">
                                                    <td style="width: 50%"><?php echo ($vo["checkItem"]); ?></td>
                                                    <td >
                                                        <?php switch($vo["checkResult"]): case "1": ?>√<?php break;?>
                                                            <?php case "0": ?>×<?php break;?>
                                                            <?php case "2": ?>/<?php break; endswitch;?>
                                                    </td>
                                                    <td><?php echo ($vo["checkManage"]); ?></td></tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                    </table>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div id="tab2" class="tab">
                <table class="bordered">
                    <thead>
                    <tr><th>文件名称</th><th>添加时间</th><th>操作</th></tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($attachment)): $i = 0; $__LIST__ = $attachment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($vo["filename"]); ?></td><td class="type"><?php echo ($vo["addTime"]); ?></td>
                            <td data-row-id="<?php echo ($vo["id"]); ?>">
                                <a class="download Access" data-access="<?php echo ($Access['DOWNLOAD']['id']); ?>" href="downloadUpload.html?id=<?php echo ($vo["id"]); ?>">下载</a>
                            </td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="/model/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/model/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<script src="/model/Public/Home/js/content_edit.js"></script>
<script type="text/javascript" src="/model/Public/Home/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/model/Public/Home/js/jquery.form.js"></script>
<script type="text/javascript" src="/model/Public/Home/js/jquery.cookie.js"></script>
<script>
    $(function(){
        //根据返回权限值显示权限
        $(".Access").each(function(){
            if($(this).attr("data-access")){
                $(this).show();
            }else{
                $(this).hide();
            };
        })


        //tabs菜单的切换
        var tabs_index=$.cookie('tabs_index');
        if(tabs_index==undefined){
            var index=0;
        }else{
            var index=$.cookie('tabs_index');
        }
        $("#content .tab").hide(); // Initially hide all content
        $("#tabs li").eq(index).attr("id","current"); // Activate first tab
        $("#content .tab").eq(index).fadeIn(); // Show first tab content
        $('#tabs a').click(function(e) {
            e.preventDefault();
            $("#content .tab").hide(); //Hide all content
            $("#tabs li").attr("id",""); //Reset id's
            $(this).parent().attr("id","current"); // Activate this
            $.cookie('tabs_index', $(this).parent().index());
            $('#' + $(this).attr('title')).fadeIn();
        });
//     展开关闭
        $(".box-head-more").bind("click",function () {
            if($(this).parent(".box-head").siblings(".detail").find("table").is(":visible")) {
                $(this).html("展开");
                $(this).parent(".box-head").siblings(".detail").find("table").hide(300);
            }else {
                $(this).html("收起");
                $(this).parent(".box-head").siblings(".detail").find("table").show(300);
            }
        })


//        根据类型选择显示内容
        var maintainanceType=$("#maintainanceType").attr("data-type");
        switch (maintainanceType) {
            case ("day"):
                $("#dayCheck").show();
                break;
            case ("month"):
                $("#monthCheck").show();
                break;
            case ("year"):
                $("#yearCheck").show();
                break;
            case ("normal"):
                $("#normalCheck").show();
                break;
        }

        //根据是否报警显示背景色
        $("#tab1 tr:visible").each(function(){
//            alert($(this).attr("data-alarm"));
            if($(this).attr("data-alarm")==0){
                $(this).css('color','red');
//                alert($(this).attr("data-alarm"));
            }
        })

//        文件上传
        $("#uploadFile").ajaxForm({
            beforeSubmit:  function showRequest(){
            },  // 提交前
            success: function showResponse(data){
                alert(data.msg);
                location.reload();
            }
        })
//        文件下载
        $("#tab2 table tr .download").click(function(){
            var filePath=$(this).parents("tr").find(".filePath").text();
            $.post("<?php echo U('MaintenanceRecord/downloadFile');?>",{filePath:filePath},function(data){
                alert(data.msg);
            },"JSON")
        })
//        $("#downloadFile").ajaxForm({
//            beforeSubmit:  function showRequest(){
//                alert("你好");
//            },  // 提交前
//            success: function showResponse(data){
//                alert(data.msg);
//                location.reload();
//            }
//        })
//        文件删除
        $("#tab2 table tr .delete").click(function(){
            var id=$(this).parents("tr").find(".id").text();
            var filePath=$(this).parents("tr").find(".filePath").text();
            $.post("<?php echo U('MaintenanceRecord/deleteAttachFile');?>",{id:id,filePath:filePath},function(data){
                alert(data.msg);
                location.reload();
            },"JSON")
        })


        //设备信息审核
        $("#verifiedNo").click(function(){
            var id=$(this).attr("data-messageId");
            var verifierLevel=$(this).attr("data-verifierLevel");
            if(confirm("是否确认审核不通过？")){
                $.post("<?php echo U('Public/verified');?>",
                        {tableName:"tb_plantdailymaintainancerecord",id:id,verifierLevel:verifierLevel,verifyResult:2},function(data){
                            alert(data.msg);
                            window.parent.location.reload();
                        },"JSON")
            }else{
                return false;
            }

        })
        $("#verifiedYes").click(function(){
            var id=$(this).attr("data-messageId");
            var verifierLevel=$(this).attr("data-verifierLevel");
            if(confirm("是否确认审核通过？")) {
                $.post("<?php echo U('Public/verified');?>",
                        {
                            tableName: "tb_plantdailymaintainancerecord",
                            id: id,
                            verifierLevel: verifierLevel,
                            verifyResult: 1
                        }, function (data) {
                            alert(data.msg);
                            window.parent.location.reload();
                        }, "JSON")
            }else{
                return false;
            }
        })
    });
</script>
</body>
</html>