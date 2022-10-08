<?php include('./components/header.php') ?>

    <div class="container">
        <h2>List of Clients</h2>
        <a href="./create.php" class="btn btn-primary btn-md mt-3" role="button">New Client</a>
        
        <table class="table mt-3">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </thead>
            <?php foreach($clients_data as $data): ?>
                <tr>
                    <td><?php echo $data['id'] ?></td>
                    <td><?php echo $data['name'] ?></td>
                    <td><?php echo $data['email'] ?></td>
                    <td><?php echo $data['phone'] ?></td>
                    <td><?php echo $data['address'] ?></td>
                    <td><?php echo $data['date'] ?></td>
                    <td>
                        <a href="/02-PHP_CRUD/update.php?id=<?php echo $data['id']?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="/02-PHP_CRUD/delete.php?id=<?php echo $data['id']?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>

        </table>
    </div>

<?php include('./components/footer.php') ?>
