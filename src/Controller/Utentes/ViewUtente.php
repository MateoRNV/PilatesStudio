<?php

namespace BMS\Controller\Utentes;

use BMS\Helper\Traits\FlashMessageTrait;
use BMS\Helper\Traits\RenderHtmlTrait;
use BMS\Infrastructure\Repository\UtenteAmneseRepository;
use BMS\Infrastructure\Repository\UtenteRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ViewUtente implements RequestHandlerInterface
{
    use FlashMessageTrait;
    use RenderHtmlTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $params = $request->getQueryParams();

        $id = filter_var(
            $params['id'],
            FILTER_VALIDATE_INT
        );

        $utenteRepository = new UtenteRepository();
        $spreadsheetId = $utenteRepository->findUtente($id);

        if (is_null($id) || empty($spreadsheetId)) {
            $this->flashMessage('Utente não encontrado', 'danger');
            return new Response(302, ['Location' => '/']);
        }

        $utenteAmneseRepository = new UtenteAmneseRepository();
        $amneseData = $utenteAmneseRepository->getData($spreadsheetId);

        $path = 'amnese';
        $html = $this->render($path, $amneseData);

        return new Response(200, [], $html);
    }
}