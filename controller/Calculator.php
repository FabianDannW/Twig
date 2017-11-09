<?php
/**
 * Created by PhpStorm.
 * User: Fabian wendell
 * Date: 09-11-2017
 * Time: 09:07
 */


$a = $_REQUEST["a"];
$b = $_REQUEST["b"];
$Operation = $_REQUEST["Operation"];

switch ($Operation){
    case "+":
        $result = $a + $b;
        break;
    case "-":
        $result = $a - $b;
        break;
    case "/":
        $result = $a / $b;
        break;
    case "*":
        $result = $a * $b;
        break;

    default:
        $result =  $Operation;
}

$Result = $a ." " . $Operation . " " . $b . " =  -->   " . $result;


require_once '../vendor/autoload.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../View');
$twig = new Twig_Environment($loader, array(
    // 'cache' => '/path/to/compilation_cache',
    'auto_reload' => true
));
$template = $twig->loadTemplate('twig.twig');
$parametersToTwig = array("result" => $result);
echo $template->render($parametersToTwig);
