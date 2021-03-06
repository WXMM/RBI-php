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
    <li class="active">
        <?php switch($index): case "1": ?>设备信息<?php break;?>
            <?php case "2": ?>储罐信息<?php break;?>
            <?php case "3": ?>检验维修<?php break;?>
            <?php case "4": ?>附件相关<?php break; endswitch;?>
    </li>
</ol>
<div class="filterName" style="line-height: normal">
    <button type="button" class="btn" data-toggle="modal"
            data-target="#myModal" style="padding-left:20px;margin: 0;background-color: transparent">
        <span class="glyphicon glyphicon-plus"></span>&nbsp新增设备信息字典
    </button>
    <div style="float: right;margin-right: 20px">
        筛选：
        <input id="filterName">
    </div>
</div>
<div class="List">
    <!--<button type="button" class="btn" data-toggle="modal"-->
    <!--data-target="#myModal" style="padding-left:20px;margin: 0;background-color: transparent">-->
    <!--<span class="glyphicon glyphicon-plus"></span>&nbsp新增厂区-->
    <!--</button>-->
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>序号</th>
            <th>设备信息</th>
            <th>备注</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($dicType)): $i = 0; $__LIST__ = $dicType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$wo): $mod = ($i % 2 );++$i;?><tr data-row-id="<?php echo ($wo["id"]); ?>">
                <td class="id"><?php echo ($wo["id"]); ?></td>
                <td title="<?php echo ($wo["type"]); ?>" class="type"><?php echo ($wo["type"]); ?></td>
                <td title="<?php echo ($wo["remark"]); ?>" class="remark"><?php echo ($wo["remark"]); ?></td>
                <td><a href="<?php echo U('Dictionary/dicDetail',array('id' => $wo['id'],'pid'=>$wo['pid']));?>" target="center"><span class="detail">详细</span></a>　<a data-toggle="modal" data-target="#myModal"><span class="edit">编辑</span></a>　<a><span class="delete">删除</span></a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
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
                <h4>修改厂区信息</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="infoAdd" action="<?php echo U('Dictionary/addDicList');?>">
                    <input  name="id" type="hidden"/>
                    <input  name="index" type="hidden"/>
                    <input  name="pid" type="hidden" value="<?php echo ($dicType[0]['pid']); ?>"/>
                    <div class="input-group">
                        <span class="input-group-addon">设备信息</span>
                        <input  name="type" type="text" class="form-control" placeholder="请输入设备信息名称">
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
            $("#myModal").find("h4").html('').html("编辑设备信息");
            var id=$(this).parents("tr").find(".id").text();
            var type=$(this).parents("tr").find(".type").text();
            $("#myModal input[name='index']").val(1);
            $("#myModal input[name='id']").val(id);
            $("#myModal input[name='type']").val(type);
        })
        //点击新增
        $(".filterName .btn").click(function(){
            $("#myModal").find("h4").html('').html("新增设备信息");
            $("#myModal input[name='index']").val(2);
            $("#myModal input[name='id']").val('');
            $("#myModal input[name='type']").val('');
        })
        //点击删除
        $(".List tbody tr .delete").click(function(){
            var id=$(this).parents("tr").find(".id").text();
            var type=$(this).parents("tr").find(".type").text();
            if(confirm("确定删除　"+type+"　字典类型吗?")){
                $.post("<?php echo U('Dictionary/deleteDicList');?>",{id:id},function(data){
                    if(data!==0){
                        $.post("<?php echo U('Dictionary/deleteDicDetail');?>",{index:"pid",indexValue:id},function(data){
                            if(data!==0){
                                alert("删除成功！！");
                                location.reload();
                            }else{
                                alert("删除成功！！");
                                location.reload();
                            }
                        },"JSON")
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