<?php
    $cssURL = PUBLIC_URL . 'css' . DS;
    $jsURL = PUBLIC_URL . 'js' . DS;
    Session::init();
    $xhtml = '<a href="index.php?controller=index&action=index" class="index">Home</a>';

    if(Session::get('loggedIn')){
        // loggedIn
        $xhtml .= '<a href="index.php?controller=group&action=index" class="index">Group</a>';
        $xhtml .= '<a href="index.php?controller=user&action=logout" class="user">Logout</a>';
    } else{
        // Not loggedIn
        $xhtml .= '<a href="index.php?controller=user&action=login" class="user">Login</a>';
    }
    if(!empty($this->js)){
        $fileJs = '';
        foreach($this->js as $js){
            $fileJs .= '<l type="text/javascript" src="' . VIEW_URL . $js .'"></l>';
        }
    }

    if(!empty($this->css)){
        $fileCss = '';
        foreach($this->css as $css){
            $fileCss .= '<link type="text/javascript" src="' . VIEW_URL . $css .'"/>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <?php echo $fileCss; ?>
    <script type="text/javascript" src="public/js/jquery.js"></script>
    <script type="text/javascript" src="public/js/custom.js"></script>
    <?php echo $fileJs; ?>
    <title>MVC</title>
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <h1>Header</h1>
            <?php echo $xhtml; ?>
        </div>