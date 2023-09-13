<?php
declare(strict_types=1);

namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;

class InitDockCommand extends Command
{
    public function execute(Arguments $args, ConsoleIo $io): int
    {
        $out = '';
        'EXEC #' . $count = 1;
        $status = '';

//        $io->out('EXEC #' . $count++ . "\n*************************\n " . ROOT . " [$status]");

//        exec('ls -al', $out, $status);
//        $count = $this->output($io, $count, $out, $status);
//
//        exec('cd ../', $out, $status);
//        $count = $this->output($io, $count, $out, $status);
//
//        exec('ls -al', $out, $status);
//        $count = $this->output($io, $count, $out, $status);

        exec('bin/migrations.sh', $out, $status);
        $count = $this->output($io, $count, $out, $status);

        return static::CODE_SUCCESS;
    }

    /**
     * @param \Cake\Console\ConsoleIo $io
     * @param int $count
     * @param mixed $out
     * @param mixed $status
     * @return int
     */
    private function output(ConsoleIo $io, int $count, $out, $status): int
    {
        $io->out(
            'EXEC #'
            . $count++ . "\n*************************\n "
            . var_export($out, true)
            . " [$status]\n=====================\n\n");

        return $count;
    }
}
