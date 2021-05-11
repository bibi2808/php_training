<?php
        
        // INPUT
        $inputSubmit = Helper::cmsInput('submit', 'form[submit]', 'submit', 'login', 'register');
        $inputToken = Helper::cmsInput('hidden', 'form[token]', 'token', time());

        // ROW
        $rowEmail       = Helper::cmsRow('Email', Helper::cmsInput('text', 'form[email]', 'email', null, 'contact-input'));
        $rowPassword    = Helper::cmsRow('Password', Helper::cmsInput('text', 'form[password]', 'password', null, 'contact-input'));
        $rowSubmit      = Helper::cmsRow('Submit', $inputToken . $inputSubmit, true);

        $link = URL::createLink('default', 'index', 'login');
?>

<div class="title">
    <span class="title_icon"><img src="<?php echo $imgURL; ?>/bullet1.gif" alt="" title="" /></span>Login
</div>

<div class="feat_prod_box_details">
    <div class="contact_form">
        <div class="form_subtitle">Login</div>
        <?php echo isset($this->errors) ? $this->errors : '';?>
        <form name="adminform" action="<?php echo $link; ?>" method="POST">
            <?php echo  $rowEmail . $rowPassword . $rowSubmit; ?>
        </form>
    </div>
</div>

<div class="clear"></div>