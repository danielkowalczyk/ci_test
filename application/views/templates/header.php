<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?=$title?></title>
    </head>
    <body>
        
    <a href="<?php echo base_url(); ?>">Home</a><br>
    <a href="<?php echo base_url(); ?>news">Newsy</a><br>
    
    <?php if ( $logged_in ): ?>
        
        <a href="<?php echo base_url(); ?>user/logout">Wyloguj się</a>
        
    <?php else: ?>
        
        <a href="<?php echo base_url(); ?>user/sign_in">Zaloguj się</a> /
        <a href="<?php echo base_url(); ?>user/signup">Zarejestruj się</a>
        
    <?php endif; ?>

