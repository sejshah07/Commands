<?php

namespace Store\Tools\Console\Command;

use Symfony\Component\Console\Command\Command; // for parent class
use Symfony\Component\Console\Input\InputInterface; // for InputInterface used in execute method
use Symfony\Component\Console\Output\OutputInterface; // for OutputInterface used in execute method
use Symfony\Component\Filesystem\Filesystem;

class Viewpreprocessed extends Command
{
    protected function configure()
    {
        $this->setName('clear:viewpreprocessed')
             ->setDescription('Clear var/view_preprocessed folder!');

        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $fs = new Filesystem();
        try {
            if($fs->exists('var/view_preprocessed')){
                $fs->remove(array('var/view_preprocessed'));
                $output->writeln('Cleared view_preprocessed!');
            }
        else {
             $output->writeln('Can\'t find directory');
        }
        } catch (IOExceptionInterface $e) {
            echo "An error occurred while deleting your directory at ".$e->getPath();
        }
    }
}
