<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="/model/Public/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/model/Public/Admin/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="/model/Public/Admin/css/font-awesome.css"/>
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
        #nodeInfoAdd{
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
        #nodeInfoAdd input{
            width: 95%;
        }
        #nodeInfoAdd .glyphicon{
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
        .input-group{
            width: 100%;
        }
        .input-group span{
            width: 30%;
        }
        .input-group input,.input-group select,.input-group textarea{
            width: 70%;
        }
    </style>
</head>
<body>
<ol class="breadcrumb" style="background-color: transparent;float: left; height: 30px;width: 100%">
    <li><a href="">权限管理</a></li>
    <li class="active">模块权限管理</li>
</ol>


<div class="userList" style="width: 95%;margin: 0 auto 0 auto">
    <div class="filterName" style="line-height: normal">
        <button type="button" class="btn" id="addBtn" style="padding-left:20px;margin: 0;background-color: transparent">
            <span class="glyphicon glyphicon-plus"></span>&nbsp新增
        </button>
        <div style="float: right;">
            筛选：
            <input id="filterName">
        </div>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>权限名称</th>
            <th>权限等级</th>
            <th>pid</th>
            <th>排序</th>
            <th>是否禁用</th>
            <th>备注</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($NodeList)): $i = 0; $__LIST__ = $NodeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i;?><tr data-row-id="<?php echo ($u["id"]); ?>">
                <td class="id"><?php echo ($u["id"]); ?></td>
                <td style="display: none" class="name"><?php echo ($u["name"]); ?></td>
                <td class="title"><?php echo ($u["title"]); ?></td>
                <td class="level"><?php echo ($u["level"]); ?></td>
                <td class="pid"><?php echo ($u["pid"]); ?></td>
                <td class="sort"><?php echo ($u["sort"]); ?></td>
                <td class="status"><?php echo ($u["status"]); ?></td>
                <td class="remark"><?php echo ($u["remark"]); ?></td>
                <td>
                    <a class="addAccess" href="subNodeList.html?pid=<?php echo ($u["id"]); ?>">添加子权限</a>
                    <a class="delete">删除</a>
                </td>
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
                <h4>编辑节点信息</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="nodeInfoAdd" action="<?php echo U('Rbac/addNode');?>">
                    <input id="id" name="id" type="hidden"/>
                    <div class="input-group">
                        <span class="input-group-addon">权限等级</span>
                        <select class="form-control" id="level" name="level" readonly="readonly">
                            <option value=1 selected="selected">模  块(1级)</option>
                            <option value=2>控制器(2级)</option>
                            <option value=3>方  法(3级)</option>
                        </select>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">父级名称</span>
                        <select class="form-control" id="pid" name="pid" disabled="disabled">
                            <option value=0 >一级权限没有父级</option>
                        </select>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">权限名称（英文）</span>
                        <input id="name" name="name" type="text" class="form-control" placeholder="模块英文名、控制器名称、方法名">
                        <span class="glyphicon glyphicon-asterisk" style="float: right"></span>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">权限名称</span>
                        <input id="title" name="title" type="text" class="form-control" placeholder="该权限中文解释">
                        <span class="glyphicon glyphicon-asterisk" style="float: right"></span>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">排序</span>
                        <input id="sort" name="sort" type="text" class="form-control" placeholder="排序序号">
                        <span class="glyphicon glyphicon-asterisk" style="float: right"></span>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">禁用状态</span>
                        <select class="form-control" id="status" name="status">
                            <option value=1 selected="selected">开启</option>
                            <option value=0>关闭</option>
                        </select>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">备　　注</span>
                        <textarea id="remark" name="remark" class="form-control" placeholder="备注"></textarea>
                    </div>
                    <br>
                    <button id="fat-btn" class="btn btn-block btn-primary" data-loading-text="Loading..."
                            type="submit"> 提交
                    </button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
</body>
<script src="/model/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/model/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/model/Public/Admin/js/libs/modernizr.min.js"></script>
<script type="text/javascript" src="/model/Public/Home/js/jquery.form.js"></script>
<script>
    $(function(){
        //关键字搜索
        $("#filterName").keyup(function(){
            $(".table tbody tr")
                    .hide()
                    .filter(":contains('"+( $(this).val() )+"')")
                    .show();
        })
        //点击新增
        $("#addBtn").click(function(){
            $("#id").val('');
            $("#myModal").modal("show").find("h4").html('').html("新增用户信息");
        })

        //选择节点等级
        $("#level").change(function(){
            var level=$(this).val();
            if(level==1){
                 $("#pid").attr("readonly","readonly").html("").html(
                         "<option value=0>一级权限没有父级</option>"
                 );
            }else{
                $.post("<?php echo U('Rbac/getNode');?>",{level:level},function(data){
                    var option = "";
                    for(var i=0;i<data.length;i++){
                       option += "<option value="+data[i].id+">"+data[i].title+"</option>"
                    }
                    $("#pid").removeAttr("readonly").html("").html(option);
                },"JSON")
            }

        })

        //点击删除
        $(".userList tbody tr .delete").click(function(){
            var id=$(this).parents("tr").attr("data-row-id");
            if(confirm("确定删除节点"+id+"吗?")){
                $.post("<?php echo U('Rbac/deleteNode');?>",{id:id},function(data){
                    if(data!==0){
                        alert("删除成功！！");
                        location.reload();
                    }
                },"JSON")
            }else{
                return false;
            }

        })
        //编辑提交
        var options = {
            beforeSubmit:  showRequest,  // 提交前
            success:       showResponse // 提交后
        }
        $('#nodeInfoAdd').ajaxForm(options);
        //提交前进行表单验证
        function showRequest(){
        }
        //提交后进进行相关的操作
        function showResponse(data) {
            alert(data.msg);
            location.reload();
        }
    })
</script>
</html>