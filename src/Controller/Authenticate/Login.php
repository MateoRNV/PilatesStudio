<?php

namespace BMS\Controller\Authenticate;

use BMS\Helper\Traits\FlashMessageTrait;
use BMS\Model\User;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Login implements RequestHandlerInterface
{
    use FlashMessageTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $post = $request->getParsedBody();
        $user = new User();

        $email = filter_var(
            $post['email'],
            FILTER_VALIDATE_EMAIL
        );
        $user_email = $user->email();

        if (is_null($email) || $email !== $user_email) {
            $this->flashMessage('E-mail ou senha inválidos', 'danger');
            return new Response(302, ['Location' => '/login']);
        }

        $password = filter_var(
            $post['password'],
            FILTER_SANITIZE_STRING
        );
        $user_password = $user->password();

        if (is_null($password) || $password !== $user_password) {
            $this->flashMessage('E-mail ou senha inválidos', 'danger');
            return new Response(302, ['Location' => '/login']);
        }

        $_SESSION['logged'] = $user_email;

        return new Response(302, ['Location' => '/']);
    }
}