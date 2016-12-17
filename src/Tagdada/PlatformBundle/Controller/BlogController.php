<?php

namespace Tagdada\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Tagdada\PlatformBundle\Entity\BlogPost;

class BlogController extends Controller
{

    /**
    *Matches /blog exactly
    *
    * @Route("/blog/{page}", name="index")
    */
    public function indexAction()
    {
        return $this->render('blog/index.html.twig');
    }


    /**
    *
    *Matches /blog/*
    * @Route("/blog/{slug}", name="homepage")
    */
    public function HomepageAction(Request $request)
    {
        $p = new BlogPost();
        $p->setTitre('Mon titre');
        $p->setContent('fuuuuuuuuuuuuuuuuuu');
        $p->setPublished('10/03/2016');
        $titre = $this->getDoctrine() ->getManager();
        return $this->render('blog/index.html.twig', [
          'post' => $p,
          'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}
