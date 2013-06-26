<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?=$title?></title>
    </head>
    <body>
        
    <?php if ( $logged_in ): ?>
        
        <a href="user/logout">Wyloguj się</a>
        
    <?php else: ?>
        
        <a href="user/sign_in">Zaloguj się</a> /
        <a href="user/signup">Zarejestruj się</a>
        
    <?php endif; ?>

