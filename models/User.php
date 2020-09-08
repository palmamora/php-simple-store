<?php
class User
{
	private $id;
	private $name;
	private $lastName;
	private $email;
	private $password;
	private $role;
	private $image;
	private $link;

	//construct
	public function __construct()
	{
		$this->link = Connection::connect();
	}

	//methods
	public function User($id, $name, $lastName, $email, $password, $role, $image)
	{
		$this->setId($id);
		$this->setName($name);
		$this->setLastName($lastName);
		$this->setEmail($email);
		$this->setPassword($password);
		$this->setRole($role);
		$this->setImage($image);
	}

	public function save()
	{
		$query = "INSERT INTO users VALUES({$this->getId()},'{$this->getName()}','{$this->getLastName()}','{$this->getEmail()}','{$this->getPassword()}','{$this->getRole()}','{$this->getImage()}');";

		$save = $this->link->query($query);
		if ($save) {
			return true;
		}else{
			return false;
		}
	}

	//getters and setters
	public function getId()
	{
		return $this->id;
	}
	public function setId($id)
	{
		$this->id = $id;
	}
	public function getName()
	{
		return $this->name;
	}
	public function setName($name)
	{
		$this->name = $this->link->real_escape_string($name);
	}
	public function getLastName()
	{
		return $this->lastName;
	}
	public function setLastName($lastName)
	{
		$this->lastName = $this->link->real_escape_string($lastName);
	}
	public function getEmail()
	{
		return $this->email;
	}
	public function setEmail($email)
	{
		$this->email = $this->link->real_escape_string($email);
	}
	public function getPassword()
	{
		return $this->password;
	}
	public function setPassword($password)
	{
		$this->password = password_hash($this->link->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);
	}
	public function getRole()
	{
		return $this->role;
	}
	public function setRole($role)
	{
		$this->role = $role;
	}
	public function getImage()
	{
		return $this->image;
	}
	public function setImage($image)
	{
		$this->image = $image;
	}
}
