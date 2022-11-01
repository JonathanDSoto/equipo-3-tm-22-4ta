<div class="modal fade" id="couponModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div v-if="(modal=='edit')">
                    <h5 class="modal-title" id="exampleModelLabel">
                        Edit Coupon
                    </h5>
                </div>
                <div v-else>
                    <h5 class="modal-title" id="exampleModelLabel">
                        Create Coupon
                    </h5>
                </div>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form enctype="multipart/form-data" method="POST" action="<?= BASE_PATH ?>coupon">
                <div class="modal-body">
                    <label class="input-group mb-3">Name</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" aria-label="Name" aria-describedby="basic-addon1" required>
                    </div>
                    <label class="input-group mb-3">Code</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="code" name="code" placeholder="Code" aria-label="Code" aria-describedby="basic-addon1" onkeypress="return letrasYNumeros(event)" required>
                    </div>
                    <label class="input-group mb-3">Percentage Discount</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="percentage_discount" name="percentage_discount" placeholder="Percentage Discount" aria-label="percentage_discount" aria-describedby="basic-addon1"
                        onkeypress="return soloNumeros(event)" required>
                    </div>
                    <div v-if="(modal=='edit')">
                        <label class="input-group mb-3">Amount Discount</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="amount_discount" name="amount_discount" placeholder="Amount Discount" aria-label="amount_discount" aria-describedby="basic-addon1" 
                            onkeypress="return soloNumeros(event)" required>
                        </div> 
                    </div>
                    <label class="input-group mb-3">Min Amount Required</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="min_amount_required" name="min_amount_required" placeholder="Min Amount Required" aria-label="min_amount_required" aria-describedby="basic-addon1"
                        onkeypress="return soloNumeros(event)" required>
                    </div>
                    <label class="input-group mb-3">Min Product Required</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="min_product_required" name="min_product_required" placeholder="Min Product Required" aria-label="min_product_required" aria-describedby="basic-addon1"
                        onkeypress="return soloNumeros(event)" required>
                    </div>
                    <label class="input-group mb-3">Start Date</label>
                    <div class="input-group mb-3">
                        <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Start Date" aria-label="start_date" aria-describedby="basic-addon1" required
                        title="Seleccione una fecha de inicio">
                    </div>
                    <label class="input-group mb-3">End Date</label>
                    <div class="input-group mb-3">
                        <input type="date" class="form-control" id="end_date" name="end_date" placeholder="End Date" aria-label="end_date" aria-describedby="basic-addon1" required
                        title="Seleccione una fecha de finalización">
                    </div>
                    <label class="input-group mb-3">Max Uses</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="max_uses" name="max_uses" placeholder="Max Uses" aria-label="max_uses" aria-describedby="basic-addon1" 
                        onkeypress="return soloNumeros(event)" required>
                    </div>

                    <label class="input-group mb-3">Valid Only First Purchase</label>
                    <div class="btn-group mb-3">
                        <select  id="valid_only_first_purchase" name="valid_only_first_purchase" class="form-select" required>
                            <ul class="dropdown-menu">
                                <li><option value="0">Only First Purchase</option></li>
                            </ul>
                            <ul class="dropdown-menu">
                                <li><option value="1">All Purchase</option></li>
                            </ul>
                        </select>
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
                <div v-if="(modal!='edit')">
                    <input id="amount_discount" type="hidden" name="amount_discount">
                </div>
                <input type="hidden" id="count_uses" name="count_uses" value="1">
                <input id="input_oculto" type="hidden" name="action" value="create">
                <input id="id" type="hidden" name="id">
                <input id="_status" type="hidden" name="status">
                <input type="hidden" value="<?= $_SESSION['global_token'] ?>" name="global_token">

            </form>
        </div>
    </div>
</div>