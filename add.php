<?php

    //connecting to dbk
    include('config/db_connection.php');


    // if(isset($_GET['submit'])) {
    //     echo $_GET['email'];
    //     echo $_GET['title'];
    //     echo $_GET['ingredients'];
    // }
    // isset is a php method to see if that array has any values. $_get is an associative array created by the get method where it stores the values of the form. $_GET is in uppercase 'cus its a global var. this sends the request via url, so its less secure.

    // with the POST method is more secure, it doesnt show on the url.
    //we have a security issue: XSS = CROSS SITE SCRIPTING. in any input, someone can put a js script to redirect us to another website, and download on our computers some malware or virus. To prevent that we surround the echo with 'htmlspecialchars()'

    //we add a server-side validation to check the values of the form. is also good practice to add client-side validation or front-end validation with html attributes such as 'required' and 'type'

    //initialize empty vars to persist data when there are errors
    $title = $email = $ingredients = '';
     
    //in order to display the filter errors in each input of the form, we store them in an associative array:    
    $errors = array('email' =>'', 'title' =>'', 'ingredients' =>'');



    if(isset($_POST['submit'])) {
        
        //email server-side validation
        if(empty($_POST['email'])){ // checks if an input is empty
            $errors['email'] = 'An email is required <br />';
        } else {
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Email must be a valid email address.';
            } //filter var takes 2 parameters: 1: the var we want to filter; 2: the -in this case- built-in php filter.
        }
        //title server-side validation
        if(empty($_POST['title'])){
            $errors['title'] = 'A title is required <br />';
        } else {
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
                $errors['title'] = 'Title must be letters and spaces only';
            } // preg_match checks if something matches with a regular expression (regex). takes 2 parameters: 1- the regex, 2- the var we want to check.

        }
        //ingredients server-side validation
        if(empty($_POST['ingredients'])){
            $errors['ingredients'] = 'At least one ingredient is required <br />';
        } else {
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
                $errors['ingredients'] = 'Ingredients must be a comma separated list';
            }
        }

        if(array_filter($errors)) {
            //echo 'errors in the form'; // returns true
        } else {

            // function to avoid any malicious code on the database, a bit like htmlspecialchars,
            // we override the values in the vars.
            //the function takes 2 parameters: 1. the connection. 2- the value we want to store in the database
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

            // create sql: insert into -table name-(columns), values()

            $sql = "INSERT INTO pizzas(title, email, ingredients) VALUES('$title', '$email', '$ingredients')";

            // save to db and check
            if(mysqli_query($conn, $sql)){
                //success
                header('Location: index.php'); // method to redirect to another file.

            } else {
                // error
                echo 'query error: ' . mysqli_error($conn); 
            }

        
        }
        
        // the array_filter method goes through an array and it performs a callback function on each item. by default the function it runs is checking if there are any values on the key of an associative array. so if a key is empty it will return 'false' but if there are any errors it will return 'true'
    } // end of the post check

?>


<!DOCTYPE html>
<html>

    <?php include 'templates/header.php';?>

    <section class="container grey-text">
        <h4 class="center">Add a Pizza</h4>
        <form action="add.php" method="POST" class="white">
            <label for="email">Your email:</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
            <div class="red-text"><?php echo $errors['email']; ?></div>
            <label for="email">Pizza title:</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
            <div class="red-text"><?php echo $errors['title']; ?></div>
            <label for="email">Ingredients (comma separated):</label>
            <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
            <div class="red-text"><?php echo $errors['ingredients']; ?></div>
            <div class="center">
                <input type="submit" value="submit" name="submit" class="btn brand z-depth-0">
            </div>
        </form>

    </section>
    
    <?php include 'templates/footer.php';?>
    

</html>
    