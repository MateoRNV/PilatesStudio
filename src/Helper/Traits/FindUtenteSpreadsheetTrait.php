<?php

namespace BMS\Helper\Traits;

use BMS\Infrastructure\Repository\UtenteRepository;
use Psr\Http\Message\ServerRequestInterface;

trait FindUtenteSpreadsheetTrait
{
    /**
     * @param ServerRequestInterface $request
     * @return array|null Spreadsheet ID
     */
    private function findData(ServerRequestInterface $request): array|null
    {
        $queryParams = $request->getQueryParams();

        if (empty($queryParams)) {
            return null;
        }

        $id = filter_var(
            $queryParams['id'],
            FILTER_VALIDATE_INT
        );

        $utenteRepository = new UtenteRepository();

        return [
            'spreadsheetId' => $utenteRepository->findUtente($id),
            'id' => $id
        ];
    }
}
