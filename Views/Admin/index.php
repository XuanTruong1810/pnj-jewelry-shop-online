<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../Public/css/config.index.css">
    <link rel="stylesheet" href="../../Public/css/Customer/Customer.css">
    <link rel="stylesheet" href="../../Public/css/Customer/login.css">
    <link rel="stylesheet" href="../../Public/css/Manager/employee.css">
    <link rel="stylesheet" href="../../Public/css/Manager/importproduct.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.4/css/dataTables.dataTables.css">
    <style>
        .btn_option {
            padding: 6px 8px;
            font-size: 10px;
            cursor: pointer;
            border-radius: 6px;
            margin: 0 1px;
        }
    </style>
</head>

<body>

    <div>
        <div class="container-fluid customer ">
            <div class="row">
                <?php require_once './Views/Admin/Layout/Nav.php' ?>

                <div class="col-sm-10 header-right">
                    <?php require_once './Views/Admin/Layout/header.php' ?>

                    <div class="customer_main" style="margin-left: 260px; margin-top: 70px; width: 100%;">
                        <?php require_once './Views/Admin/Pages/' . $data["Page"] . ".php" ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="../../Public/js/dataTables.js"></script>
<script>
    new DataTable('#Data_product', {
        layout: {
            bottomEnd: {
                paging: {
                    boundaryNumbers: false
                }
            }
        }
    });
</script>

</html>