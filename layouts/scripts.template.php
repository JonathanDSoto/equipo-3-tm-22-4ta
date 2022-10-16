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
                    usuarios: null,
                    usuario: null,
                    usuarioLog:null,
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
            },
            mounted(){

                var config = {
                    method: 'get',
                    url: 'https://crud.jonathansoto.mx/api/users',
                    headers: { 
                        'Authorization': 'Bearer '+'<?php echo $_SESSION['token'] ?>'
                    }
                };

                axios(config)
                .then(function (response) {
                    // console.log(JSON.stringify(response.data));
                    // console.log(response.data.data);
                    app.usuarios = response.data.data;
                })
                .catch(function (error) {
                    console.log(error);
                });

                var id = '<?php echo $_SESSION['id'] ?>';
                <?php if(isset($_GET['id'])): ?>
                    id = '<?php echo $_GET['id'] ?>';
                <?php endif ?>

                var config = {
                    method: 'get',
                    url: 'https://crud.jonathansoto.mx/api/users/'+id,
                    headers: { 
                        'Authorization': 'Bearer '+'<?php echo $_SESSION['token'] ?>'
                    }
                };

                axios(config)
                .then(function (response) {
                    app.usuario = response.data.data;
                    console.log(app.usuario);
                    <?php if(isset($_GET['id'])): ?>
                        var date_aux = app.usuario.created_at;
                        app.date = date_aux.substring(0,10);
                        var date_aux = app.usuario.updated_at;
                        app.update = date_aux.substring(0,10);
                    <?php endif ?>
                })
                .catch(function (error) {
                    console.log(error);
                });

                var config = {
                    method: 'get',
                    url: 'https://crud.jonathansoto.mx/api/users/'+'<?php echo $_SESSION['id'] ?>',
                    headers: { 
                        'Authorization': 'Bearer '+'<?php echo $_SESSION['token'] ?>'
                    }
                };

                axios(config)
                .then(function (response) {
                    app.usuarioLog = response.data.data;
                    console.log(app.usuarioLog);
                })
                .catch(function (error) {
                    console.log(error);
                });


            },
        }).mount('#contenedor')
    </script>