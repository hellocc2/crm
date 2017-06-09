<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
class PtsWidgetTodaydeals1 extends PtsWidgetPageBuilder {

	public $name = 'todaydeals1';
	public $group = 'opencart';
	
	public static function getWidgetInfo(){
		return array('label' => ('Today Deals'), 'explain' => 'Alow list products today deals on layout home 1', 'group' => 'opencart');
	}

	public function renderForm( $args, $data ){

		$helper = $this->getFormHelper();

		$sortby = array(
			array('value' => 'name ASC',      'name' => $this->l('Name (A - Z)')),
			array('value' => 'name DESC',     'name' => $this->l('Name (Z - A)')),

			array('value' => 'date_add ASC',  'name' => $this->l('Date (Low > High)')),
			array('value' => 'date_add DESC', 'name' => $this->l('Date (High > Low)')),
			
			array('value' => 'price ASC',     'name' => $this->l('Price (Low > High)')),
			array('value' => 'price DESC',    'name' => $this->l('Price (High > Low)')),

			array('value' => 'rating DESC',   'name' => $this->l('Rating (Highest)')),
			array('value' => 'rating ASC',    'name' => $this->l('Rating (Lowest)')),

			array('value' => 'quantity ASC',  'name' => $this->l('Quantity (Lowest)')),
			array('value' => 'quantity DESC', 'name' => $this->l('Quantity (Highest)')),
		);

		// list categories
		$this->load->model('catalog/category');
		$categories = $this->model_catalog_category->getCategories();

		
		$this->fields_form[1]['form'] = array(
			'legend' => array(
				'title' => $this->l('Widget Config'),
			),
			'input' => array(

				// list links
            	array(
                    'type'  => 'links-category',
                    'label' => $this->l('Links Category'),
                    'name'  => 'links',
                    'default'=> array(),
                    'desc'	=> "Add links category",
                ),


				array(
					'type'  => 'date',
					'label' => $this->l('Start Date'),
					'name'  => 'start',
					'default'=> '',
				),
				array(
					'type'  => 'date',
					'label' => $this->l('End Date'),
					'name'  => 'end',
					'default'=> '',
				),
				array(
					'type'  => 'categories',
					'label' => $this->l('Categories'),
					'name'  => 'categories',
					'options' => array('query'=>$categories),
					'default'=> "",
					'description' => 'Allow choose category for show list deal-products.',
				),
				array(
					'type'  => 'sortby',
					'label' => $this->l('Sort By'),
					'name'  => 'sortby',
					'options' => array('query'=>$sortby),
					'default'=> 'name',
				),

				array(
					'type'  => 'text',
					'label' => $this->l('Limit'),
					'name'  => 'limit',
					'default'=> 8,
				),
				array(
					'type'  => 'text',
					'label' => $this->l('Items'),
					'name'  => 'items',
					'default'=> 4,
					'description' => 'input number show items per page.',
				),
				array(
					'type'  => 'text',
					'label' => $this->l('Columns'),
					'name'  => 'cols',
					'default'=> 2,
				),
				array(
					'type'  => 'text',
					'label' => $this->l('width'),
					'name'  => 'width',
					'default'=> 200,
				),
				array(
					'type'  => 'text',
					'label' => $this->l('height'),
					'name'  => 'height',
					'default'=> 200,
				),

				// banner
                array(
                    'type'  => 'image',
                    'label' => $this->l('Banner Image'),
                    'name'  => 'banner_img',
                    'default'=> '',
                    'desc'	=> 'Put image folder in the image folder ROOT_SHOP_DIR/image/'
                ),
                 // banner prefix class
                array(
                    'type'  => 'text',
                    'label' => $this->l('Image Prefix Class'),
                    'name'    => 'img_class',
                    'default' => 'right',
                    'desc'	  => 'Alow change banner LTR or RTL'
                ),
                array(
                    'type'  => 'text',
                    'label' => $this->l('Banner width'),
                    'name'  => 'b_width',
                    'default'=> '400',
                ),
                array(
                    'type'  => 'text',
                    'label' => $this->l('Banner height'),
                    'name'  => 'b_height',
                    'default'=> '400',
                ),

			),
			'submit' => array(
				'title' => $this->l('Save'),
				'class' => 'button'
			)
		);
		$default_lang = (int)$this->config->get('config_language_id');
		
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues( $data  ),
			'id_language' => $default_lang
		);
		return $helper->generateForm( $this->fields_form );
	}

	public function renderContent( $args, $setting ){
		$this->language->load('module/themecontrol');

		$this->load->model('pavdeals/product');
		$this->load->model('catalog/product');

		$this->load->model('catalog/category');
		
		$this->load->model('tool/image');

		// add script + style 
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/stylesheet/pavdeals.css')) {
			$this->document->addStyle('catalog/view/theme/'.$this->config->get('config_template').'/stylesheet/pavdeals.css');
		} else {
			$this->document->addStyle('catalog/view/theme/default/stylesheet/pavdeals.css');
		}
		$this->document->addScript('catalog/view/javascript/pavdeals/countdown.js');


		$languageID = $this->config->get('config_language_id');
		$setting['heading_title'] = isset($setting['widget_title_'.$languageID])?$setting['widget_title_'.$languageID]:'';
		
		// SETTINGS
		$t  = array(
			'start'      => '2015-08-01',
			'end'        => '2015-08-01',
			'limit'      => 8,
			'items'      => 4,
			'cols'       => 2,
			'sortby'     => 'name',
			'width'      => 200,
			'height'     => 200,
			'categories' => array(),
			// setting banner
			'img_class'  => '',
			'b_width'    => 400,
			'b_height'   => 400,
		);
		$setting = array_merge( $t, $setting );

		$sortby = isset($setting['sortby'])?$setting['sortby']:'p.date_added desc';
		$tmp = explode(" ",$sortby);

		$categories = isset($setting['categories'])?$setting['categories']:'0';
		$start_date = isset($setting['start'])?date("Y-m-d", strtotime($setting['start'])):'';
		$end_date = isset($setting['end'])?date("Y-m-d", strtotime($setting['end'])):'';
	

		$data = array(
			'sort'              => $tmp[0],
			'order'             => $tmp[1],
			'start_date'        => $start_date,
			'to_date'           => $end_date,
			'filter_categories' => $categories,
			'start'             => 0,
	    	'limit'             => $setting['limit'],
		);

		$results = $this->model_pavdeals_product->getProductSpecials($data);

		$products = array();
		$i = 0;

		// Product first
		$s = array('width' => '354', 'height' => '382');

		foreach ($results as $result) { $i++;
			if($i == 1) {
				$setting['first_product'] = $this->getcountdown($result, $s);
			} else {
				$products[] = $this->getcountdown($result, $setting);
			}
		}

		// DATA
		// get Links
		$categories = array();
		foreach ($setting['links'] as $link) {

			$check = $this->checkExistCategory($link);

			if(!empty($check)) {
				$category = $this->model_catalog_category->getCategory($link);
				$categories[] = array(
					'category_id' => $category['category_id'],
					'name' => $category['name'],
					'href' => $this->url->link('product/category', 'path=' . $category['category_id']),
				);
			}
		}
		$setting['categories'] = $categories;
		// Banner
		$placeholder = $this->model_tool_image->resize('no_image.png', 279, 406);
		$banner = $this->model_tool_image->resize($setting['banner_img'], $setting['b_width'], $setting['b_height']);

		if ($setting['banner_img'] && file_exists(DIR_IMAGE . $setting['banner_img'])) {
			$image = $banner;
		} else {
			$image = $placeholder;
		}

		$setting['banner'] = $image;


		// get product by ID
		if( !empty($products)) {
			$setting['products'] = $products;
		} else {
			$setting['first_product'] = array();
			$setting['products'] = array();
		}
		

		$output = array('type'=>'products','data' => $setting );
		return $output;
	} 

	public function checkExistCategory($category_id){
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "category WHERE category_id = '" . (int)$category_id . "'" );
		return $query->row;
	}

	// other function 
	public function getcountdown($product = null, $setting = array()){

		$this->load->model('pavdeals/product');
		$this->load->model('catalog/product');

		$this->load->model('catalog/category');
		
		$this->load->model('tool/image');

		if(is_numeric($product)){
			$product = $this->model_catalog_product->getProduct((int)$product);
		}
		$product_info = $this->model_pavdeals_product->getDeal($product);
		if(!$product_info)
			 return false;


		$save_price = (float)$product_info['price'] - (float)$product_info['special'];
		$discount = round(($save_price/$product_info['price'])*100);
		$save_price = $this->currency->format($this->tax->calculate($save_price, $product_info['tax_class_id'], $this->config->get('config_tax')));
	
		if ($product_info['image']) {
			$image = $this->model_tool_image->resize($product_info['image'], $setting['width'], $setting['height']);
		} else {
			$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
		}
					
		if ($product_info['image']) {
			$image = $this->model_tool_image->resize($product_info['image'], $setting['width'], $setting['height']);
		} else {
			$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
		}

		if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
			$price = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')));
		} else {
			$price = false;
		}

		if ((float)$product_info['special']) {
			$special = $this->currency->format($this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')));
		} else {
			$special = false;
		}

		if ($this->config->get('config_tax')) {
			$tax = $this->currency->format((float)$product_info['special'] ? $product_info['special'] : $product_info['price']);
		} else {
			$tax = false;
		}

		if ($this->config->get('config_review_status')) {
			$rating = $product_info['rating'];
		} else {
			$rating = false;
		}

		$date_end_string = isset($product_info['date_end'])?$product_info['date_end']:"";

		$product = array(
			// default of opencart ( don't alow edit change )
			'product_id'  => $product_info['product_id'],
			'thumb'       => $image,
			'name'        => $product_info['name'],
			'description' => utf8_substr(strip_tags(html_entity_decode($product_info['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('config_product_description_length')) . '..',
			'price'       => $price,
			'special'     => $special,
			'tax'         => $tax,
			'rating'      => $rating,
			'href'        => $this->url->link('product/product', 'product_id=' . $product_info['product_id']),
			// customize
			'discount' 	 => "-".$discount."%",
			'save_price' => $save_price,
			'date_end_string' => $date_end_string,
			'date_end'	 => explode("-", $date_end_string),

		);

		return $product;
	}


}
?>