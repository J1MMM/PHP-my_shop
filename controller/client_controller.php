<!-- Database connection -->
<?php include('./config/connectDB.php') ?>
<!-- GET -->
<?php 
    $sql = 'SELECT * FROM clients';
    $fetch = mysqli_query($connect, $sql);
    $clients_data = mysqli_fetch_all($fetch, MYSQLI_ASSOC); 
?>
<!-- POST -->
<?php
    $name = $email = $phone = $address = '';
    $error_message = '';
    $success_message = '';


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
    
        if(!empty($name) && !empty($email) && !empty($phone) && !empty($address)){
            $sql = "INSERT INTO clients (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";
            try {
                mysqli_query($connect, $sql);
                $name = $email = $phone = $address = '';
                $success_message = 'New Client Added';
            } catch (\Throwable $th) {
                $error_message = $connect->error;
            }
         

        }else{
            $error_message = "All fields are required";
        }
    }
?>

