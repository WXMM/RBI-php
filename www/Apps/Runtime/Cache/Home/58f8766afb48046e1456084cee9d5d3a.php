<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href="/www/Public/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/www/Public/Home/css/tabs.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/tableList.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/tableDetail.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/jquery-ui.theme.min.css" type="text/css">
    <style>
        .borderedDetail tr td:nth-child(2), .borderedDetail tr td:nth-child(4){
            padding: 0px;
        }
        .borderedDetail tr td:nth-child(2):hover,.borderedDetail tr td:nth-child(4):hover{
            background-color: transparent;
        }
        .borderedDetail td:nth-child(2) input,td:nth-child(4) input{
            width: 100%;
            height: 100%;
            padding-left: 5px;
            border: none;
        }
        .borderedDetail td:nth-child(2) input[type="datePicker"],td:nth-child(4) input[type="datePicker"]{
            width: 90%;
            height: inherit;
            float: left;
        }
        .borderedDetail td:nth-child(2) select,td:nth-child(4) select,textarea{
            width: 100%;
            height: 100%;
            padding-left: 5px;
            border: none;
        }
        /*.borderedDetail td:nth-child(2) input:focus,td:nth-child(4) input:focus{*/
            /*border: none;*/
        /*}*/
        .borderedDetail tr td span{
            width: 100%;
            height: 100%;
        }
        /*.borderedDetail tr td{*/
            /*padding: 5px;*/
        /*}*/
        .breadcrumb > li + li:before {
            color: #CCCCCC;
            content: " > ";
            padding: 0 5px;
        }
        .form-control{
            border: none;
        }
        p.calendarIcon{
            width: 10%;
            float: right;
           padding: 8px;

        }


    </style>
    <title></title>
</head>
<body>
<ol class="breadcrumb" style="background-color: transparent;float: left">
    <li class="active">档案管理</li>
    <li class="active">常压储罐基本信息</li>
    <li><a href="<?php echo U('Manage/tankInfoList');?>">储罐设备列表</a></li>
    <li class="active">设备信息编辑</li>
</ol>
<!--设备信息编辑-->


<div id="edit" style="width: 98%;margin-left: auto;margin-right: auto">
    <div class="tabbable">
        <ul id="tabs">
            <li>
                <a href="#" title="tab1">基本信息</a>
            </li>
            <li>
                <a href="#" title="tab2">底板信息</a>
            </li>
            <li>
                <a href="#" title="tab3">壁板信息</a>
            </li>
            <li>
                <a href="#" title="tab4">顶板信息</a>
            </li>


            <li>
                <a href="#" title="tab5">相关文件</a>
            </li>

        </ul>
        <div id="content" style="padding-top: 10px">
            <form action="<?php echo U('Manage/tankInfoSave');?>" id="tankInfoEdit" method="post">
                <input name="id" value="<?php echo ($res[0]["id"]); ?>" style="display: none">
                <button type="submit" id="submit" class="btn btn-primary Access" data-access="<?php echo ($Access['SAVE']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;">
                    <span class="glyphicon glyphicon-ok" style="margin-right:5px "></span><?php echo ($Access['SAVE']['name']); ?>
                </button>
                <!--<button type="button"  class="btn btn-primary Access" data-access="<?php echo ($Access['ADD']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-right: 10px" data-toggle="modal"-->
                        <!--data-target="#myModal">-->
                    <!--<span class="glyphicon glyphicon-plus" style="margin-right:5px "></span><?php echo ($Access['ADD']['name']); ?>-->
                <!--</button>-->
                <div id="tab1">
                    <table class="borderedDetail" >
                        <tbody>
                        <tr><td><p>所在厂区:</p></td><td><input  class="form-control" value="<?php echo ($res[0]["factoryId"]); ?>" readonly="readonly"></td>
                            <td><p>所在车间:</p></td><td><input  class="form-control" value="<?php echo ($res[0]["workshopId"]); ?>" readonly="readonly"></td></tr>
                        <tr><td><p>所属装置:</p></td><td><input  class="form-control" value="<?php echo ($res[0]["areaId"]); ?>" readonly="readonly"></td>
                            <td><p>设备位号:</p></td><td><input  class="form-control" value="<?php echo ($res[0]["plantNO"]); ?>" readonly="readonly"></td></tr>
                        <tr><td><p>设备名称:</p></td><td><input  class="form-control" name="plantName" value="<?php echo ($res[0]["plantName"]); ?>"></td>
                            <td><p>油罐类型:</p></td><td>
                                <select class="form-control" name="OilTankType" title="<?php echo ($res[0]["OilTankType"]); ?>">
                                    <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '19'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                        </tr>
                        <tr><td><p>主要设备:</p></td><td>
                            <select class="form-control" name="IsMainPlant" title="<?php echo ($res[0]["IsMainPlant"]); ?>">
                                <option value="1">是</option>
                                <option value="0">否</option>
                            </select>
                        </td>
                            <td><p>使用状态:</p></td><td>
                                <select class="form-control" name="useStatus" title="<?php echo ($res[0]["useStatus"]); ?>">
                                    <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '29'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td></tr>
                        <tr><td><p>罐体高度(mm):</p></td><td><input class="spinner"  name="H" value=<?php echo ($res[0]["H"]); ?>></td><td><p>油罐直径(mm):</p></td><td><input class="spinner" name="D" value=<?php echo ($res[0]["D"]); ?>></td></tr>
                        <tr><td><p>公称容量(m³):</p></td><td><input class="spinner" name="V" value=<?php echo ($res[0]["V"]); ?>></td><td><p>安全填充高度(m):</p></td><td><input class="spinner" name="fillH" value=<?php echo ($res[0]["fillH"]); ?>></td></tr>
                        <tr><td><p>储罐重量(kg):</p></td><td><input class="spinner" name="W" value=<?php echo ($res[0]["W"]); ?>></td>
                            <td><p>储存介质:</p></td><td>
                                <select  class="form-control" name="storeMedium" title="<?php echo ($res[0]["storeMedium"]); ?>">
                                    <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '23'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td></tr>
                        <tr><td><p>介质pH值:</p></td><td>
                            <input class="spinner"  name="mediumpH" value=<?php echo ($res[0]["mediumpH"]); ?>>
                        </td>
                            <td>
                                <p>介质比重(kg/m³):</p></td><td><input class="spinner" name="mediumPercentage" value=<?php echo ($res[0]["mediumPercentage"]); ?>>
                            </td>
                        </tr>
                        <tr><td><p>介质含水:</p></td><td>
                            <select class="form-control" name="isMediumWater" title="<?php echo ($res[0]["isMediumWater"]); ?>">
                                <option value=1>是</option>
                                <option value=0>否</option>
                            </select>
                        </td>
                            <td><p>介质毒性:</p></td><td>
                                <select class="form-control" name="mediumPoison" title="<?php echo ($res[0]["mediumPoison"]); ?>">
                                    <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '18'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                        </tr>
                        <tr><td><p>介质火灾危险性:</p></td><td>
                            <select class="form-control" name="mediumFire" title="<?php echo ($res[0]["mediumFire"]); ?>">
                                <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '17'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </td>
                            <td><p>介质碳原子数:</p></td><td>
                                <select class="form-control" name="mediumC" title="<?php echo ($res[0]["mediumC"]); ?>">
                                    <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '16'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td></tr>
                        <tr><td><p>介质动力粘度(N*S/㎡):</p></td>
                            <td><input class="spinner" name="mediumDyViscosity" value=<?php echo ($res[0]["mediumDyViscosity"]); ?>></td>
                            <td><p>地理环境:</p></td><td>
                                <select class="form-control" name="geographyEnvironment" title="<?php echo ($res[0]["geographyEnvironment"]); ?>">
                                    <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '11'): ?><option value=<?php echo ($vo["value"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td></tr>
                        <tr><td><p>操作温度(℃):</p></td><td><input name="operateTemp" class="spinner" value=<?php echo ($res[0]["operateTemp"]); ?>></td>
                            <td><p>设计温度(℃):</p></td><td><input name="designTemp" class="spinner" value=<?php echo ($res[0]["designTemp"]); ?>></td></tr>
                        <tr><td><p>操作压力(KPa):</p></td><td><input name="operatePresure" class="spinner" value=<?php echo ($res[0]["operatePresure"]); ?>></td>
                            <td><p>设计压力(KPa):</p></td><td><input name="designPresure" class="spinner" value=<?php echo ($res[0]["designPresure"]); ?>></td></tr>
                        <tr><td><p>储罐密封形式:</p></td><td>
                            <select class="form-control" name="sealType" title="<?php echo ($res[0]["sealType"]); ?>">
                                <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '22'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </td><td><p>破裂口尺寸(mm):</p></td><td>
                            <input name="breakSize" class="spinner" value=<?php echo ($res[0]["breakSize"]); ?>></td>
                            </td></tr>
                        <tr><td><p>投用日期:</p></td><td><input type="datePicker" name="useDate" class="form-control" value=<?php echo ($res[0]["useDate"]); ?>><p class="calendarIcon"><span class="glyphicon glyphicon-calendar" ></span></p></td>
                            <td><p>技术状况:</p></td><td>
                                <select class="form-control" name="techniqueStatus" title="<?php echo ($res[0]["techniqueStatus"]); ?>">
                                    <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '35'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </select></td></tr>
                        <tr><td><p>安装规范:</p></td><td>
                            <input class="form-control" value="<?php echo ($res[0]["installStandard"]); ?>" name="installStandard">
                        </td>
                            <td><p>设计规范:</p></td><td>
                                <input class="form-control" value="<?php echo ($res[0]["designStandard"]); ?>" name="designStandard"></td></tr>
                        <tr><td><p>计量管理类别:</p></td><td>
                            <select class="form-control" name="measureAdminType" title="<?php echo ($res[0]["measureAdminType"]); ?>">
                                <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '15'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select></td>
                            <td><p>维修设计依据:</p></td><td><select class="form-control" name="mantenanceBasis" title="<?php echo ($res[0]["mantenanceBasis"]); ?>">
                                <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '13'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select></td></tr>
                        <tr><td><p>环境敏感度:</p></td><td>
                            <select class="form-control" name="sensitiveEnvironment" title="<?php echo ($res[0]["sensitiveEnvironment"]); ?>">
                                <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '21'): ?><option value=<?php echo ($vo["value"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select></td>
                            <td><p>土壤基础类型:</p></td><td>
                                <select class="form-control" name="soilFoundation" title="<?php echo ($res[0]["soilFoundation"]); ?>">
                                    <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '2'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </select></td></tr>
                        <tr><td><p>安装单位:</p></td><td><input name="installCompany" class="form-control" value=<?php echo ($res[0]["installCompany"]); ?>></td>
                            <td><p>安装日期:</p></td><td><input name="installDate" type="datePicker" class="form-control" value="<?php echo ($res[0]["installDate"]); ?>"/><p class="calendarIcon"><span class="glyphicon glyphicon-calendar" ></span></p></td></tr>
                        <tr><td><p>检验单位:</p></td><td><input name="checkCompany" class="form-control" value="<?php echo ($res[0]["checkCompany"]); ?>"/></td>
                            <td><p>设计单位:</p></td><td><input name="designCompany" class="form-control" value=<?php echo ($res[0]["designCompany"]); ?>></td></tr>
                        <tr><td><p>检验日期:</p></td><td><input name="checkDate" type="datePicker" class="form-control" value="<?php echo ($res[0]["checkDate"]); ?>"/><p class="calendarIcon"><span class="glyphicon glyphicon-calendar" ></span></p></td>
                            <td><p>下次检验日期:</p></td><td><input name="nextCheckDate" type="datePicker" class="form-control" value="<?php echo ($res[0]["nextCheckDate"]); ?>"/><p class="calendarIcon"><span class="glyphicon glyphicon-calendar" ></span></p></td></tr>
                        <tr><td><p>年度检查日期:</p></td><td><input name="yearCheckDate" type="datePicker" class="form-control" value="<?php echo ($res[0]["yearCheckDate"]); ?>"/><p class="calendarIcon"><span class="glyphicon glyphicon-calendar" ></span></p></td>
                            <td><p>下次年度检查日期:</p></td><td><input name="nextYearCheckDate" type="datePicker" class="form-control" value="<?php echo ($res[0]["nextYearCheckDate"]); ?>"><p class="calendarIcon"><span class="glyphicon glyphicon-calendar" ></span></p></td></tr>
                        <tr><td><p>备注信息:</p></td><td colspan="3"><textarea name="remark" class="form-control"><?php echo ($res[0]["remark"]); ?></textarea></td></tr>
                        </tbody>
                    </table>
                </div>
                <div id="tab2">
                    <table class="borderedDetail">
                        <tbody>
                        <tr><td><p>底板类型:</p></td><td>
                            <select class="form-control" name="bottomType" title="<?php echo ($res[0]["bottomType"]); ?>">
                                <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '4'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </td>
                            <td><p>底板连接型式:</p></td><td>
                                <select class="form-control" name="bottomLinkType" title="<?php echo ($res[0]["bottomLinkType"]); ?>">
                                    <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '30'): ?><option value="<?php echo ($vo["key"]); ?>"><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                        </tr>
                        <tr><td><p>边缘板材质:</p></td><td>
                            <select class="form-control" name="bottomEdgeMaterial" title="<?php echo ($res[0]["bottomEdgeMaterial"]); ?>">
                                <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '14'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </td><td><p>边缘板名义厚度(mm):</p></td><td><input class="form-control" name="bottomEdgeNamelyThickness" value="<?php echo ($res[0]["bottomEdgeNamelyThickness"]); ?>"></td></tr>
                        <tr><td><p>中幅板材质:</p></td><td>
                            <select class="form-control" name="bottomMiddleMaterial" title="<?php echo ($res[0]["bottomMiddleMaterial"]); ?>">
                                <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '14'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </td>
                            <td><p>中幅板名义厚度(mm):</p></td>
                            <td><input name="bottomMiddleNamelyThickness" class="form-control" value="<?php echo ($res[0]["bottomMiddleNamelyThickness"]); ?>"></td></tr>
                        <tr>
                            <td>
                                <p>底板投用日期:</p></td><td><input name="bottomUseDate" type="datePicker" class="form-control" value="<?php echo ($res[0]["bottomUseDate"]); ?>"/>
                            <p class="calendarIcon"><span class="glyphicon glyphicon-calendar" ></span></p>
                        </td>
                            <td>
                                <p>底板更换日期:</p></td><td><input name="bottomReplaceDate" type="datePicker" class="form-control" value="<?php echo ($res[0]["bottomReplaceDate"]); ?>"/>
                            <p class="calendarIcon"><span class="glyphicon glyphicon-calendar" ></span></p>
                        </td>

                        </tr>

                        <tr><td><p>是否有涂层:</p></td><td>
                            <select class="form-control" name="isBottomLining" title="<?php echo ($res[0]["isBottomLining"]); ?>">
                                <option value=1>是</option>
                                <option value=0>否</option>
                            </select>
                        </td>
                            <td><p>是否有衬里:</p></td><td>
                                <select class="form-control" name="isBottomLining" title="<?php echo ($res[0]["isBottomLining"]); ?>">
                                    <option value=1>是</option>
                                    <option value=0>否</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><p>涂层质量:</p></td><td>
                            <select class="form-control" name="bottomCoatingStatus" title="<?php echo ($res[0]["bottomCoatingStatus"]); ?>">
                                <option value=3>高</option>
                                <option value=2>中</option>
                                <option value=1>低</option>
                            </select></td>
                            <td><p>衬里质量:</p></td><td>
                            <select class="form-control" name="bottomLiningStatus" title="<?php echo ($res[0]["bottomLiningStatus"]); ?>">
                                <option value=3>高</option>
                                <option value=2>中</option>
                                <option value=1>低</option>
                            </select></td>

                        </tr>
                        <tr><td><p>涂层涂装日期:</p></td><td>
                            <input name="bottomCoatingUseDate" type="datePicker" class="form-control" value="<?php echo ($res[0]["bottomCoatingUseDate"]); ?>"/>
                            <p class="calendarIcon"><span class="glyphicon glyphicon-calendar" ></span></p>
                        </td>
                            <td><p>衬里安装日期:</p></td><td>
                                <input name="bottomLiningUseDate" type="datePicker" class="form-control" value="<?php echo ($res[0]["bottomLiningUseDate"]); ?>"/>
                                <p class="calendarIcon"><span class="glyphicon glyphicon-calendar" ></span></p>
                            </td>
                        </tr>
                        <tr><td><p>土壤基础类型:</p></td><td>
                            <select class="form-control" name="bottomGasketSoil" title="<?php echo ($res[0]["bottomGasketSoil"]); ?>">
                                <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '2'): ?><option value=<?php echo ($vo["value"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </td>
                            <td><p>基础形式:</p></td><td>
                                <select class="form-control" name="bottomGasket" title="<?php echo ($res[0]["bottomGasket"]); ?>">
                                    <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '74'): ?><option value=<?php echo ($vo["value"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td></tr>
                        <tr>
                            <td><p>是否有阴极保护:</p></td><td>
                            <select class="form-control" name="bottomCathodeProtect" title="<?php echo ($res[0]["bottomCathodeProtect"]); ?>">
                                <option value=1>是</option>
                                <option value=0>否</option>
                            </select>
                        </td>
                            <td><p>阴极保护方法:</p></td><td>
                            <select class="form-control" name="bottomCathodeProtectMethod" title="<?php echo ($res[0]["bottomCathodeProtectMethod"]); ?>">
                                <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '34'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </td></tr>
                        <tr><td><p>是否安装加热器:</p></td><td>
                            <select class="form-control" name="isBottomInstallHeater" title="<?php echo ($res[0]["isBottomInstallHeater"]); ?>">
                                <option value=1>是</option>
                                <option value=0>否</option>
                            </select>
                        </td><td><p>加热器型式:</p></td><td>
                            <select class="form-control" name="bottomHeaterType" title="<?php echo ($res[0]["bottomHeaterType"]); ?>">
                                <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '33'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </td></tr>
                        <tr><td><p>雨水排放能力:</p></td><td>
                            <select class="form-control" name="bottomRainAbility" title="<?php echo ($res[0]["bottomRainAbility"]); ?>">
                                <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '3'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </td><td><p>罐底到地下水的距离(m):</p></td>

                            <td>
                                <input class="spinner" name="bottomToWaterDistance" value="<?php echo ($res[0]["bottomToWaterDistance"]); ?>"/>
                            </td></tr>
                        <tr><td><p>是否安装防火堤:</p></td><td>
                            <select class="form-control" name="isBottomInstallFireProtection" title="<?php echo ($res[0]["isBottomInstallFireProtection"]); ?>">
                                <option value=1>是</option>
                                <option value=0>否</option>
                            </select>
                        </td>

                            <td><p>是否有泄漏探测系统:</p></td>
                            <td>
                                <select class="form-control" name="isBottomInstallLeakDectect" title="<?php echo ($res[0]["isBottomInstallLeakDectect"]); ?>">
                                    <option value=1>是</option>
                                    <option value=0>否</option>
                                </select>
                            </td>
                        </tr>
                        <tr><td><p>储罐基础沉降评价:</p></td><td>
                            <select class="form-control" name="tankFoundationSettlement" title="<?php echo ($res[0]["tankFoundationSettlement"]); ?>">
                                <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '75'): ?><option value=<?php echo ($vo["value"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </td>
                            <td><p>溢出围堰流体比(%):</p></td>
                            <td>
                                <input class="spinner" name="overflowPercentage" value="<?php echo ($res[0]["overflowPercentage"]); ?>"/>
                            </td></tr>
                        <tr><td><p>溢出围堰但仍在罐区内，地表土壤的流体百分比(%)：</p></td><td>
                            <input class="spinner" name="overflowPercentageIn" value="<?php echo ($res[0]["overflowPercentageIn"]); ?>"/>
                        </td>
                            <td><p>溢出围堰且已流到罐区外，地表土壤中的流体百分比(%):</p></td><td>
                                <input class="spinner" name="overflowPercentageOut" value="<?php echo ($res[0]["overflowPercentageOut"]); ?>"/>
                            </td></tr>
                        <tr><td><p>停产造成的损失(万元)：</p></td><td>
                            <input class="spinner" name="stopLoss" value="<?php echo ($res[0]["stopLoss"]); ?>"/>
                        </td><td><p>失效后果可接受基准(万元):</p></td><td>
                            <input class="spinner" name="failConseqenceAccept" value="<?php echo ($res[0]["failConseqenceAccept"]); ?>"/>
                        </td></tr>

                        </tbody>
                    </table>
                </div>
                <div id="tab3">
                    <table class="borderedDetail">
                        <tbody>
                        <tr><td><p>壁板连接型式:</p></td><td>
                            <select class="form-control" name="wallboardLinkType" title="<?php echo ($res[0]["wallboardLinkType"]); ?>">
                                <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '30'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select></td>
                            <td><p>焊缝系数(φ):</p></td><td><input class="spinner" name="wallboardWeldCoefficient" value=<?php echo ($res[0]["wallboardWeldCoefficient"]); ?>></td>
                        </tr>
                        <tr><td><p>是否有保温层:</p></td><td>
                            <select class="form-control" name="isWallboardKeepWarm" title="<?php echo ($res[0]["isWallboardKeepWarm"]); ?>">
                                <option value=1>是</option>
                                <option value=0>否</option>
                            </select>
                        </td>
                            <td><p>是否有涂层:</p></td><td>
                                <select class="form-control" name="isWallboardCoating" title="<?php echo ($res[0]["isWallboardCoating"]); ?>">
                                    <option value=1>是</option>
                                    <option value=0>否</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><p>保温层质量:</p></td><td>
                            <select class="form-control" name="wallboardKeepWarmStatus" title="<?php echo ($res[0]["wallboardKeepWarmStatus"]); ?>">
                                <option value=3>高</option>
                                <option value=2>中</option>
                                <option value=1>低</option>
                            </select>
                        </td>
                            <td><p>涂层质量:</p></td><td>
                            <select class="form-control" name="wallboardCoatingStatus" title="<?php echo ($res[0]["wallboardCoatingStatus"]); ?>">
                                <option value=3>高</option>
                                <option value=2>中</option>
                                <option value=1>低</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td><p>保温层安装日期:</p></td><td>
                            <input name="wallboardKeepWarmUseDate" type="datePicker" class="form-control" value="<?php echo ($res[0]["wallboardKeepWarmUseDate"]); ?>"><p class="calendarIcon"><span class="glyphicon glyphicon-calendar" ></span></p>
                        </td>
                            <td><p>涂层涂装日期:</p></td><td>
                            <input name="wallboardCoatingUseDate" type="datePicker" class="form-control" value="<?php echo ($res[0]["wallboardCoatingUseDate"]); ?>"><p class="calendarIcon"><span class="glyphicon glyphicon-calendar" ></span></p>
                        </td>
                        </tr>
                        <tr><td><p>是否有衬里:</p></td><td>
                            <select class="form-control" name="isWallboardLining" title="<?php echo ($res[0]["isWallboardLining"]); ?>">
                                <option value=1>是</option>
                                <option value=0>否</option>
                            </select>
                        </td>
                            <td><p>衬里质量:</p></td><td>
                                <select class="form-control" name="wallboardLiningStatus" title="<?php echo ($res[0]["wallboardLiningStatus"]); ?>">
                                    <option value=3>高</option>
                                    <option value=2>中</option>
                                    <option value=1>低</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><p>衬里安装日期:</p></td><td>
                            <input name="wallboardLiningUseDate" type="datePicker" class="form-control" value="<?php echo ($res[0]["wallboardLiningUseDate"]); ?>"><p class="calendarIcon"><span class="glyphicon glyphicon-calendar" ></span></p>
                        </td>
                            <td><p>是否焊后热处理:</p></td><td>
                            <select class="form-control" name="isHeatTreatAfterWeld" title="<?php echo ($res[0]["isHeatTreatAfterWeld"]); ?>">
                                <option value=1>是</option>
                                <option value=0>否</option>
                            </select></td></tr>

                        <tr><td><p>是否安装加热器:</p></td><td>
                            <select class="form-control" name="isWallboardInstallHeater" title="<?php echo ($res[0]["isWallboardInstallHeater"]); ?>">
                                <option value=1>是</option>
                                <option value=0>否</option>
                            </select>
                        </td><td><p>加热器型式:</p></td><td>
                            <select class="form-control" name="wallboardHeaterType" title="<?php echo ($res[0]["wallboardHeaterType"]); ?>">
                                <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '33'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </td></tr>
                        <tr><td><p>腐蚀速率报警线:</p></td><td>
                            <input name="ErosionAlarmSpeed" type="text" class="form-control spinner" value="<?php echo ($res[0]["ErosionAlarmSpeed"]); ?>">
                        </td>
                            <td><p>壁板数量:</p></td><td>
                                <input name="layerCount" type="text" class="form-control spinner" value="<?php echo ($res[0]["layerCount"]); ?>">
                            </td></tr>
                        </tbody>
                    </table>
                    <!--<div class="wallEdit">-->
                    <button type="button" id="wallEditBtn" class="btn btn-default wallboardEdit" style="float: right;margin-bottom: 10px">新增壁板</button>
                    <table class="bordered wallboardEdit" >
                        <thead>
                        <tr><th rowspan="2">壁板序号</th><th rowspan="2">投用日期</th><th rowspan="2">壁板材料</th><th rowspan="2">壁板高度</br>(mm)</th><th rowspan="2">名义厚度(mm)</th><th>操作</th></tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($res[0]['Plantwallboardinfo'])): $i = 0; $__LIST__ = $res[0]['Plantwallboardinfo'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$wa): $mod = ($i % 2 );++$i;?><tr data-row-id="<?php echo ($wa["id"]); ?>">
                                <td class="layerNO"><?php echo ($wa["layerNO"]); ?></td>
                                <td class="useDate"><?php echo ($wa["useDate"]); ?></td>
                                <td class="material"><?php echo ($wa["material"]); ?></td>
                                <td class="height"><?php echo ($wa["height"]); ?></td>
                                <td class="namelyThickness"><?php echo ($wa["namelyThickness"]); ?></td>
                                <td><a style="padding-right: 5px" class="edit"><span>编辑</span></a><a class="delete"><span>删除</span></a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <!--</div>-->
                </div>
                <div id="tab4">
                    <table class="borderedDetail">
                        <tbody>
                        <tr>
                            <td><p>顶板型式:</p></td><td>
                            <select class="form-control" name="topStyle" title="<?php echo ($res[0]["topStyle"]); ?>">
                                <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '27'): ?><option value="<?php echo ($vo["key"]); ?>"><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select></td>
                            <td><p>顶板材质</p></td><td>
                            <select class="form-control" name="topMaterial" title="<?php echo ($res[0]["topMaterial"]); ?>">
                                <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '14'): ?><option value="<?php echo ($vo["key"]); ?>"><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </td></tr>
                        <tr><td><p>顶板厚度(mm):</p></td><td>
                            <input class="spinner" name="topThickness" value="<?php echo ($res[0]["topThickness"]); ?>"/>
                        </td>
                            <td><p>起浮高度(m):</p></td><td>
                                <input class="spinner" name="topStartHeight" value="<?php echo ($res[0]["topStartHeight"]); ?>"/>
                            </td></tr>
                        <tr>
                            <td><p>投用日期:</p></td><td><input class="form-control" type="datePicker" name="topUseDate" value="<?php echo ($res[0]["topUseDate"]); ?>"/><p class="calendarIcon"><span class="glyphicon glyphicon-calendar" ></span></p></td>
                            <td><p>更换日期:</p></td><td><input class="form-control" type="datePicker" name="topReplaceDate" value="<?php echo ($res[0]["topReplaceDate"]); ?>"/><p class="calendarIcon"><span class="glyphicon glyphicon-calendar" ></span></p></td>
                        </tr>
                        <tr>
                            <td><p>是否有保温:</p></td><td>
                            <select class="form-control" name="isTopKeepWarm" title="<?php echo ($res[0]["isTopKeepWarm"]); ?>">
                                <option value=1>是</option>
                                <option value=0>否</option>
                            </select>
                        </td>
                            <td><p>保温层材料:</p></td><td>
                            <select class="form-control" name="topKeepWarmMaterial" title="<?php echo ($res[0]["topKeepWarmMaterial"]); ?>">
                                <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '14'): ?><option value="<?php echo ($vo["key"]); ?>"><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select></td>
                        </tr>
                        <tr><td><p>保温层质量:</p></td><td>
                            <select class="form-control" name="topKeepWarmStatus" title="<?php echo ($res[0]["topKeepWarmStatus"]); ?>">
                                <option value=3>高</option>
                                <option value=2>中</option>
                                <option value=1>低</option>
                            </select>
                        </td><td></td><td></td></tr>
                        </tbody>
                    </table>
                </div>

            </form>
            <div id="tab5">
                <form action="<?php echo U('Public/upload');?>" enctype="multipart/form-data" method="post" id="upload">
                    <input type="hidden" name="id" value="<?php echo ($res[0]["id"]); ?>" id="id">
                    <input type="hidden" name="tableId" value="tb_plantinfo">
                    <!--<input type="text" name="name" />-->
                    <span class="input-group" style="width: 50%;">
                        <input type="file" name="photo"  style="display: none"/>
                        <input type="text" class="form-control filePath"  disabled="disabled"/>
					<span class="input-group-btn">
						<button class="btn btn-default chooseFile" type="button">
                            浏览
                        </button>
                        <button class="btn btn-default" type="submit">
                            上传
                        </button>
					</span>
                    </span>
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

<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                新增储罐设备
            </div>
            <div class="modal-body">
                <form method="post" id="tankInfoAdd" action="<?php echo U('Manage/add');?>"/>
                <table class="borderedDetail">
                    <tbody>
                    <tr><td>请选择厂区：</td><td> <select name="factory" class="form-control">
                        <option disabled="disabled" selected="selected">--请选择厂区--</option>
                        <?php if(is_array($factorySelect)): $i = 0; $__LIST__ = $factorySelect;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fs): $mod = ($i % 2 );++$i;?><option value="<?php echo ($fs["factoryId"]); ?>"><?php echo ($fs["factoryId"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select></td></tr>
                    <tr><td>请选择车间：</td><td>
                        <select name="workshop" class="form-control">
                            <option disabled="disabled" selected="selected">--请选择车间--</option>
                            <?php if(is_array($workshopSelect)): $i = 0; $__LIST__ = $workshopSelect;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fs): $mod = ($i % 2 );++$i;?><option value="<?php echo ($fs["workshopId"]); ?>"><?php echo ($fs["workshopId"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td></tr>
                    <tr><td>请选择装置：</td><td>
                        <select name="area" class="form-control">
                            <option disabled="disabled" selected="selected">--请选择装置--</option>
                        </select>
                    </td></tr>
                    <tr><td>请选择设备：</td><td>
                        <input name="plant" value="" class="form-control"  placeholder="请填写新增设备尾号"/>
                    </td></tr>
                    </tbody>
                </table>
                <input name="index" value=1 style="display: none">
                <button id="fat-btn" class="btn btn-block" data-loading-text="Loading..."
                        type="submit"> 提交
                </button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<!-- 模态框（Modal） -->
<div class="modal fade" id="addWallboardModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" >新增壁板</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="addWallboard" action="<?php echo U('Manage/addTankinfoWallboard');?>"/>
                <input name="pid" type="hidden" value="<?php echo ($res[0]["id"]); ?>">
                <input name="index" type="hidden" value="">
                <table class="borderedDetail">
                    <tbody>
                    <tr><td>壁板层号：</td><td><input name="layerNO" value="" class="form-control"  placeholder="请填写壁板层号"/></td></tr>
                    <tr><td>投用日期：</td><td>
                        <input name="useDate" type="datePicker" class="form-control" value="<?php echo ($NowTime); ?>"/>
                        <p class="calendarIcon"><span class="glyphicon glyphicon-calendar" ></span></p>
                    </td></tr>
                    <tr><td>壁板材料：</td><td>
                        <select class="form-control" name="material">
                            <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '14'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td></tr>
                    <tr><td>壁板高度(m)：</td><td>
                        <input name="height" value="" class="spinner form-control"/>
                    </td></tr>
                    <tr><td>名义厚度(mm)：</td><td>
                        <input name="namelyThickness" value="" class="spinner form-control"/>
                    </td></tr>
                    </tbody>
                </table>
                <button class="btn btn-block" data-loading-text="Loading..." style="background-color: #0b80c9;color: #fffff9"
                        type="submit"> 提交
                </button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<script src="/www/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/www/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/www/Public/Home/js/jquery.form.js"></script>
<script type="text/javascript" src="/www/Public/Home/js/jquery-ui.min.js"></script>
<script src="/www/Public/Home/js/linkageMenu.js" type="text/javascript"></script>
<script src="/www/Public/Home/js/getSelectedOption.js" type="text/javascript"></script>
<script type="text/javascript" src="/www/Public/Home/js/jquery.cookie.js"></script>
<script>
//    tabs页面的相关js代码
    $(function() {
        var tabs_index=$.cookie('tabs_index');
        if(tabs_index==undefined){
            var index=0;
        }else{
            var index=$.cookie('tabs_index');
        }
        $("#content div").hide(); // Initially hide all content
        $("#tabs li").eq(index).attr("id","current"); // Activate first tab
        $("#content div").eq(index).fadeIn(); // Show first tab content
        $('#tabs a').click(function(e) {
            e.preventDefault();
            $("#content div").hide(); //Hide all content
            $("#tabs li").attr("id",""); //Reset id's
            $(this).parent().attr("id","current"); // Activate this
            $.cookie('tabs_index', $(this).parent().index());
            $('#' + $(this).attr('title')).fadeIn();
        })
//根据返回权限值显示权限
        $(".Access").each(function(){
            if($(this).attr("data-access")){
                $(this).show();
            }else{
                $(this).hide();
            };
        })

        $("#tankInfoEdit").ajaxForm({
            beforeSubmit: function showRequest() {
                if(confirm("确定要修改数据吗？")) {}else{
                    return false;
                }
            },
            success: function showResponse(responseText) {
                alert(responseText);
                location.reload();
            }
        });
//        新增form表单ajax提交
        var options = {
            beforeSubmit:  showRequest,  // 提交前
            success:       showResponse // 提交后
        }
        $('#tankInfoAdd').ajaxForm(options);
        //提交前进行表单验证
        function showRequest(formData){
            if(formData[0].value=='--请选择厂区--'){
                alert("必须选定一个厂区！！");
            }
            if(formData[1].value=='--请选择车间--'){
                alert("必须选定一个车间！！");
            }
            if(formData[2].value=='--请选择装置--'){
                alert("必须选定一个装置！！");
            }
            if (!formData[3].value) {
                alert('必须填写储罐位号！！')
                return false;
            }

        }


        //提交后进进行相关的操作
        function showResponse(data){
            if(data.status==0){
                alert(data.msg);
            }else if(data.status==1){
                alert(data.msg);
                location.href="tankInfoEdit.html?id="+data.id;
                $.cookie('tabs_index', 0);
            }
        }

        //        壁板编辑的相关操作
        $(".wallboardEdit tr .delete").click(function(){
            var id=$(this).parents("tr").attr("data-row-id");
            if(confirm("确定要删除数据吗")) {
                $.post("<?php echo U('Manage/deleteTankinfoWallboard');?>",{id:id},function(data){
                         alert(data.msg);
                         location.reload();
                },"JSON")
                return false; //阻止表单默认提交
            }else{
                return false;
            }
        });

        $(".wallboardEdit tr .edit").click(function(){
            $("#addWallboardModal").modal("show");
            $("#addWallboardModal .modal-title").html('').html("编辑壁板");
             var layerNO=$(this).parent().siblings(".layerNO").text();
             var useDate=$(this).parent().siblings(".useDate").text();
             var material=$(this).parent().siblings(".material").text();
             var height=$(this).parent().siblings(".height").text();
             var namelyThickness=$(this).parent().siblings(".namelyThickness").text();
             $("#addWallboardModal").find("input[name='index']").val(2);
             $("#addWallboardModal").find("input[name='layerNO']").val(layerNO);
             $("#addWallboardModal").find("input[name='useDate']").val(useDate);
             $("#addWallboardModal select").find("option[text="+material+"]").attr("selected", true);
             $("#addWallboardModal").find("input[name='height']").val(height);
             $("#addWallboardModal").find("input[name='namelyThickness']").val(namelyThickness);

        });
        $("#wallEditBtn").click(function(){
            $("#addWallboardModal .modal-title").html('').html("新增壁板");
            $("#addWallboardModal").find("input[name='index']").val(1);
            var layerNO=$(".wallboardEdit tbody tr").length;
            $("#addWallboardModal").find("input[name='layerNO']").val(layerNO+1);
//            $("#addWallboardModal").find("input[name='useDate']").val('');
            $("#addWallboardModal").find("input[name='height']").val('');
            $("#addWallboardModal").find("input[name='namelyThickness']").val('');
            $("#addWallboardModal").modal("show");
        });
        $("#addWallboard").ajaxForm({
            beforeSubmit: function showRequest() {
                if(confirm("确定要新增壁板吗？")) {}else{
                    return false;
                }
            },
            success: function showResponse(data) {
                var isLoad=data.load;
                if(isLoad==0){
                    alert(data.msg);
                }else if(isLoad==1){
                    alert(data.msg);
                    location.reload();
                }
            }
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
        //激活spin插件
        var spinner = $( ".spinner" ).spinner();

        $("#upload .input-group").show();
        $("#upload .chooseFile").click(function(){
            $("#upload input[type='file']").click();
        })
        $("#upload input[type='file']").change(function(){
            $("#upload .filePath").val($(this).val());
        })
        //        附件上传
        $("#upload").ajaxForm({
            beforeSubmit:  function showRequest(){
            },  // 提交前
            success: function showResponse(data){
                alert(data.msg);
                location.reload();
            }
        });
//        附件删除
        $("#tab5 tbody tr .delete").click(function(){
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