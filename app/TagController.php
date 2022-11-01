<?php  
include_once "config.php";

if (isset($_POST['action'])) {

	if ( isset($_POST['global_token']) && 
		$_POST['global_token'] == $_SESSION['global_token']) {

		switch ($_POST['action']) {
			case 'create':
				
				$name = strip_tags($_POST['name']);
				$description = strip_tags($_POST['description']);
				$slug = strip_tags($_POST['slug']);

				$tagController = new TagController();

				$tagController->create($name, $description, $slug);
				 
			break; 
			case 'update':
				
				$id = strip_tags($_POST['id']);
				$name = strip_tags($_POST['name']);
				$description = strip_tags($_POST['description']);
				$slug = strip_tags($_POST['slug']);

				$tagController = new TagController();

				$tagController->update($id, $name, $description, $slug);
				 
			break;
			case 'delete':

				$tagController = new TagController();
                
				$id = strip_tags($_POST['id']);

				$tagController->deleteTag($id);
			break; 
		}

	}
	else{
		session_destroy();
		header("Location:".BASE_PATH."?error=true");
	}
}

Class TagController
{
	public function getTags()
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'http://crud.jonathansoto.mx/api/tags',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$_SESSION['token']
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {
			
			return $response->data;
		}else{

			return array();
		}
	}

	public function getTagById($id)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'http://crud.jonathansoto.mx/api/tags/'.$id,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$_SESSION['token']
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {
			
			return $response->data;
		}else{

			return array();
		}
	}
	
	public function create($name, $description, $slug)
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'http://crud.jonathansoto.mx/api/tags',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => array('name' => $name,'description' => $description,
		'slug' => $slug),
		CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$_SESSION['token']
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {

			header('Location:'.BASE_PATH.'tags/?success=true');
		}else{ 

			header('Location:'.BASE_PATH.'tags/?error=true');
		}

	}

	public function update($id, $name, $description, $slug)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'http://crud.jonathansoto.mx/api/tags',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'PUT',
		  CURLOPT_POSTFIELDS => 'name='.$name.'&description='.$description.'&slug='.$slug.'&id='.$id,
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$_SESSION['token'],
			'Content-Type: application/x-www-form-urlencoded'
		  ),
		));
		
		$response = curl_exec($curl);
		
		curl_close($curl);

		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {

			header('Location:'.BASE_PATH.'tags/?success=true');
		}else{ 

			#var_dump($response);
			header('Location:'.BASE_PATH.'tags/?error=true');
		}

	}

	public function deleteTag($id)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'http://crud.jonathansoto.mx/api/tags/'.$id,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'DELETE',
		CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$_SESSION['token']
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {
			
			echo true;
		}else{

			echo false;
		}
	}
}


?>