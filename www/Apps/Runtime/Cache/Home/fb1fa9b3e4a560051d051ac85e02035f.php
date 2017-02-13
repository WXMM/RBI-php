<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>表格内容</title>
    <link href="/www/Public/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="/www/Public/Home/css/tableList.css" rel="stylesheet">
    <link href="/www/Public/Home/css/tableDetail.css" rel="stylesheet">
    <style>
        .borderedDetail tr td:nth-child(2), .borderedDetail tr td:nth-child(4){
            padding: 0px;
        }
        .borderedDetail tr td:nth-child(2):hover,.borderedDetail tr td:nth-child(4):hover{
            background-color: transparent;
        }
        .borderedDetail td:nth-child(2) input,td:nth-child(4) input{
            width: 100%;
            height: 100%;
            padding-left: 5px;
            border: none;
        }
        .borderedDetail td:nth-child(2) input[type="datePicker"],td:nth-child(4) input[type="datePicker"]{
            width: 90%;
            height: inherit;
            float: left;
        }
        .borderedDetail td:nth-child(2) select,td:nth-child(4) select,textarea{
            width: 100%;
            height: 100%;
            padding-left: 5px;
            border: none;
        }
        /*.borderedDetail td:nth-child(2) input:focus,td:nth-child(4) input:focus{*/
        /*border: none;*/
        /*}*/
        .borderedDetail tr td span{
            width: 100%;
            height: 100%;
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
<ol class="breadcrumb" style="background-color: transparent;float: left; height: 30px;width: 100%">
    <li class="active">档案管理</li>
    <li class="active">常压储罐基本信息</li>
    <li class="active">储罐设备列表</li>
</ol>
<div style="width: 98%;margin-left: auto;margin-right: auto">
<div class="filterName" style="line-height: normal">
    <button type="button"  class="btn btn-primary Access" data-access="<?php echo ($Access['ADD']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: left;padding: 5px;border: 0px;margin-bottom: 10px;margin-right: 10px" data-toggle="modal"
            data-target="#myModal">
        <span class="glyphicon glyphicon-plus" style="margin-right:5px "></span><?php echo ($Access['ADD']['name']); ?>
    </button>
    <div style="float: right;margin-bottom: 5px">
        查询：
        <input id="filterName">
    </div>
</div>
    <table class="bordered research">
    <thead>
    <tr><th class="workshop">公司</th><th class="area">罐区/车间</th><th class="plantNO">位号</th>
        <th class="">储罐名称</th><th>罐型</th><th>介质</th><th>审核人员</th><th>审核阶段</th><th>审核结果</th><th>操作</th></tr>
    </thead>
    <tbody>
    <?php if(is_array($plant)): $i = 0; $__LIST__ = $plant;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fou): $mod = ($i % 2 );++$i;?><tr  class="brief" data-row-id="<?php echo ($fou["id"]); ?>"><td style="display: none" class="id"><?php echo ($fou["id"]); ?></td>
            <!--<td><input type="checkbox"/></td>-->
            <td class="workshop" title=<?php echo ($fou["workshopId"]); ?>><?php echo ($fou["workshopId"]); ?></td>
            <td class="area" title=<?php echo ($fou["areaId"]); ?>><?php echo ($fou["areaId"]); ?></td><td class="area" title=<?php echo ($fou["areaId"]); ?> style="display: none"><?php echo ($fou["areaId"]); ?></td>
            <td class="plantNO" title=<?php echo ($fou["plantNO"]); ?>><?php echo ($fou["plantNO"]); ?></td>
            <td class="plantName" title=<?php echo ($fou["plantName"]); ?>>
                <?php if(empty($fou["plantName"])): ?>-<?php endif; ?>
                <?php echo ($fou["plantName"]); ?></td>
            <td title=<?php echo ($fou["OilTankType"]); ?>>
                <?php if(empty($fou["OilTankType"])): ?>-<?php endif; ?>
                <?php echo ($fou["OilTankType"]); ?></td>
            <td title=<?php echo ($fou["storeMedium"]); ?>>
                <?php if(empty($fou["storeMedium"])): ?>-<?php endif; ?>
                <?php echo ($fou["storeMedium"]); ?></td>
            <td class="verifier"><?php echo ($fou["verifier"]); ?></td>
            <td class="verifyStage">
                <?php echo ($fou["verifyStage"]); ?></td>
            <td class="verifyResult">
                <?php switch($fou["verifyResult"]): case "0": ?>未审核<?php break;?>
                    <?php case "1": ?>审核通过<?php break;?>
                    <?php case "2": ?>审核不通过<?php break;?>
                    <?php default: ?>-<?php endswitch;?>
                </td>
            <td class="manage">
                <a class="detail Access" data-access="<?php echo ($Access['DETAIL']['id']); ?>" href="tankInfoDetail.html?id=<?php echo ($fou["id"]); ?>"><?php echo ($Access['DETAIL']['name']); ?></a>
                <a class="edit Access"   data-access="<?php echo ($Access['EDIT']['id']); ?>" href="tankInfoEdit.html?id=<?php echo ($fou["id"]); ?>"><?php echo ($Access['EDIT']['name']); ?></a>
                <a class="delete Access" data-access="<?php echo ($Access['DELETE']['id']); ?>" ><?php echo ($Access['DELETE']['name']); ?></a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>
</div>
<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                新增储罐设备
            </div>
            <div class="modal-body">
                <form method="post" id="tankInfoAdd" action="<?php echo U('Manage/add');?>"/>
                <table class="borderedDetail">
                    <tbody>
                    <tr><td>请选择总公司：</td><td> <select name="factory" class="form-control">
                        <option disabled="disabled" selected="selected">--请选择总公司--</option>
                        <?php if(is_array($factorySelect)): $i = 0; $__LIST__ = $factorySelect;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fs): $mod = ($i % 2 );++$i;?><option value="<?php echo ($fs["factoryId"]); ?>"><?php echo ($fs["factoryId"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select></td></tr>
                    <tr><td>请选择分公司：</td><td>
                        <select name="workshop" class="form-control">
                            <option disabled="disabled" selected="selected">--请选择分公司--</option>
                            <?php if(is_array($workshopSelect)): $i = 0; $__LIST__ = $workshopSelect;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fs): $mod = ($i % 2 );++$i;?><option value="<?php echo ($fs["workshopId"]); ?>"><?php echo ($fs["workshopId"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td></tr>
                    <tr><td>请选择罐区/车间：</td><td>
                        <select name="area" class="form-control">
                            <option disabled="disabled" selected="selected">--请选择罐区/车间--</option>
                        </select>
                    </td></tr>
                    <tr><td>请选择设备：</td><td>
                        <input name="plant" value="" class="form-control"  placeholder="请填写新增设备尾号"/>
                    </td></tr>
                    </tbody>
                </table>
                <input name="index" value=1 style="display: none">
                <button id="fat-btn" class="btn btn-primary" style="width: 100%" data-loading-text="Loading..."
                        type="submit"> 提交
                </button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
</body>
<script src="/www/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/www/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<!--<script src="/www/Public/Home/js/bootstrapMenu.min.js"></script>-->
<script src="/www/Public/Home/js/jquery.form.js" type="text/javascript"></script>
<script src="/www/Public/Home/js/linkageMenu.js" type="text/javascript"></script>
<script type="text/javascript" src="/www/Public/Home/js/jquery.cookie.js"></script>
<script type="text/javascript">
//    收缩隐藏按钮
    $(function(){
        $(".Access").each(function(){
            if($(this).attr("data-access")){
                $(this).show();
            }else{
                $(this).hide();
            };
        })



        $("#filterName").keyup(function(){
            $(".research tbody tr")
                    .hide().find("td .plantName")
                    .filter(":contains('"+( $(this).val() )+"')")
                    .show();
        })

//        新增form表单ajax提交
       var options = {
           beforeSubmit:  showRequest,  // 提交前
           success:       showResponse // 提交后
       }
        $('#tankInfoAdd').ajaxForm(options);
        //提交前进行表单验证
        function showRequest(formData){
            if(formData[0].value=='--请选择厂区--'){
                alert("必须选定一个厂区！！");
            }
            if(formData[1].value=='--请选择车间--'){
                alert("必须选定一个车间！！");
            }
            if(formData[2].value=='--请选择装置--'){
                alert("必须选定一个装置！！");
            }
            if (!formData[3].value) {
                alert('必须填写储罐位号！！')
                return false;
            }
        }
        //提交后进进行相关的操作
        function showResponse(data){
            alert("继续完善设备其他信息！！！");
            $.cookie('tabs_index', 0);
            location.href="tankInfoEdit.html?id="+data.id;

        }
//        列表信息删除
        $("table tr:gt(0) .delete").css("cursor","pointer");
        $("table tr:gt(0) .delete").click(function() {
            //tr:gt(0)表示不选第一行，因为第一行往往是标题
            var index = $(this).parents('tr').find('.id').text();
            var plant = $(this).parents('tr').find('.plant').text();

            if(confirm("确定要删除储罐"+plant+"吗")){
                $.post("delete",{value:index},function(data){
                    if(data==1){
                        alert("成功删除！");
                        window.location.reload();
                    }
                },"json")
            }else{
                return false;
            }
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
                    $("tr[data-row-id="+row+"]").find('.detail').click();
                }
            },{
                name:  '编辑',
                onClick: function(row) {
                   $("tr[data-row-id="+row+"]").find('.edit').click();
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
            $(this).find('.detail').click();
        })
    })
</script>
</html>