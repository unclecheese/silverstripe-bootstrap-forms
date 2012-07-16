(function($) {
$(function() {

	if($('textarea.wysiwyg').length) {		
	    $('textarea.wysiwyg').tinymce({
	      theme: "advanced",
	      theme_advanced_toolbar_location: "top",
	      theme_advanced_buttons1: $(this).attr('data-buttons'),
	      theme_advanced_buttons2: "",
	      theme_advanced_buttons3: "",
	      theme_advanced_blockformats: $(this).attr('data-blockformats'),
	      content_css: ($('base')).attr('href') + $(this).attr('data-css')
	    });
	}

	
	
	if($('select.chosen').length) {
	    $('select.chosen').chosen({
	      disable_search_threshold: $(this).attr('data-search-threshold')
	    });
    }


	if($('textarea[maxlength]').length) {		
		$('textarea[maxlength]').parent().append("<p class='notes charsRemaining'>&nbsp;</p>");
		$('textarea[maxlength]').keyup(function(){		
			var charText = $(this).attr('characters-remaining-text');
			if(!charText) charText = " characters remaining";
			var max = parseInt($(this).attr('maxlength'));
			if($(this).val().length > max){
				$(this).val($(this).val().substr(0, $(this).attr('maxlength')));
			}
			$(this).parent().find('.charsRemaining').html((max - $(this).val().length) + " " + charText);
		});
	}


  });


})(jQuery);