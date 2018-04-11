<?php

namespace App\Controller\Api;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Logout\LogoutHandlerInterface;

class LogoutController implements LogoutHandlerInterface
{

    /**
     * This method is called by the LogoutListener when a user has requested
     * to be logged out. Usually, you would unset session variables, or remove
     * cookies, etc.
     */
    public function logout(Request $request, Response $response, TokenInterface $token)
    {
        dump($request);exit;
        // TODO: Implement logout() method.
    }
}