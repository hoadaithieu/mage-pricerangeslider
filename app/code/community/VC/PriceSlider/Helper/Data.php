<?php
class VC_PriceSlider_Helper_Data extends Mage_Core_Helper_Abstract {
	public function getPriceRange() {
		$priceAr = explode('-', Mage::app()->getRequest()->getParam('price'));
		$rs = array(0,0);
		if (is_array($priceAr) && count($priceAr) > 0) {
			if (isset($priceAr[0]) && $priceAr[0] > 0) {
				$rs[0] = $priceAr[0];
			}
			if (isset($priceAr[1]) && $priceAr[1] > 0) {
				$rs[1] = $priceAr[1];
			}
		}
		return $rs;
	}
	
	public function getFilterUrl() {
		return $this->_getUrl('vc_priceslider/index/filter');
	}
	
	public function getCleanUrl() {
		return $this->getFilterUrl();
	}
	
	
	public function getItemQuery($ar) {
		$rs = array();
		if ($query = Mage::registry('vc_query')) {
			$ar += $query;
			
		}
		
		if (is_array($ar) && count($ar) > 0) {
			foreach ($ar as $k => $v) {
				$rs[] = $k.'='.$v;
			}
		}
		return implode('&', $rs);
	}
	
	public function getDeleteQuery($ar, $removeKey = '') {
		$rs = array();
		if ($query = Mage::registry('vc_query')) {
			$ar += $query;
		}
		
		if (isset($ar[$removeKey])) {
			unset($ar[$removeKey]);
		}
		
		if (is_array($ar) && count($ar) > 0) {
			foreach ($ar as $k => $v) {
				$rs[] = $k.'='.$v;
			}
		}
		return implode('&', $rs);
	}
	
	public function getContainer() {
		$container = '';
		$layout = !Mage::registry('vc_layout') ? Mage::app()->getLayout()->getBlock('root')->getTemplate() : Mage::registry('vc_layout');
		if (strpos($layout, '3columns')) {
			$container =  Mage::getStoreConfig('vc_priceslider/general/container_3columns');
		} else if (strpos($layout, '2columns-left')) {
			$container =  Mage::getStoreConfig('vc_priceslider/general/container_2columns_left');
		}
	
		return $container;
	}
	
	public function getItemUrl($ar) {
		return Mage::registry('vc_category_url').'?'.(is_string($ar) ? $ar: $this->getItemQuery($ar));
	}
	
	public function getClearedUrl() {
		return Mage::registry('vc_category_url');
	}
	
	public function getMinPriceRange() {
		return Mage::getStoreConfig('vc_priceslider/general/min_price_range');
	}

	public function getMaxPriceRange() {
		return Mage::getStoreConfig('vc_priceslider/general/max_price_range');
	}

	public function getCurrencyFormat() {
		return Mage::getStoreConfig('vc_priceslider/general/currency_format');
	}

}