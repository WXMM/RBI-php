<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>表格内容</title>
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
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
    <!--<style type="text/css">-->
    <!--*{margin:0;padding:0;list-style-type:none;}-->
    <!--a,img{border:0;}-->
    <!--table{empty-cells:show;border-collapse:collapse;border-spacing:0;}-->
    <!--body{font:12px/180% Arial, Helvetica, sans-serif, "新宋体";}-->

    <!--.demo{width:98%;margin:40px auto;}-->
    <!--.demo h2{font-size:18px;height:52px;color:#3366cc;text-align:center;}-->
    <!--.listext th{background:#eee;color:#3366cc;}-->
    <!--.listext th,.listext td{border:solid 1px #ddd;text-align:left;padding:10px;font-size:14px;}-->

    <!--.rc-handle-container{position:relative;}-->
    <!--.rc-handle{position:absolute;width:7px;cursor:ew-resize;*cursor:pointer;margin-left:-3px;}-->
    <!--</style>-->
</head>
<body>
<ol class="breadcrumb" style="background-color: transparent;float: left; height: 30px;width: 100%">
    <li><a href="<?php echo U('AttachmentEvaluation/tankInfoList');?>">完整性评价</a></li>
    <li class="active">附件评价列表</li>
</ol>
<div class="filterName" style="line-height: normal">
    <div style="float: right;margin-right: 20px;margin-bottom: 10px">
        筛选：
        <input id="filterName">
    </div>
</div>
<table class="bordered">
    <thead>
    <tr><th>厂区</th><th>车间</th><th>装置</th><th>位号</th><th>储罐名称</th><th>上次附件评价时间</th><th>审核阶段</th><th>审核结果</th><th>操作</th></tr>
    </thead>
    <tbody>
    <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fou): $mod = ($i % 2 );++$i;?><tr  class="brief" data-row-id="<?php echo ($fou["id"]); ?>"><td style="display: none" class="id"><?php echo ($fou["id"]); ?></td>
            <td class="factory" title=<?php echo ($fou["factoryId"]); ?>><?php echo ($fou["factoryId"]); ?></td>
            <td class="workshop" title=<?php echo ($fou["workshopId"]); ?>><?php echo ($fou["workshopId"]); ?></td>
            <td class="area" title=<?php echo ($fou["areaId"]); ?>><?php echo ($fou["areaId"]); ?></td>
            <td class="plant" title=<?php echo ($fou["plantNO"]); ?>><?php echo ($fou["plantNO"]); ?></td>
            <td title=<?php echo ($fou["plantName"]); ?>><?php echo ($fou["plantName"]); ?></td>
            <td title=<?php echo ($fou["Attachevaluaterecord"]["evaluateDate"]); ?>><?php echo ($fou["Attachevaluaterecord"]["evaluateDate"]); ?></td>
            <td title=<?php echo ($fou["Attachevaluaterecord"]["verifyStage"]); ?>><?php echo ($fou["Attachevaluaterecord"]["verifyStage"]); ?></td>
            <td title=<?php echo ($fou["Attachevaluaterecord"]["verifyResult"]); ?>><?php echo ($fou["Attachevaluaterecord"]["verifyResult"]); ?></td>
            <td class="manage">
                <a class="detail" href="AttachEvaDetail.html?id=<?php echo ($fou["id"]); ?>"><span>详细</span></a>
            </td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>
</div>
</body>
<script src="http://libs.baidu.com/jquery/2.0.3/jquery.js"></script>
<script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
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
        $("table tr:gt(0) .delete span").css("cursor","pointer");
        $("table tr:gt(0) .delete span").click(function() {
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
        //表格插件
//        $("table").resizableColumns({});
    })
</script>
</html>