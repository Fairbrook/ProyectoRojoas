var precio;
var descuentos= Array(
    {desc:10,num:5},
    {desc:20,num:10},
    {desc:30,num:15}
);
$(document).ready(function(){
    precio  = $("#precio").html();
    descuentos[0].desc=$("#desc1").html();
    descuentos[0].num=$("#num1").html();
    descuentos[1].desc=$("#desc2").html();
    descuentos[1].num=$("#num2").html();
    descuentos[2].desc=$("#desc3").html();
    descuentos[2].num=$("#num3").html();
    $(".hide").hide();
});

function calcTotal(cont){
    $(".hide").hide();
    productos = parseInt(cont.value);
    total = productos*precio;
    if(productos>=descuentos[2].num){
        total -= total*(descuentos[2].desc/100);
        $("#icon3").show();
    }else
    if(productos>=descuentos[1].num){
        total -= total*(descuentos[1].desc/100);
        $("#icon2").show();
    }else
    if(productos>=descuentos[0].num){
        total -= total*(descuentos[0].desc/100);
        $("#icon1").show();
    }
    $("#precio").html(total.toFixed(2));
    $("#subtotal").val(total.toFixed(2));
}