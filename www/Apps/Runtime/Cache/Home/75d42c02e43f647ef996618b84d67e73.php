<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href="/www/Public/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/www/Public/Home/css/tabs.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/riskMatrix.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/tableList.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/tableDetail.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/jquery-ui.theme.min.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/box.css" type="text/css">
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
    </style>
    <title></title>
</head>
<body>
<ol class="breadcrumb" style="background-color: transparent;float: left; height: 30px;width: 100%">
    <li class="active">完整性管理</li>
    <li class="active">风险统计</li>
</ol>
<div class="container" id="detail"  style="width: 98%;margin-left: auto;margin-right: auto">
    <div class="tabbable" >
        <ul id="tabs">
            <li>
                <a href="" title="tab1">风险矩阵</a>
            </li>
            <li>
                <a href="" title="tab2">相关文件</a>
            </li>
        </ul>
        <div id="content">

            <div id="tab1" class="tab">
                <div id='nextInspectYear' style="display: none" data-nowYear="<?php echo ($nowDate); ?>"
                        data-wall0="<?php echo ($inspectYear_fuWallFig[0]); ?>" data-wall1="<?php echo ($inspectYear_fuWallFig[1]); ?>" data-wall2="<?php echo ($inspectYear_fuWallFig[2]); ?>"
                        data-wall3="<?php echo ($inspectYear_fuWallFig[3]); ?>" data-wall4="<?php echo ($inspectYear_fuWallFig[4]); ?>" data-wall5="<?php echo ($inspectYear_fuWallFig[5]); ?>"
                        data-bottom0="<?php echo ($inspectYear_fuBottomFig[0]); ?>" data-bottom1="<?php echo ($inspectYear_fuBottomFig[1]); ?>" data-bottom2="<?php echo ($inspectYear_fuBottomFig[2]); ?>"
                        data-bottom3="<?php echo ($inspectYear_fuBottomFig[3]); ?>" data-bottom4="<?php echo ($inspectYear_fuBottomFig[4]); ?>" data-bottom5="<?php echo ($inspectYear_fuBottomFig[5]); ?>" ></div>
                <!--<form style="margin: 20px" action="riskStatisticsDetail.html" method="get">-->
                    <!--<input type="hidden" name="mark" value=1 />-->
                    <!--<div style="float: right">风险计算时间：<input type="text" class="datePicker" name="dateFore" /> 至 <input type="text" class="datePicker" name="dateLate" />  <button>查询</button></div>-->
                    <!--<div style="clear: both"></div>-->
                <!--</form>-->
                <div style="width: 100%;margin:10px auto;">
                    <!-- box容器 start -->
                    <div class="box-container">
                        <!-- box标题块 -->
                        <div class="box-head box-head-list">
                            <h3>壁板风险统计</h3>
                            <a class="box-head-more">收起</a>
                        </div>
                        <!-- box列表块 -->
                        <div class="wallDetail detail">

                            <ol>
                                <div class="filterName" style="line-height: normal">
                                    <div style="float: right;margin-bottom: 10px">
                                        筛选：
                                        <input id="filterNameWall">
                                    </div>
                                </div>
                                <table class="bordered filterNameWall">
                                    <thead>
                                    <tr><th>公司</th><th>罐区/车间</th><th>储罐名称</th><th>壁板风险等级</th><th>壁板失效可能性等级</th><th>壁板失效后果等级</th><th>壁板下次检验时间</th></tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_array($RiskStatistics)): $i = 0; $__LIST__ = $RiskStatistics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fou): $mod = ($i % 2 );++$i;?><tr  class="brief" data-row-id="<?php echo ($fou["id"]); ?>"><td style="display: none" class="id"><?php echo ($fou["id"]); ?></td>
                                            <td class="workshop" title=<?php echo ($fou["workshopId"]); ?>><?php echo ($fou["workshopId"]); ?></td><td class="area" title=<?php echo ($fou["areaId"]); ?> style="display: none"><?php echo ($fou["areaId"]); ?></td>
                                            <td class="plant" title=<?php echo ($fou["plantNO"]); ?>><?php echo ($fou["plantNO"]); ?></td>
                                            <td title=<?php echo ($fou["plantName"]); ?>>
                                                <?php if(empty($fou["plantName"])): ?>-<?php endif; ?>
                                                <?php echo ($fou["plantName"]); ?></td>
                                            <td title=<?php echo ($fou["wallRiskLevel"]); ?>><?php echo ($fou["wallRiskLevel"]); ?></td>
                                            <td><?php echo ($fou["wallFailProLevel"]); ?></td><td><?php echo ($fou["wallConsequenceLevel"]); ?></td><td><?php echo ($fou["wallNextCheckDate"]); ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                                <div class="riskStatistics">
                                    <div style="width: 50% ;padding: 10px">
                                    <div class="riskMatrixFig" >
                                        <div class="title"><h3>壁板风险矩阵图</h3></div>
                                        <div class="YFigTitle">壁板失效可能性等级</div>
                                        <div class="riskMatrix">
                                            <ul><li class="Ytitle">5</li><li class="middle_high content"  data-row-id="5A"><?php echo ($wallRiskCount[20]); ?></li><li class="middle_high content" data-row-id="5B"><?php echo ($wallRiskCount[21]); ?></li><li class="middle_high content" data-row-id="5C"><?php echo ($wallRiskCount[22]); ?></li><li class="high content" data-row-id="5D"><?php echo ($wallRiskCount[23]); ?></li><li class="high content" data-row-id="5E"><?php echo ($wallRiskCount[24]); ?></li>
                                                <li class="Ytitle">4</li><li class="middle content" data-row-id="4A"><?php echo ($wallRiskCount[15]); ?></li><li class="middle content" data-row-id="4B"><?php echo ($wallRiskCount[16]); ?></li><li class="middle_high content" data-row-id="4C"><?php echo ($wallRiskCount[17]); ?></li><li class="middle_high content" data-row-id="4D"><?php echo ($wallRiskCount[18]); ?></li><li class="high content" data-row-id="4E"><?php echo ($wallRiskCount[19]); ?></li>
                                                <li class="Ytitle">3</li><li class="low content" data-row-id="3A"><?php echo ($wallRiskCount[10]); ?></li><li class="low content" data-row-id="3B"><?php echo ($wallRiskCount[11]); ?></li><li class="middle content" data-row-id="3C"><?php echo ($wallRiskCount[12]); ?></li><li class="middle_high content" data-row-id="3D"><?php echo ($wallRiskCount[13]); ?></li><li class="high content" data-row-id="3E"><?php echo ($wallRiskCount[14]); ?></li>
                                                <li class="Ytitle">2</li><li class="low content" data-row-id="2A"><?php echo ($wallRiskCount[5]); ?></li><li class="low content" data-row-id="2B"><?php echo ($wallRiskCount[6]); ?></li><li class="middle content" data-row-id="2C"><?php echo ($wallRiskCount[7]); ?></li><li class="middle content" data-row-id="2D"><?php echo ($wallRiskCount[8]); ?></li><li class="middle_high content" data-row-id="2E"><?php echo ($wallRiskCount[9]); ?></li>
                                                <li class="Ytitle">1</li><li class="low content" data-row-id="1A"><?php echo ($wallRiskCount[0]); ?></li><li class="low content" data-row-id="1B"><?php echo ($wallRiskCount[1]); ?></li><li class="middle content" data-row-id="1C"><?php echo ($wallRiskCount[2]); ?></li><li class="middle content" data-row-id="1D"><?php echo ($wallRiskCount[3]); ?></li><li class="middle_high content" data-row-id="1E"><?php echo ($wallRiskCount[4]); ?></li>
                                                <li class="blank" style="width: 20px;height: 20px"></li>
                                                <li class="Xtitle">A</li><li class="Xtitle">B</li>
                                                <li class="Xtitle">C</li><li class="Xtitle">D</li>
                                                <li class="Xtitle">E</li>
                                            </ul>
                                        </div>
                                        <div class="XFigTitle">壁板失效后果等级</div>
                                        <div></div>
                                    </div>
                                    </div>
                                    <div style="width: 50%;padding: 10px">
                                    <div class="title" style="width: 100%"><h3>壁板风险分布情况</h3></div>
                                    <div class="statisticsWallFig" ></div>
                                    </div>
                                    <div style="width: 400px;padding: 10px">
                                        <div class="title" style="width: 100%;padding-bottom: 10px"><h3>壁板下次检验时间</h3></div>
                                    <div class="statisticsFutureWallFig" style="width: 100%;"></div>
                                    </div>

                                </div>
                            </ol>
                        </div>

                    </div>
                    <!-- box容器 end -->

                </div>
                <div style="clear: both"></div>


                <div style="width: 100%;margin:10px auto;">
                    <!-- box容器 start -->
                    <div class="box-container">
                        <!-- box标题块 -->
                        <div class="box-head box-head-list">
                            <h3>底板风险统计</h3>
                            <a class="box-head-more">收起</a>
                        </div>
                        <!-- box列表块 -->
                        <div class="floorDetail detail">
                            <ol>
                                <div class="filterName" style="line-height: normal">
                                    <div style="float: right;margin-bottom: 10px">
                                        筛选：
                                        <input id="filterNameFloor">
                                    </div>
                                </div>
                                <table class="bordered filterNameFloor">
                                    <thead>
                                    <tr><th>公司</th><th>罐区/车间</th><th>储罐名称</th><th>底板风险等级</th><th>底板失效可能性等级</th><th>底板失效后果等级</th><th>底板下次检验时间</th></tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_array($RiskStatistics)): $i = 0; $__LIST__ = $RiskStatistics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fou): $mod = ($i % 2 );++$i;?><tr  class="brief" data-row-id="<?php echo ($fou["id"]); ?>"><td style="display: none" class="id"><?php echo ($fou["id"]); ?></td>
                                            <td class="workshop" title=<?php echo ($fou["workshopId"]); ?>><?php echo ($fou["workshopId"]); ?></td><td class="area" title=<?php echo ($fou["areaId"]); ?> style="display: none"><?php echo ($fou["areaId"]); ?></td>
                                            <td class="plant" title=<?php echo ($fou["plantNO"]); ?>><?php echo ($fou["plantNO"]); ?></td>
                                            <td title=<?php echo ($fou["plantName"]); ?>>
                                                <?php if(empty($fou["plantName"])): ?>-<?php endif; ?>
                                                <?php echo ($fou["plantName"]); ?></td>
                                            <td><?php echo ($fou["floorRiskLevel"]); ?></td><td><?php echo ($fou["floorFailProLevel"]); ?></td><td><?php echo ($fou["floorConsequenceLevel"]); ?></td><td><?php echo ($fou["floorNextCheckDate"]); ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                                <div class="riskStatistics">
                                    <div style="width: 50% ;padding: 10px">
                                        <div class="riskMatrixFig" >
                                            <div class="title"><h3>底板风险矩阵图</h3></div>
                                            <div class="YFigTitle">底板失效可能性等级</div>
                                            <div class="riskMatrix">
                                                <ul><li class="Ytitle">5</li><li class="middle_high content"  data-row-id="5A"><?php echo ($floorRiskCount[20]); ?></li><li class="middle_high content" data-row-id="5B"><?php echo ($floorRiskCount[21]); ?></li><li class="middle_high content" data-row-id="5C"><?php echo ($floorRiskCount[22]); ?></li><li class="high content" data-row-id="5D"><?php echo ($floorRiskCount[23]); ?></li><li class="high content" data-row-id="5E"><?php echo ($floorRiskCount[24]); ?></li>
                                                    <li class="Ytitle">4</li><li class="middle content" data-row-id="4A"><?php echo ($floorRiskCount[15]); ?></li><li class="middle content" data-row-id="4B"><?php echo ($floorRiskCount[16]); ?></li><li class="middle_high content" data-row-id="4C"><?php echo ($floorRiskCount[17]); ?></li><li class="middle_high content" data-row-id="4D"><?php echo ($floorRiskCount[18]); ?></li><li class="high content" data-row-id="4E"><?php echo ($floorRiskCount[19]); ?></li>
                                                    <li class="Ytitle">3</li><li class="low content" data-row-id="3A"><?php echo ($floorRiskCount[10]); ?></li><li class="low content" data-row-id="3B"><?php echo ($floorRiskCount[11]); ?></li><li class="middle content" data-row-id="3C"><?php echo ($floorRiskCount[12]); ?></li><li class="middle_high content" data-row-id="3D"><?php echo ($floorRiskCount[13]); ?></li><li class="high content" data-row-id="3E"><?php echo ($floorRiskCount[14]); ?></li>
                                                    <li class="Ytitle">2</li><li class="low content" data-row-id="2A"><?php echo ($floorRiskCount[5]); ?></li><li class="low content" data-row-id="2B"><?php echo ($floorRiskCount[6]); ?></li><li class="middle content" data-row-id="2C"><?php echo ($floorRiskCount[7]); ?></li><li class="middle content" data-row-id="2D"><?php echo ($floorRiskCount[8]); ?></li><li class="middle_high content" data-row-id="2E"><?php echo ($floorRiskCount[9]); ?></li>
                                                    <li class="Ytitle">1</li><li class="low content" data-row-id="1A"><?php echo ($floorRiskCount[0]); ?></li><li class="low content" data-row-id="1B"><?php echo ($floorRiskCount[1]); ?></li><li class="middle content" data-row-id="1C"><?php echo ($floorRiskCount[2]); ?></li><li class="middle content" data-row-id="1D"><?php echo ($floorRiskCount[3]); ?></li><li class="middle_high content" data-row-id="1E"><?php echo ($floorRiskCount[4]); ?></li>
                                                    <li class="blank" style="width: 20px;height: 20px"></li>
                                                    <li class="Xtitle">A</li><li class="Xtitle">B</li>
                                                    <li class="Xtitle">C</li><li class="Xtitle">D</li>
                                                    <li class="Xtitle">E</li>
                                                </ul>
                                            </div>
                                            <div class="XFigTitle">底板失效后果等级</div>
                                            <div></div>
                                        </div>
                                    </div>
                                    <div style="width: 50%;padding: 10px">
                                        <div class="title" style="width: 100%"><h3>底板风险分布情况</h3></div>
                                        <div class="statisticsBottomFig"></div>
                                    </div>
                                    <div style="width: 400px;padding: 10px">
                                        <div class="title" style="width: 100%;padding-bottom: 10px"><h3>底板下次检验时间</h3></div>
                                        <div class="statisticsFutureBottomFig" style="width: 100%;"></div>
                                    </div>

                                </div>
                            </ol>
                        </div>
                    </div>
                    <!-- box容器 end -->


                </div>
                <div style="clear: both"></div>
            </div>
            <div id="tab2" class="tab" style="margin-bottom: 20px">
                <form enctype="multipart/form-data" id="uploadFile" action="<?php echo U('Public/upload');?>" method="post">
                    <input type="hidden" name="id" value="<?php echo ($PlantmaintanceRecord[0]['id']); ?>" id="id">
                    <input type="hidden" name="tableId" value="RiskList">

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
                <table class="bordered" style="margin-top: 20px">
                    <thead>
                    <tr><th>文件名称</th><th>添加时间</th><th>操作</th></tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($attach)): $i = 0; $__LIST__ = $attach;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td class="id" style="display: none"><?php echo ($vo["id"]); ?></td>
                            <td class="filePath" style="display: none"><?php echo ($vo["filePath"]); ?></td>
                            <td class="fileName"><?php echo ($vo["filename"]); ?></td>
                            <td class="addTime"><?php echo ($vo["addTime"]); ?></td>
                            <td><a class="download" style="margin-right: 5px" href="downloadUpload.html?id=<?php echo ($vo["id"]); ?>"><span>下载</span></a><a class="delete"><span>删除</span></a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div  id="RiskStatisticsProportion" style="display: none">
    <li class="wallHigh"><?php echo ($wallPerCount[3]); ?></li><li class="wallMiddle_High"><?php echo ($wallPerCount[2]); ?></li><li class="wallMiddle"><?php echo ($wallPerCount[1]); ?></li><li class="wallLow"><?php echo ($wallPerCount[0]); ?></li>
    <li class="bottomHigh"><?php echo ($floorPerCount[3]); ?></li><li class="bottomMiddle_High"><?php echo ($floorPerCount[2]); ?></li><li class="bottomMiddle"><?php echo ($floorPerCount[1]); ?></li><li class="bottomLow"><?php echo ($floorPerCount[0]); ?></li>
</div>
<script src="/www/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/www/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<script src="/www/Public/Home/js/content_edit.js"></script>
<script type="text/javascript" src="/www/Public/Home/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/www/Public/Home/js/jquery.form.js"></script>
<script type="text/javascript" src="/www/Public/Home/js/jquery.cookie.js"></script>
<script src="/www/Public/Highcharts/js/highcharts.js"></script>
<script>
    $(function(){

        //    文件上传样式修改操作
        $("#uploadFile .chooseFile").click(function(){
            $("#uploadFile input[type='file']").click();
        })
        $("#uploadFile input[type='file']").change(function(){
            $("#uploadFile .filePath").val($(this).val());
        })


        //关键字搜索
        $("#filterNameWall").keyup(function(){
            $(".filterNameWall tbody tr")
                    .hide()
                    .filter(":contains('"+( $(this).val() )+"')")
                    .show();
        })
        $("#filterNameFloor").keyup(function(){
            $(".filterNameFloor tbody tr")
                    .hide()
                    .filter(":contains('"+( $(this).val() )+"')")
                    .show();
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
            if($(this).parent(".box-head").siblings(".detail").find("div").is(":visible")) {
                $(this).html("展开");
                $(this).parent(".box-head").siblings(".detail").find("div").hide(300);
            }else {
                $(this).html("收起");
                $(this).parent(".box-head").siblings(".detail").find("div").show(300);
            }
        })

//        查看壁板风险详细列表
        $(".wallDetail .content").click(function(){
            var index=$(this).attr("data-row-id");
//            location.href="riskStatisticsDetail.html?index=1 && consequence="+index[1]+"&& failPro="+index[0];
        })
//        查看壁板风险详细列表
        $(".floorDetail .content").click(function(){
            var index=$(this).attr("data-row-id");
//            location.href="riskStatisticsDetail.html?index=2 && consequence="+index[1]+"&& failPro="+index[0];
        })
//        提交測厚信息
        $("#addMaintenanceRecord").ajaxForm({
            beforeSubmit:  function showRequest(){
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



//        文件上传
        $("#uploadFile").ajaxForm({
            beforeSubmit:  function showRequest(){
            },  // 提交前
            success: function showResponse(data){
                alert(data.msg);
                location.reload();
            }
        })
//        文件下载
        $("#tab2 table tr .download").click(function(){
            var filePath=$(this).parents("tr").find(".filePath").text();
            $("#downloadFile").find("input[name='file']").val(filePath);
            $("#downloadFile button").click();
        })
//        文件删除
        $("#tab2 table tr .delete").click(function(){
            var id=$(this).parents("tr").find(".id").text();
            var filePath=$(this).parents("tr").find(".filePath").text();
            $.post("<?php echo U('RiskStatistics/deleteAttachFile');?>",{id:id,filePath:filePath},function(data){
                alert(data.msg);
                location.reload();
            },"JSON")
        })
        $("#downloadFile").ajaxForm({
            beforeSubmit:  function showRequest(){
            },  // 提交前
            success: function showResponse(data){
                alert(data.msg);
                location.reload();
            }
        })

//        饼状图
            var nowYear = parseInt($("#nextInspectYear").attr('data-nowYear'));
            var nextInspectYearData=$("#nextInspectYear");
            var barWallData = new Array(3)
            var barBottomData = new Array(3)
            for(var i=0;i<5;i++){
               barWallData[i]=parseInt(nextInspectYearData.attr('data-wall'+i));
               barBottomData[i]=parseInt(nextInspectYearData.attr('data-Bottom'+i));
            }
            var wallHigh=parseInt($("#RiskStatisticsProportion").find(".wallHigh").text());
            var wallMiddle_High=parseInt($("#RiskStatisticsProportion").find(".wallMiddle_High").text());
            var wallMiddle=parseInt($("#RiskStatisticsProportion").find(".wallMiddle").text());
            var wallLow=parseInt($("#RiskStatisticsProportion").find(".wallLow").text());
            var chart = {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            };
            var title = {
                text:null
            };
            var tooltip = {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            };
            var plotOptions = {
                pie: {

                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false,
                        format: '<b>{series.name}%</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    },
                    showInLegend: true,

                    events : {
                       click : function(e){
                           var riskLevel= e.point.name;
//                           location.href="riskStatisticsDetail.html?wallRiskLevel="+riskLevel;
                       }
                    }

                },
                formatter:function() {return this.y;}
            };
            var credits = {
                enabled: false
            };
            var data = [
                {
                    name  : '低风险:'+wallLow ,
                    y     : wallLow,
                    color : '#F1EFF8'
                },{
                    name  : '中风险:'+wallMiddle,
                    y     : wallMiddle,
                    color : '#FFF55E'
                },{
                    name  : '中高风险:'+wallMiddle_High,
                    y     : wallMiddle_High,
                    color : '#C96406'
                },{
                    name  : '高风险:'+wallHigh,
                    y     : wallHigh,
                    color : '#F81413'
                }
            ];
            var series= [{
                type: 'pie',
                name: '风险比例',
                data: data
            }];
            var json = {};
            json.chart = chart;
            json.title = title;
            json.tooltip = tooltip;
            json.credits = credits;
            json.series = series;
            json.plotOptions = plotOptions;
            $('.statisticsWallFig').highcharts(json);


            var bottomHigh=parseInt($("#RiskStatisticsProportion").find(".bottomHigh").text());
            var bottomMiddle_High=parseInt($("#RiskStatisticsProportion").find(".bottomMiddle_High").text());
            var bottomMiddle=parseInt($("#RiskStatisticsProportion").find(".bottomMiddle").text());
            var bottomLow=parseInt($("#RiskStatisticsProportion").find(".bottomLow").text());
            var chart = {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            };
            var title = {
                text: null
            };
            var tooltip = {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            };
            var plotOptions = {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false,
                        format: '<b>{series.name}%</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    },
                    showInLegend: true,
                    events : {
                        click : function(e){
                            var riskLevel= e.point.name;
//                            location.href="riskStatisticsDetail.html?floorRiskLevel="+riskLevel;
                        }
                    }

                },
                formatter:function() {return this.y;}
            };
            var credits = {
                enabled: false
            };
        var data = [
            {
                name  : '低风险:'+bottomLow ,
                y     : bottomLow,
                color : '#F1EFF8'
            },{
                name  : '中风险:'+bottomMiddle,
                y     : bottomMiddle,
                color : '#FFF55E'
            },{
                name  : '中高风险:'+bottomMiddle_High,
                y     : bottomMiddle_High,
                color : '#C96406'
            },{
                name  : '高风险:'+bottomHigh,
                y     : bottomHigh,
                color : '#F81413'
            }
        ];
            var series= [{
                type: 'pie',
                name: '风险比例',
                data: data
            }];
            var json = {};
            json.chart = chart;
            json.title = title;
            json.tooltip = tooltip;
            json.credits = credits;
            json.series = series;
            json.plotOptions = plotOptions;
            $('.statisticsBottomFig').highcharts(json);

        var chart = {
            type: 'column'
        };
        var title = {
            text: null
        };
        var xAxis = {
            categories: [nowYear, nowYear+1, nowYear+2, nowYear+3, nowYear+4, nowYear+5],
            crosshair: true
        };
        var yAxis = {
            min: 0,
            title: {
                text: '待检验储罐数量'
            }
        };
        var tooltip = {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0"></td>' +
            '<td style="padding:0"><b>待检设备：{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        };
        var plotOptions = {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        };
        var credits = {
            enabled: false
        };
        var series  = [{
            name: '待检验时间',
            data: barWallData
        }];

        var json = {};
        json.chart = chart;
        json.title = title;
        json.tooltip = tooltip;
        json.xAxis = xAxis;
        json.yAxis = yAxis;
        json.series = series;
        json.plotOptions = plotOptions;
        json.credits = credits;
        $('.statisticsFutureWallFig').highcharts(json);


        var chart = {
            type: 'column'
        };
        var title = {
            text: null
        };
        var xAxis = {
            categories: [nowYear, nowYear+1, nowYear+2, nowYear+3, nowYear+4, nowYear+5],
            crosshair: true
        };
        var yAxis = {
            min: 0,
            title: {
                text: '待检验储罐数量'
            }
        };
        var tooltip = {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0"></td>' +
            '<td style="padding:0"><b>待检设备：{point.y:.1f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        };
        var plotOptions = {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        };
        var credits = {
            enabled: false
        };

        var series= [{
            name: '待检验时间',
            data: barBottomData
        }];

        var json = {};
        json.chart = chart;
        json.title = title;
        json.tooltip = tooltip;
        json.xAxis = xAxis;
        json.yAxis = yAxis;
        json.series = series;
        json.plotOptions = plotOptions;
        json.credits = credits;
        $('.statisticsFutureBottomFig').highcharts(json);



        //激活日历控件
        $.datepicker.regional["zh-CN"] = { closeText: "关闭", prevText: "&#x3c;上月", nextText: "下月&#x3e;", currentText: "今天", monthNames: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"], monthNamesShort: ["一", "二", "三", "四", "五", "六", "七", "八", "九", "十", "十一", "十二"], dayNames: ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"], dayNamesShort: ["周日", "周一", "周二", "周三", "周四", "周五", "周六"], dayNamesMin: ["日", "一", "二", "三", "四", "五", "六"], weekHeader: "周", dateFormat: "yy-mm-dd", firstDay: 1, isRTL: !1, showMonthAfterYear: !0, yearSuffix: "年" }
        $.datepicker.setDefaults($.datepicker.regional["zh-CN"]);
        $(".datePicker").datepicker(
                {
                    showOtherMonths: true,
                    selectOtherMonths: true,
                    showButtonPanel: true,
                    dateFormat : "yy-mm-dd"
                }
        );
        $("#ui-datepicker-div").css('font-size','18px');
    });
</script>
</body>
</html>