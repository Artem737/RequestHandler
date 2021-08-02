<?php

namespace RequestHendler\Handlers;

use LeadGenerator\Lead;
use RequestHendler\Writers\Writer;

/**
 * Class SleepHandler
 */
class SleepHandler extends Handler
{
    /**
     * @var Writer
     */
    private $writer;

    /**
     * SleepHandler constructor.
     * @param Writer $writer
     */
    public function __construct(Writer $writer)
    {
        $this->writer = $writer;
    }

    /**
     * @param Lead $lead
     */
    protected function executeLead(Lead $lead)
    {
        sleep(2);
        $this->writer->write(implode(' | ', [$lead->id, $lead->categoryName, date('Y-m-d H:i:s')]));
    }
}