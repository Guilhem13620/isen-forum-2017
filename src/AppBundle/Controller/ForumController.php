<?php

namespace AppBundle\Controller;

use AppBundle\Repository\ForumRepo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ForumController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $service = new ForumRepo();

        return $this->render('AppBundle:ForumController:index.html.twig', array(
            'forums' => $service->getAll()
        ));
    }


    /**
     * @Route("/add", name="app_forum_add")
     */
    public function addAction()
    {
        return $this->render('AppBundle:ForumController:index.html.twig', array(
            // ...
        ));
    }


    /**
     * @Route("/show/{id}", name="app_forum_show")
     */
    public function showAction(string $id)
    {
        return $this->render('AppBundle:ForumController:index.html.twig', array(
            // ...
        ));
    }

}
