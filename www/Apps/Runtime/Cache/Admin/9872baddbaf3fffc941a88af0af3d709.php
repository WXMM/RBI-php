<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="/www/Public/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/www/Public/Admin/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="/www/Public/Admin/css/font-awesome.css"/>
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
        #infoAdd{
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
        #infoAdd input,#infoAdd select,#infoAdd textarea{
            width: 95%;
        }
        #infoAdd .glyphicon{
            color: #cd332d;
            margin-top: 8px;
        }
        a:hover{
            cursor: pointer;
        }
        .breadcrumb > li + li:before {
            color: #CCCCCC;
            content: " > ";
            padding: 0px 5px;
        }
    </style>
</head>
<body>
<ol class="breadcrumb" style="background-color: transparent;float: left; height: 30px;width: 100%">
    <li><a href="">数据库管理</a></li>
    <li>
        <a href="<?php echo U('Dictionary/dicList',array('pid' => $data['pid']));?>" target="center">
            <?php switch($data['pid']): case "1": ?>设备信息<?php break;?>
            <?php case "2": ?>储罐信息<?php break;?>
            <?php case "3": ?>检验维修<?php break;?>
            <?php case "4": ?>附件相关<?php break; endswitch;?>
        </a>
    </li>
    <li class="active">
        <?php switch($data['pid']): case "1": ?>设备信息字典<?php break;?>
            <?php case "2": ?>储罐信息字典<?php break;?>
            <?php case "3": ?>检验维修字典<?php break;?>
            <?php case "4": ?>附件相关字典<?php break; endswitch;?>
    </li>
</ol>
<div class="filterName" style="line-height: normal">
    <button type="button" class="btn" data-toggle="modal"
            data-target="#myModal" style="padding-left:20px;margin: 0;background-color: transparent">
        <span class="glyphicon glyphicon-plus"></span>&nbsp新增设备字典
    </button>
    <div style="float: right;margin-right: 20px">
        筛选：
        <input id="filterName">
    </div>
</div>
<div class="List">
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>字典类型</th>
            <th>字典内容</th>
            <th>ID值</th>
            <th>备注</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($content)): $k = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$wo): $mod = ($k % 2 );++$k; if($wo["pid"] == $data['id']): ?><tr data-row-id="<?php echo ($wo["id"]); ?>">
                <td style="display: none" class="id"><?php echo ($wo["id"]); ?></td>
                <td title="<?php echo ($wo["type"]); ?>" class="type"><?php echo ($wo["type"]); ?></td>
                <td title="<?php echo ($wo["key"]); ?>" class="key"><?php echo ($wo["key"]); ?></td>
                <td title="<?php echo ($wo["value"]); ?>" class="value"><?php echo ($wo["value"]); ?></td>
                <td title="<?php echo ($wo["remark"]); ?>" class="remark"><?php echo ($wo["remark"]); ?></td>
                <td><a data-toggle="modal" data-target="#myModal"><span class="edit">编辑</span></a>　<a><span class="delete">删除</span></a></td>
            </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4></h4>
            </div>
            <div class="modal-body">
                <form method="post" id="infoAdd" action="<?php echo U('Dictionary/addDicDetail');?>">
                    <input  name="id" type="hidden"/>
                    <input  name="index" type="hidden"/>
                    <input  name="pid" style="display: none" value="<?php echo ($data['id']); ?>"/>
                    <div class="input-group">
                        <span class="input-group-addon">字典内容</span>
                        <input  name="key" type="text" class="form-control" placeholder="请输入设备字典信息">
                        <span class="glyphicon glyphicon-asterisk" style="float: right"></span>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">ID　　值</span>
                        <input  name="value" type="text" class="form-control" placeholder="请输入对应的ID值">
                        <span class="glyphicon glyphicon-asterisk" style="float: right"></span>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">备　　注</span>
                        <textarea  name="remark" type="text" class="form-control" placeholder="请输入备注信息"></textarea>
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
<script src="/www/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/www/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/www/Public/Admin/js/libs/modernizr.min.js"></script>
<script type="text/javascript" src="/www/Public/Home/js/jquery.form.js"></script>
<script>
    $(function(){
        //关键字搜索
        $("#filterName").keyup(function(){
            $(".table tbody tr")
                    .hide()
                    .filter(":contains('"+( $(this).val() )+"')")
                    .show();
        })
        //点击编辑
        $(".List tbody tr .edit").click(function(){
            var type=$(this).parents("tr").find(".type").text();
            $("#myModal").find("h4").html('').html("编辑"+type+"字典");
            var id    = $(this).parents("tr").find(".id").text();
            var key   = $(this).parents("tr").find(".key").text();
            var value = $(this).parents("tr").find(".value").text();
            var remark= $(this).parents("tr").find(".remark").text();
            $("#myModal input[name='index']").val(1);
            $("#myModal input[name='id']").val(id);
            $("#myModal input[name='key']").val(key);
            $("#myModal input[name='value']").val(value);
            $("#myModal textarea[name='remark']").val(remark);
        })
        //点击新增
        $(".filterName .btn").click(function(){
            var type=$('.List').find('.type').eq(1).text();
            $("#myModal").find("h4").html('').html("新增"+type+"字典");
            $("#myModal input[name='index']").val(2);
            $("#myModal input[name='id']").val('');
            $("#myModal input[name='key']").val('');
        })
        //点击删除
        $(".List tbody tr .delete").click(function(){
            var id=$(this).parents("tr").find(".id").text();
            var key=$(this).parents("tr").find(".key").text();
            if(confirm("确定删除　"+key+"　字典类型吗?")){
                $.post("<?php echo U('Dictionary/deleteDicDetail');?>",{index:"id",indexValue:id},function(data){
                    if(data!==0){
                        alert("删除成功！！");
                        location.reload();
                    }
                },"JSON")
            }else{
                return false;
            }

        })
//表单提交
        $('#infoAdd').ajaxForm({
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