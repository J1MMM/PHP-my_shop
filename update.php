<!-- CONNECT DATABASE -->
<?php include('./config/connectDB.php') ?>
<!-- GET CLIENT INFO BY ID -->
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $name = $email = $phone = $address = '';
        $error_message = '';
        $success_message = '';
    
        $sql_get = "SELECT * FROM clients WHERE id='$id'";
        $result = mysqli_query($connect, $sql_get);
        $client = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if($client){
            // print_r($client);
            $name = $client[0]['name'];
            $email = $client[0]['email'];
            $phone = $client[0]['phone'];
            $address = $client[0]['address'];
            // print_r($client);
        }else{
            header('Location: index.php');
        }
    }else{
        header('Location: index.php');
    }
    ?>
<!-- UPDATE CLIENT INFO -->
<?php
    if(isset($_POST['submit'])){
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
    
        if(!empty($name) && !empty($email) && !empty($phone) && !empty($address)){
            $sql_update = 
            "UPDATE clients 
                SET 
                    name = '$name',
                    email = '$email',
                    phone = '$phone',
                    address = '$address'
                WHERE
                    id = '$id' ";
            try {
                mysqli_query($connect, $sql_update);
                $name = $email = $phone = $address = '';
                $success_message = 'Info Updated';
            } catch (\Throwable $th) {
                $error_message = $connect->error;
            }
        }else{
            $error_message = "All fields are required";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop | update</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" ></script>
</head>
<body>
    <nav class="navbar sticky-top navbar-dark bg-primary navbar-expand shadow mb-4" style="height:5rem">
        <div class="container">
            <a href="index.php" class="navbar-brand fw-bold">Seven Evelyn Store</a>           
        </div>
    </nav>
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

        <h2>Update Client Info</h2>

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
                            Update
                        </button>
                </div>
                <div class="col-sm-3 d-grid mb-3">
                    <a href="/PHP-my_shop/index.php" class="btn btn-outline-primary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>