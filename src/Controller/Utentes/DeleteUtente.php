<?php

namespace BMS\Controller\Utentes;

use BMS\Helper\Traits\FlashMessageTrait;
use BMS\Infrastructure\Repository\UtenteRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DeleteUtente implements RequestHandlerInterface
{
    use FlashMessageTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $params = $request->getQueryParams();

        $id = filter_var(
            $params['id'],
            FILTER_VALIDATE_INT
        );

        $utenteRepository = new UtenteRepository();
        $spreadsheetId = $utenteRepository->findUtente($id);
        $utenteRepository->delete($id, $spreadsheetId);

        if (is_null($id) || empty($spreadsheetId)) {
            $this->flashMessage('Utente não encontrado', 'danger');
            return new Response(302, ['Location' => '/']);
        }

        return new Response(204, ['Location' => '/']);
    }
}