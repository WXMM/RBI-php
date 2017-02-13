<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="/www/Public/bootstrap-3.0.3/css/bootstrap.min.css" type="text/css">
    <link href="/www/Public/Home/css/tableList.css" rel="stylesheet">
    <link href="/www/Public/Home/css/tableDetail.css" rel="stylesheet">
    <style>
        /*.bordered{*/
            /*font-size: 8px;*/
        /*}*/
        .breadcrumb > li + li:before {
            color: #CCCCCC;
            content: " > ";
            padding: 0px 5px;
        }
        #filterName{
            margin-bottom: 10px;
        }
        .modal-dialog{
            width: 90%;
            min-height: 100%;
        }
        .modal-body table input{
            width: 100%;
        }
        .modal-content{
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<ol class="breadcrumb" style="background-color: transparent;float: left; height: 30px;width: 100%">
    <li class="active">运行管理</li>
    <li class="active">定点测厚管理</li>
    <li class="active">储罐设备列表</li>
</ol>
<div style="width: 98%;margin-left: auto;margin-right: auto">
    <div class="filterName" style="line-height: normal">
        <div style="float: right;margin-bottom: 5px">
            查询：
            <input id="filterName">
        </div>
    </div>
    <table class="bordered">
        <thead>
        <tr><th>公司</th><th>罐区/车间</th><th>位号</th><th>储罐名称</th><th>最近测量日期</th><th>操作</th></tr>
        </thead>
        <tbody>
        <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fou): $mod = ($i % 2 );++$i;?><tr  class="brief" data-row-id="<?php echo ($fou["id"]); ?>"><td style="display: none" class="id"><?php echo ($fou["id"]); ?></td>
                <td class="workshop" title=<?php echo ($fou["workshopId"]); ?>><?php echo ($fou["workshopId"]); ?></td>
                <td class="area" title=<?php echo ($fou["areaId"]); ?>><?php echo ($fou["areaId"]); ?></td>
                <td class="plant" title=<?php echo ($fou["plantNO"]); ?>><?php echo ($fou["plantNO"]); ?></td>
                <td title=<?php echo ($fou["plantName"]); ?>>
                    <?php if(empty($fou["plantName"])): ?>-<?php endif; ?>
                    <?php echo ($fou["plantName"]); ?></td>
                <!--<td title=<?php echo ($fou["OilTankType"]); ?>><?php echo ($fou["layerCount"]); ?></td>-->
                <td title=<?php echo ($fou["Meathicknesslist"]["LastMeasuring_dt"]); ?>>
                    <?php if(empty($fou["Meathicknesslist"]["LastMeasuring_dt"])): ?>-<?php endif; ?>
                    <?php echo ($fou["Meathicknesslist"]["LastMeasuring_dt"]); ?></td>
                <td class="detail"><a href="thicknessData.html?Index=<?php echo ($fou["id"]); ?>" class="Access" data-access="<?php echo ($Access['READ']['id']); ?>">详细</a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
</body>
<script src="/www/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/www/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/www/Public/Home/js/jquery-ui.min.js"></script>
<script src="/www/Public/Home/js/bootstrapMenu.min.js"></script>
<script type="text/javascript" src="/www/Public/Home/js/jquery.form.js"></script>
<!--<script src="/www/Public/Home/js/main.js"></script>-->
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
        //双击跳转
        $("tbody tr").dblclick(function(){
            var index=$(this).find(".id").text();
            location.href="thicknessData.html?Index="+index;
        });
        //级联菜单的使用
        var factorySelect=$("select[name='factory']");
        var workshopSelect=$("select[name='workshop']");
        var areaSelect=$("select[name='area']");
        var plantSelect=$("select[name='plantNO']");
        factorySelect.change(function(){
            var factoryValue=$(this).val();
            workshopSelect.html('');
            workshopSelect.append("<option disabled='disabled' selected='selected'>--请选择车间--</option>");
            $.post("<?php echo U('Public/getLinkageMenu');?>",{tableName:"dic_workshop",value:factoryValue,valueId:"factoryId"},function(data){
                        for(var i=0;i<data.length;i++){
                            workshopSelect.append("<option value='"+data[i].workshopId+"'>"+data[i].workshopId+"</option>");
                        }
                    },
                    "JSON"
            )
        });
        workshopSelect.change(function(){
            var workshopValue=$(this).val();
            areaSelect.html('');
            areaSelect.append("<option disabled='disabled' selected='selected'>--请选择装置--</option>");
            $.post("<?php echo U('Public/getLinkageMenu');?>",{tableName:"dic_area",value:workshopValue,valueId:"workshopId"},function(data){
                        for(var i=0;i<data.length;i++){
                            areaSelect.append("<option value='"+data[i].areaId+"'>"+data[i].areaId+"</option>");
                        }
                    },
                    "JSON"
            )
        });
        areaSelect.change(function(){
            var areaValue=$(this).val();
            plantSelect.html('');
            plantSelect.append("<option disabled='disabled' selected='selected'>--请选择设备位号--</option>");
            $.post("<?php echo U('Public/getLinkageMenu');?>",{tableName:"tb_measurethicknessrecord_origin",value:areaValue,valueId:"areaId"},function(data){
                        for(var i=0;i<data.length;i++){
                            plantSelect.append("<option value='"+data[i].plantNO+"'>"+data[i].plantNO+"</option>");
                        }
                    },
                    "JSON"
            )
        });
        plantSelect.change(function(){
            var plantValue=$(this).val();
            $.post("<?php echo U('Public/getLinkageMenu');?>",{tableName:"tb_measurethicknessrecord_origin",value:plantValue,valueId:"plantNO"},function(data){
                        $("#thicknessListAdd input[name='plantName']").val(data[0]['plantName']);
                        $("#thicknessListAdd input[name='id']").val(data[0]['id']);
                        $("#thicknessListAdd input[name='layerCount']").val(data[0]['layerCount']);
                    },
                    "JSON"
            )
        });
        //        新增form表单ajax提交
        var options = {
            beforeSubmit:  showRequest,  // 提交前
            success:       showResponse // 提交后
        }
        $('#thicknessListAdd').ajaxForm(options);
        //提交前进行表单验证
        function showRequest(formData){
            if(formData[0].value=='--请选择厂区--'){
                alert("必须选定一个厂区！！");
                return false;
            }else{
                if(formData[1].value=='--请选择车间--'){
                    alert("必须选定一个车间！！");
                    return false;
                }else{
                    if(formData[2].value=='--请选择装置--'){
                        alert("必须选定一个装置！！");
                        return false;
                    }else{
                        if (formData[3].value=='--请选择设备位号--') {
                            alert('必须选定设备位号！！');
                            return false;
                        }else{
                            $.post("<?php echo U('Public/getLinkageMenu');?>",{tableName:"tb_meathicknesslist",value:formData[3].value,valueId:"plantNO"},function(data){
                                        if(data.length>0){
                                            alert("该设备已存在，请选择其他设备");
                                            return false;
                                        }
                                    },
                                    "JSON")
                        }
                    }
                }
            }
        }
        //提交后进进行相关的操作
        function showResponse(responseText){
           alert("添加成功！！！");
            location.href="thicknessData.html?Index="+responseText;
        }
    })
</script>
</html>