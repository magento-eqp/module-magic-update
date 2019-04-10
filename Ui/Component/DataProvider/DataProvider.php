<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);


namespace Unicorn\MagicUpdate\Ui\Component\DataProvider;


use Unicorn\MagicUpdate\Model\ModuleList;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    private $moduleList;
    /**
     * DataProvider constructor.
     * @param $name
     * @param $primaryFieldName
     * @param $requestFieldName
     * @param array $meta
     * @param array $data
     * @param ModuleList $moduleList
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        ModuleList $moduleList,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->moduleList = $moduleList;
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        return $this->moduleList->getModuleList();
    }
}
