<?php 
/**
* 
*/
class Tip 
{
	$_connexion;

	function __construct(argument)
	{
		$this->_connexion = new Connexion();
	}

	public function add($idUser, $title, $content)
	{
		$date = date('d-m-Y');
		$this->_connexion->query(ADD_TIP,array(":idUser" => $idUser, ":title" => $title, ":content" => $content));
	}

	private function get_forUser($idUser)
	{
		return $this->_connexion->query(GET_TIPS_FOR_USER, array(":idUser" => $idUser));
	}

	public function show_forUser($idUser)
	{
		$tips = $this->get_forUser($idUser);
		foreach ($tips as $key => $tip) {
			?>
			<div>
				<h1><?php echo $tip['title'];?></h1>
				<p><?php echo $tip['content'];?></p>
				<p><?php echo $tip['date'];?></p>
			</div>
			<?php
		}
	}

	private function getAll()
	{
		return $this->_connexion->query(GET_ALL_TIPS, array());
	}

	private function get_recent()
	{
		$all = $this->getAll();
		$recent = array();
		$count = 0;
		foreach ($all as $key => $tip) {
			if($count>=10){
				break;
			}
			array_push($recent, $tip);
			$count++;
		}
		return $recent;
	}

	public function show_recent()
	{
		$recent = $this->get_recent();
		foreach ($recent as $key => $tip) {
			?>
			<div>
				<h1><?php echo $tip['title'];?></h1>
				<p><?php echo $tip['content'];?></p>
				<p><?php echo $tip['date'];?></p>
			</div>
			<?php
		}
	}

}