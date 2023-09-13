<?php
declare(strict_types=1);

namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;

class EditYamlCommand extends Command
{
    protected function buildOptionParser(ConsoleOptionParser $parser): ConsoleOptionParser
    {
        $parser
            ->addArgument('spn', [
                'help' => 'Short project name',
            ])
            ->addOption('dbport', [
                'short' => 'd',
                'help' => 'Database port',
                'default' => '9306',
            ])
            ->addOption('webport', [
                'short' => 'w',
                'help' => 'Web port',
                'default' => '8010',
            ]);

        return $parser;
    }

    public function execute(Arguments $args, ConsoleIo $io): int
    {
        $spn = $args->getArgument('spn');
        if (!$spn) {
            $io->out('Must provide short project name');

            return static::CODE_ERROR;
        }

        $curr_dbport = '9306';
        $dbport = $args->getOption('dbport');
        $curr_webport = '8099';
        $webport = $args->getOption('webport');
        $curr_dbservice = 'mysql8';
        $dbservice = $spn . '_' . $curr_dbservice;
        $curr_webservice = 'cakephp';
        $webservice = $spn . '_' . $curr_webservice;
        $filename = 'docker-compose-test.yaml';
        $file = file_get_contents(ROOT . '/' . $filename);

        if (!$file) {
            $io->out('No file found');
        } else {
            $file = str_replace($curr_dbport, $dbport, $file);
            $file = str_replace($curr_webport, $webport, $file);
            $file = str_replace($curr_dbservice, $dbservice, $file);
            $file = str_replace($curr_webservice, $webservice, $file);
            file_put_contents($filename, $file);
            $io->out('File amended');
        }

        return static::CODE_SUCCESS;
    }

    private function replaceText($file, $search, $replace)
    {
        return str_replace();
    }
}
