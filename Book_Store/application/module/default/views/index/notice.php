<?php
$message = '';

switch($this->arrParams['type']){
    case 'register-success':
        $message = 'Register is successfully';
        break;
    case 'not-permission':
        $message = 'You have no permission';
        break;
    case 'not-url':
        $message = 'You have no url';
        break;
}

?>

<div class="notice"><?php echo $message; ?></div>