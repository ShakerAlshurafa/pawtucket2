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
                    <?php if (!$this->request->isLoggedIn()): ?>
                        <a href="#" class="home-button" onclick="caMediaPanel.showPanel('<?= caNavUrl($this->request, '', 'LoginReg', 'RegisterForm', array()); ?>'); return false;">إنشاء حساب</a>
                    <?php else: ?>
                        <!-- edit path -->
                        <a href="#" class="home-button" onclick="caMediaPanel.showPanel('<?= caNavUrl($this->request, '', 'LoginReg', 'RegisterForm', array()); ?>'); return false;">اذهب للارشيف</a> 
                    <?php endif; ?>
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

            <?php
                // Archive categories from database
                $categories = [
                    ['name' => 'الانتهاكات الإنسانية', 'id' => 1],
                    ['name' => 'تدمير البنية التحتية', 'id' => 2],
                    ['name' => 'المساجد', 'id' => 3],
                    ['name' => 'المدارس', 'id' => 4],
                    ['name' => 'المستشفيات', 'id' => 5],
                    ['name' => 'ضحايا المدنيين', 'id' => 6],
                    ['name' => 'تدمير المنازل', 'id' => 7],
                    ['name' => 'الآثار التاريخية', 'id' => 8],
                    ['name' => 'المرافق العامة', 'id' => 9],
                    ['name' => 'الجرائم الحربية', 'id' => 10]
                ];

                // Check if user is logged in
                $isLoggedIn = method_exists($this->request, 'isLoggedIn') ? $this->request->isLoggedIn() : false;
            ?>

            <!-- Category Grid -->
            <div class="archive-categories">
                <div class="row">
                    <?php foreach ($categories as $category): ?>
                        <div class="col-sm-2 col-6 mb-4">
                            <div class="category-card text-center">
                                <?php if ($isLoggedIn): ?>
                                    <a href="/category/<?= htmlspecialchars($category['id']) ?>" class="category-item">
                                        <div class="category-name"><?= htmlspecialchars($category['name']) ?></div>
                                    </a>
                                <?php else: ?>
                                    <div class="category-link require-login" 
                                        data-category="<?= htmlspecialchars($category['name']) ?>"
                                        data-loginurl="<?= caNavUrl($this->request, '', 'LoginReg', 'LoginForm', []) ?>">
                                        <div class="category-name"><?= htmlspecialchars($category['name']) ?></div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Login Modal -->
            <div class="modal fade" id="loginRequiredModal" tabindex="-1" role="dialog" aria-labelledby="loginRequiredModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-warning text-white">
                            <h5 class="modal-title" id="loginRequiredModalLabel">تسجيل الدخول مطلوب</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <i class="fas fa-lock fa-4x mb-3 text-warning"></i>
                            <p class="lead">عذراً، يجب عليك تسجيل الدخول لعرض محتوى <strong id="categoryNamePlaceholder"></strong></p>
                            <p>بعد تسجيل الدخول سوف تتمكن من مشاهدة جميع المحتويات المتاحة.</p>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                            <a href="#" id="loginRedirectBtn" class="btn btn-warning text-white">
                                <i class="fas fa-sign-in-alt"></i> تسجيل الدخول
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
$(document).ready(function() {   
    $('.require-login').click(function(event) {
        event.preventDefault(); 

        var categoryName = $(this).data('category');
        var loginUrl = $(this).data('loginurl');

        console.log("Category clicked:", categoryName);
        console.log("Login URL:", loginUrl);

        // Update modal content
        $('#categoryNamePlaceholder').text(categoryName);
        $('#loginRedirectBtn').attr('href', loginUrl);

        // Show the Bootstrap modal
        $('#loginRequiredModal').modal('show');
    });
});


</script>

