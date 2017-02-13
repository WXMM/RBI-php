<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>main</title>
    <meta charset="UTF-8">
    <link href="/www/Public/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="/www/Public/zTree/css/zTreeStyle/zTreeStyle.css" rel="stylesheet">
    <style>
        body{  padding: 0;  margin: 0;  width: 100%; height: 100% }
        section.aside{  width: 18%;  float: left;overflow: auto;border-right:1px solid #c5c3cc;background-color: #f1eff8;
        }.tree{  margin-top: 20px;  margin-left: 10px;  }
        section.content{  width: 82%;  float: right;  }
        div.fold{  width: 14px;  float: left;  cursor: pointer;border-right:1px solid #c5c3cc;background-color: #f8f7ef;  }
        div.content_text{  width: 98%;  float: right;  }
    </style>
</head>
<body>
<section class="aside">
    <div class="tree">
        <ul id="treeDemo" class="ztree" >
        </ul>
    </div>
</section>
<section class="content">
    <div class="fold"><span class="glyphicon glyphicon-chevron-left"></span></div>
    <div class="content_text">
        <iframe name="content" src="RiskStatisticsFig.html" frameborder="0"  scrolling="yes" width="100%" height="100%"></iframe>
    </div>
</section>
</body>
<script src="/www/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/www/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<script src="/www/Public/zTree/js/jquery.ztree.core.min.js"></script>
<script>
    $(function(){
        $('title', window.parent.document).html("风险统计");
        //        初始化高度
        var height=$(window).height();
        $(".aside").css("height",height);
        $(".content").css("height",height);
        $(".content_text").css("height",height);
        $(".fold").css("height",height);
        $(".fold span").css("margin-top",height/2);
        $(".fold").bind("click",function () {
            if( $(".aside").is(":visible")) {
                $(".aside").hide();
                $(".content").css('width', '100%');
                $(".fold > span").removeClass().addClass("glyphicon glyphicon-chevron-right");

            }else {
                $(".aside").show();
                $(".content").css('width', '82%');
                $(".fold > span").removeClass().addClass("glyphicon glyphicon-chevron-left");
            }
        })
        var zTreeObj;
        // zTree 的参数配置
        var setting = {};
        // zTree 的数据属性
        var tablename='Plantinfo';
        var url="RiskStatisticsFig.html?";
        $(function(){
            $.post("<?php echo U('Public/getTree');?>",{tableName:tablename,URL:url},function(data){
                var  zNodes = data;
                zTreeObj = $.fn.zTree.init($("#treeDemo"), setting, zNodes);
            },"json")
        })
    })
</script>
</html>