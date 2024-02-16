<?php
$stripeSecretKey = 'sk_test_51OXjuBLF8qtlknccQJyGjgTdlEFmxWjKwvjazRiKWBHZD5BjM6KcZ3GmmiTYIpcyMbubB5isSulklLeGl7F8xrxc00xLfjRhUr';

/**
 * get the complete url of the project
 *
 * @return void
 */
function getBaseUrl () {
    // protocole (http ou https)
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    
    // nom d'hôte (domaine)
    $host = $_SERVER['HTTP_HOST'];
    
    // le chemin de base (racine URL)
    $basePath = dirname($_SERVER['PHP_SELF']);
    
    // l'URL complète
    $baseUrl = $protocol . '://' . $host . $basePath;
    
    return $baseUrl;
    
};