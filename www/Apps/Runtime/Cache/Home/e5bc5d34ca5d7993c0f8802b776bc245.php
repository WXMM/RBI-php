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
        table input,select{
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
    </style>
    <title></title>
</head>
<body>
<ol class="breadcrumb" style="background-color: transparent;float: left; height: 30px;width: 100%">
    <li class="active">运行管理</li>
    <li class="active">日常维护管理</li>
    <li><a href="<?php echo U('DailyManagement/PlantList');?>">储罐设备列表</a></li>
    <li><a href="DailyManagementRecordList.html?id=<?php echo ($plant[0]['id']); ?>">日常维护记录列表</a></li>
    <li class="active">日常维护记录编辑</li>
</ol>

<div class="plantInfo" style="width: 98%;margin-left: auto;margin-right: auto;margin-bottom: 20px">
        <form method="post" id="editDailyManagement" action="<?php echo U('DailyManagement/editDailyManagementRecord');?>">
            <input name="id" type="hidden" value="<?php echo ($PlantDailyMaintainanceRecord["id"]); ?>" />
            <input name="verifyResult" type="hidden" value="<?php echo ($PlantDailyMaintainanceRecord["verifyResult"]); ?>" />
            <button type="submit" name="addBtn" class="btn btn-primary Access" data-access="<?php echo ($Access['SAVE']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-right: 10px">
                <span class="glyphicon glyphicon-ok" style="margin-right:5px "></span>保存
            </button>
            <table class="borderedDetail" style="padding: 0px">
                <tbody>
                <tr><td>设备位号：</td><td><?php echo ($plant[0]['plantNO']); ?></td>
                    <td>检查人员：</td><td>
                        <select  name="maintainanceUser" data-option="<?php echo ($PlantDailyMaintainanceRecord["maintainanceUser"]); ?>">
                            <?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '38'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                    <td>检查区域：</td><td>
                        <select  name="maintainanceArea" data-option="<?php echo ($PlantDailyMaintainanceRecord["maintainanceArea"]); ?>">
                            <?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '52'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>检查类型：</td><td id="maintainanceType" data-type="<?php echo ($PlantDailyMaintainanceRecord["maintainanceType"]); ?>">
                    <?php switch($PlantDailyMaintainanceRecord["maintainanceType"]): case "day": ?>日检查<?php break;?>
                        <?php case "month": ?>月检查<?php break;?>
                        <?php case "year": ?>年检查<?php break;?>
                        <?php case "normal": ?>合规性检查<?php break;?>
                        <?php default: ?>日检查<?php endswitch;?>
                </td>
                    <td>检查日期：</td><td><input type="datePicker" name="maintainanceDate" value="<?php echo ($PlantDailyMaintainanceRecord["maintainanceDate"]); ?>"/></td>
                    <td>下次检查日期：</td><td><input type="datePicker" name="maintainanceNextDate" value="<?php echo ($PlantDailyMaintainanceRecord["maintainanceNextDate"]); ?>"/></td>

                </tr>
                <tr><td>备&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp注：</td><td colspan="6"><textarea type="text" name="remark" style="width: 100%"><?php echo ($PlantDailyMaintainanceRecord["remark"]); ?></textarea></td>
                </tr>
                </tbody>
            </table>
        </form>
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
                    <form class="bs-example bs-example-form" id="editDailyManagementCheckItemForm" role="form" action="<?php echo U('DailyManagement/editDailyManagementCheckItem');?>" method="post">
                        <input type="hidden" name="id"  class="id" value="">
                        <input type="hidden" name="pid"  class="pid" value="<?php echo ($PlantDailyMaintainanceRecord["id"]); ?>">
                        <input type="hidden" name="gpid"  class="gpid" value="<?php echo ($plant[0]['id']); ?>">
                        <input name="verifyResult" type="hidden" value="<?php echo ($PlantDailyMaintainanceRecord["verifyResult"]); ?>" />
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-addon">检查项目</span>
                                <textarea type="text" name="checkItem" class="form-control checkItem" placeholder="检查项目"></textarea>
                                <!--<input type="text" name="checkItem" class="form-control checkItem" placeholder="检查项目">-->
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
                                <textarea type="text" name="checkManage" class="form-control checkManage" placeholder="备注"></textarea>
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
                </div>
            </div>
        </div>
    </div>

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
            <div id="tab1" class="tab">
                <div id="dayCheck" style="display: none">
                    <table class="bordered">
                        <thead><th>检查项目</th><th>检查结果</th><th>备注</th><th>操作</th></thead>
                        <tbody>
                        <?php if(is_array($PlantDailyMaintainanceDetail)): $i = 0; $__LIST__ = $PlantDailyMaintainanceDetail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["checkType"] == 'day') AND ($vo["checkTypeDetail"] == '1')): ?><tr data-row-id="<?php echo ($vo["id"]); ?>" data-alarm="<?php echo ($vo["checkResult"]); ?>">
                                    <td style="width: 50%" class="checkItem"><?php echo ($vo["checkItem"]); ?></td>
                                    <td class="checkResult">
                                        <?php switch($vo["checkResult"]): case "1": ?>√<?php break;?>
                                            <?php case "0": ?>×<?php break;?>
                                            <?php case "2": ?>/<?php break; endswitch;?>
                                    </td>
                                    <td class="checkManage"><?php echo ($vo["checkManage"]); ?></td>
                                    <td><a class="edit Access" data-access="<?php echo ($Access['EDIT']['id']); ?>">编辑</a></td>
                                </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
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
                                    <thead><th>检查项目</th><th>检查结果</th><th>备注</th><th>操作</th></thead>
                                    <tbody>
                                    <?php if(is_array($PlantDailyMaintainanceDetail)): $i = 0; $__LIST__ = $PlantDailyMaintainanceDetail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["checkType"] == 'month') AND ($vo["checkTypeDetail"] == '1')): ?><tr data-row-id="<?php echo ($vo["id"]); ?>" data-alarm="<?php echo ($vo["checkResult"]); ?>">
                                                <td style="width: 50%" class="checkItem"><?php echo ($vo["checkItem"]); ?></td>
                                                <td class="checkResult">
                                                    <?php switch($vo["checkResult"]): case "1": ?>√<?php break;?>
                                                        <?php case "0": ?>×<?php break;?>
                                                        <?php case "2": ?>/<?php break; endswitch;?>
                                                </td>
                                                <td class="checkManage"><?php echo ($vo["checkManage"]); ?></td>
                                                <td><a class="edit Access" data-access="<?php echo ($Access['EDIT']['id']); ?>">编辑</a></td>
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
                                        <thead><th>检查项目</th><th>检查结果</th><th>备注</th><th>操作</th></thead>
                                        <tbody>
                                        <?php if(is_array($PlantDailyMaintainanceDetail)): $i = 0; $__LIST__ = $PlantDailyMaintainanceDetail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["checkType"] == 'month') AND ($vo["checkTypeDetail"] == '2')): ?><tr data-row-id="<?php echo ($vo["id"]); ?>" data-alarm="<?php echo ($vo["checkResult"]); ?>">
                                                    <td style="width: 50%" class="checkItem"><?php echo ($vo["checkItem"]); ?></td>
                                                    <td class="checkResult">
                                                        <?php switch($vo["checkResult"]): case "1": ?>√<?php break;?>
                                                            <?php case "0": ?>×<?php break;?>
                                                            <?php case "2": ?>/<?php break; endswitch;?>
                                                    </td>
                                                    <td class="checkManage"><?php echo ($vo["checkManage"]); ?></td>
                                                    <td><a class="edit Access" data-access="<?php echo ($Access['EDIT']['id']); ?>">编辑</a></td>
                                                </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
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
                                        <thead><th>检查项目</th><th>检查结果</th><th>备注</th><th>操作</th></thead>
                                        <tbody>
                                        <?php if(is_array($PlantDailyMaintainanceDetail)): $i = 0; $__LIST__ = $PlantDailyMaintainanceDetail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["checkType"] == 'month') AND ($vo["checkTypeDetail"] == '3')): ?><tr data-row-id="<?php echo ($vo["id"]); ?>" data-alarm="<?php echo ($vo["checkResult"]); ?>">
                                                    <td style="width: 50%" class="checkItem"><?php echo ($vo["checkItem"]); ?></td>
                                                    <td class="checkResult">
                                                        <?php switch($vo["checkResult"]): case "1": ?>√<?php break;?>
                                                            <?php case "0": ?>×<?php break;?>
                                                            <?php case "2": ?>/<?php break; endswitch;?>
                                                    </td>
                                                    <td class="checkManage"><?php echo ($vo["checkManage"]); ?></td>
                                                    <td><a class="edit Access" data-access="<?php echo ($Access['EDIT']['id']); ?>">编辑</a></td>
                                                </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody></table>

                                </ol>
                            </div>
                        </div>
                    </div><div class="topInput">
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
                                    <thead><th>检查项目</th><th>检查结果</th><th>备注</th><th>操作</th></thead>
                                    <tbody>
                                    <?php if(is_array($PlantDailyMaintainanceDetail)): $i = 0; $__LIST__ = $PlantDailyMaintainanceDetail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["checkType"] == 'month') AND ($vo["checkTypeDetail"] == '4')): ?><tr data-row-id="<?php echo ($vo["id"]); ?>" data-alarm="<?php echo ($vo["checkResult"]); ?>">
                                                <td style="width: 50%" class="checkItem"><?php echo ($vo["checkItem"]); ?></td>
                                                <td class="checkResult">
                                                    <?php switch($vo["checkResult"]): case "1": ?>√<?php break;?>
                                                        <?php case "0": ?>×<?php break;?>
                                                        <?php case "2": ?>/<?php break; endswitch;?>
                                                </td>
                                                <td class="checkManage"><?php echo ($vo["checkManage"]); ?></td>
                                                <td><a class="edit Access" data-access="<?php echo ($Access['EDIT']['id']); ?>">编辑</a></td>
                                            </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
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
                                    <thead><th>检查项目</th><th>检查结果</th><th>备注</th><th>操作</th></thead>
                                    <tbody>
                                    <?php if(is_array($PlantDailyMaintainanceDetail)): $i = 0; $__LIST__ = $PlantDailyMaintainanceDetail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["checkType"] == 'year') AND ($vo["checkTypeDetail"] == '1')): ?><tr data-row-id="<?php echo ($vo["id"]); ?>" data-alarm="<?php echo ($vo["checkResult"]); ?>">
                                                <td style="width: 50%" class="checkItem"><?php echo ($vo["checkItem"]); ?></td>
                                                <td class="checkResult">
                                                    <?php switch($vo["checkResult"]): case "1": ?>√<?php break;?>
                                                        <?php case "0": ?>×<?php break;?>
                                                        <?php case "2": ?>/<?php break; endswitch;?>
                                                </td>
                                                <td class="checkManage"><?php echo ($vo["checkManage"]); ?></td>
                                                <td><a class="edit Access" data-access="<?php echo ($Access['EDIT']['id']); ?>">编辑</a></td>
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
                                        <thead><th>检查项目</th><th>检查结果</th><th>备注</th><th>操作</th></thead>
                                        <tbody>
                                        <?php if(is_array($PlantDailyMaintainanceDetail)): $i = 0; $__LIST__ = $PlantDailyMaintainanceDetail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["checkType"] == 'year') AND ($vo["checkTypeDetail"] == '2')): ?><tr data-row-id="<?php echo ($vo["id"]); ?>" data-alarm="<?php echo ($vo["checkResult"]); ?>">
                                                    <td style="width: 50%" class="checkItem"><?php echo ($vo["checkItem"]); ?></td>
                                                    <td class="checkResult">
                                                        <?php switch($vo["checkResult"]): case "1": ?>√<?php break;?>
                                                            <?php case "0": ?>×<?php break;?>
                                                            <?php case "2": ?>/<?php break; endswitch;?>
                                                    </td>
                                                    <td class="checkManage"><?php echo ($vo["checkManage"]); ?></td>
                                                    <td><a class="edit Access" data-access="<?php echo ($Access['EDIT']['id']); ?>">编辑</a></td>
                                                </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
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
                                        <thead><th>检查项目</th><th>检查结果</th><th>备注</th><th>操作</th></thead>
                                        <tbody>
                                        <?php if(is_array($PlantDailyMaintainanceDetail)): $i = 0; $__LIST__ = $PlantDailyMaintainanceDetail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["checkType"] == 'year') AND ($vo["checkTypeDetail"] == '3')): ?><tr data-row-id="<?php echo ($vo["id"]); ?>" data-alarm="<?php echo ($vo["checkResult"]); ?>">
                                                    <td style="width: 50%" class="checkItem"><?php echo ($vo["checkItem"]); ?></td>
                                                    <td class="checkResult">
                                                        <?php switch($vo["checkResult"]): case "1": ?>√<?php break;?>
                                                            <?php case "0": ?>×<?php break;?>
                                                            <?php case "2": ?>/<?php break; endswitch;?>
                                                    </td>
                                                    <td class="checkManage"><?php echo ($vo["checkManage"]); ?></td>
                                                    <td><a class="edit Access" data-access="<?php echo ($Access['EDIT']['id']); ?>">编辑</a></td>
                                                </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
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
                                    <thead><th>检查项目</th><th>检查结果</th><th>备注</th><th>操作</th></thead>
                                    <tbody>
                                    <?php if(is_array($PlantDailyMaintainanceDetail)): $i = 0; $__LIST__ = $PlantDailyMaintainanceDetail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["checkType"] == 'normal') AND ($vo["checkTypeDetail"] == '1')): ?><tr data-row-id="<?php echo ($vo["id"]); ?>" data-alarm="<?php echo ($vo["checkResult"]); ?>">
                                                <td style="width: 50%" class="checkItem"><?php echo ($vo["checkItem"]); ?></td>
                                                <td class="checkResult">
                                                    <?php switch($vo["checkResult"]): case "1": ?>√<?php break;?>
                                                        <?php case "0": ?>×<?php break;?>
                                                        <?php case "2": ?>/<?php break; endswitch;?>
                                                </td>
                                                <td class="checkManage"><?php echo ($vo["checkManage"]); ?></td>
                                                <td><a class="edit Access" data-access="<?php echo ($Access['EDIT']['id']); ?>">编辑</a></td>
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
                                        <thead><th>检查项目</th><th>检查结果</th><th>备注</th><th>操作</th></thead>
                                        <tbody>
                                        <?php if(is_array($PlantDailyMaintainanceDetail)): $i = 0; $__LIST__ = $PlantDailyMaintainanceDetail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["checkType"] == 'normal') AND ($vo["checkTypeDetail"] == '2')): ?><tr data-row-id="<?php echo ($vo["id"]); ?>" data-alarm="<?php echo ($vo["checkResult"]); ?>">
                                                    <td style="width: 50%" class="checkItem"><?php echo ($vo["checkItem"]); ?></td>
                                                    <td class="checkResult">
                                                        <?php switch($vo["checkResult"]): case "1": ?>√<?php break;?>
                                                            <?php case "0": ?>×<?php break;?>
                                                            <?php case "2": ?>/<?php break; endswitch;?>
                                                    </td>
                                                    <td class="checkManage"><?php echo ($vo["checkManage"]); ?></td>
                                                    <td><a class="edit Access" data-access="<?php echo ($Access['EDIT']['id']); ?>">编辑</a></td>
                                                </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
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
                                        <thead><th>检查项目</th><th>检查结果</th><th>备注</th><th>操作</th></thead>
                                        <tbody>
                                        <?php if(is_array($PlantDailyMaintainanceDetail)): $i = 0; $__LIST__ = $PlantDailyMaintainanceDetail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["checkType"] == 'normal') AND ($vo["checkTypeDetail"] == '3')): ?><tr data-row-id="<?php echo ($vo["id"]); ?>" data-alarm="<?php echo ($vo["checkResult"]); ?>">
                                                    <td style="width: 50%" class="checkItem"><?php echo ($vo["checkItem"]); ?></td>
                                                    <td class="checkResult">
                                                        <?php switch($vo["checkResult"]): case "1": ?>√<?php break;?>
                                                            <?php case "0": ?>×<?php break;?>
                                                            <?php case "2": ?>/<?php break; endswitch;?>
                                                    </td>
                                                    <td class="checkManage"><?php echo ($vo["checkManage"]); ?></td>
                                                    <td><a class="edit Access" data-access="<?php echo ($Access['EDIT']['id']); ?>">编辑</a></td>
                                                </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                    </table>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div id="tab2" class="tab">
                <form action="<?php echo U('Public/upload');?>" enctype="multipart/form-data" method="post" id="upload">
                    <input type="hidden" name="id" value="<?php echo ($PlantDailyMaintainanceRecord['id']); ?>" >
                    <input type="hidden" name="tableId" value="dailyRecord">

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
                                <a class="download Access" href="downloadUpload.html?id=<?php echo ($vo["id"]); ?>" data-access="<?php echo ($Access['DOWNLOAD']['id']); ?>">下载</a>
                                <a class="delete Access" data-access="<?php echo ($Access['DELETE']['id']); ?>">删除</a>
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
</script>
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
            if($(this).attr("data-alarm")==0){
                $(this).css('color','red');
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

        $("#editDailyManagement").ajaxForm({
            beforeSubmit:  function showRequest(){
               if(confirm("确认修改？")){}else{
                   return false;
               }
            },  // 提交前
            success: function showResponse(data){
                alert(data.msg);
                location.reload();
            }
        })

        $("#tab1 table tbody tr .edit").click(function(){
            var checkItem=$(this).parents("tr").find(".checkItem").text();
            var checkResult=$(this).parents("tr").find(".checkResult").text();
            var checkManage=$(this).parents("tr").find(".checkManage").text();
            var id=$(this).parents("tr").attr("data-row-id");
            $("#editDailyManagementCheckItemForm").find(".id").val(id);
            $("#editDailyManagementCheckItemForm").find(".checkItem").attr("readonly","readonly").val(checkItem);
            $("#editDailyManagementCheckItemForm").find(".checkResult option[value="+checkResult+"]").attr("selected","selected");
            $("#editDailyManagementCheckItemForm").find(".checkManage").val(checkManage);
            $("#myModal").modal('show');
        })
        $("#editDailyManagementCheckItemForm").ajaxForm({
            beforeSubmit:  function showRequest(){
                if(confirm("确认修改？")){}else{
                    return false;
                }
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
        //        上传文件
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