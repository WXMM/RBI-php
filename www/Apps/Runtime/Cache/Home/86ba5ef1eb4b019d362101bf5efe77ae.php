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
        table input,table select,table option{
            width: 100%;
            text-align: center;
        }
        .input-group{
            width: 100%;
        }
        .input-group > span{
            width: 30%;
        }
        .input-group > input{
            width: 70%;
        }
        .choice span{
            padding: 5px;
        }
        .ui-spinner{
            width: 100%;
        }
    </style>
    <title></title>
</head>
<body>
<ol class="breadcrumb" style="background-color: transparent;float: left; height: 30px;width: 100%">
    <li class="active">检验与维修</li>
    <li class="active">检验记录管理</li>
    <li><a href="<?php echo U('InspectRecord/PlantList');?>">储罐设备列表</a></li>
    <li><a href="InspectRecordList.html?id=<?php echo ($plant[0]['id']); ?>">检验记录列表</a></li>
    <li class="active">检验记录编辑</li>
</ol>
<div style="width: 98%;margin-left: auto;margin-right: auto">

    <button type="button" id="saveBtn" class="btn Access" data-access="<?php echo ($Access['SAVE']['id']); ?>" style="color: #f6f4ff ;background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px">
        <span class="glyphicon glyphicon-ok"></span>&nbsp保存
    </button>
    <table class="borderedDetail" id="InspectRecordBrief" style="padding: 0px">
        <tbody>
        <tr><td>设备位号：</td><td><?php echo ($plant[0]['plantNO']); ?></td>
            <td>检验单位：</td><td>
                <select   name="testCompany" data-option="<?php echo ($PlantInspectRecord["testCompany"]); ?>">
                    <?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '38'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </td>
            <td>检验类型：</td><td>
                <select   name="testType" data-option="<?php echo ($PlantInspectRecord["testType"]); ?>">
                    <?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '25'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </td>
        </tr>
        <tr><td>检验日期：</td><td><input type="datePicker" name="testDate" value="<?php echo ($PlantInspectRecord["testDate"]); ?>"/></td>
            <td>下次检验日期：</td><td><input type="datePicker" name="nextTestDate" value="<?php echo ($PlantInspectRecord["nextTestDate"]); ?>"/></td>
            <td></td><td></td>
        </tr>
        <tr><td>备&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp注：</td><td colspan="6">
            <textarea name="remark" style="width: 100%"><?php echo ($PlantInspectRecord["remark"]); ?></textarea></td>
        </tr>
        </tbody>
    </table>

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
            <form method="post" id="addInspectRecord" action="<?php echo U('InspectRecord/editInspectRecord');?>">
                <input  name="id" value="<?php echo ($PlantInspectRecord["id"]); ?>" style="display: none">
                <input  name="testCompany" value="<?php echo ($PlantInspectRecord["testCompany"]); ?>" style="display: none">
                <input  name="testType" value="<?php echo ($PlantInspectRecord["testType"]); ?>" style="display: none">
                <input  name="testDate" value="<?php echo ($PlantInspectRecord["testDate"]); ?>" style="display: none">
                <input  name="nextTestDate" value="<?php echo ($PlantInspectRecord["nextTestDate"]); ?>" style="display: none">
                <input  name="verifyResult" value="<?php echo ($PlantInspectRecord["verifyResult"]); ?>" style="display: none">
                <textarea  name="remark" style="display: none"><?php echo ($PlantInspectRecord["remark"]); ?></textarea>
                <button type="submit" style="display: none"></button>
                <div id="tab1" class="tab">
                    <div class="choice" style="margin-bottom: 20px">
                        <span> 检验部位：</span>
                        <input id="bottomBorderBox" type="checkbox"  name="bottomBorderBox" value="<?php echo ($PlantInspectRecord["isBottomTest"]); ?>" /><span>底板</span>
                        <input id="wallBorderBox" type="checkbox"   name='wallBorderBox' value="<?php echo ($PlantInspectRecord["isWallTest"]); ?>"  /><span>壁板</span>
                        <input id="topBorderBox" type="checkbox"  name="topBorderBox" value="<?php echo ($PlantInspectRecord["isTopTest"]); ?>" /><span>顶板</span>
                    </div>
                    <div id="bottomInput" style="display: none">
                        <div class="box-container">
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
                                            <input  type="datePicker" name="testDate_bottom"  value="<?php echo ($PlantInspectRecord["testDate_bottom"]); ?>"/></td>
                                            <td><p>底板检验类型:</p></td><td>
                                                <select  name="testType_bottom"  data-option="<?php echo ($PlantInspectRecord["testType_bottom"]); ?>">
                                                    <?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '39'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                                </select>
                                            </td></tr>
                                        <tr><td><p>储罐基础沉降:</p></td><td>
                                            <select name="testBasicSettle_bottom"  data-option="<?php echo ($PlantInspectRecord["testType_bottom"]); ?>">
                                                <?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '24'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
                                        </td>
                                            <td><p>底板检验有效性:</p></td><td>
                                                <select name="testMethod_bottom"  data-option="<?php echo ($PlantInspectRecord["testType_bottom"]); ?>">
                                                    <?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '39'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                                </select>
                                            </td></tr>
                                        <tr>
                                            <td><p>中幅板最小测量厚度(mm):</p></td><td>
                                            <input name="testMinThickness1_bottom"  class="spinner" value="<?php echo ($PlantInspectRecord["testMinThickness1_bottom"]); ?>" />
                                        </td><td><p>边缘板最小测量厚度(mm):</p></td><td>
                                            <input name="testMinThickness2_bottom"  class="spinner" value="<?php echo ($PlantInspectRecord["testMinThickness2_bottom"]); ?>" />
                                        </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div id="wallInput" style="display: none">
                        <div class="box-container">
                            <!-- box标题块 -->
                            <div class="box-head box-head-list" >
                                <h3>壁板检验信息</h3>
                                <a class="box-head-more">收起</a>
                            </div>
                            <!-- box列表块 -->
                            <div class="detail" style="width: 100%;">
                                <ol>
                                    <a id="addWallInspect" style="float: right;margin-bottom: 5px">新增壁板检验信息</a>
                                    <table class="bordered">
                                        <thead><th>壁板层号</th><th>检验日期</th><th>检验有效性</th><th>最小测量厚度</th><th>操作</th></thead>
                                        <tbody>
                                        <?php if(is_array($PlantTestRecordWall)): $i = 0; $__LIST__ = $PlantTestRecordWall;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$wallboard): $mod = ($i % 2 );++$i;?><tr data-row-id="<?php echo ($wallboard["id"]); ?>" data-row-pid="<?php echo ($wallboard["id"]); ?>"><td class="layerNO"><?php echo ($wallboard["layerNO"]); ?></td>
                                                <td class="testDate"><?php echo ($wallboard["testDate"]); ?></td>
                                                <td class="testMethod"><?php echo ($wallboard["testMethod"]); ?></td>
                                                <td class="minThickness"><?php echo ($wallboard["minThickness"]); ?></td>
                                                <td><a class="edit Access" data-access="<?php echo ($Access['EDIT']['id']); ?>" style="margin-right: 5px">编辑</a>
                                                    <a class="delete Access" data-access="<?php echo ($Access['DELETE']['id']); ?>">删除</a></td>
                                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                    </table>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div id="topInput" style="display: none">
                        <div class="box-container">
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
                                            <input type="datePicker" name="testDate_top" value="<?php echo ($PlantInspectRecord["testDate_top"]); ?>" />
                                        </td>
                                            <td><p>顶板检验有效性:</p></td><td>
                                                <select name="testMethod_top" data-option="<?php echo ($PlantInspectRecord["testMethod_top"]); ?>">
                                                    <?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '39'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                                </select>
                                            </td></tr>
                                        <tr><td><p>顶板最小测量厚度:</p></td><td>
                                            <input name="testMinThickness_top" value="<?php echo ($PlantInspectRecord["testMinThickness_top"]); ?>" />
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
            </form>
            <div id="tab2" class="tab">
                <table class="bordered">
                    <thead><th>检查项目</th><th>检查结果</th><th>备注</th><th>操作</th></thead>
                    <tbody>
                    <?php if(is_array($PlantTestRecordCheckResult)): $i = 0; $__LIST__ = $PlantTestRecordCheckResult;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rD): $mod = ($i % 2 );++$i;?><tr data-row-id="<?php echo ($rD["id"]); ?>" data-alarm="<?php echo ($rD["checkResult"]); ?>">
                            <td class="checkItem"><?php echo ($rD["checkItem"]); ?></td>
                            <td class="checkResult">
                                <?php switch($rD["checkResult"]): case "1": ?>√<?php break;?>
                                    <?php case "0": ?>×<?php break;?>
                                    <?php case "2": ?>/<?php break; endswitch;?>
                            </td>
                            <td class="remark"><?php echo ($rD["remark"]); ?></td>
                            <td><a class="edit Access" data-access="<?php echo ($Access['EDIT']['id']); ?>">编辑</a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
            <div id="tab3" class="tab">
                <form action="<?php echo U('Public/upload');?>" enctype="multipart/form-data" method="post" id="upload">
                    <input type="hidden" name="id" value="<?php echo ($PlantInspectRecord['id']); ?>" >
                    <input type="hidden" name="tableId" value="InspectRecord">
                    <div class="input-group" style="width: 50%">
                        <input type="file" name="photo"  style="display: none" />
                        <input type="text" class="form-control filePath"  disabled="disabled">
					<span class="input-group-btn">
						<button class="btn btn-default chooseFile" type="button">
                            浏览
                        </button>
                        <button class="btn btn-default" type="submit">
                            上传
                        </button>
					</span>
                    </div>
                </form>
                <table class="bordered">
                    <thead>
                    <tr><th>文件名称</th><th>添加时间</th><th>操作</th></tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($attachment)): $i = 0; $__LIST__ = $attachment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($vo["filename"]); ?></td><td class="type"><?php echo ($vo["addTime"]); ?></td>
                            <td data-row-id="<?php echo ($vo["id"]); ?>">
                                <a class="download Access" data-access="<?php echo ($Access['DOWNLOAD']['id']); ?>" href="downloadUpload.html?id=<?php echo ($vo["id"]); ?>">下载</a>
                                <a class="delete Access" data-access="<?php echo ($Access['DELETE']['id']); ?>" >删除</a>
                            </td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editWallModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title">
                        编辑壁板检验信息
                    </h4>
                </div>
                <form class="bs-example bs-example-form" id="editWallModalForm" role="form" action="<?php echo U('InspectRecord/editInspectRecordWall');?>" method="post">
                    <input type="hidden" name="id"  class="id" value="">
                    <input type="hidden" name="pid" class="pid" value="<?php echo ($PlantInspectRecord["id"]); ?>">
                    <input name="verifyResult" value="<?php echo ($PlantInspectRecord["verifyResult"]); ?>" style="display: none">
                    <div class="modal-body">
                        <div class="input-group">
                            <span class="input-group-addon">壁板层号</span>
                            <select name="layerNO" class="form-control layerNO">
                                <?php if(is_array($wallBoard)): $i = 0; $__LIST__ = $wallBoard;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["layerNO"]); ?>"><?php echo ($vo["layerNO"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon">检验日期</span>
                            <input type="datePicker" name="testDate" class="form-control testDate" placeholder="检验日期" value="<?php echo ($content['nowDate']); ?>">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon">检验有效性</span>
                            <select name="testMethod"  class="form-control testMethod">
                                <?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '39'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon">最小测量厚度(mm)</span>
                            <input type="text" name="minThickness" class="form-control minThickness" placeholder="最小测量厚度">
                        </div><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">关闭
                        </button>
                        <button type="submit" class="btn btn-primary">
                            提交
                        </button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
    <div class="modal fade" id="editInspectResModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title">
                        编辑检验结果
                    </h4>
                </div>
                <form class="bs-example bs-example-form" id="editInspectResForm" role="form" action="<?php echo U('InspectRecord/editInspectRes');?>" method="post">
                    <input type="hidden" name="id"  class="id" value="">
                    <input type="hidden" name="pid"  class="pid" value="<?php echo ($PlantInspectRecord["id"]); ?>">
                    <input type="hidden" name="gpid"  class="gpid" value="<?php echo ($plant[0]['id']); ?>">
                    <input name="verifyResult" value="<?php echo ($PlantInspectRecord["verifyResult"]); ?>" style="display: none">
                    <div class="modal-body">
                        <div class="input-group">
                            <span class="input-group-addon">检查项目</span>
                            <input type="text" name="checkItem" class="form-control checkItem" placeholder="检查项目" style="text-align: center">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon">检查结果</span>
                            <select  name="checkResult" class="form-control checkResult" >
                                <option value="1">√</option>
                                <option value="0">×</option>
                                <option value="2">/</option>
                            </select>
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon">备注</span>
                            <textarea type="text" name="remark" class="form-control remark" placeholder="备注"></textarea>
                        </div><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">关闭
                        </button>
                        <button type="submit" class="btn btn-primary">
                            提交
                        </button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
</div>
<script src="/www/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/www/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
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
        $("#tab2 tbody tr").each(function(){
            if($(this).attr("data-alarm")==0){
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
            $("#addInspectRecord input:checkbox");
            $("#myModalPreview").modal("show");
        });
  //       选择时候选中壁板、底板、顶板
        var wallBorderVal=$("#wallBorderBox").val()
        var bottomBorderVal=$("#bottomBorderBox").val()
        var topBorderVal=$("#topBorderBox").val()
        if(wallBorderVal==1){
            $("#wallBorderBox").attr("checked",true);
            $("#wallInput").show();
        }else{
            $("#wallBorderBox").attr("checked",false);
            $("#wallInput").hide();
        }
        if(bottomBorderVal==1){
            $("#bottomBorderBox").attr("checked",true);
            $("#bottomInput").show();
        }else{
            $("#bottomBorderBox").attr("checked",false);
            $("#bottomInput").hide();
        }
        if(topBorderVal==1){
            $("#topBorderBox").attr("checked",true);
            $("#topInput").show();
        }else{
            $("#topBorderBox").attr("checked",false);
            $("#topInput").hide();
        }
//        选择维修部位
        $("#wallBorderBox").click(function(){
            if($("#wallBorderBox").is(":checked")){
                $(this).val(1);
                $("#wallInput").show(300);
            }else{
                $(this).val(0);
                $("#wallInput").hide(300);
            }
        });
        $("#bottomBorderBox").click(function(){
            if($("#bottomBorderBox").is(":checked")){
                $(this).val(1);
                $("#bottomInput").show(300);
            }else{
                $(this).val(0);
                $("#bottomInput").hide(300);
            }
        });
        $("#topBorderBox").click(function(){
            if($("#topBorderBox").is(":checked")){
                $(this).val(1);
                $("#topInput").show(300);
            }else{
                $(this).val(0);
                $("#topInput").hide(300);
            }
        })

        $("#saveBtn").click(function(){
            var testCompany=$("#InspectRecordBrief select[name='testCompany']").val();
            var testType=$("#InspectRecordBrief select[name='testType']").val();
            var testDate=$("#InspectRecordBrief input[name='testDate']").val();
            var nextTestDate=$("#InspectRecordBrief input[name='nextTestDate']").val();
            var remark=$("#InspectRecordBrief textarea[name='remark']").val();
            $("#addInspectRecord input[name='testCompany']").val(testCompany);
            $("#addInspectRecord input[name='testType']").val(testType);
            $("#addInspectRecord input[name='testDate']").val(testDate);
            $("#addInspectRecord input[name='nextTestDate']").val(nextTestDate);
            $("#addInspectRecord textarea[name='remark']").val(remark);
            $("#addInspectRecord button").click();
        })
//        提交检验记录
        $("#addInspectRecord").ajaxForm({
            beforeSubmit:  function showRequest(){
//                alert("你好");
            },  // 提交前
            success: function showResponse(data){
                alert(data.msg);
                location.reload();
            }
        })

//     激活spin插件
        $(".spinner").css('width','100%');
        var spinner = $( ".spinner" ).spinner();
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


//        点击查看检验记录详细
        $('.riskDoc tr .read').click(function(){
            $("#myModal").modal("show");
        })
//        点击删除检验记录
        $('.riskDoc tr .delete').click(function(){
            var i=$(this).find("span").text();
            $.post("<?php echo U('InspectRecord/deleteInspectRecord');?>",{id:i},function(data){
                alert(data.msg);
                location.reload();
            },"json");

        });
//        文件上传
        $("#uploadFile").ajaxForm({
            beforeSubmit:  function showRequest(){
            },  // 提交前
            success: function showResponse(data){
                alert(data.msg);
            }
        })


//        新增壁板检验信息
        $("#addWallInspect").click(function(){
            $("#editWallModal .modal-title").html('').html("新增壁板检验信息");
            $("#editWallModal").find(".id").val('');
            $("#editWallModal").find(".layerNO").attr("readonly",false);
            $("#editWallModal").find(".testDate");
            $("#editWallModal").find(".testMethod");
            $("#editWallModal").find(".testRate").val('');
            $("#editWallModal").find(".minThickness").val('');
            $("#editWallModal").modal('show');
        })
//        编辑壁板检验信息
        $("#wallInput table tbody tr .edit").click(function(){
            $("#editWallModal .modal-title").html('').html("编辑壁板检验信息");
            var layerNO=$(this).parents("tr").find(".layerNO").text();
            var testDate=$(this).parents("tr").find(".testDate").text();
            var testMethod=$(this).parents("tr").find(".testMethod").text();
//            var testRate=$(this).parents("tr").find(".testRate").text();
            var minThickness=$(this).parents("tr").find(".minThickness").text();
            var id=$(this).parents("tr").attr("data-row-id");
            $("#editWallModal").find(".id").val(id);
            $("#editWallModal").find(".layerNO option[value='"+layerNO+"']").attr("selected",true).attr("readonly","readonly");
            $("#editWallModal").find(".testDate").val(testDate);
            $("#editWallModal").find(".testMethod option[value='"+testMethod+"']").attr("selected",true);
//            $("#editWallModal").find(".testRate").val(testRate);
            $("#editWallModal").find(".minThickness").val(minThickness);
            $("#editWallModal").modal('show');
        })
        $("#editWallModalForm").ajaxForm({
            beforeSubmit:  function showRequest(){
            },  // 提交前
            success: function showResponse(data){
                alert(data.msg);
                location.reload();
            }
        })
        $("#wallInput .bordered tbody tr .delete").click(function(){
            if(confirm("是否确认删除？")){
                var id=$(this).parents("tr").attr("data-row-id");
                $.post("<?php echo U('InspectRecord/deleteInspectRecordWall');?>",{id:id},function(data){
                    alert(data.msg);
                    location.reload();
                },"JSON")
            }
        })

//        编辑检查结果内容
        $("#tab2 table tbody tr .edit").click(function(){
            var checkItem=$(this).parents("tr").find(".checkItem").text();
            var checkResult=$(this).parents("tr").find(".checkResult").text();
            var remark=$(this).parents("tr").find(".remark").text();
            var id=$(this).parents("tr").attr("data-row-id");
            $("#editInspectResForm").find(".id").val(id);
            $("#editInspectResForm").find(".checkItem").attr("readonly","readonly").val(checkItem);
            $("#editInspectResForm").find(".checkResult option[value="+checkResult+"]").attr("selected","selected");
            $("#editInspectResForm").find(".remark").val(remark);
            $("#editInspectResModal").modal('show');
        })
        $("#editInspectResForm").ajaxForm({
            beforeSubmit:  function showRequest(){
                if(confirm("确认修改？")){}
            },  // 提交前
            success: function showResponse(data){
                alert(data.msg);
                location.reload();
            }
        })

        $("#upload .chooseFile").click(function(){
            $("#upload input[type='file']").click();
        })
        $("#upload input[type='file']").change(function(){
            $("#upload .filePath").val($(this).val());
        })
        //        上传附件
        $("#upload").ajaxForm({
            beforeSubmit:function showRequest(){
            },
            success: function showResponse(data){
                alert(data.msg);
                location.reload();
            }
        })
        //        附件删除
        $("#tab2 tbody tr .delete").click(function(){
            var id=$(this).parent().attr("data-row-id");
            if(confirm("确定要删除文件吗?")) {
                $.post("<?php echo U('Public/deleteUpload');?>",{id:id},function(data){
                    alert(data.msg);
                    location.reload();
                },"JSON")
                return false; //阻止表单默认提交
            }else{
                return false;
            }
        })
    });
</script>
</body>
</html>