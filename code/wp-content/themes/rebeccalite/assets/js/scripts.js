(function($){
	"use strict";
    $(document).ready(function() {
        $('.mobile-toggle .open-menu').on( 'click', function() {
            $(this).toggleClass('active');
            $('.nav-menu').toggleClass('active');
        });
        
        $('.primary-menu li .toggle').on( 'click', function() {
            $(this).parent().toggleClass('active');
            var $parent_id = $(this).parent().attr('id');
            $(this).parent().find( 'li' ).removeClass( 'active' );
            $(this).parent().parent().find( '>li' ).not( $ ('#' + $parent_id ) ).removeClass( 'active' );
        });
        
        $('.primary-menu').children().last().focusout( function() {
            $('.nav-menu').removeClass('active').removeAttr('style');
            $('.mobile-toggle .open-menu').removeClass('active');
        } );
        
        function rebeccalite_hide_nav_menu() {
            $(document).mouseup( function(e) {
                var $nav_menu = $('.nav-wrap');
                if ( ! $nav_menu.is( e.target ) && $nav_menu.has( e.target ).length === 0 ) {
                    $nav_menu.find('.primary-menu li').removeClass('active');
                    if ( $(window).width() < 992 && $('.nav-menu').length ) {
                        $('.nav-menu').removeClass('active').removeAttr('style');
                        $('.mobile-toggle .open-menu').removeClass('active');
                    }
                }
            });
        }
        
        rebeccalite_hide_nav_menu();
        $(window).resize( function() {
            rebeccalite_hide_nav_menu();
        } );
    });
})(jQuery);
