<?php

namespace BMS\Controller\CreateUtente;

use BMS\Helper\CreateUtente\CreateAmnese;
use BMS\Helper\CreateUtente\CreateAparelhos;
use BMS\Helper\CreateUtente\CreateClassesDor;
use BMS\Helper\CreateUtente\CreateDoencas;
use BMS\Helper\CreateUtente\CreateDor;
use BMS\Helper\CreateUtente\CreateQueixas;
use BMS\Helper\CreateUtente\CreateTratamento;

class UpdateUtente
{
    /**
     * @param string $path
     * @param mixed $post
     * @param int|null $id
     * @return int Id
     */
    public function update(string $path, mixed $post, mixed $id): int
    {
        return match ($path) {
            '/amnese' => (new CreateAmnese())->create($post, $id),
            '/queixas' => (new CreateQueixas())->create($post, $id),
            '/doencas' => (new CreateDoencas())->create($post, $id),
            '/amnese-por-aparelhos' => (new CreateAparelhos())->create($post, $id),
            '/tratamentos-medicacao' => (new CreateTratamento())->create($post, $id),
            '/dor' => (new CreateDor())->create($post, $id),
            '/classes-dor' => (new CreateClassesDor())->create($post, $id),
             default => null
        };
    }
}
