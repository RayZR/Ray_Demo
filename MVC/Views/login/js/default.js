/**
 * Created with JetBrains PhpStorm.
 * User: ray
 * Date: 2/06/13
 * Time: 11:18 PM
 * To change this template use File | Settings | File Templates.
 */

$(function(){


$('button#find_pass').click(function(){
    $('#login').css('transform','rotateY(180deg)').css("transition", "2s").css("transform-style"," preserve-3d");
    $('#forget_password').css('transform','rotateY(0deg)').css("transition", "2s").css("transform-style"," preserve-3d");
})


    $('button#backToLogin').click(function(){
        $('#login').css('transform','rotateY(0deg)').css("transition", "2s").css("transform-style"," preserve-3d");
        $('#forget_password').css('transform','rotateY(180deg)').css("transition", "2s").css("transform-style"," preserve-3d");
    })


})