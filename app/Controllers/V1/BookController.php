<?php
namespace App\Controllers\V1;

use App\Controllers\BaseController;
use App\Service\Book;
use Psr\Container\ContainerInterface;

class BookController extends BaseController
{
    private $_di;

    // constructor receives container instance
    function __construct(ContainerInterface $di)
    {
        parent::__construct();

        $this->_di = $di;
    }

    public function actionList($request, $response, $args)
    {
        // $query = $request->getQueryParams();
        $book = new Book($this->_di);
        $book->handleActionList($this->code, $this->msg, $this->data);

        return $this->json($response);
    }

    public function actionDetail($request, $response, $args)
    {
        $book = new Book($this->_di);
        $book->handleActionDetail($args['id'], $this->code, $this->msg, $this->data);

        return $this->json($response);
    }

    public function actionAdd($request, $response, $args)
    {
        $postData = $request->getParsedBody();

        $book = new Book($this->_di);
        $book->handleActionAdd($postData, $this->code, $this->msg, $this->data);

        return $this->json($response);
    }

    public function actionUpdate($request, $response, $args)
    {
        $putData = $request->getParsedBody();

        $book = new Book($this->_di);
        $book->handleActionUpdate($args['id'], $putData, $this->code, $this->msg);

        return $this->json($response);
    }

    public function actionDelete($request, $response, $args)
    {
        $book = new Book($this->_di);
        $book->handleActionDelete($args['id'], $this->code, $this->msg);

        return $this->json($response);
    }
}
?>