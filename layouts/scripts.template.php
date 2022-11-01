    <!-- JAVASCRIPT -->
    <script src="<?= BASE_PATH ?>public/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/node-waves/waves.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/feather-icons/feather.min.js"></script>
    <script src="<?= BASE_PATH ?>public/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?= BASE_PATH ?>public/js/plugins.js"></script>
    

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        const {createApp} = Vue;
        
        var app = createApp({
            data(){
                return {
                    title : '',
                    userLog: [],
                    date: '',
                    update: '',
                    modal: '',
                    ruta: 'https://crud.jonathansoto.mx/storage/products/',
                    rutaAvatar: 'http://crud.jonathansoto.mx/storage/users/avatars/',
                    products: [],
                    product: [],
                    presentations: [],
                    tags: [],
                    brands: [],
                    categories: [],
                    coupons: [],
                    coupon: [],
                    orders: [],
                    order: [],
                    presentationsOrders: [{
                        id: '',
                        quantity: '',
                    }],
                    addresses: [],
                    startDate: '',
                    endDate: '',
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
                            swal("The client was successfully deleted!", {
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
                            swal("The client continues to be saved!");
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
                            swal("The address was successfully deleted!", {
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
                            swal("The address continues to be saved!");
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
                        document.getElementById(product.categories[i].id+"c").disabled = 1;
                    }

                    for (let i = 0; i < product.tags.length; i++) {
                        document.getElementById(product.tags[i].id+"t").checked = 1;
                        document.getElementById(product.tags[i].id+"t").disabled = 1;
                    }
                    
                },
                createProduct(){
                    app.modal = "create";
                    app.clearCheckBox();

                    document.getElementById("input_oculto").value = "create";
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
                },
                deleteProduct(id){
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover the information!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("The product was successfully deleted!", {
                                icon: "success",
                            });
                            var bodyFormData = new FormData();
                            bodyFormData.append('id', id);
                            bodyFormData.append('action', 'delete');
                            bodyFormData.append('global_token', '<?php echo $_SESSION['global_token'] ?>');

                            axios.post('<?php echo BASE_PATH ?>product', bodyFormData)
                            .then(function (response){
                                if(response.data==true){
                                window.location = "<?= BASE_PATH ?>products/";
                            }
                            })
                            .catch(function (error){
                                console.log('error')
                            })
                        } else {
                            swal("The product continues to be saved!");
                        }
                    });
                },
                editPresentation(val){
                    
                    app.modal = "edit";
                    let boton = document.getElementById(val);
                    document.getElementById("input_oculto").value = "update";
                    let presentation = JSON.parse(boton.getAttribute("data-presentation"));
                    console.log(presentation);
                    document.getElementById("idpr").value = presentation.id;
                    document.getElementById("description").value = presentation.description;
                    document.getElementById("code").value = presentation.code;
                    document.getElementById("weight_in_grams").value = presentation.weight_in_grams;
                    document.getElementById("stock").value = presentation.stock;
                    document.getElementById("stock_min").value = presentation.stock_min;
                    document.getElementById("stock_max").value = presentation.stock_max;

                    for (let i = 0; i < presentation.price.length; i++) {
                        if(presentation.price[i].is_current_price==1){
                            document.getElementById("amount").value = presentation.price[i].amount;
                        }
                    }
                    
                },
                createPresentation(){
                    
                    app.modal = "create";
                    document.getElementById("input_oculto").value = "create";
                    document.getElementById("idpr").value = "";
                    document.getElementById("description").value = "";
                    document.getElementById("code").value = "";
                    document.getElementById("weight_in_grams").value = "";
                    document.getElementById("stock").value = "";
                    document.getElementById("stock_min").value = "";
                    document.getElementById("stock_max").value = "";

                },
                editPrice(val){
                    app.modal = "editPrice";
                    let boton = document.getElementById(val);
                    document.getElementById("input_oculto").value = "updatePrice";
                    let presentation = JSON.parse(boton.getAttribute("data-presentation"));
                    console.log(presentation);
                    document.getElementById("idpr").value = presentation.id;
                    
                },
                deletePresentation(id){
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover the information!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("The presentation was successfully deleted!", {
                                icon: "success",
                            });
                            var bodyFormData = new FormData();
                            bodyFormData.append('id', id);
                            bodyFormData.append('action', 'delete');
                            bodyFormData.append('global_token', '<?php echo $_SESSION['global_token'] ?>');

                            axios.post('<?php echo BASE_PATH ?>presentation', bodyFormData)
                            .then(function (response){
                                if(response.data==true){
                                window.location = "<?= BASE_PATH ?>products/";
                            }
                            })
                            .catch(function (error){
                                console.log('error')
                            })
                        } else {
                            swal("The presentation continues to be saved!");
                        }
                    });
                },
                editCategory(val){
                    
                    app.modal = "edit";
                    let boton = document.getElementById(val);
                    document.getElementById("input_oculto").value = "update";
                    let category = JSON.parse(boton.getAttribute("data-category"));
                    console.log(category);
                    document.getElementById("id").value = category.id;
                    document.getElementById("name").value = category.name;
                    document.getElementById("description").value = category.description;
                    document.getElementById("slug").value = category.slug;
                    
                },
                createCategory(){
                    
                    app.modal = "create";
                    document.getElementById("input_oculto").value = "create";
                    document.getElementById("id").value = "";
                    document.getElementById("name").value = "";
                    document.getElementById("description").value = "";
                    document.getElementById("slug").value = "";
                    
                },
                deleteCategory(id){
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover the information!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("The category was successfully deleted!", {
                                icon: "success",
                            });
                            var bodyFormData = new FormData();
                            bodyFormData.append('id', id);
                            bodyFormData.append('action', 'delete');
                            bodyFormData.append('global_token', '<?php echo $_SESSION['global_token'] ?>');

                            axios.post('<?php echo BASE_PATH ?>category', bodyFormData)
                            .then(function (response){
                                if(response.data==true){
                                window.location = "<?= BASE_PATH ?>categories/";
                            }
                            })
                            .catch(function (error){
                                console.log('error')
                            })
                        } else {
                            swal("The category continues to be saved!");
                        }
                    });
                },
                editBrand(val){
                    
                    app.modal = "edit";
                    let boton = document.getElementById(val);
                    document.getElementById("input_oculto").value = "update";
                    let brand = JSON.parse(boton.getAttribute("data-brand"));
                    console.log(brand);
                    document.getElementById("id").value = brand.id;
                    document.getElementById("name").value = brand.name;
                    document.getElementById("description").value = brand.description;
                    document.getElementById("slug").value = brand.slug;
                    
                },
                createBrand(){
                    
                    app.modal = "create";
                    document.getElementById("input_oculto").value = "create";
                    document.getElementById("id").value = "";
                    document.getElementById("name").value = "";
                    document.getElementById("description").value = "";
                    document.getElementById("slug").value = "";
                    
                },
                deleteBrand(id){
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover the information!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("The brand was successfully deleted!", {
                                icon: "success",
                            });
                            var bodyFormData = new FormData();
                            bodyFormData.append('id', id);
                            bodyFormData.append('action', 'delete');
                            bodyFormData.append('global_token', '<?php echo $_SESSION['global_token'] ?>');

                            axios.post('<?php echo BASE_PATH ?>brand', bodyFormData)
                            .then(function (response){
                                if(response.data==true){
                                window.location = "<?= BASE_PATH ?>brands/";
                            }
                            })
                            .catch(function (error){
                                console.log('error')
                            })
                        } else {
                            swal("The brand continues to be saved!");
                        }
                    });
                },
                editTag(val){
                    
                    app.modal = "edit";
                    let boton = document.getElementById(val);
                    document.getElementById("input_oculto").value = "update";
                    let brand = JSON.parse(boton.getAttribute("data-brand"));
                    console.log(brand);
                    document.getElementById("id").value = brand.id;
                    document.getElementById("name").value = brand.name;
                    document.getElementById("description").value = brand.description;
                    document.getElementById("slug").value = brand.slug;
                    
                },
                createTag(){
                    
                    app.modal = "create";
                    document.getElementById("input_oculto").value = "create";
                    document.getElementById("id").value = "";
                    document.getElementById("name").value = "";
                    document.getElementById("description").value = "";
                    document.getElementById("slug").value = "";
                    
                },
                deleteTag(id){
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover the information!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("The tag was successfully deleted!", {
                                icon: "success",
                            });
                            var bodyFormData = new FormData();
                            bodyFormData.append('id', id);
                            bodyFormData.append('action', 'delete');
                            bodyFormData.append('global_token', '<?php echo $_SESSION['global_token'] ?>');

                            axios.post('<?php echo BASE_PATH ?>tag', bodyFormData)
                            .then(function (response){
                                if(response.data==true){
                                window.location = "<?= BASE_PATH ?>tags/";
                            }
                            })
                            .catch(function (error){
                                console.log('error')
                            })
                        } else {
                            swal("The tag continues to be saved!");
                        }
                    });
                },
                editCoupon(val){
                    
                    app.modal = "edit";
                    let boton = document.getElementById(val);
                    document.getElementById("input_oculto").value = "update";
                    let coupon = JSON.parse(boton.getAttribute("data-coupon"));
                    console.log(coupon);
                    document.getElementById("id").value = coupon.id;
                    document.getElementById("name").value = coupon.name;
                    document.getElementById("code").value = coupon.code;
                    document.getElementById("percentage_discount").value = coupon.percentage_discount;
                    document.getElementById("amount_discount").value = coupon.amount_discount;
                    document.getElementById("min_amount_required").value = coupon.min_amount_required;
                    document.getElementById("min_product_required").value = coupon.min_product_required;
                    document.getElementById("end_date").value = coupon.end_date;
                    document.getElementById("max_uses").value = coupon.max_uses;
                    document.getElementById("count_uses").value = coupon.count_uses;
                    document.getElementById("valid_only_first_purchase").value = coupon.valid_only_first_purchase;
                    document.getElementById("_status").value = 1;
                    
                },
                createCoupon(){
                    
                    app.modal = "create";
                    document.getElementById("input_oculto").value = "create";

                    document.getElementById("id").value = "";
                    document.getElementById("name").value = "";
                    document.getElementById("code").value = "";
                    document.getElementById("percentage_discount").value = "";
                    document.getElementById("amount_discount").value = 0;
                    document.getElementById("min_amount_required").value = "";
                    document.getElementById("min_product_required").value = "";
                    document.getElementById("end_date").value = "";
                    document.getElementById("max_uses").value = "";
                    
                    document.getElementById("valid_only_first_purchase").value = "";
                    document.getElementById("_status").value = 1;
                    
                },
                deleteCoupon(id){
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover the information!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("The coupon was successfully deleted!", {
                                icon: "success",
                            });
                            var bodyFormData = new FormData();
                            bodyFormData.append('id', id);
                            bodyFormData.append('action', 'delete');
                            bodyFormData.append('global_token', '<?php echo $_SESSION['global_token'] ?>');

                            axios.post('<?php echo BASE_PATH ?>coupon', bodyFormData)
                            .then(function (response){
                                if(response.data==true){
                                window.location = "<?= BASE_PATH ?>coupons/";
                            }
                            })
                            .catch(function (error){
                                console.log('error')
                            })
                        } else {
                            swal("The coupon continues to be saved!");
                        }
                    });
                },
                addPresentation(){
                    app.presentationsOrders.push({id: '',quantity: ''});
                },
                createOrder(){
                    
                    app.modal = "create";
                    document.getElementById("input_oculto").value = "create";
                    app.presentationsOrders= [{
                        id: '',
                        quantity: '',
                    }];

                },
                editOrder(val){
                    
                    app.modal = "edit";
                    let boton = document.getElementById(val);
                    document.getElementById("input_oculto").value = "update";
                    let order = JSON.parse(boton.getAttribute("data-order"));
                    console.log(order);
                    document.getElementById("id").value = order.id;
                    document.getElementById("order_status_id").value = order.order_status_id;
                    

                },
                onChange(event) {

                    console.log(event.target.value);
                    var id = event.target.value;
                    var config = {
                        method: 'get',
                        url: 'https://crud.jonathansoto.mx/api/addresses/clients/'+id,
                        headers: { 
                            'Authorization': 'Bearer '+'<?=$_SESSION['token']?>',
                        }
                    };

                    axios(config)
                    .then(function (response) {
                        console.log(JSON.stringify(response.data));
                        app.addresses = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                    

                },
                orderByDate() {

                    if(app.startDate!='' && app.endDate!=''){
                        
                        var config = {
                            method: 'get',
                            url: 'https://crud.jonathansoto.mx/api/orders/'+app.startDate+'/'+app.endDate,
                            headers: { 
                                'Authorization': 'Bearer '+'<?=$_SESSION['token']?>',
                            }
                        };

                        axios(config)
                        .then(function (response) {
                            console.log(JSON.stringify(response.data.data));
                            app.orders = response.data.data;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });

                        
                    }
                },
                deleteOrder(id) {
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover the information!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("The order was successfully deleted!", {
                                icon: "success",
                            });
                            var bodyFormData = new FormData();
                            bodyFormData.append('id', id);
                            bodyFormData.append('action', 'delete');
                            bodyFormData.append('global_token', '<?php echo $_SESSION['global_token'] ?>');

                            axios.post('<?php echo BASE_PATH ?>order', bodyFormData)
                            .then(function (response){
                                if(response.data==true){
                                window.location = "<?= BASE_PATH ?>orders/";
                            }
                            })
                            .catch(function (error){
                                console.log('error')
                            })
                        } else {
                            swal("The order continues to be saved!");
                        }
                    });
                },

            },
            mounted(){

                var title = window.location.href;
                var cont = 0;
                for(var i = 36; i < title.length ; i++){
                    if(title[i]!="/"){
                        cont++;
                    }else{
                        break;
                    }
                }
                var aux_title = title.substring(36,cont+36);
                var final_title = aux_title.toUpperCase();
                document.title = final_title;

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
                        'Authorization': 'Bearer '+'<?=$_SESSION['token']?>',
                    }
                };

                axios(config)
                .then(function (response) {
                    // console.log(JSON.stringify(response.data.data));
                    app.products = response.data.data;
                })
                .catch(function (error) {
                    console.log(error);
                });


                var config = {
                    method: 'get',
                    url: 'https://crud.jonathansoto.mx/api/categories',
                    headers: { 
                        'Authorization': 'Bearer '+'<?=$_SESSION['token']?>',
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
                        'Authorization': 'Bearer '+'<?=$_SESSION['token']?>',
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
                <?php if(isset($_GET['slug'])) : ?>
                    var config = {
                        method: 'get',
                        url: 'https://crud.jonathansoto.mx/api/products/slug/'+'<?=$_GET['slug']?>',
                        headers: { 
                            'Authorization': 'Bearer '+'<?=$_SESSION['token']?>',
                        }
                    };
                    
                    axios(config)
                    .then(function (response) {
                        // console.log(JSON.stringify(response.data.data));
                        app.product = response.data.data;
                        app.presentations = app.product.presentations;
                        // console.log(app.presentations);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                <?php endif; ?>

                var config = {
                    method: 'get',
                    url: 'https://crud.jonathansoto.mx/api/brands',
                    headers: { 
                        'Authorization': 'Bearer '+'<?=$_SESSION['token']?>',
                    }
                };

                axios(config)
                .then(function (response) {
                    // console.log(JSON.stringify(response.data.data));
                    app.brands = response.data.data;
                })
                .catch(function (error) {
                    console.log(error);
                });


                var config = {
                    method: 'get',
                    url: 'https://crud.jonathansoto.mx/api/coupons',
                    headers: { 
                        'Authorization': 'Bearer '+'<?=$_SESSION['token']?>',
                    }
                };

                axios(config)
                .then(function (response) {
                    // console.log(JSON.stringify(response.data.data));
                    app.coupons = response.data.data;
                })
                .catch(function (error) {
                    console.log(error);
                });

                <?php if(isset($_GET['coupon'])): ?>
                    var config = {
                        method: 'get',
                        url: 'https://crud.jonathansoto.mx/api/coupons/'+'<?=$_GET['coupon']?>',
                        headers: { 
                            'Authorization': 'Bearer '+'<?=$_SESSION['token']?>',
                        }
                    };

                    axios(config)
                    .then(function (response) {
                        // console.log(JSON.stringify(response.data.data));
                        app.coupon = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                <?php endif; ?>

                var config = {
                    method: 'get',
                    url: 'https://crud.jonathansoto.mx/api/orders',
                    headers: { 
                        'Authorization': 'Bearer '+'<?=$_SESSION['token']?>',
                    }
                };

                axios(config)
                .then(function (response) {
                    // console.log(JSON.stringify(response.data.data));
                    app.orders = response.data.data;
                })
                .catch(function (error) {
                    console.log(error);
                });

                <?php if(isset($_GET['order'])): ?>
                    var config = {
                        method: 'get',
                        url: 'https://crud.jonathansoto.mx/api/orders/details/'+'<?=$_GET['order']?>',
                        headers: { 
                            'Authorization': 'Bearer '+'<?=$_SESSION['token']?>',
                        }
                    };

                    axios(config)
                    .then(function (response) {
                        console.log(JSON.stringify(response.data.data));
                        app.order = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                <?php endif; ?>

                var config = {
                    method: 'get',
                    url: 'https://crud.jonathansoto.mx/api/users/'+'<?=$_SESSION['id']?>',
                    headers: { 
                        'Authorization': 'Bearer '+'<?=$_SESSION['token']?>',
                    }
                };

                axios(config)
                .then(function (response) {
                    // console.log(JSON.stringify(response.data));
                    app.userLog = response.data.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
        }).mount('#contenedor')



        function soloNumeros(e){
            return /[0-9]/i.test(e.key);
        }

        function soloLetras(e){
            return /[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]/i.test(e.key);
        }
 
        function letrasYNumeros(e){
            return /[a-zA-Z0-9\s]/i.test(e.key);
        }

        function correo(e){
            return /[^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$]/i.test(e.key);
        }

    </script>