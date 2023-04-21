<?php
    include './models/ConnectSQL.php';
    $result = mysqli_query($conn, "SELECT * FROM products");
    mysqli_close($conn);
?>

<body id="reportsPage">
    <div class="container mt-5">
        <div class="row tm-content-row">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-products">
                    <div class="tm-product-table-container">
                        <table class="table table-hover tm-table-small tm-product-table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col"> NAME</th>
                                    <th scope="col"> SOLD</th>
                                    <th scope="col">price</th>
                                    <th scope="col">IMAGE</th>
                                    <th scope="col">create_time</th>
                                    <th scope="col">updata_time</th>
                                    <th scope="col">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_array($result)) { ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['description'] ?></td>
                                    <td><?= $row['price'] ?></td>
                                    <td><img src="<?= $row['image'] ?>" value="<?= $row['name'] ?>"></td>
                                    <td><?= $row['updated_at'] ?></td>
                                    <td><?= $row['created_at'] ?></td>
                                    <td><button class="edit-btn" data-user-id="<?= $row['id'] ?>">Sửa</button></td>
                                    <td><button class="delete-btn" data-user-id="<?= $row['id'] ?>">Xóa</button></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <a href="index.php?page=add-product" class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>
                    <button class="btn btn-primary btn-block text-uppercase">Delete selected products</button>
                </div>
            </div>
        </div>
    </div>
</body>
