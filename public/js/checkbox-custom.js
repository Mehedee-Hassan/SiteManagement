

$( document ).ready(function() {


    $(document).bind('click', function (e) {
        var target = $(e.target);

        if(target.is('.input-check')){
            $(e.target).parent().find('.control-span').toggle('show');
            $(e.target).parent().find('.input-text').removeClass('green');
            $(e.target).parent().find('.input-text').addClass('red');

        }else

        if (target.is('.okbutton')) {
            $(e.target).parent().find('.input-text').removeClass('red');

            $(e.target).parent().find('.input-text').addClass('green');

            var val1 =  $(e.target).parent().parent().find('.input-check').val();
            var val2 = $(e.target).parent().find('.input-text').val();


            var index_of = val1.indexOf('|');

            if( index_of != -1){
                val1=val1.substr(0,index_of);
            }

            if(val2 === undefined || isNaN(val2) || val2 ==''){
                val2 = 0;
                alert('please set a number')
                $(e.target).parent().find('.input-text').val(0);
            }
            val1 = val1 +"|"+val2;
            $(e.target).parent().parent().find('.input-check').val(val1);

            console.log($(e.target).parent().find('.input-check').val());
            console.log(val1);

        }
    });
//
//        $("#okbutton").on('click',function(e){
//
//
//            console.log($(this).parent().find('input').val());
//        });


    $('form').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
});

