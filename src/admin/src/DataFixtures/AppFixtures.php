<?php
namespace App\DataFixtures;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Entity\Admin\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Yokai\SecurityTokenBundle\Manager\TokenManagerInterface;

class AppFixtures extends Fixture
{
    /** @var TokenManagerInterface */
    private $tokenManager;
    /** @var UserPasswordEncoderInterface */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder, TokenManagerInterface $tokenManager)
    {
        $this->encoder = $encoder;
        $this->tokenManager = $tokenManager;
    }

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername("admin");
        $user->setEmail("admin@email.com");
        $user->setRoles("ROLE_ADMIN");
        $user->setRoles("ROLE_USER_API");
        $pass = $this->encoder->encodePassword($user, "admin");
        $user->setPassword($pass);
        $manager->persist($user);
        $manager->flush();

        $token = $this->tokenManager->create('reset_password', $user);
        $user->setApiKey($token->getValue());

        $manager->flush();

        $user = new User();
        $user->setUsername("user");
        $user->setEmail("user@email.com");
        $user->setRoles("ROLE_USER");
        $user->setRoles("ROLE_USER_API");
        $pass = $this->encoder->encodePassword($user, "user");
        $user->setPassword($pass);
        $manager->persist($user);
        $manager->flush();
        $token = $this->tokenManager->create('reset_password', $user);
        $user->setApiKey($token->getValue());

        $manager->flush();
    }
}