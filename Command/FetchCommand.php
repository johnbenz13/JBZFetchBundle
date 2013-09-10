<?php

namespace JBZ\FetchBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Use Fetch directly in the terminal
 *
 * @author Jonathan Bensaid <john@bensaidj.com>
 */
class FetchCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('jbz:fetch')
             ->setDescription('Retrieve your emails');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $fetch = $this->getContainer()->get('jbz_fetch');

        $output->writeln("end");
    }
}
