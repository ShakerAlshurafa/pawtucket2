<?php
/* ----------------------------------------------------------------------
 * themes/default/views/bundles/ca_objects_default_html.php : 
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2013-2022 Whirl-i-Gig
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
 
	$t_object = 			$this->getVar("item");
	$va_comments = 			$this->getVar("comments");
	$va_tags = 				$this->getVar("tags_array");
	$vn_comments_enabled = 	$this->getVar("commentsEnabled");
	$vn_share_enabled = 	$this->getVar("shareEnabled");
	$vn_pdf_enabled = 		$this->getVar("pdfEnabled");
	$vn_id =				$t_object->get('ca_objects.object_id');
?>
<div class="row">
	<div class='col-xs-12 navTop'><!--- only shown at small screen size -->
		{{{previousLink}}}{{{resultsLink}}}{{{nextLink}}}
	</div><!-- end detailTop -->
	<div class='navLeftRight col-xs-1 col-sm-1 col-md-1 col-lg-1'>
		<div class="detailNavBgLeft">
			{{{previousLink}}}{{{resultsLink}}}
		</div><!-- end detailNavBgLeft -->
	</div><!-- end col -->
	<div class='col-xs-12 col-sm-10 col-md-10 col-lg-10'>
		<div class="container"><div class="row">
			<div class='col-sm-6 col-md-6 col-lg-5 col-lg-offset-1'>
				{{{representationViewer}}}
				
				
				<div id="detailAnnotations"></div>
				
				<?php print caObjectRepresentationThumbnails($this->request, $this->getVar("representation_id"), $t_object, array("returnAs" => "bsCols", "linkTo" => "carousel", "bsColClasses" => "smallpadding col-sm-3 col-md-3 col-xs-4", "primaryOnly" => $this->getVar('representationViewerPrimaryOnly') ? 1 : 0)); ?>
				
<?php
				# Comment and Share Tools
				if ($vn_comments_enabled | $vn_share_enabled | $vn_pdf_enabled) {
						
					print '<div id="detailTools">';
					if ($vn_comments_enabled) {
?>				
						<div class="detailTool"><a href='#' onclick='jQuery("#detailComments").slideToggle(); return false;'><span class="glyphicon glyphicon-comment" aria-label="<?php print _t("Comments and tags"); ?>"></span>Comments and Tags (<?php print sizeof($va_comments) + sizeof($va_tags); ?>)</a></div><!-- end detailTool -->
						<div id='detailComments'><?php print $this->getVar("itemComments");?></div><!-- end itemComments -->
<?php				
					}
					if ($vn_share_enabled) {
						print '<div class="detailTool"><span class="glyphicon glyphicon-share-alt" aria-label="'._t("Share").'"></span>'.$this->getVar("shareLink").'</div><!-- end detailTool -->';
					}
					if ($vn_pdf_enabled) {
						print "<div class='detailTool'><span class='glyphicon glyphicon-file' aria-label='"._t("Download")."'></span>".caDetailLink($this->request, "Download as PDF", "faDownload", "ca_objects",  $vn_id, array('view' => 'pdf', 'export_format' => '_pdf_ca_objects_summary'))."</div>";
					}
					print '</div><!-- end detailTools -->';
				}				

?>

			</div><!-- end col -->
			
			<div class='col-sm-6 col-md-6 col-lg-5'>
				<!-- <H1>{{{<unit relativeTo="ca_collections" delimiter="<br/>"><l>^ca_collections.preferred_labels.name</l></unit><ifcount min="1" code="ca_collections"> ➔ </ifcount>}}}{{{ca_objects.preferred_labels.name}}}</H1> -->
				<H1>{{{ca_objects.preferred_labels.name}}}</H1>
				<H2>{{{<unit>^ca_objects.type_id</unit>}}}</H2>
				<HR>
				
				{{{<ifdef code="ca_objects.measurementSet.measurements"><div class="unit">^ca_objects.measurementSet.measurements (^ca_objects.measurementSet.measurementsType)</ifdef><ifdef code="ca_objects.measurementSet.measurements,ca_objects.measurementSet.measurements"> x </ifdef><ifdef code="ca_objects.measurementSet.measurements2">^ca_objects.measurementSet.measurements2 (^ca_objects.measurementSet.measurementsType2)</div></ifdef>}}}
				
				
				{{{<ifdef code="ca_objects.idno"><div class="unit"><label>Identifier:</label>^ca_objects.idno</div></ifdef>}}}
				{{{<ifdef code="ca_objects.vhh_Title.TitleText"><div class="unit"><label>Title:</label>^ca_objects.vhh_Title.TitleText</div></ifdef>}}}
								
				{{{<ifdef code="ca_objects.vhh_Identifier">
					<div class="unit"><label>External Identifier:</label>
					<unit relativeTo="ca_objects.vhh_Identifier" delimiter="<br/>">
						^IdentifierScheme <if rule='^ca_objects.vhh_Identifier.IdentifierValue !~ /\?/'>(^ca_objects.vhh_Identifier.IdentifierValue)</if>
					</unit></div>
				</ifdef>}}}	

				{{{<ifdef code="ca_objects.vhh_CountryOfReference">
					<div class="unit"><label>Country of Reference:</label>
					<unit relativeTo="ca_objects.vhh_CountryOfReference" delimiter="<br/>">
						^CountryPlace (^Reference)
					</unit></div>
				</ifdef>}}}	

				{{{<ifdef code="ca_objects.vhh_Date" >
					<div class="unit"><label>Date:</label>
					<unit relativeTo="ca_objects.vhh_Date" delimiter="<br/>">
						^date_Date <ifdef code="ca_objects.vhh_Date.date_Type">(^date_Type)</ifdef>
					</unit></div>
				</ifdef>}}}						

				{{{<ifdef code="ca_objects.vhh_Description">
					<div class="unit"><label>Description</label>
					<span class="trimText">^ca_objects.vhh_Description.DescriptionText</span>
					</div>
				</ifdef>}}}
			
				{{{<ifdef code="ca_objects.vhh_URL">
					<div class="unit"><label>URL:</label>
					<unit relativeTo="ca_objects" delimiter="<br/>">
						<a href="ca_objects.vhh_URL" target="_blank">^ca_objects.vhh_URL</a>
					</unit></div>
				</ifdef>}}}

				{{{<ifdef code="ca_objects.vhh_Note">
					<div class="unit"><label>Note:</label>
					<unit relativeTo="ca_objects" delimiter="<br/>">							
						<span class="trimText">^ca_objects.vhh_Note.vhh_NoteText</span>
					</unit></div>
				</ifdef>}}}

				{{{<ifdef code="ca_objects.vhh_MediaType">
					<div class="unit"><label>Media Type:</label>
					<unit relativeTo="ca_objects.vhh_MediaType" delimiter="<br/>">
						^MT_List
					</unit></div>
				</ifdef>}}}

				{{{<ifdef code="ca_objects.vhh_GenreAV">
					<div class="unit"><label>Genre(AV):</label>
					<unit relativeTo="ca_objects.vhh_GenreAV" delimiter="<br/>">
						^GenreAV_List
					</unit></div>
				</ifdef>}}}

				{{{<ifdef code="ca_objects.edu_FilmDevices">
					<div class="unit"><label>Devices:</label>
					<unit relativeTo="ca_objects" delimiter="<br/>">
						^ca_objects.edu_FilmDevices
					</unit></div>
				</ifdef>}}}

				{{{<ifdef code="ca_objects.edu_KnowledgeField">
					<div class="unit"><label>Field of Knowledge:</label>
					<unit relativeTo="ca_objects.edu_KnowledgeField" delimiter="<br/>">
						^edu_KnowlegdeFieldType
					</unit></div>
				</ifdef>}}}
			
				<hr></hr>

				<div class="row">
					<div class="col-sm-12">	
						
						{{{<ifcount code="ca_collections" min="1"><div class="unit"><ifcount code="ca_collections" min="1" max="1"><label><?= _t('Related Case Study'); ?></label></ifcount>
							<ifcount code="ca_collections" min="2"><label><?= _t('Related Case Studies'); ?></label></ifcount>
							<unit relativeTo="ca_collections" delimiter="<br/>"><l>^ca_collections.preferred_labels.name</l> (^relationship_typename)</unit></div></ifcount>}}}
						
						{{{<ifcount code="ca_entities.related" min="1" max="1"><div class="unit"><label><?= _t('Related Person/Organization'); ?></label></ifcount>
							<ifcount code="ca_entities.related" min="2"><label><?= _t('Related People/Organizations'); ?></label></ifcount>
							<unit relativeTo="ca_entities.related" delimiter="<br/>"><l>^ca_entities.preferred_labels.displayname</l> (^relationship_typename)</unit></div></ifcount>}}}
						
						{{{<ifcount code="ca_occurrences" min="1"><div class="unit"><ifcount code="ca_occurrences" min="1" max="1"><label><?= _t('Related Event'); ?></label></ifcount>
							<ifcount code="ca_occurrences" min="2"><label><?= _t('Related Events'); ?></label></ifcount>
							<unit relativeTo="ca_occurrences" delimiter="<br/>"><l>^ca_occurrences.preferred_labels.name</l> (^relationship_typename)</unit></div></ifcount>}}}
						
						{{{<ifcount code="ca_places" min="1"><div class="unit"><ifcount code="ca_places" min="1" max="1"><label><?= _t('Related Location'); ?></label></ifcount>}}}
							<ifcount code="ca_places" min="2"><label><?= _t('Related Locations'); ?></label></ifcount>}}}
							<unit relativeTo="ca_places" delimiter="<br/>"><l>^ca_places.preferred_labels.name</l> (^relationship_typename)</unit></div></ifcount>}}}				

						{{{<ifcount code="ca_objects.related" min="1"><div class="unit"><label><?= _t('Related Items'); ?></label>
							<unit relativeTo="ca_objects.related" delimiter="<br/>">
							<l>^ca_objects.preferred_labels</l> (^ca_objects.type_id)
						</unit></div></ifcount>}}}
						
					</div><!-- end col -->				
					<!-- <div class="col-sm-6 colBorderLeft">
						{{{map}}}
					</div> -->
				</div><!-- end row -->
						
			</div><!-- end col -->
		</div><!-- end row --></div><!-- end container -->
	</div><!-- end col -->
	<div class='navLeftRight col-xs-1 col-sm-1 col-md-1 col-lg-1'>
		<div class="detailNavBgRight">
			{{{nextLink}}}
		</div><!-- end detailNavBgLeft -->
	</div><!-- end col -->
</div><!-- end row -->

<script type='text/javascript'>
	jQuery(document).ready(function() {
		$('.trimText').readmore({
		  speed: 75,
		  maxHeight: 120
		});
	});
</script>
