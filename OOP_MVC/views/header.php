<?php
    $cssURL = PUBLIC_URL . 'css' . DS;
    $jsURL = PUBLIC_URL . 'js' . DS;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="public/js/jquery.js"></script>
    <script type="text/javascript" src="public/js/custom.js"></script>
    <title>MVC</title>
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <h1>Header</h1>
            <a href="index.php?controller=index&action=index" class="index">Home</a>
            <a href="index.php?controller=login&action=index" class="login">Login</a>
            <a href="index.php?controller=group&action=index" class="group">Group</a>
        </div>