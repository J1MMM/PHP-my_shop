<!-- CONNECT DATABASE -->
<?php include('connectDB.php') ?>
<!-- DELETE -->
<?php
    $id = $_GET['id'];
    $sql_delete = "DELETE FROM clients WHERE id='$id'";
    mysqli_query($connect, $sql_delete);
    header('Location: index.php');
    exit;
    ?>