<?php
namespace App\Controllers\V1;

use App\Controllers\Controller;
use App\Service\V1\User;
use Psr\Container\ContainerInterface;

class UserController extends Controller
{
    // constructor receives container instance
    function __construct(ContainerInterface $c)
    {
        parent::__construct($c);
    }

    public function actionView($request, $response, $args)
    {
        $uuid = $request->getHeader('Access-UUID');

        $this->container->UserV1->handleActionView($uuid[0], $this->code, $this->msg, $this->resp);

        return $this->json($response);
    }
}
?>