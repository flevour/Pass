<?php

namespace Pass\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Finder\Finder;
use Pass\File;


class ListCommand extends Command {
    protected function configure()
    {
        $this->setName('all')
             ->setDescription('Lists all passwords available')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $finder = new Finder();
        $finder->files()->in('passwords');
        foreach ($finder as $file) {
            $passFile = new File($file);
            $output->writeln(sprintf('%s: %d passwords', $file->getBasename(), $passFile->countPasswords()));
        }
    }
}