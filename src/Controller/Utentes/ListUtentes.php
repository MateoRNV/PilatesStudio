<?php

namespace BMS\Controller\Utentes;

use BMS\Helper\Traits\RenderHtmlTrait;
use BMS\Infrastructure\Repository\UtenteRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ListUtentes implements RequestHandlerInterface
{
    use RenderHtmlTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $utentesRepository = new UtenteRepository();
        $utentes = $utentesRepository->utentes();

        $data = [
            'utentes' => $utentes
        ];
        $html = $this->render('utentes', $data);

        return new Response(200, [], $html);
    }
}