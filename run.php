<?php

require_once 'vendor/autoload.php';

use LeadGenerator\Lead;
use LeadGenerator\Generator;
use RequestHendler\Writers\FileWriter;
use Amp\Parallel\Worker;
use Amp\Promise;

const POOL_SIZE = 100; //Сколько одновременно процессов обработки будет запущено
const LEADS_COUNT = 10000; //Число заявок, которые будут обработаны

//Очищаем файл и инициализируем объект записывающий данные в файл
$filePath = __DIR__ . '/output.txt';
file_put_contents($filePath, '');
$writer = new FileWriter($filePath);

//Создаём объект генератора, устанавливаем число процессов для бибилиотеки amp
// и запускаем процессы обработки по мере поступления заявок
$generator = new Generator();
Amp\Parallel\Worker\pool(new Worker\DefaultPool(POOL_SIZE));
$promises = [];
$generator->generateLeads(LEADS_COUNT, function (Lead $lead) use (&$promises, $writer) {

    $promises[$lead->id] = Worker\enqueueCallable('executeLead', $writer, $lead);

});

//Дожидаемся выполнения всех процессов.
$responses = Promise\wait(Promise\all($promises));
echo 'Leads executed' . PHP_EOL;