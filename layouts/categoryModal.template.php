<div class="modal fade" id="categorieModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div v-if="(modal=='edit')">
                    <h5 class="modal-title" id="exampleModelLabel">
                        Edit Category
                    </h5>
                </div>
                <div v-else>
                    <h5 class="modal-title" id="exampleModelLabel">
                        Create Category
                    </h5>
                </div>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="<?=BASE_PATH?>category">
                <div class="modal-body">
                    <label class="input-group mb-3">Name</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name(s)" aria-label="Name" aria-describedby="basic-addon1" onkeypress="return letrasYNumeros(event)" required>
                    </div>
                    <label class="input-group mb-3">Description</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control"  id="description" name="description" placeholder="Description" aria-label="description" aria-describedby="basic-addon1" maxlength="100">
                    </div>
                    <div >
                        <label class="input-group mb-3">Slug</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" aria-label="slug" aria-describedby="basic-addon1" onkeypress="return letrasYNumeros(event)" required>
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

                <input id="input_oculto" type="hidden" name="action" value="create">
                <input id="id" type="hidden" name="id">
                <input type="hidden" value="<?= $_SESSION['global_token'] ?>" name="global_token">

            </form>
        </div>
    </div>
</div>