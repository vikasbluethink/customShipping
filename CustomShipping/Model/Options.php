<?php

namespace PWC\CustomShipping\Model;

use Magento\Eav\Model\ResourceModel\Entity\Attribute\OptionFactory;

use Magento\Framework\DB\Ddl\Table;

/**

* Custom Attribute Renderer

*/

class Options extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource

{

    /**

    * @var OptionFactory

    */

    protected $optionFactory;

    /**

    * @param OptionFactory $optionFactory

    */

    /**

    * Get all options

    *

    * @return array

    */

    public function getAllOptions()

    {

        /* your Attribute options list*/

        $this->_options=[ ['label'=>'Select Options', 'value'=>''],

        ['label'=>'Type1', 'value'=>'type1'],

        ['label'=>'Type2', 'value'=>'type2']

        ];

        return $this->_options;

    }

    

}

