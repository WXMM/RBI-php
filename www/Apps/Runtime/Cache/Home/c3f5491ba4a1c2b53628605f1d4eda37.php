<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>main</title>
    <meta charset="UTF-8">
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <!--<link href="/model/Public/Home/css/main.css" rel="stylesheet">-->
    <link href="/model/Public/zTree/css/zTreeStyle/zTreeStyle.css" rel="stylesheet">
    <style>
        body{  padding: 0;  margin: 0;  width: 100%;  }
        section.aside{  width: 18%;  height: 720px;  float: left;  }.tree{  margin-top: 20px;  margin-left: 10px;  }
        section.content{  width: 82%;  height: 720px;  float: right;  }
        div.fold{  width: 2%;  margin-top: 300px;  float: left;  cursor: pointer;  }
        div.content_text{  width: 98%;  height: 720px;  float: right;  }
    </style>
</head>
<body>
<section class="aside" style="overflow: scroll">
    <div class="tree">
        <ul id="treeDemo" class="ztree" >
        </ul>
    </div>
</section>
<section class="content">
    <div class="fold"><span class="glyphicon glyphicon-chevron-left"></span></div>
    <div class="content_text">
        <iframe name="content" src="AttachEvaList.html" frameborder="0"  scrolling="yes" width="100%" height="100%"></iframe>
    </div>
</section>
</body>
<script src="http://libs.baidu.com/jquery/2.0.3/jquery.min.js"></script>
<!--<script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>-->
<script src="/model/Public/zTree/js/jquery.ztree.core.min.js"></script>
<script>
    $(function(){
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
        var url="AttachEvaList.html?";
        $(function(){
            $.post("<?php echo U('Public/getTree');?>",{tableName:tablename,URL:url},function(data){
                var  zNodes = data;
                zTreeObj = $.fn.zTree.init($("#treeDemo"), setting, zNodes);
            },"json")
        })
    })
</script>
</html>