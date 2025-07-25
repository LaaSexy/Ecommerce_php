<?php
    session_start();
    $shopData = [
        'currency' => isset($_SESSION['shop_currency']) ? $_SESSION['shop_currency'] : 'USD'
    ];
    function formatCurrency($amount, $currency = 'USD') {
        $symbol = $currency === 'USD' ? '$' : ($currency === 'KHR' ? '៛' : $currency);
        return $symbol . number_format($amount, 2, '.', ',');
    }   
    $slug = isset($_GET['slug']) ? htmlspecialchars($_GET['slug']) : '';
    $total = isset($_GET['total']) ? $_GET['total'] : '0.00';
    $currency = $shopData['currency'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopfinity - Payment</title>
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="./images/Shopfinity.png">
    <link rel="stylesheet" href="./styles/payment.css">
</head>
<body>
    <div class="container-fluid flex-grow-1 pt-5 d-flex flex-column justify-content-center align-items-center">
        <div class="qr-container">
            <img src="./images/KHQR-Display-Aba.png" alt="KHQR Display" class="img-fluid" style="max-width: 100%;">
            <div class="qr-info">
                <h4 class="font-weight-bold">Shopfinity</h4>
                <h5 class="font-weight-bold"><span><?php echo formatCurrency($total, $currency); ?></span></h5>
            </div>
            <img src="./images/QR Code.png" alt="QR Code" class="qr-code">
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./javascript/payment.js"></script>
</body>
</html>