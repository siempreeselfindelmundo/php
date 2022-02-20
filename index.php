<?php

    include('config/db_connection.php');

    // retrieving data from database

    // write query for all pizzas 
    $sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at'; 
    // $sql is a variable where we store the query
    // SELECT means go and get the data
    // * = select from ALL columns, in this case we dont want all the columns so we just specify the ones we need
    // FROM = where to retrieve it from
    // pizzas is the name of the table in the database
    // we can retrieve the data in some order, for that we use ORDER BY and its followed by the column we want. in this case we want to order it chronologically

    //  make query & get results
    $result = mysqli_query($conn, $sql); // takes two parameters: 1- the connection. 2- the stuff we want to issue, in this case $sql

    // fetch the resulting rows as an array
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC); // fetch all because we want all the records, from the query $result, turn it into an associative array with MYSQLI_ASSOC. we basically are reformating the data, because we cant use it as it is in $result.

    // free the result from memory (good practice)
    mysqli_free_result($result);

    // close connection to database
    mysqli_close($conn);

    // explode function: turns a string into an array. takes 2 parameters: 1. the character we want to search for and 2. the string we want to convert.
    //print_r(explode(',', $pizzas[0]['ingredients'])); // $array[position][key of that assoc array]

?>


<!DOCTYPE html>
<html>

    <?php include 'templates/header.php';?>

    <h4 class="center grey-text">Pizzas!</h4>
    
    <div class="container">
        <div class="row">
             <?php foreach($pizzas as $pizza) { ?> <!-- we open the loop here but we close it down below. -->
                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h6> <?php echo htmlspecialchars($pizza['title']);?> </h6>
                            <ul>
                                <?php foreach(explode(',', $pizza['ingredients']) as $ing) { ?>
                                    <li> <?php echo htmlspecialchars($ing); ?> </li>
                                <?php }; ?>    
                            </ul>
                        </div>
                        <div class="card-action right-align">
                            <a href="#" class="brand-text">More info</a>
                        </div>
                    </div>
                </div>
            <?php } ?> <!-- closing the loop -->
        </div>
    </div>
    <?php include 'templates/footer.php';?>
    

</html>
    