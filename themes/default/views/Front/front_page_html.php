<?php
/** ---------------------------------------------------------------------
 * themes/default/Front/front_page_html : Front page of site 
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2013 Whirl-i-Gig
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
 * @package CollectiveAccess
 * @subpackage Core
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License version 3
 *
 * ----------------------------------------------------------------------
 */
		print $this->render("Front/featured_set_slideshow_html.php");
?>

<div class="home-page">

	<div class="home-background"></div>

	<div class="row">
		<div class="col-md-2"></div>			
		<div class="col-md-10">
			<div class="home-content" >
				<div class="home-title">
                    <a href="#" class="home-button" onclick="caMediaPanel.showPanel('<?= caNavUrl($this->request, '', 'LoginReg', 'RegisterForm', array()); ?>'); return false;">إنشاء حساب</a>
					<h1>ذاكرة فلسطين</h1>
				</div>
				<p> ذاكرة فلسطين هي أرشيف رقمي يهدف إلى توثيق وحفظ الأحداث التاريخية والشهادات الشخصية والمصادر المختلفة المتعلقة بالقضية الفلسطينية. يتيح هذا الأرشيف الوصول إلى وثائق، صور، مقاطع فيديو، وتسجيلات صوتية تسلط الضوء على تاريخ فلسطين وتراثها الثقافي. يوفر النظام أدوات بحث متقدمة وتصنيفات منظمة لتسهيل استكشاف المحتوى، مما يجعله مرجعًا هامًا للباحثين، الطلاب، والمؤرخين المهتمين بتوثيق الرواية الفلسطينية وحفظها للأجيال القادمة.</p>			
			</div>
		</div> <!--end col-sm-8-->		
	</div><!-- end row -->
</div>

			
			<!-- Archive content section -->
<div class="container">
    <div class="row">
        <div class="col-sm-12 archive-section">
            <h2>محتوى الأرشيف</h2>
            <p class="subtitle">توثيق ورصد المعلومات للأجيال القادمة</p>
            
            <!-- Archive categories -->
            <div class="archive-categories">
                <div class="row">
                    <div class="col-sm-2 col-xs-6">
                        <a href="#" class="category-item">الانتهاكات الإنسانية</a>
                    </div>
                    <div class="col-sm-2 col-xs-6">
                        <a href="#" class="category-item">تدمير البنية التحتية</a>
                    </div>
                    <div class="col-sm-2 col-xs-6">
                        <a href="#" class="category-item">المساجد</a>
                    </div>
                    <div class="col-sm-2 col-xs-6">
                        <a href="#" class="category-item">المدارس</a>
                    </div>
                    <div class="col-sm-2 col-xs-6">
                        <a href="#" class="category-item">المستشفيات</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2 col-xs-6">
                        <a href="#" class="category-item">الانتهاكات الإنسانية</a>
                    </div>
                    <div class="col-sm-2 col-xs-6">
                        <a href="#" class="category-item">تدمير البنية التحتية</a>
                    </div>
                    <div class="col-sm-2 col-xs-6">
                        <a href="#" class="category-item">المساجد</a>
                    </div>
                    <div class="col-sm-2 col-xs-6">
                        <a href="#" class="category-item">المدارس</a>
                    </div>
                    <div class="col-sm-2 col-xs-6">
                        <a href="#" class="category-item">المستشفيات</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
