<?php

use LeadGenerator\Lead;
use RequestHendler\Handlers\SleepHandler;
use RequestHendler\Writers\Writer;

/**
 * @param Writer $writer
 * @param Lead $lead
 * @return Lead
 */
function executeLead(Writer $writer, Lead $lead) :Lead
{
    $handler = new SleepHandler($writer);
    $handler->execute($lead);
    return $lead;
}