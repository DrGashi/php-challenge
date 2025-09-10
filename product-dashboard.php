<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Product Dashboard</title>
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <nav>
                <ul>
                    <li><a href="signup.php">Add User</a></li>
                    <li><a href="add-product.php">Add Product</a></li>
                    <li><a href="dashboard.php">Users</a></li>
                    <li><a href="product-dashboard.php">Products</a></li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <?php
                include_once("database/config.php");
                $sql="SELECT * FROM products";
                $getProducts=$conn->prepare($sql);
                $getProducts->execute();

                $products=$getProducts->fetchAll();
            ?>
            <table>
                <thead>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Stock Value</th>
                    <th>Delete / Update</th>
                </thead>
                <tbody>
                    <?php
                        foreach($products as $product){
                    ?>
                    <tr>
                        <td><?= $product['id'];?></td>
                        <td><?= $product['title'];?></td>
                        <td><?= $product['description'];?></td>
                        <td><?= $product['quantity'];?>pcs</td>
                        <td><?= $product['price'];?>€</td>
                        <td><?= $product['stock_value'];?>€</td>
                        <td><?= "<a href='product-delete.php?id=$product[id]'>Delete </a>|<a href='product-edit.php?id=$product[id]'> Update</a>"?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>
