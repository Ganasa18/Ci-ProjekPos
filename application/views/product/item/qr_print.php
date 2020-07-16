<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url() ?>vendor/adminlte/dist/css/adminlte.min.css">
  <title>QR Product <?= $row->barcode ?></title>
</head>

<body>
  <div class="container">
    <h1 class="text-center">
      Product Print
    </h1>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr class="text-center">
            <th> Product </th>
            <th> QR </th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center">
            <td>
              <br>
              <img src="uploads/qr-code/item-<?= $row->barcode ?>.png" style="width: 250px">
            </td>
            <td>
              <?= $row->barcode  ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>