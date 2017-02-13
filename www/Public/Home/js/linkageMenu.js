/**
 * Created by Administrator on 2016/4/27.
 */
$(function(){
    //var factorySelect=$("select[name='factory']");
    var workshopSelect=$("select[name='workshop']");
    var areaSelect=$("select[name='area']");
    areaSelect.html('').html("<option disabled='disabled' selected='selected'>--请选择罐区/车间--</option>");

    //factorySelect.change(function(){
    //    var factoryValue=$(this).val();
    //    workshopSelect.html('');
    //    workshopSelect.append("<option disabled='disabled' selected='selected'>--请选择车间--</option>");
    //    $.post("getLinkageMenu",{tableName:"dic_workshop",value:factoryValue,valueId:"factoryId"},function(data){
    //           for(var i=0;i<data.length;i++){
    //               workshopSelect.append("<option value='"+data[i].workshopId+"'>"+data[i].workshopId+"</option>");
    //
    //           }
    //        },
    //        "JSON"
    //    )
    //});
   workshopSelect.click(function(){
        var workshopValue=$(this).val();
        areaSelect.html('');
        areaSelect.append("<option disabled='disabled' selected='selected'>--请选择罐区/车间--</option>");
        $.post("getLinkageMenu",{tableName:"dic_area",value:workshopValue,valueId:"workshopId"},function(data){
                for(var i=0;i<data.length;i++){
                    areaSelect.append("<option value='"+data[i].areaId+"'>"+data[i].areaId+"</option>");
                }
            },
            "JSON"
        )
    });
    //areaSelect.change(function(){
    //    var areaValue=$(this).val();
    //    plantSelect.html('');
    //    plantSelect.append("<option disabled='disabled' selected='selected'>--请选择设备--</option>");
    //    $.post("getLinkageMenu",{tableName:"tb_plantinfo_new",value:areaValue,valueId:"areaId"},function(data){
    //            for(var i=0;i<data.length;i++){
    //                plantSelect.append("<option value='"+data[i].plantNO+"'>"+data[i].plantNO+"</option>");
    //            }
    //        },
    //        "JSON"
    //    )
    //});
})