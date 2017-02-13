<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/www/Public/Home/css/tabs.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/tableList.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/tableDetail.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/jquery-ui.theme.min.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/box.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/bootstrap-3.0.3/css/bootstrap.min.css" type="text/css">
    <style>
        a{
            cursor: pointer;
            /*background-color: rgb(244, 244, 244);*/
        }
        .breadcrumb > li + li:before {
            color: #CCCCCC;
            content: " > ";
            padding: 0px 5px;
        }
        .borderedDetail td ul li{
            float: left;
        }

        .breadcrumb > li + li:before {
            color: #CCCCCC;
            content: " > ";
            padding: 0 5px;
        }
        #riskCalPara .filterInput input{
            margin-left: 10px;
            margin-right: 5px;
        }
        #tab1 iframe{
            margin-top: 20px;
            height: 400px;
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
        table input,select{
            width: 100%;
            text-align: center;
        }
        table .ui-spinner{
            width: 100%;
        }
        .choice span{
            padding: 5px;
        }
    </style>
    <title></title>
</head>
<body>
<ol class="breadcrumb" style="background-color: transparent;float: left; height: 30px;width: 100%">
    <li class="active">检验与维修</li>
    <li class="active">检验记录管理</li>
    <li><a href="<?php echo U('InspectRecord/PlantList');?>">储罐设备列表</a></li>
    <li class="active">检验记录列表</li>
</ol>
<div style="width: 98%;margin-left: auto;margin-right: auto">
    <div class="tankInfoDetail" style="width:100%;float: left">
        <table class="borderedDetail" >
            <tbody>
            <tr>
                <td><p>所在厂区:</p></td><td class="floorMiddleCorrosionSpeed"><?php echo ($plant[0]["factoryId"]); ?></td>
                <td><p>所在车间:</p></td><td class="floorEdgeCorrosionSpeed"><?php echo ($plant[0]["workshopId"]); ?></td>
                <td><p>设备名称:</p></td><td class="floorMiddleDamageFactor"><?php echo ($plant[0]["plantName"]); ?></td></tr>
            <tr><td><p>设备位号:</p></td><td class="floorEdgeDamageFactor"><?php echo ($plant[0]["plantNO"]); ?></td>
                <td><p>储存介质:</p></td><td class="floorDamageFactor"><?php echo ($plant[0]["storeMedium"]); ?></td>
                <td><p>储罐罐型:</p></td><td class="floorFailPro"><?php echo ($plant[0]["OilTankType"]); ?></td></tr>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 90%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    储罐检验信息
                </div>
                <div class="modal-body">
                    <iframe src="InspectRecordDetail.html" name="iframe" id="iframe" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" width="100%" height="700"></iframe>
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-primary Access" id="addInspectInfo" data-access="<?php echo ($Access['ADD']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;">
        <span class="glyphicon glyphicon-plus" style="margin-right:5px "></span>新增检验记录</button>
    <!-- box容器 start -->
    <div class="box-container">
        <!-- box标题块 -->
        <div class="box-head box-head-list" >
            <h3>检验记录列表</h3>
        </div>
        <!-- box列表块 -->
        <div class="riskDoc" style="width: 100%;">
            <ol>
                <table id="InspectRecordList" class="bordered">
                    <thead><th>检验日期</th><th>检验类型</th><th>检验单位</th><th>下次检验日期</th><th>审核人员</th><th>审核阶段</th><th>审核结果</th><th>报警状况</th><th>操作</th></thead>
                    <tbody>
                    <?php if(is_array($PlantInspectRecord)): $i = 0; $__LIST__ = $PlantInspectRecord;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ri): $mod = ($i % 2 );++$i;?><tr data-alarm="<?php echo ($ri["isAlarm"]); ?>">
                            <td><?php echo ($ri["testDate"]); ?></td><td><?php echo ($ri["testType"]); ?></td><td><?php echo ($ri["testCompany"]); ?></td>
                            <td><?php echo ($ri["nextTestDate"]); ?></td>
                            <td><?php echo ($ri["verifier"]); ?></td>
                            <td><?php echo ($ri["verifyStage"]); ?></td>
                            <td><?php switch($ri["verifyResult"]): case "0": ?>未审核<?php break;?>
                                <?php case "1": ?>审核通过<?php break;?>
                                <?php case "2": ?>审核不通过<?php break;?>
                                <?php default: ?>未审核<?php endswitch;?>
                            </td>
                            <td><?php switch($ri["isAlarm"]): case "0": ?>无报警<?php break;?>
                                <?php case "1": ?>有报警<?php break;?>
                                <?php default: ?>无报警<?php endswitch;?>
                            </td>
                            <td>
                                <a class="read Access" data-access="<?php echo ($Access['DETAIL']['id']); ?>" href="InspectRecordDetail.html?pid=<?php echo ($ri["id"]); ?> && gpid=<?php echo ($plant[0]["id"]); ?>" target="iframe" style="margin-right: 5px">查看<span style="display: none"><?php echo ($ri["id"]); ?></span></a>
                                <a class="edit Access" data-access="<?php echo ($Access['EDIT']['id']); ?>" href="InspectRecordEdit.html?pid=<?php echo ($ri["id"]); ?> && gpid=<?php echo ($plant[0]["id"]); ?>" style="margin-right: 5px" >编辑<span style="display: none"><?php echo ($ri["id"]); ?></span></a>
                                <a class="delete Access" data-access="<?php echo ($Access['DELETE']['id']); ?>" >删除<span style="display: none"><?php echo ($ri["id"]); ?></span></a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </ol>
        </div>
    </div>
    <!-- box容器 end -->
</div>

<div class="modal fade" id="myModalPreview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                新增储罐检验信息
            </div>
            <div class="modal-body">
                <form method="post" id="addInspectRecord" action="<?php echo U('InspectRecord/addInspectRecord');?>">
                    <button type="submit" name="addBtn" class="btn Access" data-access="<?php echo ($Access['SAVE']['id']); ?>" style="color: #f6f4ff ; background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px">
                        <span class="glyphicon glyphicon-ok"></span>&nbsp保存
                    </button>
                    <input name="id" value="<?php echo ($plant[0]['id']); ?>" style="display: none">
                    <table class="borderedDetail" style="padding: 0px">
                        <tbody>
                        <tr><td>设备位号：</td><td><?php echo ($plant[0]['plantNO']); ?></td>
                            <td>检验单位：</td><td>
                                <select  name="testCompany">
                                    <?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '38'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                            <td>检验类型：</td><td>
                                <select  name="testType">
                                    <?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '25'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                        </tr>
                        <tr><td>检验日期：</td><td><input type="datePicker" name="testDate" value="<?php echo ($content["nowDate"]); ?>"/></td>
                            <td>下次检验日期：</td><td><input type="datePicker" name="nextTestDate" value="<?php echo ($content["nowDate"]); ?>"/></td>
                            <td></td><td></td>
                        </tr>
                        <tr><td>备&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp注：</td><td colspan="6"><textarea type="text" name="remark" style="width: 100%"></textarea></td>
                        </tr>
                        </tbody>
                    </table>
                    <button class="submitBtn" type="submit" style="display: none"></button>
                    <div class="tabbable">
                        <ul id="tabs">
                            <li>
                                <a href="" title="tab1">检验记录</a>
                            </li>
                            <li>
                                <a href="" title="tab2">检查结果</a>
                            </li>
                            <li>
                                <a href="" title="tab3">相关文件</a>
                            </li>
                        </ul>
                        <div id="content">
                            <div id="tab1" class="tab">
                                <div class="choice" style="margin-bottom: 20px">
                                    <span> 检验部位：</span>
                                    <input id="bottomBorderBox" type="checkbox" name="bottomBorderBox" value=1 /><span>底板</span>
                                    <input id="wallBorderBox" type="checkbox"  name='wallBorderBox' value=1 /><span>壁板</span>
                                    <input id="topBorderBox" type="checkbox" name="topBorderBox" value=1 /><span>顶板</span>
                                </div>
                                <div class="bottomInput" style="display: none">
                                    <div class="box-container bottomInput">
                                        <!-- box标题块 -->
                                        <div class="box-head box-head-list" >
                                            <h3>底板检验信息</h3>
                                            <a class="box-head-more">收起</a>
                                        </div>
                                        <!-- box列表块 -->
                                        <div class="detail" style="width: 100%;">
                                            <ol>
                                                <table class="borderedDetail">
                                                    <tbody>
                                                    <tr><td><p>底板检验日期:</p></td><td>
                                                        <input  type="datePicker" name="testDate_bottom" value="<?php echo ($content["nowDate"]); ?>"/></td>
                                                        <td><p>底板检验类型:</p></td><td>
                                                            <select  name="testType_bottom">
                                                                <?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '26'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                                            </select>
                                                        </td></tr>
                                                    <tr><td><p>储罐基础沉降:</p></td><td>
                                                        <select name="testBasicSettle_bottom">
                                                            <?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '24'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                                        </select>
                                                    </td>
                                                        <td><p>底板检验有效性:</p></td><td>
                                                            <select name="testMethod_bottom">
                                                                <?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '39'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                                            </select>
                                                        </td></tr>
                                                    <tr>
                                                        <td><p>中幅板最小测量厚度(mm):</p></td>
                                                        <td>
                                                            <input name="testMinThickness1_bottom" class="spinner" value="" />
                                                        </td>
                                                        <td>
                                                            <p>边缘板最小测量厚度(mm):</p></td>
                                                        <td>
                                                            <input name="testMinThickness2_bottom" class="spinner" value="" />
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="wallInput" style="display: none">
                                    <div class="box-container wallInput">
                                        <!-- box标题块 -->
                                        <div class="box-head box-head-list" >
                                            <h3>壁板检验信息</h3>
                                            <a class="box-head-more">收起</a>
                                        </div>
                                        <!-- box列表块 -->
                                        <div class="detail" style="width: 100%;">
                                            <ol>
                                                <a id="addWallInspect" style="float: right;margin-bottom: 5px">新增壁板检验信息</a>
                                                <table class="bordered" id="addWallInspectTable">
                                                    <thead><th>壁板层号</th><th>检验日期</th><th>检验有效性</th><th>最小测量厚度</th><th>操作</th></thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </ol>
                                        </div>
                                    </div>
                                </div>

                                <div class="topInput" style="display: none">
                                    <div class="box-container topInput">
                                        <!-- box标题块 -->
                                        <div class="box-head box-head-list" >
                                            <h3>顶板检验信息</h3>
                                            <a class="box-head-more">收起</a>
                                        </div>
                                        <!-- box列表块 -->
                                        <div class="detail" style="width: 100%;">
                                            <ol>
                                                <table class="borderedDetail">
                                                    <tbody>
                                                    <tr><td><p>顶板检验日期:</p></td><td>
                                                        <input type="datePicker" name="testDate_top" value="<?php echo ($content["nowDate"]); ?>" />
                                                    </td>
                                                        <td><p>顶板检验有效性:</p></td><td>
                                                            <select name="testMethod_top">
                                                                <?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '39'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                                            </select>
                                                        </td></tr>
                                                    <tr><td><p>顶板最小测量厚度:</p></td><td>
                                                        <input name="testMinThickness_top" class="spinner" value="" />
                                                    </td>
                                                        <td><p></p></td><td>
                                                        </td></tr>
                                                    </tbody>
                                                </table>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab2" class="tab">
                                <table class="bordered">
                                    <thead><th>检查项目</th><th>检查结果</th><th>备注</th></thead>
                                    <tbody>
                                    <?php if(is_array($testItem)): $i = 0; $__LIST__ = $testItem;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rD): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($rD["key"]); ?> <input name="checkItem[]" value="<?php echo ($rD["key"]); ?>"  style="display: none"/></td><td>
                                            <select name="checkResult[]">
                                                <option value="1">√</option>
                                                <option value="0">×</option>
                                                <option value="2">/</option>
                                            </select>
                                        </td><td><textarea name="checkResultRemark[]"></textarea></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="tab3" class="tab">
                                <div class="alert alert-warning">
                                    提示！请在编辑页面添加相关文件！！！</br>
                                    操作步骤：检验记录管理->储罐设备列表->检验记录列表，点击“编辑”进行运行记录编辑。
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<script src="/www/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/www/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<script src="/www/Public/Home/js/content_edit.js"></script>
<script type="text/javascript" src="/www/Public/Home/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/www/Public/Home/js/jquery.form.js"></script>
<script type="text/javascript" src="/www/Public/Home/js/jquery.cookie.js"></script>
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

        //根据是否报警显示背景色
        $("#InspectRecordList tbody tr").each(function(){
            if($(this).attr("data-alarm")==1){
                $(this).css('color','red');
//                alert($(this).attr("data-alarm"));
            }
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
//        打开新增弹出窗口
        $("#addInspectInfo").click(function(){
            $("#addInspectRecord input:checkbox").removeAttr("checked");
            $("#myModalPreview").modal("show");
        });
//        选择维修部位
        $("#wallBorderBox").click(function(){
            if($("#wallBorderBox").is(":checked")){
                $("#addInspectRecord .wallInput").show(300);
            }else{
                $("#addInspectRecord .wallInput").hide(300);
            }
        });
        $("#bottomBorderBox").click(function(){
            if($("#bottomBorderBox").is(":checked")){
                $("#addInspectRecord .bottomInput").show(300);
            }else{
                $("#addInspectRecord .bottomInput").hide(300);
            }
        });
        $("#topBorderBox").click(function(){
            if($("#topBorderBox").is(":checked")){
                $("#addInspectRecord .topInput").show(300);
            }else{
                $("#addInspectRecord .topInput").hide(300);
            }
        })
//        提交检验记录
        $("#addInspectRecord").ajaxForm({
            beforeSubmit:  function showRequest(){
               if(confirm("是否提交检验记录？")){}else{return false;}
            },  // 提交前
            success: function showResponse(data){
                if(confirm(data.msg+",是否需要上传相关文件？")){
                    location.href="InspectRecordEdit.html?pid="+data.pid+" && gpid="+data.gpid;
                }else{
                    location.reload();
                }

            }
        })

//     激活spin插件
        $(".spinner").css('width','100%');
        var spinner = $( ".spinner" ).spinner();
        //激活日历控件
        $.datepicker.regional["zh-CN"] = { closeText: "关闭", prevText: "&#x3c;上月", nextText: "下月&#x3e;", currentText: "今天", monthNames: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"], monthNamesShort: ["一", "二", "三", "四", "五", "六", "七", "八", "九", "十", "十一", "十二"], dayNames: ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"], dayNamesShort: ["周日", "周一", "周二", "周三", "周四", "周五", "周六"], dayNamesMin: ["日", "一", "二", "三", "四", "五", "六"], weekHeader: "周", dateFormat: "yy-mm-dd", firstDay: 1, isRTL: !1, showMonthAfterYear: !0, yearSuffix: "年" }
        $.datepicker.setDefaults($.datepicker.regional["zh-CN"]);
        function initDatePicker(ele){
            ele.datepicker(
                    {
                        showOtherMonths: true,
                        selectOtherMonths: true,
                        showButtonPanel: true,
                        dateFormat : "yy-mm-dd"
                    }
            );
        }
        initDatePicker($( "input[type='datePicker']" ));
        $("#ui-datepicker-div").css('font-size','18px');


//        点击查看检验记录详细
        $('.riskDoc tr .read').click(function(){
            $("#myModal").modal("show");
        })
//        点击删除检验记录
        $('.riskDoc tr .delete').click(function(){
            if(confirm("是否删除该记录？")){
            var i=$(this).find("span").text();
            $.post("<?php echo U('InspectRecord/deleteInspectRecord');?>",{id:i},function(data){
                alert(data.msg);
                location.reload();
            },"json");
            } else {
                return false;
            }
        });
//        文件上传
        $("#uploadFile").ajaxForm({
            beforeSubmit:  function showRequest(){
                if(confirm("是否进行文件上传？")){}else{return false;}
            },  // 提交前
            success: function showResponse(data){
                alert(data.msg);
            }
        })
        $("#addWallInspectTable").on("click",".delete",function(){
            $(this).parents("tr").remove();
        });
        $("#addWallInspect").click(function(){
            var layerCount=$("#addInspectRecord input[name='id']").val();
            $.post("<?php echo U('InspectRecord/getLayerSelect');?>",{pid:layerCount,contentId:39},function(data){
                var wall=data.wallboard;
                if(wall==null){
                    alert(data.msg);
                }else {
                    var option = "";
                    for (var i = 0; i < wall.length; i++) {
                        var optionValue = wall[i]['layerNO'];
                        var option = option + "<option value=" + optionValue + ">" + optionValue + "</option>";
                    }
                    var method = data.testMethod;
                    var methodOption = "";
                    for (var i = 0; i < method.length; i++) {
                        var methodOptionValue = method[i]['key'];
                        var methodOption = methodOption + "<option value=" + methodOptionValue + ">" + methodOptionValue + "</option>";
                    }

                    var layerSelect = '<select name="layerNO[]" style="width: 100%">' + option + '</select>';
                    var testDateWall = "<input name='testDateWall[]' type='datePicker' style='width: 100%' value='" + data.nowDate + "'/>";
                    var testMethod = '<select name="testMethod[]" style="width: 100%">' + methodOption + '</select>';

                    var minThickness = "<input name='minThickness[]' style='width: 100%'/>";
                    var del = "<a class='delete'>删除</a>";
                    var tr = "<tr><td>" + layerSelect + "</td><td>" + testDateWall + "</td><td>" + testMethod + "</td><td>" + minThickness + "</td><td>" + del + "</td></tr>";
                    $("#addWallInspect").parent("ol").find("tbody").append(tr);
                    initDatePicker($("input[type='datePicker']"));
                }
            },"JSON")
        });

    });
</script>
</body>
</html>