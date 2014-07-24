<?php
/* ----------------------------------------------------------------------
 * views/Browse/browse_results_images_html.php : 
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2014 Whirl-i-Gig
 *
 * For more information visit http://www.CollectiveAccess.org
 *
 * This program is free software; you may redistribute it and/or modify it under
 * the terms of the provided license as published by Whirl-i-Gig
 *
 * CollectiveAccess is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTIES whatsoever, including any implied warranty of 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
 *
 * This source code is free and modifiable under the terms of 
 * GNU General Public License. (http://www.gnu.org/copyleft/gpl.html). See
 * the "license.txt" file for details, or visit the CollectiveAccess web site at
 * http://www.CollectiveAccess.org
 *
 * ----------------------------------------------------------------------
 */
 	
	AssetLoadManager::register('timeline');
	$va_set_items = $this->getVar("set_items");
	$t_set = $this->getVar("set");
	
?>
	<div class="lbTimelineContainer"><div id="timeline-embed">

	</div></div>
	
	<br style="clear: both;"/>
	
    <script type="text/javascript">
    	var tl;
		$(document).ready(function() {
			tl = new VMM.Timeline("#timeline-embed");
			VMM.debug = false;
			tl.init({
				type:       'timeline',
				width:      '100%',
				height:     $('#timeline-embed').height(),
				source:     '<?php print caNavUrl($this->request, '', 'Sets', 'setDetail', array('view' => 'timelineData', 'set_id' => $t_set->get("set_id"))); ?>',
				embed_id:   'timeline-embed',
				debug: false
			});
			
			VMM.bindEvent(jQuery(".vco-slider"), loadTL, "UPDATE");
			VMM.bindEvent(jQuery(".vco-navigation"), loadTL, "UPDATE");
		});
		
		var c = 36;
		var s = c;
		function loadTL(e) {
			console.log("slide!", e, tl.getCurrentNumber());
			
			if (tl.getCurrentNumber() >= (c-2)) {
				tl.reload(url ='<?php print caNavUrl($this->request, '', 'Sets', '*setDetail', array('view' => 'timelineData', 'set_id' => $t_set->get("set_id"), 's' => '')); ?>' + s);
				console.log("reload", url);
				s+= c;
			}
		}
		
	</script>