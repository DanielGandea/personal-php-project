<!--
1. TO USE AOS TOGETHER WITH ANIMATE.CSS
2. MAKE LINKS WORKING
-->

<?php
  $pageTitle = "Pagina principală";
  include './includes/header.php';
  include './includes/navbar.php';
?>

<?php

// Aici preluam calea din URL, eliminam eventualele slash-uri de la inceput si sfarsit
$path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// Simple router
switch ($path) {
    case '':
    case 'home':
    case 'index.php':
        require './includes/home.php';
        break;

    case 'subnet':
        require './includes/subnetting.php';
        break;

    case 'vlsm':
        require './includes/vlsm.php';
        break;

    case 'conversii':
        require './includes/conversions.php';
        break;
    
    case 'about':
        require './includes/about.php';
        break;

    case 'routing_protocols':
        require './includes/routing_protocols.php';
        break;

    case 'OSImodel':
        require './includes/OSImodel.php';
        break;
      
    default:
        http_response_code(404);
        require './includes/404.php';
        break;
}
?>

<?php include './includes/footer.php'; ?>


</body>
</html>