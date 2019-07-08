<?php

class Controller_Main extends Controller 
{
	function __construct()
	{
		$this->model = new Model_Main();
		$this->view = new View();

	}

	function action_index()
	{
		$title = $this->model->getTitle();
		$this->view->generate('main_view.vue', 'template_view.php', $title);
	}

	function action_getrow($props)
	{
		$email = $props['email'];
		$row = $this->model->getRow($email);
		if (!$row) {
			echo 0;
		} else {
			foreach ($row as $var) {
				$fullEmail = $var['email'];
				$name = $var['name'];
				$sname = $var['sname'];
				$id = $var['user_id'];
				echo "$fullEmail $name $sname [id: $id]\n";
			}
		}
	}
}