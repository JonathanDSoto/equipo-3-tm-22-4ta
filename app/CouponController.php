<?php  
include_once "config.php";

if (isset($_POST['action'])) {

	if ( isset($_POST['global_token']) && 
		$_POST['global_token'] == $_SESSION['global_token']) {

		switch ($_POST['action']) {
			case 'create':
				
				$name = strip_tags($_POST['name']);
				$code = strip_tags($_POST['code']);

				$percentage_discount = isset($_POST['percentage_discount']) ? 
				strip_tags($_POST['percentage_discount']) : 0;
				$amount_discount = isset($_POST['amount_discount']) ? 
				strip_tags($_POST['amount_discount']) : 0;

				$min_amount_required = strip_tags($_POST['min_amount_required']);
				$min_product_required = strip_tags($_POST['min_product_required']);
				$start_date = strip_tags($_POST['start_date']);
				$end_date = strip_tags($_POST['end_date']);
				$max_uses = strip_tags($_POST['max_uses']);
				$count_uses = strip_tags($_POST['count_uses']);
				$valid_only_first_purchase = strip_tags($_POST['valid_only_first_purchase']);
				$status = strip_tags($_POST['status']);
				

				$couponController = new CouponController();

				$couponController->create($name, $code, $percentage_discount, $amount_discount, 
				$min_amount_required, $min_product_required, $start_date, $end_date, $max_uses, 
				$count_uses, $valid_only_first_purchase, $status);
				 
			break; 
			case 'update':
				
				$id = strip_tags($_POST['id']);
				$name = strip_tags($_POST['name']);
				$code = strip_tags($_POST['code']);
			
				$percentage_discount = isset($_POST['percentage_discount']) ? 
				strip_tags($_POST['percentage_discount']) : 0;
				$amount_discount = isset($_POST['amount_discount']) ? 
				strip_tags($_POST['amount_discount']) : 0;

				$min_amount_required = strip_tags($_POST['min_amount_required']);
				$min_product_required = strip_tags($_POST['min_product_required']);
				$start_date = strip_tags($_POST['start_date']);
				$end_date = strip_tags($_POST['end_date']);
				$max_uses = strip_tags($_POST['max_uses']);
				$count_uses = strip_tags($_POST['count_uses']);
				$valid_only_first_purchase = strip_tags($_POST['valid_only_first_purchase']);
				$status = strip_tags($_POST['status']);
				
				$couponController = new CouponController();

				$couponController->update($id, $name, $code, $percentage_discount, $amount_discount, 
				$min_amount_required, $min_product_required, $start_date, $end_date, $max_uses, 
				$count_uses, $valid_only_first_purchase, $status);
				 
			break;
			case 'delete':

				$couponController = new CouponController();
                
				$id = strip_tags($_POST['id']);

				$couponController->deleteCoupon($id);
			break; 
		}

	}
	else{
		session_destroy();
		header("Location:".BASE_PATH."?error=true");
	}
}

Class CouponController
{
	public function getCoupons()
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'http://crud.jonathansoto.mx/api/coupons',
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

	public function getCouponById($id)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'http://crud.jonathansoto.mx/api/coupons/'.$id,
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
			
			$coupon = $response->data;
			$total_discount = 0;

			foreach ($coupon->orders as $order) {
				if($coupon->amount_discount > 0){
					$total_discount += $coupon->amount_discount;
				}
				else if($coupon->percentage_discount > 0){
					$total_discount += $order->total*($coupon->percentage_discount/100);
				}
			}

			$response->data->total_discount = $total_discount;

			return $response->data;

		}else{

			return array();
		}
	}

	public function create($name, $code, $percentage_discount, $amount_discount, $min_amount_required,
	$min_product_required, $start_date, $end_date, $max_uses, $count_uses, $valid_only_first_purchase, $status)
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'http://crud.jonathansoto.mx/api/coupons',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => array('name' => $name,'code' => $code,
		'percentage_discount' => $percentage_discount,'amount_discount' => $amount_discount,
		'min_amount_required' => $min_amount_required, 'min_product_required' => $min_product_required,
		'start_date' => $start_date, 'end_date' => $end_date, 'max_uses' => $max_uses,
		'count_uses' => $count_uses,'valid_only_first_purchase' => $valid_only_first_purchase,
		'status' => $status),
		CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$_SESSION['token']
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {

			header('Location:'.BASE_PATH.'coupons/'.$response->data->id.'?success=true');
		}else{ 

			header('Location:'.BASE_PATH.'coupons/?error=true');
		}

	}

	public function update($id, $name, $code, $percentage_discount, $amount_discount, 
	$min_amount_required, $min_product_required, $start_date, $end_date, $max_uses, 
	$count_uses, $valid_only_first_purchase, $status)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'http://crud.jonathansoto.mx/api/coupons',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'PUT',
		  CURLOPT_POSTFIELDS => 'name='.$name.'&code='.$code.'&percentage_discount='.$percentage_discount.'&amount_discount='.$amount_discount.'&min_amount_required='.$min_amount_required.'&min_product_required='.$min_product_required.'&start_date='.$start_date.'&end_date='.$end_date.'&max_uses='.$max_uses.'&count_uses='.$count_uses.'&valid_only_first_purchase='.$valid_only_first_purchase.'&status='.$status.'&id='.$id,
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$_SESSION['token'],
			'Content-Type: application/x-www-form-urlencoded'
		  ),
		));
		
		$response = curl_exec($curl);
		
		curl_close($curl);

		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {

			header('Location:'.BASE_PATH.'coupons/'.$response->data->id.'?success=true');
		}else{ 

			header('Location:'.BASE_PATH.'coupons/'.$id.'?error=true');
		}

	}

	public function deleteCoupon($id)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'http://crud.jonathansoto.mx/api/coupons/'.$id,
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