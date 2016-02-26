<?php

namespace AppBundle\Controller;

use Lsw\ApiCallerBundle\Call\HttpGetJson;
use Lsw\ApiCallerBundle\Caller\LoggingApiCaller;
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
     * @Route("/",name="index_home")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function accueilAction()
    {
        return $this->render(':index:accueil.html.twig', [
            'articles'  => $this->get('api_caller')->call(new HttpGetJson(
               $this->get('service_container')->getParameter('api_base_url').'/article/list',
                ['limit'=>3]
            ))
        ]);
    }
}
