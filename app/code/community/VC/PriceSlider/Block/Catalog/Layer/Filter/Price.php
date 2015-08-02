<?php
include 'app/code/core/Mage/Catalog/Block/Layer/Filter/Price.php';

class VC_PriceSlider_Block_Catalog_Layer_Filter_Price extends Mage_Catalog_Block_Layer_Filter_Price
{
    /**
     * Initialize Price filter module
     *
     */
    public function __construct()
    {
        parent::__construct();
		$this->setTemplate('vc_priceslider/catalog/layer/price/filter.phtml');
		//$this->isPriceBlock(true);
    }
	
	public function getFilterModelName() {
		return $this->_filterModelName;
	}
	
}
