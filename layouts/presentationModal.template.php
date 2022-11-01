<div class="modal fade" id="presentationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div v-if="(modal=='edit')">
                        <h5 class="modal-title" id="exampleModelLabel">
                            Edit Presentation
                        </h5>
                    </div>
                    <div v-else-if="(modal=='editPrice')">
                        <h5 class="modal-title" id="exampleModelLabel">
                            Edit Price
                        </h5>
                    </div>
                    <div v-else>
                        <h5 class="modal-title" id="exampleModelLabel">
                            Create Presentation
                        </h5>
                    </div>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form enctype="multipart/form-data" method="POST" action="<?= BASE_PATH ?>presentation">
                    <div class="modal-body" v-if="(modal=='editPrice')">
                        <label class="input-group mb-3">Amount</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" aria-label="amount" onkeypress="return soloNumeros(event)"></input>
                        </div>
                    </div>
                    <div class="modal-body" v-else>
                        <div v-if="(modal=='create')">
                            <div class="input-group mb-3 mt-4">
                                <label class="form-label">Presentation IMG</label>
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control form-control-sm" name="cover" type="file">
                            </div>
                        </div>
                        <label class="input-group mb-3">Description</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="description" name="description" placeholder="Description" aria-label="description" aria-describedby="basic-addon1">
                        </div>
                        <label class="input-group mb-3">Code</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control"  id="code" name="code" placeholder="Code" aria-label="code" aria-describedby="basic-addon1">
                        </div>
                        <div >
                            <label class="input-group mb-3">Weight in Grams</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="weight_in_grams" name="weight_in_grams" placeholder="Weight" aria-label="weight_in_grams" onkeypress="return soloNumeros(event)"></input>
                            </div>
                        </div>
                        <div>
                            <label class="input-group mb-3">Stock</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="stock" name="stock" placeholder="Stock" aria-label="stock" onkeypress="return soloNumeros(event)"></input>
                            </div>
                        </div>
                        <div>
                            <label class="input-group mb-3">Minimum Stock</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="stock_min" name="stock_min" placeholder="Stock min" aria-label="stock_min" onkeypress="return soloNumeros(event)"></input>
                            </div>
                        </div>
                        <div>
                            <label class="input-group mb-3">Maximum Stock</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="stock_max" name="stock_max" placeholder="Stock Max" aria-label="stock_max" onkeypress="return soloNumeros(event)"></input>
                            </div>
                        </div>
                        <div v-if="(modal=='create')">
                            <label class="input-group mb-3">Amount</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" aria-label="amount" onkeypress="return soloNumeros(event)"></input>
                            </div>
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

                    <input id="input_oculto" type="hidden" name="action">
                    <input id="idpr" type="hidden" name="id">
                    <input id="statuspr" type="hidden" name="status" value="active">
                    <input id="product_id" type="hidden" name="product_id" :value="product.id">
                    <input type="hidden" value="<?= $_SESSION['global_token'] ?>" name="global_token">

                </form>
            </div>
        </div>
    </div>