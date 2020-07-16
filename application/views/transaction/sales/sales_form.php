<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"> <?= $title; ?> </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-fw fa-tachometer-alt"></i></a>
          <li class="breadcrumb-item active">Sales</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"> Kasir </h3>
          </div>
          <form class="form-horizontal">
            <div class="card-body">
              <div class="form-group row">
                <label for="date" class="col-sm-4 col-form-label"> Date </label>
                <div class="col-sm-8">
                  <input type="date" class="form-control" id="date" value="<?= date('Y-m-d') ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="user" class="col-sm-4 col-form-label"> Kasir </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="user" value="<?= $user['username'] ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="customer" class="col-sm-4 col-form-label"> Customer </label>
                <div class="col-sm-8">
                  <select name="customer" id="customer" class="form-control">
                    <option value=""> Umum </option>
                    <?php foreach ($customer as $c => $data) {
                      echo '<option value="' . $data->customer_id . '">' . $data->name . '</option>';
                    } ?>
                  </select>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"></h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="3%">#</th>
                    <th> Barcode </th>
                    <th> Product item </th>
                    <th class="text-center"> Price </th>
                    <th class="text-center"> Qty </th>
                    <th class="text-center" width="10%"> Discount </th>
                    <th class="text-center" width="15%"> Total </th>
                    <th class="text-center"> Action </th>
                  </tr>
                </thead>
                <tbody id="cart_table">
                  <?php $this->view('transaction/sales/cart_data'); ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"> Barang </h3>
          </div>
          <div class="form-group row input-group col-lg mt-3">
            <label for="barcode" class="col-sm-3 col-form-label">Barcode </label>
            <input type="hidden" id="item_id">
            <input type="hidden" id="price">
            <input type="hidden" id="stock">
            <input type="text" class="form-control" id="barcode" placeholder="Barcode" autofocus readonly>
            <span class="input-group-append">
              <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
          <div class="form-group row input-group col-lg mt-3">
            <label for="qty" class="col-sm-3 ml-1 col-form-label"> Qty </label>
            <input type="number" class="form-control" id="qty" name="qty" value="1" min="1">
          </div>
          <div class="card-footer mb-4">
            <button id="add_cart" class="btn btn-info"><i class="fas fa-cart-plus "></i> Tambah</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title"></h3>
          </div>
          <form class="form-horizontal">
            <div class="card-body">
              <div class="form-group row">
                <label for="sub_total" class="col-sm-4 col-form-label"> Subtotal </label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" id="sub_total" value="" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="discount" class="col-sm-4 col-form-label"> Discount </label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" id="discount" value="0" min="0">
                </div>
              </div>
              <div class="form-group row">
                <label for="grand_total" class="col-sm-4 col-form-label"> Grandtotal </label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" id="grand_total" value="" readonly>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card card-info" style="height : 94%;">
          <div class=" card-header">
            <h3 class="card-title"></h3>
          </div>
          <form class="form-horizontal">
            <div class="card-body">
              <div class="form-group row">
                <label for="cash" class="col-sm-4 col-form-label"> Cash </label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" id="cash" value="0" min="0">
                </div>
              </div>
              <div class="form-group row">
                <label for="change" class="col-sm-4 col-form-label"> Change </label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" id="change" readonly>
                </div>
              </div>
            </div>
          </form>
          <div class="col-lg text-right">
            <button type="reset" id="reset" class="btn btn-warning ml-3"><i class="fas fa-retweet"></i></i> Cancel </button>
            <button id="process_payment" class="btn btn-success ml-3"><i class="fas fa-cart-arrow-down"></i> Process Payment </button>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card card-info" style="height : 94%;">
          <div class="card-header">
            <h3 class="card-title"></h3>
          </div>
          <div class="card-body">
            <div align="right">
              <h4>Invoice <b><span id="invoice"><?= $invoice; ?></span></b></h4>
            </div>
            <hr>
            <div align="center">
              <h1><b><span id="grand_total2" style="font-size: 60pt; ">0</span></b></h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal Add Product Item -->
<div class="modal fade show" id="modal-item">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> Item </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th> Barcode </th>
                <th> Name </th>
                <th> Price </th>
                <th> Stock </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($item as $i => $data) : ?>
                <tr>
                  <td><?= $data->barcode; ?></td>
                  <td><?= $data->name; ?></td>
                  <td class="text-right"><?= indo_currency($data->price); ?></td>
                  <td class="text-right"><?= $data->stock; ?></td>
                  <td>
                    <button class="btn btn-block btn-outline-secondary" id="select" data-id="<?= $data->item_id; ?>" data-barcode="<?= $data->barcode; ?>" 
                    data-price="<?= $data->price; ?>" data-stock="<?= $data->stock; ?>">
                      <i class="fa fa-check-circle"> Select </i>
                    </button>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Cart Item -->
<div class="modal fade show" id="modal-item-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> Edit Item </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="cartid_item">
        <div class="form-group">
          <label for="product_item">Product Item</label>
          <div class="row">
            <div class="col-md-5">
              <input type="text" id="barcode_item" class="form-control" readonly>
            </div>
            <div class="col-md-7">
              <input type="text" id="product_item" class="form-control" readonly>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="price_item">Price Item</label>
          <input type="text" id="price_item" class="form-control" min="0">
        </div>
        <div class="form-group">
          <label for="qty_item">Qty</label>
          <input type="text" id="qty_item" class="form-control" min="1">
        </div>
        <div class="form-group">
          <label for="total_before">Total before Discount</label>
          <input type="text" id="total_before" class="form-control" readonly>
        </div>
        <div class="form-group">
          <label for="discount_item">Discount per Item</label>
          <input type="text" id="discount_item" class="form-control" min="0">
        </div>
        <div class="form-group">
          <label for="total_item">Total After Discount</label>
          <input type="text" id="total_item" class="form-control" min="0" readonly>
        </div>
        <div class="modal-footer">
          <div class="modal-footer justify-content-between">
            <button type="button" id="edit_cart" class="btn btn-primary btn-flat">
              <i class="fas fa-save"></i> Save
            </button>
            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script>
    // SELECT ITEM
    $(document).on('click', '#select', function() {
      $('#item_id').val($(this).data('id'))
      $('#barcode').val($(this).data('barcode'))
      $('#price').val($(this).data('price'))
      $('#stock').val($(this).data('stock'))
      $('#modal-item').modal('hide');
    })

    // ADD CART
    $(document).on('click', '#add_cart', function() {
      var item_id = $('#item_id').val()
      var price = $('#price').val()
      var stock = $('#stock').val()
      var qty = $('#qty').val()
      if (item_id == '') {
        Swal.fire({
          text: 'Produk Belum dipilih',
          type: 'warning'
        })
        $('#barcode').focus()
      } else if (stock < 1) {
        Swal.fire({
          text: 'Stock tidak mencukupi',
          type: 'error'
        })
        $('#item_id').val('')
        $('#barcode').val('')
        $('#barcode').focus()
      } else {
        $.ajax({
          type: 'POST',
          url: '<?= site_url('sales/process'); ?>',
          data: {
            'add_cart': true,
            'item_id': item_id,
            'price': price,
            'qty': qty
          },
          dataType: 'json',
          success: function(result) {
            if (result.success == true) {
              $('#cart_table').load('<?= site_url('sales/cart_data') ?>', function() {
                calculate()
              })
              Swal.fire({
                text: 'Berhasil menambah keranjang',
                type: 'success'
              })
              $('#item_id').val('')
              $('#barcode').val('')
              $('#qty').val(1)
              $('#barcode').focus()
            } else {
              Swal.fire({
                text: 'Gagal menambah data',
                type: 'error'
              })
            }
          }
        })
      }
    })

    // DELETE CART
    $(document).on('click', '#del_cart', function() {
      if (confirm('Apakah Anda yakin ?')) {
        var cart_id = $(this).data('cartid')
        $.ajax({
          type: 'POST',
          url: '<?= site_url('sales/cart_del'); ?>',
          dataType: 'JSON',
          data: {
            'cart_id': cart_id
          },
          success: function(result) {
            if (result.success == true) {
              $('#cart_table').load('<?= site_url('sales/cart_data') ?>', function() {
                calculate()
              })
            } else {
              alert('Gagal hapus item cart')
            }
          }
        })
      }
    })

    // EDIT CART
    $(document).on('click', '#update_cart', function() {
      $('#cartid_item').val($(this).data('cartid'))
      $('#barcode_item').val($(this).data('barcode'))
      $('#product_item').val($(this).data('product'))
      $('#price_item').val($(this).data('price'))
      $('#qty_item').val($(this).data('qty'))
      $('#total_before').val($(this).data('price') * $(this).data('qty'))
      $('#discount_item').val($(this).data('discount'))
      $('#total_item').val($(this).data('total'))
      $('#modal-item').modal('hide');
    })

    // COUNT EDIT
    function count_edit_modal() {
      var price = $('#price_item').val()
      var qty = $('#qty_item').val()
      var discount = $('#discount_item').val()

      total_before = price * qty
      $('#total_before').val(total_before)

      total = (price - discount) * qty
      $('#total_item').val(total)

      if (discount == '') {
        $('#discount_item').val(0)
      }
    }
    // Jika diskon dimasukan akan mengurangi harga awal
    $(document).on('keyup mouseup', '#price_item, #qty_item, #discount_item', function() {
      count_edit_modal()
    })

    // EDIT UPDATE DATABASE

    $(document).on('click', '#edit_cart', function() {
      var cart_id = $('#cartid_item').val()
      var price = $('#price_item').val()
      var qty = $('#qty_item').val()
      var discount = $('#discount_item').val()
      var total = $('#total_item').val()
      if (price == '' || price < 1) {
        Swal.fire({
          text: 'Harga tidak boleh kosong',
          type: 'warning'
        })
        $('#price_item').focus()
      } else if (qty == '' || qty < 1) {
        Swal.fire({
          text: 'Quantity Tidak Boleh Kurang Dari 1',
          type: 'warning'
        })
        $('#qty_item').focus()
      } else {
        $.ajax({
          type: 'POST',
          url: '<?= site_url('sales/process'); ?>',
          data: {
            'edit_cart': true,
            'cart_id': cart_id,
            'price': price,
            'qty': qty,
            'discount': discount,
            'total': total,
          },
          dataType: 'json',
          success: function(result) {
            if (result.success == true) {
              $('#cart_table').load('<?= site_url('sales/cart_data') ?>', function() {
                calculate()
              })
              Swal.fire({
                text: 'update cart item berhasil ',
                type: 'success'
              })
              $('#modal-item-edit').modal('hide');
            } else {
              Swal.fire({
                text: 'Data cart tidak ter-update, atau Data cart sama',
                type: 'error'
              })
            }
          }
        })
      }
    })

    function calculate() {
      var subtotal = 0;
      $('#cart_table tr').each(function() {
        subtotal += parseInt($(this).find('#total').text())
      })
      isNaN(subtotal) ? $('#sub_total').val(0) : $('#sub_total').val(subtotal)

      var discount = $('#discount').val()
      var grand_total = subtotal - discount
      if (isNaN(grand_total)) {
        $('#grand_total').val(0)
        $('#grand_total2').text(0)
      } else {
        $('#grand_total').val(grand_total)
        $('#grand_total2').text(grand_total)
      }
      var cash = $('#cash').val();
      cash != 0 ? $('#change').val(cash - grand_total) : $('#change').val(0)

      if (discount == '') {
        $('#discount').val(0)
      }
    }
    // Kalkuasi Discount
    $(document).on('keyup mouseup', '#discount, #cash', function() {
      calculate()
    })
    // Fungsi Kalkulasi Saat halaman di load
    $(document).ready(function() {
      calculate()
    })

    $(document).on('click', '#process_payment', function() {
      var customer_id = $('#customer').val()
      var subtotal = $('#sub_total').val()
      var discount = $('#discount').val()
      var grandtotal = $('#grand_total').val()
      var cash = $('#cash').val()
      var change = $('#change').val()
      var note = $('#note').val()
      var date = $('#date').val()

      if (subtotal < 1) {
        // alert('Belum ada product item yang di pilih')

        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
        });

        Toast.fire({
          text: 'Belum ada product item yang di pilih',
          type: 'info'
        });
        $('#barcode').focus()
      } else if (cash < 1) {
        // alert('Jumlah uang cash belum di input')

        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
        });

        Toast.fire({
          text: 'Jumlah uang cash belum di input',
          type: 'warning'
        });
        $('#cash').focus()
      } else {
        if (confirm('Yakin melakukan proses transaksi ?')) {
          $.ajax({
            type: 'POST',
            url: '<?= site_url('sales/process') ?>',
            data: {
              'process_payment': true,
              'customer_id': customer_id,
              'subtotal': subtotal,
              'discount': discount,
              'grandtotal': grandtotal,
              'cash': cash,
              'change': change,
              'date': date,
            },
            dataType: 'JSON',
            success: function(result) {
              if (result.success) {
                Swal.fire({
                  text: 'Transaksi berhasil ',
                  type: 'success'
                })
                window.open('<?= site_url('sales/cetak/') ?>' + result.sales_id, '_blank')
              } else {
                Swal.fire({
                  text: 'Transaksi gagal ',
                  type: 'error'
                })
                location.href = '<?= site_url('sales') ?>'
              }
            }
          })
        }
      }
    })
    //Reset Form
    $(document).on('click', '#reset', function() {
      if (confirm('Apakah Anda Yakin')) {
        $.ajax({
          type: 'POST',
          url: '<?= site_url('sales/reset') ?>',
          data: {
            'reset': true
          },
          dataType: 'JSON',
          success: function(result) {
            if (result.success) {
              Swal.fire({
                text: 'Berhasil Reset ',
                type: 'success'
              })
              location.href = '<?= site_url('sales') ?>'
            } else {
              Swal.fire({
                text: 'Gagal Reset ',
                type: 'error'
              })
            }
          }
        })
        $('#discount').val(0)
        $('#cash').val(0)
        $('#sub_total').val(0)
        $('#grand_total').val(0)
        $('#grand_total2').text('0')
        $('#change').val(0)
        $('#customer').val(0).change()
        $('#barcode').val('')
        $('#barcode').focus()
      }
    })
  </script>