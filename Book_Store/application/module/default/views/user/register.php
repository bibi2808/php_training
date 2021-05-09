<?php

// INPUT
$inputUserName = Helper::cmsInput('text', 'form[username]', 'username', '');
$inputFullName = Helper::cmsInput('text', 'form[fullname]', 'fullname', '');
$inputEmail = Helper::cmsInput('text', 'form[email]', 'email', '');
$inputPassword = Helper::cmsInput('text', 'form[password]', 'password', '');


// ROW
$rowUserName    = Helper::cmsRow('Username', Helper::cmsInput('text', 'form[username]', 'username', '', 'contact-input'));
$rowFullName    = Helper::cmsRow('Username', Helper::cmsInput('text', 'form[fullname]', 'fullname', '', 'contact-input'));
$rowPassword    = Helper::cmsRow('Password', Helper::cmsInput('text', 'form[password]', 'password', '', 'contact-input'));
$rowEmail       = Helper::cmsRow('Email', Helper::cmsInput('text', 'form[email]', 'email', '', 'contact-input'));
$rowSubmit      = Helper::cmsRow('Submit', Helper::cmsInput('submit', 'form[submit]', 'submit', 'register', 'register'), true);


?>

<div class="title">
    <span class="title_icon"><img src="<?php echo $imgURL; ?>/bullet1.gif" alt="" title="" /></span>Register
</div>

<div class="feat_prod_box_details">
    <div class="contact_form">
        <div class="form_subtitle">create new account</div>
        <form name="register" action="#">
            <?php echo $rowUserName . $rowFullName . $rowPassword . $rowEmail . $rowSubmit; ?>
        </form>
    </div>
</div>

<div class="clear"></div>