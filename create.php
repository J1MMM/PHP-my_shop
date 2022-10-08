<?php include('./components/header.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" ></script>
</head>
<body>
    <div class="container w-100 my-5">

        <?php echo $success_message ?
            "<div class='alert alert-success alert-dismissible fade show'>
                <strong>$success_message</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' ></button>
            </div>" : null
        ?>
        <?php echo $error_message ? 
            "<div class='alert alert-warning alert-dismissible fade show'>
                <strong>$error_message</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' ></button>
            </div>" : null
        ?>

        <h2>New Client</h2>

        <form method="POST">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input
                        type="text" 
                        name="name" 
                        value="<?php echo $name ?>" 
                        class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input 
                        type="text" 
                        name="email" 
                        value="<?php echo $email ?>" 
                        class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input 
                        type="text" 
                        name="phone" 
                        value="<?php echo $phone ?>" 
                        class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input 
                        type="text" 
                        name="address" 
                        value="<?php echo $address ?>" 
                        class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid mb-3">
                    <button 
                        type="submit" 
                        class="btn btn-primary"
                        name = "submit"
                        >
                            Submit
                        </button>
                </div>
                <div class="col-sm-3 d-grid mb-3">
                    <a href="/02-PHP_CRUD/index.php" class="btn btn-outline-primary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>