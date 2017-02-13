<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/www/Public/Home/css/tableList.css">
    <link href="/www/Public/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <title></title>
    <style>

        .breadcrumb > li + li:before {
            color: #CCCCCC;
            content: " > ";
            padding: 0px 5px;
        }
        table a{
            margin-left: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<ol class="breadcrumb" style="background-color: transparent;float: left; height: 30px;width: 100%">
    <li class="active">档案管理</li>
    <li class="active">测厚原始记录</li>
    <li class="active">储罐设备列表</li>
</ol>
<div style="width: 98%;margin-left: auto;margin-right: auto">
    <div class="filterName" style="line-height: normal">
        <div style="float: right;margin-bottom: 10px">
            查询：
            <input id="filterName">
        </div>
    </div>
    <table class="bordered">
        <thead>
        <tr><th>公司</th><th>罐区/车间</th><th>设备位号</th><th>设备名称</th><th>审核人员</th><th>审核阶段</th><th>审核结果</th><th>操作</th></tr>
        </thead>
        <tbody>
        <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr data-row-id="<?php echo ($vo["id"]); ?>">
                <!--<td title="<?php echo ($vo["factoryId"]); ?>"><?php echo ($vo["factoryId"]); ?></td>-->
                <td title="<?php echo ($vo["workshopId"]); ?>"><?php echo ($vo["workshopId"]); ?></td>
                <td title="<?php echo ($vo["areaId"]); ?>"><?php echo ($vo["areaId"]); ?></td>
                <td class="plant" title="<?php echo ($vo["plantNO"]); ?>"><?php echo ($vo["plantNO"]); ?></td>
                <td title="<?php echo ($vo["plantName"]); ?>">
                    <?php if(empty($vo["plantName"])): ?>-<?php endif; ?>
                    <?php echo ($vo["plantName"]); ?></td>
                <td><?php if(empty($vo["MeasurethicknessrecordOrigin"]["verifier"])): ?>-<?php endif; ?>
                    <?php echo ($vo["MeasurethicknessrecordOrigin"]["verifier"]); ?></td>
                <td><?php if(empty($vo["MeasurethicknessrecordOrigin"]["verifyStage"])): ?>-<?php endif; ?>
                    <?php echo ($vo["MeasurethicknessrecordOrigin"]["verifyStage"]); ?></td>
                <td>
                    <?php switch($vo["MeasurethicknessrecordOrigin"]["verifyResult"]): case "0": ?>未审核<?php break;?>
                        <?php case "1": ?>审核通过<?php break;?>
                        <?php case "2": ?>审核未通过<?php break; endswitch;?>
                    </td>
                <td><a class="edit Access" data-access="<?php echo ($Access['EDIT']['id']); ?>" href="thicknessOriginDataEdit.html?id=<?php echo ($vo["id"]); ?>">编辑<span></span></a>
                    <a class="read Access" data-access="<?php echo ($Access['READ']['id']); ?>" href="thicknessOriginData.html?id=<?php echo ($vo["id"]); ?>"><span>查看</span></a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
</body>
<script src="/www/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/www/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
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

        //关键字检索
        $("#filterName").keyup(function(){
            $(".bordered tbody tr")
                    .hide()
                    .filter(":contains('"+( $(this).val() )+"')")
                    .show();
        })
        //双击跳转
        $("tbody tr").dblclick(function(){
            $(this).find("tr td a span").click();
        })
    })
</script>
</html>