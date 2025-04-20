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
		// print $this->render("Front/featured_set_slideshow_html.php");
?>

<!-- Archive home page section 1 -->
<div class="home-page">
    <!-- Background Carousel -->
    <div id="carouselBackground" class="carousel slide carousel-fade home-background-carousel" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Reduced number of slides for better performance -->
            <div class="carousel-item active">
                <img src="/pawtucket2/themes/default/assets/pawtucket/graphics/home-page.jpg" class="d-block w-100 carousel-img" alt="Palestinian Memory Archive">
            </div>
            <div class="carousel-item">
                <img src="/pawtucket2/themes/default/assets/pawtucket/graphics/univ3.jpg" class="d-block w-100 carousel-img" alt="Historical Documents">
            </div>
            <div class="carousel-item">
                <img src="/pawtucket2/themes/default/assets/pawtucket/graphics/lib8.jpg" class="d-block w-100 carousel-img" alt="Cultural Heritage">
            </div>
            <div class="carousel-item">
                <img src="/pawtucket2/themes/default/assets/pawtucket/graphics/lib1.jpg" class="d-block w-100 carousel-img" alt="Archival Materials">
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col-lg-8 col-xl-6">
                <div class="home-content">
                    <div class="home-header">
                    <div class="title-container">
                            <h1 class="home-title">ذاكرة فلسطين</h1>
                        </div>
                        <?php if (!$this->request->isLoggedIn()): ?>
                            <a href="#" class="home-button" onclick="caMediaPanel.showPanel('<?= caNavUrl($this->request, '', 'LoginReg', 'RegisterForm', array()); ?>'); return false;">
                                إنشاء حساب
                                <i class="fas fa-user-plus ms-2"></i>
                            </a>
                        <?php else: ?>
                            <a href="<?= caNavUrl($this->request, '', 'Browse', 'collections', []); ?>" class="home-button">
                                اذهب للأرشيف
                                <i class="fas fa-archive ms-2"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="home-description">
                        <p>ذاكرة فلسطين هي أرشيف رقمي يهدف إلى توثيق وحفظ الأحداث التاريخية والشهادات الشخصية والمصادر المختلفة المتعلقة بالقضية الفلسطينية. يتيح هذا الأرشيف الوصول إلى وثائق، صور، مقاطع فيديو، وتسجيلات صوتية تسلط الضوء على تاريخ فلسطين وتراثها الثقافي.</p>
                        <div class="search-box">
                            <form action="<?= caNavUrl($this->request, '', 'Search', 'Index'); ?>">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="ابحث في الأرشيف..." aria-label="Search">
                                    <button class="btn btn-search" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="scroll-indicator">
        <span></span>
    </div>
</div>

			
<!-- Archive content section -->
<div class="container">
    <div class="row">
        <div class="col-sm-12 archive-section">
            <h2>محتوى الأرشيف</h2>
            <p class="subtitle">توثيق ورصد المعلومات للأجيال القادمة</p>

            <!-- Archive categories -->
            <?php
                // From database
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
                $isLoggedIn = $this->request->isLoggedIn();
            ?>

            <!-- Category Grid -->
            <div class="archive-categories">
                <div class="row">
                    <?php foreach ($categories as $category): ?>
                        <div class="col-sm-2 col-xs-6 mb-4">
                            <?php if ($isLoggedIn): ?>
                                <a href="/Collections/Index/<?= $category['id'] ?>" class="category-item">
                                    <div class="category-card text-center">
                                        <div class="category-name"><?= $category['name'] ?></div>
                                    </div>
                                </a>
                            <?php else: ?>
                                <div class="category-card text-center require-login" 
                                    data-category="<?= $category['name'] ?>"
                                    data-loginurl="<?= caNavUrl($this->request, '', 'LoginReg', 'LoginForm', []) ?>">
                                    <div class="category-name"><?= $category['name'] ?></div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

