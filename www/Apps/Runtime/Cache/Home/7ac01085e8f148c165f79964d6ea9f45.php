<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="/www/Public/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/www/Public/Home/css/tabs.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/tableDetail.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/tableList.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/box.css" type="text/css">
    <style>
        .choice{
            padding-bottom: 20px;
            padding-top: 10px;
        }
        .choice span{
            padding: 5px;
        }
        a{
            cursor: pointer;
        }
        #scroll{
            width: 95%;
            margin-left: auto;
            margin-right: auto;
        }
        /*面包屑菜单*/
        .breadcrumb > li + li:before {
            color: #CCCCCC;
            content: " > ";
            padding: 0px 5px;
        }
        .input-group{width: 100%;}.input-group span{width: 30%;}.input-group input{width: 70%;}
    </style>
</head>
<body>
<ol class="breadcrumb" style="background-color: transparent;float: left; height: 30px;width: 100%">
    <li class="active">运行管理</li>
    <li class="active">定点测厚管理</li>
    <li><a href="<?php echo U('Inspect/thicknessDataList');?>">储罐设备列表</a></li>
    <li><a href="thicknessData.html?Index=<?php echo ($PlantInfo['id']); ?>">定点测厚数据列表</a></li>
    <li class="active">定点測厚数据编辑</li>
</ol>
<div style="width: 98%;margin-left: auto;margin-right: auto">
    <table class="borderedDetail borderedInput">
        <tbody>
        <tr><td>设备位号：</td><td><?php echo ($PlantInfo['plantNO']); ?></td>
            <td>测量日期：</td><td><?php echo ($ThicknessRecordInfo["Mea_dt"]); ?></td>
            <td>记录日期：</td><td><?php echo ($ThicknessRecordInfo["Record_dt"]); ?></td>
        </tr>
        <tr><td>圈板数量：</td><td><?php echo ($PlantInfo['layerCount']); ?></td>
            <td>测量人：</td><td><?php echo ($ThicknessRecordInfo["Mea_username"]); ?></td>
            <td>记录人：</td><td><?php echo ($ThicknessRecordInfo["Record_username"]); ?></td>
        </tr>
        <tr><td>备&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp注：</td><td colspan="6">
            <?php echo ($ThicknessRecordInfo["record_remark"]); ?>
        </td>
        </tr>
        </tbody>
    </table>
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
                <div class="choice">
                    <span> 测量部位：</span>
                    <input id="bottomBorderBox" type="checkbox" name="bottomBorderBox" value="<?php echo ($ThicknessRecordInfo["isBottomMea"]); ?>" disabled="disabled"/><span>底板</span>
                    <input id="wallBorderBox" type="checkbox"  name='wallBorderBox' value="<?php echo ($ThicknessRecordInfo["isWallMea"]); ?>" disabled="disabled"/><span>壁板</span>
                    <input id="topBorderBox" type="checkbox" name="topBorderBox" value="<?php echo ($ThicknessRecordInfo["isTopMea"]); ?>" disabled="disabled"/><span>顶板</span>
                </div>
                <div style="width: 100%;margin:10px auto;">

                    <!--底板測厚信息-->
                    <div id="bottomBorder" class="box-container">
                        <!-- box标题块 -->
                        <div class="box-head box-head-list" >
                            <h3>底板測厚信息</h3>
                        </div>
                        <!-- box列表块 -->
                        <div class="riskDoc" style="width: 100%;">
                            <ol>
                                <!--风险分析记录-->
                                <div class="bottomPointFig">
                                    <img width="100%" src="<?php echo ($PointFigPath['bottomPointFigPath']); ?>" alt="底板测点布局图" style="display: none"/>
                                    <div style="text-align: right "><a class="checkObservationPoint">查看测点布局图</a></div>
                                </div>
                                <!--</button>-->
                                <table class="bordered needMore">
                                    <thead>
                                    <tr><th>底板序号</th><th>测点编号</th><th>测量厚度(mm)</th><th>长期腐蚀速率(mm/y)</th><th>短期腐蚀速率(mm/y)</th><th>名义厚度</th><th>投用日期</th><th>操作</th></tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_array($bottom)): $i = 0; $__LIST__ = $bottom;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$th): $mod = ($i % 2 );++$i;?><tr><td class="layerNO"><?php echo ($th["layerNO"]); ?></td><td class="layerId"><?php echo ($th["layerId"]); ?></td><td class="thickness"><?php echo ($th["thickness"]); ?></td>
                                            <td><?php echo ($th["long_termCorrosion"]); ?></td><td><?php echo ($th["short_termCorrosion"]); ?></td>
                                            <td>
                                                <?php switch($th["layerNO"]): case "1": echo ($PlantInfo["bottomEdgeNamelyThickness"]); break;?>
                                                    <?php case "2": echo ($PlantInfo["bottomMiddleNamelyThickness"]); break; endswitch;?>
                                            </td>
                                            <td><?php echo ($PlantInfo["bottomUseDate"]); ?></td>
                                            <td><a class="edit Access" data-row-id="<?php echo ($th["id"]); ?>" data-access="<?php echo ($Access['EDIT']['id']); ?>">编辑</a></td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                                <div style="text-align: right " class="more"><a>查看更多</a>>>></div>
                            </ol>
                        </div>
                    </div>
                    <!-- box容器 start -->
                    <div id="wallBorder" class="box-container">
                        <!-- box标题块 -->
                        <div class="box-head box-head-list" >
                            <h3>壁板測厚信息</h3>
                        </div>
                        <!-- box列表块 -->
                        <div class="riskDoc" style="width: 100%;">
                            <ol>
                                <div class="wallPointFig">
                                    <img width="100%" src="<?php echo ($PointFigPath['wallPointFigPath']); ?>" alt="壁板测点布局图" style="display: none"/>
                                    <div style="text-align: right "><a class="checkObservationPoint">查看测点布局图</a></div>
                                </div>
                                <!--风险分析记录-->
                                <table class="bordered needMore">
                                    <thead>
                                    <tr><th>壁板序号</th><th>测点编号</th><th>测量厚度(mm)</th><th>长期腐蚀速率(mm/y)</th><th>短期腐蚀速率(mm/y)</th><th>名义厚度</th><th>投用日期</th><th>操作</th></tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_array($wall)): $i = 0; $__LIST__ = $wall;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$th): $mod = ($i % 2 );++$i;?><tr><td class="layerNO"><?php echo ($th["layerNO"]); ?></td><td class="layerId"><?php echo ($th["layerId"]); ?></td><td class="thickness"><?php echo ($th["thickness"]); ?></td>
                                            <td><?php echo ($th["long_termCorrosion"]); ?></td><td><?php echo ($th["short_termCorrosion"]); ?></td>
                                            <td><?php echo ($th["namelyThickness"]); ?></td><td><?php echo ($th["namelyUseDate"]); ?></td>
                                            <td><a class="edit Access" data-row-id="<?php echo ($th["id"]); ?>" data-access="<?php echo ($Access['EDIT']['id']); ?>">编辑</a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                                <div style="text-align: right " class="more"><a>查看更多</a>>>></div>
                            </ol>
                        </div>
                    </div>
                    <!-- box容器 end -->
                    <!--顶板測厚信息-->
                    <div id="topBorder" class="box-container">
                        <!-- box标题块 -->
                        <div class="box-head box-head-list" >
                            <h3>顶板測厚信息</h3>
                        </div>
                        <!-- box列表块 -->
                        <div class="riskDoc" style="width: 100%;">
                            <ol>
                                <div class="topPointFig">
                                    <img width="100%" src="<?php echo ($PointFigPath['topPointFigPath']); ?>" alt="顶板测点布局图" style="display: none"/>
                                    <div style="text-align: right "><a class="checkObservationPoint">查看测点布局图</a></div>
                                </div>
                                <!--风险分析记录-->
                                <table class="bordered needMore">
                                    <thead>
                                    <tr><th>顶板序号</th><th>测点编号</th><th>测量厚度(mm)</th><th>长期腐蚀速率(mm/y)</th><th>短期腐蚀速率(mm/y)</th><th>名义厚度</th><th>投用日期</th><th>操作</th></tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_array($top)): $i = 0; $__LIST__ = $top;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$th): $mod = ($i % 2 );++$i;?><tr><td class="layerNO"><?php echo ($th["layerNO"]); ?></td><td class="layerId"><?php echo ($th["layerId"]); ?></td><td class="thickness"><?php echo ($th["thickness"]); ?></td>
                                            <td><?php echo ($th["long_termCorrosion"]); ?></td><td><?php echo ($th["short_termCorrosion"]); ?></td>
                                            <td><?php echo ($PlantInfo["topThickness"]); ?></td><td><?php echo ($PlantInfo["topUseDate"]); ?></td>
                                            <td><a class="edit Access" data-row-id="<?php echo ($th["id"]); ?>" data-access="<?php echo ($Access['EDIT']['id']); ?>">编辑</a></td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                                <div style="text-align: right " class="more"><a>查看更多</a>>>></div>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab2">
                <form action="<?php echo U('Public/upload');?>" enctype="multipart/form-data" method="post" id="upload">
                    <input type="hidden" name="id" value="<?php echo ($ThicknessRecordInfo['id']); ?>" >
                    <input type="hidden" name="tableId" value="Inspect">

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
<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">修改测点測厚数据</h4>
            </div>
            <form id="editThickness" action="<?php echo U('Inspect/editThickness');?>" role="form" method="post">
            <div class="modal-body">
                    <input name="id" class="id" type="hidden"/>
                    <input name="pid" class="pid" type="hidden" value="<?php echo ($ThicknessRecordInfo["id"]); ?>"/>
                    <div class="input-group">
                        <span class="input-group-addon">序号</span>
                        <input type="text" name="layerNO" class="layerNO form-control" disabled="disabled" />
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">测点编号</span>
                        <input type="text" name="layerId" class="layerId form-control" disabled="disabled" />
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">测量厚度(mm)</span>
                        <input type="text" name="thickness" class="thickness form-control" />
                    </div>
                    <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary">更改</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
</body>
<script src="/www/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/www/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
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
            if(index>=1){
                var index=0;
            }else{
                var index=$.cookie('tabs_index');
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

        var wallBorderBox=$("#wallBorderBox").val();
        var bottomBorderBox=$("#bottomBorderBox").val();
        var topBorderBox=$("#topBorderBox").val();
        if(wallBorderBox==1){
            $("#wallBorderBox").attr("checked",true);
            $("#wallBorder").show();
        }else{
            $("#wallBorderBox").attr("checked",false);
            $("#wallBorder").hide();
        }
        if(bottomBorderBox==1){
            $("#bottomBorderBox").attr("checked",true);
            $("#bottomBorder").show();
        }else{
            $("#bottomBorderBox").attr("checked",false);
            $("#bottomBorder").hide();
        }
        if(topBorderBox==1){
            $("#topBorderBox").attr("checked",true);
            $("#topBorder").show();
        }else{
            $("#topBorderBox").attr("checked",false);
            $("#topBorder").hide();
        }


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


    })


//    编辑测点的測厚数据
    $("table tbody tr .edit").click(function(){
        var id=$(this).attr("data-row-id");
        var layerNO=$(this).parents("tr").find(".layerNO").text();
        var layerId=$(this).parents("tr").find(".layerId").text();
        var thickness=$(this).parents("tr").find(".thickness").text();
        $("#editThickness").find(".id").val(id);
        $("#editThickness").find(".layerNO").val(layerNO);
        $("#editThickness").find(".layerId").val(layerId);
        $("#editThickness").find(".thickness").val(thickness);
        $("#myModal").modal("show");
    })

    $("#editThickness").ajaxForm({
        beforeSubmit:  function showRequest(){
            if(confirm("确认修改？")){}else{return false;}
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
</script>
</html>