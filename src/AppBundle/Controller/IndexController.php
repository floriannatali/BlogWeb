<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class IndexController
 * @package AppBundle\Controller
 *
 * @Route("/",name="index")
 */
class IndexController extends Controller
{
    /**
     * @Route("/accueil",name="index_accueil")
     *
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function accueilAction()
    {
        return $this->render(':index:accueil.html.twig', []);
    }
}
