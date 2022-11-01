<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-light p-3">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
        </div>
        <form method="POST" method="POST" action="<?= BASE_PATH ?>order">
          <div class="modal-body">
            <div>
              <label for="status-field" class="form-label">Status </label>
              <br>
              <select id="order_status_id" name="order_status_id" class="custom-select">
                <option value="1">Pendiente de pago</option>
                <option value="2">Pagada</option>
                <option value="3">Enviada</option>
                <option value="4">Abandonada</option>
                <option value="5">Pendiente de enviar</option>
                <option value="6">Cancelada</option>
              </select>  
            </div>
          </div>
          <div class="modal-footer">
            <div class="hstack gap-2 justify-content-end">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
              <button type="submit"s class="btn btn-success" id="edit-btn">Update</button>
            </div>
          </div>

          <input id="input_oculto" type="hidden" name="action" value="update">
          <input id="id" type="hidden" name="id">
          <input type="hidden" value="<?= $_SESSION['global_token'] ?>" name="global_token">

        </form>
      </div>
    </div>
</div>