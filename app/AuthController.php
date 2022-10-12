<?php
include_once "config.php";

if (isset($_POST['action'])) {

	if ( isset($_POST['global_token']) && 
		$_POST['global_token'] == $_SESSION['global_token']) {

		switch ($_POST['action']) {
			case 'access':
				
				$authController = new AuthController();


				$email = strip_tags($_POST['email']);
				$password = strip_tags($_POST['password']);

				$authController->login($email,$password);

			break; 
			case 'logout':

				$authController = new AuthController();
				$authController->logout();
			
			break; 
		}

	}
	else{
		session_destroy();
		header("Location:".BASE_PATH."?error=true");
	}
}


Class AuthController{

	public function login($email,$password)
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => array(
		  	'email' => $email,
		  	'password' => $password
		  ),
		));

		$response = curl_exec($curl); 
		curl_close($curl);
		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {

			$_SESSION['id']= $response->data->id;
			$_SESSION['name']= $response->data->name;
			$_SESSION['lastname']= $response->data->lastname;
			$_SESSION['avatar']= $response->data->avatar;
			$_SESSION['token']= $response->data->token;

			header("Location:".BASE_PATH."index");
		}else{
			#var_dump($response);
			header("Location:".BASE_PATH."?error=true");
		}

	}
	public function logout(){

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'http://crud.jonathansoto.mx/api/logout',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => array('email' => $_SESSION['email']),
		CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$_SESSION['token']
		),
		));

		$response = curl_exec($curl); 
		curl_close($curl);
		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {

			session_destroy();
			header("Location:".BASE_PATH.'?success=true');
		}else{
			#var_dump($response);
			header("Location:".BASE_PATH."index?error=true");
		}
	}
}
?>