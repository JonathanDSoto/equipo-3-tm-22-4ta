<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-light p-3">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
        </div>
        <form>
          <div class="modal-body">
            <div>
              <label for="status-field" class="form-label">Status </label>
              <br>
              <select class="custom-select" id="gender2">
                <option selected>Choose...</option>
                <option value="1">Pendiente de pago</option>
                <option value="2">Pagada</option>
                <option value="3">Enviada</option>
                <option value="4">Abandonada</option>
                <option value="5">Pendiente de enviar</option>
                <option value="6">Cancelada</option>
              </select>  
            </div>
          </div>
          <!-- <div class="modal-body">
            <div>
              <label for="status-field" class="form-label">Quantity</label>
              <input type="number" class="input-group me-3" name="" id="">
            </div>
          </div> -->
          <div class="modal-footer">
            <div class="hstack gap-2 justify-content-end">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-success" id="edit-btn">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>