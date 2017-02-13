<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="/www/Public/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/www/Public/Home/css/tabs.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/tableDetail.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/tableList.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/jquery-ui.theme.min.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/box.css" type="text/css">

    <style>
        a{
            cursor: pointer;
        }
        /*面包屑菜单*/
        .breadcrumb > li + li:before {
            color: #CCCCCC;
            content: " > ";
            padding: 0px 5px;
        }
        /*页面布局*/
        .list{
            width: 98%;
            margin-left: auto;
            margin-right: auto;
        }
        /*.list table{*/
            /*width: 90%;*/
        /*}*/
        .detail{
            width: 98%;

        }
        .modal-dialog{
            width: 90%;
        }
        .modal-body table input{
            width: 100%;
        }
       .modal-content{
           margin-bottom: 20px;
       }
        input{
            text-align: center;
        }
        .choice{
            padding-bottom: 20px;
            padding-top: 10px;
        }
        .choice span{
            padding: 5px;
        }
        .bordered{
            width: 100%;
        }
        .listBorder tbody td tr a {
            cursor: pointer;
            padding-left: 10px;
        }
        .wallInput ul{
            padding: 0;
        }
    </style>
</head>
<body>
<ol class="breadcrumb" style="background-color: transparent;float: left; height: 30px;width: 100%">
    <li class="active">运行管理</li>
    <li class="active">定点测厚管理</li>
    <li><a href="<?php echo U('Inspect/thicknessDataList');?>">储罐设备列表</a></li>
    <li class="active">定点測厚数据列表</li>
</ol>
<div class="list">
    <table class="borderedDetail" >
        <tbody>
        <tr><td>所在厂区</td><td><?php echo ($thicknessInfo[0]['factoryId']); ?></td><td>所在区域</td><td><?php echo ($thicknessInfo[0]['workshopId']); ?></td><td>所在装置</td><td><?php echo ($thicknessInfo[0]['areaId']); ?></td> </tr>
        <tr><td>设备位号</td><td class="plantNO"><?php echo ($thicknessInfo[0]['plantNO']); ?></td><td>设备名称</td><td><?php echo ($thicknessInfo[0]['plantName']); ?></td><td>圈板数量</td><td class="layerC"><?php echo ($thicknessInfo[0]['layerCount']); ?></td></tr>
        </tbody>
    </table>
    <div class="listBorder">
        <button type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#myModal" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px">
            <span class="glyphicon glyphicon-plus" style="margin-right:5px "></span>
            新增測厚信息
        </button>
        <table class="bordered RecordList" style="margin-top: 10px">
            <!--<a id="wallHref" href="" target="wall" style="display: none"><span>获取wall</span></a>-->
            <thead>
            <tr><th>測厚日期</th><th>测量人</th><th>记录人</th><th>记录日期</th><th>测量部位</th><th>审核人员</th><th>审核阶段</th><th>审核结果</th><th>操作</th></tr>
            </thead>
            <tbody>
            <?php if(is_array($thicknessWallInfo)): $i = 0; $__LIST__ = $thicknessWallInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$th): $mod = ($i % 2 );++$i;?><tr data-row-id="<?php echo ($th["id"]); ?>">
                    <td style="display: none" class="id"><?php echo ($th["id"]); ?></td>
                    <td class="Mea_dt"><?php echo ($th["Mea_dt"]); ?></td><td class="Mea_username"><?php echo ($th["Mea_username"]); ?></td>
                    <td class="Record_username"><?php echo ($th["Record_username"]); ?></td>
                    <td class="Mea_Part"><?php echo ($th["Record_dt"]); ?></td>
                    <td>
                        <?php switch($th["isWallMea"]): case "1": ?>壁板<?php break; endswitch;?>
                        <?php switch($th["isBottomMea"]): case "1": ?>底板<?php break; endswitch;?>
                        <?php switch($th["isTopMea"]): case "1": ?>顶板<?php break; endswitch;?>
                    </td>
                    <td title=<?php echo ($th["verifier"]); ?>><?php echo ($th["verifier"]); ?></td>
                    <td title=<?php echo ($th["verifyStage"]); ?>><?php echo ($th["verifyStage"]); ?></td>
                    <td title=<?php echo ($th["verifyResult"]); ?>>
                        <?php switch($th["verifyResult"]): case "0": ?>未审核<?php break;?>
                            <?php case "1": ?>审核通过<?php break;?>
                            <?php case "2": ?>审核不通过<?php break;?>
                            <?php default: ?>未审核<?php endswitch;?>
                    </td>
                    <td><a class="detail Access" data-access="<?php echo ($Access['READ']['id']); ?>" href="thicknessDataWall.html?id=<?php echo ($th["id"]); ?> & pid=<?php echo ($th["pid"]); ?>" target="wall">详细</a>
                        <a class="edit Access" data-access="<?php echo ($Access['EDIT']['id']); ?>" href="thicknessDataEdit.html?id=<?php echo ($th["id"]); ?> & pid=<?php echo ($th["pid"]); ?>">编辑</a>
                        <a class="delete Access" data-access="<?php echo ($Access['DELETE']['id']); ?>" >删除</a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="detail">
    <div class="modal fade" id="myDetailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    定点测厚数据
                </div>
                <div class="modal-body">
                    <iframe name="wall" src="thicknessDataWall.html"  scrolling="yes" frameborder="0" width="100%" height="500"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                新增測厚信息
            </div>
            <div class="modal-body">
                <button type="button" name="addBtn" class="btn btn-primary Access" data-access="<?php echo ($Access['SAVE']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px">
                    <span class="glyphicon glyphicon-ok"></span>&nbsp保存
                </button>
                <form method="post" id="thicknessAdd" action="<?php echo U('Inspect/addThickness');?>">
                    <input name="pid" value="<?php echo ($thicknessInfo[0]['id']); ?>" style="display: none">
                    <table class="borderedDetail borderedInput">
                        <tbody>
                        <tr><td>设备位号：</td><td><?php echo ($thicknessInfo[0]['plantNO']); ?></td>
                            <td>测量日期：</td><td><input  type="datePicker" class="form-control" name="Mea_dt" value="<?php echo ($nowTime); ?>"/>
                            <td>记录日期：</td><td><input  type="datePicker" class="form-control" name="Record_dt" value="<?php echo ($nowTime); ?>"/></td>
                        </tr>
                        <tr><td>圈板数量：</td><td><?php echo ($thicknessInfo[0]['layerCount']); ?></td>
                            <td>测量人：</td><td>
                                <select  type="text" class="form-control" name="Mea_username" data-option="<?php echo ($res[0]['MeasurethicknessrecordOrigin']["measureUserName"]); ?>">
                                    <?php if(is_array($User)): $i = 0; $__LIST__ = $User;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Us): $mod = ($i % 2 );++$i;?><option value="<?php echo ($Us["realname"]); ?>"><?php echo ($Us["realname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            <td>记录人：</td><td>
                                <input name="Record_username" type="hidden" value="<?php echo ($_SESSION['realname']); ?>">
                                <select  type="text" class="form-control" name="Record_username" data-option="<?php echo ($res[0]['MeasurethicknessrecordOrigin']["measureUserName"]); ?>" disabled="disabled">
                                    <?php if(is_array($User)): $i = 0; $__LIST__ = $User;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Us): $mod = ($i % 2 );++$i;?><option value="<?php echo ($Us["realname"]); ?>"><?php echo ($Us["realname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                        </tr>
                        <tr><td>备&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp注：</td><td colspan="6"><textarea type="text" class="form-control" name="record_remark" style="width: 100%"></textarea></td>
                        </tr>
                        </tbody>
                    </table>
                    <button class="submitBtn" type="submit" style="display: none"></button>
                    <div class="tabbable">
                        <ul id="tabs">
                            <li>
                                <a href="#" title="tab1">定点测厚</a>
                            </li>
                            <li>
                                <a href="#" title="tab2">相关文件</a>
                            </li>
                        </ul>
                        <div id="content" style="padding-top: 10px">
                            <div id="tab1">
                                <div class="choice">
                                    <span> 测量部位：</span>
                                    <input id="bottomBorderBox" type="checkbox" name="bottomBorderBox" value=1 /><span>底板</span>
                                    <input id="wallBorderBox" type="checkbox"  name='wallBorderBox' value=1 /><span>壁板</span>
                                    <input id="topBorderBox" type="checkbox" name="topBorderBox" value=1 /><span>顶板</span>
                                </div>
                                <div id="bottomInput" style="display: none">
                                    <div class="box-container">
                                        <!-- box标题块 -->
                                        <div class="box-head box-head-list" >
                                            <h3>底板測厚信息</h3>
                                        </div>
                                        <!-- box列表块 -->
                                        <ol>
                                            <!--风险分析记录-->
                                            <div class="bottomPointFig">
                                                <img width="100%" src="<?php echo ($PointFigPath['bottomPointFigPath']); ?>" alt="底板测点布局图" style="display: none"/>
                                                <div style="text-align: right "><a class="checkObservationPoint">查看测点布局图</a></div>
                                            </div>
                                            <table class="bordered">
                                                <thead>
                                                <tr><th>底板序号</th><th>测点序号</th><th>测量厚度(mm)</th></tr>
                                                </thead>
                                                <tbody>
                                                <?php if(is_array($originBottom)): $i = 0; $__LIST__ = $originBottom;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tWall): $mod = ($i % 2 );++$i;?><tr>
                                                        <td style="display: none"><input  name="part[]" value=2 /></td>
                                                        <td class="Wall_ID"><?php echo ($tWall["layerNO"]); ?><input style="display: none" name="layerNO[]" value="<?php echo ($tWall["layerNO"]); ?>"></td>
                                                        <td class="MeaLoc_ID"><?php echo ($tWall["layerId"]); ?><input style="display: none" name="layerId[]" value="<?php echo ($tWall["layerId"]); ?>"></td>
                                                        <td class="thickness"><input class="spinner" name="thickness[]" value=""></td>
                                                        <td style="display: none"><input name="layerGpid[]" value="<?php echo ($tWall["layerPid"]); ?>"></td>
                                                        <td style="display: none"><input name="layerPid[]" value="<?php echo ($tWall["id"]); ?>"></td>
                                                        <td style="display: none"><input name="namelyThickness[]" value="<?php echo ($tWall["namelyThickness"]); ?>"></td>
                                                        <td style="display: none"><input name="thicknessType[]" value="<?php echo ($tWall["thicknessType"]); ?>"></td>
                                                        <td style="display: none"><input name="useDate[]" value="<?php echo ($tWall["useDate"]); ?>"></td>
                                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                                </tbody>
                                            </table>
                                        </ol>
                                    </div>
                                </div>
                                <div id="wallInput" style="display: none">
                                    <div class="box-container">
                                        <!-- box标题块 -->
                                        <div class="box-head box-head-list" >
                                            <h3>壁板測厚信息</h3>
                                        </div>
                                        <!-- box列表块 -->
                                        <ol>
                                            <!--风险分析记录-->
                                            <div class="wallPointFig">
                                                <img width="100%" src="<?php echo ($PointFigPath['wallPointFigPath']); ?>" alt="壁板测点布局图" style="display: none"/>
                                                <div style="text-align: right "><a class="checkObservationPoint">查看测点布局图</a></div>
                                            </div>
                                            <table class="bordered">
                                                <thead>
                                                <tr><th>壁板序号</th><th>测点序号</th><th>测量厚度(mm)</th></tr>
                                                </thead>
                                                <tbody>
                                                <?php if(is_array($originWall)): $i = 0; $__LIST__ = $originWall;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tWall): $mod = ($i % 2 );++$i;?><tr>
                                                        <td style="display: none"><input  name="part[]" value=1 /></td>
                                                        <td class="Wall_ID"><?php echo ($tWall["layerNO"]); ?><input style="display: none" name="layerNO[]" value="<?php echo ($tWall["layerNO"]); ?>"></td>
                                                        <td class="MeaLoc_ID"><?php echo ($tWall["layerId"]); ?><input style="display: none" name="layerId[]" value="<?php echo ($tWall["layerId"]); ?>"></td>
                                                        <td class="thickness"><input class="spinner" name="thickness[]" value=""></td>
                                                        <td style="display: none"><input name="layerGpid[]" value="<?php echo ($tWall["layerPid"]); ?>"></td>
                                                        <td style="display: none"><input name="layerPid[]" value="<?php echo ($tWall["id"]); ?>"></td>
                                                        <td style="display: none"><input name="namelyThickness[]" value="<?php echo ($tWall["namelyThickness"]); ?>"></td>
                                                        <td style="display: none"><input name="thicknessType[]" value="<?php echo ($tWall["thicknessType"]); ?>"></td>
                                                        <td style="display: none"><input name="useDate[]" value="<?php echo ($tWall["useDate"]); ?>"></td>
                                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                                </tbody>
                                            </table>
                                        </ol>
                                    </div>
                                </div>

                                <div id="topInput" style="display: none">
                                    <div class="box-container">
                                        <!-- box标题块 -->
                                        <div class="box-head box-head-list" >
                                            <h3>顶板測厚信息</h3>
                                        </div>
                                        <!-- box列表块 -->
                                        <div class="riskDoc" style="width: 100%;">
                                            <ol>
                                                <!--风险分析记录-->
                                                <div class="topPointFig">
                                                    <img width="100%" src="<?php echo ($PointFigPath['topPointFigPath']); ?>" alt="底板测点布局图" style="display: none"/>
                                                    <div style="text-align: right "><a class="checkObservationPoint">查看测点布局图</a></div>
                                                </div>
                                                <table class="bordered">
                                                    <thead>
                                                    <tr><th>顶板序号</th><th>测点序号</th><th>测量厚度(mm)</th></tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php if(is_array($originTop)): $i = 0; $__LIST__ = $originTop;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tWall): $mod = ($i % 2 );++$i;?><tr>
                                                            <td style="display: none"><input name="part[]" value=3 /></td>
                                                            <td class="Wall_ID"><?php echo ($tWall["layerNO"]); ?><input style="display: none" name="layerNO[]" value="<?php echo ($tWall["layerNO"]); ?>"></td>
                                                            <td class="MeaLoc_ID"><?php echo ($tWall["layerId"]); ?><input style="display: none" name="layerId[]" value="<?php echo ($tWall["layerId"]); ?>"></td>
                                                            <td class="thickness"><input class="spinner" name="thickness[]" value=""></td>
                                                            <td style="display: none"><input name="layerGpid[]" value="<?php echo ($tWall["layerPid"]); ?>"></td>
                                                            <td style="display: none"><input name="layerPid[]" value="<?php echo ($tWall["layerPid"]); ?>"></td>
                                                            <td style="display: none"><input name="namelyThickness[]" value="<?php echo ($tWall["namelyThickness"]); ?>"></td>
                                                            <td style="display: none"><input name="thicknessType[]" value="<?php echo ($tWall["thicknessType"]); ?>"></td>
                                                            <td style="display: none"><input name="useDate[]" value="<?php echo ($tWall["useDate"]); ?>"></td>
                                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                                    </tbody>
                                                </table>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab2">
                                <div class="alert alert-warning">
                                    提示！请在编辑页面添加相关文件！！！</br>
                                    操作步骤：定点测厚数据->储罐设备列表->定点测厚数据详细，点击“编辑”进行运行记录编辑。
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
</body>
<script src="/www/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/www/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/www/Public/Home/js/jquery-ui.min.js"></script>
<script src="/www/Public/Home/js/bootstrapMenu.min.js"></script>
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
            if(tabs_index>1){
                var index=0;
            }else{
                var index=tabs_index;
            }
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
        //根据复选框是否选中，选择測厚部位
        $(".listBorder button").click(function(){
            $("#thicknessAdd input:checkbox").removeAttr("checked");
            $("#wallInput").hide().find("input").attr("disabled",true);
            $("#bottomInput").hide().find("input").attr("disabled",true);
            $("#topInput").hide().find("input").attr("disabled",true);
        })

        $("#wallBorderBox").click(function(){
            if($("#wallBorderBox").is(":checked")){
                $("#wallInput").find("input").attr("disabled",false);
                $("#wallInput").show();
            }else{
                $("#wallInput").find("input").attr("disabled",true);
                $("#wallInput").hide();
            }
        });
        $("#bottomBorderBox").click(function(){
            if($("#bottomBorderBox").is(":checked")){
                $("#bottomInput").show();
                $("#bottomInput").find("input").attr("disabled",false);
            }else{
                $("#bottomInput").hide();
                $("#bottomInput").find("input").attr("disabled",true);

            }
        });
        $("#topBorderBox").click(function(){
            if($("#topBorderBox").is(":checked")){
                $("#topInput").show();
                $("#topInput").find("input").attr("disabled",false);
            }else{
                $("#topInput").hide();
                $("#topInput").find("input").attr("disabled",true);
            }
        })

        //保存新增设备信息内容
        $(".modal-body button[name='addBtn']").click(function(){
            $("#thicknessAdd .submitBtn").click();
        })
//        新增顶板信息form表单ajax提交
        var options = {
            beforeSubmit:  showRequest,  // 提交前
            success:       showResponse // 提交后
        }
        $("#thicknessAdd").ajaxForm(options);
        //提交前进行表单验证
        function showRequest(formData){
        }
        function showResponse(responseText){
            if(responseText.status==1){
                if(confirm(responseText.msg+",是否需要上传附件？")){
                    location.href="thicknessDataEdit.html?id="+responseText.id+" & pid="+responseText.pid;
                }else{
                    location.reload();
                }

            }else{
                alert(responseText.msg);
            }
        }
        //点击删除測厚信息
        $(".listBorder tbody tr td .delete").click(function(){
            var id=$(this).parents("tr").find(".id").text();
            if(confirm("是否进行删除？")){
                $.post("<?php echo U('Inspect/deleteThickness');?>",{id:id},function(data){
                    alert(data.msg);
                    location.reload();
                },"JSON")
            }else{return false;}

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
        $(".spinner").css('width','100%');
        var spinner = $( ".spinner" ).spinner();


        $(".RecordList tbody tr .detail").click(function(){
            $("#myDetailModal").modal("show");
        })


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

        //壁板上传、添加、查看测点图
        $(".wallPointFig .checkObservationPoint").click(function(){
           var img=$(".wallPointFig img");
            if(img.is(":hidden")){
                $(this).html("隐藏测点布局图");
                img.show(300);
            }else{
                $(this).html("查看测点布局图");
                img.hide(300);
            }
        })

        //底板上传、添加、查看测点图

        $(".bottomPointFig .checkObservationPoint").click(function(){
            var img=$(".bottomPointFig img");
            if(img.is(":hidden")){
                $(this).html("隐藏测点布局图");
                img.show(300);
            }else{
                $(this).html("查看测点布局图");
                img.hide(300);
            }
        })

        //顶板上传、添加、查看测点图

        $(".topPointFig .checkObservationPoint").click(function(){
            var img=$(".topPointFig img");
            if(img.is(":hidden")){
                $(this).html("隐藏测点布局图");
                img.show(300);
            }else{
                $(this).html("查看测点布局图");
                img.hide(300);
            }
        })
    })
</script>
</html>