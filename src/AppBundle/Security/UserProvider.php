<?php
/**
 * Created by PhpStorm.
 * User: florian
 * Date: 03/03/16
 * Time: 18:05
 */

namespace AppBundle\Security;

use Lcobucci\JWT\Parser;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class UserProvider implements UserProviderInterface
{
    /**
     * @var Parser
     */
    protected $parser;

    public function __construct( Parser $parser )
    {
        $this->parser = $parser;
    }

    public function loadUserByUsername($jwtToken)
    {
        $tokenParsed = $this->parser->parse($jwtToken);

        //todo check date exp etc.
        if (true) {
            $user = new User();
            $user->setJwtToken($jwtToken);
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

            return $user;
        }

        throw new UsernameNotFoundException(
            sprintf('Username "%s" does not exist.', $jwtToken)
        );
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class)
    {
        return $class === 'AppBundle\Security\User\WebserviceUser';
    }
}