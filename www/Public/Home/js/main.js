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
    var tablename='tb_plantinfo_new';
    var url="tankInfoList.html?";
    $(function(){
        $.post("{:U('Public/getTree')}",{tableName:tablename,URL:url},function(data){
            var  zNodes = data;
            zTreeObj = $.fn.zTree.init($("#treeDemo"), setting, zNodes);
        },"json")
    })
})
