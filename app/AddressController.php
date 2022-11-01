<?php
include_once "config.php";

if (isset($_POST['action'])) {
	if ( isset($_POST['global_token']) && 
		$_POST['global_token'] == $_SESSION['global_token']) {

		switch ($_POST['action']) {
			case 'store':
				
				$addressController = new AddressController();
              
				$first_name = strip_tags($_POST['first_name']);
				$last_name = strip_tags($_POST['last_name']);
				$street_and_use_number = strip_tags($_POST['street_and_use_number']);
				$apartment = strip_tags($_POST['apartment']);
				$postal_code = strip_tags($_POST['postal_code']);
				$city = strip_tags($_POST['city']);
				$province = strip_tags($_POST['province']);
				$phone_number = strip_tags($_POST['phone_number']);
				$is_billing_address = strip_tags($_POST['is_billing_address']);
				$client_id = strip_tags($_POST['client_id']);
				

				$addressController->create($first_name, $last_name, $street_and_use_number, $apartment, 
                $postal_code, $city, $province, $phone_number, $is_billing_address, $client_id);

			break; 
          
			case 'edit':

				$addressController = new AddressController();
				
                $id = strip_tags($_POST['id']);
                $first_name = strip_tags($_POST['first_name']);
				$last_name = strip_tags($_POST['last_name']);
				$street_and_use_number = strip_tags($_POST['street_and_use_number']);
				$apartment = strip_tags($_POST['apartment']);
				$postal_code = strip_tags($_POST['postal_code']);
				$city = strip_tags($_POST['city']);
				$province = strip_tags($_POST['province']);
				$phone_number = strip_tags($_POST['phone_number']);
				$is_billing_address = strip_tags($_POST['is_billing_address']);
				$client_id = strip_tags($_POST['client_id']);
				

				$addressController->update($id, $first_name, $last_name, $street_and_use_number, $apartment, 
                $postal_code, $city, $province, $phone_number, $is_billing_address, $client_id);
			break; 
            case 'delete':

                $addressController = new AddressController();
				
                $id = strip_tags($_POST['id']);

				$addressController->deleteAddress($id);
                
            break;
		}
	}
    else{
		session_destroy();
		header("Location:".BASE_PATH."?error=true");
	}
}

Class AddressController{
    
    public function getAddressById($id){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://crud.jonathansoto.mx/api/addresses/'.$id,
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

    public function getClientAdresses($id){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://crud.jonathansoto.mx/api/addresses/clients/'.$id,
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

    public function create($first_name, $last_name, $street_and_use_number, $apartment, 
    $postal_code, $city, $province, $phone_number, $is_billing_address, $client_id){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://crud.jonathansoto.mx/api/addresses',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('first_name' => $first_name,'last_name' => $last_name,
        'street_and_use_number' => $street_and_use_number,'apartment' => $apartment,'postal_code' => $postal_code,
        'city' => $city,'province' => $province,'phone_number' => $phone_number,
        'is_billing_address' => $is_billing_address,'client_id' => $client_id),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token']
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {
			header("Location:".BASE_PATH."clients/".$response->data->client_id."?success=true");
		}else{
			#var_dump($response);
			header("Location:".BASE_PATH."clients/".$client_id."?error=true");
		}
	}

    public function update($id, $first_name, $last_name, $street_and_use_number, $apartment, 
    $postal_code, $city, $province, $phone_number, $is_billing_address, $client_id){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://crud.jonathansoto.mx/api/addresses',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => 'first_name='.$first_name.'&last_name='.$last_name.'&street_and_use_number='.$street_and_use_number.'&apartment='.$apartment.'&postal_code='.$postal_code.'&city='.$city.'&province='.$province.'&phone_number='.$phone_number.'&is_billing_address='.$is_billing_address.'&client_id='.$client_id.'&id='.$id,
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token'],
            'Content-Type: application/x-www-form-urlencoded'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {
			header("Location:".BASE_PATH."clients/".$response->data->client_id."?success=true");
		}else{
			#var_dump($response);
			header("Location:".BASE_PATH."clients/".$client_id."?error=true");
		}
	}

    public function deleteAddress($id){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://crud.jonathansoto.mx/api/addresses/'.$id,
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