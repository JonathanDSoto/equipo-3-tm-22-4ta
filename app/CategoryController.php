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

				$categoryController = new CategoryController();

				$categoryController->create($name, $description, $slug);
				 
			break; 
			case 'update':
				
				$id = strip_tags($_POST['id']);
				$name = strip_tags($_POST['name']);
				$description = strip_tags($_POST['description']);
				$slug = strip_tags($_POST['slug']);

				$categoryController = new CategoryController();

				$categoryController->update($id, $name, $description, $slug);
				 
			break;
			case 'delete':

				$categoryController = new CategoryController();
                
				$id = strip_tags($_POST['id']);

				$categoryController->deleteCategory($id);
			break; 
		}

	}
	else{
		session_destroy();
		header("Location:".BASE_PATH."?error=true");
	}
}

Class CategoryController
{
	public function getCategories()
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'http://crud.jonathansoto.mx/api/categories',
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

	public function getCategoryById($id)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'http://crud.jonathansoto.mx/api/categories/'.$id,
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
		CURLOPT_URL => 'http://crud.jonathansoto.mx/api/categories',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => array('name' => $name,'description' => $description,
		'slug' => $slug,'category_id' => ''),
		CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$_SESSION['token']
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {

			header('Location:'.BASE_PATH.'categories?success=true');
		}else{ 

			#var_dump($response);
			header('Location:'.BASE_PATH.'categories?error=true');
		}

	}

	public function update($id, $name, $description, $slug)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'http://crud.jonathansoto.mx/api/categories',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'PUT',
		  CURLOPT_POSTFIELDS => 'id='.$id.'&name='.$name.'&description='.$description.'&slug='.$slug.'&category_id=',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$_SESSION['token'],
			'Content-Type: application/x-www-form-urlencoded'
		  ),
		));
		
		$response = curl_exec($curl);
		
		curl_close($curl);

		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {

			header('Location:'.BASE_PATH.'categories?success=true');
		}else{ 

			#var_dump($response);
			header('Location:'.BASE_PATH.'categories?error=true');
		}

	}

	public function deleteCategory($id)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'http://crud.jonathansoto.mx/api/categories/'.$id,
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