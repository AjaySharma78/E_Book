<?php
require('stripe-php-master/init.php');


$publishableKey="pk_test_51PoPKK01g82GvaA7TG1I30RXgiBX2DPKZa9StwXSqDb1Yz6wyzBF7DeygL6qvg4hIQsJJ4ChNpGTQAJSXgb2lTf4002aF294LJ";

$secretKey="sk_test_51PoPKK01g82GvaA7P149gKt5OTZOhjpYMAmqB4l9MAmOcQsO6Z3JiEq7LxAGEODuJDW0FOTarcslEd7BLaxlOzuu00C2Sk8RJf";

\Stripe\Stripe::setApiKey($secretKey);
?>