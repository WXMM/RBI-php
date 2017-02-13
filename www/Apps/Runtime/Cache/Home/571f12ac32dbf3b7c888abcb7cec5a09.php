<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
    <link href="/www/Public/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/www/Public/Home/css/tabs.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/tableList.css">
    <link rel="stylesheet" href="/www/Public/Home/css/tableDetail.css">
    <link rel="stylesheet" href="/www/Public/Home/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/jquery-ui.theme.min.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/box.css" type="text/css">
    <style>
        a{
            cursor: pointer;
        }
        .borderedDetail tr td:nth-child(2), tr td:nth-child(4){
            padding: 0px;
        }
        .borderedDetail tr td:nth-child(2):hover,.borderedDetail tr td:nth-child(4):hover{
            background-color: transparent;
        }
        .borderedDetail td:nth-child(2) input,.borderedDetail td:nth-child(4) input{
            width: 100%;
            height: 100%;
            padding-left: 5px;
            text-align: center;
            border: none;
        }
        .borderedDetail td:nth-child(2) input[type="datePicker"],td:nth-child(4) input[type="datePicker"]{
            width: 100%;
            height: inherit;
            text-align: center;
            float: left;
        }
        .borderedDetail td:nth-child(2) select,.borderedDetail td:nth-child(4) select{
            width: 100%;
            height: 100%;
            padding-left: 5px;
            text-align: center;
            border: none;
        }
        .borderedDetail td:nth-child(2) select option,.borderedDetail td:nth-child(4) select option{
            width: 100%;
            height: 100%;
            padding-left: 5px;
            text-align: center;
            border: none;
        }
        table td a{
            margin-left: 5px;
            cursor: pointer;
        }
        .modal-body td:nth-child(2), .modal-body td:nth-child(4){
            padding: 0px;
        }
        .modal-body  td:nth-child(2):hover, .modal-body td:nth-child(4):hover{
            background-color: transparent;
        }
        .modal-body  td:nth-child(2) input, .modal-body td:nth-child(4) input{
            width: 100%;
            height: inherit;
        }
        .modal-body  td:nth-child(2) select, .modal-body td:nth-child(4) select,textarea{
            width:100%;
            height: inherit;
        }
        .modal-body  td:nth-child(2) input:focus, .modal-body td:nth-child(4) input:focus{
            border: none;
        }
        .modal-body  tr td span{
            width: 100%;
        }
        .breadcrumb > li + li:before {
            color: #CCCCCC;
            content: " > ";
            padding: 0 5px;
        }
        #edit{
            margin-bottom: 10px;
            border: transparent;
            background-color: transparent;
        }
        #edit span{
            margin-right: 3px;
        }

    </style>
    <title></title>
</head>
<body>
<ol class="breadcrumb" style="background-color: transparent;float: left;">
    <li class="active">档案管理</li>
    <li class="active">测厚原始记录</li>
    <li><a href="<?php echo U('Manage/thicknessOrigin');?>" target="main">储罐设备列表</a></li>
    <li class="active">测厚原始记录编辑</li>
</ol>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <div class="title">储罐壁板</div>
            </div>
            <div class="modal-body">
                <form method="post" id="thicknessOriginForm" action="<?php echo U('Manage/addThicknessOriginData');?>">
                    <table class="borderedDetail">
                        <tbody>
                        <input  id="triggerType" name="triggerType" value="" style="display: none">
                        <input  name="pid" value="<?php echo ($res[0]["id"]); ?>" style="display: none;">
                        <input  id="id" name="id"  value="" type="hidden"/>
                        <input  id="layerPid" name="layerPid"  value="" type="hidden"/>
                        <input  id="part" name="part" value=1 type="hidden"/>

                        <tr><td class="title">壁板序号：</td><td>
                            <select id="layerNO" name="layerNO" class="form-control">
                                <?php if(is_array($Wallboarod)): $i = 0; $__LIST__ = $Wallboarod;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Wa): $mod = ($i % 2 );++$i;?><option data-row-id="<?php echo ($Wa["id"]); ?>" value="<?php echo ($Wa["layerNO"]); ?>"><?php echo ($Wa["layerNO"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </tr>

                        <tr><td>测点序号：</td><td><input  id="layerId" name="layerId" class="form-control" value="" placeholder="按照统一的格式编写，如'1-1','2-1'"/></td></tr>
                        <tr><td>原始厚度(mm)：</td><td><input  id="thicknessOrigin" name="thicknessOrigin" class="form-control" value="" placeholder="该测点首次测量厚度"/></td></tr>
                        <tr><td>腐蚀速率类型：</td><td>
                            <select name="thicknessType" class="form-control">
                                <option value="测量">测量</option>
                                <option value="理论">理论</option>
                                <option value="专家">专家</option>
                            </select>
                        </tbody>
                    </table>
                    <button id="fat-btn" class="btn btn-block btn-primary" data-loading-text="Loading..."
                            style="margin-top: 5px" type="submit"> 提交
                    </button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<div class="modal fade" id="myOtherModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <div class="title">储罐底板</div>
            </div>
            <div class="modal-body">
                <form method="post" id="thicknessOriginOtherForm" action="<?php echo U('Manage/addThicknessOriginData');?>">
                    <table class="borderedDetail">
                        <tbody>
                        <input  class="triggerType" name="triggerType" value="" style="display: none">
                        <input  name="pid" value="<?php echo ($res[0]["id"]); ?>" style="display: none;">
                        <input  class="id" name="id"  value="" type="hidden"/>
                        <input  class="layerPid" name="layerPid"  value=0 type="hidden"/>
                        <input  class="part"  name="part"  value=2 type="hidden"/>
                        <tr><td class="title">底板部位：</td><td>
                            <select  name="layerNO" class="layerNO form-control">
                                <option value=1 >边缘板</option>
                                <option value=2 >中间板</option>
                            </select>
                        </tr>

                        <tr><td>测点序号：</td><td>
                            <input   name="layerId" class="layerId form-control" value="" placeholder="按照统一的格式编写，如'边缘板-1','中间板-1'"/>
                        </td></tr>
                        <tr><td>原始厚度(mm)：</td><td><input  name="thicknessOrigin" class="thicknessOrigin form-control" value="" placeholder="该测点首次测量厚度"/></td></tr>
                        <tr><td>腐蚀速率类型：</td><td>
                            <select name="thicknessType" class="thicknessType form-control">
                                <option value="测量">测量</option>
                                <option value="理论">理论</option>
                                <option value="专家">专家</option>
                            </select>
                        </tbody>
                    </table>
                    <button  class="btn btn-block btn-primary" data-loading-text="Loading..."
                             style="margin-top: 5px" type="submit"> 提交
                    </button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<div class="modal fade" id="myTopModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <div class="title">储罐顶板</div>
            </div>
            <div class="modal-body">
                <form method="post" id="thicknessOriginTopForm" action="<?php echo U('Manage/addThicknessOriginData');?>">
                    <table class="borderedDetail">
                        <tbody>
                        <input  class="triggerType" name="triggerType" value="" style="display: none">
                        <input  name="pid" value="<?php echo ($res[0]["id"]); ?>" style="display: none;">
                        <input  class="id" name="id"  value="" type="hidden"/>
                        <input  class="layerPid" name="layerPid"  value=0 type="hidden"/>
                        <input  class="part"  name="part"  value=3 type="hidden"/>
                        <input  class="layerNO"  name="layerNO"  value=1 type="hidden"/>
                        <tr><td>测点序号：</td><td>
                            <input   name="layerId" class="layerId form-control" value="" placeholder="按照统一的格式编写，如'顶板-1','顶板-2'"/>
                        </td></tr>
                        <tr><td>原始厚度(mm)：</td><td><input  name="thicknessOrigin" class="thicknessOrigin form-control" value="" placeholder="该测点首次测量厚度"/></td></tr>
                        <tr><td>腐蚀速率类型：</td><td>
                            <select name="thicknessType" class="thicknessType form-control">
                                <option value="测量">测量</option>
                                <option value="理论">理论</option>
                                <option value="专家">专家</option>
                            </select>
                        </tbody>
                    </table>
                    <button  class="btn btn-block btn-primary" data-loading-text="Loading..."
                            style="margin-top: 5px" type="submit"> 提交
                    </button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<div style="width: 98%;margin-right: auto;margin-left: auto">
    <form method="post" id="thicknessOriginEdit" action="<?php echo U('Manage/saveOriginRecord');?>">
        <button type="submit" id="submit" class="btn btn-primary Access" data-access="<?php echo ($Access['SAVE']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-top:30px;margin-bottom: 10px;"
                 >
            <span class="glyphicon glyphicon-ok" style="margin-right:5px "></span>保存
        </button>
        <input name="id" type="hidden" value="<?php echo ($res[0]["id"]); ?>">
        <table class="borderedDetail">
            <tbody>
            <tr><td>设备名称</td><td><?php if(empty($res[0]["plantName"])): ?>-<?php endif; echo ($res[0]["plantName"]); ?></td><td>设备位号</td><td><?php echo ($res[0]["plantNO"]); ?></td></tr>
            <tr><td>测量日期</td><td><input type="datePicker" name="measureDate" class="form-control" value="<?php echo ($res[0]['MeasurethicknessrecordOrigin']["measureDate"]); ?>"/></td>
                <td>记录时间</td><td><input type="datePicker" name="recordDate" class="form-control" value="<?php echo ($res[0]['MeasurethicknessrecordOrigin']["recordDate"]); ?>"/></td></tr>
            <tr><td>测量人员</td><td>
                <select type="text" name="measureUserName" class="form-control" data-option="<?php echo ($res[0]['MeasurethicknessrecordOrigin']["measureUserName"]); ?>">
                    <?php if(is_array($User)): $i = 0; $__LIST__ = $User;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Us): $mod = ($i % 2 );++$i;?><option value="<?php echo ($Us["realname"]); ?>"><?php echo ($Us["realname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
                <td>记录人员</td><td>
                <input name="recordUserName" type="hidden" value="<?php echo ($_SESSION['realname']); ?>" />
                <select type="text" name="recordUserName" class="form-control" data-option="<?php echo ($_SESSION['realname']); ?>" disabled="disabled">
                    <?php if(is_array($User)): $i = 0; $__LIST__ = $User;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Us): $mod = ($i % 2 );++$i;?><option value="<?php echo ($Us["realname"]); ?>"><?php echo ($Us["realname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            <tr><td>备注</td><td colspan="3"><textarea  class="form-control" name="remark"><?php echo ($res[0]['MeasurethicknessrecordOrigin']["remark"]); ?></textarea></td></tr>
            </tbody>
        </table>
    </form>
</div>
<div style="width: 98%;margin-left: auto;margin-right: auto">
    <div class="tabbable">
        <ul id="tabs">
            <li>
                <a href="#" title="tab1">原始厚度</a>
            </li>
            <li>
                <a href="#" title="tab2">相关文件</a>
            </li>
        </ul>
        <div id="content" style="padding-top: 10px">
            <div id="tab1">
                <!-- 模态框（Modal） -->
                <div class="modal fade" id="myModalObservationPoint" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">上传测点布局图</h4>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo U('Manage/upload');?>" id="uploadObservationPointForm" enctype="multipart/form-data" method="post">
                                    <input type="hidden" name="id" value="<?php echo ($res[0]["id"]); ?>" >
                                    <input type="hidden" name="pointFigPath" value="">
                                    <!--<input type="text" name="name" />-->
                                    <div class="input-group" style="width: 100%">
                                        <input type="file" name="file"  style="display: none" />
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
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal -->
                </div>
                <!-- 模态框（Modal） -->
                <div class="modal fade" id="myModalObservationPointFig" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="width: 95%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">测点布局图</h4>
                            </div>
                            <div class="modal-body" style="overflow: auto;">
                                <div class="imgWrap">
                                    <img  width="100%"  data-wallPointFigPath="<?php echo ($res[0]['MeasurethicknessrecordOrigin']["wallPointFigPath"]); ?>"
                                         data-bottomPointFigPath="<?php echo ($res[0]['MeasurethicknessrecordOrigin']["bottomPointFigPath"]); ?>"
                                         data-topPointFigPath="<?php echo ($res[0]['MeasurethicknessrecordOrigin']["topPointFigPath"]); ?>"
                                         src="/model/Public/Home/img/observationPointFig/57fb4569e5840.png"  alt="没有上传测点布局图"/>
                                </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal -->
                </div>
                <div style="width: 100%;margin:10px auto;">
                    <!-- box容器 start -->
                    <div class="box-container">
                        <!-- box标题块 -->
                        <div class="box-head box-head-list">
                            <h3>底板原始测量厚度</h3>
                            <a class="box-head-more addBottomOrigin Access" data-access="<?php echo ($Access['ADD']['id']); ?>">新增底板测点</a>
                        </div>
                        <!-- box列表块 -->
                        <div class="bottom">
                            <ol>
                                <div style="text-align: right "><a style="margin-right: 5px" class="uploadObservationPoint">上传测点图</a> <a class="checkObservationPoint">查看测点图</a></div>
                                <table class="bordered needMore" id="bottom">
                                    <thead>
                                    <tr><th>底板部位</th><th>测点序号</th><th>原始厚度(mm)</th><th>名义厚度(mm)</th><th>腐蚀速率类型</th><th>操作</th></tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_array($bottomInfo)): $i = 0; $__LIST__ = $bottomInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tWall): $mod = ($i % 2 );++$i;?><tr data-row-id="<?php echo ($tWall["id"]); ?>">
                                            <td class="id" style="display: none"><?php echo ($tWall["id"]); ?></td>
                                            <td class="layerNO" data-data="<?php echo ($tWall["layerNO"]); ?>">
                                                <?php switch($tWall["layerNO"]): case "1": ?>边缘板<?php break;?>
                                                    <?php case "2": ?>中间板<?php break; endswitch;?>
                                            </td>
                                            <td class="layerId"><?php echo ($tWall["layerId"]); ?></td>
                                            <td class="thicknessOrigin"><?php echo ($tWall["thicknessOrigin"]); ?></td>
                                            <td class="namelyThickness">
                                                <?php switch($tWall["layerNO"]): case "1": echo ($res[0]["bottomEdgeNamelyThickness"]); break;?>
                                                    <?php case "2": echo ($res[0]["bottomMiddleNamelyThickness"]); break; endswitch;?>
                                            </td>
                                            <td class="thicknessType"><?php echo ($tWall["thicknessType"]); ?></td>
                                            <td><a class="edit Access" data-access="<?php echo ($Access['EDIT']['id']); ?>"><span>编辑</span></a>
                                                <a class="delete Access" data-access="<?php echo ($Access['DELETE']['id']); ?>"><span>删除</span></a></td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                                <div style="text-align: right " class="more"><a>查看更多</a>>>></div>
                            </ol>
                        </div>

                    </div>
                    <!-- box容器 end -->
                </div>
                <div style="width: 100%;margin:10px auto;">
                    <!-- box容器 start -->
                    <div class="box-container">
                        <!-- box标题块 -->
                        <div class="box-head box-head-list">
                            <h3>壁板原始测量厚度</h3>
                            <a class="box-head-more addWallOrigin Access" data-access="<?php echo ($Access['ADD']['id']); ?>">新增壁板测点</a>
                        </div>
                        <!-- box列表块 -->
                        <div class="wall">
                            <ol>
                                <div style="text-align: right "><a style="margin-right: 5px" class="uploadObservationPoint">上传测点图</a> <a class="checkObservationPoint">查看测点图</a></div>
                                <table class="bordered needMore" id="wallboard">
                                    <thead>
                                    <tr><th>壁板层号</th><th>测点序号</th><th>原始厚度(mm)</th><th>名义厚度(mm)</th><th>腐蚀速率类型</th><th>操作</th></tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_array($wallboardInfo)): $i = 0; $__LIST__ = $wallboardInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tWall): $mod = ($i % 2 );++$i;?><tr data-row-id="<?php echo ($tWall["id"]); ?>">
                                            <td class="id" style="display: none"><?php echo ($tWall["id"]); ?></td>
                                            <td class="layerNO"><?php echo ($tWall["layerNO"]); ?></td>
                                            <td class="layerId"><?php echo ($tWall["layerId"]); ?></td>
                                            <td class="thicknessOrigin"><?php echo ($tWall["thicknessOrigin"]); ?></td>
                                            <!--<td class="thicknessOriginDate"><?php echo ($tWall["thicknessOriginDate"]); ?></td>-->
                                            <td class="namelyThickness"><?php echo ($tWall["namelyThickness"]); ?></td>
                                            <td class="thicknessType"><?php echo ($tWall["thicknessType"]); ?></td>
                                            <td><a class="edit Access" data-access="<?php echo ($Access['EDIT']['id']); ?>"><span>编辑</span></a>
                                                <a class="delete Access" data-access="<?php echo ($Access['DELETE']['id']); ?>"><span>删除</span></a></td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                                <div style="text-align: right " class="more"><a>查看更多</a>>>></div>
                            </ol>
                        </div>

                    </div>
                    <!-- box容器 end -->
                </div>

                <div style="width: 100%;margin:10px auto;">
                    <!-- box容器 start -->
                    <div class="box-container">
                        <!-- box标题块 -->
                        <div class="box-head box-head-list">
                            <h3>顶板原始测量厚度</h3>
                            <a class="box-head-more addTopOrigin Access" data-access="<?php echo ($Access['ADD']['id']); ?>">新增顶板测点</a>
                        </div>
                        <!-- box列表块 -->
                        <div class="top">
                            <ol>
                                <div style="text-align: right "><a style="margin-right: 5px" class="uploadObservationPoint">上传测点图</a> <a class="checkObservationPoint">查看测点图</a></div>
                                <table class="bordered needMore" id="top">
                                    <thead>
                                    <tr><th>测点序号</th><th>原始厚度(mm)</th><th>名义厚度(mm)</th><th>腐蚀速率类型</th><th>操作</th></tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_array($topInfo)): $i = 0; $__LIST__ = $topInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tWall): $mod = ($i % 2 );++$i;?><tr data-row-id="<?php echo ($tWall["id"]); ?>">
                                            <td class="id" style="display: none"><?php echo ($tWall["id"]); ?></td>
                                            <td class="layerId"><?php echo ($tWall["layerId"]); ?></td>
                                            <td class="thicknessOrigin"><?php echo ($tWall["thicknessOrigin"]); ?></td>
                                            <td class="namelyThickness"><?php echo ($res[0]["topThickness"]); ?></td>
                                            <td class="thicknessType"><?php echo ($tWall["thicknessType"]); ?></td>
                                            <td><a class="edit Access" data-access="<?php echo ($Access['EDIT']['id']); ?>"><span>编辑</span></a>
                                                <a class="delete Access" data-access="<?php echo ($Access['DELETE']['id']); ?>"><span>删除</span></a></td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                                <div style="text-align: right " class="more"><a>查看更多</a>>>></div>
                            </ol>
                        </div>

                    </div>
                    <!-- box容器 end -->
                </div>
            </div>

            <div id="tab2">
                <form action="<?php echo U('Public/upload');?>" enctype="multipart/form-data" method="post" id="upload">
                    <input type="hidden" name="id" value="<?php echo ($res[0]["id"]); ?>" >
                    <input type="hidden" name="tableId" value="tb_thicknessOrigin">
                    <!--<input type="text" name="name" />-->
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
                                <a class="download Access"  data-access="<?php echo ($Access['DOWNLOAD']['id']); ?>" href="downloadUpload.html?id=<?php echo ($vo["id"]); ?>">下载</a>
                                <a class="delete Access" data-access="<?php echo ($Access['DELETE']['id']); ?>" >删除</a>
                            </td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="/www/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/www/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<!--右键菜单的实现-->
<script src="/www/Public/Home/js/bootstrapMenu.min.js"></script>
<!--ajax表单的提交，依赖于jquery源代码-->
<script type="text/javascript" src="/www/Public/Home/js/jquery.form.js"></script>
<!--实现如日历。旋转器，菜单等功能-->
<script type="text/javascript" src="/www/Public/Home/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/www/Public/Home/js/jquery.cookie.js"></script>
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
        if(tabs_index>1){ var index=0; }else{ var index=$.cookie('tabs_index'); }
    }
    $("#content").children("div").hide(); // Initially hide all content
    $("#tabs li").eq(index).attr("id","current"); // Activate first tab
    $("#content").children("div").eq(index).fadeIn(); // Show first tab content
    $('#tabs a').click(function(e) {
        e.preventDefault();
        $("#content").children("div").hide(); //Hide all content
        $("#tabs li").attr("id",""); //Reset id's
        $(this).parent().attr("id","current"); // Activate this
        $.cookie('tabs_index', $(this).parent().index());
        $('#' + $(this).attr('title')).fadeIn();
    });
//    首次进入动态选择select选项
    var selectNO=$("#thicknessOriginEdit select").length;
    for(var i=0;i<selectNO;i++){
        var thisSelect=$("#thicknessOriginEdit  select:eq("+i+")");
        var optionVa=thisSelect.attr("data-option");
        thisSelect.find("option[value='"+optionVa+"']").attr("selected",true);
    }
//右键菜单，需要更换的
    var menu = new BootstrapMenu('#wallboard tr', {
        fetchElementData: function($rowElem) {
            var rowId = $rowElem.data('rowId');
            return rowId;
        },
        actions: [{
            name:  '新增测点',
            onClick: function(row) {

                var layerNO  =$("#wallboard tr[data-row-id='+row+']").find("td[class='layerNO']").text();
                var layerIdStr  =$('tr[data-row-id='+row+']').find("td[class='layerId']").text();
                var namelyThickness=$('tr[data-row-id='+row+']').find("td[class='namelyThickness']").text();
                var layerIdStr=layerIdStr.split('-');
                var layerIdIndex=layerIdStr[1]*1+1*1;
                var layerId=layerIdStr[0]+"-"+layerIdIndex;
                $("#triggerType").val(1);//typeCode表示修改数据的形式，1表示增添 2表示修改
                $("#layerNO").attr("readOnly",true).val(layerNO);
                $("#layerId").val(layerId);
                $("#namelyThickness").val(namelyThickness);
                $("#edit").click();
            }
        },{
            name:  '编辑测点',
            onClick: function(row) {
                var layerNO  =$('tr[data-row-id='+row+']').find("td[class='layerNO']").text();
                var layerIdStr  =$('tr[data-row-id='+row+']').find("td[class='layerId']").text();
                var thicknessOrigin=$('tr[data-row-id='+row+']').find("td[class='thicknessOrigin']").text();
                var thicknessOriginDate=$('tr[data-row-id='+row+']').find("td[class='thicknessOriginDate']").text();
                var namelyThickness=$('tr[data-row-id='+row+']').find("td[class='namelyThickness']").text();
                $("#id").val(row);//typeCode表示修改数据的形式，1表示增添 2表示修改
                $("#triggerType").val(2);//typeCode表示修改数据的形式，1表示增添 2表示修改
                $("#layerNO").attr("readOnly",true).val(layerNO);
                $("#layerId").attr("readOnly",true).val(layerIdStr);
                $("#thicknessOriginDate").val(thicknessOriginDate);
                $("#thicknessOrigin").val(thicknessOrigin);
                $("#namelyThickness").val(namelyThickness);
                $("#edit").click();
            }
        },{
            name:  '删除测点',
            onClick: function(row) {
                if(confirm("确定要删除数据吗")){
                    $.post("<?php echo U('Manage/deleteThicknessOriginData');?>",{id:row},function(data){
                        if(data!==""){
                            alert(data.msg);
                            window.location.reload();
                        }
                    },"json")
                }else{
                    return false;
                }
            }
        },{
            name:  '刷新页面',
            onClick: function() {
                location.reload();
            }
        }]
    });
//壁板原始測厚信息的编辑

//选择壁板层号
$("#layerNO").change(function(){
    var layerPid=$(this).find("option:selected").attr("data-row-id");
    var thisValue=$(this).val();
    $("#layerId").val(thisValue+"-1");
    $("#layerPid").val(layerPid);
})
    //新增
    $(".addWallOrigin").click(function(){
        var layerPid=$("#layerNO option:selected").attr("data-row-id");
        $('#myModal .title').html('').html("储罐壁板");
        $('#thicknessOriginForm .title').html('').html("壁板序号：");
        $('#part').val(1);
        $('#triggerType').val(1);
        $('#id').val("");
        $("#layerPid").attr("disabled", false).val(layerPid);
        $("#layerNO").attr("disabled", false);
        $("#layerId").attr("disabled",false).val("");
        var layerNOCount=$("#layerNO option").length;
        if(layerNOCount==0){
            alert("该设备没有添加壁板，请前往档案管理进行添加，之后再添加原始测量厚度");
        }else{
            $('#myModal').modal('show');
        }
    });
    //编辑
    $(".wall table tr .edit").click(function(){
        var id=$(this).parent().parent().find(".id").text();
        var layerNO  =$(this).parent().parent().find(".layerNO").text();
        var layerId  =$(this).parent().parent().find(".layerId").text();
        var thicknessOrigin  =$(this).parent().parent().find(".thicknessOrigin").text();
        $("#id").val(id);//typeCode表示修改数据的形式，1表示增添 2表示修改
        $('#part').val(1);
        $("#triggerType").val(2);//typeCode表示修改数据的形式，1表示增添 2表示修改
        $("#layerNO").attr("disabled", true).find("option[value="+layerNO+"]").attr("selected",true);
        $("#layerPid").attr("disabled", true).val('');
        $("#layerId").attr("disabled", true).val(layerId);
        $("#thicknessOrigin").val(thicknessOrigin);
        $('#myModal').modal('show');
    });
    //底板原始測厚信息的编辑
//选择底板部位
$("#thicknessOriginOtherForm .layerNO").change(function(){
    var thisForm=$("#thicknessOriginOtherForm");
    var layerId=$(this).find("option:selected").text();
    thisForm.find(".layerId").val(layerId+"-1");
})
    //新增
    $(".addBottomOrigin").click(function(){
        var thisForm=$("#thicknessOriginOtherForm");
        thisForm.find('.triggerType').val(1);
        var layerId=thisForm.find('.layerNO option:selected').text();
        thisForm.find('.id').val("");
        thisForm.find(".layerId").attr("disabled", false).val(layerId+"-1");
        thisForm.find(".layerNO").attr("disabled", false);
        $('#myOtherModal').modal('show');
    });
    //编辑
    $(".bottom table tr .edit").click(function(){
        var thisForm=$("#thicknessOriginOtherForm");
        var id=$(this).parent().parent().find(".id").text();
        var layerNO  =$(this).parent().parent().find(".layerNO").attr("data-data");
        var layerId  =$(this).parent().parent().find(".layerId").text();
        var thicknessOrigin=$(this).parent().parent().find(".thicknessOrigin").text();
        thisForm.find(".id").val(id);//typeCode表示修改数据的形式，1表示增添 2表示修改
        thisForm.find(".triggerType").val(2);//typeCode表示修改数据的形式，1表示增添 2表示修改
        thisForm.find(".layerNO").attr("disabled", true).children("option[value="+layerNO+"]").attr("selected",true);
        thisForm.find(".layerId").attr("disabled", true).val(layerId);
        thisForm.find(".thicknessOrigin").val(thicknessOrigin);
        $('#myOtherModal').modal('show');
    });
    //顶板原始測厚信息的编辑
    //新增
    $(".addTopOrigin").click(function(){
        var thisForm=$("#thicknessOriginTopForm");
        thisForm.find('.triggerType').val(1);
        thisForm.find('.id').val("");
        thisForm.find(".layerId").attr("disabled", false).val('顶板-1');
        $('#myTopModal').modal('show');
    });
    //编辑
    $(".top table tr .edit").click(function(){
        var thisForm=$("#thicknessOriginTopForm");
        var id=$(this).parent().parent().find(".id").text();
        var layerId  =$(this).parent().parent().find(".layerId").text();
        var thicknessOrigin=$(this).parent().parent().find(".thicknessOrigin").text();
        thisForm.find(".id").val(id);//typeCode表示修改数据的形式，1表示增添 2表示修改
        thisForm.find(".triggerType").val(2);//typeCode表示修改数据的形式，1表示增添 2表示修改
        thisForm.find(".layerId").attr("disabled", true).val(layerId);
        thisForm.find(".thicknessOrigin").val(thicknessOrigin);
        $('#myTopModal').modal('show');
    });
    //删除
    $("#tab1 table tr .delete").click(function(){
        var id=$(this).parents("tr").find(".id").text();
        if(confirm("确定要删除数据吗")){
            $.post("<?php echo U('Manage/deleteThicknessOriginData');?>",{id:id},function(data){
                if(data!==""){
                    alert(data.msg);
                    window.location.reload();
                }
            },"json")
        }else{
            return false;
        }
    })

//保存原始測厚记录的相关信息
    $("#thicknessOriginEdit").ajaxForm({

        beforeSubmit:function showRequest(){
        },
        success: function showResponse(data) {
            alert(data.msg);
            location.reload();
        }
    });
    $("#thicknessOriginOtherForm").ajaxForm({
        beforeSubmit:function showRequest(){
        },
        success: function showResponse(data) {
            alert(data.msg);
            location.reload();
        }
    });
    $("#thicknessOriginTopForm").ajaxForm({
        beforeSubmit:function showRequest(){
        },
        success: function showResponse(data) {
            alert(data.msg);
            location.reload();
        }
    });

    $("#uploadObservationPointForm").ajaxForm({
        beforeSubmit:function showRequest(){
        },
        success: function showResponse(data) {
            alert(data.msg);
            location.reload();
        }
    });
//    文件上传样式修改操作
    $("#upload .chooseFile").click(function(){
        $("#upload input[type='file']").click();
    })
    $("#upload input[type='file']").change(function(){
        $("#upload .filePath").val($(this).val());
    })
    //    文件上传样式修改操作
    $("#uploadObservationPointForm .chooseFile").click(function(){
        $("#uploadObservationPointForm input[type='file']").click();
    })
    $("#uploadObservationPointForm input[type='file']").change(function(){
        $("#uploadObservationPointForm .filePath").val($(this).val());
    })


    //壁板上传、添加、查看测点图
    $(".wall .uploadObservationPoint").click(function(){
        $("#uploadObservationPointForm input[name='pointFigPath']").val("wallPointFigPath");
        $("#myModalObservationPoint").modal("show");
    })

    $(".wall .checkObservationPoint").click(function(){
        var wallPointFigPath=$("#myModalObservationPointFig img").attr("data-wallPointFigPath");
        $("#myModalObservationPointFig img").attr("src",wallPointFigPath);
        $("#myModalObservationPointFig .modal-title").html("壁板测点布局图");
        $("#myModalObservationPointFig").modal("show");

    })

    //底板上传、添加、查看测点图
    $(".bottom .uploadObservationPoint").click(function(){
        $("#uploadObservationPointForm input[name='pointFigPath']").val("bottomPointFigPath");
        $("#myModalObservationPoint").modal("show");
    })

    $(".bottom .checkObservationPoint").click(function(){
        var bottomPointFigPath=$("#myModalObservationPointFig img").attr("data-bottomPointFigPath");
        $("#myModalObservationPointFig img").attr("src",bottomPointFigPath);
        $("#myModalObservationPointFig .modal-title").html("底板测点布局图");
        $("#myModalObservationPointFig").modal("show");
    })

    //顶板上传、添加、查看测点图
    $(".top .uploadObservationPoint").click(function(){
        $("#uploadObservationPointForm input[name='pointFigPath']").val("topPointFigPath");
        $("#myModalObservationPoint").modal("show");
    })

    $(".top .checkObservationPoint").click(function(){
        var topPointFigPath=$("#myModalObservationPointFig img").attr("data-topPointFigPath");
        $("#myModalObservationPointFig img").attr("src",topPointFigPath);
        $("#myModalObservationPointFig .modal-title").html("顶板测点布局图");
        $("#myModalObservationPointFig").modal("show");
    })

    //保存原始測厚的具体数据，包括壁板、底板、顶板
    $(function(){
        var d=$("#wallboard tbody tr:last-child").find("td[class='Wall_ID']").text();
        var d=d*1+1;
        $("#wall_ID").attr("class","form-control").val(d);
        $("#wall_ID").attr("readOnly",true);
        $("#MeaLoc_ID").val('');
        $("#Thickness").val('');
        $("#Mea_dt").val('');
        $("#thicknessOriginForm").ajaxForm({
            beforeSubmit:function showRequest(){
            },
            success: function showResponse(data){
                alert(data.msg);
                location.reload();
            }

        });
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
        //激活spin插件
        $(".spinner").css('width','100%');
        var spinner = $( ".spinner" ).spinner();


        //        如果表格行数超过4行（不包括）则显示“显示更多”
        var length=$('.needMore').length;
//        alert(length);
        for(var i=0;i<length;i++){
            var thisTable=$(".needMore:eq("+i+")");
            var trLength=thisTable.find("tbody").children("tr").length;
            if(trLength>4){
                trLength=thisTable.find("tbody").children("tr:gt(3)").hide();
                thisTable=thisTable.parent().children(".more").show();
            }else{
                thisTable=thisTable.parent().children(".more").hide();
//                alert("小于4");
            }
        }
//
//        $(".riskDoc table tr:gt(3)").hide();
        $(".more").click(function(){
            var s=$(this).find('a').html();
            if(s=='收起'){
                $(this).parent().children(".needMore").find("tbody tr:gt(3)").hide();
                $(this).find('a').html('').html('查看更多');
            }else if(s=='查看更多'){
                $(this).parent().children(".needMore").find("tbody tr:gt(3)").show();
                $(this).find('a').html('').html('收起');
            }
        });

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
    })
</script>
</body>
</html>