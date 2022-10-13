<?php  
include_once "config.php";

if (isset($_POST['action'])) {

	if ( isset($_POST['global_token']) && 
		$_POST['global_token'] == $_SESSION['global_token']) {

		switch ($_POST['action']) {
			case 'create':
				
				$description = strip_tags($_POST['description']);
				$code = strip_tags($_POST['code']);
				$weight_in_grams = strip_tags($_POST['weight_in_grams']);
				$status = strip_tags($_POST['status']);
				$cover = $_FILES['cover']['tmp_name'];
				$stock = strip_tags($_POST['stock']);
				$stock_min = strip_tags($_POST['stock_min']);
				$stock_max = strip_tags($_POST['stock_max']);
				$product_id = strip_tags($_POST['product_id']);
				
				$presentationController = new PresentationController();

				$presentationController->create($description, $code, $weight_in_grams, $status, $cover, $stock, 
				$stock_min, $stock_max, $product_id);
				 
			break; 

			case 'update':
				
				$id = strip_tags($_POST['id']);
				$description = strip_tags($_POST['description']);
				$code = strip_tags($_POST['code']);
				$weight_in_grams = strip_tags($_POST['weight_in_grams']);
				$status = strip_tags($_POST['status']);
				$stock = strip_tags($_POST['stock']);
				$stock_min = strip_tags($_POST['stock_min']);
				$stock_max = strip_tags($_POST['stock_max']);
				$product_id = strip_tags($_POST['product_id']);

				$presentationController = new PresentationController();

				$presentationController->update($id, $description, $code, $weight_in_grams, $status, $stock, 
				$stock_min, $stock_max, $product_id);
				 
			break;
			case 'updatePrice':
				
				$id = strip_tags($_POST['id']);
				$id = strip_tags($_POST['amount']);				
				$product_id = strip_tags($_POST['product_id']);

				$presentationController = new PresentationController();

				$presentationController->updatePrice($id, $amount, $product_id);
				 
			break;
			case 'delete':

				$presentationController = new PresentationController();
                
				$id = strip_tags($_POST['id']);

				$presentationController->deletePresentation($_POST['id']);
			break; 
		}

	}
	else{
		session_destroy();
		header("Location:".BASE_PATH."?error=true");
	}
}

Class PresentationController
{
	public function getPresentationsByProduct($product_id)
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'http://crud.jonathansoto.mx/api/presentations/product/'.$product_id,
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

	public function getPresentationById($id)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'http://crud.jonathansoto.mx/api/presentations/'.$id,
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

	public function create($description, $code, $weight_in_grams, $status, $cover, $stock, 
	$stock_min, $stock_max, $product_id)
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'http://crud.jonathansoto.mx/api/presentations',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => array('description' => $description,'code' => $code,
		'weight_in_grams' => $weight_in_grams, 'status' => $status,'cover'=> new CURLFILE($cover),
		'stock' => $stock,'stock_min' => $stock_min,'stock_max' => $stock_max,'product_id' => $product_id),
		CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$_SESSION['token']
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {

			header('Location:'.BASE_PATH.'products/'.$response->data->product_id.'?success=true');
		}else{ 

			header('Location:'.BASE_PATH.'products/'.$product_id.'?error=true');
		}

	}

	public function update($id, $description, $code, $weight_in_grams, $status, $stock, 
	$stock_min, $stock_max, $product_id)
	{
 
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'http://crud.jonathansoto.mx/api/presentations',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'PUT',
		CURLOPT_POSTFIELDS => 'description='.$description.'&code='.$code.'&weight_in_grams='.$weight_in_grams.'&status='.$status.'&stock='.$stock.'&stock_min='.$stock_min.'&stock_max='.$stock_max.'&product_id='.$product_id.'&id='.$id,
		CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$_SESSION['token'],
			'Content-Type: application/x-www-form-urlencoded'
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {

			header('Location:'.BASE_PATH.'products/'.$response->data->product_id.'?success=true');
		}else{ 

			header('Location:'.BASE_PATH.'products/'.$product_id.'?error=true');
		}

	}

	public function updatePrice($id, $amount, $product_id)
	{
 
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'http://crud.jonathansoto.mx/api/presentations/set_new_price',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'PUT',
		CURLOPT_POSTFIELDS => 'id='.$id.'&amount='.$amount,
		CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$_SESSION['token'],
			'Content-Type: application/x-www-form-urlencoded'
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {

			header('Location:'.BASE_PATH.'products/'.$response->data->product_id.'?success=true');
		}else{ 

			header('Location:'.BASE_PATH.'products/'.$product_id.'?error=true');
		}

	}

	public function deletePresentation($id)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'http://crud.jonathansoto.mx/api/presentations/'.$id,
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
			
			return true;
		}else{

			return false;
		}
	}
}


?>