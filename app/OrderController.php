<?php  
include_once "config.php";

if (isset($_POST['action'])) {

	if ( isset($_POST['global_token']) && 
		$_POST['global_token'] == $_SESSION['global_token']) {

		switch ($_POST['action']) {
			case 'create':
				
				$folio = strip_tags($_POST['folio']);
				$total = strip_tags($_POST['total']);
				$is_paid = strip_tags($_POST['is_paid']);
				$client_id = strip_tags($_POST['client_id']);
				$address_id = strip_tags($_POST['address_id']);
				$order_status_id = strip_tags($_POST['order_status_id']);
				$payment_type_id = strip_tags($_POST['payment_type_id']);
				$coupon_id = strip_tags($_POST['coupon_id']);

				$presentations = array();
				$count = 0;
				while (true){
					if(isset($_POST['presentations'][$count]['id']) && isset($_POST['presentations'][$count]['quantity'])){
						$presentations['presentations['.$count.'][id]'] = strip_tags($_POST['presentations'][$count]['id']);
						$presentations['presentations['.$count.'][quantity]'] = strip_tags($_POST['presentations'][$count]['quantity']);
						$count++;
					}
					else break;
				}

				$orderController = new orderController();

				$orderController->create($folio, $total, $is_paid, $client_id, $address_id, $order_status_id, 
				$payment_type_id, $coupon_id, $presentations);
				 
			break; 

			case 'update':
				
				$id = strip_tags($_POST['id']);
				$order_status_id = strip_tags($_POST['order_status_id']);

				$orderController = new OrderController();

				$orderController->update($id, $order_status_id);
				 
			break;

			case 'delete':

				$orderController = new OrderController();
                
				$id = strip_tags($_POST['id']);

				$orderController->deleteOrder($id);
			break; 
		}

	}
	else{
		session_destroy();
		header("Location:".BASE_PATH."?error=true");
	}
}

Class OrderController
{
	public function getOrders()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'http://crud.jonathansoto.mx/api/orders',
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

	public function getOrdersByDate($start_date, $end_date)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'http://crud.jonathansoto.mx/api/orders/'.$start_date.'/'.$end_date,
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

	public function getOrderById($id)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'http:crud.jonathansoto.mx/api/orders/details/'.$id,
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
	
	public function create($folio, $total, $is_paid, $client_id, $address_id, $order_status_id, 
	$payment_type_id, $coupon_id, $presentations)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://crud.jonathansoto.mx/api/orders',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => array('folio' => $folio,'total' => $total,'is_paid' => $is_paid,
			'client_id' => $client_id,'address_id' => $address_id,'order_status_id' => $order_status_id,
			'payment_type_id' => $payment_type_id, 'coupon_id' => $coupon_id) + $presentations,
		  CURLOPT_HTTPHEADER => array(
		    'Authorization: Bearer '.$_SESSION['token']
		  ),
		)); 

		$response = curl_exec($curl); 
		curl_close($curl);
		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {

			header('Location:'.BASE_PATH.'orders/'.$response->data->id.'?success=true');
		}else{ 
			header('Location:'.BASE_PATH.'orders?error=true');
		}

	}

	public function update($id, $order_status_id)
	{
		
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://crud.jonathansoto.mx/api/orders',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'PUT',
			CURLOPT_POSTFIELDS => 'id='.$id.'&order_status_id='.$order_status_id,
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer '.$_SESSION['token'],
				'Content-Type: application/x-www-form-urlencoded'
			),
		));


		$response = curl_exec($curl); 
		curl_close($curl);
		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {
			header('Location:'.BASE_PATH.'orders/'.$response->data->id.'?success=true');
		}else{ 
			header('Location:'.BASE_PATH.'orders/'.$id.'?error=true');
		}

	}

	public function deleteOrder($id)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'http://crud.jonathansoto.mx/api/orders/'.$id,
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