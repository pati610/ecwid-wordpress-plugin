<?php

require_once __DIR__ . '/class-ecwid-widget-products-base.php';

class Ecwid_Widget_Latest_Products extends Ecwid_Widget_Products_List_Base {

	public function __construct() {
		$this->_init(
			__('Latest Products', 'ecwid-shopping-cart'),
			__('Displays a list of the most recent products added to the shop.', 'ecwid-shopping-cart')
		);

		parent::__construct();
	}

	protected function _get_products() {
		$api = new Ecwid_Api_V3();
		
		$result = $api->search_products(array(
			'sortBy' => 'ADDED_TIME_DESC',
			'limit' => $this->_instance['number_of_products']
		));
		
		return $result->items;
	}
}