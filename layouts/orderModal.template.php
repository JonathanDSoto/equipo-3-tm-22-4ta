<div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title" id="exampleModelLabel">
                        Create Order
                    </h5>
                </div>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form enctype="multipart/form-data" method="POST" action="">
                <div class="modal-body">
                    <label class="input-group mb-3">Folio</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="folio" name="folio" placeholder="Folio" aria-label="Folio" aria-describedby="basic-addon1">
                    </div>
                    <label class="input-group mb-3">Total</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="total" name="total" placeholder="Total" aria-label="Total" aria-describedby="basic-addon1">
                    </div>
                    <label class="input-group mb-3">Is Paid</label>
                    <div class="btn-group mb-3">
                      <select  id="is_paid" name="is_paid" class="form-select">
                          <ul class="dropdown-menu">
                            <li>
                              <option value="1" class="text-success">Paid</option>
                            </li>
                            <li>
                              <option value="0" class="text-danger">Not Paid</option>
                            </li>
                          </ul>
                      </select>
                    </div>
                    <label class="input-group mb-3">Client</label>
                    <div class="btn-group mb-3">
                      <select  id="client_id" name="client_id" class="form-select">
                          <ul class="dropdown-menu">
                            <li>
                              <option value="0">Name client1</option>
                            </li>
                            <li>
                              <option value="1">Name client2</option>
                            </li>
                            <li>
                              <option value="2">Name client3</option>
                            </li>
                          </ul>
                      </select>
                    </div>
                    <label class="input-group mb-3">Client Addres</label>
                    <div class="btn-group mb-3">
                      <select  id="addres_id" name="addres_id" class="form-select">
                          <ul class="dropdown-menu">
                            <li>
                              <option value="0">Addres 1</option>
                            </li>
                            <li>
                              <option value="1">Addres 2</option>
                            </li>
                            <li>
                              <option value="2">Addres 3</option>
                            </li>
                          </ul>
                      </select>
                    </div>
                    <label class="input-group mb-3">Status</label>
                    <div class="btn-group mb-3">
                      <select  id="order_status_id" name="order_status_id" class="form-select">
                          <ul class="dropdown-menu">
                            <li>
                              <option value="1" class="text-warning">Pendiente de pago</option>
                            </li>
                            <li>
                              <option value="2" class="text-success">Pagada</option>
                            </li>
                            <li>
                              <option value="3" class="text-success">Enviada</option>
                            </li>
                            <li>
                              <option value="4" class="text-danger">Abandonada</option>
                            </li>
                            <li>
                              <option value="5" class="text-warning">Pendiente de enviar</option>
                            </li>
                            <li>
                              <option value="6" class="text-danger">Cancelada</option>
                            </li>
                          </ul>
                      </select>
                    </div>
                    <label class="input-group mb-3">Payment Method</label>
                    <div class="btn-group mb-3">
                      <select  id="payment_type_id" name="payment_type_id" class="form-select">
                          <ul class="dropdown-menu">
                            <li>
                              <option value="1">Cash</option>
                            </li>
                            <li>
                              <option value="2">Card</option>
                            </li>
                            <li>
                              <option value="3">Bank transfer</option>
                            </li>
                          </ul>
                      </select>
                    </div>
                    <label class="input-group mb-3">Coupon</label>
                    <div class="btn-group mb-3">
                      <select  id="coupon_id" name="coupon_id" class="form-select">
                          <ul class="dropdown-menu">
                            <li>
                              <option value="1">Coupon 1</option>
                            </li>
                            <li>
                              <option value="2">Coupon 2</option>
                            </li>
                            <li>
                              <option value="3">Coupon 3</option>
                            </li>
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
            </form>
        </div>
    </div>
</div>