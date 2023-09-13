<?php
namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;

class InitDockCommand extends Command
{
    public function execute(Arguments $args, ConsoleIo $io): int
    {
        $out = '';
        $count = 1;
        $status = '';

        $io->out($count++ . ": " . ROOT . " [$status]");

//        exec('cd ../', $out, $status);
//        $io->out($count++ . ": " . var_export($out) . " [$status]");
//
//        exec('ls -al ../', $out, $status);
//        $io->out($count++ . ": " . var_export($out) . " [$status]");
//
        exec(ROOT . '/bin/migrations.sh', $out, $status);
        $io->out($count++ . ": " . var_export($out) . " [$status]");

        return static::CODE_SUCCESS;
    }
}
