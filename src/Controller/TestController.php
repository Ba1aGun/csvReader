<?php
namespace App\Controller;

use \Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route(
     *     "/test/action",
     *     name = "number"
     *     )
     */
    public function action(){
        $asdsf = $this->getDoctrine()->getManager();

        $a = new EntityManager();

        return Response::create(var_dump($asdsf));
    }
}