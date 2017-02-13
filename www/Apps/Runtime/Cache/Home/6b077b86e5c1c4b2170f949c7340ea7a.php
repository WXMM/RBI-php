<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="/www/Public/Home/css/tabs.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/tableList.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/tableDetail.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/jquery-ui.theme.min.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/Home/css/box.css" type="text/css">
    <link rel="stylesheet" href="/www/Public/bootstrap-3.0.3/css/bootstrap.min.css" type="text/css">
</head>
<body>
<table class="borderedDetail" style="width: 98%;margin-right: auto;margin-left: auto">
    <tbody>
    <tr>
        <td>设备位号：</td><td><?php echo ($plant['plantNO']); ?></td>
        <td>油罐类型：</td><td class="OilTankType"><?php echo ($plant['OilTankType']); ?></td>
        <td>检查人员：</td><td><?php echo ($RunRecordList['checker']); ?></td></tr>
    <tr><td>记录人员：</td><td><?php echo ($RunRecordList['recorder']); ?></td>
        <td>检查日期：</td><td><?php echo ($RunRecordList['check_dt']); ?></td>
        <td>记录日期：</td><td><?php echo ($RunRecordList['record_dt']); ?></td>
    </tr>
    <tr><td>备&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp注：</td><td colspan="6"><?php echo ($RunRecordList['remark']); ?></td>
    </tr>
    </tbody>
</table>
<div class="tabbable" style="width: 98%;margin-right: auto;margin-left: auto">
    <ul id="tabs">
        <li>
            <a href="" title="tab1">检查内容</a>
        </li>
        <li>
            <a href="" title="tab2">相关文件</a>
        </li>
    </ul>
    <div id="content">
        <!-- <a href="" class="btn btn-primary Access" data-access="<?php echo ($Access['IMPORT']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px"><span class="glyphicon glyphicon-import" style="margin-right:5px "></span>导入</a> -->
        <!-- <a href="" class="btn btn-primary Access" data-access="<?php echo ($Access['EXPORT']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px"><span class="glyphicon glyphicon-export" style="margin-right:5px "></span>导出</a> -->
        <a  data-messageId="<?php echo ($RunRecordList["id"]); ?>" data-verifierLevel="<?php echo ($RunRecordList["verifierLevel"]); ?>" class="btn btn-primary Access" id="verifiedNo"
            data-access="<?php echo ($Access['VERIFIED']['id']); ?>"
            style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px">
            <span class="glyphicon glyphicon-remove" style="margin-right:5px "></span>
            审核不通过
        </a>
        <a data-messageId="<?php echo ($RunRecordList["id"]); ?>" data-verifierLevel="<?php echo ($RunRecordList["verifierLevel"]); ?>" class="btn btn-primary Access" id="verifiedYes"
           data-access="<?php echo ($Access['VERIFIED']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px">
            <span class="glyphicon glyphicon-ok" style="margin-right:5px "></span>
            审核通过
        </a><div id="tab1" class="tab">
            <table class="bordered">
                <thead><th>位置</th><th>明细</th><th>检查情况</th><th>备注</th></thead>
                <tbody>
                <?php if(is_array($RunRecordDetail)): $i = 0; $__LIST__ = $RunRecordDetail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$RRI): $mod = ($i % 2 );++$i;?><tr data-alarm="<?php echo ($RRI["checkResult"]); ?>">
                        <td><?php echo ($RRI["part"]); ?></td>
                        <td><?php echo ($RRI["partDetail"]); ?></td>
                        <td>
                            <?php switch($RRI["checkResult"]): case "1": ?>√<?php break;?>
                                <?php case "0": ?>×<?php break;?>
                                <?php case "2": ?>/<?php break; endswitch;?>
                        </td>
                        <td><?php echo ($RRI["remark"]); ?></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
        <div id="tab2" class="tab">
            <table class="bordered">
                <thead>
                <tr><th>文件名称</th><th>添加时间</th><th>操作</th></tr>
                </thead>
                <tbody>
                <?php if(is_array($attachment)): $i = 0; $__LIST__ = $attachment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($vo["filename"]); ?></td><td class="type"><?php echo ($vo["addTime"]); ?></td>
                        <td data-row-id="<?php echo ($vo["id"]); ?>">
                            <a class="download Access"  data-access="<?php echo ($Access['DOWNLOAD']['id']); ?>" href="downloadUpload.html?id=<?php echo ($vo["id"]); ?>">下载</a>
                        </td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
<script src="/www/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/www/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
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

    //根据是否报警显示背景色
    $("#tab1 tbody tr").each(function(){
        if($(this).attr("data-alarm")==0){
            $(this).css('color','red');
//                alert($(this).attr("data-alarm"));
        }
    })
    //tabs菜单的切换
    var tabs_index=$.cookie('tabs_index');
    if(tabs_index==undefined){
        var index=0;
    }else{
        if(tabs_index>=1){
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

    //设备信息审核
    $("#verifiedNo").click(function(){
        var id=$(this).attr("data-messageId");
        var verifierLevel=$(this).attr("data-verifierLevel");
        if(confirm("是否确认审核不通过？")){
            $.post("<?php echo U('Public/verified');?>",
                    {tableName:"tb_runrecordlist",id:id,verifierLevel:verifierLevel,verifyResult:2},function(data){
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
                        tableName: "tb_runrecordlist",
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
</script>
</html>