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
    <link rel="stylesheet" href="/www/Public/bootstrap-3.0.3/css/bootstrap.min.css" type="text/css">
    <link href="/www/Public/Home/css/tableList.css" rel="stylesheet">
    <link href="/www/Public/Home/css/tableDetail.css" rel="stylesheet">
</head>
<body>
<div style="overflow: auto">
        <table class="bordered">
            <thead>
            <tr><th>时间</th><th>提醒内容</th><th>备注</th></tr>
            </thead>
            <tbody>
            <?php if(is_array($notice)): $i = 0; $__LIST__ = $notice;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sc): $mod = ($i % 2 );++$i;?><tr  class="" data-row-id="<?php echo ($sc["id"]); ?>">
                    <td class="nextDate" title={sc.nextDate}><?php echo ($sc["nextDate"]); ?></td>
                    <td class="title" title=<?php echo ($sc["title"]); ?>><?php echo ($sc["title"]); ?></td>
                    <td class="remark" title=<?php echo ($sc["remark"]); ?>><?php echo ($sc["remark"]); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
</div>
</body>
<script src="/www/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/www/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<script src="/www/Public/Home/js/jquery.form.js" type="text/javascript"></script>
<script src="/www/Public/Home/js/linkageMenu.js" type="text/javascript"></script>
</html>
</body>
</html>