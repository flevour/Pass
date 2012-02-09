<?php

namespace Pass\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;


class ListCommand extends Command {
    protected function configure()
    {
        $this->setName('all')
             ->setDescription('Lists all passwords available')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    }
}