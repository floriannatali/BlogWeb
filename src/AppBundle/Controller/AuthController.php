<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\LoginType;
use AppBundle\Model\Login;
use AppBundle\Security\AuthUser;
use AppBundle\Security\User;
use AppBundle\Token\JwtToken;
use Guzzle\Http\Exception\BadResponseException;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Security\Core\Authentication\Token\AnonymousToken;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

/**
 * Class AuthController
 * @package AppBundle\Controller
 *
 * @Route("/auth", name="auth")
 */
class AuthController extends Controller
{
    /**
     * @Route("/login",name="auth_login")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * todo a factoriser!!
     *
     */
    public function loginAction(Request $request)
    {
        $login = new Login();
        $form = $this->createForm(new LoginType(), $login);
        $form->add('submit', SubmitType::class, array('label' => 'Submit'));

        $form->handleRequest($request);
        if($form->isValid()) {

            $client = $this->get('app_bundle.guzzle.auth_api_client');
            $jwtRequest = $client->get( "auth/get-token/".$login->getLogin().'/'.md5($login->getPassword()));

            try{
                $jwtRequest->send();
                $response = $jwtRequest->getResponse();
                $authJwttoken = $response->json()['token'];
                $tokenParsed = $this->get('app_bundle.jwt_parser')->parse($authJwttoken);

                $user = new User();
                $user->setJwtToken($authJwttoken);
                switch($tokenParsed->getClaim('role')){
                    case 'r':
                        $user->setRoles(["ROLE_READER"]);
                        break;
                    case 'w':
                        $user->setRoles(["ROLE_WRITER"]);
                        break;
                }

                $user->setSalt('???');
                $user->setFirstname($tokenParsed->getClaim('firstname'));
                $user->setLastname($tokenParsed->getClaim('lastname'));
                $user->setEmail($tokenParsed->getClaim('email'));
                $user->setDateCreation(\DateTime::createFromFormat('Y-m-d', $tokenParsed->getClaim('date_creation')));

                $token = new UsernamePasswordToken($user, '?????????', 'jwt_user_provider', $user->getRoles());
                $this->get('security.token_storage')->setToken($token);

                $event = new InteractiveLoginEvent($request, $this->get('security.token_storage')->getToken());
                $this->get("event_dispatcher")->dispatch("security.interactive_login", $event);

                return $this->redirect($this->generateUrl("index_accueil"));
            }catch (BadResponseException $ex) {
                $return = $ex->getResponse()->json();
                $form->addError(new FormError($return['message']));
            }
        }

        return $this->render(':auth:login.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     *
     * @Route("/logout",name="auth_logout")
     */
    public function logoutAction(){
        $this->get('security.token_storage')->setToken(null);
        return $this->redirect($this->generateUrl("auth_login"));
    }
}
