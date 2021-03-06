<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="/model2016-11-21/model/Public/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/model2016-11-21/model/Public/Admin/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="/model2016-11-21/model/Public/Admin/css/font-awesome.css"/>
    <style>
        body{
            /*font-size: 12px;*/
            width: 100%;
            height: 100%;
        }
        table{
            /*table-layout:fixed;*/
            table-layout:fixed;/* 只有定义了表格的布局算法为fixed，下面td的定义才能起作用。 */
        }
        thead{
            background-color: #0078b3;
            color: #fffff9;
        }
        th,td{
            text-align: center;
            vertical-align:middle;
            max-width: 120px;
            word-break:keep-all;/* 不换行 */
            white-space:nowrap;/* 不换行 */
            overflow:hidden;/* 内容超出宽度时隐藏超出部分的内容 */
            text-overflow:ellipsis;/* 当对象内文本溢出时显示省略标记(...) ；需与overflow:hidden;一 起使用。*/
        }
        .factoryList{
            margin-bottom: 40px;
        }
        #factoryAdd input{
            width: 95%;
        }
        #factoryAdd .glyphicon{
            color: #cd332d;
            margin-top: 8px;
        }
        .breadcrumb > li + li:before {
            color: #CCCCCC;
            content: " > ";
            padding: 0px 5px;
        }
        a:hover{
            cursor: pointer;
        }
    </style>
</head>
<body>
<!--<div class="factory">-->
    <!--<div class="block">-->
        <!--<div class="block_icon"></div>-->
        <!--<div class="block_count"></div>-->
        <!--<div class="block_title"></div>-->
    <!--</div>-->
<!--</div>-->
<!--<div class="workshop">-->
    <!--<div class="block">-->
        <!--<div class="block_icon"></div>-->
        <!--<div class="block_count"></div>-->
        <!--<div class="block_title"></div>-->
    <!--</div>-->
<!--</div>-->
<!--<div class="area">-->
    <!--<div class="block">-->
        <!--<div class="block_icon"></div>-->
        <!--<div class="block_count"></div>-->
        <!--<div class="block_title"></div>-->
    <!--</div>-->
<!--</div>-->
<ol class="breadcrumb" style="background-color: transparent;float: left; height: 30px;width: 100%">
    <li><a href="">数据库管理</a></li>
    <li class="active">总公司管理</li>
</ol>
<div class="filterName" style="line-height: normal">
    <button type="button" class="btn" data-toggle="modal"
            data-target="#factoryModal" style="padding-left:20px;margin: 0;background-color: transparent">
        <span class="glyphicon glyphicon-plus"></span>&nbsp新增总公司
    </button>
    <div style="float: right;margin-right: 20px">
        筛选：
        <input id="filterName">
    </div>
</div>
<div class="factoryList">
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>总公司名称</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($factory)): $i = 0; $__LIST__ = $factory;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fa): $mod = ($i % 2 );++$i;?><tr data-row-id="<?php echo ($fa["id"]); ?>">
                <td style="display: none" class="id"><?php echo ($fa["id"]); ?></td>
                <td title="<?php echo ($fa["factoryId"]); ?>" class="factoryId"><?php echo ($fa["factoryId"]); ?></td>
                <td><a data-toggle="modal" data-target="#factoryModal"><span class="edit">编辑</span></a> <a><span class="delete">删除</span></a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<div class="modal fade" id="factoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4>修改总公司信息</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="factoryAdd" action="<?php echo U('Dictionary/addFactory');?>">
                    <input  name="id" type="hidden"/>
                    <input  name="index" type="hidden"/>
                    <div class="input-group">
                        <span class="input-group-addon">总公司名称</span>
                        <input  name="factoryId" type="text" class="form-control text-muted" placeholder="请输入厂区名称">
                        <span class="glyphicon glyphicon-asterisk" style="float: right"></span>
                    </div>
                    <br>
                    <button  class="btn btn-block btn-primary" data-loading-text="Loading..."
                            type="submit"> 提交
                    </button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>

</body>
<script src="/model2016-11-21/model/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/model2016-11-21/model/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/model2016-11-21/model/Public/Admin/js/libs/modernizr.min.js"></script>
<script type="text/javascript" src="/model2016-11-21/model/Public/Home/js/jquery.form.js"></script>
<script>
    $(function(){
        //关键字搜索
        $("#filterName").keyup(function(){
            $(".table tbody tr")
                    .hide()
                    .filter(":contains('"+( $(this).val() )+"')")
                    .show();
        })
        //点击收起展开
        $('.panel-heading').click(function(){
            $(this)
//                    .toggleClass("selected")   // 添加/删除高亮
                    .siblings('.panel-body').toggle();  // 隐藏/显示所谓的子行
        }).click();
        //点击编辑
        $(".factoryList tbody tr .edit").click(function(){
            $("#factoryModal").find("h4").html('').html("编辑厂区信息");
            var id=$(this).parents("tr").find(".id").text();
            var factoryId=$(this).parents("tr").find(".factoryId").text();
            $("#factoryModal input[name='index']").val(1);
            $("#factoryModal input[name='id']").val(id);
            $("#factoryModal input[name='factoryId']").val(factoryId);
        })
        //点击新增
        $(".filterName .btn").click(function(){
            $("#factoryModal").find("h4").html('').html("新增厂区信息");
            $("#factoryModal input[name='index']").val(2);
            $("#factoryModal input[name='id']").val('');
            $("#factoryModal input[name='factoryId']").val('');
        })
        //点击删除
        $(".factoryList tbody tr .delete").click(function(){
            var id=$(this).parents("tr").find(".id").text();
            var factoryId=$(this).parents("tr").find(".factoryId").text();
            if(confirm("确定删除　"+factoryId+"　吗?")){
                $.post("<?php echo U('Dictionary/deleteFactory');?>",{id:id},function(data){
                    if(data!==0){
                        alert("删除成功！！");
                        location.reload();
                    }
                },"JSON")
            }else{
                return false;
            }

        })
//        //编辑提交
//        var options = {
//            beforeSubmit:  showRequest,  // 提交前
//            success:       showResponse // 提交后
//        }
//        $('#userInfoAdd').ajaxForm(options);
//        //提交前进行表单验证
//        function showRequest(){
////            for (var i=0; i < formData.length; i++) {
////                if (!formData[i].value) {
////                    alert('用户名,密码都不能为空!');
////                    return false;
////                }
////            }
//        }
        //提交后进进行相关的操作
//        function showResponse(responseText) {
//            if(responseText==1){
//                alert("修改成功！！！");
//            }
//            if(responseText==2){
//                alert("新增成功！！！");
//            }
//            if(responseText==10){
//                alert("修改失败！！！");
//            }
//            if(responseText==20){
//                alert("新增失败！！！");
//            }
//            location.reload();
//        }
        $('#factoryAdd').ajaxForm({
            beforeSubmit:function(){

            },
            success:function(responseText){
                if(responseText==1){
                    alert("修改成功！！！");
                }
                if(responseText==2){
                    alert("新增成功！！！");
                }
                if(responseText==10){
                    alert("修改失败！！！");
                }
                if(responseText==20){
                    alert("新增失败！！！");
                }
                location.reload();
            }
        });
    })
</script>
</html>