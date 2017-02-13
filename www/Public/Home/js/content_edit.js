/**
 * Created by Administrator on 2016/4/10.
 */
$(function(){
    var factory = $(".factory").text();
    var workshop= $(".workshop").text();
    var area    = $(".area").text();
    var plant   = $(".plant").text();
    $.post("get_detail",{par1:factory,par2:workshop,par3:area,par4:plant},function(data) {
        $("#plantName input").attr("value",data[0].plantName);
        $("#IsMainPlant option[value='否']").attr("selected",true);

    },'json')
    //datepicker插件的相关
    $.datepicker.regional["zh-CN"] = { closeText: "关闭", prevText: "&#x3c;上月", nextText: "下月&#x3e;", currentText: "今天", monthNames: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"], monthNamesShort: ["一", "二", "三", "四", "五", "六", "七", "八", "九", "十", "十一", "十二"], dayNames: ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"], dayNamesShort: ["周日", "周一", "周二", "周三", "周四", "周五", "周六"], dayNamesMin: ["日", "一", "二", "三", "四", "五", "六"], weekHeader: "周", dateFormat: "yy-mm-dd", firstDay: 1, isRTL: !1, showMonthAfterYear: !0, yearSuffix: "年" }
    $.datepicker.setDefaults($.datepicker.regional["zh-CN"]);
    $( ".datepicker" ).datepicker(
        {
            showOtherMonths: true,
            selectOtherMonths: true,
            showButtonPanel: true,
            dateFormat : "yy-mm-dd"
        }
    );
    $(".ui-datepicker-div").css('font-size','0.5em');
  //spinner插件的相关
    var spinner = $( ".spinner" ).spinner();

    //$("select").load(function (){
    //    var select=$("select").attr("title").text();
    //    alert(select);
        //$(this).find("option[value=select]").attr("selected",true);
    //})
})