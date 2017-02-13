<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/model/Public/bootstrap-3.0.3/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/model/Public/Home/css/tabs.css" type="text/css">
    <link rel="stylesheet" href="/model/Public/Home/css/tableList.css" type="text/css">
    <link rel="stylesheet" href="/model/Public/Home/css/tableDetail.css" type="text/css">
    <link rel="stylesheet" href="/model/Public/Home/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/model/Public/Home/css/jquery-ui.theme.min.css" type="text/css">
    <link rel="stylesheet" href="/model/Public/Home/css/box.css" type="text/css">
    <style>
        a{
            cursor: pointer;
        }
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
        .tankInfoDetail h4{
            width: 100%;
        }
        .choice span{
            padding: 5px;
        }
    </style>
    <title></title>
</head>
<body>
<div class="tankInfoDetail" style="width:98%;margin-left: auto;margin-right: auto">

    <table class="borderedDetail">
        <tbody>
        <tr>
            <td><p>所在厂区:</p></td><td class="floorMiddleCorrosionSpeed"><?php echo ($plant[0]["factoryId"]); ?></td>
            <td><p>所在车间:</p></td><td class="floorEdgeCorrosionSpeed"><?php echo ($plant[0]["workshopId"]); ?></td>
            <td><p>设备名称:</p></td><td class="floorMiddleDamageFactor"><?php echo ($plant[0]["plantName"]); ?></td></tr>
        <tr><td><p>设备位号:</p></td><td class="floorEdgeDamageFactor"><?php echo ($plant[0]["plantNO"]); ?></td>
            <td><p>维修单位:</p></td><td class="floorDamageFactor"><?php echo ($PlantmaintanceRecord[0]['maintanceCompany']); ?></td>
            <td><p>维修日期:</p></td><td class="floorFailPro"><?php echo ($PlantmaintanceRecord[0]['maintanceDate']); ?></td></tr>
        </tbody>
    </table>
    <div id="detail">
    <div class="tabbable">
        <ul id="tabs">
            <li>
                <a href="" title="tab1">维修记录</a>
            </li>
            <li>
                <a href="" title="tab2">相关文件</a>
            </li>
            <!--<button class="btn btn-primary" id="addMaintenanceInfo" style="float: right">新增维修记录</button>-->
        </ul>
        <div id="content">
            <div id="tab1" class="tab">
                <!-- <button  class="btn btn-primary Access" data-access="<?php echo ($Access['IMPORT']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px"><span class="glyphicon glyphicon-import" style="margin-right:5px "></span>导入</button> -->
                <!-- <button  class="btn btn-primary Access" data-access="<?php echo ($Access['EXPORT']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px"><span class="glyphicon glyphicon-export" style="margin-right:5px "></span>导出</button> -->
                <a data-messageId="<?php echo ($PlantmaintanceRecord[0]["id"]); ?>" data-verifierLevel="<?php echo ($PlantmaintanceRecord[0]["verifierLevel"]); ?>" class="btn btn-primary Access" id="verifiedNo" data-access="<?php echo ($Access['VERIFIED']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px"><span class="glyphicon glyphicon-remove" style="margin-right:5px "></span>审核不通过</a>
                <a data-messageId="<?php echo ($PlantmaintanceRecord[0]["id"]); ?>" data-verifierLevel="<?php echo ($PlantmaintanceRecord[0]["verifierLevel"]); ?>" class="btn btn-primary Access" id="verifiedYes" data-access="<?php echo ($Access['VERIFIED']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px"><span class="glyphicon glyphicon-ok" style="margin-right:5px "></span>审核通过</a>

                <div style="width: 100%;margin:10px auto;">
                    <div class="choice" style="margin-bottom: 20px">
                        <span> 检验部位：</span>
                        <input id="bottomBorderBox" type="checkbox" name="bottomBorderBox" value="<?php echo ($PlantmaintanceRecord[0]["isBottom"]); ?>"  disabled="disabled"/><span>底板</span>
                        <input id="wallBorderBox" type="checkbox"  name='wallBorderBox' value="<?php echo ($PlantmaintanceRecord[0]["isWall"]); ?>"  disabled="disabled"/><span>壁板</span>
                        <input id="topBorderBox" type="checkbox" name="topBorderBox" value="<?php echo ($PlantmaintanceRecord[0]["isTop"]); ?>" disabled="disabled" /><span>顶板</span>
                    </div>
                    <!-- box容器 end -->
                    <div style="width: 100%;margin:10px auto;">
                        <!-- box容器 start -->
                        <div class="box-container bottomBorderBox" style="display: none">
                            <!-- box标题块 -->
                            <div class="box-head box-head-list">
                                <h3>底板维修信息</h3>
                                <a class="box-head-more">收起</a>
                            </div>
                            <!-- box列表块 -->
                            <div class="detail">
                                <ol>
                                    <table class="borderedDetail">
                                        <tbody>
                                        <tr>
                                            <td><p>底板是否更换:</p></td><td>
                                            <?php switch($PlantmaintanceRecord[0]["isChange_bottom"]): case "1": ?>是<?php break;?>
                                                <?php case "0": ?>否<?php break;?>
                                                <?php default: ?>否<?php endswitch;?>
                                        </td>
                                            <td><p>底板更换日期:</p></td><td><?php echo ($PlantmaintanceRecord[0]['changeDate_bottom']); ?></td>
                                            <td><p>底板是否涂层:</p></td><td>
                                            <?php switch($PlantmaintanceRecord[0]["isInsidePaint_bottom"]): case "1": ?>是<?php break;?>
                                                <?php case "0": ?>否<?php break;?>
                                                <?php default: ?>否<?php endswitch;?></td></tr>
                                        <tr><td><p>底板涂层日期:</p></td><td><?php echo ($PlantmaintanceRecord[0]['insidePaintDate_bottom']); ?></td>
                                            <td><p>底板涂层质量:</p></td><td><?php echo ($PlantmaintanceRecord[0]['insidePaintQuality_bottom']); ?></td>
                                            <td><p>是否安装衬里:</p></td><td>
                                                <?php switch($PlantmaintanceRecord[0]["isInstallLining_bottom"]): case "1": ?>是<?php break;?>
                                                    <?php case "0": ?>否<?php break;?>
                                                    <?php default: ?>否<?php endswitch;?>
                                            </td></tr>
                                        <tr><td><p>底板衬里类型:</p></td><td><?php echo ($PlantmaintanceRecord[0]['liningType_bottom']); ?></td>
                                            <td><p>衬里安装日期:</p></td><td><?php echo ($PlantmaintanceRecord[0]['installLiningDate_bottom']); ?></td>
                                            <td><p>底板衬里质量:</p></td><td><?php echo ($PlantmaintanceRecord[0]['liningQuality_bottom']); ?></td></tr>
                                        <tr><td><p>衬里最近检验日期:</p></td><td><?php echo ($PlantmaintanceRecord[0]['liningCheckDate_bottom']); ?></td>
                                            <td></td><td></td>
                                            <td></td><td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </ol>
                            </div>
                        </div>
                        <!-- box容器 end -->

                    </div>
                    <!-- box容器 start -->
                    <div class="box-container wallBorderBox" style="display: none">
                        <!-- box标题块 -->
                        <div class="box-head box-head-list">
                            <h3>壁板维修信息</h3>
                            <a class="box-head-more">收起</a>
                        </div>
                        <!-- box列表块 -->
                        <div class="detail">
                            <ol>
                                <table class="bordered">
                                    <thead><th>壁板层号</th><th>圈板是否更换</th><th>圈板更换日期</th></thead>
                                    <tbody>
                                    <?php if(is_array($PlantmaintanceRecord[0]['Plantmaintancerecordwall'])): $i = 0; $__LIST__ = $PlantmaintanceRecord[0]['Plantmaintancerecordwall'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rD): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($rD["layerNO"]); ?></td><td>
                                            <?php switch($rD["isChange"]): case "1": ?>是<?php break;?>
                                                <?php case "0": ?>否<?php break;?>
                                                <?php default: ?>否<?php endswitch;?>
                                        </td><td><?php echo ($rD["changeDate"]); ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                                <table class="borderedDetail">
                                    <tbody>
                                    <tr>
                                        <td><p>内壁是否涂层:</p></td><td>
                                        <?php switch($PlantmaintanceRecord[0]["isInsidePaint_side"]): case "1": ?>是<?php break;?>
                                            <?php case "0": ?>否<?php break;?>
                                            <?php default: ?>否<?php endswitch;?>
                                    </td>
                                        <td><p>内壁涂层日期:</p></td><td><?php echo ($PlantmaintanceRecord[0]['insidePaintDate_side']); ?></td>
                                        <td><p>内壁涂层质量:</p></td><td><?php echo ($PlantmaintanceRecord[0]['insidePaintQuality_side']); ?></td>
                                    </tr>
                                    <tr>
                                        <td><p>外壁是否涂层:</p></td><td>
                                        <?php switch($PlantmaintanceRecord[0]["isOutsidePaint_side"]): case "1": ?>是<?php break;?>
                                            <?php case "0": ?>否<?php break;?>
                                            <?php default: ?>否<?php endswitch;?>
                                    </td>
                                        <td><p>外壁涂层日期:</p></td><td class="wallMajorRisk"><?php echo ($PlantmaintanceRecord[0]['outsidePaintDate_side']); ?></td>
                                        <td><p>外壁涂层质量:</p></td><td class="wallNextCheckDate"><?php echo ($PlantmaintanceRecord[0]['outsidePaintQuality_side']); ?></td>
                                    </tr>
                                    <tr>
                                        <td><p>是否安装衬里:</p></td><td>
                                        <?php switch($PlantmaintanceRecord[0]["isInstallLining_side"]): case "1": ?>是<?php break;?>
                                            <?php case "0": ?>否<?php break;?>
                                            <?php default: ?>否<?php endswitch;?>
                                    </td>
                                        <td><p>衬里类型:</p></td><td><?php echo ($PlantmaintanceRecord[0]['liningType_side']); ?></td>
                                        <td><p>衬里安装日期:</p></td><td class="wallNextCheckDate"><?php echo ($PlantmaintanceRecord[0]['installLiningDate_side']); ?></td>
                                    </tr>
                                    <tr>
                                        <td><p>衬里质量:</p></td><td class="wallRiskLevel"><?php echo ($PlantmaintanceRecord[0]['liningQuality_side']); ?></td>
                                        <td><p>衬里最近检验日期:</p></td><td class="wallMajorRisk"><?php echo ($PlantmaintanceRecord[0]['liningCheckDate_side']); ?></td>
                                        <td></td><td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </ol>
                        </div>

                    </div>

                    <div style="width: 100%;margin:10px auto;">
                        <!-- box容器 start -->
                        <div class="box-container topBorderBox" style="display: none">
                            <!-- box标题块 -->
                            <div class="box-head box-head-list">
                                <h3>顶板维修信息</h3>
                                <a class="box-head-more">收起</a>
                            </div>
                            <!-- box列表块 -->
                            <div class="detail">
                                <ol>
                                    <table class="borderedDetail">
                                        <tbody>
                                        <tr>
                                            <td><p>顶板是否更换:</p></td><td>
                                            <?php switch($PlantmaintanceRecord[0]["isChange_top"]): case "1": ?>是<?php break;?>
                                                <?php case "0": ?>否<?php break;?>
                                                <?php default: ?>否<?php endswitch;?>
                                        </td>
                                            <td><p>顶板更换日期:</p></td><td><?php echo ($PlantmaintanceRecord[0]['changeDate_top']); ?></td>
                                            <td><p>内壁是否涂层:</p></td><td>
                                            <?php switch($PlantmaintanceRecord[0]["isInsidePaint_top"]): case "1": ?>是<?php break;?>
                                                <?php case "0": ?>否<?php break;?>
                                                <?php default: ?>否<?php endswitch;?>
                                        </td>
                                        <tr><td><p>内壁涂层日期:</p></td><td><?php echo ($PlantmaintanceRecord[0]['insidePaintDate_top']); ?></td>
                                            <td><p>内壁涂层质量:</p></td><td><?php echo ($PlantmaintanceRecord[0]['insidePaintQuality_top']); ?></td>
                                            <td><p>外壁是否涂层:</p></td><td>
                                                <?php switch($PlantmaintanceRecord[0]["isOutsidePaint_top"]): case "1": ?>是<?php break;?>
                                                    <?php case "0": ?>否<?php break;?>
                                                    <?php default: ?>否<?php endswitch;?>
                                            </td></tr>
                                        <tr><td><p>外壁涂层日期:</p></td><td><?php echo ($PlantmaintanceRecord[0]['outsidePaintDate_top']); ?></td>
                                            <td><p>外壁涂层质量:</p></td><td><?php echo ($PlantmaintanceRecord[0]['outsidePaintQuality_top']); ?></td>
                                            <td></td><td ></td></tr>
                                        </tbody>
                                    </table>
                                </ol>
                            </div>
                        </div>
                        <!-- box容器 end -->

                    </div>
                </div>

            </div>
            <div id="tab2" class="tab" style="margin-bottom: 20px">
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
</div>
<script src="/model/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/model/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<script src="/model/Public/Home/js/content_edit.js"></script>
<script type="text/javascript" src="/model/Public/Home/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/model/Public/Home/js/jquery.form.js"></script>
<script type="text/javascript" src="/model/Public/Home/js/jquery.cookie.js"></script>
<script>
    function delTr(){
        $(this).parents("tr").remove();
    }
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
            if($(this).parent(".box-head").siblings(".detail").find("table").is(":visible")) {
                $(this).html("展开");
                $(this).parent(".box-head").siblings(".detail").find("table").hide(300);
            }else {
                $(this).html("收起");
                $(this).parent(".box-head").siblings(".detail").find("table").show(300);
            }
        })

        //选择时候选中壁板、底板、顶板
        var wallBorderVal=$("#wallBorderBox").val()
        var bottomBorderVal=$("#bottomBorderBox").val()
        var topBorderVal=$("#topBorderBox").val()
        if(wallBorderVal==1){
            $("#wallBorderBox").attr("checked",true);
            $(".wallBorderBox").show();
        }
        if(bottomBorderVal==1){
            $("#bottomBorderBox").attr("checked",true);
            $(".bottomBorderBox").show();
        }
        if(topBorderVal==1){
            $("#topBorderBox").attr("checked",true);
            $(".topBorderBox").show();
        }


//     激活spin插件
        var date = new Date();
        var dataPickerValue=$( "input[type='datePicker']" ).val();
        if(dataPickerValue=='') {
            $("input[type='datePicker']").val(date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate());
        }
        $(".spinner").css('width','100%');
        var spinner = $( ".spinner" ).spinner();
        //激活日历控件
        $.datepicker.regional["zh-CN"] = { closeText: "关闭", prevText: "&#x3c;上月", nextText: "下月&#x3e;", currentText: "今天", monthNames: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"], monthNamesShort: ["一", "二", "三", "四", "五", "六", "七", "八", "九", "十", "十一", "十二"], dayNames: ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"], dayNamesShort: ["周日", "周一", "周二", "周三", "周四", "周五", "周六"], dayNamesMin: ["日", "一", "二", "三", "四", "五", "六"], weekHeader: "周", dateFormat: "yy-mm-dd", firstDay: 1, isRTL: !1, showMonthAfterYear: !0, yearSuffix: "年" }
        $.datepicker.setDefaults($.datepicker.regional["zh-CN"]);
        function initDatePicker(ele){
            ele.datepicker(
                    {
                        showOtherMonths: true,
                        selectOtherMonths: true,
                        showButtonPanel: true,
                        dateFormat : "yy-mm-dd"
                    }
            );
        }
        initDatePicker($( "input[type='datePicker']" ));
        $("#ui-datepicker-div").css('font-size','18px');

        $(".wallInput .addWallboardmain").click(function(){
            var layerCount=$("#myModalPreview #pid").val();
            $.post("<?php echo U('MaintenanceRecord/getLayerSelect');?>",{pid:layerCount},function(data){
                var option="";
                for(var i=0;i<data.length;i++){
                    var optionValue=data[i]['layerNO'];
                    var option=option+"<option value="+optionValue+">"+optionValue+"</option>";

                }
                var layerSelect='<select name="layerNO[]" style="width: 100%">'+option+'</select>';
                var select="<select name='isChange[]' style='width: 100%'><option value=0 >否</option><option value=1 >是</option></select>"
                var input="<input name='changeDate[]' type='datePicker' style='width: 100%'/>";
                var del="<a class='delete' onclick='delTr(this)'>删除</a>";
                var tr="<tr><td>"+layerSelect+"</td><td>"+select+"</td><td>"+input+"</td><td>"+del+"</td></tr>";
                $(".wallInput ol .bordered tbody").append(tr);
//                tr.find(".del").click(delTr).end().appendTo($(".wallInput ol .bordered tbody"));
                initDatePicker($( "input[type='datePicker']" ));
            },"JSON")
        });
//        点击删除，风险计算结果
        $('.riskDoc tr .delete').click(function(){
            var i=$(this).find("span").text();
            $.post("<?php echo U('MaintenanceRecord/deleteMaintenanceRecord');?>",{id:i},function(data){
                alert(data.msg);
                location.reload();
            },"json");

        });
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


        //设备信息审核
        $("#verifiedNo").click(function(){
            var id=$(this).attr("data-messageId");
            var verifierLevel=$(this).attr("data-verifierLevel");
            if(confirm("是否确认审核不通过？")){
                $.post("<?php echo U('Public/verified');?>",
                        {tableName:"tb_plantmaintancerecord",id:id,verifierLevel:verifierLevel,verifyResult:2},function(data){
                            alert(data.msg);
                            window.parent.location.reload();
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
                            tableName: "tb_plantmaintancerecord",
                            id: id,
                            verifierLevel: verifierLevel,
                            verifyResult: 1
                        }, function (data) {
                            alert(data.msg);
                            window.parent.location.reload();
                        }, "JSON")
            }else{
                return false;
            }
        })

    });
</script>
</body>
</html>