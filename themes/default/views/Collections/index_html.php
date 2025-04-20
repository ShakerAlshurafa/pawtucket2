<?php
	$o_collections_config = $this->getVar("collections_config");
	$qr_collections = $this->getVar("collection_results");
?>
	<div class="row">
		<div class='col-md-12 col-lg-12 collectionsList text-center'>
			<div class="container py-2 categories-header">
				<div class="row">
					<div class="col-md-6 categories-header-img">
						<img src="/pawtucket2/themes/default/assets/pawtucket/graphics/categories-header.webp" class="img-fluid rounded" alt="Archive Image">
					</div>
					<div class="col-md-6 categories-header-content d-flex flex-column justify-content-center align-items-center">
						<h1 class="display-4"><?php print $this->getVar("section_name"); ?></h1>
						<p class="display-6 mt-5 mx-4"><?php print $o_collections_config->get("collections_intro_text"); ?></p>
					</div>
				</div>
			</div>

<?php	
	$vn_i = 0;
	if($qr_collections && $qr_collections->numHits()) {
		while($qr_collections->nextHit()) {
			if ( $vn_i == 0) { print "<div class='row'>"; } 
			print "<div class='col-sm-6'><div class='collectionTile'><div class='title'>".caDetailLink($this->request, $qr_collections->get("ca_collections.preferred_labels"), "", "ca_collections",  $qr_collections->get("ca_collections.collection_id"))."</div>";	
			if (($o_collections_config->get("description_template")) && ($vs_scope = $qr_collections->getWithTemplate($o_collections_config->get("description_template")))) {
				print "<div>".$vs_scope."</div>";
			}
			print "</div></div>";
			$vn_i++;
			if ($vn_i == 2) {
				print "</div><!-- end row -->\n";
				$vn_i = 0;
			}
		}
		if (($vn_i < 2) && ($vn_i != 0) ) {
			print "</div><!-- end row -->\n";
		}
	} else {
		print _t('
			<div class="alert alert-warning text-center py-5 mb-5 d-flex flex-column justify-content-center align-items-center" role="alert">
				<h4 class="alert-heading display-6 mt-2">لا يوجد بيانات متوفرة بعد</h4>
				<p class="display-7">نأسف، لم يتم العثور على أي بيانات متاحة في الوقت الحالي.</p>
			</div>
		');
	}
	
?>
		</div>
	</div>
</div>