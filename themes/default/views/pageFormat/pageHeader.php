<?php
$lightboxDisplayName = caGetLightboxDisplayName();
$lightbox_sectionHeading = ucFirst($lightboxDisplayName["section_heading"]);

# Collect the user links
$user_links = array();
if ($this->request->isLoggedIn()) {
    $user_links[] = '<li role="presentation" class="dropdown-header">' . trim($this->request->user->get("fname") . " " . $this->request->user->get("lname")) . ', ' . $this->request->user->get("email") . '</li>';
    $user_links[] = '<li class="divider nav-divider"></li>';
    $user_links[] = "<li>" . caNavLink($this->request, _t('User Profile'), '', '', 'LoginReg', 'profileForm', array()) . "</li>";
    $user_links[] = "<li>" . caNavLink($this->request, _t('Logout'), '', '', 'LoginReg', 'Logout', array()) . "</li>";
} else {
    $user_links[] = "<li><a href='#' onclick='caMediaPanel.showPanel(\"" . caNavUrl($this->request, '', 'LoginReg', 'LoginForm', array()) . "\"); return false;' >" . _t("Login") . "</a></li>";
    $user_links[] = "<li><a href='#' onclick='caMediaPanel.showPanel(\"" . caNavUrl($this->request, '', 'LoginReg', 'RegisterForm', array()) . "\"); return false;' >" . _t("Register") . "</a></li>";
}
$has_user_links = (sizeof($user_links) > 0);
?><!DOCTYPE html>
<html lang="ar">
<head>
    <title>الأرشيف الفلسطيني - الجامعة الأمريكية</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?= MetaTagManager::getHTML(); ?>
    <?= AssetLoadManager::getLoadHTML($this->request); ?>
    <title><?= (MetaTagManager::getWindowTitle()) ? MetaTagManager::getWindowTitle() : $this->request->config->get("app_display_name"); ?></title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="/pawtucket2/assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">

    <!-- CSS Files -->
	<link rel="stylesheet" href="/pawtucket2/themes/default/assets/pawtucket/css/main.css" type="text/css" media="all">
    <link rel="stylesheet" href="/pawtucket2/themes/default/assets/pawtucket/css/fonts.css" type="text/css" media="all">	
	<link rel="stylesheet" href="/pawtucket2/themes/default/assets/pawtucket/css/home.css" type="text/css" media="all">
	<link rel="stylesheet" href="/pawtucket2/themes/default/assets/pawtucket/css/category-list.css" type="text/css" media="all">
	<link rel="stylesheet" href="/pawtucket2/themes/default/assets/pawtucket/css/browse.css" type="text/css" media="all">
	<link rel="stylesheet" href="/pawtucket2/themes/default/assets/pawtucket/css/header.css" type="text/css" media="all">
    
    <!-- Bootstrap JS and dependencies -->
    <script src="/pawtucket2/assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="/pawtucket2/assets/jquery/js/jquery-3.7.1.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> -->


    <style>
    /* Reset & Base */
    *, *::before, *::after {
        box-sizing: border-box;
    }

    body {
        font-family: "Tajawal", Arial, sans-serif;
        
        overflow-x: hidden;
        background-repeat: no-repeat;
    }

    /* Header */
    header {
        position: relative;
        padding: 0 !important;
        margin: 0 !important;
    }

    header .container::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: -1;
        width: 96%;
        height: 160px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    /* Navbar Container */
    .navbar-container {
        /* background: #fff; */
        border-radius: 15px;
        padding: 15px;
        margin: 10px 0 20px;
    }

    .header-content {
        display: flex;
        align-items: center;
        justify-content: space-around;
        flex-direction: row-reverse;
        flex-wrap: wrap;
        gap: 15px;
    }

    /* Logo & University */
    .logo-university-container {
        display: flex;
        align-items: center;
        flex-direction: row-reverse;
        gap: 15px;
        padding-block: 10px;
    }

    .logo-img {
        height: 55px;
        width: 70px;
        transition: all 0.3s ease;
    }

    .university-title {
        text-align: right;
        color: black;
        line-height: 1.3;
    }

    .university-title .ar {
        font-size: 1.1rem;
        font-weight: 750;
        margin-bottom: 2px;
    }

    .university-title .en {
        font-size: 0.98rem;
        font-weight: 520;
    }

    /* Site Title */
    .site-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: black;
        margin: 0;
        text-align: right;
    }

    /* Buttons */
    .button-container {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .btn-login,
    .btn-register {
        padding: 8px 20px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 14px !important;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-login {
        color: #333;
        border: 1px solid transparent;
    }

    .btn-login:hover {
        border-color: #e7d8bc;
        color: #474747;
    }

    .btn-register {
        color: #000;
        border: none;
        font-size: 20px;
    }

    .btn-register:hover {
        background-color: #e7d8bc;
        color: #474747;
    }

    /* Dropdown */
    .dropdown-menu {
        background: #fff;
        border-radius: 6px;
        border: 1px solid #eee;
        box-shadow: 0 8px 32px rgba(31, 38, 135, 0.1);
    }

    .dropdown-item {
        color: #333;
        font-weight: 500;
        padding: 8px 15px;
        transition: 0.2s;
    }

    .dropdown-item:hover {
        background: rgba(248, 183, 57, 0.1);
    }

    /* Responsive */
    @media (max-width: 992px) {
        .header-content {
            flex-direction: column;
            align-items: center;
        }

        .site-title {
            margin: 15px 0;
        }

        header .container::after {
            width: 80%;
            height: 200px;
        }
    }

    @media (max-width: 768px) {
        .logo-img {
            height: 40px;
            width: 40px;
        }

        .university-title .ar {
            font-size: 1rem;
        }

        .university-title .en {
            font-size: 0.8rem;
        }

        .site-title {
            font-size: 1.8rem;
        }

        .btn-login,
        .btn-register {
            padding: 6px 12px;
            font-size: 14px;
        }
    }
</style>



</head>
<body>
<header>
    <div class="container">
        <!-- Everything inside the white navbar container -->
        <div class="navbar-container">
            <div class="header-content">
                <!-- Logo and university name on the left -->
                <div class="logo-university-container">
                    <a href="<?= caNavUrl($this->request, '', 'Home', 'Index'); ?>">
                        <img src="<?= __CA_URL_ROOT__ ?>/themes/default/assets/pawtucket/graphics/logos/aaup_logo.svg" alt="AAUP Logo" class="logo-img">
                    </a>
                    <div class="university-title">
                        <div class="ar">الجامعة العربية الأمريكية</div>
                        <div class="en">ARAB AMERICAN UNIVERSITY</div>
                    </div>
                </div>
                
                <!-- Main site title on the right -->
                <h1 class="site-title">ذاكرة فلسطين</h1>
                
                <!-- Buttons on the far right -->
                <div class="button-container">
                    <?php if (!$this->request->isLoggedIn()): ?>
                        <a href="#" class="btn btn-login" onclick="caMediaPanel.showPanel('<?= caNavUrl($this->request, '', 'LoginReg', 'LoginForm', array()); ?>'); return false;">تسجيل الدخول</a>
                        <a href="#" class="btn btn-register" onclick="caMediaPanel.showPanel('<?= caNavUrl($this->request, '', 'LoginReg', 'RegisterForm', array()); ?>'); return false;">إنشاء حساب</a>
                    <?php else: ?>
                        <div class="dropdown">
                            <button class="btn btn-login dropdown-toggle" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= trim($this->request->user->get("fname") . " " . $this->request->user->get("lname")) ?>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <?= caNavLink($this->request, _t('الملف الشخصي'), '', '', 'LoginReg', 'profileForm', array(), ['class' => 'dropdown-item']) ?>
                                <?= caNavLink($this->request, _t('تسجيل الخروج'), '', '', 'LoginReg', 'Logout', array(), ['class' => 'dropdown-item']) ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Rest of your content goes here -->



</body>
</html>