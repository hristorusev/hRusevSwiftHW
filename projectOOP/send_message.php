<?php
require_once 'require_classes.php';
session_start();
$data['message'] = $_POST['message'];
$data['id_user'] = $_GET['id_user'];
$validation = new ClassValidateMessage($data);
	
	if($validation->validateData() == 1)
		{
			$data['id_user_from'] = $_SESSION['logID'];
			$newMessage = new ClassMessage($data);
			$newMessage->saveMessageInDB();
			if($newMessage->getId()!= NULL)
				{
					$displayError = new ClassError('1&sendSuccess=Successfully sent!&id='.$data['id_user'],'search_full_result.php');
					echo $displayError->createErrorRedirection();
				}
			else
				{
					$displayError = new ClassError('1&sendSuccess=Something went wrong. Please, try again!&id='.$data['id_user'],'search_full_result.php');
					echo $displayError->createErrorRedirection();
				}
		}
	else
		{
			$displayError = new ClassError('1&sendSuccess='.$validation->validateData().'&id='.$data['id_user'],'search_full_result.php');
			echo $displayError->createErrorRedirection();
		}
?>