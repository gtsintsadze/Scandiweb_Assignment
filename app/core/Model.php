<?php

class Model
{
    private array $data;

    /**
     * @param string $key
     * @param $value
     * @return void
     */
    public function setData(string $key, $value): void
    {
        $this->data[$key] = $value;
    }

    /**
     * @param string $key
     * @return void
     */
    public function unsetData(string $key): void
    {
        unset($this->data[$key]);
    }

    /**
     * @param $key
     * @return mixed
     */
    public function getData($key = null): mixed
    {
        if ($key === null) {
            return $this->data;
        }
        return $this->data[$key];
    }
}