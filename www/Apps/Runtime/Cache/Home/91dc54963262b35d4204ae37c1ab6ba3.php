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
    </style>
</head>
<body>
<ol class="breadcrumb" style="background-color: transparent;float: left; height: 30px;width: 100%">
    <li class="active">检验与维修</li>
    <li class="active">检验记录管理</li>
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
    <tr><th>公司</th><th>罐区/车间</th><th>位号</th><th>储罐名称</th><th>下次检验时间</th><th>操作</th></tr>
    </thead>
    <tbody>
    <?php if(is_array($plant)): $i = 0; $__LIST__ = $plant;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fou): $mod = ($i % 2 );++$i;?><tr  class="brief" data-row-id="<?php echo ($fou["id"]); ?>"><td style="display: none" class="id"><?php echo ($fou["id"]); ?></td>
            <!--<td class="factory" title=<?php echo ($fou["factoryId"]); ?>><?php echo ($fou["factoryId"]); ?></td>-->
            <td class="workshop" title=<?php echo ($fou["workshopId"]); ?>><?php echo ($fou["workshopId"]); ?></td>
            <td class="area" title=<?php echo ($fou["areaId"]); ?>><?php echo ($fou["areaId"]); ?></td>
            <td class="plant" title=<?php echo ($fou["plantNO"]); ?>><?php echo ($fou["plantNO"]); ?></td>
            <td title=<?php echo ($fou["plantName"]); ?>>
                <?php if(empty($fou["plantName"])): ?>-<?php endif; ?>
                <?php echo ($fou["plantName"]); ?></td>
            <td><?php if(empty($fou["Plantinspect"]["nextTestDate"])): ?>-<?php endif; ?>
                <?php echo ($fou["Plantinspect"]["nextTestDate"]); ?></td>
            <td class="manage">
                <a class="detail Access" data-access="<?php echo ($Access['DETAIL']['id']); ?>" href="InspectRecordList.html?id=<?php echo ($fou["id"]); ?>"><span>详细</span></a>
            </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>
</div>
</body>
<script src="/www/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/www/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<!--<script src="/www/Public/Home/js/bootstrapMenu.min.js"></script>-->
<script src="/www/Public/Home/js/jquery.form.js" type="text/javascript"></script>
<script src="/www/Public/Home/js/linkageMenu.js" type="text/javascript"></script>
<script type="text/javascript">
    //    收缩隐藏按钮
    $(function(){
        //根据返回权限值显示权限
        $(".Access").each(function(){
            if($(this).attr("data-access")){
                $(this).show();
            }else{
                $(this).hide();
            };
        })
        //关键字搜索
        $("#filterName").keyup(function(){
            $(".bordered tbody tr")
                    .hide()
                    .filter(":contains('"+( $(this).val() )+"')")
                    .show();
        })
//        右键菜单
        var menu = new BootstrapMenu('tr', {
            fetchElementData: function($rowElem) {
                var rowId = $rowElem.data('rowId');
                return rowId;
            },
            actions: [{
                name:  '详细',
                onClick: function(row) {
                    $("tr[data-row-id="+row+"]").find('.detail span').click();
                }
            },{
                name:  '编辑',
                onClick: function(row) {
                    $("tr[data-row-id="+row+"]").find('.edit span').click();
                }
            },
                {
                    name:  '新增',
                    onClick: function() {
                        $(".filterName button").click();
                    }
                },{
                    name:  '删除',
                    onClick: function(row) {
                        $("tr[data-row-id="+row+"]").find('.delete span').click();
                    }
                },{
                    name:  '刷新',
                    onClick: function() {
                        location.reload();
                    }
                }]
        });
//        双击跳转至详细页面
        $("tbody tr").dblclick(function(){
            $(this).find('.detail span').click();
        })
    })
</script>
</html>
</body>
</html>