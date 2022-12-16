<?php

class Template
{
    const TEMPLATE_DIR = BASE_DIR . '/app/templates/';

    /**
     * @param string $fileName
     * @param array|null $data
     * @return void
     */
    public function render(string $fileName, array $data = null): void
    {
        ob_start();
        extract($data);
        require_once self::TEMPLATE_DIR.$fileName;
        echo ob_get_clean();
    }
}
