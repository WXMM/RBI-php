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
    <link rel="stylesheet" href="/www/Public/Home/css/box.css" type="text/css">
    <style>
        #content .tab{
            padding-top: 10px;
        }
        /*#content a:hover{*/
            /*background-color: rgb(244, 244, 244);*/
        /*}*/
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
        .breadcrumb > li + li:before {
            color: #CCCCCC;
            content: " > ";
            padding: 0 5px;
        }
        .form-control{
            border: none;
        }
        .panel-heading:hover{
            cursor: pointer;
        }
        .panel-heading{
            height: 40px;
        }
        .panel-title{
            width: 30%;
            float: left;
        }
        .panel-body{
            display: none;
        }
        .label{
            margin-left: 10px;
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
        .tankInfoDetail h4{
            width: 100%;
            /*float: left;*/

        }
    </style>
    <title></title>
</head>
<body>
<ol class="breadcrumb" style="background-color: transparent;float: left; height: 30px;width: 100%">
    <li class="active">完整性评价</li>
    <li class="active">风险分析</li>
    <li><a href="<?php echo U('RiskCalculation/riskCalList');?>">储罐设备列表</a></li>
    <li class="active">风险计算</li>
</ol>
<div class="tankInfoDetail" style="width:98%;margin-right: auto;margin-left: auto">
    <table class="borderedDetail">
        <tbody>
        <tr>
            <td><p>所在厂区:</p></td><td class="floorMiddleCorrosionSpeed"><?php echo ($res[0]["factoryId"]); ?></td>
            <td><p>所在车间:</p></td><td class="floorEdgeCorrosionSpeed"><?php echo ($res[0]["workshopId"]); ?></td>
            <td><p>设备名称:</p></td><td class="floorMiddleDamageFactor"><?php echo ($res[0]["plantName"]); ?></td></tr>
        <tr><td><p>设备位号:</p></td><td class="floorEdgeDamageFactor"><?php echo ($res[0]["plantNO"]); ?></td>
            <td><p>储存介质:</p></td><td class="floorDamageFactor"><?php echo ($res[0]["storeMedium"]); ?></td>
            <td><p>储罐罐型:</p></td><td class="floorFailPro"><?php echo ($res[0]["OilTankType"]); ?></td></tr>
        </tbody>
    </table>

    <div id="detail" style="width: 100%">
        <div class="tabbable">
            <ul id="tabs">
                <li>
                    <a href="" title="tab1">风险结果</a>
                </li>
                <li>
                    <a href="" title="tab2">风险计算</a>
                </li>
            </ul>
            <div id="content">
                <div id="tab1" class="tab">
                    <!-- <a href="#" class="btn btn-primary Access" data-access="<?php echo ($Access['IMPORT']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px"><span class="glyphicon glyphicon-import" style="margin-right:5px "></span>导入</a> -->
                    
                    <!--<a href="<?php echo U('PHPExcel/test',array('id' => $res[0]['id']));?>" >测试</a>-->
                    <a href="<?php echo U('Excel/create_xlsx',array('id' => $res[0]['id']));?>" class="btn btn-primary Access" data-access="<?php echo ($Access['EXPORT']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px"><span class="glyphicon glyphicon-export" style="margin-right:5px "></span>导出风险计算结果</a>
                    <div id="riskRecordId" data-data="<?php echo ($riskDetail[0]['id']); ?>"></div>
                    <!-- <a href="<?php echo U('PHPExcel/test');?>">测试</a> -->
                    <div style="width: 100%;margin:10px auto;">
                        <!-- box容器 start -->
                        <div class="box-container">
                            <!-- box标题块 -->
                            <div class="box-head box-head-list">
                                <h3>壁板分析结果</h3>
                            </div>
                            <!-- box列表块 -->
                            <div class="wallRisk">
                                <ol>
                                    <table class="bordered needMore">
                                        <thead><th>壁板序号</th><th>测点序号</th><th>损伤因子</th><th>腐蚀速率</th><th>腐蚀速率类型</th></thead>
                                        <tbody>
                                        <?php if(is_array($riskWallList)): $i = 0; $__LIST__ = $riskWallList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rD): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($rD["layerNO"]); ?></td><td><?php echo ($rD["layerId"]); ?></td><td><?php echo ($rD["damageFactor"]); ?></td><td><?php echo ($rD["corrosionSpeed"]); ?></td><td><?php echo ($rD["thicknessType"]); ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                    </table>
                                    <div style="text-align: right" class="more"><a>查看更多</a>>>></div>

                                    <table class="borderedDetail">
                                        <tbody>
                                        <tr>
                                            <td><p>壁板损伤因子:</p></td><td class="wallDamageFactor"><?php echo ($riskDetail[0]['wallDamageFactor']); ?></td>
                                            <td><p>壁板后果等级:</p></td><td class="wallConsequenceLevel"><?php echo ($riskDetail[0]['wallConsequenceLevel']); ?></td>
                                            <td><p>失效可能性等级:</p></td><td class="wallFailPro"><?php echo ($riskDetail[0]['wallFailProLevel']); ?></td>
                                        </tr>
                                        <tr>
                                            <td><p>壁板风险等级:</p></td><td class="wallRiskLevel"><?php echo ($riskDetail[0]['wallRiskLevel']); ?></td>
                                            <td><p>风险最大测点:</p></td><td class="wallMajorRisk"><?php echo ($riskDetail[0]['wallMajorRisk']); ?></td>
                                            <td><p>下次检验日期:</p></td><td class="wallNextCheckDate"><?php echo ($riskDetail[0]['wallNextCheckDate']); ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="modal fade" id="myModal_wall" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                            data-dismiss="modal" aria-hidden="true">
                                                        &times;
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel_wall" style="font-size: 14px">
                                                        壁板损伤因子趋势图
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="wallDamageFactorFig" style="width: 550px;"></div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">关闭
                                                    </button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal -->
                                    </div>
                                    <div style="text-align: right" class="more"><a data-toggle="modal" data-target="#myModal_wall">查看损伤因子曲线</a>>>></div>
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
                                <h3>底板分析结果</h3>
                            </div>
                            <!-- box列表块 -->
                            <div class="floorRisk">
                                <ol>
                                    <div class="wallRisk" style="width: 100%;" >
                                        <table class="borderedDetail">
                                            <tbody>
                                            <tr>
                                                <td><p>中幅板腐蚀速率:</p></td><td class="floorMiddleCorrosionSpeed"><?php echo ($riskDetail[0]['floorMiddleCorrosionSpeed']); ?></td>
                                                <td><p>边缘板腐蚀速率:</p></td><td class="floorEdgeCorrosionSpeed"><?php echo ($riskDetail[0]['floorEdgeCorrosionSpeed']); ?></td>
                                                <td><p>中幅板损伤因子:</p></td><td class="floorMiddleDamageFactor"><?php echo ($riskDetail[0]['floorMiddleDamageFactor']); ?></td></tr>
                                            <tr><td><p>边缘板损伤因子:</p></td><td class="floorEdgeDamageFactor"><?php echo ($riskDetail[0]['floorEdgeDamageFactor']); ?></td>
                                                <td><p>底板损伤因子:</p></td><td class="floorDamageFactor"><?php echo ($riskDetail[0]['floorDamageFactor']); ?></td>
                                                <td><p>失效可能性等级:</p></td><td class="floorFailPro"><?php echo ($riskDetail[0]['floorFailProLevel']); ?></td></tr>
                                            <tr><td><p>底板后果等级:</p></td><td class="floorConsequenceLevel"><?php echo ($riskDetail[0]['floorConsequenceLevel']); ?></td>
                                                <td><p>底板风险等级:</p></td><td class="floorRiskLevel"><?php echo ($riskDetail[0]['floorRiskLevel']); ?></td>
                                                <td><p>下次检验日期:</p></td><td class="floorNextCheckDate"><?php echo ($riskDetail[0]['floorNextCheckDate']); ?></td></tr>
                                            <tr><td><p>风险最大部位:</p></td><td class="floorMajorRisk"><?php echo ($riskDetail[0]['floorMajorRisk']); ?></td>
                                                <td></td><td></td>
                                                <td></td><td></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </ol>
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close"
                                                        data-dismiss="modal" aria-hidden="true">
                                                    &times;
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel" style="font-size: 14px">
                                                    底板损伤因子趋势图
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div id="floorDamageFactorFig" style="width: 550px;"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">关闭
                                                </button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal -->
                                </div>
                                <div style="text-align: right" class="more"><a data-toggle="modal" data-target="#myModal">查看损伤因子曲线</a>>>></div>
                            </div>
                        </div>
                        <!-- box容器 end -->

                    </div>
                    <div style="width: 100%;margin:10px auto;">
                        <!-- box容器 start -->
                        <div class="box-container">
                            <!-- box标题块 -->
                            <div class="box-head box-head-list" >
                                <h3>风险分析记录</h3>
                            </div>
                            <!-- box列表块 -->
                            <div class="riskDoc" style="width: 100%;">
                                <ol>
                                    <!--风险分析记录-->
                                    <table id="riskRecordList" class="bordered needMore">
                                        <thead><th>风险计算日期</th><th>壁板风险等级</th><th>底板风险等级</th><th>是否报警</th><th>操作</th></thead>
                                        <tbody>
                                        <?php if(is_array($RiskList)): $i = 0; $__LIST__ = $RiskList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ri): $mod = ($i % 2 );++$i;?><tr data-alarm="<?php echo ($ri["isAlarm"]); ?>">
                                                <td><?php echo ($ri["countDate"]); ?></td>
                                                <td><?php echo ($ri["wallRiskLevel"]); ?></td>
                                                <td><?php echo ($ri["floorRiskLevel"]); ?></td>
                                                <td>
                                                    <?php switch($ri["isAlarm"]): case "0": ?>无报警<?php break;?>
                                                        <?php case "1": ?>有报警<?php break;?>
                                                        <?php default: ?>无报警<?php endswitch;?>
                                                    </td>
                                                <td>
                                                    <a class="read" href="riskBasedInfo.html?id=<?php echo ($res[0]["id"]); ?> &rId=<?php echo ($ri["id"]); ?>">查看<span style="display: none"><?php echo ($ri["id"]); ?></span></a>　
                                                    <a class="delete">删除<span style="display: none"><?php echo ($ri["id"]); ?></span></a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                    </table>
                                    <div style="text-align: right" class="more"><a>查看更多</a>>>></div>
                                </ol>
                                <!--<div style="text-align: right" class="more"><a>查看更多</a>>>></div>-->
                            </div>
                        </div>
                        <!-- box容器 end -->
                    </div>
                </div>
                <div id="tab2" class="tab" style="margin-bottom: 20px">
                    <div style="width: 100%">
                        <button type="button" class="btn btn-primary" id="calRiskBtn" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px">
                            <span class="glyphicon glyphicon-ok" style="margin-right:5px "></span>
                            风险计算
                        </button>
                        <div style="clear: both"></div>
                    </div>
                    <form id="calRisk" action="<?php echo U('Calculation/riskRate');?>" method="post">
                        <input name="id" style="display: none" value="<?php echo ($res[0]["id"]); ?>"/>
                        <button type="submit" class="calRisk" style="display: none"></button>
                    </form>

                    <div class="filter" style="width: 100%">
                        <div style="width: 49%;float: left">
                            <!-- box容器 start -->
                            <div class="box-container">
                                <!-- box标题块 -->
                                <div class="box-head box-head-list">
                                    <h3>壁板损伤机理</h3>
                                </div>
                                <!-- box列表块 -->
                                <div class="floorRisk">
                                    <ol>
                                        <div class="wallRisk" style="width: 100%;" >
                                            <table class="borderedDetail" style="width: 100%">
                                                <tbody>
                                                <tr>
                                                    <td><p>减薄损伤机理:</p></td><td><?php echo ($riskCalPara["wallThiningMechanism"]); ?></td>
                                                </tr>
                                                <tr><td><p>外部损伤机理:</p></td><td><?php echo ($riskCalPara["wallOutDamageMechanism"]); ?></td>
                                                </tr>
                                                <tr><td><p>应力腐蚀开裂机理:</p></td><td><?php echo ($riskCalPara["wallSCCMechanism"]); ?></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </ol>
                                    <div class="modal fade" id="myModal_wallFacFilter" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog " style="width: 80%">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                            data-dismiss="modal" aria-hidden="true">
                                                        &times;
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel_wallFacFilter" style="font-size: 14px">
                                                        壁板损伤机理筛选问题
                                                    </h4>
                                                </div>
                                                <form method="post" id="wallRiskCalPara" action="<?php echo U('Calculation/filterMechanism');?>">
                                                    <input type="text" name="triggerType" value=0 style="display: none"/>
                                                    <input type="text" name="pid" value="<?php echo ($res[0]["id"]); ?>" style="display: none"/>
                                                    <input type="text" name="mediumpH" value="<?php echo ($res[0]["mediumpH"]); ?>" style="display: none"/>
                                                    <input type="text" name="operateTemp" value="<?php echo ($res[0]["operateTemp"]); ?>" style="display: none"/>
                                                    <input type="text" name="isMediumWater" value="<?php echo ($res[0]["isMediumWater"]); ?>" style="display: none"/>
                                                    <input type="text" name="isKeepWarm" value="<?php echo ($res[0]["isWallboardKeepWarm"]); ?>" style="display: none"/>
                                                    <div class="modal-body">
                                                        <table class="borderedDetail">
                                                            <tbody>
                                                            <tr><td>运行温度℃</td><td><?php echo ($res[0]["operateTemp"]); ?></td><td>介质PH值</td><td><?php echo ($res[0]["mediumpH"]); ?></td></tr>
                                                            <tr><td>介质是否含水</td><td>
                                                                <?php switch($res[0]["isMediumWater"]): case "1": ?>是<?php break;?>
                                                                    <?php case "2": ?>否<?php break; endswitch;?></td>
                                                                <td>壁板是否有保温层</td><td><?php switch($res[0]["isWallboardKeepWarm"]): case "1": ?>是<?php break;?>
                                                                    <?php case "2": ?>否<?php break; endswitch;?></td></tr>
                                                            </tbody>
                                                        </table>
                                                        <table class="borderedDetail SCCFactor">
                                                            <tbody >
                                                            <tr>
                                                                <td style="width: 30%">储罐设备材料类别？<span style="color: #aa1111;font-weight: bolder">*</span></td>
                                                                <td style="width: 70%">
                                                                    <ul>
                                                                        <li><input type="radio"  name="materialType" value=1  /><span>碳钢</span></li>
                                                                        <li><input type="radio"  name="materialType" value=2  /><span>低合金钢</span></li>
                                                                        <li><input type="radio"  name="materialType" value=3  /><span>奥氏体不锈钢</span></li>
                                                                        <li><input type="radio"  name="materialType" value=4  /><span>镍合金钢</span></li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 30%">工艺流体中所含有的成分？<span style="color: #aa1111;font-weight: bolder">*</span></td>
                                                                <td style="width: 70%">
                                                                    <ul>
                                                                        <li><input type="radio"  name="mediumContain" value=1 /><span>盐酸和自由水</span></li>
                                                                        <!--<li><input type="radio"  name="mediumReduction" value=2 />含硫化物的油</li>-->
                                                                        <!--<li><input type="radio"  name="mediumReduction" value=3 />含H<sub>2</sub>S、H<sub>2</sub></li>-->
                                                                        <li><input type="radio"  name="mediumContain" value=4 /><span>含硫酸</span></li>
                                                                        <li><input type="radio"  name="mediumContain" value=5 /><span>含氢氟酸</span></li>
                                                                        <li><input type="radio"  name="mediumContain" value=6 /><span>含H<sub>2</sub>S的自由水</span></li>
                                                                    </ul>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td style="width: 30%">设备处于什么样的环境中？<span style="color: #aa1111;font-weight: bolder">*</span></td>
                                                                <td style="width: 70%">
                                                                    <ul>
                                                                        <li><input type="radio"  name="surroundingsMedium" value=1 /><span>一定浓度的碱性介质</span></li>
                                                                        <li><input type="radio"  name="surroundingsMedium" value=2 /><span>处理胺（MEA、DEA、DIPA、MDEA）的酸气</span></li>
                                                                        <li><input type="radio"  name="surroundingsMedium" value=3 /><span>吸收酸气的胺液（MEA、DEA、DIPA、MDEA等）</span></li>
                                                                        <li><input type="radio"  name="surroundingsMedium" value=4 /><span>水和H<sub>2</sub>S</span></li>
                                                                        <li><input type="radio"  name="surroundingsMedium" value=5 /><span>含硫化合物</span></li>
                                                                        <li><input type="radio"  name="surroundingsMedium" value=6 /><span>PH>7.5的酸性污水</span></li>
                                                                        <li><input type="radio"  name="surroundingsMedium" value=7 /><span>含氯化物的水环境</span></li>
                                                                        <li><input type="radio"  name="surroundingsMedium" value=8 /><span>含氢氟酸</span></li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary" id="wallFilterRiskBtn">
                                                            下一步
                                                        </button>
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">关闭
                                                        </button>
                                                    </div>
                                                </form>

                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal -->
                                    </div>
                                    <div class="modal fade" id="myModal_wallFacFilterRes" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style="width: 80%">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                            data-dismiss="modal" aria-hidden="true">
                                                        &times;
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel_wallFacFilterRes" style="font-size: 14px">
                                                        壁板损伤机理筛选结果
                                                    </h4>
                                                </div>
                                                <form method="post" id="saveMechanism" action="<?php echo U('Calculation/saveMechanism');?>">
                                                    <input type="text" name="pid" value="<?php echo ($res[0]["id"]); ?>" style="display: none"/>
                                                    <input type="text" name="part" value=1 style="display: none"/>
                                                    <input type="text" name="wallReductionMechRes" class="wallReductionMechRes" style="display: none"/>
                                                    <input type="text" name="wallReductionMechIdRes" class="wallReductionMechIdRes" style="display: none"/>
                                                    <input type="text" name="wallOutDamageMechRes" class="wallOutDamageMechRes"style="display: none"/>
                                                    <input type="text" name="wallOutDamageMechIdRes" class="wallOutDamageMechIdRes"style="display: none"/>
                                                    <input type="text" name="wallSCCMechRes" class="wallSCCMechRes" style="display: none"/>
                                                    <input type="text" name="wallSCCMechIdRes" class="wallSCCMechIdRes" style="display: none"/>
                                                    <div class="modal-body">
                                                        <!--<div style="text-align: right;margin-bottom: 10px" class="more"><a>重新筛选</a>>>></div>-->
                                                        <table class="borderedDetail">
                                                            <tbody>
                                                            <tr><td>减薄损伤机理</td><td class="wallReductionMechRes"></td>
                                                                <td>外部损伤机理</td><td class="wallOutDamageMechRes"></td></tr>
                                                            <tr><td>应力腐蚀开裂机理</td><td class="wallSCCMechRes"></td><td></td><td></td></tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="advancedOption" style="width: 95%;margin-right: auto;margin-left: auto">
                                                        <div id="advancedOptionWall">
                                                            <b style="cursor: pointer;color: #0b80c9" >高级选项</b>
                                                            <input type="hidden" name="advancedOptionId" value=0 />
                                                        </div>
                                                        <table class="borderedDetail borderedInput" style="display: none">
                                                            <tbody>
                                                            <tr><td><p>碳酸盐浓度(介质):</p></td>
                                                                <td><input  class="form-control" name="SCCWaterCarbonateConcentration" value="<?php echo ($riskCalPara["SCCWaterCarbonateConcentration"]); ?>" ></td>
                                                                <td><p>pH值(介质):</p></td><td><input  class="form-control" name="SCCWaterpH" value="<?php echo ($riskCalPara["SCCWaterpH"]); ?>" ></td></tr>
                                                            <tr><td><p>cl离子浓度(介质):</p></td><td><input  class="form-control" name="ClConcentration" value="<?php echo ($riskCalPara["ClConcentration"]); ?>" ></td>
                                                                <td><p>H<sub>2</sub>S浓度(介质):</p></td><td>
                                                                <input  class="form-control" name="SCCWaterH2S" value="<?php echo ($riskCalPara["SCCWaterH2S"]); ?>" >
                                                                </td>
                                                            </tr>
                                                            <tr><td><p>最大布氏硬度:</p></td><td>
                                                                <input  class="form-control" name="SCCBHardness" value="<?php echo ($riskCalPara["SCCBHardness"]); ?>" ></td>
                                                                <td><p>钢产品中S含量:</p></td><td><input  class="form-control" name="SCCSteelSulfur" value="<?php echo ($riskCalPara["SCCSteelSulfur"]); ?>" ></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p>NaOH浓度(介质):</p></td><td><input  class="form-control" name="SCCNaOHConcentration" value="<?php echo ($riskCalPara["SCCNaOHConcentration"]); ?>" ></td>
                                                            </td>
                                                                <td><p>是否进行应力消除:</p></td><td>
                                                                    <select class="form-control" name="isStressRelief" data-option="<?php echo ($riskCalPara["isStressRelief"]); ?>">
                                                                        <option value=0>否</option>
                                                                        <option value=1>是</option>
                                                                    </select>
                                                                </td></tr>
                                                            <tr><td><p>是否介质含水:</p></td><td>
                                                                <select class="form-control" name="isMediumWater" data-option="<?php echo ($riskCalPara["isMediumWater"]); ?>">
                                                                    <option value=0>否</option>
                                                                    <option value=1>是</option>
                                                                </select>
                                                            </td>
                                                                <td><p>环境中含有物:</p></td><td>
                                                                    <select class="form-control" name="SCCSurroundingsMedium" data-option="<?php echo ($riskCalPara["SCCSurroundingsMedium"]); ?>">
                                                                        <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '78'): ?><option value=<?php echo ($vo["key"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                                                    </select>
                                                                </td></tr>
                                                            <tr><td><p>是否伴热:</p></td><td>
                                                                <select class="form-control" name="SCCisHeatTracing" data-option="<?php echo ($riskCalPara["SCCisHeatTracing"]); ?>">
                                                                    <option value=0>否</option>
                                                                    <option value=1>是</option>
                                                                </select>
                                                            </td>
                                                                <td><p>是否蒸汽吹扫:</p></td><td>
                                                                    <select class="form-control" name="SCCisSteamBlowing" data-option="<?php echo ($riskCalPara["SCCisSteamBlowing"]); ?>">
                                                                        <option value=0>否</option>
                                                                        <option value=1>是</option>
                                                                    </select>
                                                                </td></tr>

                                                            <tr><td><p>热历史:</p></td><td>
                                                                <select name="SCCHeatHistory" class="form-control" data-option="<?php echo ($riskCalPara["SCCHeatHistory"]); ?>">
                                                                    <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '76'): ?><option value=<?php echo ($vo["value"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                                                </select>


                                                                <td><p>是否有停工保护:</p></td><td>
                                                                    <select class="form-control" name="SCCisShutdownProtect" data-option="<?php echo ($riskCalPara["SCCisShutdownProtect"]); ?>">
                                                                        <option value=0>否</option>
                                                                        <option value=1>是</option>
                                                                    </select>
                                                                </td></tr>
                                                            <tr><td><p>保温层是否含氯:</p></td><td>
                                                                <select class="form-control" name="isKeepWarmHasCL" data-option="<?php echo ($riskCalPara["isKeepWarmHasCL"]); ?>">
                                                                    <option value=0>否</option>
                                                                    <option value=1>是</option>
                                                                </select>
                                                            </td>
                                                                <td><p>管道复杂度:</p></td><td>
                                                                    <select name="pipeComplexity" class="form-control" data-option="<?php echo ($riskCalPara["pipeComplexity"]); ?>">
                                                                        <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == '77'): ?><option value=<?php echo ($vo["value"]); ?>><?php echo ($vo["key"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                                                    </select>
                                                                </td></tr>

                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary last">
                                                            上一步
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">
                                                            保存筛选结果
                                                        </button>
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">关闭
                                                        </button>
                                                    </div>
                                                </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal -->
                                    </div>
                                    <div style="text-align: right" class="more"><a data-toggle="modal" data-target="#myModal_wallFacFilter">损伤机理筛选</a>>>></div>
                                </div>
                            </div>
                            <!-- box容器 end -->

                        </div>
                        <div style="width: 49%;float: right">
                            <!-- box容器 start -->
                            <div class="box-container">
                                <!-- box标题块 -->
                                <div class="box-head box-head-list">
                                    <h3>底板损伤机理</h3>
                                </div>
                                <!-- box列表块 -->
                                <div class="floorRisk">
                                    <ol>
                                        <div class="wallRisk" style="width: 100%;" >
                                            <table class="borderedDetail" style="width: 100%;">
                                                <tbody>
                                                <tr>
                                                    <td><p>减薄损伤机理:</p></td><td><?php echo ($riskCalPara["floorThiningMechanism"]); ?></td>
                                                </tr>
                                                <tr><td><p>外部损伤机理:</p></td><td><?php echo ($riskCalPara["floorOutDamageMechanism"]); ?></td>
                                                </tr>
                                                <tr><td><p>应力腐蚀开裂机理:</p></td><td><?php echo ($riskCalPara["floorSCCMechanism"]); ?></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </ol>
                                    <div class="modal fade" id="myModal_floorFacFilter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style="width: 80%">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                            data-dismiss="modal" aria-hidden="true">
                                                        &times;
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel_floorFacFilter" style="font-size: 14px">
                                                        底板损伤机理筛选
                                                    </h4>
                                                </div>
                                                <form method="post" id="floorRiskCalPara" action="<?php echo U('Calculation/filterMechanism');?>">
                                                    <input type="text" name="triggerType" value=0 style="display: none"/>
                                                    <input type="text" name="pid" value="<?php echo ($res[0]["id"]); ?>" style="display: none"/>
                                                    <input type="text" name="mediumpH" value="<?php echo ($res[0]["mediumpH"]); ?>" style="display: none"/>
                                                    <input type="text" name="operateTemp" value="<?php echo ($res[0]["operateTemp"]); ?>" style="display: none"/>
                                                    <input type="text" name="isMediumWater" value="<?php echo ($res[0]["isMediumWater"]); ?>" style="display: none"/>
                                                    <input type="text" name="isKeepWarm" value="0" style="display: none"/>
                                                    <div class="modal-body">
                                                        <table class="borderedDetail">
                                                            <tbody>
                                                            <tr><td>运行温度℃</td><td><?php echo ($res[0]["operateTemp"]); ?></td><td>介质PH值</td><td><?php echo ($res[0]["mediumpH"]); ?></td></tr>
                                                            <tr><td>介质是否含水</td><td>
                                                                <?php switch($res[0]["isMediumWater"]): case "1": ?>是<?php break;?>
                                                                    <?php case "2": ?>否<?php break; endswitch;?></td>
                                                                <td>底板是否有保温层</td><td>否</td></tr>
                                                            </tbody>
                                                        </table>
                                                        <table class="borderedDetail SCCFactor">
                                                            <tbody >
                                                            <tr>
                                                                <td style="width: 30%">储罐设备材料类别？<span style="color: #aa1111;font-weight: bolder">*</span></td>
                                                                <td style="width: 70%">
                                                                    <ul>
                                                                        <li><input type="radio"  name="materialType" value=1  /><span>碳钢</span></li>
                                                                        <li><input type="radio"  name="materialType" value=2  /><span>低合金钢</span></li>
                                                                        <li><input type="radio"  name="materialType" value=3  /><span>奥氏体不锈钢</span></li>
                                                                        <li><input type="radio"  name="materialType" value=4  /><span>镍合金钢</span></li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 30%">工艺流体中所含有的成分？<span style="color: #aa1111;font-weight: bolder">*</span></td>
                                                                <td style="width: 70%">
                                                                    <ul>
                                                                        <li><input type="radio"  name="mediumContain" value=1 /><span>盐酸和自由水</span></li>
                                                                        <!--<li><input type="radio"  name="mediumReduction" value=2 />含硫化物的油</li>-->
                                                                        <!--<li><input type="radio"  name="mediumReduction" value=3 />含H<sub>2</sub>S、H<sub>2</sub></li>-->
                                                                        <li><input type="radio"  name="mediumContain" value=4 /><span>含硫酸</span></li>
                                                                        <li><input type="radio"  name="mediumContain" value=5 /><span>含氢氟酸</span></li>
                                                                        <li><input type="radio"  name="mediumContain" value=6 /><span>含H<sub>2</sub>S的自由水</span></li>
                                                                    </ul>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td style="width: 30%">设备处于什么样的环境中？<span style="color: #aa1111;font-weight: bolder">*</span></td>
                                                                <td style="width: 70%">
                                                                    <ul>
                                                                        <li><input type="radio"  name="surroundingsMedium" value=1 /><span>一定浓度的碱性介质</span></li>
                                                                        <li><input type="radio"  name="surroundingsMedium" value=2 /><span>处理胺（MEA、DEA、DIPA、MDEA）的酸气</span></li>
                                                                        <li><input type="radio"  name="surroundingsMedium" value=3 /><span>吸收酸气的胺液（MEA、DEA、DIPA、MDEA等）</span></li>
                                                                        <li><input type="radio"  name="surroundingsMedium" value=4 /><span>水和H<sub>2</sub>S</span></li>
                                                                        <li><input type="radio"  name="surroundingsMedium" value=5 /><span>含硫化合物</span></li>
                                                                        <li><input type="radio"  name="surroundingsMedium" value=6 /><span>PH>7.5的酸性污水</span></li>
                                                                        <li><input type="radio"  name="surroundingsMedium" value=7 /><span>含氯化物的水环境</span></li>
                                                                        <li><input type="radio"  name="surroundingsMedium" value=8 /><span>含氢氟酸</span></li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary" id="floorFilterRiskBtn">
                                                            下一步
                                                        </button>
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">关闭
                                                        </button>
                                                    </div>
                                                </form>

                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal -->
                                    </div>
                                    <div class="modal fade" id="myModal_floorFacFilterRes" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style="width: 80%">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                            data-dismiss="modal" aria-hidden="true">
                                                        &times;
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel_floorFacFilterRes" style="font-size: 14px">
                                                        底板损伤机理筛选结果
                                                    </h4>
                                                </div>
                                                <form method="post" id="saveFloorMechanism" action="<?php echo U('Calculation/saveMechanism');?>">
                                                    <input type="text" name="pid" value="<?php echo ($res[0]["id"]); ?>" style="display: none"/>
                                                    <input type="text" name="part" value="2" style="display: none"/>
                                                    <input type="text" name="floorReductionMechRes" class="floorReductionMechRes" style="display: none"/>
                                                    <input type="text" name="floorReductionMechIdRes" class="floorReductionMechIdRes" style="display: none"/>
                                                    <input type="text" name="floorOutDamageMechRes" class="floorOutDamageMechRes"style="display: none"/>
                                                    <input type="text" name="floorOutDamageMechIdRes" class="floorOutDamageMechIdRes"style="display: none"/>
                                                    <input type="text" name="floorSCCMechRes" class="floorSCCMechRes" style="display: none"/>
                                                    <input type="text" name="floorSCCMechIdRes" class="floorSCCMechIdRes" style="display: none"/>
                                                    <div class="modal-body">
                                                        <!--<div style="text-align: right;margin-bottom: 10px" class="more"><a>重新筛选</a>>>></div>-->
                                                        <table class="borderedDetail">
                                                            <tbody>
                                                            <tr><td>减薄损伤机理</td><td class="floorReductionMechRes"></td>
                                                                <td>外部损伤机理</td><td class="floorOutDamageMechRes"></td></tr>
                                                            <tr><td>应力腐蚀开裂机理</td><td class="floorSCCMechRes"></td><td></td><td></td></tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary last">
                                                            上一步
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">
                                                            保存筛选结果
                                                        </button>
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">关闭
                                                        </button>
                                                    </div>
                                                </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal -->
                                    </div>

                                    <div style="text-align: right" class="more"><a data-toggle="modal" data-target="#myModal_floorFacFilter">损伤机理筛选</a>>>></div>
                                </div>
                            </div>
                            <!-- box容器 end -->

                        </div>
                        <div style="clear: both"></div>
                    </div>
                    <div style="width: 100%;margin-top: 30px">
                        <!-- box容器 start -->
                        <div class="box-container">
                            <!-- box标题块 -->
                            <div class="box-head box-head-list">
                                <h3>壁板最近測厚记录</h3>
                            </div>
                            <!-- box列表块 -->
                            <div class="floorRisk">
                                <ol>
                                    <div class="wallRisk" style="width: 100%;" >
                                        <table class="bordered needMore">
                                            <thead>
                                            <tr><th>壁板序号</th><th>测点编号</th><th>测量厚度(mm)</th><th>测量日期</th><th>上次测量厚度(mm)</th><th>上次测量日期</th><th>名义厚度</th><th>投用日期</th></tr>
                                            </thead>
                                            <tbody>
                                            <?php if(is_array($wall)): $i = 0; $__LIST__ = $wall;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$th): $mod = ($i % 2 );++$i;?><tr>
                                                    <td><?php echo ($th["layerNO"]); ?></td><td><?php echo ($th["layerId"]); ?></td><td><?php echo ($th["thickness"]); ?></td>
                                                    <td><?php echo ($th["Mea_dt"]); ?></td><td><?php echo ($th["Last_Thickness"]); ?></td><td><?php echo ($th["Last_Mea_dt"]); ?></td>
                                                    <td><?php echo ($th["namelyThickness"]); ?></td><td><?php echo ($th["namelyUseDate"]); ?></td>
                                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </tbody>
                                        </table>
                                        <div style="text-align: right" class="more"><a>查看更多</a>>>></div>
                                    </div>
                                </ol>
                            </div>
                        </div>
                        <!-- box容器 end -->

                    </div>
                    <div style="width: 100%;display: none" >
                        <!-- box容器 start -->
                        <div class="box-container">
                            <!-- box标题块 -->
                            <div class="box-head box-head-list">
                                <h3>底板測厚记录</h3>
                            </div>
                            <!-- box列表块 -->
                            <div class="floorRisk">
                                <ol>
                                    <div class="wallRisk" style="width: 100%;" >
                                        <table class="bordered needMore">
                                            <thead>
                                            <tr><th>底板序号</th><th>底板部位</th><th>测量厚度(mm)</th><th>测量日期</th><th>上次测量厚度(mm)</th><th>上次测量日期</th><th>名义厚度</th><th>投用日期</th></tr>
                                            </thead>
                                            <tbody>
                                            <?php if(is_array($bottom)): $i = 0; $__LIST__ = $bottom;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$th): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($th["layerNO"]); ?></td><td><?php echo ($th["layerId"]); ?></td><td><?php echo ($th["thickness"]); ?></td>
                                                    <td><?php echo ($th["Mea_dt"]); ?></td><td><?php echo ($th["Last_Thickness"]); ?></td><td><?php echo ($th["Last_Mea_dt"]); ?></td><td><?php echo ($th["namelyThickness"]); ?></td><td><?php echo ($th["useDate"]); ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </tbody>
                                        </table>
                                        <div style="text-align: right " class="more"><a>查看更多</a>>>></div>

                                    </div>

                                </ol>
                            </div>
                        </div>
                        <!-- box容器 end -->

                    </div>
                    <div style="width: 100%" class="tankInfo">
                        <!-- box容器 start -->
                        <!--<div style="text-align: left;font-size: 12px" class="more"><a>查看设备详细信息</a>>>></div>-->

                        <div class="box-container" style="display: none">
                            <!-- box标题块 -->
                            <div class="box-head box-head-list">
                                <h3>设备基本信息</h3>
                            </div>
                            <!-- box列表块 -->
                            <div class="floorRisk">
                                <ol>
                                    <div class="wallRisk" style="width: 100%;" >
                                        <table class="borderedDetail">
                                            <tbody>
                                            <tr><td><p>所在厂区:</p></td><td><?php echo ($res[0]["factoryId"]); ?></td><td><p>所在车间:</p></td><td><?php echo ($res[0]["workshopId"]); ?></td>
                                                <td><p>所属装置:</p></td><td><?php echo ($res[0]["areaId"]); ?></td></tr><tr><td><p>设备位号:</p></td><td><?php echo ($res[0]["plantNO"]); ?></td>
                                                <td><p>设备名称:</p></td><td><?php echo ($res[0]["plantName"]); ?></td><td><p>油罐类型:</p></td><td><?php echo ($res[0]["OilTankType"]); ?></td></tr>
                                            <tr><td><p>主要设备:</p></td><td><?php echo ($res[0]["IsMainPlant"]); ?></td><td><p>ERP设备分类:</p></td><td><?php echo ($res[0]["ERPPlantType"]); ?></td>
                                                <td><p>罐体高度(mm):</p></td><td><?php echo ($res[0]["H"]); ?></td></tr><tr><td><p>油罐直径(mm):</p></td><td><?php echo ($res[0]["D"]); ?></td>
                                                <td><p>公称容量(m³):</p></td><td><?php echo ($res[0]["V"]); ?></td><td><p>平均截面积(㎡):</p></td><td><?php echo ($res[0]["S"]); ?></td></tr>



                                            <tr><td><p>安全填充高度(m):</p></td><td><?php echo ($res[0]["fillH"]); ?></td><td><p>储罐重量(kg):</p></td><td><?php echo ($res[0]["W"]); ?></td>
                                                <td><p>储存介质:</p></td><td><?php echo ($res[0]["storeMedium"]); ?></td></tr>
                                            <tr><td><p>介质比重(kg/m³):</p></td><td><?php echo ($res[0]["mediumPercentage"]); ?></td>
                                                <td><p>介质pH值:</p></td><td><?php echo ($res[0]["pHMedium"]); ?></td><td><p></p></td><td></td></tr>
                                            <tr><td><p>介质含水:</p></td><td><?php echo ($res[0]["isMediumWater"]); ?></td><td><p>介质毒性:</p></td><td><?php echo ($res[0]["mediumPoison"]); ?></td>
                                                <td><p>介质火灾危险性:</p></td><td><?php echo ($res[0]["mediumFire"]); ?></td>
                                            </tr><tr><td><p>介质碳原子数:</p></td><td><?php echo ($res[0]["mediumC"]); ?></td>
                                                <td><p>介质动力粘度(N*S/㎡):</p></td><td><?php echo ($res[0]["mediumDyViscosity"]); ?></td><td><p>地理环境:</p></td><td><?php echo ($res[0]["geographyEnvironment"]); ?></td></tr>

                                            <tr><td><p>操作温度(℃):</p></td><td><?php echo ($res[0]["operateTemp"]); ?></td><td><p>设计温度(℃):</p></td><td><?php echo ($res[0]["designTemp"]); ?></td>
                                                <td><p>操作压力(KPa):</p></td><td><?php echo ($res[0]["operatePresure"]); ?></td></tr>
                                            <tr><td><p>设计压力(KPa):</p></td><td><?php echo ($res[0]["designPresure"]); ?></td>
                                                <td><p>储罐密封形式:</p></td><td><?php echo ($res[0]["sealType"]); ?></td><td><p>使用状态:</p></td><td><?php echo ($res[0]["useStatus"]); ?></td></tr>

                                            <tr><td><p>投用日期:</p></td><td><?php echo ($res[0]["useDate"]); ?></td><td><p>技术状况:</p></td><td><?php echo ($res[0]["techniqueStatus"]); ?></td>
                                                <td><p>安装规范:</p></td><td><?php echo ($res[0]["installStandard"]); ?></td></tr><tr><td><p>设计规范:</p></td><td><?php echo ($res[0]["designStandard"]); ?></td>
                                                <td><p>计量管理类别:</p></td><td><?php echo ($res[0]["measureAdminType"]); ?></td><td><p>维修设计依据:</p></td><td><?php echo ($res[0]["mantenanceBasis"]); ?></td></tr>
                                            <tr><td><p>环境敏感度:</p></td><td><?php echo ($res[0]["sensitiveEnvironment"]); ?></td><td><p>土壤基础类型:</p></td><td><?php echo ($res[0]["soilFoundation"]); ?></td>
                                                <td><p>安装单位:</p></td><td><?php echo ($res[0]["installCompany"]); ?></td></tr><tr><td><p>安装日期:</p></td><td><?php echo ($res[0]["installDate"]); ?></td>
                                                <td><p>检验单位:</p></td><td><?php echo ($res[0]["checkCompany"]); ?></td><td><p>设计单位:</p></td><td><?php echo ($res[0]["designCompany"]); ?></td></tr>

                                            <tr><td><p>检验日期:</p></td><td><?php echo ($res[0]["checkDate"]); ?></td><td><p>下次检验日期:</p></td><td><?php echo ($res[0]["nextCheckDate"]); ?></td>
                                                <td><p>年度检查日期:</p></td><td><?php echo ($res[0]["yearCheckDate"]); ?></td></tr><tr><td><p>下次年度检查日期:</p></td><td><?php echo ($res[0]["nextYearCheckDate"]); ?></td>
                                                <td></td><td></td><td></td><td></td></tr>
                                            <tr><td><p>备注信息:</p></td><td colspan="5"><?php echo ($res[0]["remark"]); ?></td></tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </ol>
                                <div style="width: 100%">
                                    <!-- box容器 start -->
                                    <div class="box-container">
                                        <!-- box标题块 -->
                                        <div class="box-head box-head-list">
                                            <h3>壁板信息</h3>
                                        </div>

                                        <ol>
                                            <table class="borderedDetail">
                                                <tbody>
                                                <tr>
                                                    <td><p>壁板连接型式:</p></td><td><?php echo ($res[0]["wallboardLinkType"]); ?></td>
                                                    <td><p>焊缝系数(φ):</p></td><td><?php echo ($res[0]["wallboardWeldCoefficient"]); ?></td>
                                                    <td><p>是否焊后热处理:</p></td><td><?php echo ($res[0]["isHeatTreatAfterWeld"]); ?></td>
                                                </tr>
                                                <tr><td><p>壁板是否有保温层:</p></td><td><?php echo ($res[0]["isWallboardPaintcoat"]); ?></td>
                                                    <td><p>壁板保温层质量:</p></td><td><?php echo ($res[0]["isWallboardInstallLining"]); ?></td>
                                                    <td><p>保温层安装日期:</p></td><td><?php echo ($res[0]["wallboardProductSideErosionType"]); ?></td>
                                                </tr>
                                                <tr><td><p>壁板是否有涂层:</p></td><td><?php echo ($res[0]["isWallboardPaintcoat"]); ?></td>
                                                    <td><p>壁板涂层质量:</p></td><td><?php echo ($res[0]["isWallboardInstallLining"]); ?></td>
                                                    <td><p>涂层涂装日期:</p></td><td><?php echo ($res[0]["isWallboardPaintcoat"]); ?></td>
                                                </tr>
                                                <tr><td><p>壁板是否有衬里:</p></td><td><?php echo ($res[0]["isWallboardPaintcoat"]); ?></td>
                                                    <td><p>壁板衬里质量:</p></td><td><?php echo ($res[0]["isWallboardInstallLining"]); ?></td>
                                                    <td><p>衬里安装日期:</p></td><td><?php echo ($res[0]["wallboardProductSideErosionType"]); ?></td></tr>
                                                <tr><td><p>腐蚀速率报警线:</p></td><td><?php echo ($res[0]["ErosionAlarmSpeed"]); ?></td><td><p>加热器型式:</p></td><td><?php echo ($res[0]["wallboardHeaterType"]); ?></td>
                                                    <td><p>壁板是否涂层:</p></td><td><?php echo ($res[0]["isWallboardPaintcoat"]); ?></td></tr>
                                                <tr><td><p>壁板是否安装衬里:</p></td><td><?php echo ($res[0]["isWallboardInstallLining"]); ?></td>
                                                    <td><p>圈板数量:</p></td><td><?php echo ($res[0]["layerCount"]); ?></td><td></td><td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </ol>
                                    </div>
                                </div>
                                <div style="width: 100%">
                                    <!-- box容器 start -->
                                    <div class="box-container">
                                        <!-- box标题块 -->
                                        <div class="box-head box-head-list">
                                            <h3>底板信息</h3>
                                        </div>
                                        <ol>
                                            <table class="borderedDetail">
                                                <tbody>
                                                <tr><td><p>底板类型:</p></td><td><?php echo ($res[0]["bottomType"]); ?></td><td><p>底板厚度(mm):</p></td><td><?php echo ($res[0]["bottomThickness"]); ?></td></tr>
                                                <tr><td><p>底板材质:</p></td><td><?php echo ($res[0]["bottomMaterial"]); ?></td><td><p>底板名义厚度(mm):</p></td><td><?php echo ($res[0]["bottomNamelyThickness"]); ?></td></tr>
                                                <tr><td><p>底板连接型式:</p></td><td><?php echo ($res[0]["bottomLinkType"]); ?></td><td><p>雨水排放能力:</p></td><td><?php echo ($res[0]["bottomRainAbility"]); ?></td></tr>
                                                <tr><td><p>边缘板材质:</p></td><td><?php echo ($res[0]["bottomEdgeMaterial"]); ?></td><td><p>边缘板名义厚度(mm):</p></td><td><?php echo ($res[0]["bottomEdgeNamelyThickness"]); ?></td></tr>
                                                <tr><td><p>边缘板最小测量厚度(mm):</p></td><td><?php echo ($res[0]["bottomEdgeMinThickness"]); ?></td><td><p>中幅板名义厚度(mm):</p></td><td><?php echo ($res[0]["bottomMiddleNamelyThickness"]); ?></td></tr>
                                                <tr><td><p>中幅板材质:</p></td><td><?php echo ($res[0]["bottomMiddleMaterial"]); ?></td><td><p>泄漏探测系统:</p></td><td><?php echo ($res[0]["isBottomInstallLeakDectect"]); ?></td></tr>
                                                <tr><td><p>阴极保护:</p></td><td><?php echo ($res[0]["bottomCathodeProtect"]); ?></td><td><p>阴极保护方法:</p></td><td><?php echo ($res[0]["bottomCathodeProtectMethod"]); ?></td></tr>
                                                <tr><td><p>底板更换日期:</p></td><td><?php echo ($res[0]["bottomReplaceDate"]); ?></td><td><p>底板投用日期:</p></td><td><?php echo ($res[0]["bottomUseDate"]); ?></td></tr>
                                                <tr><td><p>储罐基础沉降:</p></td><td><?php echo ($res[0]["tankFoundationSettlement"]); ?></td><td><p>衬里安装日期:</p></td><td><?php echo ($res[0]["BottomInstallLiningDate"]); ?></td></tr>
                                                <tr><td><p>安装加热器:</p></td><td><?php echo ($res[0]["isBottomInstallHeater"]); ?></td><td><p>加热器型式:</p></td><td><?php echo ($res[0]["bottomHeaterType"]); ?></td></tr>
                                                <tr><td><p>安装防火堤:</p></td><td><?php echo ($res[0]["isBottomInstallFireProtection"]); ?></td><td></td><td></td></tr>
                                                </tbody>
                                            </table>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- box容器 end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--计算结果预览-->
<button type="button" class="btn" id='riskPreview' data-toggle="modal" style="display: none"
        data-target="#myModalPreview">
    <span class="glyphicon glyphicon-plus"></span>&nbsp新增
</button>
<div class="modal fade" id="myModalPreview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                计算结果
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            壁板风险<span class="label label-danger">高风险</span>
                        </h3>
                        <span class="glyphicon glyphicon-chevron-right" style="float: right"></span>
                    </div>
                    <div class="panel-body">
                        <!--壁板单独的分险计算结果-->
                        <table class="bordered" id="wallListPreview">
                            <thead><th>圈板序号</th><th>损伤因子</th><th>未来损伤因子</th><th>腐蚀速率</th><th>腐蚀速率类型</th></thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div class="wallRisk" style="width: 50%; float: left" >
                            <table class="borderedDetail">
                                <tbody>
                                <tr><td><p>壁板风险:</p></td><td class="wallDamageFactorIndex"></td></tr>
                                <tr><td><p>壁板损伤因子</p></td><td class="wallDamageFactor"></td></tr>
                                <tr><td><p>壁板后果等级:</p></td><td class="wallFailConsequence"></td></tr>
                                <tr><td><p>壁板失效可能性:</p></td><td class="wallFailurePro"></td></tr>
                                <tr><td><p>壁板风险等级:</p></td><td class="wallRiskLevel"></td></tr>
                                <tr><td><p>下次检验日期:</p></td><td></td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            底板风险<span class="label label-warning">低风险</span>
                        </h3>
                        <span class="glyphicon glyphicon-chevron-right" style="float: right"></span>
                    </div>
                    <div class="panel-body">
                        <div class="wallRisk" style="width: 50%; float: left" >
                            <table class="borderedDetail">
                                <tbody>
                                <tr><td><p>中幅板腐蚀速率:</p></td><td class="floorMiddleCorrosionSpeed"></td>
                                <tr><td><p>边缘板腐蚀速率:</p></td><td class="floorEdgeCorrosionSpeed"></td></tr>
                                <tr><td><p>中幅板损伤因子:</p></td><td class="floorMiddleDamageFactor"></td></tr>
                                <tr><td><p>边缘板损伤因子:</p></td><td class="floorEdgeDamageFactor"></td></tr>
                                <tr><td><p>底板损伤因子:</p></td><td class="floorDamageFactor"></td></tr>
                                <tr><td><p>底板后果等级:</p></td><td class="floorFailConsequence"></td></tr>
                                <tr><td><p>底板失效可能性等级:</p></td><td class="floorFailurePro"></td></tr>
                                <tr><td><p>底板风险等级:</p></td><td class="floorRiskLevel"></td></tr>
                                <tr><td><p>下次检验日期:</p></td><td class="floorNextCheckDate"></td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<script src="/www/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/www/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<!--<script src="/www/Public/Home/js/content_edit.js"></script>-->
<script type="text/javascript" src="/www/Public/Home/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/www/Public/Home/js/jquery.form.js"></script>
<script type="text/javascript" src="/www/Public/Home/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/www/Public/Home/js/mechanismFilter.js"></script>
<script src="/www/Public/Highcharts/js/highcharts.js"></script>
<script src="/www/Public/Highcharts/js/modules/exporting.src.js"></script>
<script>
    $(function(){


        //根据是否报警显示背景色
        $("#riskRecordList tbody tr").each(function(){
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
        $(".panel-heading").bind("click",function () {
            if($(this).siblings(".panel-body").is(":visible")) {
                $(this).find('.glyphicon').removeClass().addClass("glyphicon glyphicon-chevron-right");
                $(this).siblings(".panel-body").hide();
            }else {
                $(this).find('.glyphicon').removeClass().addClass("glyphicon glyphicon-chevron-down");
                $(this).siblings(".panel-body").show();
            }
        })
//     激活spin插件
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
            if(s=='返回'){
                $(this).parent().children(".needMore").find("tbody tr:gt(3)").hide();
                $(this).find('a').html('').html('查看更多');
            }else if(s=='查看更多'){
                $(this).parent().children(".needMore").find("tbody tr:gt(3)").show();
                $(this).find('a').html('').html('返回');
            }
        });

        $(".tankInfo .more").click(function(){
            if($(this).siblings().is(":hidden")){
                $(this).siblings().show();
                $(this).find("a").html("").html("收起");
            }else{
                $(this).siblings().hide();
                $(this).find("a").html("").html("查看设备信息信息");
            };

        });

//        点击删除，风险计算结果
        $('.riskDoc tr .delete').click(function(){
            if(confirm("是否删除该条风险计算结果？")){
            var i=$(this).find("span").text();
            $.post("<?php echo U('Calculation/deleteRiskCal');?>",{id:i},function(data){
                        alert(data);
                        location.reload();
                    },"json");
            }else{
                return false;
            }
        });

//-------------------------------------------------------------------------------------------------------------
        $(function () {
            var id=$("#riskRecordId").attr("data-data");
            $.post("<?php echo U('RiskCalculation/getRiskFigPara');?>",{id:id},function(data){
                 var wallDamageFactor_trendYear  =  data.wallDamageFactor_trendYear;
                 var wallDamageFactor_trend      =  data.wallDamageFactor_trend;
                 var floorDamageFactor_trend     =  data.floorDamageFactor_trend;
//            壁板损伤因子趋势图
                var title = {
                    text: '损伤因子（DF）随时间变化曲线'
                };
                var xAxis = {
                    categories: wallDamageFactor_trendYear
                };
                var yAxis = {
                    title: {
                        text: '损伤因子（DF）'
                    }
                };
                var plotOptions = {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                };
                var series= [{
                    name: '壁板损伤因子',
                    data: wallDamageFactor_trend
                }];
                var credits=[{
                        enabled:false // 禁用版权信息
                    }]

                var json = {};

                json.title = title;
                json.xAxis = xAxis;
                json.yAxis = yAxis;
                json.series = series;
                json.credits = credits;
                json.plotOptions = plotOptions;
                $('#wallDamageFactorFig').highcharts(json);

//            壁板损伤因子趋势图
                var title = {
                    text: '损伤因子（DF）随时间变化曲线'
                };
                var xAxis = {
                    categories: wallDamageFactor_trendYear
                };
                var yAxis = {
                    title: {
                        text: '损伤因子（DF）'
                    }
                };
                var plotOptions = {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                };
                var series= [{
                    name: '底板损伤因子',
                    data: floorDamageFactor_trend
                }];
                var credits=[{
                    enabled:false // 禁用版权信息
                }]

                var json = {};

                json.title = title;
                json.xAxis = xAxis;
                json.yAxis = yAxis;
                json.series = series;
                json.credits = credits;
                json.plotOptions = plotOptions;

                $('#floorDamageFactorFig').highcharts(json);
            },"JSON")

        });


//        展开高级选项
        $("#advancedOptionWall").click(function(){
            var advancedOptionTable=$("#advancedOptionWall").parent().find("table");
            if(advancedOptionTable.is(':hidden')){
                advancedOptionTable.show();
                $("#advancedOptionWall input").val(1);
            }else{
                advancedOptionTable.hide();
                $("#advancedOptionWall input").val(0);
            }
        })
   });
</script>
</body>
</html>