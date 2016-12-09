             $(function(){

$(".subNav").click(function(){

            $(this).toggleClass("currentDd").siblings(".subNav").removeClass("currentDd")

            // $(this).toggleClass("currentDt").siblings(".subNav").removeClass("currentDt")

            $(this).next(".navContent").slideToggle(300).siblings(".navContent").slideUp(500)

    })  

})
$(function(){
$(".subNav1").click(function(){

            // $(this).toggleClass("currentDd1").siblings(".subNav1").removeClass("currentDd1")

            // // $(this).toggleClass("currentDt1").siblings(".subNav1").removeClass("currentDt1")

            // $(this).next(".navContent1").slideToggle(300).siblings(".navContent1").slideUp(500)

    })  

})