<?php 	
/**
* 
*/
class City 
{
	$_connexion = "";

	function __construct()
	{
		$this->_connexion = new Connexion();
	}

	private function getAll()
	{
		return $this->_connexion->query(ALL_CITIES,array());
	}

	public function createOptions($name)
	{
		$cities = $this->getAll();
		foreach ($cities as $key => $city) {
			?>
			<option name="<?php echo $name; ?>" value="<?php echo $city['id'];?>"><?php echo $city['city'];?></option>
			<?php
		}
		
	}

}