<?php

namespace RequestHendler\Writers;

/**
 * Class FileWriter
 */
class FileWriter implements Writer
{
    /**
     * @var resource
     */
    private $filePath;

    /**
     * FileWriter constructor.
     * @param string $fileName
     */
    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * @param string $data
     */
    public function write(string $data)
    {
        file_put_contents($this->filePath, $data . PHP_EOL, FILE_APPEND);
    }
}