<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>运行记录编辑</title>
    <link rel="stylesheet" href="/model/Public/Home/css/tabs.css" type="text/css">
    <link rel="stylesheet" href="/model/Public/Home/css/tableList.css" type="text/css">
    <link rel="stylesheet" href="/model/Public/Home/css/tableDetail.css" type="text/css">
    <link rel="stylesheet" href="/model/Public/Home/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/model/Public/Home/css/jquery-ui.theme.min.css" type="text/css">
    <link rel="stylesheet" href="/model/Public/Home/css/box.css" type="text/css">
    <link rel="stylesheet" href="/model/Public/bootstrap-3.0.3/css/bootstrap.min.css" type="text/css">
    <style>
        a{
            cursor: pointer;
            /*background-color: rgb(244, 244, 244);*/
        }
        .breadcrumb > li + li:before {
            color: #CCCCCC;
            content: " > ";
            padding: 0px 5px;
        }
        table input,table select,table option{
            width: 100%;
            text-align: center;
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
    <li class="active">运行管理</li>
    <li class="active">运行记录管理</li>
    <li><a href="<?php echo U('RunRecord/plantList');?>">储罐设备列表</a></li>
    <li><a href="RunRecordList.html?id=<?php echo ($plant['id']); ?>">运行记录列表</a></li>
    <li class="active">运行记录编辑</li>
</ol>
<div>
    <form method="post" id="editRunRecord" action="<?php echo U('RunRecord/editRunRecord');?>">
        <input type="hidden"  name="verifyResult" value="<?php echo ($RunRecordList["verifyResult"]); ?>"/>
        <div style="width: 98%;margin-right: auto;margin-left: auto">
            <button type="submit" class="btn btn-primary Access" data-access="<?php echo ($Access['SAVE']['id']); ?>" style=" background-color: #0b80c9;height:30px;float: right;padding: 5px;border: 0px;margin-bottom: 10px;margin-left: 10px">
                <span class="glyphicon glyphicon-ok" style="margin-right:5px "></span>保存
            </button>
            <input name="id" value="<?php echo ($RunRecordList["id"]); ?>" style="display: none">
            <table class="borderedDetail" style="padding: 0px">
                <tbody>
                <tr>
                    <td>设备位号：</td><td><?php echo ($plant['plantNO']); ?></td>
                    <td>油罐类型：</td><td class="OilTankType"><?php echo ($plant['OilTankType']); ?></td>
                    <td>检查人员：</td><td>
                    <select  name="checker" data-option="<?php echo ($RunRecordList["checker"]); ?>">
                        <?php if(is_array($User)): $i = 0; $__LIST__ = $User;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value=<?php echo ($vo["realname"]); ?>><?php echo ($vo["realname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </td></tr>
                <tr><td>记录人员：</td><td>
                    <input name="recorder" type="hidden" value="<?php echo ($_SESSION['realname']); ?>" />
                    <select  name="recorder" data-option="<?php echo ($RunRecordList["recorder"]); ?>" disabled="disabled">
                        <?php if(is_array($User)): $i = 0; $__LIST__ = $User;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value=<?php echo ($vo["realname"]); ?>><?php echo ($vo["realname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </td>

                    <td>检查日期：</td><td><input type="datePicker" name="check_dt" value="<?php echo ($RunRecordList["check_dt"]); ?>"/></td>
                    <td>记录日期：</td><td><input type="datePicker" name="record_dt" value="<?php echo ($RunRecordList["record_dt"]); ?>"/></td>
                </tr>
                <tr><td>备&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp注：</td><td colspan="6"><textarea name="Remark" style="width: 100%"><?php echo ($RunRecordList["remark"]); ?></textarea></td>
                </tr>
                </tbody>
            </table>
        </div>
    </form>
    <div class="tabbable" style="width: 98%;margin-right: auto;margin-left: auto">
        <ul id="tabs">
            <li>
                <a href="" title="tab1">检查内容</a>
            </li>
            <li>
                <a href="" title="tab2">相关文件</a>
            </li>
        </ul>
        <div id="content">
            <div id="tab1" class="tab">
                <table class="bordered">
                    <thead><th>位置</th><th>明细</th><th>检查情况</th><th>备注</th><th>操作</th></thead>
                    <tbody>
                    <?php if(is_array($RunRecordDetail)): $i = 0; $__LIST__ = $RunRecordDetail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$RRI): $mod = ($i % 2 );++$i;?><tr data-alarm="<?php echo ($RRI["checkResult"]); ?>">
                            <td class="part"><?php echo ($RRI["part"]); ?></td>
                            <td class="partDetail"><?php echo ($RRI["partDetail"]); ?></td>
                            <td class="checkResult" data-data="<?php echo ($RRI["checkResult"]); ?>">
                                <?php switch($RRI["checkResult"]): case "1": ?>√<?php break;?>
                                    <?php case "0": ?>×<?php break;?>
                                    <?php case "2": ?>/<?php break; endswitch;?></td>
                            <td class="remark"><?php echo ($RRI["remark"]); ?></td>
                            <td><a class="edit Access" data-row-id="<?php echo ($RRI["id"]); ?>" data-access="<?php echo ($Access['EDIT']['id']); ?>">编辑</a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
            <div id="tab2" class="tab">
                <form action="<?php echo U('Public/upload');?>" enctype="multipart/form-data" method="post" id="upload">
                    <input type="hidden" name="id" value="<?php echo ($RunRecordList['id']); ?>" id="id">
                    <input type="hidden" name="tableId" value="tb_runrecord">
                    <!--<input type="text" name="name" />-->
                    <div class="input-group" style="width: 50%">
                        <input type="file" name="photo"  style="display: none" />
                        <input type="text" class="form-control filePath"  disabled="disabled">
					<span class="input-group-btn">
						<button class="btn btn-default chooseFile" type="button">
                            浏览
                        </button>
                        <button class="btn btn-default" type="submit">
                            上传
                        </button>
					</span>
                    </div>
                </form>
                <table class="bordered">
                    <thead>
                    <tr><th>文件名称</th><th>添加时间</th><th>操作</th></tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($attachment)): $i = 0; $__LIST__ = $attachment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($vo["filename"]); ?></td><td class="type"><?php echo ($vo["addTime"]); ?></td>
                            <td data-row-id="<?php echo ($vo["id"]); ?>">
                                <a class="download Access"  data-access="<?php echo ($Access['DOWNLOAD']['id']); ?>" href="downloadUpload.html?id=<?php echo ($vo["id"]); ?>">下载</a>
                                <a class="delete Access" data-access="<?php echo ($Access['DETAIL']['id']); ?>">删除</a>
                            </td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editRunRecordDetail" method="post" action="<?php echo U('RunRecord/editRunRecordDetail');?>">
            <input name="id" class="id" type="hidden"/>
            <input name="pid" class="pid" type="hidden" value="<?php echo ($RunRecordList["id"]); ?>"/>
            <input name="gpid" class="pid" type="hidden" value="<?php echo ($plant['id']); ?>"/>
            <input type="hidden"  name="verifyResult" value="<?php echo ($RunRecordList["verifyResult"]); ?>"/>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">编辑检验记录</h4>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <span class="input-group-addon">位置</span>
                        <input type="text" name="part" class="form-control part" disabled="disabled" >
                    </div></br>
                    <div class="input-group">
                        <span class="input-group-addon">明细</span>
                        <input type="text" name="partDetail" class="form-control partDetail" disabled="disabled">
                    </div></br>
                    <div class="input-group">
                        <span class="input-group-addon">检查情况</span>
                        <select name="checkResult" class="form-control checkResult">
                            <option value="1">√</option>
                            <option value="0">×</option>
                            <option value="2">/</option>
                        </select>
                    </div></br>
                    <div class="input-group">
                        <span class="input-group-addon">备注</span>
                        <textarea  class="form-control remark" name="remark"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary">提交</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div>
</body>
<script src="/model/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/model/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/model/Public/Home/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/model/Public/Home/js/jquery.form.js"></script>
<script type="text/javascript" src="/model/Public/Home/js/jquery.cookie.js"></script>
<script>
    //根据返回权限值显示权限
    $(".Access").each(function(){
        if($(this).attr("data-access")){
            $(this).show();
        }else{
            $(this).hide();
        };
    })
    //根据是否报警显示背景色
    $("#tab1 tbody tr").each(function(){
        if($(this).attr("data-alarm")==0){
            $(this).css('color','red');
//                alert($(this).attr("data-alarm"));
        }
    })

    //tabs菜单的切换
    var tabs_index=$.cookie('tabs_index');
    if(tabs_index==undefined){
        var index=0;
    }else{
        var index=$.cookie('tabs_index');
    }
    $("#content .tab").hide(); // Initially hide all content
    $("#tabs li").eq(index).attr("id","current"); // Activate first tab
    $("#content .tab").eq(index).fadeIn(); // Show first tab content
    $('#tabs a').click(function(e) {
        e.preventDefault();
        $("#content .tab").hide(); //Hide all content
        $("#tabs li").attr("id",""); //Reset id's
        $(this).parent().attr("id","current"); // Activate this
        $.cookie('tabs_index', $(this).parent().index());
        $('#' + $(this).attr('title')).fadeIn();
    });
//    动态选择select
    $("#editRunRecord select").each(function(){
        var optionValue=$(this).attr("data-option");
        $(this).find("option[value="+optionValue+"]").attr("selected",true);
    })
    // 激活spin插件
    $(".spinner").css('width','100%');
    var spinner = $( ".spinner" ).spinner();
    //激活日历控件
    $.datepicker.regional["zh-CN"] = { closeText: "关闭", prevText: "&#x3c;上月", nextText: "下月&#x3e;", currentText: "今天", monthNames: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"], monthNamesShort: ["一", "二", "三", "四", "五", "六", "七", "八", "九", "十", "十一", "十二"], dayNames: ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"], dayNamesShort: ["周日", "周一", "周二", "周三", "周四", "周五", "周六"], dayNamesMin: ["日", "一", "二", "三", "四", "五", "六"], weekHeader: "周", dateFormat: "yy-mm-dd", firstDay: 1, isRTL: !1, showMonthAfterYear: !0, yearSuffix: "年" }
    $.datepicker.setDefaults($.datepicker.regional["zh-CN"]);
    function initDatePicker(ele){
        ele.datepicker(
                {
                    showOtherMonths: true,
                    selectOtherMonths: true,
                    showButtonPanel: true,
                    dateFormat : "yy-mm-dd"
                }
        );
    }
    initDatePicker($( "input[type='datePicker']" ));
    $("#ui-datepicker-div").css('font-size','18px');

    $("#editRunRecord").ajaxForm({
        beforeSubmit:  function showRequest(){
            if(confirm("是否进行修改？")){

            }else{
                return false;
            }
        },  // 提交前
        success: function showResponse(data){
            alert(data.msg);
            location.reload();
        }
    })

//    修改记录结果
    $("#tab1 table tbody tr .edit").click(function(){
        var id=$(this).attr("data-row-id");
        var part=$(this).parents("tr").find(".part").text();
        var partDetail=$(this).parents("tr").find(".partDetail").text();
        var checkResult=$(this).parents("tr").find(".checkResult").attr("data-data");
        var remark=$(this).parents("tr").find(".remark").text();
        $("#editRunRecordDetail .id").val(id);
        $("#editRunRecordDetail .part").val(part);
        $("#editRunRecordDetail .partDetail").val(partDetail);
        $("#editRunRecordDetail .checkResult option[value="+checkResult+"]").attr("selected",true);
        $("#editRunRecordDetail .remark").val(remark);
        $("#myModal").modal("show");
    })

    $("#editRunRecordDetail").ajaxForm({
        beforeSubmit:  function showRequest(){
            if(confirm("是否进行修改？")){}else{return false;}
        },
        // 提交前
        success: function showResponse(data){
            alert(data.msg);
            location.reload();
        }
    })

    $("#upload .chooseFile").click(function(){
        $("#upload input[type='file']").click();
    })
    $("#upload input[type='file']").change(function(){
        $("#upload .filePath").val($(this).val());
    })

    $("#upload").ajaxForm({
        beforeSubmit:  function showRequest(){
            if(confirm("是否进行上传？")){}else{return false;}
        },
        // 提交前
        success: function showResponse(data){
            alert(data.msg);
            location.reload();
        }
    })
    $("#tab2 table tbody tr .delete").click(function(){
        var id=$(this).parent().attr("data-row-id");
        if(confirm("确定要删除文件吗?")) {
            $.post("<?php echo U('Public/deleteUpload');?>",{id:id},function(data){
                alert(data.msg);
                location.reload();
            },"JSON")
            return false; //阻止表单默认提交
        }else{
            return false;
        }
    })


</script>
</html>