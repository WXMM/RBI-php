<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="/model/Public/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/model/Public/Admin/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="/model/Public/Font-Awesome-4.4.0/css/font-awesome.min.css"/>
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
        #roleInfoAdd{
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
        #roleInfoAdd input{
            width: 95%;
        }
        #roleInfoAdd .glyphicon{
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
        #editAccess ul,#editAccess li{
            list-style-type: none;
        }
        #editAccess .Access{
            width: 25%;
            float: left;
        }
    </style>
</head>
<body>
<ol class="breadcrumb" style="background-color: transparent;float: left; height: 30px;width: 100%">
    <li><a href="">权限管理</a></li>
    <li class="active">角色管理</li>
</ol>
<div class="roleList" style="width: 95%;margin: 0 auto 0 auto">
    <div class="filterName" style="line-height: normal">
        <button type="button" class="btn" data-toggle="modal" id="addBtn"
                data-target="#myModal" style="margin: 0;background-color: transparent">
            <span class="glyphicon glyphicon-plus"></span>&nbsp新增
        </button>
        <div style="float: right">
            筛选：
            <input id="filterName">
        </div>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>角色名称</th>
            <th>注册时间</th>
            <th>更新时间</th>
            <th>禁用状态</th>
            <th>备注</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($RoleList)): $i = 0; $__LIST__ = $RoleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i;?><tr data-row-id="<?php echo ($u["id"]); ?>">
                <td style="display: none" class="id"><?php echo ($u["id"]); ?></td>
                <td style="display: none" class="level"><?php echo ($u["level"]); ?></td>
                <td title="<?php echo ($u["name"]); ?>" class="name"><?php echo ($u["name"]); ?></td>
                <td title="<?php echo ($u["create_time"]); ?>" class="create_time"><?php echo ($u["create_time"]); ?></td>
                <td title="<?php echo ($u["updata_time"]); ?>" class="login_time"><?php echo ($u["updata_time"]); ?></td>
                <td title="<?php echo ($u["status"]); ?>" class="status">
                    <?php switch($u["status"]): case "1": ?>启用<?php break;?>
                        <?php case "0": ?>禁用<?php break; endswitch;?>
                </td>
                <td title="<?php echo ($u["remark"]); ?>" class="remark"><?php echo ($u["remark"]); ?></td>
                <td><a class="editAccess">分配权限</a>　
                    <a class="edit">编辑</a>
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
                <h4>修改用户信息</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="roleInfoAdd" action="<?php echo U('Rbac/addRole');?>">
                    <input id="id" name="id" type="hidden"/>
                    <input id="index" name="index" type="hidden"/>
                    <div class="input-group">
                        <span class="input-group-addon">角色名称</span>
                        <input id="name" name="name" type="text" class="form-control text-muted" placeholder="请输入角色名称">
                        <span class="glyphicon glyphicon-asterisk" style="float: right"></span>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">角色等级</span>
                        <select id="level" name="level"  class="form-control text-muted" >
                            <option value="1">一级</option>
                            <option value="2">二级</option>
                            <option value="3">三级</option>
                            <option value="0">超级管理员</option>
                        </select>
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
<div class="modal fade" id="myModalEditAccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4>修改用户信息</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="editAccess" action="<?php echo U('Rbac/addAccess');?>">
                    <input   id="role_Id" name="role_id" type="hidden"/>
                    <input name="node_id[]" value="1" style="display: none">
                    <input name="level[]" value="1" style="display: none">
                    <input name="module[]" value="Home" style="display: none">
                        <ul>
                            <?php if(is_array($TNodeList)): foreach($TNodeList as $key=>$TN): ?><li style="width: 100%">
                                <input  class="node_<?php echo ($TN["id"]); ?>"  type="checkbox" name="node_id[]" value="<?php echo ($TN["id"]); ?>" >
                                <input  class="node_<?php echo ($TN["id"]); ?>"  type="checkbox" name="level[]" value="<?php echo ($TN["level"]); ?>" style="display: none">
                                <input  class="node_<?php echo ($TN["id"]); ?>"  type="checkbox" name="module[]" value="<?php echo ($TN["name"]); ?>" style="display: none">
                                <?php echo ($TN["title"]); ?>
                                <ul >
                                    <?php if(is_array($TN['children'])): foreach($TN['children'] as $key=>$THN): ?><li class="Access">
                                            <input class="node_<?php echo ($THN["id"]); ?>" type="checkbox" name="node_id[]" value="<?php echo ($THN["id"]); ?>" />
                                            <input class="node_<?php echo ($THN["id"]); ?>" type="checkbox" name="level[]" value="<?php echo ($THN["level"]); ?>" style="display: none">
                                            <input class="node_<?php echo ($THN["id"]); ?>" type="checkbox" name="module[]" value="<?php echo ($TN["name"]); ?>" style="display: none">
                                            <?php echo ($THN["title"]); ?>
                                        </li><?php endforeach; endif; ?>
                                    <li style="clear: both"></li>
                                </ul>
                            </li><?php endforeach; endif; ?>
                        </ul>

                    <button id="fat-" class="btn btn-block btn-primary" data-loading-text="Loading..."
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
//    function choiceCheckbox(obj){
//        if(obj.checked){
//            obj.sibling("input").attr("checked",true);
//                alert("选中了");
//            }else{
//                alert("取消选中了")
//            }
//    }

    $(function(){
        //关键字搜索
        $("#filterName").keyup(function(){
            $(".table tbody tr")
                    .hide()
                    .filter(":contains('"+( $(this).val() )+"')")
                    .show();
        })

        //点击编辑
        $(".roleList tbody tr .edit").click(function(){
            $("#myModal").find("h4").html('').html("编辑用户信息");
            var id=$(this).parents("tr").find(".id").text();
            var level=$(this).parents("tr").find(".level").text();
            var name=$(this).parents("tr").find(".name").text();
            var status=$(this).parents("tr").find(".status").attr("title");
            var remark=$(this).parents("tr").find(".remark").text();
            $("#index").val(1);
            $("#id").val(id);
            $("#name").val(name);
            $("#level option[value="+level+"]").attr("selected",true);
            $("#status option[value="+status+"]").attr("selected",true);
            $("#remark").val(remark);
            $("#myModal").modal("show");
        })
        //点击新增
        $("#addBtn").click(function(){
            $("#myModal").find("h4").html('').html("新增用户信息");
            $("#index").val(2);
            $("#id").val('');
            $("#name").val('');
            $("#level option").eq(0).attr("selected",true);
            $("#remark").val('');
            $("#myModal").modal("show");

        })
//        编辑权限
        $(".roleList tbody tr .editAccess").click(function(){
            var role_Id=$(this).parents("tr").find(".id").text();
            $("#index").val(2);
            $("#role_Id").val(role_Id);
            $("#name").val('');
            $("#remark").val('');
            $("#editAccess").find("input[type='checkbox']").prop("checked",false);
            $.post("<?php echo U('Rbac/getNodeId');?>",{id:role_Id},function(data){
                $.each(data.msg,function(n,value){
                    $("#editAccess").find("."+value).prop("checked",true);
                })
            },"JSON")
            $("#myModalEditAccess").modal("show");

        })

//        点击效果
        $("#myModalEditAccess input").click(function(){
            var obj=$(this).parent();
            if($(this).is(":checked")){
                obj.each(function(){
                    $(this).find("input").prop("checked",true);
                })
            }else{
                obj.find("input").prop("checked",false);
            }
        })
        //点击删除
        $(".roleList tbody tr .delete").click(function(){
            var id=$(this).parents("tr").find(".id").text();
            var username=$(this).parents("tr").find(".username").text();
            if(confirm("确定删除用户"+username+"吗?")){
                $.post("<?php echo U('Rbac/deleteRole');?>",{id:id},function(data){
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
        $('#roleInfoAdd').ajaxForm(options);
        //提交前进行表单验证
        function showRequest(){
        }
        //提交后进进行相关的操作
        function showResponse(data) {
            alert(data.msg);
            location.reload();
        }

        $("#editAccess").ajaxForm({
            beforeSubmit:  function showRequest(){
            },  // 提交前
            success: function showResponse(data){
                alert(data.msg);
                location.reload();
            }
        })
    })
</script>
</html>