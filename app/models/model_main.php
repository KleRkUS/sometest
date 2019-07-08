<?php
class Model_Main extends Model 
{
	function _construct()
	{
		$this->title = "Test";	}

	function getTitle()
	{
		return $this->title;
	}

	function getRow($email)
	{
		$db = new Database;
		$stmt = $db->pdo->prepare("SELECT user.email, user_info.name, user_info.sname, user_info.user_id FROM user, user_info WHERE user.email LIKE :email AND user_info.user_id=user.id");
		$stmt->execute(array('email' => "%".$email."%"));
		if ($row = $stmt->fetchAll()) {
			return $row;
		} else {
			return false;
		}
	}
}