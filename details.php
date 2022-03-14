<?php

include('config/db_connection.php');


//check GET request id param

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']); // protecting the ddbb

    // make sql

    $sql = "SELECT * from pizzas WHERE id = $id";

    //get the query result
    $result = mysqli_query($conn, $sql);
    //fetch result in array format
    $pizza = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);

}

?>

<!DOCTYPE html>
<html lang="en">

<?php include 'templates/header.php';?>

<div class="container center">
    <?php if($pizza): ?>
        <h4>
            <?php echo htmlspecialchars($pizza['title']); ?>
        </h4>
        <p>
           Created by: <?php echo htmlspecialchars($pizza['email']);?>
        </p>
        <p>
            <?php echo htmlspecialchars($pizza['created_at']);?>
        </p>
        <p>
            <?php echo htmlspecialchars($pizza['ingredients']);?>
        </p>

    <?php else: ?>

        <h5>No such pizza exists :(</h5>

    <?php endif; ?>
</div>

<?php include 'templates/footer.php';?>

</html>