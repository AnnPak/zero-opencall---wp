(function ($) {
	"use strict";

    jQuery(document).ready(function($){

        var myModalEl = document.getElementById('menuModal')
        myModalEl.addEventListener('hidden.bs.modal', function (event) {
            $('.site-header__mobile-menu img').css('animation', 'animback 0.5s')
            setTimeout(function(){ $('.site-header__mobile-menu img').css('animation', '') },500)
        })

        
    


    }); // end 


    jQuery(window).load(function(){

       

    }); // end


}(jQuery));	