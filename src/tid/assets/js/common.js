$(function ($) {
    // submenu top taskbar
    $('#hasmore').toggle(
	function(){
		$('#subtop').slideDown(300);
		$(this).addClass('over');
		$(this).parent().addClass('start');
	},
	function(){
		$('#subtop').slideUp(300);
		$(this).removeClass('over');
		$(this).parent().removeClass('start');
	}
    );
    
    //default - textbox	
    $('form input.defaulttext').each(function() {
            
            if($.trim(this.value) == ''){                
                this.value = $(this).attr('title');
            }
            
            $(this).focus(function() {
                    if(this.value == $(this).attr('title'))
                            this.value = '';
            });		
            $(this).blur(function() {
                    if(this.value == '')
                            this.value = $(this).attr('title');
            });	
    });

});
