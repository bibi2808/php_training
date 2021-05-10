<?php
// echo '<pre>';
// print_r($this->arrParam);
// echo '<pre />';


$dataForm         = isset($this->arrParam['form']) ? $this->arrParam['form'] : '';

// INPUT
$inputSubmit = Helper::cmsInput('submit', 'form[submit]', 'submit', 'register', 'register');
$inputToken = Helper::cmsInput('hidden', 'form[token]', 'token', time());

// ROW
$rowUserName    = Helper::cmsRow('Username', Helper::cmsInput('text', 'form[username]', 'username', $dataForm['username'] ?? null, 'contact-input'));
$rowFullName    = Helper::cmsRow('Fullname', Helper::cmsInput('text', 'form[fullname]', 'fullname', $dataForm['fullname'] ?? null, 'contact-input'));
$rowPassword    = Helper::cmsRow('Password', Helper::cmsInput('text', 'form[password]', 'password', $dataForm['password'] ?? null, 'contact-input'));
$rowEmail       = Helper::cmsRow('Email', Helper::cmsInput('text', 'form[email]', 'email', $dataForm['email'] ?? null, 'contact-input'));
$rowSubmit      = Helper::cmsRow('Submit', $inputToken . $inputSubmit, true);

$link = URL::createLink('default', 'user', 'register');
?>

<div class="title">
    <span class="title_icon"><img src="<?php echo $imgURL; ?>/bullet1.gif" alt="" title="" /></span>Register
</div>

<div class="feat_prod_box_details">
    <div class="contact_form">
        <div class="form_subtitle">create new account</div>
        <?php echo isset($this->errors) ? $this->errors : '';?>
        <form name="adminform" action="<?php echo $link; ?>" method="POST">
            <?php echo $rowUserName . $rowFullName . $rowPassword . $rowEmail . $rowSubmit; ?>
        </form>
    </div>
</div>

<div class="clear"></div>