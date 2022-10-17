<div class="modal fade" id="clientModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div v-if="(modal=='edit')">
                        <h5 class="modal-title" id="exampleModelLabel">
                            Edit Client
                        </h5>
                    </div>
                    <div v-else>
                        <h5 class="modal-title" id="exampleModelLabel">
                            Create Client
                        </h5>
                    </div>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form enctype="multipart/form-data" method="POST" action="<?= BASE_PATH ?>client">
                    <div class="modal-body">
                        <label class="input-group mb-3">Name(s)</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name(s)" aria-label="Name(s)" aria-describedby="basic-addon1">
                        </div>
                        <label class="input-group mb-3">Email</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control"  id="email" name="email" placeholder="Email" aria-label="email" aria-describedby="basic-addon1">
                        </div>
                        <div v-if="(modal=='create')">
                            <label class="input-group mb-3">Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" aria-label="password" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <label class="input-group mb-3">Phone Number</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number" aria-label="phone_number" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Save changes
                        </button>
                    </div>
                    <input id="is_suscribed" type="hidden" name="is_suscribed" value="1">
                    <input id="input_oculto" type="hidden" name="action" value="store">
                    <input id="id" type="hidden" name="id">
                    <input type="hidden" value="<?= $_SESSION['global_token'] ?>" name="global_token">

                </form>
            </div>
        </div>
    </div>