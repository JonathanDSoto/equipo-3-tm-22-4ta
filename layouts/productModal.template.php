<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div v-if="(modal=='edit')">
                        <h5 class="modal-title" id="exampleModelLabel">
                            Edit Product
                        </h5>
                    </div>
                    <div v-else>
                        <h5 class="modal-title" id="exampleModelLabel">
                            Create Product
                        </h5>
                    </div>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form enctype="multipart/form-data" method="POST" action="<?= BASE_PATH ?>product">
                    <div class="modal-body">
                        <div v-if="(modal=='create')">
                            <div class="input-group mb-3 mt-4">
                                <label class="form-label">Product IMG</label>
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control form-control-sm" name="cover" type="file" required
                                title="Requiere seleccionar una imagen">
                            </div>
                        </div>
                        <label class="input-group mb-3">Name</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name(s)" aria-label="Name(s)" aria-describedby="basic-addon1" onkeypress="return letrasYNumeros(event)" required>
                        </div>
                        <label class="input-group mb-3">Slug</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control"  id="slug" name="slug" placeholder="Slug" aria-label="slug" aria-describedby="basic-addon1" required>
                        </div>
                        <div >
                            <label class="input-group mb-3">Description</label>
                            <div class="input-group mb-3">
                                <textarea class="form-control" id="description" name="description" placeholder="Description" aria-label="description" id="floatingTextarea1" style="height: 100px" maxlength="150"
                                title="Máximo 150 carácteres"></textarea>
                            </div>
                        </div>
                        <div>
                            <label class="input-group mb-3">Features</label>
                            <div class="input-group mb-3">
                                <textarea class="form-control" id="features" name="features" placeholder="Features" aria-label="features" id="floatingTextarea2" style="height: 150px" maxlength="300"
                                title="Máximo 300 carácteres"></textarea>
                            </div>
                        </div>
                        <label class="input-group mt-2 mb-3">Brand</label>
                        <div class="btn-group mb-3">
                            <select  id="brand_id" name="brand_id" class="form-select" required>
                                <ul class="dropdown-menu">
                                    <?php foreach($brands as $brand): ?>
                                        <li><option value="<?php echo $brand->id ?>"><?= $brand->name ?></option></li>
                                     <?php endforeach ?>
                                </ul>
                            </select>
                        </div>
                        <div class="row text-center">
                            <label class="input-group mt-2 mb-3">Categories</label>
                            <div class="col-5 form-check form-check-inline" v-for="(category, index)  in categories">
                                <input :id='category.id+"c"' name="categories[]" class="form-check-input" type="checkbox" id="inlineCheckbox2" :value="category.id">
                                <label class="form-check-label" for="inlineCheckbox2">{{category.name}}</label>
                            </div>
                        </div>
                        <div class="row text-center">
                            <label class="input-group mt-4 mb-3">Tags</label>
                            <div class="col-5 form-check form-check-inline" v-for="(tag, index)  in tags">
                                <input :id='tag.id+"t"' name="tags[]" class="form-check-input" type="checkbox" id="inlineCheckbox1" :value="tag.id">
                                <label class="form-check-label" for="inlineCheckbox1">{{tag.name}}</label>
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