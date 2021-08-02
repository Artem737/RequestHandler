<?php

namespace RequestHendler\Writers;

/**
 * Interface Writer
 * @package RequestHendler\Writers
 */
interface Writer
{
    public function write(string $data);
}