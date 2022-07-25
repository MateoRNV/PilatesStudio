<?php

namespace BMS\Controller\CreateUtente;

use BMS\Helper\Traits\FlashMessageTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class SaveUtente implements RequestHandlerInterface
{
    use FlashMessageTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $serverParams = $request->getServerParams();
        $from = parse_url($serverParams['HTTP_REFERER'], PHP_URL_PATH);
        $toPath = $serverParams['PATH_INFO'];

        $post = $request->getParsedBody();
        $queryParams = $request->getQueryParams();

        if (is_null($post)) {
            $this->flashMessage('Dados incompletos!', 'danger');
            return new Response(302, ['Location' => $from]);
        }

        $id = null;
        if (!empty($queryParams)) {
            $id = filter_var(
                $queryParams['id'],
                FILTER_VALIDATE_INT
            );
        }

        if (strrpos($from, 'edit') !== false) {
            $from = '/amnese';
        }

        $updateUtente = new UpdateUtente();
        $id = $updateUtente->update($from, $post, $id);
        $this->flashMessage('Utente salvo com sucesso!', 'success');

        if ($toPath === '/save') {
            $toPath = $from;
        }

        $teste = '/queixas';
        $location = $toPath . '?id=' . $id;

        return new Response(302, ['Location' => $location]);
    }
}
