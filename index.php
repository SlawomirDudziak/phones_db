<?php

/** @var $pdo \PDO */
require_once "database.php";

$search = $_GET['search'] ?? '';
if ($search) {
    $statement = $pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC');
    $statement->bindValue(':title', "%$search%");
} else {
    $statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
}
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);


?>

<?php include_once "partials/header.php" ?>

  <body>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <h1>Phones DB</h1>

    <p>
        <a href="create.php" class="btn btn-success">Add phone</a>
    </p>

    <form action="">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search for phones" name="search" value="<?php echo $search ?>">
            <button class="btn btn-outline-secondary" type="submit" >Search</button>
        </div>
    </form>
    

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Model</th>
      <th scope="col">Data</th>
      <th scope="col">Price [zł]</th>
      <th scope="col">Create Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($products as $i => $product): ?>
        <tr>
            <th scope="row"><?php echo $i + 1 ?></th>
            <td>
                <img src="<?php echo $product['image'] ?>" class="thumb-image">
            </td>
            <td><?php echo $product['title']; ?></td>
            <td><?php echo $product['description']; ?></td>
            <td><?php echo $product['price']; ?></td>
            <td><?php echo $product['create_date']; ?></td>
            <td>
                <a href="update.php?id=<?php echo $product['id'] ?>" class="btn btn-outline-primary">Edit</a>
                <form style="display: inline-block;" action="delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>
  </body>
</html>
