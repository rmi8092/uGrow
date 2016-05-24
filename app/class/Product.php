<?php

	/**
	* 
	*/
	class Product
	{
		$_connexion;

		function __construct()
		{
			$this->_connexion = new Connexion();
		}

		private function getAll()
		{
			return $this->_connexion->query(ALL_PRODUCTS, array());
		}

		public function createOptions($name)
		{
			$products = $this->getAll();
			foreach ($products as $key => $product) {
				?>
				<option name="<?php echo $name; ?>" value="<?php echo $product['id'];?>"><?php echo $product['product'];?></option>
				<?php
			}
		}

		public function add($product_new)
		{
			$products = $this->getAll();
			foreach ($products as $key => $product) {
				if($product['product']==$product_new){
					return false;
				}
			}

			$this->_connexion->query(ADD_PRODUCT, array(":product"=>$product_new));
			return true;
		}

		public function getProduct($id){
			return $this->_connexion->query(GET_PRODUCT, array(":id"=>$id));
		}

		public function getID($name)
		{
			$product = $this->_connexion->query(GET_ID_PRODUCT, array(":product"=>$name));
			return $product['product'];
		}
	}