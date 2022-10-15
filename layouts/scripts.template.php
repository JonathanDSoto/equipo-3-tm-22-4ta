    <!-- JAVASCRIPT -->
    <script src="<?= BASE_PATH ?>public/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/node-waves/waves.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/feather-icons/feather.min.js"></script>
    <script src="<?= BASE_PATH ?>public/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?= BASE_PATH ?>public/js/plugins.js"></script>

    <!-- App js -->
    <script src="<?= BASE_PATH ?>public/js/app.js"></script>

    <script type="text/javascript">
        const {createApp} = Vue;
        
        var app = createApp({
            data(){
                return {
                    date: '',
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
                }
            },
            mounted(){
                var date_aux = "<?php echo $user->created_at ?>";
                this.date = date_aux.substring(0,10);
            },
        }).mount('#contenedor')
    </script>