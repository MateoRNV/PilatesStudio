<?php

namespace BMS\Helper\Traits;

trait RenderHtmlTrait
{
    public function render(string $path, array $data): string
    {
        extract($data);

        ob_start();
        require __DIR__ . '/../../../view/' . $path . '.php';

        return ob_get_clean();
    }
}