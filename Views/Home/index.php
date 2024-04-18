<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../Public/css/config.index.css">
    <link rel="stylesheet" href="../../Public/css/Home/header.css">
    <link rel="stylesheet" href="../../Public/css/Home/footer.css">
    <link rel="stylesheet" href="../../Public/css/Home/detail.css">
    <link rel="stylesheet" href="../../Public/css/Home/cart.css">

</head>

<body>
    <div class="app">
        <?php require_once './Views/Home/Layout/Header.php' ?>
        <main style="margin-top: 150px;">
            <div class="container">
                <?php require_once './Views/Home/Pages/' . $data["Page"] . ".php" ?>
            </div>
        </main>
        <?php require_once './Views/Home/Layout/Footer.php' ?>
    </div>
</body>
<script src="../../Public/js/Location.js"></script>
<script>
    const VND = new Intl.NumberFormat('vi-VN', {
        style: 'currency',
        currency: 'VND',
        currencyDisplay: 'code'
    });

    function updatePrice(selectedSize) {
        var selectedPrice = selectedSize.getAttribute("data-price");
        document.getElementById("product-price").innerText = "Giá: " + VND.format(selectedPrice);
    }
</script>

</html>