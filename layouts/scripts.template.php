    <!-- JAVASCRIPT -->
    <script src="<?= BASE_PATH ?>public/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/node-waves/waves.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/feather-icons/feather.min.js"></script>
    <script src="<?= BASE_PATH ?>public/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?= BASE_PATH ?>public/js/plugins.js"></script>
    

    <!-- App js -->
    <script src="<?= BASE_PATH ?>public/js/app.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        const {createApp} = Vue;
        
        var app = createApp({
            data(){
                return {
                    date: '',
                    update: '',
                    modal: '',
                    ruta: 'http://crud.jonathansoto.mx/storage/products/',
                    products: [],
                    tags: [],
                    categories: [],
                }
            },methods : {
                logout(id){
                    console.log(id);
                    var bodyFormData = new FormData();
                    bodyFormData.append('id', id);
                    bodyFormData.append('action', 'logout');
                    bodyFormData.append('global_token', '<?= $_SESSION['global_token'] ?>');
                    if(id == <?= $_SESSION['id'] ?>){
                        axios.post('<?= BASE_PATH ?>auth', bodyFormData)
                        .then(function (response){
                            if(response.data==true){
                                window.location = "<?= BASE_PATH ?>";
                            }
                        })
                        .catch(function (error){
                            console.log('error')
                        })
                    }
                },
                editUser(val){
                    app.modal = "edit";
                    let boton = document.getElementById(val);
                    document.getElementById("input_oculto").value = "edit";
                    let user = JSON.parse(boton.getAttribute("data-product"));
                    console.log(user);
                    document.getElementById("id").value = user.id;
                    document.getElementById("name").value = user.name;
                    document.getElementById("lastname").value = user.lastname;
                    document.getElementById("email").value = user.email;
                    document.getElementById("created_by").value = user.created_by;
                    // document.getElementById("password").value = user.password;
                    document.getElementById("phone_number").value = user.phone_number;
                    document.getElementById("role").value = user.role;
                },
                createUser(){
                    app.modal = "create";
                    document.getElementById("input_oculto").value = "store";
                    document.getElementById("id").value = "";
                    document.getElementById("name").value = "";
                    document.getElementById("lastname").value = "";
                    document.getElementById("email").value = "";
                    // document.getElementById("password").value = user.password;
                    document.getElementById("phone_number").value = "";
                    document.getElementById("role").value = "";
                },
                deleteUser(id){
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover the information!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("The user was successfully deleted!", {
                                icon: "success",
                            });
                            var bodyFormData = new FormData();
                            bodyFormData.append('id', id);
                            bodyFormData.append('action', 'delete');
                            bodyFormData.append('global_token', '<?php echo $_SESSION['global_token'] ?>');

                            axios.post('<?php echo BASE_PATH ?>user', bodyFormData)
                            .then(function (response){
                                if(response.data==true){
                                window.location = "<?= BASE_PATH ?>users/";
                            }
                            })
                            .catch(function (error){
                                window.location = "<?= BASE_PATH ?>users/";
                                console.log('error')
                            })
                        } else {
                            swal("The user continues to be saved!");
                        }
                    });
                },
                editPhotoUser(id){
                    app.modal = "editPhoto";
                    document.getElementById("input_oculto").value = "editPfp";
                    document.getElementById("id").value = id;
                },
                createClient(){
                    app.modal = "create";
                    document.getElementById("input_oculto").value = "store";
                    document.getElementById("id").value = "";
                    document.getElementById("name").value = "";
                    document.getElementById("email").value = "";
                    document.getElementById("password").value = "";
                    document.getElementById("phone_number").value = "";
                    document.getElementById("level").value = "";
                },
                editClient(val){
                    app.modal = "edit";
                    let boton = document.getElementById(val);
                    document.getElementById("input_oculto").value = "edit";
                    let client = JSON.parse(boton.getAttribute("data-client"));
                    console.log(client);
                    app.modal = "edit";
                    document.getElementById("id").value = client.id;
                    document.getElementById("name").value = client.name;
                    document.getElementById("email").value = client.email;
                    // document.getElementById("password").value = client.password;
                    document.getElementById("phone_number").value = client.phone_number;
                },
                deleteClient(id){
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover the information!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("The user was successfully deleted!", {
                                icon: "success",
                            });
                            var bodyFormData = new FormData();
                            bodyFormData.append('id', id);
                            bodyFormData.append('action', 'delete');
                            bodyFormData.append('global_token', '<?php echo $_SESSION['global_token'] ?>');

                            axios.post('<?php echo BASE_PATH ?>client', bodyFormData)
                            .then(function (response){
                                if(response.data==true){
                                window.location = "<?= BASE_PATH ?>clients/";
                            }
                            })
                            .catch(function (error){
                                console.log('error')
                            })
                        } else {
                            swal("The user continues to be saved!");
                        }
                    });
                },
                editAddress(val){
                    app.modal = "edit";
                    let boton = document.getElementById(val);
                    document.getElementById("input_oculto").value = "edit";
                    let address = JSON.parse(boton.getAttribute("data-address"));
                    console.log(address);
                    document.getElementById("id").value = address.id;
                    document.getElementById("first_name").value = address.first_name;
                    document.getElementById("last_name").value = address.last_name;
                    document.getElementById("street_and_use_number").value = address.street_and_use_number;
                    document.getElementById("apartment").value = address.apartment;
                    document.getElementById("postal_code").value = address.postal_code;
                    document.getElementById("city").value = address.city;
                    document.getElementById("province").value = address.province;
                    document.getElementById("phone_number").value = address.phone_number;
                    document.getElementById("is_billing_address").value = "1";
                },
                createAddress(){
                    app.modal = "create";
                    document.getElementById("input_oculto").value = "store";
                    document.getElementById("id").value = "";
                    document.getElementById("first_name").value = "";
                    document.getElementById("last_name").value = "";
                    document.getElementById("street_and_use_number").value = "";
                    document.getElementById("apartment").value = "";
                    document.getElementById("postal_code").value = "";
                    document.getElementById("city").value = "";
                    document.getElementById("province").value = "";
                    document.getElementById("phone_number").value = "";
                    document.getElementById("is_billing_address").value = "";
                },
                deleteAddress(id){
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover the information!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("The user was successfully deleted!", {
                                icon: "success",
                            });
                            var bodyFormData = new FormData();
                            bodyFormData.append('id', id);
                            bodyFormData.append('action', 'delete');
                            bodyFormData.append('global_token', '<?php echo $_SESSION['global_token'] ?>');

                            axios.post('<?php echo BASE_PATH ?>address', bodyFormData)
                            .then(function (response){
                                if(response.data==true){
                                window.location = "<?= BASE_PATH ?>clients/";
                            }
                            })
                            .catch(function (error){
                                console.log('error')
                            })
                        } else {
                            swal("The user continues to be saved!");
                        }
                    });
                },
                editProduct(val){
                    
                    app.modal = "edit";
                    let boton = document.getElementById(val);
                    document.getElementById("input_oculto").value = "update";
                    let product = JSON.parse(boton.getAttribute("data-product"));
                    document.getElementById("id").value = product.id;
                    document.getElementById("name").value = product.name;
                    document.getElementById("slug").value = product.slug;
                    document.getElementById("description").value = product.description;
                    document.getElementById("features").value = product.features;
                    document.getElementById("brand_id").value = product.brand_id;

                    //  Limpiar los checkbox antes de ser asigmados
                    app.clearCheckBox();

                    for (let i = 0; i < product.categories.length; i++) {
                        document.getElementById(product.categories[i].id+"c").checked = 1;
                    }

                    for (let i = 0; i < product.tags.length; i++) {
                        document.getElementById(product.tags[i].id+"t").checked = 1;
                    }
                    
                },
                createProduct(){
                    app.modal = "create";
                    app.clearCheckBox();

                    document.getElementById("input_oculto").value = "store";
                    document.getElementById("id").value = "";
                    document.getElementById("name").value = "";
                    document.getElementById("slug").value = "";
                    document.getElementById("description").value = "";
                    document.getElementById("features").value = "";
                    document.getElementById("brand_id").value = "";

                },
                clearCheckBox(){
                    for (let i = 0; i < app.categories.length; i++) {
                        document.getElementById(app.categories[i].id+"c").checked = 0;
                    }
                    for (let i = 0; i < app.tags.length; i++) {
                        document.getElementById(app.tags[i].id+"t").checked = 0;
                    }
                }

            },
            mounted(){

                <?php if(isset($_GET['id'])): ?>
                    var date_aux = "<?php echo $user->created_at ?>";
                    this.date = date_aux.substring(0,10);
                    date_aux = "<?php echo $user->updated_at ?>";
                    this.update = date_aux.substring(0,10);
                <?php endif ?>

                

                var config = {
                    method: 'get',
                    url: 'https://crud.jonathansoto.mx/api/products',
                    headers: { 
                        'Authorization': "Bearer "+'<?=$_SESSION['token']?>',
                    }
                };

                axios(config)
                .then(function (response) {
                    // console.log(JSON.stringify(response.data.data));
                    app.products = response.data.data
                })
                .catch(function (error) {
                    console.log(error);
                });


                var config = {
                    method: 'get',
                    url: 'https://crud.jonathansoto.mx/api/categories',
                    headers: { 
                        'Authorization': "Bearer "+'<?=$_SESSION['token']?>',
                    }
                };

                axios(config)
                .then(function (response) {
                    // console.log(JSON.stringify(response.data));
                    app.categories = response.data.data
                })
                .catch(function (error) {
                    console.log(error);
                });


                var config = {
                    method: 'get',
                    url: 'https://crud.jonathansoto.mx/api/tags',
                    headers: { 
                        'Authorization': "Bearer "+'<?=$_SESSION['token']?>',
                    }
                };

                axios(config)
                .then(function (response) {
                    // console.log(JSON.stringify(response.data));
                    app.tags = response.data.data
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
        }).mount('#contenedor')
    </script>