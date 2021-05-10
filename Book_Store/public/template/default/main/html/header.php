<?php
    $imgURL         = TEMPLATE_URL . 'default/main/' . $this->_dirImg;
    $linkHome       = URL::createLink('default', 'index', 'index');
    $linkCategory   = URL::createLink('default', 'index', 'category');
    $linkMyAccount  = URL::createLink('default', 'user', 'myaccount');
    $linkRegister   = URL::createLink('default', 'user', 'register');
    $linkLogin      = URL::createLink('default', 'user', 'login');

?>

<div class="header">
    <div class="logo">
        <a href="index.html"><img src="<?php echo $imgURL; ?>/logo.gif"  /></a>
    </div>
    <div id="menu">
        <ul>
            <li class="index-index"><a href="<?php echo $linkHome; ?>">Home</a></li>
            <li class="index-category"><a href="<?php echo $linkCategory; ?>">Category</a></li>
            <li class="user-myaccount"><a href="<?php echo $linkMyAccount; ?>">My account</a></li>
            <li class="user-register"><a href="<?php echo $linkRegister; ?>">Register</a></li>
            <li class="user-login"><a href="<?php echo $linkLogin; ?>">Login</a></li>
        </ul>
    </div>
</div>