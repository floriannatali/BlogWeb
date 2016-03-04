<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\ArticleType;
use AppBundle\Model\Article;
use Guzzle\Http\Exception\BadResponseException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class IndexController
 * @package AppBundle\Controller
 *
 * @Route("/",name="index")
 */
class IndexController extends Controller
{
    /**
     *
     * @Route("/accueil",name="index_accueil")
     * @Route("/",name="index_home")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function accueilAction()
    {
        $articles = [];
        if($this->getUser() !== null) {
            $jwt = $this->getUser()->getJwtToken();
            $client = $this->get('app_bundle.guzzle.article_api_client');
            $request = $client->get( 'article/list', [
                'Authorization'=>'Bearer '. $jwt
                ],[
                "query" => ['limit'=>3]
            ]);

            try{
                $response = $request->send();
                $articles = $response->json();
            }catch (BadResponseException $ex) {}
        }
        return $this->render(':index:articles.html.twig', [
            'articles'  => $articles
        ]);
    }

    /**
     *
     * @Security("has_role('ROLE_READER')")
     *
     * @Route("/all-articles",name="index_all_articles")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function allArticles()
    {
        $articles = [];
        $jwt = $this->getUser()->getJwtToken();
        $client = $this->get('app_bundle.guzzle.article_api_client');
        $request = $client->get( 'article/list', [
            'Authorization'=>'Bearer '. $jwt
        ]);

        try{
            $response = $request->send();
            $articles = $response->json();
        }catch (BadResponseException $ex) {}


        return $this->render(':index:articles.html.twig', [
            'articles'  => $articles
        ]);
    }

    /**
     * @Security("has_role('ROLE_WRITER')")
     *
     * @Route("/add-article",name="index_add_article")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {

        $article = new Article();
        $form = $this->createForm(new ArticleType(), $article);
        $form->add('submit', SubmitType::class, array('label' => 'Add'));

        $form->handleRequest($request);
        if($form->isValid()) {
            $jwt = $this->getUser()->getJwtToken();
            $client = $this->get('app_bundle.guzzle.article_api_client');
            $request = $client->post( 'article/create', [
                'Authorization'=>'Bearer '. $jwt
            ],[
                    'title'=>$article->getTitle(),
                    'content'=>$article->getContent()
            ]);
            try{
                $response = $request->send();
                $article = $response->json();
                $this->get('session')->getFlashBag()->add("success", "New article create with success");
                $this->get('session')->getFlashBag()->add("success", "Title: " . $article['title']);

                return $this->redirect($this->generateUrl('index_all_articles'));
            }catch (BadResponseException $ex) {
                $form->addError(new FormError('Some fields are wrong'));
            }
        }

        return $this->render(':index:add-article.html.twig', [
            'form' => $form->createView()
        ]);
    }
}


