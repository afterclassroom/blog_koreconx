/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.s
 */

//jQuery(document).ready(function(){


(function($) {
    $(document).ready(function(){

        var $window = $(window);

//        $('.fancybox').fancybox({
//            'padding': 0,
//            'margin': 0,
//            'titleShow': true,
//            'titleType'  : 'over',
//            'titlePosition'  : 'top',
//            'showNavArrows': true,
//            'easingIn': 'fade',
//            'easingOut': 'fade',
//            arrows    : true,
//            prevClick : true,
//            nextClick : true,
//            helpers:  {
//                title : {
//                        type : 'over'
//                    }
//            }
//        });

    $('.lb_trigger').fancybox();
    
    
    $( ".lb_trigger" ).click(function() {
         $( ".wpcf7-response-output" ).hide();
    });


    });
    
    

})(jQuery);

//});