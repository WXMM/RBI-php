<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>main</title>
    <link href="/www/Public/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="/www/Public/Home/css/manage_index.css" rel="stylesheet">
    <link href="/www/Public/Font-Awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet">
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
    <div class="tree" >
        <ul id="treeDemo" class="ztree" >
        </ul>
    </div>
</section>
<section class="content">
    <div class="fold"><span class="glyphicon glyphicon-chevron-left"></span></div>
    <a style="display: none" href="RunRecordList.html?id=<?php echo ($srcId); ?>" target="content"><span id="targetSpan" data-data="<?php echo ($srcId); ?>"></span></a>
    <div class="content_text">
        <iframe name="content" src="plantList.html" frameborder="0"  scrolling="yes" width="100%" height="100%"></iframe>
    </div>
</section>
</body>
<script src="/www/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/www/Public/zTree/js/jquery.ztree.core.min.js"></script>
<script>
    $(function(){
        $('title', window.parent.document).html("运行记录管理");
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
        var url="PlantList.html?";
        $(function(){
            $.post("<?php echo U('Public/getTree');?>",{tableName:tablename,URL:url},function(data){
                var  zNodes = data;
                zTreeObj = $.fn.zTree.init($("#treeDemo"), setting, zNodes);
            },"json")
        })

        var targetId=$("#targetSpan").attr("data-data");
        if(targetId!==""){
            $("#targetSpan").click();
        }

    })
</script>
</html>