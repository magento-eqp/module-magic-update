<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Unicorn\MagicUpdate\Console\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use Unicorn\MagicUpdate\Model\ModuleList;

class MagicListCommand extends Command
{
    /**
     * @var ModuleList
     */
    private $moduleList;

    /**
     * MagicUpdateCommand constructor.
     * @param ModuleList $moduleList
     */
    public function __construct(
        ModuleList $moduleList
    )
    {
        $this->moduleList = $moduleList;
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName('unicorn:list')
            ->setDescription('List module status');
        parent::configure();
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dependencies = $this->moduleList->getModuleStatusList();
        $output->write(json_encode($dependencies));

        /**
       foreach ($dependencies as $dependency){
           $output->writeln($dependency['name']);
       }
         */
    }
}
