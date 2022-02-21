<?php
namespace PWC\CustomShipping\Setup;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Catalog\Model\ResourceModel\Product\Action;

class InstallData implements InstallDataInterface
{
	 /** @var EavSetupFactory  */
	 private $eavSetupFactory;

	 /** @var CollectionFactory  */
	 private $collectionFactory;
 
	 /** @var Action  */
	 private $action;

	public function __construct(
        EavSetupFactory $eavSetupFactory,
        CollectionFactory $collectionFactory,
        Action $action
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->collectionFactory = $collectionFactory;
        $this->action = $action;
    }
	
	public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		$eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
		$eavSetup->addAttribute(
			\Magento\Catalog\Model\Product::ENTITY,
			'product_shipping_type',
			[
				'type' => 'text',
				'backend' => '',
				'frontend' => '',
				'label' => 'Product Shipping Type',
				'input' => 'select',
				'class' => '',
				'source' => 'PWC\CustomShipping\Model\Options',
				'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
				'visible' => true,
				'required' => false,
				'user_defined' => false,
				'default' => null,
				'searchable' => false,
				'filterable' => false,
				'comparable' => false,
				'visible_on_front' => false,
				'used_in_product_listing' => true,
				'unique' => false,
				'apply_to' => ''
			]
		);
		//set default value for the new custom attribute
        $productIds = $this->collectionFactory->create()->getAllIds();
        $this->action->updateAttributes($productIds, ['product_shipping_type' => null], 0);
	}
}