<div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div v-if="(modal=='edit')">
                        <h5 class="modal-title" id="exampleModelLabel">
                            Edit Address
                        </h5>
                    </div>
                    <div v-else>
                        <h5 class="modal-title" id="exampleModelLabel">
                            Create Address
                        </h5>
                    </div>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form enctype="multipart/form-data" method="POST" action="<?= BASE_PATH ?>address">
                    <div class="modal-body">
                        <label class="input-group mb-3">First Name</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" aria-label="First Name" aria-describedby="basic-addon1" onkeypress="return soloLetras(event)" required>
                        </div>
                        <label class="input-group mb-3">Last Name</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" aria-label="Last Name" aria-describedby="basic-addon1" onkeypress="return soloLetras(event)" required>
                        </div>
                        <label class="input-group mb-3">Street and Number</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="street_and_use_number" name="street_and_use_number" placeholder="Street and Number" aria-label="Streetnumber" aria-describedby="basic-addon1"
                            required title="Requiere de mínimo 4 carácteres y máximo de 100 carácteres" minlength="4" maxlength="100">
                        </div>
                        <label class="input-group mb-3">Apartment</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control"  id="apartment" name="apartment" placeholder="Apartment" aria-label="Apartment" aria-describedby="basic-addon1" onkeypress="return soloNumeros(event)" required>
                        </div>
                        <label class="input-group mb-3">Postal Code</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control"  id="postal_code" name="postal_code" placeholder="Postal Code" aria-label="Postal Code" aria-describedby="basic-addon1" onkeypress="return soloNumeros(event)" required>
                        </div>
                        <label class="input-group mb-3">City</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control"  id="city" name="city" placeholder="City" aria-label="City" aria-describedby="basic-addon1" onkeypress="return soloLetras(event)" required>
                        </div>
                        <label class="input-group mb-3">Province</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control"  id="province" name="province" placeholder="Province" aria-label="Province" aria-describedby="basic-addon1" onkeypress="return soloLetras(event)" required>
                        </div>
                        <label class="input-group mb-3">Phone Number</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number" aria-label="phone_number" aria-describedby="basic-addon1" onkeypress="return soloNumeros(event)" required>
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

                    <input id="input_oculto" type="hidden" name="action" value="store">
                    <input id="id" type="hidden" name="id">
                    <input id="is_billing_address" type="hidden" name="is_billing_address">
                    <input id="client_id" type="hidden" name="client_id" value="<?= $client->id ?>">
                    <input type="hidden" value="<?= $_SESSION['global_token'] ?>" name="global_token">

                </form>
            </div>
        </div>
    </div>