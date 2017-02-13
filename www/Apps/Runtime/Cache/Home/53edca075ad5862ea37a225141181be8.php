<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
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
    </style>
</head>
<body>
<ol class="breadcrumb" style="background-color: transparent;float: left; height: 30px;width: 100%">
    <li class="active">完整性评价</li>
    <li class="active">风险分析</li>
    <li class="active">储罐设备列表</li>
</ol>
<div style="width: 98%;margin-left: auto;margin-right: auto">
    <div class="filterName" style="line-height: normal">
        <button id="multiCountBtn" class="btn btn-primary Access" data-access="<?php echo ($Access['IMPORT']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: left;padding: 5px;border: 0px;margin-bottom: 10px;margin-right: 10px"><span class="glyphicon glyphicon-ok" style="margin-right:5px "></span>批量计算风险</button>

        <button id="multiExportBtn" class="btn btn-primary Access"  data-module="/www/index.php/Home" data-access="<?php echo ($Access['IMPORT']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: left;padding: 5px;border: 0px;margin-bottom: 10px;margin-right: 10px"><span class="glyphicon glyphicon-ok" style="margin-right:5px "></span>批量导出</button>
        <!-- <a href="<?php echo U('Excel/create_xlsx_full');?>" class="btn btn-primary Access" data-access="<?php echo ($Access['EXPORT']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: left;padding: 5px;border: 0px;margin-bottom: 10px;margin-right: 10px"><span class="glyphicon glyphicon-export" style="margin-right:5px "></span>批量导出</a> -->
        <div style="float: right;padding-bottom: 10px">
            查询：
            <input id="filterName">
        </div>
    </div>
    <table class="bordered">
        <thead>
        <tr><th><input type="checkbox"/></th><th>公司</th><th>罐区/车间</th><th>位号</th><th>储罐名称</th><th>最近壁板评价日期</th><th>最近底板评价日期</th><th>详细</th></tr>
        </thead>
        <tbody>
        <?php if(is_array($plant)): $i = 0; $__LIST__ = $plant;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fou): $mod = ($i % 2 );++$i;?><tr  class="brief" data-row-id="<?php echo ($fou["id"]); ?>">
                <td style="display: none" class="id"><?php echo ($fou["id"]); ?></td>
                <td ><input type="checkbox" value="<?php echo ($fou["id"]); ?>"/></td>
                <td class="workshop" title=<?php echo ($fou["workshopId"]); ?>><?php echo ($fou["workshopId"]); ?></td>
                <td class="area" title=<?php echo ($fou["areaId"]); ?>><?php echo ($fou["areaId"]); ?></td>
                <td class="plant" title=<?php echo ($fou["plantNO"]); ?>><?php echo ($fou["plantNO"]); ?></td>
                <td title=<?php echo ($fou["plantName"]); ?>>
                    <?php if(empty($fou["plantName"])): ?>-<?php endif; ?>
                    <?php echo ($fou["plantName"]); ?></td>
                <td><?php if(empty($fou["Riskrecordlist"]["wallEvaDate"])): ?>-<?php endif; ?>
                    <?php echo ($fou["Riskrecordlist"]["wallEvaDate"]); ?></td>
                <td><?php if(empty($fou["Riskrecordlist"]["floorEvaDate"])): ?>-<?php endif; ?>
                    <?php echo ($fou["Riskrecordlist"]["floorEvaDate"]); ?></td>
                <td class="detail">
                    <a style="text-decoration: none" href="riskBasedInfo.html?id=<?php echo ($fou["id"]); ?>" target="content">详细</a>
                    <span class="countRes"></span>
                </td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
</body>
<script src="/www/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/www/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<!--右键菜单的实现-->
<script src="/www/Public/Home/js/bootstrapMenu.min.js"></script>
<script src="/www/Public/Home/js/jquery.form.js" type="text/javascript"></script>
<script src="/www/Public/Home/js/linkageMenu.js" type="text/javascript"></script>
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
        function showResponse(){
            alert("继续完善设备其他信息！！！");
            var factoryH=$('select[name="factory"]').val();
            var workshopH=$('select[name="workshop"]').val();
            var areaH=$('select[name="area"]').val();
            var plantH=$('input[name="plant"]').val();
            location.href="tankInfoEdit.html?factory="+factoryH+"&workshop="+workshopH+"&area="+areaH+"&plant="+plantH;

        }
//        列表信息删除
        $("table tr:gt(0) .delete a").css("cursor","pointer");
        $("table tr:gt(0) .delete a").click(function() {
            //tr:gt(0)表示不选第一行，因为第一行往往是标题
            var index = $(this).parents('tr').find('.id').text();
            if(confirm("确定要删除数据吗")){
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

//        点击效果
        $("table tr th input[type='checkbox']").click(function(){
            var obj=$(this).parents('table');
            if($(this).is(":checked")){
                obj.each(function(){
                    $(this).find("input").prop("checked",true);
                })
            }else{
                obj.find("input").prop("checked",false);
            }
        })

         $("#multiExportBtn").click(function(){
            var checkedInput=$("table tbody tr td input[type='checkbox']:checked");
            var checkedInputArr = new Array();
            for(var i=0;i<checkedInput.length;i++){
                checkedInputArr[i]=parseInt(checkedInput.eq(i).val());
            }
            var checkedInputStr=checkedInputArr.join("-");
            // alert(checkedInputArr.join("-"));
            // location.href="<?php echo U('Excel/create_xlsx_full',array('index' => checkedInputStr));?>";
            // ?index="+checkedInputStr
            var module=$(this).attr("data-module");
                location.href=module+"/Excel/create_xlsx_full.html?index="+checkedInputStr;

            // alert(checkedInputArr[0]);

        })

        $("#multiCountBtn").click(function(){
            var checkedInput=$("table tbody tr td input[type='checkbox']:checked");
            var checkedInputArr = new Array();
            for(var i=0;i<checkedInput.length;i++){
                checkedInputArr[i]=parseInt(checkedInput.eq(i).val());
            }
//            var countRes = new Array();
            for(var i=0;i<checkedInputArr.length;i++){
                $.post("<?php echo U('Calculation/multiCount');?>",{id:checkedInputArr[i],index:i},function(data){
//
                    checkedInput.eq(data.index).parents("tr").find(".countRes").html('').html(data.msg);
                },"JSON")
            }

        })




//        var menu = new BootstrapMenu('tr', {
//            fetchElementData: function($rowElem) {
//                var rowId = $rowElem.data('rowId');
//                return rowId;
//            },
//            actions: [{
//                name:  '详细',
//                onClick: function(row) {
//                    $("tr[data-row-id="+row+"]").find('td[class="detail"] a')[0].click();
//                }
//            },{
//                name:  '编辑',
//                onClick: function(row) {
//                    $("tr[data-row-id="+row+"]").find('td[class="edit"] a')[0].click();
//                }
//            },
//                {
//                    name:  '新增',
//                    onClick: function() {
//                        $(".filterName button").click();
//                    }
//                },{
//                    name:  '删除',
//                    onClick: function(row) {
//                        $("tr[data-row-id="+row+"]").find('td[class="delete"] a')[0].click();
//                    }
//                },{
//                    name:  '刷新',
//                    onClick: function() {
//                        location.reload();
//                    }
//                }]
//        });
//        双击跳转至详细页面
        $("tbody tr").dblclick(function(){
            $(this).find('td[class="detail"] a')[0].click();
        })
    })
</script>
</html>