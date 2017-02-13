<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<link rel="stylesheet" href="/model/Public/bootstrap-3.0.3/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="/model/Public/Home/css/tabs.css" type="text/css">
<link rel="stylesheet" href="/model/Public/Home/css/tableList.css" type="text/css">
<link rel="stylesheet" href="/model/Public/Home/css/tableDetail.css" type="text/css">
<link rel="stylesheet" href="/model/Public/Home/css/jquery-ui.min.css" type="text/css">
<link rel="stylesheet" href="/model/Public/Home/css/jquery-ui.theme.min.css" type="text/css">
<link rel="stylesheet" href="/model/Public/Home/css/box.css" type="text/css">
<style>
    .borderedDetail input,select{
        width: 100%;
        text-align: center;
    }
    .breadcrumb > li + li:before {
        color: #CCCCCC;
        content: " > ";
        padding: 0px 5px;
    }
    a{
        cursor: pointer;
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
</style>
<body>
<ol class="breadcrumb" style="background-color: transparent;float: left; height: 30px;width: 100%">
    <li class="active">检验与维修</li>
    <li class="active">维修记录管理</li>
    <li><a href="<?php echo U('MaintenanceRecord/PlantList');?>">储罐设备列表</a></li>
    <li><a href="MaintenanceRecordList.html?id=<?php echo ($plant[0]['id']); ?>">维修记录列表</a></li>
    <li class="active">维修记录编辑</li>
</ol>
<div style="width: 98%;margin-right: auto;margin-left: auto">
    <div class="plantInfo">
        <button  id="saveBtn" class="btn btn-primary Access" data-access="<?php echo ($Access['SAVE']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px">
            <span class="glyphicon glyphicon-ok" style="margin-right:5px "></span>保存
        </button>

        <table class="borderedDetail" id="MaintenanceRecordBrief" style="padding: 0px">
            <tbody>
            <tr><td>设备位号：</td><td><?php echo ($plant[0]['plantNO']); ?></td>
                <td>维修日期：</td><td><input  type="datePicker" name="maintanceDate" value="<?php echo ($PlantmaintanceRecord[0]['maintanceDate']); ?>"/>
                <td>记录日期：</td><td><input  type="datePicker" name="Record_dt" value="<?php echo ($PlantmaintanceRecord[0]['Record_dt']); ?>"/></td>
            </tr>
            <tr><td>维修单位：</td>
                <td>
                    <select  name="maintanceCompany" data-option="<?php echo ($PlantmaintanceRecord[0]['maintanceCompany']); ?>">
                        <?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '73'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </td>
                <td>记录人员：</td>
                <td>
                    <select  name="Record_username" data-option="<?php echo ($PlantmaintanceRecord[0]['Record_username']); ?>">
                        <?php if(is_array($User)): $i = 0; $__LIST__ = $User;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value=<?php echo ($vo["realname"]); ?>><?php echo ($vo["realname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </td>
                <td></td><td></td>
            </tr>
            <tr><td>备&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp注：</td><td colspan="6">
                <textarea  name="remark" style="width: 100%"><?php echo ($PlantmaintanceRecord[0]['remark']); ?></textarea></td>
            </tr>
            </tbody>
        </table>
    </div>
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
                <form method="post" id="editMaintenanceRecord" action="<?php echo U('MaintenanceRecord/editMaintenanceRecord');?>">
                    <input name="id" value="<?php echo ($PlantmaintanceRecord[0]['id']); ?>" style="display: none">
                    <input name="maintanceDate" value="<?php echo ($PlantmaintanceRecord[0]['maintanceDate']); ?>" style="display: none">
                    <input name="Record_dt" value="<?php echo ($PlantmaintanceRecord[0]['Record_dt']); ?>" style="display: none">
                    <input name="maintanceCompany" value="<?php echo ($PlantmaintanceRecord[0]['maintanceCompany']); ?>" style="display: none">
                    <input name="Record_username" value="<?php echo ($PlantmaintanceRecord[0]['Record_username']); ?>" style="display: none">
                    <input name="verifyResult" value="<?php echo ($PlantmaintanceRecord[0]['verifyResult']); ?>" style="display: none">
                    <textarea name="remark" style="display: none"><?php echo ($PlantmaintanceRecord[0]['remark']); ?></textarea>
                    <button type="submit" style="display: none"></button>
                    <div class="choice" style="margin-bottom: 20px">
                        <span> 检验部位：</span>
                        <input id="bottomBorderBox" type="checkbox"  name="bottomBorderBox" value="<?php echo ($PlantmaintanceRecord[0]["isBottom"]); ?>" /><span>底板</span>
                        <input id="wallBorderBox" type="checkbox"   name='wallBorderBox' value="<?php echo ($PlantmaintanceRecord[0]["isWall"]); ?>"  /><span>壁板</span>
                        <input id="topBorderBox" type="checkbox"  name="topBorderBox" value="<?php echo ($PlantmaintanceRecord[0]["isTop"]); ?>" /><span>顶板</span>
                    </div>
                    <div id="bottomInput" style="display: none">
                        <div class="box-container">
                            <!-- box标题块 -->
                            <div class="box-head  box-head-list" >
                                <h3>底板维修记录</h3>
                                <a class="box-head-more">收起</a>
                            </div>
                            <!-- box列表块 -->
                            <div class="detail" style="width: 100%;">
                                <ol>
                                    <!--风险分析记录-->
                                    <table class="borderedDetail">
                                        <tbody>
                                        <tr>
                                            <td><p>底板是否更换:</p></td><td class="isChange_bottom">
                                            <select name="isChange_bottom" data-option="<?php echo ($PlantmaintanceRecord[0]['isChange_bottom']); ?>">
                                                <option value="0">否</option>
                                                <option value="1">是</option>
                                            </select>
                                        </td>
                                            <td><p>底板更换日期:</p></td><td class="changeDate_bottom">
                                            <input name="changeDate_bottom" class="datePicker" value="<?php echo ($PlantmaintanceRecord[0]['changeDate_bottom']); ?>" />
                                        </td>
                                            <td><p>底板是否涂层:</p></td><td class="isInsidePaint_bottom">
                                            <select name="isChange_bottom" data-option="<?php echo ($PlantmaintanceRecord[0]['isChange_bottom']); ?>">
                                                <option value="0">否</option>
                                                <option value="1">是</option>
                                            </select>
                                        </td></tr>
                                        <tr><td><p>底板涂层日期:</p></td><td class="insidePaintDate_bottom">
                                            <input name="insidePaintDate_bottom" class="datePicker" value="<?php echo ($PlantmaintanceRecord[0]['insidePaintDate_bottom']); ?>" />
                                        </td>
                                            <td><p>底板涂层质量:</p></td><td class="insidePaintQuality_bottom">
                                                <select name="insidePaintQuality_bottom" data-option="<?php echo ($PlantmaintanceRecord[0]['insidePaintQuality_bottom']); ?>">
                                                    <option value="高">高</option>
                                                    <option value="中">中</option>
                                                    <option value="低">低</option>
                                                </select>
                                            </td>
                                            <td><p>是否安装衬里:</p></td><td class="isInstallLining_bottom">
                                                <select name="isInstallLining_bottom" data-option="<?php echo ($PlantmaintanceRecord[0]['isInstallLining_bottom']); ?>">
                                                    <option value="0">否</option>
                                                    <option value="1">是</option>
                                                </select>
                                            </td></tr>
                                        <tr><td><p>底板衬里类型:</p></td><td class="liningType_bottom">
                                            <select name="liningType_bottom" data-option="<?php echo ($PlantmaintanceRecord[0]['liningType_bottom']); ?>">
                                                <?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '12'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
                                        </td>
                                            <td><p>衬里安装日期:</p></td><td class="installLiningDate_bottom">
                                                <input name="installLiningDate_bottom" class="datePicker" value="<?php echo ($PlantmaintanceRecord[0]['installLiningDate_bottom']); ?>" />
                                            </td>
                                            <td><p>底板衬里质量:</p></td><td class="liningQuality_bottom">
                                                <select name="liningQuality_bottom" data-option="<?php echo ($PlantmaintanceRecord[0]['liningQuality_bottom']); ?>">
                                                    <option value="高">高</option>
                                                    <option value="中">中</option>
                                                    <option value="低">低</option>
                                                </select>
                                            </td></tr>
                                        <!--<tr><td><p>衬里最近检验日期:</p></td>-->
                                        <!--<td class="liningCheckDate_bottom" data-option="<?php echo ($PlantmaintanceRecord[0]['outsidePaintQuality_side']); ?>">                                            <input name="installLiningDate_bottom" type="datePicker" value="" />-->
                                        <!--&lt;!&ndash;<input name="liningCheckDate_bottom" type="datePicker" value="" />&ndash;&gt;-->
                                        <!--</td>-->
                                        <!--<td></td><td></td>-->
                                        <!--<td></td><td></td>-->
                                        <!--</tr>-->
                                        </tbody>
                                    </table>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div id="wallInput" style="display: none">
                        <div class="box-container">
                            <!-- box标题块 -->
                            <div class="box-head  box-head-list" >
                                <h3>壁板维修记录</h3>
                                <a class="box-head-more">收起</a>
                            </div>
                            <!-- box列表块 -->
                            <div class="detail" style="width: 100%;">
                                <ol>
                                    <!--风险分析记录-->
                                    <a id="addWallMaintenance" style="float: right;margin-bottom: 5px">新增壁板维修信息</a>
                                    <table id="wallChange" class="bordered">
                                        <thead>
                                        <tr><th>壁板层号</th><th>壁板是否更换</th><th>壁板更换时间</th><th>操作</th></tr>
                                        </thead>
                                        <tbody>
                                        <?php if(is_array($plantmaintanceWallRecord)): $i = 0; $__LIST__ = $plantmaintanceWallRecord;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tWall): $mod = ($i % 2 );++$i;?><tr data-row-id="<?php echo ($tWall["id"]); ?>">
                                                <td class="layerNO"><?php echo ($tWall["layerNO"]); ?></td>
                                                <td class="isChange" data-option="<?php echo ($tWall["isChange"]); ?>">
                                                    <?php switch($tWall["isChange"]): case "1": ?>是<?php break;?>
                                                        <?php case "0": ?>否<?php break; endswitch;?>
                                                </td>
                                                <td class="changeDate"><?php echo ($tWall["changeDate"]); ?></td>
                                                <td>
                                                    <a class="edit Access" data-access="<?php echo ($Access['EDIT']['id']); ?>" >编辑<span></span></a>
                                                    <a class="delete Access" data-access="<?php echo ($Access['DELETE']['id']); ?>" >删除<span></span></a>
                                                </td>
                                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                    </table>
                                    <table class="borderedDetail">
                                        <tbody>
                                        <tr>
                                            <td><p>内壁是否涂层:</p></td><td class="isInsidePaint_side">
                                            <select name="isInsidePaint_side" data-option="<?php echo ($PlantmaintanceRecord[0]['isInsidePaint_side']); ?>">
                                                <option value="0">否</option>
                                                <option value="1">是</option>
                                            </select>
                                        </td>
                                            <td><p>内壁涂层日期:</p></td><td class="insidePaintDate_side">
                                            <input name="insidePaintDate_side" class="datePicker" value="<?php echo ($PlantmaintanceRecord[0]['insidePaintDate_side']); ?>" /></td>
                                            <td><p>内壁涂层质量:</p></td><td class="insidePaintQuality_side">
                                            <select name="insidePaintQuality_side" data-option="<?php echo ($PlantmaintanceRecord[0]['insidePaintQuality_side']); ?>">
                                                <option value="高">高</option>
                                                <option value="中">中</option>
                                                <option value="低">低</option>
                                            </select>
                                        </tr>
                                        <tr>
                                            <td><p>外壁是否涂层:</p></td><td class="isOutsidePaint_side">
                                            <select name="isOutsidePaint_side" data-option="<?php echo ($PlantmaintanceRecord[0]['isOutsidePaint_side']); ?>">
                                                <option value="0">否</option>
                                                <option value="1">是</option>
                                            </select>
                                        </td>
                                            <td><p>外壁涂层日期:</p></td><td class="outsidePaintDate_side">
                                            <input name="insidePaintDate_side" class="datePicker" value="<?php echo ($PlantmaintanceRecord[0]['outsidePaintDate_side']); ?>" />
                                        </td>
                                            <td><p>外壁涂层质量:</p></td><td class="outsidePaintQuality_side">
                                            <select name="outsidePaintQuality_side" data-option="<?php echo ($PlantmaintanceRecord[0]['outsidePaintQuality_side']); ?>">
                                                <option value="高">高</option>
                                                <option value="中">中</option>
                                                <option value="低">低</option>
                                            </select>
                                        </tr>
                                        <tr>
                                            <td><p>是否安装衬里:</p></td><td class="isInstallLining_side">
                                            <select name="isInstallLining_side" data-option="<?php echo ($PlantmaintanceRecord[0]['isInstallLining_side']); ?>">
                                                <option value="0">否</option>
                                                <option value="1">是</option>
                                            </select>
                                        </td>
                                            <td><p>衬里类型:</p></td><td class="liningType_side">
                                            <select name="liningType_side" data-option="<?php echo ($PlantmaintanceRecord[0]['liningType_side']); ?>">
                                                <?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '12'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
                                            <td><p>衬里安装日期:</p></td><td class="installLiningDate_side">
                                            <input name="installLiningDate_side" class="datePicker" value="<?php echo ($PlantmaintanceRecord[0]['installLiningDate_side']); ?>" />
                                        </tr>
                                        <tr>
                                            <td><p>衬里质量:</p></td><td class="liningQuality_side">
                                            <select name="liningQuality_side" data-option="<?php echo ($PlantmaintanceRecord[0]['liningQuality_side']); ?>">
                                                <option value="高">高</option>
                                                <option value="中">中</option>
                                                <option value="低">低</option>
                                            </select>
                                        </td>
                                            <td><p>衬里最近检验日期:</p></td><td class="liningCheckDate_side">
                                            <input name="liningCheckDate_side" class="datePicker" value="<?php echo ($PlantmaintanceRecord[0]['liningCheckDate_side']); ?>" />
                                        </td>
                                            <td></td><td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div id="topInput" style="display: none">
                        <div class="box-container">
                            <!-- box标题块 -->
                            <div class="box-head  box-head-list" >
                                <h3>顶板维修记录</h3>
                                <a class="box-head-more">收起</a>
                            </div>
                            <!-- box列表块 -->
                            <div class="detail" style="width: 100%;">
                                <ol>
                                    <!--风险分析记录-->
                                    <table class="borderedDetail">
                                        <tbody>
                                        <tr>
                                            <td><p>顶板是否更换:</p></td><td class="isChange_top">
                                            <select name="isChange_top" data-option="<?php echo ($PlantmaintanceRecord[0]['isChange_top']); ?>">
                                                <option value="0">否</option>
                                                <option value="1">是</option>
                                            </select>
                                        </td>
                                            <td><p>顶板更换日期:</p></td><td class="changeDate_top">
                                            <input name="changeDate_top" class="datePicker" value="<?php echo ($PlantmaintanceRecord[0]['changeDate_top']); ?>" />
                                        </td>
                                            <td><p>内壁是否涂层:</p></td><td class="isInsidePaint_top">
                                            <select name="isInsidePaint_top" data-option="<?php echo ($PlantmaintanceRecord[0]['isInsidePaint_top']); ?>">
                                                <option value="0">否</option>
                                                <option value="1">是</option>
                                            </select>
                                        </td>
                                        <tr><td><p>内壁涂层日期:</p></td><td class="insidePaintDate_top">
                                            <input name="insidePaintDate_top" class="datePicker" value="<?php echo ($PlantmaintanceRecord[0]['insidePaintDate_top']); ?>" />
                                        </td>
                                            <td><p>内壁涂层质量:</p></td><td class="insidePaintQuality_top">
                                                <select name="insidePaintQuality_top" data-option="<?php echo ($PlantmaintanceRecord[0]['insidePaintQuality_top']); ?>">
                                                    <option value="高">高</option>
                                                    <option value="中">中</option>
                                                    <option value="低">低</option>
                                                </select>
                                            </td>
                                            <td><p>外壁是否涂层:</p></td><td class="isOutsidePaint_top">
                                                <select name="isOutsidePaint_top" data-option="<?php echo ($PlantmaintanceRecord[0]['isOutsidePaint_top']); ?>">
                                                    <option value="0">否</option>
                                                    <option value="1">是</option>
                                                </select>
                                            </td></tr>
                                        <tr><td><p>外壁涂层日期:</p></td><td class="outsidePaintDate_top">
                                            <input name="outsidePaintDate_top" class="datePicker" value="<?php echo ($PlantmaintanceRecord[0]['outsidePaintDate_top']); ?>" />
                                        </td>
                                            <td><p>外壁涂层质量:</p></td><td class="outsidePaintQuality_top">
                                                <select name="outsidePaintQuality_top" data-option="<?php echo ($PlantmaintanceRecord[0]['outsidePaintQuality_top']); ?>">
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
                </form>
            </div>
            <div id="tab2" class="tab">
                <form action="<?php echo U('Public/upload');?>" enctype="multipart/form-data" method="post" id="upload">
                    <input type="hidden" name="id" value="<?php echo ($PlantmaintanceRecord[0]['id']); ?>" >
                    <input type="hidden" name="tableId" value="MaintenanceRecord">

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
            <form class="bs-example bs-example-form" id="editWallModalForm" role="form" action="<?php echo U('MaintenanceRecord/editMaintenanceRecordWall');?>" method="post">
                <input type="hidden" name="id"  class="id" value="">
                <input type="hidden" name="pid" class="pid" value="<?php echo ($PlantmaintanceRecord[0]['id']); ?>">
                <input type="hidden" name="gpid" class="gpid" value="<?php echo ($plant[0]['id']); ?>">
                <input name="verifyResult" value="<?php echo ($PlantmaintanceRecord[0]['verifyResult']); ?>" style="display: none">
                <div class="modal-body">
                    <div class="input-group">
                        <span class="input-group-addon">壁板层号</span>
                        <select  name="layerNO" class="form-control layerNO">
                            <?php if(is_array($wallBoard)): $i = 0; $__LIST__ = $wallBoard;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$wal): $mod = ($i % 2 );++$i;?><option value="<?php echo ($wal["layerNO"]); ?>"><?php echo ($wal["layerNO"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon">壁板是否更换</span>
                        <select  name="isChange" class="form-control isChange">
                            <option value="1">是</option>
                            <option value="0">否</option>
                        </select>
                        <!--<input type="datePicker" name="isChange" class="form-control isChange" placeholder="检验日期">-->
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon">壁板更换日期</span>
                        <input type="text" name="changeDate" class="form-control changeDate datePicker" placeholder="壁板更换日期"/>
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
</body>
<script src="/model/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/model/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/model/Public/Home/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/model/Public/Home/js/jquery.form.js"></script>
<script type="text/javascript" src="/model/Public/Home/js/jquery.cookie.js"></script>
<script>
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

    //    select选项的预处理
    var selects = document.getElementsByTagName("select");
    $.each(selects, function() {
        var option=$(this).attr("data-option");
        $(this).find("option[value="+option+"]").attr("selected",true);
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
//提交编辑
    $("#saveBtn").click(function(){

        var maintanceDate=$("#MaintenanceRecordBrief input[name='maintanceDate']").val();
        var Record_dt=$("#MaintenanceRecordBrief input[name='Record_dt']").val();
        var maintanceCompany=$("#MaintenanceRecordBrief input[name='maintanceCompany']").val();
        var Record_username=$("#MaintenanceRecordBrief input[name='Record_username']").val();
        var remark=$("#MaintenanceRecordBrief textarea[name='remark']").val();
        $("#editMaintenanceRecord input[name='maintanceDate']").val(maintanceDate);
        $("#editMaintenanceRecord input[name='Record_dt']").val(Record_dt);
        $("#editMaintenanceRecord input[name='maintanceCompany']").val(maintanceCompany);
        $("#editMaintenanceRecord input[name='Record_username']").val(Record_username);
        $("#editMaintenanceRecord textarea[name='remark']").val(remark);
        $("#editMaintenanceRecord button").click();
    })

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

    $(function(){
        $("#editMaintenanceRecord").ajaxForm({
            beforeSubmit:  function showRequest(){
                if(confirm("是否确认修改？")){

                }else{
                    return false;
                }
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
        $( ".datePicker" ).datepicker(
                {
                    showOtherMonths: true,
                    selectOtherMonths: true,
                    showButtonPanel: true,
                    dateFormat : "yy-mm-dd"
                }
        );
        $("#ui-datepicker-div").css('font-size','18px');

    })
    //        新增壁板检验信息
    $("#addWallMaintenance").click(function(){
        $("#editWallModal .modal-title").html('').html("新增壁板检修信息");
        $("#editWallModal").find(".id").val('');
        $("#editWallModal").find(".layerNO").attr("readonly",false);
        $("#editWallModal").find(".isChange option[value='1']").attr("selected",true);
        $("#editWallModal").find(".changeDate").val('');
        $("#editWallModal").modal('show');
    })
    //        编辑壁板检验信息
    $("#wallChange tbody tr .edit").click(function(){
        $("#editWallModal .modal-title").html('').html("编辑壁板检修信息");
        var layerNO=$(this).parents("tr").find(".layerNO").text();
        var isChange=$(this).parents("tr").find(".isChange").attr("data-option");
        var changeDate=$(this).parents("tr").find(".changeDate").text();
        var id=$(this).parents("tr").attr("data-row-id");
        $("#editWallModal").find(".id").val(id);
        $("#editWallModal").find(".layerNO option[value='"+layerNO+"']").attr("selected",true).attr("readonly","readonly");
        $("#editWallModal").find(".isChange option[value='"+isChange+"']").attr("selected",true);
        $("#editWallModal").find(".changeDate").val(changeDate);
        $("#editWallModal").modal('show');
    })
    $("#editWallModalForm").ajaxForm({
        beforeSubmit:  function showRequest(){
        },  // 提交前
        success: function showResponse(data){
            if(data.mark==1){
                alert(data.msg);
            }else{
                alert(data.msg);
                location.reload();
            }
        }
    })
    $("#wallInput .bordered tbody tr .delete").click(function(){
        if(confirm("是否确认删除？")){
            var id=$(this).parents("tr").attr("data-row-id");
            $.post("<?php echo U('MaintenanceRecord/deleteMaintenanceRecordWall');?>",{id:id},function(data){
                alert(data.msg);
                location.reload();
            },"JSON")
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

</script>
</html>