<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href="/www/Public/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/www/Public/Home/css/tabs.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/tableList.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/tableDetail.css" type="text/css">
    <style>
        .breadcrumb > li + li:before {
            color: #CCCCCC;
            content: " > ";
            padding: 0px 5px;
        }
    </style>
    <title></title>
</head>
<body>
<ol class="breadcrumb" style="background-color: transparent;float: left; height: 30px;width: 100%">
    <li class="active">档案管理</li>
    <li class="active">常压储罐基本信息</li>
    <li><a href="<?php echo U('Manage/tankInfoList');?>">储罐设备列表</a></li>
    <li class="active">设备信息详细</li>
</ol>
<div id="detail" style="width: 98%;margin-left: auto;margin-right: auto">
    <div class="tabbable">
        <ul id="tabs">
            <li>
                <a href="" title="tab1">基本信息</a>
            </li>
            <li>
                <a href="" title="tab2">底板信息</a>
            </li>
            <li>
                <a href="" title="tab3">壁板信息</a>
            </li>
            <li>
                <a href="" title="tab4">顶板信息</a>
            </li>

            <li>
                <a href="" title="tab5">相关文件</a>
            </li>
        </ul>
        <div id="content" style="padding-top: 10px">
            <!-- <a href="#" class="btn btn-primary Access" data-access="<?php echo ($Access['IMPORT']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-right: 10px"><span class="glyphicon glyphicon-import" style="margin-right:5px "></span>导入</a> -->
            <!-- <a href="<?php echo U('Excel/create_xlsx',array('id' => $res[0]['id']));?>" class="btn btn-primary Access" data-access="<?php echo ($Access['EXPORT']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-right: 10px"><span class="glyphicon glyphicon-export" style="margin-right:5px "></span>导出</a> -->
            <a data-messageId="<?php echo ($res[0]["id"]); ?>" data-verifierLevel="<?php echo ($res[0]["verifierLevel"]); ?>" class="btn btn-primary Access" id="verifiedNo" data-access="<?php echo ($Access['VERIFIED']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-right: 10px"><span class="glyphicon glyphicon-remove" style="margin-right:5px "></span>审核不通过</a>
            <a data-messageId="<?php echo ($res[0]["id"]); ?>" data-verifierLevel="<?php echo ($res[0]["verifierLevel"]); ?>" class="btn btn-primary Access" id="verifiedYes" data-access="<?php echo ($Access['VERIFIED']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-right: 10px"><span class="glyphicon glyphicon-ok" style="margin-right:5px "></span>审核通过</a>
            <a href="tankInfoEdit.html?id=<?php echo ($res[0]["id"]); ?>" data-access="<?php echo ($Access['EDIT']['id']); ?>" class="btn btn-primary Access" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px"><span class="glyphicon glyphicon-plus" style="margin-right:5px "></span>编辑</a>
            <div id="tab1">
                <table class="borderedDetail">
                    <tbody>
                    <tr><td><p>所在厂区:</p></td><td><?php echo ($res[0]["factoryId"]); ?></td><td><p>所在车间:</p></td><td><?php echo ($res[0]["workshopId"]); ?></td></tr>
                    <tr><td><p>所属装置:</p></td><td><?php echo ($res[0]["areaId"]); ?></td><td><p>设备位号:</p></td><td><?php echo ($res[0]["plantNO"]); ?></td></tr>
                    <tr><td><p>设备名称:</p></td><td><?php echo ($res[0]["plantName"]); ?></td><td><p>油罐类型:</p></td><td><?php echo ($res[0]["OilTankType"]); ?></td></tr>
                    <tr><td><p>主要设备:</p></td><td>
                        <?php switch($res[0]["IsMainPlant"]): case "0": ?>否<?php break;?>
                            <?php case "1": ?>是<?php break;?>
                            <defalut/>-<?php endswitch;?>
                    </td><td><p>使用状态:</p></td><td><?php echo ($res[0]["useStatus"]); ?></td></tr>
                    <tr><td><p>罐体高度(mm):</p></td><td><?php echo ($res[0]["H"]); ?></td><td><p>油罐直径(mm):</p></td><td><?php echo ($res[0]["D"]); ?></td></tr>
                    <tr><td><p>公称容量(m³):</p></td><td><?php echo ($res[0]["V"]); ?></td><td><p>安全填充高度(m):</p></td><td><?php echo ($res[0]["fillH"]); ?></td></tr>
                    <tr><td><p>储罐重量(kg):</p></td><td><?php echo ($res[0]["W"]); ?></td><td><p>储存介质:</p></td><td><?php echo ($res[0]["storeMedium"]); ?></td></tr>
                    <tr><td><p>介质pH值:</p></td><td><?php echo ($res[0]["mediumpH"]); ?></td><td><p>介质比重(kg/m³):</p></td><td><?php echo ($res[0]["mediumPercentage"]); ?></td></tr>
                    <tr><td><p>介质含水:</p></td><td>
                        <?php switch($res[0]["isMediumWater"]): case "0": ?>否<?php break;?>
                            <?php case "1": ?>是<?php break;?>
                            <defalut/>-<?php endswitch;?>
                        </td><td><p>介质毒性:</p></td><td><?php echo ($res[0]["mediumPoison"]); ?></td></tr>
                    <tr><td><p>介质火灾危险性:</p></td><td><?php echo ($res[0]["mediumFire"]); ?></td><td><p>介质碳原子数:</p></td><td><?php echo ($res[0]["mediumC"]); ?></td></tr>
                    <tr><td><p>介质动力粘度(N*S/㎡):</p></td><td><?php echo ($res[0]["mediumDyViscosity"]); ?></td>
                        <td><p>地理环境:</p></td><td>
                            <?php switch($res[0]["geographyEnvironment"]): case "1": ?>热带/海上<?php break;?>
                                <?php case "2": ?>温带/温和<?php break;?>
                                <?php case "3": ?>干旱/沙漠<?php break;?>
                                <defalut/>-<?php endswitch;?>
                            </td></tr>
                    <tr><td><p>操作温度(℃):</p></td><td><?php echo ($res[0]["operateTemp"]); ?></td><td><p>设计温度(℃):</p></td><td><?php echo ($res[0]["designTemp"]); ?></td></tr>
                    <tr><td><p>操作压力(KPa):</p></td><td><?php echo ($res[0]["operatePresure"]); ?></td><td><p>设计压力(KPa):</p></td><td><?php echo ($res[0]["designPresure"]); ?></td></tr>
                    <tr><td><p>储罐密封形式:</p></td><td><?php echo ($res[0]["sealType"]); ?></td><td>破裂口尺寸(mm):</td><td><?php echo ($res[0]["breakSize"]); ?></td></tr>
                    <tr><td><p>投用日期:</p></td><td><?php echo ($res[0]["useDate"]); ?></td><td><p>技术状况:</p></td><td><?php echo ($res[0]["techniqueStatus"]); ?></td></tr>
                    <tr><td><p>安装规范:</p></td><td><?php echo ($res[0]["installStandard"]); ?></td><td><p>设计规范:</p></td><td><?php echo ($res[0]["designStandard"]); ?></td></tr>
                    <tr><td><p>计量管理类别:</p></td><td><?php echo ($res[0]["measureAdminType"]); ?></td><td><p>维修设计依据:</p></td><td><?php echo ($res[0]["mantenanceBasis"]); ?></td></tr>
                    <tr><td><p>环境敏感度:</p></td><td>
                        <?php switch($res[0]["sensitiveEnvironment"]): case "1": ?>低<?php break;?>
                            <?php case "2": ?>中<?php break;?>
                            <?php case "3": ?>高<?php break;?>
                            <defalut/>-<?php endswitch;?>
                    </td><td><p>土壤基础类型:</p></td><td><?php echo ($res[0]["soilFoundation"]); ?></td></tr>
                    <tr><td><p>安装单位:</p></td><td><?php echo ($res[0]["installCompany"]); ?></td><td><p>安装日期:</p></td><td><?php echo ($res[0]["installDate"]); ?></td></tr>
                    <tr><td><p>检验单位:</p></td><td><?php echo ($res[0]["checkCompany"]); ?></td><td><p>设计单位:</p></td><td><?php echo ($res[0]["designCompany"]); ?></td></tr>
                    <tr><td><p>检验日期:</p></td><td><?php echo ($res[0]["checkDate"]); ?></td><td><p>下次检验日期:</p></td><td><?php echo ($res[0]["nextCheckDate"]); ?></td></tr>
                    <tr><td><p>年度检查日期:</p></td><td><?php echo ($res[0]["yearCheckDate"]); ?></td><td><p>下次年度检查日期:</p></td><td><?php echo ($res[0]["nextYearCheckDate"]); ?></td></tr>
                    <tr><td><p>备注信息:</p></td><td colspan="3"><?php echo ($res[0]["remark"]); ?></td></tr>
                    </tbody>
                </table>
            </div>
            <div id="tab2">
                <table class="borderedDetail">
                    <tbody>
                    <tr><td><p>底板类型:</p></td><td><?php echo ($res[0]["bottomType"]); ?></td><td><p>连接型式:</p></td><td><?php echo ($res[0]["bottomLinkType"]); ?></td></tr>
                    <tr><td><p>边缘板材质:</p></td><td><?php echo ($res[0]["bottomEdgeMaterial"]); ?></td><td><p>边缘板名义厚度(mm):</p></td><td><?php echo ($res[0]["bottomEdgeNamelyThickness"]); ?></td></tr>
                    <tr><td><p>中幅板材质:</p></td><td><?php echo ($res[0]["bottomMiddleMaterial"]); ?></td><td><p>中幅板名义厚度(mm):</p></td><td><?php echo ($res[0]["bottomMiddleNamelyThickness"]); ?></td></tr>
                    <tr><td><p>底板投用日期:</p></td><td><?php echo ($res[0]["bottomUseDate"]); ?></td><td><p>底板更换日期:</p></td><td><?php echo ($res[0]["bottomReplaceDate"]); ?></td></tr>
                    <tr><td><p>是否有涂层:</p></td><td>
                        <?php switch($res[0]["isBottomLining"]): case "1": ?>是<?php break;?>
                            <?php case "0": ?>否<?php break; endswitch;?>
                    </td>
                        <td><p>是否有衬里:</p></td><td>
                            <?php switch($res[0]["isBottomLining"]): case "1": ?>是<?php break;?>
                                <?php case "0": ?>否<?php break; endswitch;?>
                        </td>
                    </tr>
                    <tr>
                        <td><p>涂层质量:</p></td><td>
                        <?php switch($res[0]["bottomCoatingStatus"]): case "3": ?>高<?php break;?>
                            <?php case "2": ?>中<?php break;?>
                            <?php case "1": ?>底<?php break;?>
                            <?php default: ?>-<?php endswitch;?>
                        </td>
                        <td><p>衬里质量:</p></td><td>
                        <?php switch($res[0]["bottomLiningStatus"]): case "3": ?>高<?php break;?>
                            <?php case "2": ?>中<?php break;?>
                            <?php case "1": ?>底<?php break;?>
                            <?php default: ?>-<?php endswitch;?>
                        </td>

                    </tr>
                    <tr><td><p>涂层涂装日期:</p></td><td><?php echo ($res[0]["bottomCoatingUseDate"]); ?></td>
                        <td><p>衬里安装日期:</p></td><td><?php echo ($res[0]["bottomLiningUseDate"]); ?></td>
                    </tr>
                    <tr><td><p>土壤基础类型:</p></td><td>
                        <?php switch($res[0]["bottomGasketSoil"]): case "1": ?>粗砂<?php break;?>
                            <?php case "2": ?>细砂<?php break;?>
                            <?php case "3": ?>精细砂<?php break;?>
                            <?php case "4": ?>粉砂<?php break;?>
                            <?php case "5": ?>含砂黏土<?php break;?>
                            <?php case "6": ?>黏土<?php break;?>
                            <?php case "7": ?>混凝土-沥青<?php break;?>
                            <defalut/>-<?php endswitch;?>
                        </td>
                        <td><p>基础形式:</p></td><td>
                            <?php switch($res[0]["bottomGasket"]): case "0": ?>基础为水泥或沥青<?php break;?>
                                <?php case "1": ?>基础设有RPB<?php break;?>
                                <?php case "2": ?>基础没有RPB<?php break;?>
                                <defalut/>-<?php endswitch;?>
                    </td></tr>
                    <tr>
                        <td><p>是否有阴极保护:</p></td><td>
                        <?php switch($res[0]["bottomCathodeProtect"]): case "1": ?>是<?php break;?>
                            <?php case "0": ?>否<?php break; endswitch;?>
                    </td>
                        <td><p>阴极保护方法:</p></td><td><?php echo ($res[0]["bottomCathodeProtectMethod"]); ?></td></tr>
                    <tr><td><p>是否安装加热器:</p></td><td>
                        <?php switch($res[0]["isBottomInstallHeater"]): case "1": ?>是<?php break;?>
                            <?php case "0": ?>否<?php break; endswitch;?>
                    </td><td><p>加热器型式:</p></td><td><?php echo ($res[0]["bottomHeaterType"]); ?></td></tr>
                    <tr><td><p>雨水排放能力:</p></td><td><?php echo ($res[0]["bottomRainAbility"]); ?></td><td><p>罐底到地下水的距离(m):</p></td><td><?php echo ($res[0]["bottomToWaterDistance"]); ?></td></tr>
                    <tr><td><p>是否安装防火堤:</p></td><td>
                        <?php switch($res[0]["isBottomInstallFireProtection"]): case "1": ?>是<?php break;?>
                            <?php case "0": ?>否<?php break; endswitch;?>
                    </td>
                        <td><p>泄漏探测系统:</p></td><td>
                            <?php switch($res[0]["isBottomInstallLeakDectect"]): case "1": ?>是<?php break;?>
                                <?php case "0": ?>否<?php break; endswitch;?>
                        </td></tr>
                    <tr><td><p>储罐基础沉降评价:</p></td><td>
                        <?php switch($res[0]["tankFoundationSettlement"]): case "1": ?>已记录的沉降超过了建造标准<?php break;?>
                            <?php case "2": ?>已记录了的沉降符合建造标准<?php break;?>
                            <?php case "3": ?>未做沉降评价<?php break;?>
                            <?php case "4": ?>混凝土基础，无沉降<?php break;?>
                            <?php default: ?>-<?php endswitch;?>
                    </td>
                        <td><p>溢出围堰流体比(%):</p></td><td><?php echo ($res[0]["overflowPercentage"]); ?></td></tr>
                    <tr><td><p>溢出围堰但仍在罐区内，地表土壤的流体百分比(％)：</p></td><td><?php echo ($res[0]["overflowPercentageIn"]); ?></td>
                        <td><p>溢出围堰且已流到罐区外，地表土壤中的流体百分比(％):</p></td><td><?php echo ($res[0]["overflowPercentageOut"]); ?></td></tr>
                    <tr><td><p>停产造成的损失(万元)：</p></td><td><?php echo ($res[0]["stopLoss"]); ?></td>
                        <td><p>失效后果可接受基准(万元):</p></td><td><?php echo ($res[0]["failConseqenceAccept"]); ?></td></tr>
                    </tbody>
                </table>
            </div>
            <div id="tab3">
                <table class="borderedDetail">
                    <tbody>
                    <tr>
                        <td><p>壁板连接型式:</p></td><td><?php echo ($res[0]["wallboardLinkType"]); ?></td>
                        <td><p>焊缝系数(φ):</p></td><td><?php echo ($res[0]["wallboardWeldCoefficient"]); ?></td>
                        </tr>
                    <tr><td><p>是否有保温层:</p></td><td>
                        <?php switch($res[0]["isWallboardKeepWarm"]): case "0": ?>否<?php break;?>
                            <?php case "1": ?>是<?php break;?>
                            <?php default: ?>-<?php endswitch;?>
                        </td>
                        <td><p>是否有涂层:</p></td><td>
                            <?php switch($res[0]["isWallboardCoating"]): case "0": ?>否<?php break;?>
                                <?php case "1": ?>是<?php break;?>
                                <?php default: ?>-<?php endswitch;?></td>
                    </tr>
                    <tr>
                        <td><p>保温层质量:</p></td><td>
                        <?php switch($res[0]["wallboardKeepWarmStatus"]): case "1": ?>低<?php break;?>
                            <?php case "2": ?>中<?php break;?>
                            <?php case "3": ?>高<?php break;?>
                            <?php default: ?>-<?php endswitch;?></td>
                        <td><p>涂层质量:</p></td><td>
                        <?php switch($res[0]["wallboardCoatingStatus"]): case "1": ?>低<?php break;?>
                            <?php case "2": ?>中<?php break;?>
                            <?php case "3": ?>高<?php break;?>
                            <?php default: ?>-<?php endswitch;?></td>
                    </tr>
                    <tr>
                        <td><p>保温层安装日期:</p></td><td><?php echo ($res[0]["wallboardKeepWarmUseDate"]); ?></td>
                        <td><p>涂层涂装日期:</p></td><td><?php echo ($res[0]["wallboardCoatingUseDate"]); ?></td>
                    </tr>
                    <tr><td><p>是否有衬里:</p></td><td>
                        <?php switch($res[0]["isWallboardLining"]): case "0": ?>否<?php break;?>
                            <?php case "1": ?>是<?php break;?>
                            <?php default: ?>-<?php endswitch;?></td>
                        <td><p>衬里质量:</p></td><td>
                            <?php switch($res[0]["wallboardLiningStatus"]): case "1": ?>低<?php break;?>
                                <?php case "2": ?>中<?php break;?>
                                <?php case "3": ?>高<?php break;?>
                                <?php default: ?>-<?php endswitch;?></td>
                        </tr>
                    <tr>
                        <td><p>衬里安装日期:</p></td><td><?php echo ($res[0]["wallboardLiningUseDate"]); ?></td>
                    <td><p>是否焊后热处理:</p></td><td>
                        <?php switch($res[0]["isHeatTreatAfterWeld"]): case "0": ?>否<?php break;?>
                            <?php case "1": ?>是<?php break;?>
                            <?php default: ?>-<?php endswitch;?></td></tr>

                    <tr><td><p>是否安装加热器:</p></td><td>
                        <?php switch($res[0]["isWallboardInstallHeater"]): case "0": ?>否<?php break;?>
                            <?php case "1": ?>是<?php break;?>
                            <?php default: ?>-<?php endswitch;?></td><td><p>加热器型式:</p></td><td><?php echo ($res[0]["wallboardHeaterType"]); ?></td></tr>
                    <tr><td><p>腐蚀速率报警线:</p></td><td><?php echo ($res[0]["ErosionAlarmSpeed"]); ?></td><td><p>壁板数量:</p></td><td><?php echo ($res[0]["layerCount"]); ?></td></tr>
                    </tbody>
                </table>
                <table class="bordered">
                    <tr><th rowspan="2">壁板序号</th><th rowspan="2">投用日期</th><th rowspan="2">壁板材料</th><th rowspan="2">壁板高度</br>(mm)</th><th rowspan="2">名义厚度(mm)</th></tr>
                    <tbody>
                    <?php if(is_array($res[0]['Plantwallboardinfo'])): $i = 0; $__LIST__ = $res[0]['Plantwallboardinfo'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$wa): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($wa["layerNO"]); ?></td><td><?php echo ($wa["useDate"]); ?></td><td><?php echo ($wa["material"]); ?></td><td><?php echo ($wa["height"]); ?></td><td><?php echo ($wa["namelyThickness"]); ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
            <div id="tab4">
                <table class="borderedDetail">
                    <tbody>
                    <tr><td><p>顶板型式:</p></td><td><?php echo ($res[0]["topStyle"]); ?></td><td><p>顶板材质</p></td><td><?php echo ($res[0]["topMaterial"]); ?></td></tr>
                    <tr><td><p>顶板厚度(mm):</p></td><td><?php echo ($res[0]["topThickness"]); ?></td><td><p>起浮高度(m):</p></td><td><?php echo ($res[0]["topStartHeight"]); ?></td></tr>
                    <tr><td><p>顶板投用日期:</p></td><td><?php echo ($res[0]["topUseDate"]); ?></td><td><p>顶板更换日期:</p></td><td><?php echo ($res[0]["topReplaceDate"]); ?></td></tr>
                    <tr><td><p>是否有保温:</p></td><td>
                        <?php switch($res[0]["isTopKeepWarm"]): case "0": ?>否<?php break;?>
                            <?php case "1": ?>是<?php break;?>
                            <?php default: ?>-<?php endswitch;?>
                        </td><td><p>保温层材料:</p></td><td><?php echo ($res[0]["topKeepWarmMaterial"]); ?></td></tr>
                    <tr><td><p>保温层质量:</p></td><td>
                        <?php switch($res[0]["topKeepWarmStatus"]): case "1": ?>低<?php break;?>
                            <?php case "2": ?>中<?php break;?>
                            <?php case "3": ?>高<?php break;?>
                            <?php default: ?>-<?php endswitch;?></td><td></td><td></td></tr>
                    </tbody>
                </table>
            </div>

            <div id="tab5">
                <table class="bordered">
                    <thead>
                    <tr><th>文件名称</th><th>添加时间</th><th>操作</th></tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($attachment)): $i = 0; $__LIST__ = $attachment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($vo["filename"]); ?></td>
                            <td class="type"><?php echo ($vo["addTime"]); ?></td>
                            <td>
                                <a class="download Access" data-access="<?php echo ($Access['DOWNLOAD']['id']); ?>" href="downloadUpload.html?id=<?php echo ($vo["id"]); ?>">下载</a>
                            </td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
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

        //tabs菜单的切换
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
        });

        //设备信息审核
        $("#verifiedNo").click(function(){
            var id=$(this).attr("data-messageId");
            var verifierLevel=$(this).attr("data-verifierLevel");
            if(confirm("是否确认审核不通过？")){
                $.post("<?php echo U('Public/verified');?>",
                        {tableName:"tb_plantinfo",id:id,verifierLevel:verifierLevel,verifyResult:2},function(data){
                            alert(data.msg);
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
                            tableName: "tb_plantinfo",
                            id: id,
                            verifierLevel: verifierLevel,
                            verifyResult: 1
                        }, function (data) {
                            alert(data.msg);
                        }, "JSON")
            }else{
                return false;
            }
        })


    });
</script>
</body>
</html>