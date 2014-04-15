<script>
    yepnope([
        {   // Google Webfonts
		    load: '//ajax.googleapis.com/ajax/libs/webfont/1/webfont.js'
	    },  {	// jQuery
            load: 'timeout=1000!//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery<?php if(Configure::read('debug') === 0) echo '.min'; ?>.js',
            callback: function (url, result, key) {
                if (!window.jQuery) yepnope('/js/jquery_1.8.3<?php if(!Configure::read('debug')) echo '.min'; ?>.js');
            },
            complete: function() {
                $ = jQuery;
                for(idx in docready) $(document).ready(docready[idx]);
            }
        },
	<?php if (!isset($this->request->params['admin']) || $this->request->params['admin'] != 1): ?>
        {	// Twitter widget
            //load: '//platform.twitter.com/widgets.js'
        }, {	// Facebook API
            //load: "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=<?php echo Configure::read('FBAppId')?>"
        }, {	// Pinterest
            //load: "//assets.pinterest.com/js/pinit.js"
        }, {	// Google Analytics
            load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
        }
	<?php endif; ?>
    ]);
</script>
