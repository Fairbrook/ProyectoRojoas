<?php namespace Models;
class manager extends \Core\modeloBase{
	private $id;
	private $username;
	private $password;

	public function __construct(){
		parent::__construct("managers");
	}

	public function getId(){
		return $this->id;
	}

	public function get($atributo){
		return $this->{$atributo};
	}

	public function set($atributo,$value){
		$this->{$atributo} = $value;
	}

	public function save(){
		if(!$this->id)$this->id=$this->getNextId();

		$query = "INSERT INTO managers(id,username,password)
			VALUES({$this->id},´{$this->username}´,sha('{$this->password}'))";
		return $this->db()->query($query);
	}

	public function update(){
		$query = "UPDATE managers SET
					username='{$this->username}'
					password=sha('{$this->password}'
					WHERE id = {$this->id}";
		return $this->db()->query($query);
	}

	public function delete(){
		return $this->deleteById($this->id);
	}

	public function read(){
		$read = $this->getById($this->id);
		$this->username = $read->username;
		$this->password = $read->password;
	}

	public function login(){
		$query = "SELECT * FROM managers WHERE username='$this->username' and password=sha('$this->password')";
		$usuario = $this->db()->query($query);
		if($usuario->num_rows==1)$result = $usuario->fetch_object();
		if(isset($result->id))return $result->id;
		else return -1;
	}
}