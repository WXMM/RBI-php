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
            height: 300px;
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
<div id="bodySize" style="overflow: auto;width: 100%;padding-bottom: 50px">
    <ol class="breadcrumb" style="background-color: transparent;float: left; height: 30px;width: 100%">
        <li class="active">待办事项</li>
    </ol>
    <div style="width: 98%;margin-right: auto;margin-left: auto;">
        <div class="filterName" style="line-height: normal">
            <div style="float: right;margin-bottom: 10px">
                筛选：
                <input id="filterName">
            </div>
        </div>
        <table class="bordered" style="margin-bottom: 30px">
            <thead>
            <tr><th>公司</th><th>设备位号</th><th>待办事项</th><th>提交人员</th><th>提交时间</th><th>提交操作</th><th>处理结果</th><th>操作</th></tr>
            </thead>
            <tbody>
            <?php if(is_array($schedule)): $i = 0; $__LIST__ = $schedule;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sc): $mod = ($i % 2 );++$i;?><tr  class="" data-row-id="<?php echo ($sc["id"]); ?>">
                    <td class="workshopId"  title=<?php echo ($fou["workshopId"]); ?>><?php echo ($sc["workshopId"]); ?></td>
                    <td class="plantNO" title=<?php echo ($fou["plantNO"]); ?>><?php echo ($sc["plantNO"]); ?></td>
                    <td class="title" title=<?php echo ($fou["title"]); ?>><?php echo ($sc["title"]); ?></td>
                    <td class="sender" title=<?php echo ($sc["sender"]); ?>><?php echo ($sc["handler"]); ?></td>
                    <td class="sendDate" title=<?php echo ($sc["HandleDate"]); ?>><?php echo ($sc["HandleDate"]); ?></td>
                    <td class="verifyStage">
                        <?php echo ($sc["handleType"]); ?>
                    </td>
                    <td class="verifyResult" title="<?php echo ($sc["verifyResult"]); ?>">
                        <?php switch($sc["verifyResult"]): case "0": ?>未审核<?php break;?>
                            <?php case "1": ?>审核通过<?php break;?>
                            <?php case "2": ?>审核未通过<?php break; endswitch;?>
                    </td>
                    <td class="manage">
                        <a class="detailHide" data-row-id="<?php echo ($sc["id"]); ?>" href="<?php echo ($sc["href"]); ?>">
                            <span>查看</span>
                        </a>
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
        //自适应高度
        var height=$(window).height();
        $("#bodySize").css("height",height);

        //关键字搜索
        $("#filterName").keyup(function(){
            $(".bordered tbody tr")
                    .hide()
                    .filter(":contains('"+( $(this).val() )+"')")
                    .show();
        })

        $('title', window.parent.document).html("待办事项");
        //处理待办事项
        $("table tbody tr .detailHide").click(function(){
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
                $.post("<?php echo U('Schedule/deleteSchedule');?>",{id:id},function(data){
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