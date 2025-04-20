<?php
/* ----------------------------------------------------------------------
 * themes/default/views/LoginReg/form_register_html.php
 * ---------------------------------------------------------------------- */
 
	$va_errors = $this->getVar("errors");
	$t_user = $this->getVar("t_user");
	
	if($this->request->isAjax()){
?>
    <div id="caFormOverlay">
        <div class="panel-close" onclick="caMediaPanel.hidePanel(); return false;">
            <i class="fas fa-times-circle"></i>
        </div>
<?php
	}
?>

<style>
.auth-container {
    max-width: 500px;
    margin: 2rem auto;
    background: rgba(255, 255, 255, 0.95);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    backdrop-filter: blur(10px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    overflow: hidden;
    position: relative;
}

.form-header {
    background: rgb(131, 128, 121);
    padding: 2rem;
    text-align: center;
    position: relative;
    border-bottom: 2px solid rgba(255,255,255,0.2);
}

.form-title {
    color: #fff;
    font-family: 'Tajawal', sans-serif;
    font-size: 2rem;
    margin: 0;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
    position: relative;
    z-index: 2;
}

.input-wrapper {
    position: relative;
    margin-bottom: 2rem;
}

.input-icon {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: rgb(153, 201, 177);
    font-size: 1.3rem;
    z-index: 2;
}

.form-control {
    width: 100%;
    padding: 15px 50px 15px 20px;
    border: 2px solid rgba(0, 122, 61, 0.3);
    border-radius: 12px;
    font-size: 1rem;
    background: rgba(255,255,255,0.9);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.form-control:focus {
    border-color: rgb(131, 128, 121);
    box-shadow: 0 0 15px rgba(248, 183, 57, 0.2);
    background: white;
}

.auth-btn {
    background: linear-gradient(45deg,rgb(131, 128, 121),rgb(131, 128, 121)) !important;
    color: #fff !important;
    border: none;
    padding: 15px 30px;
    border-radius: 30px;
    width: 100%;
    font-size: 1.1rem;
    font-weight: 700;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.auth-btn::after {
    content: "";
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(
        45deg,
        transparent,
        rgba(255,255,255,0.3),
        transparent
    );
    transform: rotate(45deg);
    animation: btnShine 3s infinite;
}

@keyframes btnShine {
    0% { transform: translateX(-100%) rotate(45deg); }
    100% { transform: translateX(100%) rotate(45deg); }
}

.auth-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(248, 183, 57, 0.3);
}

.form-link {
    color:rgb(238, 19, 19) !important;
    font-weight: 600;
    position: relative;
    transition: all 0.3s ease;
    text-decoration: none !important;
}

.form-link::after {
    content: "";
    position: absolute;
    bottom: -2px;
    right: 0;
    width: 0;
    height: 2px;
    background: rgba(20, 20, 20, 0.22);
    transition: width 0.3s ease;
}

.form-link:hover::after {
    width: 100%;
    left: 0;
    right: auto;
}

.panel-close i {
    transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.panel-close:hover i {
    transform: rotate(180deg) scale(1.2);
    color: #ff5252;
}

@media (max-width: 576px) {
    .auth-container {
        width: 95%;
        margin: 1rem auto;
    }
    
    .form-title {
        font-size: 1.6rem;
    }
    
    .form-control {
        padding: 12px 45px 12px 15px;
    }
}</style>
<div class="auth-container">
    <div class="form-header">
        <h1 class="form-title">إنشاء حساب جديد</h1>
        <div class="form-header-gradient" style="background: linear-gradient(45deg, #007A3D, #004d27);"></div>
    </div>

    <?php if(is_array($va_errors)): ?>
        <?php foreach($va_errors as $vs_error): ?>
            <div class='auth-alert alert-danger'><?= $vs_error ?></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <form id="RegForm" action="<?= caNavUrl($this->request, "", "LoginReg", "register") ?>" class="auth-form" method="POST">
        <input type="hidden" name="csrfToken" value="<?= caGenerateCSRFToken($this->request) ?>"/>
        
        <!-- First Name -->
        <div class="form-group">
            <div class="input-wrapper">
                <i class="input-icon fas fa-user"></i>
                <input type="text" class="form-control" name="fname" placeholder="الاسم الأول" required>
            </div>
        </div>

        <!-- Last Name -->
        <div class="form-group">
            <div class="input-wrapper">
                <i class="input-icon fas fa-user-tag"></i>
                <input type="text" class="form-control" name="lname" placeholder="الاسم الأخير" required>
            </div>
        </div>

        <!-- University Email -->
        <div class="form-group">
            <div class="input-wrapper">
                <i class="input-icon fas fa-envelope"></i>
                <input type="email" class="form-control" name="email" placeholder="الايميل الجامعي" required>
            </div>
        </div>

        <!-- Password -->
        <div class="form-group">
            <div class="input-wrapper">
                <i class="input-icon fas fa-lock"></i>
                <input type="password" class="form-control" name="password" placeholder="كلمة المرور" required>
            </div>
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <div class="input-wrapper">
                <i class="input-icon fas fa-lock"></i>
                <input type="password" class="form-control" name="password2" placeholder="تأكيد كلمة المرور" required>
            </div>
        </div>

        <!-- Hidden Security Fields -->
        <div style="display:none;">
            <?php 
                // Security question and group code fields
                if($co_security == 'captcha') {
                    // Captcha implementation
                } else {
                    // Equation sum implementation
                }
                print "<input type='text' name='group_code' style='display:none;'>";
            ?>
        </div>

        <div class="form-group">
            <button type="submit" class="auth-btn green">تسجيل الحساب</button>
        </div>
    </form>
</div>

<?php if($this->request->isAjax()): ?>
    </div>
    <style>
    </style>
    
    <script>
    jQuery(document).ready(function() {
        jQuery('#RegForm').on('submit', function(e){        
            jQuery('#caMediaPanelContentArea').load(
                '<?= caNavUrl($this->request, '', 'LoginReg', 'register', null) ?>',
                jQuery('#RegForm').serialize()
            );
            e.preventDefault();
            return false;
        });
    });
    </script>
<?php endif; ?>