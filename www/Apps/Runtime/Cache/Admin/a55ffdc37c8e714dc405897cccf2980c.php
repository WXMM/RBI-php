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
        #userInfoAdd{
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
        #userInfoAdd input,#userInfoAdd select{
            width: 95%;
        }
        #userInfoAdd .glyphicon{
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
    <li><a href="">权限管理</a></li>
    <li class="active">用户管理</li>
</ol>


<div class="userList" style="width: 95%;margin: 0 auto 0 auto">
    <div class="filterName" style="line-height: normal">
        <button type="button" class="btn" data-toggle="modal" id="addBtn"
                data-target="#myModal" style="padding-left:20px;margin: 0;background-color: transparent">
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
            <th>用户名称</th>
            <th>真实姓名</th>
            <th>电　　话</th>
            <th>用户类型</th>
            <th>所属厂区</th>
            <th>注册时间</th>
            <th>上次登录时间</th>
            <th>上次登录ip</th>
            <th>禁用状态</th>
            <th>登陆状态</th>
            <th>备注</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($userList)): $i = 0; $__LIST__ = $userList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i;?><tr data-row-id="<?php echo ($u["id"]); ?>">
                <td style="display: none" class="id"><?php echo ($u["id"]); ?></td>
                <td style="display: none" class="password"><?php echo ($u["password"]); ?></td>
                <td title="<?php echo ($u["username"]); ?>" class="username"><?php echo ($u["username"]); ?></td>
                <td title="<?php echo ($u["realname"]); ?>" class="realname"><?php echo ($u["realname"]); ?></td>
                <td title="<?php echo ($u["phone"]); ?>" class="phone"><?php echo ($u["phone"]); ?></td>
                <td title="<?php echo ($u["Role"]["id"]); ?>" class="type">
                    <?php echo ($u["Role"]["name"]); ?>
                </td>
                <td title="<?php echo ($u["factoryId"]); ?>" class="workshopId"><?php echo ($u["workshopId"]); ?></td>
                <td title="<?php echo ($u["create_time"]); ?>" class="create_time"><?php echo ($u["create_time"]); ?></td>
                <td title="<?php echo ($u["login_time"]); ?>" class="login_time"><?php echo ($u["login_time"]); ?></td>
                <td title="<?php echo ($u["login_ip"]); ?>" class="login_ip"><?php echo ($u["login_ip"]); ?></td>
                <td title="<?php echo ($u["status"]); ?>" class="status" data-data="<?php echo ($u["status"]); ?>">
                    <?php switch($u["status"]): case "1": ?>正常<?php break;?>
                        <?php case "0": ?>禁用<?php break; endswitch;?>
                </td>
                <td title="<?php echo ($u["is_login"]); ?>" class="is_login">
                    <?php switch($u["is_login"]): case "1": ?>登陆<?php break;?>
                        <?php case "0": ?>下线<?php break;?>
                        <?php default: ?>-<?php endswitch;?>
                </td>
                <td title="<?php echo ($u["remark"]); ?>" class="remark"><?php echo ($u["remark"]); ?></td>
                <td><a data-toggle="modal" data-target="#myModal"><span class="edit">编辑</span></a> <a><span class="delete">删除</span></a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
    <!--<button type="button" class="btn" data-toggle="modal"-->
            <!--data-target="#myModal" style="padding-left:20px;margin: 0;background-color: transparent">-->
        <!--<span class="glyphicon glyphicon-plus"></span>&nbsp新增-->
    <!--</button>-->
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
                    <form method="post" id="userInfoAdd" action="<?php echo U('Rbac/addUser');?>">
                        <input id="id" name="id" type="hidden"/>
                        <input id="index" name="index" type="hidden"/>
                        <div class="input-group">
                            <span class="input-group-addon">用户名称</span>
                            <input id="username" name="username" type="text" class="form-control text-muted" placeholder="请输入用户名称">
                            <span class="glyphicon glyphicon-asterisk" style="float: right"></span>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">真实姓名</span>
                            <input id="realname" name="realname" type="text" class="form-control" placeholder="请输入真实姓名">
                            <span class="glyphicon glyphicon-asterisk" style="float: right"></span>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">密　　码</span>
                            <input id="password" name="password" type="password" class="form-control" placeholder="请输入用户密码">
                            <span class="glyphicon glyphicon-asterisk" style="float: right"></span>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">电话号码</span>
                            <input id="phone" name="phone" type="text" class="form-control" placeholder="请输入电话号码">
                            <span class="glyphicon glyphicon-asterisk" style="float: right"></span>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">用户类型</span>
                            <select class="form-control" id="type" name="type">
                                <?php if(is_array($roleList)): $i = 0; $__LIST__ = $roleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ro): $mod = ($i % 2 );++$i;?><option value="<?php echo ($ro["id"]); ?>"><?php echo ($ro["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                            <span class="glyphicon glyphicon-asterisk" style="float: right"></span>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">所属公司</span>
                            <select id="workshopId" name="workshopId"  class="form-control">
                                <option value="总公司">总公司</option>
                                <?php if(is_array($Workshop)): $i = 0; $__LIST__ = $Workshop;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Wo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($Wo["workshopId"]); ?>"><?php echo ($Wo["workshopId"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                            <span class="glyphicon glyphicon-asterisk" style="float: right"></span>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">禁用状态</span>
                            <select class="form-control" id="status" name="status">
                                <option value=1>开启</option>
                                <option value=0>关闭</option>
                            </select>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">备　　注</span>
                            <textarea id="remark" name="remark" type="text" class="form-control" placeholder="备注"></textarea>
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
        //点击编辑
        $(".userList tbody tr .edit").click(function(){
            $("#myModal").find("h4").html('').html("编辑用户信息");
            var id=$(this).parents("tr").find(".id").text();
            var username=$(this).parents("tr").find(".username").text();
            var realname=$(this).parents("tr").find(".realname").text();
            var password=$(this).parents("tr").find(".password").text();
            var phone=$(this).parents("tr").find(".phone").text();
            var type=$(this).parents("tr").find(".type").attr("title");
            var workshopId=$(this).parents("tr").find(".workshopId").text();
            var status=$(this).parents("tr").find(".status").attr("data-data");
            var remark=$(this).parents("tr").find(".remark").text();
            $("#index").val(1);
            $("#id").val(id);
            $("#username").val(username);
            $("#realname").val(realname);
            $("#password").val(password);
            $("#phone").val(phone);
            $("#type").val(type);
            $("#workshopId").val(workshopId);
            $("#status").val(status);
            $("#remark").val(remark);
        })
        //点击新增
        $("#addBtn").click(function(){
            $("#myModal").find("h4").html('').html("新增用户信息");
            $("#index").val(2);
            $("#id").val('');
            $("#username").val('');
            $("#realname").val('');
            $("#password").val('');
            $("#phone").val('');
            $("#type option:nth-child(1)").attr("selected",true);
            $("#workshopId option:nth-child(1)").attr("selected",true);
            $("#status option:nth-child(1)").attr("selected",true);
            $("#remark").val('');
        })
        //点击删除
        $(".userList tbody tr .delete").click(function(){
            var id=$(this).parents("tr").find(".id").text();
            var username=$(this).parents("tr").find(".username").text();
            if(confirm("确定删除用户"+username+"吗?")){
                $.post("<?php echo U('Rbac/deleteUser');?>",{id:id},function(data){
                        alert(data.msg);
                        location.reload();
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
        $('#userInfoAdd').ajaxForm(options);
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