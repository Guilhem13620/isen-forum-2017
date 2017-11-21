<?php

namespace AppBundle\Controller;

use AppBundle\Repository\ForumRepo;
use AppBundle\Entity\Forum;
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
        $forumName = $_POST['title'];

        $forum = new Forum();
        $forum->setTitle($forumName);

        $service = new ForumRepo();
        $service->add($forum);

        return $this->render('AppBundle:ForumController:index.html.twig', array(
            'forums' => $service->getAll()
        ));
    }


    /**
     * @Route("/show/{id}", name="app_forum_show")
     */
    public function showAction(string $id)
    {

        $service = new ForumRepo();
        return $this->render('AppBundle:ForumController:indexPost.html.twig', array(
            'forums' => $service->get($id), 'id_forum' => $id
        ));
    }

    /**
     * @Route("/addPost", name="app_forum_add_post")
     */
    public function addActionPost()
    {
        $postName = $_POST['title'];
        $idForum = $_POST['id_forum'];
        
        $service = new ForumRepo();
        $service->addPost($idForum,$postName);




        return $this->render('AppBundle:ForumController:indexPost.html.twig', array(
            'forums' => $service->get($idForum),"id_forum" => $idForum
        ));
    }

}
