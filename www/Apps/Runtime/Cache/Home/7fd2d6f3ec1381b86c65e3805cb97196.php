<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
    <title>表格内容</title>
    <link rel="stylesheet" href="/model/Public/bootstrap-3.0.3/css/bootstrap.min.css" type="text/css">
    <link href="/model/Public/Home/css/tableList.css" rel="stylesheet">
    <link href="/model/Public/Home/css/tableDetail.css" rel="stylesheet">
    <style>
        body{
            overflow: auto;
        }
        .breadcrumb > li + li:before {
            color: #CCCCCC;
            content: " > ";
            padding: 0px 5px;
        }
        .manage a{
            text-decoration:none;
            padding-left: 5px;
        }
    </style>
</head>
<body>
<div style="overflow: auto">
    <ol class="breadcrumb" style="background-color: transparent;float: left; height: 30px;width: 100%">
        <li class="active">任务提醒</li>
    </ol>
    <div style="width: 98%;margin-right: auto;margin-left: auto;">
        <div class="filterName" style="line-height: normal">
            <div style="float: right;margin-bottom: 10px">
                筛选：
                <input id="filterName">
            </div>
        </div>
        <table class="bordered">
            <thead>
            <tr><th>任务提醒</th><th>创建时间</th><th>创建人员</th><th>提醒类型</th><th>下次执行时间</th><th>备注</th><th>操作</th></tr>
            </thead>
            <tbody>
            <?php if(is_array($Mission)): $i = 0; $__LIST__ = $Mission;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sc): $mod = ($i % 2 );++$i;?><tr  class="" data-row-id="<?php echo ($sc["id"]); ?>">
                    <td class="title" title={sc.title}><?php echo ($sc["title"]); ?></td>
                    <!--<td class="workshopId" style="display: none" title=<?php echo ($fou["workshopId"]); ?>><?php echo ($sc["workshopId"]); ?></td>-->
                    <td class="setDate" title=<?php echo ($sc["setDate"]); ?>><?php echo ($sc["setDate"]); ?></td>
                    <td class="setter" title=<?php echo ($sc["setter"]); ?>><?php echo ($sc["setter"]); ?></td>
                    <td class="circle" title=<?php echo ($sc["circle"]); ?>>
                        <?php switch($sc["circle"]): case "0": ?>单次提醒<?php break;?>
                            <?php case "1": ?>每天提醒<?php break;?>
                            <?php case "2": ?>每周提醒<?php break;?>
                            <?php case "3": ?>每月提醒<?php break;?>
                            <?php case "4": ?>每年提醒<?php break; endswitch;?>
                    </td>
                    <td class="nextDate" title=<?php echo ($sc["nextDate"]); ?>><?php echo ($sc["nextDate"]); ?></td>
                    <td class="remark" title=<?php echo ($sc["remark'"]); ?>><?php echo ($sc["remark"]); ?></td>

                    <td class="manage">
                        <a class="delete" data-row-id="<?php echo ($sc["id"]); ?>">删除</a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
<script src="/model/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/model/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<script src="/model/Public/Home/js/jquery.form.js" type="text/javascript"></script>
<script src="/model/Public/Home/js/linkageMenu.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function(){
        //关键字搜索
        $("#filterName").keyup(function(){
            $(".bordered tbody tr")
                    .hide()
                    .filter(":contains('"+( $(this).val() )+"')")
                    .show();
        })

        $('title', window.parent.document).html("待办事项");
        //处理待办事项
        $("table tbody tr .edit").click(function(){
            var id=$(this).attr("data-row-id");
//            $.post("<?php echo U('Schedule/handleSchedule');?>",{id:id},function(data){
////                if(data.code==100){
////                    $("table tbody tr .detailHide span").click();
////                }
//            },"JSON");
        })
        //删除待办事项
        $("table tbody tr .delete").click(function(){
            var id=$(this).attr("data-row-id");
            if(confirm("是否确认删除？")){
                $.post("<?php echo U('Schedule/deleteMission');?>",{id:id},function(data){
                    if(data.code==100){
                        alert(data.msg);
                        location.reload();
                    }else{
                        alert(data.msg);
                    }
                },"JSON");
            }else{
                return false;
            }

        })

    })
</script>
</html>
</body>
</html>