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
        .List{
            margin-bottom: 40px;
        }
        #infoAdd{
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
        #infoAdd input,#infoAdd select{
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
    <li class="active">罐区/车间管理</li>
</ol>
<div class="filterName" style="line-height: normal">
    <button type="button" class="btn" data-toggle="modal"
            data-target="#myModal" style="padding-left:20px;margin: 0;background-color: transparent">
        <span class="glyphicon glyphicon-plus"></span>&nbsp新增罐区/车间
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
            <th>总公司名称</th>
            <th>分公司名称</th>
            <th>罐区/车间名称</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($area)): $i = 0; $__LIST__ = $area;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ar): $mod = ($i % 2 );++$i;?><tr data-row-id="<?php echo ($ar["id"]); ?>">
                <td style="display: none" class="id"><?php echo ($ar["id"]); ?></td>
                <td title="<?php echo ($ar["factoryId"]); ?>" class="factoryId"><?php echo ($ar["factoryId"]); ?></td>
                <td title="<?php echo ($ar["workshopId"]); ?>" class="workshopId"><?php echo ($ar["workshopId"]); ?></td>
                <td title="<?php echo ($ar["areaId"]); ?>" class="areaId"><?php echo ($ar["areaId"]); ?></td>
                <td><a data-toggle="modal" data-target="#myModal"><span class="edit">编辑</span></a> <a><span class="delete">删除</span></a></td>
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
                <h4>修改罐区/车间信息</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="infoAdd" action="<?php echo U('Dictionary/addArea');?>">
                    <input  name="id" type="hidden"/>
                    <input  name="index" type="hidden"/>
                    <div class="input-group">
                        <span class="input-group-addon">总公司名称</span>
                        <select class="form-control" name="factoryId">
                            <?php if(is_array($factory)): $i = 0; $__LIST__ = $factory;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fa): $mod = ($i % 2 );++$i;?><option value="<?php echo ($fa["factoryId"]); ?>"><?php echo ($fa["factoryId"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        <span class="glyphicon glyphicon-asterisk" style="float: right"></span>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">分公司名称</span>
                        <select class="form-control" name="workshopId">
                            <option>--请选择车间--</option>
                            <?php if(is_array($workshop)): $i = 0; $__LIST__ = $workshop;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fa): $mod = ($i % 2 );++$i;?><option value="<?php echo ($fa["workshopId"]); ?>"><?php echo ($fa["workshopId"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        <span class="glyphicon glyphicon-asterisk" style="float: right"></span>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">罐区/车间名称</span>
                        <input  name="areaId" type="text" class="form-control" placeholder="请输入区域名称">
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
        //点击编辑
        $(".List tbody tr .edit").click(function(){
            $("#myModal").find("h4").html('').html("编辑车间信息");
            var id=$(this).parents("tr").find(".id").text();
            var factoryId=$(this).parents("tr").find(".factoryId").text();
            var workshopId=$(this).parents("tr").find(".workshopId").text();
            var areaId=$(this).parents("tr").find(".areaId").text();
            $("#myModal input[name='index']").val(1);
            $("#myModal input[name='id']").val(id);
            $("#myModal select[name='factoryId']").attr('disabled','disabled');
            $("#myModal select[name='factoryId'] option[value='"+factoryId+"']").attr('selected','selected');
            $("#myModal select[name='workshopId']").html('').append("<option>"+workshopId+"</option>").attr('disabled','disabled');
//            $("#myModal select[name='workshopId'] option[value='"+workshopId+"']").attr('selected','selected');
            $("#myModal input[name='areaId']").val(areaId);
        })
        //点击新增
        $(".filterName .btn").click(function(){
            $("#myModal").find("h4").html('').html("新增车间信息");
            $("#myModal select[name='factoryId']").removeAttr("disabled");
            $("#myModal select[name='workshopId']").removeAttr("disabled");
            $("#myModal input[name='index']").val(2);
            $("#myModal input[name='id']").val('');
            $("#myModal input[name='workshopId']").val('');
        })
        //点击删除
        $(".List tbody tr .delete").click(function(){
            var id=$(this).parents("tr").find(".id").text();
            var factoryId=$(this).parents("tr").find(".areaId").text();
            if(confirm("确定删除　"+factoryId+"　吗?")){
                $.post("<?php echo U('Dictionary/deleteArea');?>",{id:id},function(data){
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
        //级联菜单
//         var factorySelect=$("select[name='factoryId']");
//         var workshopSelect=$("select[name='workshopId']");
//         factorySelect.click(function(){
//             var factoryValue=$(this).val();
//             alert("factoryValue")
//             workshopSelect.html('');
// //            workshopSelect.append("<option disabled='disabled' selected='selected'>--请选择车间--</option>");
//             $.post("<?php echo U('Home/Public/getLinkageMenu');?>",{tableName:"dic_workshop",value:factoryValue,valueId:"factoryId"},function(data){
//                         for(var i=0;i<data.length;i++){
//                             workshopSelect.append("<option value='"+data[i].workshopId+"'>"+data[i].workshopId+"</option>");
//                         }
//                     },
//                     "JSON"
//             )
//         });
    })
</script>
</html>