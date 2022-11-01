<?php
include_once "config.php";

if (isset($_POST['action'])) {
	if ( isset($_POST['global_token']) && 
		$_POST['global_token'] == $_SESSION['global_token']) {

		switch ($_POST['action']) {
			case 'store':
				
				$userController = new UserController();
              
				$name = strip_tags($_POST['name']);
				$lastname = strip_tags($_POST['lastname']);
                $email = strip_tags($_POST['email']);
				$phone_number = strip_tags($_POST['phone_number']);
				$created_by = strip_tags($_SESSION['name']);
				$role = strip_tags($_POST['role']);
				$password = strip_tags($_POST['password']);
				$profile_photo = strip_tags($_FILES['profile_photo']['tmp_name']);

				$userController->create($name, $lastname, $email, $phone_number, 
                $created_by, $role, $password, $profile_photo);

			break; 
            case 'editPfp':

                $userController = new UserController();

                $id = strip_tags($_POST['id']);
                $profile_photo = strip_tags($_FILES['profile_photo']['tmp_name']);

                $userController->updateUserPfp($id, $profile_photo);
            break;
			case 'edit':

				$userController = new UserController();
				
                $id = strip_tags($_POST['id']);
                $name = strip_tags($_POST['name']);
				$lastname = strip_tags($_POST['lastname']);
                $email = strip_tags($_POST['email']);
				$phone_number = strip_tags($_POST['phone_number']);
				$created_by = strip_tags($_POST['created_by']);
				$role = strip_tags($_POST['role']);
				$password = strip_tags($_POST['password']);

				$userController->update($id, $name, $lastname, $email, $phone_number, 
                $created_by, $role, $password);
			break; 
            case 'delete':

                $userController = new UserController();
				
                $id = strip_tags($_POST['id']);

				$userController->deleteUser($id);
                
            break;
		}
	}
    else{
		session_destroy();
		header("Location:".BASE_PATH."?error=true");
	}
}


Class UserController{

	public function create($name, $lastname, $email, $phone_number, 
    $created_by, $role, $password, $profile_photo){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://crud.jonathansoto.mx/api/users',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('name' => $name,'lastname' => $lastname,
        'email' => $email,'phone_number' => $phone_number,
        'created_by' => $created_by,'role' => $role,'password' => $password,
        'profile_photo_file'=> new CURLFILE($profile_photo)),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token']
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {
			header("Location:".BASE_PATH."users/".$response->data->id."?success=true");
		}else{
			#var_dump($response);
			header("Location:".BASE_PATH."users/?error=true");
		}
	}

    public function getUsers(){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://crud.jonathansoto.mx/api/users',
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

    public function getUserById($id){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://crud.jonathansoto.mx/api/users/'.$id,
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

    public function update($id, $name, $lastname, $email, $phone_number, 
    $created_by, $role, $password){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://crud.jonathansoto.mx/api/users',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => 'name='.$name.'&lastname='.$lastname.'&email='.$email.'&phone_number='.$phone_number.'&created_by='.$created_by.'&role='.$role.'&password='.$password.'&id='.$id,
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token'],
            'Content-Type: application/x-www-form-urlencoded',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {
			header("Location:".BASE_PATH."users/".$response->data->id."?success=true");
		}else{
			header("Location:".BASE_PATH."users/".$id."?error=true");
		}
    }

    public function updateUserPfp($id, $profile_photo){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://crud.jonathansoto.mx/api/users/avatar',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('id' => $id,'profile_photo_file'=> new CURLFILE($profile_photo)),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token']
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {
			header("Location:".BASE_PATH."users/".$response->data->id."?success=true");
		}else{
			header("Location:".BASE_PATH."users/".$id."?error=true");
		}
    }

    public function deleteUser($id){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://crud.jonathansoto.mx/api/users/'.$id,
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