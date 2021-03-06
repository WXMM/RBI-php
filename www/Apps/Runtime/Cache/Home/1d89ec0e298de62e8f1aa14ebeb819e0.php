<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>main</title>
    <meta charset="UTF-8">
    <link href="/model/Public/bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="/model/Public/Font-Awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <!--<link href="/model/Public/zTree/css/zTreeStyle/zTreeStyle.css" rel="stylesheet">-->
    <style>
        body{  padding: 0;  margin: 0;  width: 100%; height: 100% }
        section.aside{  width: 18%;  float: left;overflow: auto;border-right:1px solid #c5c3cc;background-color: #f1eff8;
        }
        .tree ul{
            padding: 12px 20px 12px 20px;
        ;
            border-bottom:1px solid #c5c3cc;
        }
        section.content{  width: 82%;  float: right;  }
        div.fold{  width: 14px;  float: left;  cursor: pointer;border-right:1px solid #c5c3cc;background-color: #f8f7ef;  }
        div.content_text{  width: 98%;  float: right;  }
    </style>
</head>
<body>
<section class="aside" >
    <div class="tree" style="background-color: #f1eff8">
        <ul class="ztree" ><a href="<?php echo U('Visualization/oneLevelMap');?>" target="content"><span class="glyphicon glyphicon-eye-open"></span>
            可视化管理
            <span class="badge pull-right" style="text-align: center"></span>
        </a></ul>
        <ul class="ztree" ><a href="<?php echo u('Schedule/index');?>" target="content"><span class="glyphicon glyphicon-leaf"></span>
            待办事项
            <span class="badge pull-right" style="text-align: center"><?php echo ($ScheduleCount); ?></span></a></ul>
        <!--<ul class="ztree" ><a href="<?php echo u('Schedule/index');?>" target="content"><span class="glyphicon glyphicon-bell"></span>-->
            <!--消息中心-->
            <!--<span class="badge pull-right" style="text-align: center">3</span>-->
        <!--</a></ul>-->
    </div>
</section>
<section class="content">
    <div class="fold"><span class="glyphicon glyphicon-chevron-left"></span></div>
    <a style="display: none" href="" target="content"><span id="targetSpan"></span></a>
    <div class="content_text">
        <iframe name="content" src="oneLevelMap.html" frameborder="0"  scrolling="yes" width="100%" height="100%"></iframe>
    </div>
</section>
</body>
<script src="/model/Public/Jquery/jquery-2.0.3.min.js"></script>
<script src="/model/Public/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<!--<script src="/model/Public/zTree/js/jquery.ztree.core.min.js"></script>-->
<script>
    $(function(){
//        初始化高度
        var height=$(window).height();
        $(".aside").css("height",height);
        $(".content").css("height",height);
        $(".content_text").css("height",height);
        $(".fold").css("height",height);
        $(".fold span").css("margin-top",height/2);
//        $("#targetSpan").click();

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
//        var zTreeObj;
//        // zTree 的参数配置
//        var setting = {};
//        // zTree 的数据属性
//        var tablename='Plantinfo';
//        var url="tankInfoList.html?";
//        $(function(){
//            $.post("<?php echo U('Public/getTree');?>",{tableName:tablename,URL:url},function(data){
//                var  zNodes = data;
//                zTreeObj = $.fn.zTree.init($("#treeDemo"), setting, zNodes);
//            },"json")
//        })


    })
</script>
</html>