<?php
declare(strict_types=1);

namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;

class HelloCommand extends Command
{
    protected function buildOptionParser(ConsoleOptionParser $parser): ConsoleOptionParser
    {
        $parser
            ->addArgument('name', [
                'help' => 'What is your name',
            ])
            ->addArgument('birthdate', [
                'help' => 'What is your birthdate',
            ])
            ->addOption('yell', [
                'help' => 'Shout the name',
                'boolean' => true,
            ])
            ->addOption('word', [
                'short' => 'w',
                'help' => 'display the word',
                'default' => 'default',
            ]);

        return $parser;
    }

    public function execute(Arguments $args, ConsoleIo $io): int
    {
        $name = $args->getArgument('name');
        if ($args->getOption('yell')) {
            $name = mb_strtoupper($name);
        }
        $io->out("Hello {$name}.");
        $bd = $args->getArgument('birthdate');
        if ($bd) {
            $io->out("Your birthday is {$bd}.");
        }
        $w = $args->getOption('word');
        $io->out("Option word is {$w}");

        return static::CODE_SUCCESS;
    }
}
