var time = setTimeout(forward, 5000);

function forward(){
	clearTimeout(time);
	$active = $(".carrusel-img .active");
    if($active.next().length){
    	$active.fadeOut(1000);
    	$active.next().fadeIn(2000);
    	$active.removeClass("active");
        $active.next().addClass("active");
        time = setTimeout(forward, 5000);
    }else {
    	$active.fadeOut(1000);
        $(".carrusel-img img").first().fadeIn(2000);
        $active.removeClass("active");
        $(".carrusel-img img").first().addClass("active");
        time = setTimeout(forward, 5000);
    }
}

function backward(){
	clearTimeout(time);
	$active = $(".carrusel-img .active");
    if($active.prev().length){
    	$active.fadeOut(1000);
    	$active.prev().fadeIn(2000);
    	$active.removeClass("active");
        $active.prev().addClass("active");
        time = setTimeout(forward, 5000);
    }else {
    	$active.fadeOut(1000);
        $(".carrusel-img img").last().fadeIn(2000);
        $active.removeClass("active");
        $(".carrusel-img img").last().addClass("active");
        time = setTimeout(forward, 5000);
    }
}


$(document).ready(function(){
	$(".active").show();
	$('.seccion').click(function(){
		$(this).siblings().removeClass("mostrar");
		$(this).toggleClass("mostrar");
	});
});

function show(){
	$('#menu').toggleClass("active");
}