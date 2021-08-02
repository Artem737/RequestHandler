<?php

namespace RequestHendler\Handlers;

use LeadGenerator\Lead;

/**
 * Interface Handler
 */
abstract class Handler
{
    /**
     * @param Lead $lead
     * @return mixed
     */
    protected abstract function executeLead(Lead $lead);

    /**
     * @param Lead $lead
     */
    public function execute(Lead $lead)
    {
        echo 'Start handle ' . $lead->id . ' ...' . PHP_EOL;
        $this->executeLead($lead);
        echo 'End handle ' . $lead->id . PHP_EOL;
    }
}
