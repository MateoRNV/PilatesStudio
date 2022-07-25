<?php

namespace BMS\Controller\CreateUtente;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AddNewUtente implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $post = $request->getParsedBody();

        if (is_null($post)) {
            return new Response(302, ['Location' => '/amnese']);
        }
    }
}