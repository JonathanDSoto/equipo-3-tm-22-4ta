 <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div v-if="(modal=='edit')">
                        <h5 class="modal-title" id="exampleModelLabel">
                            Edit Profile
                        </h5>
                    </div>
                    <div v-else-if="(modal=='editPhoto')">
                        <h5 class="modal-title" id="exampleModelLabel">
                            Edit Profile Photo
                        </h5>
                    </div>
                    <div v-else>
                        <h5 class="modal-title" id="exampleModelLabel">
                            Create Profile
                        </h5>
                    </div>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form enctype="multipart/form-data" method="POST" action="<?= BASE_PATH ?>user">
                    <div class="modal-body" v-if="(modal!='editPhoto')">
                        <label class="input-group mb-3">Name(s)</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name(s)" aria-label="Name(s)" aria-describedby="basic-addon1" onkeypress="return soloLetras(event)">
                        </div>
                        <label class="input-group mb-3">Last Name</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" aria-label="Last Name" aria-describedby="basic-addon1" onkeypress="return soloLetras(event)">
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
                            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number" aria-label="phone_number" aria-describedby="basic-addon1" 
                            onkeypress="return soloNumeros(event)" required minlength="7" maxlength="14">
                        </div>

                        <div v-if="(modal=='create')">
                            <div class="input-group mb-3 mt-4">
                                <label class="form-label">Photo User</label>
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control form-control-sm" name="profile_photo" type="file" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body" v-else>
                        <div class="input-group mb-3 mt-4">
                            <label class="form-label">Photo User</label>
                        </div>
                        <div class="input-group mb-3">
                            <input class="form-control form-control-sm" name="profile_photo" type="file" required>
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
                    <input type="hidden" id="role" name="role" value="Administrador">
                    <input id="created_by" type="hidden" name="created_by" value="default">
                    <input id="input_oculto" type="hidden" name="action" value="store">
                    <input id="id" type="hidden" name="id">
                    <input type="hidden" value="<?= $_SESSION['global_token'] ?>" name="global_token">

                </form>
            </div>
        </div>
    </div>
