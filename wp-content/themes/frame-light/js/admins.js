"use strict";
	jQuery(document).ready(function($) {
	   "use strict";

	//	jQuery('#accordion-section-fmr_top_header').before('<li  class="accordion-section control-section control-section-default"><h3 class="accordion-section-title" tabindex="0"><a href="http://wpmix.net/framepro"> Pro</a></h3></li>');

	   setTimeout(function () {
		   jQuery('#accordion-section-title_tagline').before('<li id="go_to_pro"  class="accordion-section control-section control-section-default"><h3 class="accordion-section-title" tabindex="0"><a href="http://wpmix.net/framepro"> Pro</a></h3></li>');
		   jQuery('#go_to_pro,#go_to_pro h3 ,#go_to_pro a ').on('click', function(e) {
			   document.location.href = 'http://wpmix.net/framepro';
		   });
	   },2000);

	      jQuery('.edited').on('click', function(e) {
			e.preventDefault();
			if($(this).html().match(/fa fa/i)) {
				if (confirm("For change Font awesome just type icon name in this area in FA editor mode. Enable editor?")) {
					var url = window.location.href;    
					if (url.indexOf('?') > -1){
					   url += '&editfa=1'
					}else{
					   url += '?editfa=1'
					}
					window.location.href = url;
				}
			}
	        jQuery(this).attr('contentEditable', true);
	    });
	    jQuery('body').on('focus', '[contenteditable]', function() {
	        var $this = jQuery(this);
	        $this.data('before', $this.html());
	        return $this;
	    }).on('blur keyup paste input', '[contenteditable]', function() {
	        var $this = jQuery(this);
	        if ($this.data('before') !== $this.html()) {
	            $this.data('before', $this.html());
	            $this.trigger('change');
	        }
	        return $this;
	    });
	    jQuery(".edited").on("change", function() {	
	        jQuery.post(pluginsUrl + "/fmrFrame/ajax.php?editmain=1", {
	            option: jQuery(this).attr("id"),
	            val: jQuery(this).html()
	        }, function(d) { 
				//alert(d);		
	        });
	    });
	});