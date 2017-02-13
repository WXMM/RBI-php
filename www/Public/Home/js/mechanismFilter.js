/**
 * Created by Administrator on 2016/6/30.
 */
$(function(){
    //刷新重置input信息
    //$("#reductionMechRes span").html("");
    //$("#reductionMechRes input").val("");
    //$("#SCCMechRes span").html("");
    //$("#SCCMechRes input").val("");
    //$("#outDamageMechRes span").html("");
    //$("#outDamageMechRes input").val("");
    //$("#brittleMechRes span").html('');
    //$("#brittleMechRes input").val('');
//    筛选提示信息
    $("#riskCalPara input").click(function(){

        var reductionSelect=$(this).val();
        var isWaterSpan=$("#filterMech .isWaterReduction").find("span");
        var isSourSpan=$("#filterMech .isSourReduction").find("span");
        switch (reductionSelect){
            case '1':
                isWaterSpan.removeClass().addClass("glyphicon glyphicon-asterisk").css("color","#e42000");
                isSourSpan.removeClass();
                break;
            case '2':
                isWaterSpan.removeClass();
                isSourSpan.removeClass();
                break;
            case '3':
                isWaterSpan.removeClass();
                isSourSpan.removeClass();
                break;
            case '4':
                isWaterSpan.removeClass();
                isSourSpan.removeClass();
                break;
            case '5':
                isWaterSpan.removeClass();
                isSourSpan.removeClass();
                break;
            case '6':
                isWaterSpan.removeClass();
                isSourSpan.removeClass();
                break;
            case '7':
                isWaterSpan.removeClass();
                isSourSpan.removeClass().addClass("glyphicon glyphicon-asterisk").css("color","#e42000");;
                break;
            default :
                isWaterSpan.removeClass();
                isSourSpan.removeClass();
                break;
        }
    })

    //-------------------------------------损伤机理筛选触发------------------------------------
    //$("#riskCalPara .filterInput input").click(function(){
    //    $("#triggerType").val(0);
    //    $("#reductionMechRes span").html("");
    //    $("#reductionMechRes input").val("");
    //    $("#SCCMechRes span").html("");
    //    $("#SCCMechRes input").val("");
    //    $("#outDamageMechRes span").html("");
    //    $("#outDamageMechRes input").val("");
    //    $("#brittleMechRes span").html('');
    //    $("#brittleMechRes input").val('');
    //    $("#riskCalPara .redPoint").html('');
    //    $("#riskCalPara .filterRisk").click();
    //})
    //--------------------------------壁板损伤机理结果相关参数提交触发-------------------------------
    //$("#wallFilterRiskBtn").click(function(){
    //    alert("开始损伤机理筛选")
    //    var reductionMechanism =  $("#reductionMechRes input").val();
    //    var SCCMechanism       =  $("#SCCMechRes input").val();
    //    var outDamageMechanism =  $("#outDamageMechRes input").val();
    //    var brittleMechanism   =  $("#brittleMechRes input").val();
    //    if(reductionMechanism=='' || SCCMechanism=='' || outDamageMechanism=='' ){
    //        alert("请先完成损伤机理的筛选！！");
    //    }else{
    //        $("#riskCalPara .filterRisk").click();
    //    }
    //})
    //-----------------------------------壁板损伤机理筛选 -------------------------------------
    $("#wallRiskCalPara").ajaxForm({
        beforeSubmit:function showRequest(){

        },
        success: function showResponse(responseText){
            //JSON字符串转换为JSON对象

            var Data = responseText;
                if(Data.reduction!==''){
                    $(".wallReductionMechRes").html(Data.reductionMechanism);
                    $(".wallReductionMechRes").val(Data.reductionMechanism);
                    $(".wallReductionMechIdRes").val(Data.reductionMechanismId);
                }
                if(Data.wallOutDamage!==''){
                    $(".wallOutDamageMechRes").html(Data.outDamage);
                    $(".wallOutDamageMechRes").val(Data.outDamage);
                    $(".wallOutDamageMechIdRes").val(Data.outDamageId);
                }
                if(Data.wallSCCMechanism!==''){
                    $(".wallSCCMechRes").html(Data.SCC);
                    $(".wallSCCMechRes").val(Data.SCC);
                    $(".wallSCCMechIdRes").val(Data.SCCId);
                }
            $('#myModal_wallFacFilter').modal('hide');
            $('#myModal_wallFacFilterRes').modal('show');
        }
    });
    //保存筛选以后的损伤机理结果
    $("#saveMechanism").ajaxForm({
        beforeSubmit:function showRequest(){

        },
        success: function showResponse(responseText){
            var Data=responseText;
            alert(Data.msg);
            location.reload();
        }
    })
    //如果筛选结果不满意，可以返回筛选页面进行再次筛选
    $("#myModal_wallFacFilterRes .modal-footer .last").click(function(){
        $('#myModal_wallFacFilterRes').modal('hide');
        $('#myModal_wallFacFilter').modal('show');
    });

    //--------------------------------底板损伤机理筛选-------------------------------
    $("#floorRiskCalPara").ajaxForm({
        beforeSubmit:function showRequest(){

        },
        success: function showResponse(responseText){
            var Data=responseText;
            //alert(Data.wallOutDamage);
            if(Data.floorThiningMechanism!==''){
                $(".floorReductionMechRes").html(Data.reductionMechanism);
                $(".floorReductionMechRes").val(Data.reductionMechanism);
                $(".floorReductionMechIdRes").val(Data.reductionMechanismId);
            }
            if(Data.floorOutDamageMechanism!==''){
                $(".floorOutDamageMechRes").html(Data.outDamage);
                $(".floorOutDamageMechRes").val(Data.outDamage);
                $(".floorOutDamageMechIdRes").val(Data.outDamageId);
            }

            if(Data.floorSCCMechanism!==''){
                $(".floorSCCMechRes").html(Data.SCC);
                $(".floorSCCMechRes").val(Data.SCC);
                $(".floorSCCMechIdRes").val(Data.SCCId);
            }

            $('#myModal_floorFacFilter').modal('hide');
            $('#myModal_floorFacFilterRes').modal('show');
        }
    });
    //如果筛选结果不满意，可以返回筛选页面进行再次筛选
    $("#myModal_floorFacFilterRes .modal-footer .last").click(function(){
        $('#myModal_floorFacFilterRes').modal('hide');
        $('#myModal_floorFacFilter').modal('show');
    });
    //保存筛选以后的底板损伤机理结果
    $("#saveFloorMechanism").ajaxForm({
        beforeSubmit:function showRequest(){

        },
        success: function showResponse(responseText){
            var Data=responseText;
            alert(Data.msg);
            location.reload();
        }
    })

//----------------------------------------------------风险计算提交-----------------------------------------------

    $("#calRiskBtn").click(function(){
        $("#calRisk .calRisk").click();
    })
    $("#calRisk").ajaxForm({

        beforeSubmit:function showRequest(){
            if(confirm("是否进行风险计算？")){
            }else{
                return false;
            }
        },
        success: function showResponse(responseText) {
            var Data = responseText;//JSON字符串转换为JSON对象
            alert(Data.msg);
            $.cookie('tabs_index',0);
            location.reload();
        }
    });

})