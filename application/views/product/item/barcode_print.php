<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url() ?>vendor/adminlte/dist/css/adminlte.min.css">
  <title>Barcode Product <?= $row->barcode ?></title>
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
            <th> Barcode </th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center">
            <td>
              <?php
              $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
              echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '" style="width: 250px">';
              ?>

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