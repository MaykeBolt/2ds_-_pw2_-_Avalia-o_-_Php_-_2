<?php

include_once __DIR__ . "/../vendor/autoload.php";

use App\SystemServices\MonologFactory;
use App\Model\User;
use App\Controller\UserController;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Selective\BasePath\BasePathMiddleware;

// create a log channel
MonologFactory::getInstance()->debug("'main.php' executando...");

$app = AppFactory::create();

$app->addRoutingMiddleware();
$app->add(new BasePathMiddleware($app));
$app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $request, Response $response) {
    $p1 = new User("Fuuka", "Igasaki", 17);
    $response->getBody()->write(
            $p1->getName()." | ".$p1->getSurname()." | ".$p1->getAge()
        );
    MonologFactory::getInstance()->info("Nome de usuário '".$p1->getName()." ".$p1->getSurname()."' obtido com sucesso!");
    return $response;
});

$app->run();

?>
