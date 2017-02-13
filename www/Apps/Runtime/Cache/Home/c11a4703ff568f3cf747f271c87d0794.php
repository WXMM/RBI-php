<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/model/Public/bootstrap-3.0.3/css/bootstrap.min.css" type="text/css">
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
        }
        table td input,table td select{
            text-align: center;
            width: 100%;
        }
        .breadcrumb > li + li:before {
            color: #CCCCCC;
            content: " > ";
            padding: 0px 5px;
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

        }
        #addMaintenanceRecord .choice span{
            padding:5px;
        }
    </style>
    <title></title>
</head>
<body>
<ol class="breadcrumb" style="background-color: transparent;float: left; height: 30px;width: 100%">
    <li class="active">检验与维修</li>
    <li class="active">维修记录管理</li>
    <li><a href="<?php echo U('MaintenanceRecord/PlantList');?>">储罐设备列表</a></li>
    <li class="active">维修记录列表</li>
</ol>
<div class="tankInfoDetail" style="width:98%;margin-left: auto;margin-right: auto">
    <table class="borderedDetail">
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
    <button class="btn btn-primary Access" id="addMaintenanceInfo" data-access="<?php echo ($Access['ADD']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px">
        <span class="glyphicon glyphicon-plus" style="margin-right:5px "></span>新增维修记录</button>
    <div>
    <!-- box容器 start -->
    <div class="box-container">
        <!-- box标题块 -->
        <div class="box-head box-head-list" >
            <h3>维修记录列表</h3>
        </div>
        <!-- box列表块 -->
        <div class="riskDoc" style="width: 100%;">
            <ol>
                <!--风险分析记录-->
                <table class="bordered">
                    <thead><th>维修日期</th><th>维修单位</th><th>审核人员</th><th>审核阶段</th><th>审核结果</th><th>操作</th></thead>
                    <tbody>
                    <?php if(is_array($PlantmaintanceRecord)): $i = 0; $__LIST__ = $PlantmaintanceRecord;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ri): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($ri["maintanceDate"]); ?></td>
                            <td><?php echo ($ri["maintanceCompany"]); ?></td>
                            <td><?php echo ($ri["verifier"]); ?></td>
                            <td><?php echo ($ri["verifyStage"]); ?></td>
                            <td>
                                <?php switch($ri["verifyResult"]): case "0": ?>未审核<?php break;?>
                                    <?php case "1": ?>审核通过<?php break;?>
                                    <?php case "2": ?>审核不通过<?php break;?>
                                    <?php default: ?>未审核<?php endswitch;?>
                              </td>
                            <td>
                                <a class="read Access" data-access="<?php echo ($Access['DETAIL']['id']); ?>" href="MaintenanceRecordDetail.html?pid=<?php echo ($ri["id"]); ?> && gpid=<?php echo ($plant[0]["id"]); ?>" target="iframe">查看<span style="display: none"><?php echo ($ri["id"]); ?></span></a>
                                <a class="edit Access" data-access="<?php echo ($Access['EDIT']['id']); ?>" href="MaintenanceRecordEdit.html?pid=<?php echo ($ri["id"]); ?> && gpid=<?php echo ($plant[0]["id"]); ?>">编辑<span style="display: none"><?php echo ($ri["id"]); ?></span></a>
                                <a class="delete Access" data-access="<?php echo ($Access['DELETE']['id']); ?>" data-row-id="<?php echo ($ri["id"]); ?>">删除<span style="display: none"><?php echo ($ri["id"]); ?></span></a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </ol>
        </div>
    </div>
    <!-- box容器 end -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width: 95%">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">维修记录管理详细</h4>
                    </div>
                    <div class="modal-body">
                        <iframe src="MaintenanceRecordDetail.html" name="iframe" id="iframe" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" width="100%" height="700"></iframe>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal -->
        </div>
</div>
</div>
<div class="modal fade" id="myModalPreview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                新增储罐维修信息
            </div>
            <div class="modal-body">
                <form method="post" id="addMaintenanceRecord" action="<?php echo U('MaintenanceRecord/addMaintenanceRecord');?>">
                    <button type="submit" name="addBtn" class="btn Access" data-access="<?php echo ($Access['SAVE']['id']); ?>" style=" color: #F8F7EF;background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px">
                        <span class="glyphicon glyphicon-ok"></span>&nbsp保存
                    </button>
                    <input name="id" value="<?php echo ($plant[0]['id']); ?>" style="display: none">
                    <table class="borderedDetail" style="padding: 0px">
                        <tbody>
                        <tr><td>设备位号：</td><td><?php echo ($plant[0]['plantNO']); ?></td>
                            <td>维修日期：</td><td><input  type="datePicker" name="maintanceDate" value="<?php echo ($content["nowDate"]); ?>"/>
                            <td>记录日期：</td><td><input  type="datePicker" name="Record_dt" value="<?php echo ($content["nowDate"]); ?>"/></td>
                        </tr>
                        <tr><td>维修单位：</td><td>
                            <select  name="maintanceCompany">
                                <?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '73'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                           </td>
                            <td>记录人员：</td><td>
                                <select  name="Record_username">
                                    <?php if(is_array($User)): $i = 0; $__LIST__ = $User;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value=<?php echo ($vo["realname"]); ?>><?php echo ($vo["realname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
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
                                <a href="" title="tab1">维修记录</a>
                            </li>
                            <li>
                                <a href="" title="tab2">相关文件</a>
                            </li>
                        </ul>
                        <div id="content">
                            <div id="tab1" class="tab">
                                <div class="choice" style="margin-bottom: 20px">
                                    <span> 维修部位：</span>
                                    <input id="bottomBorderBox" type="checkbox" name="bottomBorderBox" value=1 /><span>底板</span>
                                    <input id="wallBorderBox" type="checkbox"  name='wallBorderBox' value=1 /><span>壁板</span>
                                    <input id="topBorderBox" type="checkbox" name="topBorderBox" value=1 /><span>顶板</span>
                                </div>
                                <div class="bottomInput" style="display: none">
                                    <div class="box-container bottomInput">
                                        <!-- box标题块 -->
                                        <div class="box-head box-head-list" >
                                            <h3>底板维修记录</h3>
                                        </div>
                                        <!-- box列表块 -->
                                        <div class="detail" style="width: 100%;">
                                            <ol>
                                                <!--风险分析记录-->
                                                <table class="borderedDetail">
                                                    <tbody>
                                                    <tr>
                                                        <td><p>底板是否更换:</p></td><td class="isChange_bottom">
                                                        <select name="isChange_bottom">
                                                            <option value="0">否</option>
                                                            <option value="1">是</option>
                                                        </select>
                                                    </td>
                                                        <td><p>底板更换日期:</p></td><td class="changeDate_bottom">
                                                        <input name="changeDate_bottom" type="datePicker" value="<?php echo ($content["nowDate"]); ?>" />
                                                    </td>
                                                        <td><p>底板是否涂层:</p></td><td class="isInsidePaint_bottom">
                                                        <select name="isChange_bottom">
                                                            <option value="0">否</option>
                                                            <option value="1">是</option>
                                                        </select>
                                                    </td></tr>
                                                    <tr><td><p>底板涂层日期:</p></td><td class="insidePaintDate_bottom">
                                                        <input name="insidePaintDate_bottom" type="datePicker" value="<?php echo ($content["nowDate"]); ?>" />
                                                    </td>
                                                        <td><p>底板涂层质量:</p></td><td class="insidePaintQuality_bottom">
                                                            <select name="insidePaintQuality_bottom">
                                                                <option value="高">高</option>
                                                                <option value="中">中</option>
                                                                <option value="低">低</option>
                                                            </select>
                                                        </td>
                                                        <td><p>是否安装衬里:</p></td><td class="isInstallLining_bottom">
                                                            <select name="isInstallLining_bottom">
                                                                <option value="0">否</option>
                                                                <option value="1">是</option>
                                                            </select>
                                                        </td></tr>
                                                    <tr><td><p>底板衬里类型:</p></td><td class="liningType_bottom">
                                                        <select  name="liningType_bottom">
                                                            <?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '12'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                                        </select>
                                                    </td>
                                                        <td><p>衬里安装日期:</p></td><td class="installLiningDate_bottom">
                                                            <input name="installLiningDate_bottom" type="datePicker" value="<?php echo ($content["nowDate"]); ?>" />
                                                        </td>
                                                        <td><p>底板衬里质量:</p></td><td class="liningQuality_bottom">
                                                            <select name="liningQuality_bottom">
                                                                <option value="高">高</option>
                                                                <option value="中">中</option>
                                                                <option value="低">低</option>
                                                            </select>
                                                        </td></tr>
                                                    <tr><td><p>衬里最近检验日期:</p></td>
                                                        <td class="liningCheckDate_bottom">
                                                            <input name="liningCheckDate_bottom" type="datePicker" value="<?php echo ($content["nowDate"]); ?>" />
                                                        </td>
                                                        <td></td><td></td>
                                                        <td></td><td></td>
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
                                            <h3>壁板维修记录</h3>
                                        </div>
                                        <!-- box列表块 -->
                                        <ol>
                                            <!--风险分析记录-->
                                            <a id="addWallMaintenance" style="float: right;margin-bottom: 5px">新增壁板检验信息</a>
                                            <table class="bordered" id="addWallMaintenanceTable">
                                                <thead>
                                                <tr><th>壁板层号</th><th>壁板是否更换</th><th>壁板更换时间</th><th>操作</th></tr>
                                                </thead>
                                                <tbody>
                                                <!--<?php if(is_array($plant[0]['Plantwallboardinfo'])): $i = 0; $__LIST__ = $plant[0]['Plantwallboardinfo'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tWall): $mod = ($i % 2 );++$i;?>-->
                                                    <!--<tr>-->
                                                        <!--<td class="layerNO"><?php echo ($tWall["layerNO"]); ?><input style="display: none" name="layerNO[]" value="<?php echo ($tWall["layerNO"]); ?>"></td>-->
                                                        <!--<td class="isChange">-->
                                                            <!--<select name="isChange[]">-->
                                                                <!--<option value="0">否</option>-->
                                                                <!--<option value="1">是</option>-->
                                                            <!--</select>-->
                                                        <!--</td>-->
                                                        <!--<td class="changeDate"><input name="changeDate[]" type="datePicker" value="<?php echo ($tWall["useDate"]); ?>" /></td>-->
                                                    <!--</tr>-->
                                                <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                                                </tbody>
                                            </table>
                                            <table class="borderedDetail">
                                                <tbody>
                                                <tr>
                                                    <td><p>内壁是否涂层:</p></td><td class="isInsidePaint_side">
                                                    <select name="isInsidePaint_side">
                                                        <option value="0">否</option>
                                                        <option value="1">是</option>
                                                    </select>
                                                </td>
                                                    <td><p>内壁涂层日期:</p></td><td class="insidePaintDate_side">
                                                    <input name="insidePaintDate_side" type="datePicker" value="<?php echo ($content["nowDate"]); ?>" /></td>
                                                    <td><p>内壁涂层质量:</p></td><td class="insidePaintQuality_side">
                                                    <select name="insidePaintQuality_side">
                                                        <option value="高">高</option>
                                                        <option value="中">中</option>
                                                        <option value="低">低</option>
                                                    </select>
                                                </tr>
                                                <tr>
                                                    <td><p>外壁是否涂层:</p></td><td class="isOutsidePaint_side">
                                                    <select name="isOutsidePaint_side">
                                                        <option value="0">否</option>
                                                        <option value="1">是</option>
                                                    </select>
                                                </td>
                                                    <td><p>外壁涂层日期:</p></td><td class="outsidePaintDate_side">
                                                    <input name="outsidePaintDate_side" type="datePicker" value="<?php echo ($content["nowDate"]); ?>" />
                                                </td>
                                                    <td><p>外壁涂层质量:</p></td><td class="outsidePaintQuality_side">
                                                    <select name="outsidePaintQuality_side">
                                                        <option value="高">高</option>
                                                        <option value="中">中</option>
                                                        <option value="低">低</option>
                                                    </select>
                                                </tr>
                                                <tr>
                                                    <td><p>是否安装衬里:</p></td><td class="isInstallLining_side">
                                                    <select name="isInstallLining_side">
                                                        <option value="0">否</option>
                                                        <option value="1">是</option>
                                                    </select>
                                                </td>
                                                    <td><p>衬里类型:</p></td><td class="liningType_side">
                                                    <select name="liningType_side">
                                                        <?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '12'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                                    </select>
                                                    <td><p>衬里安装日期:</p></td><td class="installLiningDate_side">
                                                    <input name="installLiningDate_side" type="datePicker" value="<?php echo ($content["nowDate"]); ?>" />
                                                </tr>
                                                <tr>
                                                    <td><p>衬里质量:</p></td><td class="liningQuality_side">
                                                    <select name="liningQuality_side">
                                                        <option value="高">高</option>
                                                        <option value="中">中</option>
                                                        <option value="低">低</option>
                                                    </select>
                                                </td>
                                                    <td><p>衬里最近检验日期:</p></td><td class="liningCheckDate_side">
                                                    <input name="liningCheckDate_side" type="datePicker" value="<?php echo ($content["nowDate"]); ?>" />
                                                </td>
                                                    <td></td><td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </ol>
                                    </div>
                                </div>
                                <div class="topInput" style="display: none">
                                    <div class="box-container topInput">
                                        <!-- box标题块 -->
                                        <div class="box-head box-head-list" >
                                            <h3>顶板维修记录</h3>
                                        </div>
                                        <!-- box列表块 -->
                                        <div class="detail" style="width: 100%;">
                                            <ol>
                                                <!--风险分析记录-->
                                                <table class="borderedDetail">
                                                    <tbody>
                                                    <tr>
                                                        <td><p>顶板是否更换:</p></td><td class="isChange_top">
                                                        <select name="isChange_top">
                                                            <option value="0">否</option>
                                                            <option value="1">是</option>
                                                        </select>
                                                    </td>
                                                        <td><p>顶板更换日期:</p></td><td class="changeDate_top">
                                                        <input name="changeDate_top" type="datePicker" value="<?php echo ($content["nowDate"]); ?>" />
                                                    </td>
                                                        <td><p>内壁是否涂层:</p></td><td class="isInsidePaint_top">
                                                        <select name="isInsidePaint_top">
                                                            <option value="0">否</option>
                                                            <option value="1">是</option>
                                                        </select>
                                                    </td>
                                                    <tr><td><p>内壁涂层日期:</p></td><td class="insidePaintDate_top">
                                                        <input name="insidePaintDate_top" type="datePicker" value="<?php echo ($content["nowDate"]); ?>" />
                                                    </td>
                                                        <td><p>内壁涂层质量:</p></td><td class="insidePaintQuality_top">
                                                            <select name="insidePaintQuality_top">
                                                                <option value="高">高</option>
                                                                <option value="中">中</option>
                                                                <option value="低">低</option>
                                                            </select>
                                                        </td>
                                                        <td><p>外壁是否涂层:</p></td><td class="isOutsidePaint_top">
                                                            <select name="isOutsidePaint_top">
                                                                <option value="0">否</option>
                                                                <option value="1">是</option>
                                                            </select>
                                                        </td></tr>
                                                    <tr><td><p>外壁涂层日期:</p></td><td class="outsidePaintDate_top">
                                                        <input name="outsidePaintDate_top" type="datePicker" value="<?php echo ($content["nowDate"]); ?>" />
                                                    </td>
                                                        <td><p>外壁涂层质量:</p></td><td class="outsidePaintQuality_top">
                                                            <select name="outsidePaintQuality_top">
                                                                <option value="高">高</option>
                                                                <option value="中">中</option>
                                                                <option value="低">低</option>
                                                            </select>
                                                        </td>
                                                        <td></td><td ></td></tr>
                                                    </tbody>
                                                </table>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab2" class="tab">

                            </div>
                            </div>
                        </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
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
//        打开新增弹出窗口
        $("#addMaintenanceInfo").click(function(){
            $("#addMaintenanceRecord input:checkbox").removeAttr("checked");
            $("#myModalPreview").modal("show");
        });
//        选择维修部位
        $("#wallBorderBox").click(function(){
            if($("#wallBorderBox").is(":checked")){
                $("#addMaintenanceRecord .wallInput").show(300);
            }else{
                $("#addMaintenanceRecord .wallInput").hide(300);
            }
        });
        $("#bottomBorderBox").click(function(){
            if($("#bottomBorderBox").is(":checked")){
                $("#addMaintenanceRecord .bottomInput").show(300);
            }else{
                $("#addMaintenanceRecord .bottomInput").hide(300);
            }
        });
        $("#topBorderBox").click(function(){
            if($("#topBorderBox").is(":checked")){
                $("#addMaintenanceRecord .topInput").show(300);
            }else{
                $("#addMaintenanceRecord .topInput").hide(300);
            }
        })
//        提交维修记录信息
        $("#addMaintenanceRecord").ajaxForm({
            beforeSubmit:  function showRequest(){
               if(confirm("是否确认保存？")){}else{return false};
            },  // 提交前
            success: function showResponse(data){
                if(confirm(data.msg+",是否需要上传相关文件？")){
                     location.href="MaintenanceRecordEdit.html?pid="+data.pid+" && gpid="+data.gpid;
                }else{
                     location.reload();
                }
            }
        })
//       点击删除维修记录
        $('.riskDoc tr .delete').click(function(){
            if(confirm("是否删除该记录？")){
                var i=$(this).attr("data-row-id");
                $.post("<?php echo U('MaintenanceRecord/deleteMaintenanceRecord');?>",{id:i},function(data){
                    alert(data.msg);
                    location.reload();
                },"json");
            } else {
                return false;
            }
        });


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


//        查看维修记录管理详细
        $('.riskDoc tbody tr .read').click(function(){
            $("#myModal").modal("show");

        })
//        文件上传
        $("#uploadFile").ajaxForm({
            beforeSubmit:  function showRequest(){
                alert("你好");
            },  // 提交前
            success: function showResponse(data){
                alert(data.msg);
            }
        })

        $("#addWallMaintenanceTable").on("click",".delete",function(){
            $(this).parents("tr").remove();
        });
        $("#addWallMaintenance").click(function(){
            var layerCount=$("#addMaintenanceRecord input[name='id']").val();
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
                    var layerSelect = '<select name="layerNO[]" style="width: 100%">' + option + '</select>';
                    var isChange = '<select name="isChange[]" style="width: 100%"><option value="0">否</option><option value="1">是</option></select>';
                    var changeDate = "<input type='datePicker' name='changeDate[]' style='width: 100%' value='" + data.nowDate + "'/>";
                    var del = "<a class='delete'>删除</a>";
                    var tr = "<tr><td>" + layerSelect + "</td><td>" + isChange + "</td><td>" + changeDate + "</td><td>" + del + "</td></tr>";
                    $("#addWallMaintenanceTable").find("tbody").append(tr);
                    initDatePicker($("input[type='datePicker']"));
                }
            },"JSON")
        });
    });
</script>
</body>
</html>