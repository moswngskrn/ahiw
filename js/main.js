
// $("#login-submit").on('click',function(){
//     console.log("mos")
    
// })

$(document).ready(function(e){
    $("#form-sign-up").submit(function(e){
        console.log($("#form-sign-up").serialize())
        $.ajax({
            type: "POST",
            url: 'api/login.php',
            data: new FormData(this),
            success: function(data){
                alert(data)
            },
         });
         return false;
    })    
})