<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
    <link href="/Public/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Public/Home/css/tabs.css" type="text/css">
    <link rel="stylesheet" href="/Public/Home/css/tableList.css">
    <link rel="stylesheet" href="/Public/Home/css/tableDetail.css">
    <link rel="stylesheet" href="/Public/Home/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/Public/Home/css/jquery-ui.theme.min.css" type="text/css">
    <link rel="stylesheet" href="/Public/Home/css/box.css" type="text/css">
    <style>
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
        a{
            cursor: pointer;
        }
    </style>
    <title></title>
</head>
<body>
<ol class="breadcrumb" style="background-color: transparent;float: left;">
    <li class="active">档案管理</li>
    <li class="active">测厚原始记录</li>
    <li><a href="<?php echo U('Manage/thicknessOrigin');?>" target="main">储罐设备列表</a></li>
    <li class="active">测厚原始记录详细</li>
</ol>
<div style="width: 98%;margin-left: auto;margin-right: auto">
   <table class="borderedDetail">
        <tbody>
        <tr><td>设备名称</td><td><?php echo ($res[0]["plantName"]); ?></td><td>设备位号</td><td><?php echo ($res[0]["plantNO"]); ?></td></tr>
        <tr><td>测量日期</td><td><?php echo ($res[0]['MeasurethicknessrecordOrigin']["measureDate"]); ?></td>
            <td>记录时间</td><td><?php echo ($res[0]['MeasurethicknessrecordOrigin']["recordDate"]); ?></td></tr>
        <tr><td>测量人员</td><td><?php echo ($res[0]['MeasurethicknessrecordOrigin']["measureUserName"]); ?></td>
            <td>记录人员</td><td><?php echo ($res[0]['MeasurethicknessrecordOrigin']["recordUserName"]); ?></td></tr>
        <tr><td>备注</td><td colspan="3"><?php echo ($res[0]['MeasurethicknessrecordOrigin']["remark"]); ?></td></tr>
        </tbody>
    </table>
    <div>
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
                <!-- <a href="" class="btn btn-primary Access" data-access="<?php echo ($Access['IMPORT']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px"><span class="glyphicon glyphicon-import" style="margin-right:5px "></span>导入</a> -->
                <!-- <a href="" class="btn btn-primary Access" data-access="<?php echo ($Access['EXPORT']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px"><span class="glyphicon glyphicon-export" style="margin-right:5px "></span>导出</a> -->
                <a  data-messageId="<?php echo ($res[0]['MeasurethicknessrecordOrigin']["id"]); ?>" data-verifierLevel="<?php echo ($res[0]['MeasurethicknessrecordOrigin']["verifierLevel"]); ?>" id="verifiedNo" class="btn btn-primary Access" data-access="<?php echo ($Access['VERIFIED']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px"><span class="glyphicon glyphicon-remove" style="margin-right:5px "></span>审核不通过</a>
                <a  data-messageId="<?php echo ($res[0]['MeasurethicknessrecordOrigin']["id"]); ?>" data-verifierLevel="<?php echo ($res[0]['MeasurethicknessrecordOrigin']["verifierLevel"]); ?>" id="verifiedYes" class="btn btn-primary Access" data-access="<?php echo ($Access['VERIFIED']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px"><span class="glyphicon glyphicon-ok" style="margin-right:5px "></span>审核通过</a>
                <div id="tab1">
                    <!-- 模态框（Modal） -->
                    <div class="modal fade" id="myModalObservationPointFig" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="width: 60%">
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
                            </div>
                            <!-- box列表块 -->
                            <div class="wallRisk bottom">
                                <ol>
                                    <div style="text-align: right "><a class="checkObservationPoint">查看底板测点图</a></div>
                                    <table class="bordered needMore" id="bottom">
                                        <thead>
                                        <tr><th>底板部位</th><th>测点序号</th><th>原始厚度(mm)</th><th>名义厚度(mm)</th></tr>
                                        </thead>
                                        <tbody>
                                        <?php if(is_array($bottomInfo)): $i = 0; $__LIST__ = $bottomInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tWall): $mod = ($i % 2 );++$i;?><tr data-row-id="<?php echo ($tWall["id"]); ?>">
                                                <td class="layerNO">
                                                    <?php switch($tWall["layerNO"]): case "1": ?>边缘板<?php break;?>
                                                        <?php case "2": ?>中间板<?php break; endswitch;?>
                                                </td>
                                                <td class="layerId"><?php echo ($tWall["layerId"]); ?></td>
                                                <td class="thicknessOrigin"><?php echo ($tWall["thicknessOrigin"]); ?></td>
                                                <td class="namelyThickness">
                                                    <?php switch($tWall["layerNO"]): case "1": echo ($res[0]["bottomEdgeNamelyThickness"]); break;?>
                                                        <?php case "2": echo ($res[0]["bottomMiddleNamelyThickness"]); break; endswitch;?>
                                                </td>
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
                            </div>
                            <!-- box列表块 -->
                            <div class="wallRisk wall">
                                <ol>
                                    <div style="text-align: right "><a class="checkObservationPoint">查看壁板测点图</a></div>
                                    <table class="bordered needMore" id="wallboard">
                                        <thead>
                                        <tr><th>壁板序号</th><th>测点序号</th><th>原始厚度(mm)</th><th>名义厚度(mm)</th></tr>
                                        </thead>
                                        <tbody>
                                        <?php if(is_array($wallboardInfo)): $i = 0; $__LIST__ = $wallboardInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tWall): $mod = ($i % 2 );++$i;?><tr data-row-id="<?php echo ($tWall["id"]); ?>">
                                                <td class="layerNO"><?php echo ($tWall["layerNO"]); ?></td>
                                                <td class="layerId"><?php echo ($tWall["layerId"]); ?></td>
                                                <td class="thicknessOrigin"><?php echo ($tWall["thicknessOrigin"]); ?></td>
                                                <!--<td class="thicknessOriginDate"><?php echo ($tWall["thicknessOriginDate"]); ?></td>-->
                                                <td class="namelyThickness"><?php echo ($tWall["namelyThickness"]); ?></td>
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
                            </div>
                            <!-- box列表块 -->
                            <div class="wallRisk top">
                                <ol>
                                    <div style="text-align: right "><a class="checkObservationPoint">查看顶板测点图</a></div>
                                    <table class="bordered needMore" id="top">
                                        <thead>
                                        <tr><th>测点序号</th><th>原始厚度(mm)</th><th>名义厚度(mm)</th></tr>
                                        </thead>
                                        <tbody>
                                        <?php if(is_array($topInfo)): $i = 0; $__LIST__ = $topInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tWall): $mod = ($i % 2 );++$i;?><tr data-row-id="<?php echo ($tWall["id"]); ?>">
                                                <td class="layerId"><?php echo ($tWall["layerId"]); ?></td>
                                                <td class="thicknessOrigin"><?php echo ($tWall["thicknessOrigin"]); ?></td>
                                                <td class="namelyThickness"><?php echo ($res[0]["topThickness"]); ?></td>
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
                    <table class="bordered">
                        <thead>
                        <tr><th>文件名称</th><th>添加时间</th><th>操作</th></tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($attachment)): $i = 0; $__LIST__ = $attachment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($vo["filename"]); ?></td><td class="type"><?php echo ($vo["addTime"]); ?></td>
                                <td data-row-id="<?php echo ($vo["id"]); ?>">
                                    <a class="download Access" data-access="<?php echo ($Access['DOWNLOAD']['id']); ?>" href="downloadUpload.html?id=<?php echo ($vo["id"]); ?>">下载</a>
                                </td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<!--右键菜单的实现-->
<script src="/Public/Home/js/bootstrapMenu.min.js"></script>
<!--ajax表单的提交，依赖于jquery源代码-->
<script type="text/javascript" src="/Public/Home/js/jquery.form.js"></script>
<!--实现如日历。旋转器，菜单等功能-->
<script type="text/javascript" src="/Public/Home/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/Public/Home/js/jquery.cookie.js"></script>
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
    $(function(){
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

        //设备信息审核
        $("#verifiedNo").click(function(){
            var id=$(this).attr("data-messageId");
            var verifierLevel=$(this).attr("data-verifierLevel");
            if(confirm("是否确认审核不通过？")){
                $.post("<?php echo U('Public/verified');?>",
                        {tableName:"tb_measurethicknessrecord_origin",id:id,verifierLevel:verifierLevel,verifyResult:2},function(data){
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
                            tableName: "tb_measurethicknessrecord_origin",
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

        //壁板上传、添加、查看测点图
        $(".wall .checkObservationPoint").click(function(){
            var wallPointFigPath=$("#myModalObservationPointFig img").attr("data-wallPointFigPath");
            $("#myModalObservationPointFig img").attr("src",wallPointFigPath);
            $("#myModalObservationPointFig .modal-title").html("壁板测点布局图");
            $("#myModalObservationPointFig").modal("show");

        })

        //底板上传、添加、查看测点图

        $(".bottom .checkObservationPoint").click(function(){
            var bottomPointFigPath=$("#myModalObservationPointFig img").attr("data-bottomPointFigPath");
            $("#myModalObservationPointFig img").attr("src",bottomPointFigPath);
            $("#myModalObservationPointFig .modal-title").html("底板测点布局图");
            $("#myModalObservationPointFig").modal("show");
        })

        //顶板上传、添加、查看测点图

        $(".top .checkObservationPoint").click(function(){
            var topPointFigPath=$("#myModalObservationPointFig img").attr("data-topPointFigPath");
            $("#myModalObservationPointFig img").attr("src",topPointFigPath);
            $("#myModalObservationPointFig .modal-title").html("顶板测点布局图");
            $("#myModalObservationPointFig").modal("show");
        })
    })
</script>
</body>
</html>