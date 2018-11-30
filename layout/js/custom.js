$(document).ready(function(){
    $(".widgets .cat-item i").click(function(){
        var target = $(this).attr("data-target");
        $(".brand-list").slideUp();
        $("."+target+"-list").slideToggle();
        $(".widgets .cat-item i").removeClass("active-cat-icon");
        $(this).addClass("active-cat-icon");
        $(".widgets .cat-item i").next().removeClass("active-cat-item");
        $(this).next().addClass("active-cat-item");
        $(".brand-list li").removeClass("active-cat-prands");
        $("."+target+"-list li").addClass("active-cat-prands");
    });
    
    $(".pro-control i").click(function(){
        $(this).addClass("active").siblings().removeClass("active");
    });
    
    $(".fa-align-justify").click(function(){
        $(".products > div").addClass("full-width");
    });
    
    $(".fa-th-large").click(function(){
        $(".products > div").removeClass("full-width");
    });

    $(".control").click(function (e) {
        e.preventDefault();
        if(location.href.indexOf("?") != -1){
            location.href = location.href+"&"+$(this).attr("href");
        }else{
            location.href = location.href+"?"+$(this).attr("href");
        }
    });

    $(".boughtLink.disable").click(function (e) {
        e.preventDefault();
    });

    var formElement = $(".create-account input[required] , .sign-in-form input[required] , textarea");

    function checkError(){
        if( $('.create-account .valid').length >= 3 ){
            $(".create-account input[type='submit']").removeAttr("disabled");
        }

        if( $('.sign-in-form .valid').length === 2 ){
            $(".sign-in-form  input[type='submit']").removeAttr("disabled");
        }
    }

    formElement.blur(function(){

        var inputValue    = $(this).val();
        var inputClass    = $(this).data('class');
        var alert         = $(".alert-"+inputClass);
        var requireLength = $(this).attr("requireLen");

        if(inputValue.length < requireLength){
            alert.css("display",'block');
            $(this).css('border',"1.5px solid #c82626");
            $(this).removeClass('valid');
            $(this).addClass('not-valid');
            $(this).parent().find('.asterisx').css("display",'block');
        }else{
            alert.css("display",'none');
            $(this).css('border',"1.5px solid #089718");
            $(this).removeClass('not-valid');
            $(this).addClass('valid')
            $(this).parent().find('.asterisx').css("display",'none');
        }

        checkError();

    });
    
});