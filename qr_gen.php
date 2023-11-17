<?php

declare(strict_types=1);

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

require_once('./vendor/autoload.php');

$options = new QROptions(
  [
    'eccLevel' => QRCode::ECC_L,
    'outputType' => QRCode::OUTPUT_MARKUP_SVG,
    'version' => 10,
  ]
);

$qrcode = null;

if(isset($_POST["text"]) && !empty($_POST["text"])){
    $data = $_POST["text"];
    $qrcode = (new QRCode($options))->render($data);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Create QR Codes in PHP</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <h1>Wygeneruj kod QR</h1>
    <div class="container">
      <form method="POST" action="qr_gen.php">
        <textarea name="text"></textarea><br />
        <input type="submit" value="Wygeneruj" />
      </form>
      <?php
        if ($qrcode !== null) {
          echo "<img src=" . $qrcode . ' alt="QR Code" width="400" height="400" />';
        }    
      ?>
    </div>
  </body>
</html>