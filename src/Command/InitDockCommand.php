<?php
namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;

class InitDockCommand extends Command
{
    protected function buildOptionParser(ConsoleOptionParser $parser): ConsoleOptionParser
    {
        $parser
            ->addOption('up', [
                'help' => 'build and start the dock',
                'short' => 'u',
                'boolean' => true,
            ])
            ->addOption('down', [
                'help' => 'take the dock down',
                'short' => 'd',
                'boolean' => true,
            ]);

        return $parser;
    }

    public function execute(Arguments $args, ConsoleIo $io): int
    {
        $out = '';
        $count = 1;
        $status = '';



//        $io->out($count++ . ": " . ROOT . " [$status]");

//        exec('ls -al', $out, $status);
//        $io->out($count++ . ": " . var_export($out, true) . " [$status]\n=====================\n\n");
//
//        exec('cd ../', $out, $status);
//        $io->out($count++ . ": " . var_export($out, true) . " [$status]\n=====================\n\n");
//
//        exec('ls -al', $out, $status);
//        $io->out($count++ . ": " . var_export($out, true) . " [$status]\n=====================\n\n");
//
        if ($args->getOption('up')) {
            $this->startDocker($io, $count);
        }
        elseif ($args->getOption('down')) {
            $this->takeDockerDown($io, $count);
        }
        else {
            $io->out('No option chosen. Specify "--up" or "--down".');
        }
//        exec(ROOT . '/bin/migrations.sh', $out, $status);
//        $this->out($io, $count, $out, $status);

        return static::CODE_SUCCESS;
    }

    /**
     * @param ConsoleIo $io
     * @param int $count
     * @param mixed $out
     * @param string $status
     * @return int|null
     */
    private function out(ConsoleIo $io, int $count, $out, string $status): ?int
    {
        return $io->out(
            'EXEC #'
            . $count++ . "\n*************************\n "
            . var_export($out, true)
            . " [$status]\n=====================\n\n");
    }

    private function startDocker(ConsoleIo $io, int $count)
    {
        exec('docker compose up --build -d', $out, $status);
        $count = $this->out($io, $count, $out, $status);

        $io->out('Pausing for 5 seconds...');
        sleep(5);
        $io->out("\n");

        exec(ROOT . '/bin/db_setup.sh', $out, $status);
        $count = $this->out($io, $count, $out, $status);

        $io->out('Pausing for 5 seconds...');
        sleep(5);
        $io->out("\n");

        exec(ROOT . '/bin/migrations.sh', $out, $status);
        $count = $this->out($io, $count, $out, $status);
    }

    private function takeDockerDown(ConsoleIo $io, int $count)
    {
        exec('docker compose down', $out, $status);
        $this->out($io, $count, $out, $status);
    }
}
