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
            <form method="POST" action="<?= BASE_PATH ?>order">
                <div class="modal-body">
                    <label class="input-group mb-3">Folio</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="folio" name="folio" placeholder="Folio" aria-label="Folio" aria-describedby="basic-addon1"
                        onkeypress="return letrasYNumeros(event)">
                    </div>
                    <label class="input-group mb-3">Total</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="total" name="total" placeholder="Total" aria-label="Total" aria-describedby="basic-addon1" 
                        onkeypress="return soloNumeros(event)">
                    </div>
                    <label class="input-group mb-3">Is Paid</label>
                    <div class="btn-group mb-3">
                      <select  id="is_paid" name="is_paid" class="form-select" required>
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
                      <select  @change="onChange($event)"  id="client_id" name="client_id" class="form-select" required>
                          <ul class="dropdown-menu">
                            <li><option value=""></option></li>
                            <?php foreach($clients as $client): ?>
                              <li><option value="<?=$client->id?>"><?=$client->name?></option></li>
                            <?php endforeach; ?>
                          </ul>
                      </select>
                    </div>
                    <label class="input-group mb-3">Client Addres</label>
                    <div class="btn-group mb-3">
                      <select  id="address_id" name="address_id" class="form-select" required>
                          <ul class="dropdown-menu">
                              <li><option v-for="address in addresses" :value="address.id">{{address.street_and_use_number}}</option></li>
                          </ul>
                      </select>
                    </div>
                    <label class="input-group mb-3">Status</label>
                    <div class="btn-group mb-3">
                      <select  id="order_status_id" name="order_status_id" class="form-select" required>
                          <ul class="dropdown-menu">
                            <li>
                              <option value="1" class="text-warning">Pendiente de pago</option>
                            </li>
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
                      <select  id="payment_type_id" name="payment_type_id" class="form-select" required>
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
                      <select  id="coupon_id" name="coupon_id" class="form-select" >
                          <ul class="dropdown-menu">
                            <li><option v-for="coupon in coupons" :value="coupon.id"><p :v-if="'coupon.max_uses'<='coupon.count_uses'">{{coupon.name}}</p></option></li>
                          </ul>
                      </select>
                    </div>
                    <label class="input-group mb-3">Presentations</label>
                    <div class="input-group mb-3" v-for="(item, index) in presentationsOrders">
                        <select  id="presentation_id" :name="'presentations['+index+'][id]'" class="form-select me-1" required>
                          <ul class="dropdown-menu">
                              <?php foreach($products as $product): ?>
                                  <?php foreach($product->presentations as $presentation): ?>
                                    <?php if(($presentation->stock)>($presentation->stock_min)): ?>
                                      <li><option value="<?=$presentation->id?>"><?=$presentation->description?></option></li>
                                    <?php endif; ?>
                                  <?php endforeach; ?>  
                              <?php endforeach; ?>
                          </ul>  
                        </select>
                        <input id="quantity" :name="'presentations['+index+'][quantity]'" type="number" class="form-control me-2" style="max-width: 60px;">
                    </div>
                    <div class="col-sm">
                      <div class="d-flex justify-content-sm-end">
                          <div>
                            <button @click="addPresentation()" type="button" class="btn btn-success waves-effect waves-light"><i class="bx bx-plus "></i></button>
                          </div>
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
                <input type="hidden" value="<?= $_SESSION['global_token'] ?>" name="global_token">

            </form>
        </div>
    </div>
</div>