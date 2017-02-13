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
    </style>
    <title></title>
</head>
<body>
<ol class="breadcrumb" style="background-color: transparent;float: left; height: 30px;width: 100%">
    <li class="active">运行管理</li>
    <li class="active">运行记录管理</li>
    <li><a href="<?php echo U('RunRecord/plantList');?>">储罐设备列表</a></li>
    <li class="active">运行记录列表</li>
</ol>
<div class="tankInfoDetail" style="width:95%;margin-left:auto;margin-right: auto">
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
                储罐运行记录
            </div>
            <div class="modal-body">
                <iframe src="RunRecordDetail.html" name="iframe" id="iframe" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" width="100%" height="700"></iframe>
            </div>
        </div>
    </div>
</div>
<div style="width: 95%;margin-left:auto;margin-right: auto">
    <button class="btn btn-primary Access" id="addRunBtn" data-access="<?php echo ($Access['ADD']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px">
        <span class="glyphicon glyphicon-plus" style="margin-right:5px "></span>
        新增运行记录</button>
    <!-- box容器 start -->
    <div class="box-container">
        <!-- box标题块 -->
        <div class="box-head box-head-list" >
            <h3>运行记录列表</h3>
        </div>
        <!-- box列表块 -->
        <div class="riskDoc" style="width: 100%;">
            <ol>
                <table id="runRecordList"  class="bordered">
                    <thead><th>记录日期</th><th>检查日期</th><th>记录人员</th><th>检查人员</th><th>审核人员</th><th>审核阶段</th><th>审核结果</th><th>报警状况</th><th>操作</th></thead>
                    <tbody>
                    <?php if(is_array($RunRecordList)): $i = 0; $__LIST__ = $RunRecordList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ri): $mod = ($i % 2 );++$i;?><tr data-alarm="<?php echo ($ri["isAlarm"]); ?>"><td><?php echo ($ri["record_dt"]); ?></td><td><?php echo ($ri["check_dt"]); ?></td><td><?php echo ($ri["recorder"]); ?></td><td><?php echo ($ri["checker"]); ?></td>
                            <td><?php echo ($ri["verifier"]); ?></td>
                            <td><?php echo ($ri["verifyStage"]); ?></td>
                            <td><?php switch($ri["verifyResult"]): case "0": ?>未审核<?php break;?>
                                    <?php case "1": ?>审核通过<?php break;?>
                                    <?php case "2": ?>审核不通过<?php break;?>
                                    <?php default: ?>未审核<?php endswitch;?>
                            </td>
                            <td>
                                <?php switch($ri["isAlarm"]): case "0": ?>无报警<?php break;?>
                                <?php case "1": ?>有报警<?php break;?>
                                <?php default: ?>无报警<?php endswitch;?>
                            </td>
                            <td>
                                <a class="read Access" data-access="<?php echo ($Access['DETAIL']['id']); ?>" href="RunRecordDetail.html?pid=<?php echo ($ri["id"]); ?> && gpid=<?php echo ($plant[0]["id"]); ?>" target="iframe" style="margin-right: 5px">查看</a>
                                <a class="edit Access" data-access="<?php echo ($Access['EDIT']['id']); ?>" href="RunRecordEdit.html?pid=<?php echo ($ri["id"]); ?> && gpid=<?php echo ($plant[0]["id"]); ?>" target="_self" style="margin-right: 5px" >编辑</a>
                                <a class="delete Access" data-access="<?php echo ($Access['DELETE']['id']); ?>" data-row-id="<?php echo ($ri["id"]); ?>">删除</a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </ol>
        </div>
    </div>
    <!-- box容器 end -->
</div>

<div class="modal fade" id="myModalPreview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                新增储罐运行记录
            </div>
            <div class="modal-body">
                <form method="post" id="addRunRecord" action="<?php echo U('RunRecord/addRunRecord');?>">
                    <button type="submit" name="addBtn" class="btn btn-primary Access" data-access="<?php echo ($Access['ADD']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px">
                        <span class="glyphicon glyphicon-ok" style="margin-right:5px "></span>保存
                    </button>
                    <input name="pid" value="<?php echo ($plant[0]['id']); ?>" style="display: none">
                    <table class="borderedDetail" style="padding: 0px">
                        <tbody>
                        <tr>
                            <td>设备位号：</td><td><?php echo ($plant[0]['plantNO']); ?></td>
                            <td>油罐类型：</td><td class="OilTankType"><?php echo ($plant[0]['OilTankType']); ?></td>
                            <td>检查人员：</td><td>
                                <select  name="checker">
                                    <?php if(is_array($User)): $i = 0; $__LIST__ = $User;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value=<?php echo ($vo["realname"]); ?>><?php echo ($vo["realname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td></tr>
                        <tr><td>记录人员：</td><td>
                            <input name="recorder" type="hidden" value="<?php echo ($_SESSION['realname']); ?>" readonly="readonly">
                                <select  name="recorder" disabled="disabled">
                                    <option><?php echo ($_SESSION['realname']); ?></option>
                                    <!--<?php if(is_array($User)): $i = 0; $__LIST__ = $User;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->
                                            <!--<option value=<?php echo ($vo["realname"]); ?>><?php echo ($vo["realname"]); ?></option>-->
                                    <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                                </select>
                            </td>

                        <td>检查日期：</td><td><input type="datePicker" name="check_dt" value="<?php echo ($content["nowDate"]); ?>"/></td>
                            <td>记录日期：</td><td><input type="datePicker" name="record_dt" value="<?php echo ($content["nowDate"]); ?>"/></td>
                        </tr>
                        <tr><td>备&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp注：</td><td colspan="6"><textarea name="Remark" style="width: 100%"></textarea></td>
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
                                <a href="" title="tab2">相关文件</a>
                            </li>
                        </ul>
                        <div id="content">
                            <div id="tab1" class="tab">
                                <div id="coveredFloatingInput" style="display: none">
                                    <table class="bordered">
                                        <thead><th>位置</th><th>明细</th><th>检查情况</th><th>备注</th></thead>
                                        <tbody>
                                        <?php if(is_array($RunRecordInput53)): $i = 0; $__LIST__ = $RunRecordInput53;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$RRI): $mod = ($i % 2 );++$i;?><tr>
                                                <td>罐体<input name="part[]" value="罐体" type="hidden" disabled="disabled"></td>
                                                <td><?php echo ($RRI["key"]); ?><input name="partDetail[]" value="<?php echo ($RRI["key"]); ?>" type="hidden" disabled="disabled"></td>
                                                <td>
                                                    <select name="checkResult[]" disabled="disabled">
                                                        <option value="1">√</option>
                                                        <option value="0">×</option>
                                                        <option value="2">/</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <textarea name="remark[]" placeholder="<?php echo ($RRI["remark"]); ?>" disabled="disabled"></textarea>
                                                </td>
                                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        <?php if(is_array($RunRecordInput54)): $i = 0; $__LIST__ = $RunRecordInput54;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$RRI): $mod = ($i % 2 );++$i;?><tr>
                                                <td>罐顶部分<input name="part[]" value="罐顶部分" type="hidden" disabled="disabled"></td>
                                                <td><?php echo ($RRI["key"]); ?><input name="partDetail[]" value="<?php echo ($RRI["key"]); ?>" type="hidden" disabled="disabled"></td>
                                                <td>
                                                <select name="checkResult[]" disabled="disabled">
                                                    <option value="1">√</option>
                                                    <option value="0">×</option>
                                                    <option value="2">/</option>
                                                </select>
                                            </td><td><textarea name="remark[]" placeholder="<?php echo ($RRI["remark"]); ?>" disabled="disabled"></textarea></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        <?php if(is_array($RunRecordInput55)): $i = 0; $__LIST__ = $RunRecordInput55;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$RRI): $mod = ($i % 2 );++$i;?><tr><td>管线、集合管<input name="part[]" value="管线、集合管" type="hidden" disabled="disabled"></td>
                                                <td><?php echo ($RRI["key"]); ?><input name="partDetail[]" value="<?php echo ($RRI["key"]); ?>" type="hidden" disabled="disabled"></td>
                                                <td>
                                                <select name="checkResult[]" disabled="disabled">
                                                    <option value="1">√</option>
                                                    <option value="0">×</option>
                                                    <option value="2">/</option>
                                                </select>
                                            </td><td><textarea name="remark[]" placeholder="<?php echo ($RRI["remark"]); ?>" disabled="disabled"></textarea></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        <?php if(is_array($RunRecordInput56)): $i = 0; $__LIST__ = $RunRecordInput56;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$RRI): $mod = ($i % 2 );++$i;?><tr><td>搅拌机<input name="part[]" value="搅拌机" type="hidden" disabled="disabled"></td>
                                                <td><?php echo ($RRI["key"]); ?><input name="partDetail[]" value="<?php echo ($RRI["key"]); ?>" type="hidden" disabled="disabled"></td><td>
                                                <select name="checkResult[]" disabled="disabled">
                                                    <option value="1">√</option>
                                                    <option value="0">×</option>
                                                    <option value="2">/</option>
                                                </select>
                                            </td><td><textarea name="remark[]" placeholder="<?php echo ($RRI["remark"]); ?>" disabled="disabled"></textarea></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        <?php if(is_array($RunRecordInput57)): $i = 0; $__LIST__ = $RunRecordInput57;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$RRI): $mod = ($i % 2 );++$i;?><tr><td>静电接地<input name="part[]" value="静电接地" type="hidden" disabled="disabled"></td>
                                                <td><?php echo ($RRI["key"]); ?><input name="partDetail[]" value="<?php echo ($RRI["key"]); ?>" type="hidden" disabled="disabled"></td><td>
                                                <select name="checkResult[]" disabled="disabled">
                                                    <option value="1">√</option>
                                                    <option value="0">×</option>
                                                    <option value="2">/</option>
                                                </select>
                                            </td><td><textarea name="remark[]" placeholder="<?php echo ($RRI["remark"]); ?>" disabled="disabled"></textarea></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="VaultInput" style="display: none">
                                    <table class="bordered">
                                        <thead><th>位置</th><th>明细</th><th>检查情况</th><th>备注</th></thead>
                                        <tbody>
                                        <?php if(is_array($RunRecordInput58)): $i = 0; $__LIST__ = $RunRecordInput58;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$RRI): $mod = ($i % 2 );++$i;?><tr><td>罐体<input name="part[]" value="罐体" type="hidden" disabled="disabled"></td>
                                                <td><?php echo ($RRI["key"]); ?><input name="partDetail[]" value="<?php echo ($RRI["key"]); ?>" type="hidden" disabled="disabled"></td><td>
                                                <select name="checkResult[]" disabled="disabled">
                                                    <option value="1">√</option>
                                                    <option value="0">×</option>
                                                    <option value="2">/</option>
                                                </select>
                                            </td><td><textarea name="remark[]" placeholder="<?php echo ($RRI["remark"]); ?>" disabled="disabled"></textarea></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        <?php if(is_array($RunRecordInput59)): $i = 0; $__LIST__ = $RunRecordInput59;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$RRI): $mod = ($i % 2 );++$i;?><tr><td>罐顶部分<input name="part[]" value="罐顶部分" type="hidden" disabled="disabled"></td>
                                                <td><?php echo ($RRI["key"]); ?><input name="partDetail[]" value="<?php echo ($RRI["key"]); ?>" type="hidden" disabled="disabled"></td><td>
                                                <select name="checkResult[]" disabled="disabled">
                                                    <option value="1">√</option>
                                                    <option value="0">×</option>
                                                    <option value="2">/</option>
                                                </select>
                                            </td><td><textarea name="remark[]" placeholder="<?php echo ($RRI["remark"]); ?>" disabled="disabled"></textarea></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        <?php if(is_array($RunRecordInput61)): $i = 0; $__LIST__ = $RunRecordInput61;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$RRI): $mod = ($i % 2 );++$i;?><tr><td>管线、集合管<input name="part[]" value="管线、集合管" type="hidden" disabled="disabled"></td>
                                                <td><?php echo ($RRI["key"]); ?><input name="partDetail[]" value="<?php echo ($RRI["key"]); ?>" type="hidden" disabled="disabled"></td><td>
                                                <select name="checkResult[]" disabled="disabled">
                                                    <option value="1">√</option>
                                                    <option value="0">×</option>
                                                    <option value="2">/</option>
                                                </select>
                                            </td><td><textarea name="remark[]" placeholder="<?php echo ($RRI["remark"]); ?>" disabled="disabled"></textarea></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        <?php if(is_array($RunRecordInput62)): $i = 0; $__LIST__ = $RunRecordInput62;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$RRI): $mod = ($i % 2 );++$i;?><tr><td>搅拌机<input name="part[]" value="搅拌机" type="hidden" disabled="disabled"></td>
                                                <td><?php echo ($RRI["key"]); ?><input name="partDetail[]" value="<?php echo ($RRI["key"]); ?>" type="hidden" disabled="disabled"></td><td>
                                                <select name="checkResult[]" disabled="disabled">
                                                    <option value="1">√</option>
                                                    <option value="0">×</option>
                                                    <option value="2">/</option>
                                                </select>
                                            </td><td><textarea name="remark[]" placeholder="<?php echo ($RRI["remark"]); ?>" disabled="disabled"></textarea></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        <?php if(is_array($RunRecordInput63)): $i = 0; $__LIST__ = $RunRecordInput63;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$RRI): $mod = ($i % 2 );++$i;?><tr><td>静电接地<input name="part[]" value="静电接地" type="hidden" disabled="disabled"></td>
                                                <td><?php echo ($RRI["key"]); ?><input name="partDetail[]" value="<?php echo ($RRI["key"]); ?>" type="hidden" disabled="disabled"></td><td>
                                                <select name="checkResult[]" disabled="disabled">
                                                    <option value="1">√</option>
                                                    <option value="0">×</option>
                                                    <option value="2">/</option>
                                                </select>
                                            </td><td><textarea name="remark[]" placeholder="<?php echo ($RRI["remark"]); ?>" disabled="disabled"></textarea></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="externalFloatingInput" style="display: none">
                                    <table class="bordered">
                                        <thead><th>位置</th><th>明细</th><th>检查情况</th><th>备注</th></thead>
                                        <tbody>
                                        <?php if(is_array($RunRecordInput64)): $i = 0; $__LIST__ = $RunRecordInput64;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$RRI): $mod = ($i % 2 );++$i;?><tr><td>罐体<input name="part[]" value="罐体" type="hidden" disabled="disabled"></td>
                                                <td><?php echo ($RRI["key"]); ?><input name="partDetail[]" value="<?php echo ($RRI["key"]); ?>" type="hidden" disabled="disabled"></td><td>
                                                <select name="checkResult[]" disabled="disabled">
                                                    <option value="1">√</option>
                                                    <option value="0">×</option>
                                                    <option value="2">/</option>
                                                </select>
                                            </td>
                                                <td>
                                                    <textarea name="remark[]" placeholder="<?php echo ($RRI["remark"]); ?>" disabled="disabled"></textarea>
                                                </td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        <?php if(is_array($RunRecordInput65)): $i = 0; $__LIST__ = $RunRecordInput65;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$RRI): $mod = ($i % 2 );++$i;?><tr><td>罐顶部分<input name="part[]" value="罐顶部分" type="hidden" disabled="disabled"></td>
                                                <td><?php echo ($RRI["key"]); ?><input name="partDetail[]" value="<?php echo ($RRI["key"]); ?>" type="hidden" disabled="disabled"></td><td>
                                                <select name="checkResult[]" disabled="disabled">
                                                    <option value="1">√</option>
                                                    <option value="0">×</option>
                                                    <option value="2">/</option>
                                                </select>
                                            </td><td><textarea name="remark[]" placeholder="<?php echo ($RRI["remark"]); ?>" disabled="disabled"></textarea></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        <?php if(is_array($RunRecordInput66)): $i = 0; $__LIST__ = $RunRecordInput66;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$RRI): $mod = ($i % 2 );++$i;?><tr><td>管线、集合管<input name="part[]" value="管线、集合管" type="hidden" disabled="disabled"></td>
                                                <td><?php echo ($RRI["key"]); ?><input name="partDetail[]" value="<?php echo ($RRI["key"]); ?>" type="hidden" disabled="disabled"></td><td>
                                                <select name="checkResult[]" disabled="disabled">
                                                    <option value="1">√</option>
                                                    <option value="0">×</option>
                                                    <option value="2">/</option>
                                                </select>
                                            </td><td><textarea name="remark[]" placeholder="<?php echo ($RRI["remark"]); ?>" disabled="disabled"></textarea></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        <?php if(is_array($RunRecordInput67)): $i = 0; $__LIST__ = $RunRecordInput67;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$RRI): $mod = ($i % 2 );++$i;?><tr><td>浮盘<input name="part[]" value="浮盘" type="hidden" disabled="disabled"></td>
                                                <td><?php echo ($RRI["key"]); ?><input name="partDetail[]" value="<?php echo ($RRI["key"]); ?>" type="hidden" disabled="disabled"></td><td>
                                                <select name="checkResult[]" disabled="disabled">
                                                    <option value="1">√</option>
                                                    <option value="0">×</option>
                                                    <option value="2">/</option>
                                                </select>
                                            </td><td><textarea name="remark[]" placeholder="<?php echo ($RRI["remark"]); ?>" disabled="disabled"></textarea></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        <?php if(is_array($RunRecordInput68)): $i = 0; $__LIST__ = $RunRecordInput68;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$RRI): $mod = ($i % 2 );++$i;?><tr><td>气体检测<input name="part[]" value="气体检测" type="hidden" disabled="disabled"></td>
                                                <td><?php echo ($RRI["key"]); ?><input name="partDetail[]" value="<?php echo ($RRI["key"]); ?>" type="hidden" disabled="disabled"></td><td>
                                                <select name="checkResult[]" disabled="disabled">
                                                    <option value="1">√</option>
                                                    <option value="0">×</option>
                                                    <option value="2">/</option>
                                                </select>
                                            </td><td><textarea name="remark[]" placeholder="<?php echo ($RRI["remark"]); ?>" disabled="disabled"></textarea></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        <?php if(is_array($RunRecordInput69)): $i = 0; $__LIST__ = $RunRecordInput69;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$RRI): $mod = ($i % 2 );++$i;?><tr><td>搅拌机<input name="part[]" value="搅拌机" type="hidden" disabled="disabled"></td>
                                                <td><?php echo ($RRI["key"]); ?><input name="partDetail[]" value="<?php echo ($RRI["key"]); ?>" type="hidden" disabled="disabled"></td><td>
                                                <select name="checkResult[]" disabled="disabled">
                                                    <option value="1">√</option>
                                                    <option value="0">×</option>
                                                    <option value="2">/</option>
                                                </select>
                                            </td><td><textarea name="remark[]" placeholder="<?php echo ($RRI["remark"]); ?>" disabled="disabled"></textarea></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        <?php if(is_array($RunRecordInput70)): $i = 0; $__LIST__ = $RunRecordInput70;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$RRI): $mod = ($i % 2 );++$i;?><tr><td>静电接地<input name="part[]" value="静电接地" type="hidden" disabled="disabled"></td>
                                                <td><?php echo ($RRI["key"]); ?><input name="partDetail[]" value="<?php echo ($RRI["key"]); ?>" type="hidden" disabled="disabled"></td><td>
                                                <select name="checkResult[]" disabled="disabled">
                                                    <option value="1">√</option>
                                                    <option value="0">×</option>
                                                    <option value="2">/</option>
                                                </select>
                                            </td><td><textarea name="remark[]" placeholder="<?php echo ($RRI["remark"]); ?>" disabled="disabled"></textarea></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        <?php if(is_array($RunRecordInput71)): $i = 0; $__LIST__ = $RunRecordInput71;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$RRI): $mod = ($i % 2 );++$i;?><tr><td>其他<input name="part[]" value="其他" type="hidden" disabled="disabled"></td>
                                                <td><?php echo ($RRI["key"]); ?><input name="partDetail[]" value="<?php echo ($RRI["key"]); ?>" type="hidden" disabled="disabled"></td><td>
                                                <select name="checkResult[]" disabled="disabled">
                                                    <option value="1">√</option>
                                                    <option value="0">×</option>
                                                    <option value="2">/</option>
                                                </select>
                                            </td><td><textarea name="remark[]" placeholder="<?php echo ($RRI["remark"]); ?>" disabled="disabled"></textarea></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="tab2" class="tab">
                                <div class="alert alert-warning">
                                    提示！请在编辑页面添加相关文件！！！</br>
                                    操作步骤：运行记录管理->储罐设备列表->运行记录列表，点击“编辑”进行运行记录编辑。
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
        $("#runRecordList tbody tr").each(function(){
            if($(this).attr("data-alarm")==1){
                $(this).css('color','red');
//                alert($(this).attr("data-alarm"));
            }
        })
//        根据罐型选择对应的表单
        var oilType=$("#addRunRecord .OilTankType").text();
        switch (oilType){
            case ("内浮顶") :
                $("#coveredFloatingInput").show();
                $("#coveredFloatingInput input").attr("disabled",false);
                $("#coveredFloatingInput select").attr("disabled",false);
                $("#coveredFloatingInput textarea").attr("disabled",false);
                break;
            case ("拱顶罐") :
                $("#VaultInput").show();
                $("#VaultInput input").attr("disabled",false);
                $("#VaultInput select").attr("disabled",false);
                $("#VaultInput textarea").attr("disabled",false);
                break;
            case ("外浮顶") :
                $("#externalFloatingInput").show();
                $("#externalFloatingInput input").attr("disabled",false);
                $("#externalFloatingInput select").attr("disabled",false);
                $("#externalFloatingInput textarea").attr("disabled",false);
                break;
            default :
                $("#coveredFloatingInput").show();
                $("#coveredFloatingInput input").attr("disabled",false);
                $("#coveredFloatingInput select").attr("disabled",false);
                $("#coveredFloatingInput textarea").attr("disabled",false);
                break;
        }
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
//        打开新增弹出窗口
        $("#addRunBtn").click(function(){
            $("#myModalPreview").modal("show");
        });
//        提交运行记录管理
        $("#addRunRecord").ajaxForm({
            beforeSubmit:  function showRequest(){
              if(confirm("是否进行新增？")){}else{return false;}
            },  // 提交前
            success: function showResponse(data){
                if(confirm(data.msg+",是否需要上传文件？")){
                    location.href="RunRecordEdit.html?pid="+data.pid+" && gpid="+data.gpid;
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
            if(confirm("是否进行删除？")){
                var i=$(this).attr("data-row-id");
                $.post("<?php echo U('RunRecord/deleteRunRecord');?>",{id:i},function(data){
                    alert(data.msg);
                    location.reload();
                },"json");
            }else{
                return false;
            }
        });
//        文件上传
        $("#uploadFile").ajaxForm({
            beforeSubmit:  function showRequest(){

            },  // 提交前
            success: function showResponse(data){
                alert(data.msg);
            }
        })

    });
</script>
</body>
</html>