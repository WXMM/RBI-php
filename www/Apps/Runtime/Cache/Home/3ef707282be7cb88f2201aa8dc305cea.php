<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>表格内容</title>
    <link href="/model/Public/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="/model/Public/Home/css/tableList.css" rel="stylesheet">
    <link href="/model/Public/Home/css/tableDetail.css" rel="stylesheet">
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
    </style>
</head>
<body>
<ol class="breadcrumb" style="background-color: transparent;float: left; height: 30px;width: 100%">
    <li class="active">完整性管理</li>
    <li><a href="<?php echo U('RiskStatistics/RiskStatisticsFig');?>" target="content">风险统计</a></li>
    <li class="active">风险列表</li>
</ol>
<div style="width: 98%;margin-right: auto;margin-left: auto">
<div class="filterName" style="line-height: normal">
    <div style="float: right;margin-bottom: 10px">
        筛选：
        <input id="filterName">
    </div>
</div>
<table class="bordered">
    <thead>
    <tr><th>公司</th><th>罐区/车间</th><th>储罐名称</th><th>日期</th><th>壁板风险等级</th><th>底板风险等级</th><th>壁板失效可能性</th><th>底板失效可能性</th><th>壁板失效后果等级</th><th>底板失效后果等级</th></tr>
    </thead>
    <tbody>
    <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fou): $mod = ($i % 2 );++$i;?><tr  class="brief" data-row-id="<?php echo ($fou["id"]); ?>"><td style="display: none" class="id"><?php echo ($fou["id"]); ?></td>
            <td class="workshop" title=<?php echo ($fou["workshopId"]); ?>><?php echo ($fou["workshopId"]); ?></td><td class="area" title=<?php echo ($fou["areaId"]); ?> style="display: none"><?php echo ($fou["areaId"]); ?></td>
            <td class="plant" title=<?php echo ($fou["plantNO"]); ?>><?php echo ($fou["plantNO"]); ?></td><td title=<?php echo ($fou["plantName"]); ?>><?php echo ($fou["plantName"]); ?></td>
            <td title=<?php echo ($fou["countDate"]); ?>><?php echo ($fou["countDate"]); ?></td><td title=<?php echo ($fou["wallRiskLevel"]); ?>><?php echo ($fou["wallRiskLevel"]); ?></td>
            <td><?php echo ($fou["floorRiskLevel"]); ?></td><td><?php echo ($fou["wallFailPro"]); ?></td><td><?php echo ($fou["floorFailPro"]); ?></td><td><?php echo ($fou["wallConsequenceLevel"]); ?></td><td><?php echo ($fou["floorConsequenceLevel"]); ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>
</div>
</body>
<script src="/model/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/model/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<script src="/model/Public/Home/js/bootstrapMenu.min.js"></script>
<script src="/model/Public/Home/js/jquery.form.js" type="text/javascript"></script>
<script src="/model/Public/Home/js/linkageMenu.js" type="text/javascript"></script>
<script type="text/javascript">
    //    收缩隐藏按钮
    $(function(){
        //关键字搜索
        $("#filterName").keyup(function(){
            $(".bordered tbody tr")
                    .hide()
                    .filter(":contains('"+( $(this).val() )+"')")
                    .show();
        })

//        双击跳转至详细页面
        $("tbody tr").dblclick(function(){
            $(this).find('.detail span').click();
        })
        //表格插件
//        $("table").resizableColumns({});
    })
</script>
</html>