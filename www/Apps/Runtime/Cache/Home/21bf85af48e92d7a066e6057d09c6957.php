<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>表格内容</title>
    <link href="/www/Public/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="/www/Public/Home/css/tableList.css" rel="stylesheet">
    <link href="/www/Public/Home/css/tableDetail.css" rel="stylesheet">
    <style>
        .breadcrumb > li + li:before {
            color: #CCCCCC;
            content: " > ";
            padding: 0px 5px;
        }
        .manage a{
            text-decoration:none;
            padding-left: 5px;
        }

        .input-group{
            width: 100%;
        }
        .input-group span{
            width: 30%;
        }
        .input-group select,.input-group input{
            width: 70%;
        }
    </style>
</head>
<body>
<ol class="breadcrumb" style="background-color: transparent;float: left; height: 30px;width: 100%">
    <li class="active">完整性评价</li>
    <li class="active">报警记录列表</li>
</ol>
<div style="width: 98%;margin-left: auto;margin-right: auto">
<div class="filterName" style="line-height: normal">
    <div style="float: right;margin-bottom: 10px">
        查询：
        <input id="filterName">
    </div>
</div>
<table id="alarmList" class="bordered">
    <thead>
    <tr><th>公司</th><th>罐区/车间</th><th>位号</th><th>储罐名称</th><th>报警时间</th><th>报警位置</th><th>报警状况</th><th>操作</th></tr>
    </thead>
    <tbody>
    <?php if(is_array($AlertRecord)): $i = 0; $__LIST__ = $AlertRecord;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fou): $mod = ($i % 2 );++$i;?><tr  class="brief" data-row-id="<?php echo ($fou["id"]); ?>" data-alarm="<?php echo ($fou["isShowAlarm"]); ?>" data-table="<?php echo ($fou["tableName"]); ?>">
            <td style="display: none" class="id"><?php echo ($fou["id"]); ?></td>
            <td class="workshop" title=<?php echo ($fou["workshopId"]); ?>><?php echo ($fou["workshopId"]); ?></td>
            <td class="area" title=<?php echo ($fou["areaId"]); ?> ><?php echo ($fou["areaId"]); ?></td>
            <td class="plantNO" title=<?php echo ($fou["plantNO"]); ?>><?php echo ($fou["plantNO"]); ?></td>
            <td class="plantName" title=<?php echo ($fou["plantName"]); ?>>
                <?php if(empty($fou["plantName"])): ?>-<?php endif; ?>
                <?php echo ($fou["plantName"]); ?></td>
            <td class="addTime" title=<?php echo ($fou["HandleDate"]); ?>><?php echo ($fou["HandleDate"]); ?></td>
            <td class="alarmSource" title=<?php echo ($fou["alarmSource"]); ?>><?php echo ($fou["alarmSource"]); ?></td>
            <td >
                <?php switch($fou["isShowAlarm"]): case "1": ?>显示报警<?php break;?>
                    <?php case "0": ?>关闭报警<?php break;?>
                    <?php default: ?> 关闭报警<?php endswitch;?>

            </td>
            <!--<td class="dealAlarm" title=<?php echo ($fou["dealAlarm"]); ?>><?php echo ($fou["dealAlarm"]); ?></td>-->
            <td class="manage">

                <a class="detail" data-row-id="<?php echo ($fou["id"]); ?>" data-data="<?php echo ($fou["status"]); ?>">
                    处理报警</a>
                <a class="detailRead" data-row-id="<?php echo ($fou["pid"]); ?>" href="<?php echo ($fou["href"]); ?>" target="_parent">
                    查看
                </a>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>
</div>
</body>
<div class="modal fade" id="dealAlarm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">
                    处理报警
                </h4>
            </div>
            <form class="bs-example bs-example-form" role="form" id="dealAlarmForm" action="<?php echo U('AlertRecordManage/relieveAlertRecord');?>" method="post">
                <input  class="id"        type="hidden" name="id">
                <input  class="tableName" type="hidden" name="tableName">
                <div class="modal-body">
                    <div class="input-group">
                        <span class="input-group-addon">设备位号</span>
                        <input  class="form-control plantNO" disabled="disabled">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">储罐名称</span>
                        <input type="text" class="form-control plantName"  disabled="disabled">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">报警位置</span>
                        <input type="text" class="alarmSource form-control"  disabled="disabled">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">处理状况</span>
                        <select  class="status form-control" name="status">
                            <option value="1">开启报警</option>
                            <option value="0">关闭报警</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                    </button>
                    <button type="submit" class="btn btn-primary">
                        提交
                    </button>
                </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<script src="/www/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/www/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<script src="/www/Public/Home/js/bootstrapMenu.min.js"></script>
<script src="/www/Public/Home/js/jquery.form.js" type="text/javascript"></script>
<script src="/www/Public/Home/js/linkageMenu.js" type="text/javascript"></script>
<script type="text/javascript">

    //根据是否报警显示背景色
    $("#alarmList tbody tr").each(function(){
        if($(this).attr("data-alarm")==1){
            $(this).css('color','red');
//                alert($(this).attr("data-alarm"));
        }
    })

    //    收缩隐藏按钮
    $(function(){
        //关键字搜索
        $("#filterName").keyup(function(){
            $(".bordered tbody tr")
                    .hide()
                    .filter(":contains('"+( $(this).val() )+"')")
                    .show();
        })
//        列表信息删除
        $("table tr .delete ").click(function() {
            //tr:gt(0)表示不选第一行，因为第一行往往是标题
            var id = $(this).attr("data-row-id");
            if(confirm("确定要删除数据吗？")){
                $.post("<?php echo U('AlertRecordManage/deleteAlertRecord');?>",{id:id},function(data){
                    if(data.code==100){
                        alert(data.msg);
                        window.location.reload();
                    }else{
                        alert(data.msg);
                    }
                },"json")
            }else{
                return false;
            }
        })

//        解除报警
        $("table tr .detail ").click(function() {
            //tr:gt(0)表示不选第一行，因为第一行往往是标题
            var id          = $(this).attr("data-row-id");
            var status      = $(this).attr("data-data");
            var tableName   = $(this).parents("tr").attr("data-table");
            var plantNO     = $(this).parents("tr").find(".plantNO").text();
            var plantName   = $(this).parents("tr").find(".plantName").text();
            var alarmSource = $(this).parents("tr").find(".alarmSource").text();
            var dealAlarm   = $(this).parents("tr").find(".dealAlarm").text();
            $("#dealAlarmForm").find(".id").val(id);
            $("#dealAlarmForm").find(".tableName").val(tableName);
            $("#dealAlarmForm").find(".plantNO").val(plantNO);
            $("#dealAlarmForm").find(".plantName").val(plantName);
            $("#dealAlarmForm").find(".dealAlarm").val(dealAlarm);
            $("#dealAlarmForm").find(".alarmSource").val(alarmSource);
            $("#dealAlarmForm").find(".status option[value='"+status+"']").attr("selected",true);
            $("#dealAlarm").modal("show");
        })

        $("#dealAlarmForm").ajaxForm({
            beforeSubmit: function showRequest() {
            },
            success: function showResponse(data) {
                if(data.code==200){
                    alert(data.msg);
                }else{
                    alert(data.msg);
                    location.reload();
                }
            }
        })

    })
</script>
</html>