///**
// * Created by Administrator on 2016/3/24.
// */
$(function(){
    //定义常量
    var factorySelect = $("#factorySelect");
    var workshopSelect= $("#workshopSelect");
    var areaSelect    = $("#areaSelect");
    var plantSelect   = $("#plantSelect");
    //动态增添级联菜单中的一级菜单内容
    $.post("get_cascading_first_menu",{table_name:"dic_factory"},function(data){
        for(var i=0;i<data.length;i++){
            $("<option value='" +data[i].factoryId +"'>" + data[i].factoryId +"</option>").appendTo("#factorySelect");
        }
    },"json")
    //点击某行设备跳转至该设备的详细信息
    //$("tr:gt(0).brief").dblclick(function() {
    ////tr:gt(0)表示不选第一行，因为第一行往往是标题
    //    var factory = $(this).find(".factory").text();
    //    var workshop= $(this).find(".workshop").text();
    //    var area    = $(this).find(".area").text();
    //    var plant   = $(this).find(".plant").text();
    //    $("#basic_info_list").hide();
    //    factorySelect.val(factory).attr("selected", true);
    //    $("<option value='" +workshop +"' selected>" + workshop +"</option>").appendTo(workshopSelect);
    //    $("<option value='" +area     +"' selected>" + area +"</option>").appendTo(areaSelect);
    //    $("<option value='" +plant    +"' selected>" + plant +"</option>").appendTo(plantSelect);
    //    //get_detail_data根据选定值从数据库调用该设备的详细信息
    //    var var1=factorySelect.val();
    //    var var2=workshopSelect.val();
    //    var var3=areaSelect.val();
    //    var var4=plantSelect.val();
    //    get_detail_data(var1,var2,var3,var4);
    //    $("div.detail").show();
    //})
    //点击详细链接获取详细信息
    $("table tr:gt(0)").css("cursor","pointer");
    $("table tr:gt(0)").dblclick(function() {
        //tr:gt(0)表示不选第一行，因为第一行往往是标题
        var factory = $(this).find(".factory").text();
        var workshop= $(this).find(".workshop").text();
        var area    = $(this).find(".area").text();
        var plant   = $(this).find(".plant").text();
        location.href = "riskBasedInfo.html?factory="+factory+"&workshop="+workshop+"&area="+area+"&plant="+plant;
    })
    //执行删除操作
    $("table tr:gt(0) .delete a").css("cursor","pointer");
    $("table tr:gt(0) .delete a").click(function() {
        //tr:gt(0)表示不选第一行，因为第一行往往是标题
        var index = $(this).parents('tr').find('.id').text();
        if(confirm("确定要删除数据吗")){
            $.post("delete",{value:index},function(data){
                if(data==1){
                    alert("成功删除！");
                    window.location.reload();
                }
            },"json")
        }else{
            return false;
        }
    })

  //级联菜单变化时，子集菜单的变化
    factorySelect.change(function(){
        var factoryValue = $(this).val();
        if(factoryValue !=''){
            workshopSelect.html("");
            $("<option value=''>--请选择车间--</option>").appendTo(workshopSelect);
            areaSelect.html("");
            $("<option value=''>--请选择区域--</option>").appendTo(areaSelect);
            plantSelect.html("");
            $("<option value=''>--请选择设备位号--</option>").appendTo(plantSelect);
            $.post("get_cascading_menu",{key:"factoryId",value:factoryValue,table:"dic_workshop"},function(data){
                for(var i=0;i<data.length;i++) {
                    $("<option value='" + data[i].workshopId + "'>" + data[i].workshopId + "</option>").appendTo(workshopSelect);
                }
                },"json")
        }
    })
    workshopSelect.change(function(){
        var workshopValue = $(this).val();
        if(workshopValue !=''){
            areaSelect.html("");
            $("<option value=''>--请选择区域--</option>").appendTo(areaSelect);
            plantSelect.html("");
            $("<option value=''>--请选择设备位号--</option>").appendTo(plantSelect);
            $.post("get_cascading_menu",{key:"workshopId",value:workshopValue,table:"dic_area"},function(data){
                for(var i=0;i<data.length;i++) {
                    $("<option value='" + data[i].areaId + "'>" + data[i].areaId + "</option>").appendTo(areaSelect);
                }
            },"json")
        }
    })
    areaSelect.change(function(){
        var areaValue = $(this).val();
        if(areaValue !=''){
            plantSelect.html("");
            $("<option value=''>--请选择设备位号--</option>").appendTo(plantSelect);
            $.post("get_cascading_menu",{key:"areaId",value:areaValue,table:"tb_plantinfo"},function(data){
                for(var i=0;i<data.length;i++) {
                    $("<option value='" + data[i].plantNO + "'>" + data[i].plantNO + "</option>").appendTo(plantSelect);
                }
            },"json")
        }
    })
    //最后一个级联菜单的值确定时，给出全部的对应表的详细信息
    plantSelect.change(function(){
        var var1=factorySelect.val();
        var var2=workshopSelect.val();
        var var3=areaSelect.val();
        var var4=plantSelect.val();
        get_detail_data(var1,var2,var3,var4);
        //get_detail_data(var1,var2,var3,var4);
    })
    function linkage() {
        var factorySelect = $("#factorySelect");
        var workshopSelect= $("#workshopSelect");
        var areaSelect    = $("#areaSelect");
        var plantSelect   = $("#plantSelect");
        //动态添加一级菜单内容
        $.post("get_cascading_first_menu",{table_name:"dic_factory"},function(data){
            for(var i=0;i<data.length;i++){
                $("<option value='" +data[i].factoryId +"'>" + data[i].factoryId +"</option>").appendTo("#factorySelect");
            }
        },"json")
        //级联菜单变化时，子集菜单的变化
        factorySelect.change(function(){
            var factoryValue = $(this).val();
            if(factoryValue !=''){
                workshopSelect.html("");
                $("<option value=''>--请选择车间--</option>").appendTo(workshopSelect);
                areaSelect.html("");
                $("<option value=''>--请选择区域--</option>").appendTo(areaSelect);
                plantSelect.html("");
                $("<option value=''>--请选择设备位号--</option>").appendTo(plantSelect);
                $.post("get_cascading_menu",{key:"factoryId",value:factoryValue,table:"dic_workshop"},function(data){
                    for(var i=0;i<data.length;i++) {
                        $("<option value='" + data[i].workshopId + "'>" + data[i].workshopId + "</option>").appendTo(workshopSelect);
                    }
                },"json")
            }
        })
        workshopSelect.change(function(){
            var workshopValue = $(this).val();
            if(workshopValue !=''){
                areaSelect.html("");
                $("<option value=''>--请选择区域--</option>").appendTo(areaSelect);
                plantSelect.html("");
                $("<option value=''>--请选择设备位号--</option>").appendTo(plantSelect);
                $.post("get_cascading_menu",{key:"workshopId",value:workshopValue,table:"dic_area"},function(data){
                    for(var i=0;i<data.length;i++) {
                        $("<option value='" + data[i].areaId + "'>" + data[i].areaId + "</option>").appendTo(areaSelect);
                    }
                },"json")
            }
        })
        areaSelect.change(function(){
            var areaValue = $(this).val();
            if(areaValue !=''){
                plantSelect.html("");
                $("<option value=''>--请选择设备位号--</option>").appendTo(plantSelect);
                $.post("get_cascading_menu",{key:"areaId",value:areaValue,table:"tb_plantinfo"},function(data){
                    for(var i=0;i<data.length;i++) {
                        $("<option value='" + data[i].plantNO + "'>" + data[i].plantNO + "</option>").appendTo(plantSelect);
                    }
                },"json")
            }
        })
        //最后一个级联菜单的值确定时，给出全部的对应表的详细信息
        plantSelect.change(function(){
            var var1=factorySelect.val();
            var var2=workshopSelect.val();
            var var3=areaSelect.val();
            var var4=plantSelect.val();
            get_detail_data(var1,var2,var3,var4);
            //get_detail_data(var1,var2,var3,var4);
        })

    }
})