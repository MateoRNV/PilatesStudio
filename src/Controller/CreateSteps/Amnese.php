<?php

namespace BMS\Controller\CreateSteps;

use BMS\Helper\Traits\FindUtenteSpreadsheetTrait;
use BMS\Helper\Traits\RenderHtmlTrait;
use BMS\Infrastructure\Repository\UtenteAmneseRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Amnese implements RequestHandlerInterface
{
    use RenderHtmlTrait;
    use FindUtenteSpreadsheetTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path = 'amnese';
        $data = [];

        $dataFounded = $this->findData($request);

        if (!is_null($dataFounded['spreadsheetId'])) {
            $utenteAmneseRepository = new UtenteAmneseRepository();
            $data = $utenteAmneseRepository->getData($dataFounded['spreadsheetId']);
        }

        $data['id'] = $dataFounded['id'];
        $html = $this->render($path, $data);

        return new Response(200, [], $html);
    }
}
