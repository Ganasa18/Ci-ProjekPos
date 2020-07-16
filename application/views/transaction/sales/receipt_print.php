<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyPos - Print Nota</title>
  <style type="text/css">
    html {
      font-family: "Verdana, Arial";
    }

    .content {
      width: 80mm;
      font-size: 12px;
      padding: 5px;
    }

    .title {
      text-align: center;
      font-size: 13px;
      padding-bottom: 5px;
      border-bottom: 1px dashed;
    }

    .head {
      margin-top: 5px;
      margin-bottom: 10px;
      padding-bottom: 10px;
      border-bottom: 1px solid;
    }

    table {
      width: 100%;
      font-size: 12px;
    }

    .thanks {
      margin-top: 10px;
      padding-top: 10px;
      text-align: center;
      border-top: 1px dashed;
    }

    @media print {
      @page {
        width: 80mm;
        margin: 0mm;
      }
    }
  </style>
</head>

<body onload="window.print()">
  <div class="content">
    <div class="title">
      <b>MyStore</b>
      <br>
      Jl.Jambu No.20 Jakarta
    </div>

    <div class="head">
      <table cellspacing="0" cellpadding="0">
        <tr>
          <td style="width: 200px">
            <?php
            echo Date("d/m/Y", strtotime($sales->date)) . " " . Date("H:i", strtotime($sales->sales_created));
            ?>
          </td>
          <td>Cashier</td>
          <td style="text-align: center; width: 10px;">:</td>
          <td style="text-align: right;">
            <?= ucfirst($user['username']); ?>
          </td>
        </tr>
        <tr>
          <td>
            <?= $sales->invoice; ?>
          </td>
          <td>Customer</td>
          <td style="text-align: center">:</td>
          <td style="text-align: right">
            <?= $sales->customer_id == null ? "Umum" : $sales->customer_name; ?>
          </td>
        </tr>
      </table>
    </div>

    <div class="transaction">
      <table class="transaction-table" cellspacing="0" cellpadding="0">
        <?php
        $arr_discount = array();
        foreach ($sales_detail as $key => $value) { ?>
          <tr>
            <td style="width: 165px"><?= $value->name; ?></td>
            <td><?= $value->qty; ?></td>
            <td style="text-align: right; width:80px;"><?= indo_currency($value->price); ?></td>
            <td style="text-align: right; width:80px;">
              <?= indo_currency(($value->price - $value->discount_item) * $value->qty); ?>
            </td>
          </tr>
          <?php
          if ($value->discount_item > 0) {
            $arr_discount[] = $value->discount_item;
          }
        }
        foreach ($arr_discount as $key => $value) { ?>
          <tr>
            <td></td>
            <td colspan="2" style="text-align: right;">Disc. <?= ($key + 1); ?></td>
            <td style="text-align: right;"><?= indo_currency($value); ?></td>
          </tr>
        <?php
        } ?>
        <tr>
          <td colspan="4" style="border-bottom: 1px dashed; padding-top:5px;"></td>
        </tr>

        <tr>
          <td colspan="2"></td>
          <td style="text-align: right; padding-top: 5px;">Sub Total</td>
          <td style="text-align: right; padding-top: 5px;">
            <?= indo_currency($sales->total_price); ?>
          </td>
        </tr>
        <?php if ($sales->discount > 0) : ?>
          <tr>
            <td colspan="2"></td>
            <td style="text-align: right; padding-bottom: 5px;">Disc. Sale</td>
            <td style="text-align: right; padding-bottom: 5px;">
              <?= indo_currency($sales->discount); ?>
            </td>
          </tr>
        <?php endif; ?>
        <tr>
          <td colspan="2"></td>
          <td style="border-top: 1px dashed; text-align: right; padding: 5px 0;">Grand Total</td>
          <td style="border-top: 1px dashed; text-align: right; padding: 5px 0;">
            <?= indo_currency($sales->final_price); ?>
          </td>
        </tr>
        <tr>
          <td colspan="2"></td>
          <td style="border-top: 1px dashed; text-align: right; padding-top: 5px ;">Grand Total</td>
          <td style="border-top: 1px dashed; text-align: right; padding-top: 5px ;">
            <?= indo_currency($sales->cash); ?>
          </td>
        </tr>
        <tr>
          <td colspan="2"></td>
          <td style="text-align: right;">Change</td>
          <td style="text-align: right;">
            <?= indo_currency($sales->change); ?>
          </td>
        </tr>
      </table>
    </div>
    <div class="thanks">
      -- Thank You --
      <br>
      <img src="<?= base_url('vendor/img/download.png') ?>" style="width: 30px;" alt="">
      <br>
      My.Chicken.Yellow
    </div>
  </div>
</body>

</html>