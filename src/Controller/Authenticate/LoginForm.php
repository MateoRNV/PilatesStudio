<?php

namespace BMS\Controller\Authenticate;

use BMS\Helper\Traits\RenderHtmlTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class LoginForm implements RequestHandlerInterface
{
    use RenderHtmlTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path = 'index';
        $html = $this->render($path, []);

        return new Response(200, [], $html);
    }
}
