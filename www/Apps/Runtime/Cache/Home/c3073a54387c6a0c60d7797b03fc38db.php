<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href="/www/Public/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="/www/Public/Jquery/jquery-smartMenu/css/smartMenu.css" rel="stylesheet">
    <link href="/www/Public/Home/css/tooltip/bubblemenu.css" rel="stylesheet">
    <title></title>
</head>
<style>
    #breadcrumb{
        width: 50%;
        float: left;
    }
    .breadcrumb > li + li:before {
        color: #CCCCCC;
        content: " > ";
        padding: 0px 5px;
    }
    #mapPosition{
        margin-top: 10px;
        width: 100%;
        height: 700px;
    }
    #mapPosition div{
        /*margin-left: 100px;*/
        padding: 0;
        margin-right: auto;
        margin-left: auto;
    }
    #mapPosition div img{
        width: 100%;
        height: 100%;
    }
    .input-group{
        width: 100%;
    }
    .input-group span{
        width: 30%;
    }
    .input-group select,input,textarea{
        width: 70%;
    }
</style>
<body>
<div id="bodySize" style="overflow: auto;width: 100%;padding-bottom: 50px">
    <div id="breadcrumb">
        <ol class="breadcrumb" style="background-color: transparent;float: left; height: 30px;width: 100%">
            <li class="active">可视化管理</li>
            <li><a href="<?php echo U('Visualization/oneLevelMap');?>">燃料油总公司</a></li>
            <li class="active"><?php echo ($GisDataFa["plantName"]); ?></li>
        </ol>
    </div>
    <!--<div id="mousePlantPosition" style="padding:10px;height: 20px ;width: 25%;float: right"></div>-->
    <!--<div id="mousePosition" style="padding:10px;height: 20px ;width: 25%;float: right"></div>-->
    <div id="mousePositionHide" style="display: none"><span class="X"></span><span class="Y"></span></div>
    <div id="mousePlantPositionInfo" style="display: none">
        <?php if(is_array($GisData)): $i = 0; $__LIST__ = $GisData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Gi): $mod = ($i % 2 );++$i;?><ul>
                <li data-data="<?php echo ($Gi["id"]); ?>"></li>
                <li data-data="<?php echo ($Gi["level"]); ?>"></li>
                <li data-data="<?php echo ($Gi["plantName"]); ?>"></li>
                <li data-data="<?php echo ($Gi["positionX"]); ?>"></li>
                <li data-data="<?php echo ($Gi["positionY"]); ?>"></li>
                <li data-data="<?php echo ($Gi["positionRadius"]); ?>"></li>
            </ul><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div id="mapPosition">
        <div style="width: 640px;height: 480px">
            <ul id="bubblemenu">
                <?php if(is_array($GisData)): $i = 0; $__LIST__ = $GisData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Gi): $mod = ($i % 2 );++$i;?><li  data-X="<?php echo ($Gi["positionX"]); ?>" data-Y="<?php echo ($Gi["positionY"]); ?>" data-alert="<?php echo ($Gi["alertRecordId"]); ?>">
                        <span class="glyphicon glyphicon-map-marker"></span>
                        <a href="threeLevelMap.html?id=<?php echo ($Gi["id"]); ?>" style="filter:alpha(opacity=50);background:#ffffff;"><strong><?php echo ($Gi["plantName"]); ?></strong></a>
                        <div>
                            <?php if($Gi["alertRecord"] == '' ): ?>无报警信息<?php endif; ?>
                            <?php if(is_array($Gi["alertRecord"])): $k = 0; $__LIST__ = $Gi["alertRecord"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Gia): $mod = ($k % 2 );++$k;?><a href="<?php echo ($Gia["href"]); ?>" style="color: #ff0000"> 【报警<?php echo ($k); ?>】</br></a>
                                【设备位号】<?php echo ($Gia["plantNO"]); ?></br>
                                【报警时间】<?php echo ($Gia["addTime"]); ?> </br>
                                【报警来源】<?php echo ($Gia["alarmSource"]); ?></br><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <img src="<?php echo ($GisDataFa["subMapUrl"]); ?>"  alt="<?php echo ($GisDataFa["subMapUrl"]); ?>" />
        </div>
    </div>
</div>
<!-- 新增位置模态框（Modal） -->
<div class="modal fade" id="addNewPositionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">新增位置</h4>
            </div>
            <form id="addNewPosition" action="<?php echo U('Visualization/addNewPosition');?>" method="post">
                <input type="hidden" name="pid" class="pid" value="<?php echo ($GisDataFa["id"]); ?>"/>
                <input type="hidden" name="level" class="level" value=2 />
                <input type="hidden" name="positionX" class="positionX" value=""/>
                <input type="hidden" name="positionY" class="positionY" value=""/>
                <div class="modal-body">
                    <div class="input-group">
                        <span class="input-group-addon">罐区/车间名称</span>
                        <select  type="text" name="plantName" class="form-control" >
                            <?php if(is_array($Area)): $i = 0; $__LIST__ = $Area;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$wo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($wo["areaId"]); ?>"><?php echo ($wo["areaId"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

                        </select>
                    </div>
                    <br>
                    <div class="input-group" style="display: none">
                        <span class="input-group-addon">范围大小</span>
                        <input type="hidden" name="positionRadius" class="form-control" value="20" placeholder="该位置的范围大小(单位为像素)">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">备注</span>
                        <textarea type="text" name="remark" class="form-control" placeholder="备注信息"></textarea>
                    </div>
                    <br>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary">确认</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<div class="modal fade" id="addNewMapModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">更新/新增<?php echo ($GisDataFa["plantName"]); ?>地图</h4>
            </div>
            <form enctype="multipart/form-data" id="addNewMapForm" action="<?php echo U('Visualization/upload');?>" method="post" style="padding: 20px">
                <input type="hidden" name="id" value="<?php echo ($GisDataFa["id"]); ?>" >

                <div class="input-group" style="display: none">
                    <span class="input-group-addon">地图名称</span>
                    <input type="text" class="form-control" name="subMapName" value="<?php echo ($GisDataFa["plantName"]); ?>" readonly="readonly"/>
                </div>
                </br>

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
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<script src="/www/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/www/Public/Jquery/jquery-smartMenu/js/jquery-smartMenu.js"></script>
<script src="/www/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<script src="/www/Public/Home/js/bootstrapMenu.min.js"></script>
<script src="/www/Public/Home/js/jquery.form.js" type="text/javascript"></script>
<script>
    $(function() {
        var spanLength = $("#bubblemenu li").length;
        var X = $('#mapPosition div').offset().left;
        var Y = $('#mapPosition div').offset().top;
        for (var i = 0; i < spanLength; i++) {
            var thisSpan = $("#bubblemenu li:nth-child(" + (i + 1) + ")");
            var positionX=parseFloat(thisSpan.attr("data-X"))+X-10;
            var positionY=parseFloat(thisSpan.attr("data-Y"))+Y-15;
            var alertRecordId=thisSpan.attr("data-alert");
            thisSpan.css({'left':positionX+'px','top':positionY+"px"});
            if(alertRecordId==1){
                thisSpan.children(".glyphicon").css("color","#ff0000");
            }else{
                thisSpan.children(".glyphicon").css("color","#0b80c9");
            }
        }
    })
    var getCoordInDocumentExample = function(){
        var coords = document.getElementById("mapPosition");
        coords.onmousemove = function(e){
            var pointer = getCoordInDocument(e);
            var coord = document.getElementById("mousePosition");
            coord.innerHTML = "X,Y=("+pointer.x+", "+pointer.y+")";
            var plantPositionInfoArr=getPlantPositionInfo();
            var length = new Array();
            for(var i=0;i<plantPositionInfoArr.length;i++){
                var positionX=plantPositionInfoArr[i][3];
                var positionY=plantPositionInfoArr[i][4];
                var positionRadius=plantPositionInfoArr[i][5];
                length[i]=Math.sqrt(Math.pow((pointer.x-positionX),2)+Math.pow((pointer.y-positionY),2));
            }
            if(Math.min.apply(null, length)>positionRadius){
                $("#mousePlantPosition").html('');
            }else{
                for(var i=0;i<length.length;i++){
                    if(length[i]<positionRadius){
                        $("#mousePlantPosition").html(plantPositionInfoArr[i][2]);
                    }
                }
            }
        }
    }

    var getCoordInDocument = function(e) {
        e = e || window.event;
        var x = e.pageX || (e.clientX +
                (document.documentElement.scrollLeft
                || document.body.scrollLeft));
        var y= e.pageY || (e.clientY +
                (document.documentElement.scrollTop
                || document.body.scrollTop));
        var X = $('#mapPosition div').offset().left;
        var Y = $('#mapPosition div').offset().top;
        x=x-X;if(x<0){x=0};
        y=y-Y;if(y<0){y=0};
        return {'x':x,'y':y};

    }
    var getPlantPositionInfo = function(){
        var infoLengthUl=$("#mousePlantPositionInfo ul").length;
        var plantPositionInfoArr= new Array();
        for(var i=0;i<infoLengthUl;i++){
            var plantPositionInfo= new Array();
            for(var ii=0;ii<6;ii++){
                plantPositionInfo[ii]=$("#mousePlantPositionInfo ul:nth-child("+(i+1)+") li:nth-child("+(ii+1)+")").attr("data-data");
                plantPositionInfoArr[i]= plantPositionInfo;
            }

        }
        return plantPositionInfoArr;
    }


    window.onload = function(){
        getCoordInDocumentExample();
    };
    $('#mapPosition').mousedown(function(e){
        if(3 == e.which){
            var pointer = getCoordInDocument(e);
            var coordHide=$("#mousePositionHide");
            coordHide.find(".X").html(pointer.x);
            coordHide.find(".Y").html(pointer.y);
        }
    })
    $("#mapPosition").click(function(e){
        var pointer = getCoordInDocument(e);
        var plantPositionInfoArr=getPlantPositionInfo();
        var length = new Array();
        for(var i=0;i<plantPositionInfoArr.length;i++){
            var positionX=plantPositionInfoArr[i][3];
            var positionY=plantPositionInfoArr[i][4];
            var positionRadius=plantPositionInfoArr[i][5];
            length[i]=Math.sqrt(Math.pow((pointer.x-positionX),2)+Math.pow((pointer.y-positionY),2));
        }
        if(Math.min.apply(null, length)>positionRadius){
//            $("#mousePlantPosition").html('');
        }else{
            for(var i=0;i<length.length;i++){
                if(length[i]<positionRadius){
                    location.href="threeLevelMap.html?id="+plantPositionInfoArr[i][0];
                }
            }
        }
    })
    //    提交新增位置信息
    $("#addNewPosition").ajaxForm({
        beforeSubmit:  function showRequest(){
//                alert("你好");
        },  // 提交前
        success: function showResponse(data){
            alert(data.msg);
            location.reload();
        }
    })

    $("#addNewMapForm .chooseFile").click(function(){
        $("#addNewMapForm input[type='file']").click();
    })
    $("#addNewMapForm input[type='file']").change(function(){
        $("#addNewMapForm .filePath").val($(this).val());
    })

//    修改/更新地图
    $("#addNewMapForm").ajaxForm({
        beforeSubmit:  function showRequest(){
//                alert("你好");
        },  // 提交前
        success: function showResponse(data){
            alert(data.msg);
            location.reload();
        }
    })
    //        右键菜单
    $("#mapPosition").smartMenu(
            [
                [{
                    text: "更新/新增公司地图",
                    func: function() {
//                        $("#addNewPositionModal").find(".positionX").val($("#mousePositionHide .X").text());
//                        $("#addNewPositionModal").find(".positionY").val($("#mousePositionHide .Y").text());
//                        $("#addNewPositionModal").find(".pid").val(0);
//                        $("#addNewPositionModal").find(".level").val(1);
                        $("#addNewMapModal").modal("show");
                    }
                }],[{
                    text: "更新/新增罐区位置",
                    func: function() {
                        $("#addNewPositionModal").find(".positionX").val($("#mousePositionHide .X").text());
                        $("#addNewPositionModal").find(".positionY").val($("#mousePositionHide .Y").text());
                        $("#addNewPositionModal").modal("show");
                    }
                }],
                [{
                    text: "图片描边",
                    data: [[{
                        text: "5像素深蓝",
                        func: function() {
                            $(this).css("border", "5px solid #34538b");
                        }
                    }, {
                        text: "5像素浅蓝",
                        func: function() {
                            $(this).css("border", "5px solid #a0b3d6");
                        }
                    }, {
                        text: "5像素淡蓝",
                        func: function() {
                            $(this).css("border", "5px solid #cad5eb");
                        }
                    }]]
                }, {
                    text: "图片内间距",
                    func: function() {
                        $(this).css("padding", "10px");
                    }
                }, {
                    text: "图片背景色",
                    func: function() {
                        $(this).css("background-color", "#beceeb");
                    }
                }],
                [{
                    text: "查看原图",
                    func: function() {
                        var src = $(this).attr("src");
                        window.open(src.replace("/s512", ""));
                    }
                }],
                [{
                    text: "刷新",
                    func: function() {
                        location.reload();
                    }
                }]
            ]
    );

</script>
</body>
</html>