<?php
    //echo 'hello 1995 world'; // RENDERS 'HELLO 1995 WORLD'



// VARIABLES AND CONSTANTS 

    $name='Juani'; // VARIABLE
    $tits=10; // VARIABLE

    define('CITY', 'Santiago') ;// DEFINES A CONSTANT. ('CONST NAME', 'VALUE')



// STRINGS 

    $stringOne='My name is: ';

    //echo $stringOne.$name ; // STRING CONCATENATION
    //echo $stringOne . 'Loretinchi' ; // ANOTHER WAY TO CONCATENATE

    //echo "$stringOne Juaniña"; // double quotes means you can put the variable inside. also called variable interpolation

    //echo "Juani says \"guauguau\""; // caracter escape
    //echo 'Juani says "guauguau"'; // the same as above

// strings functions

   // echo $stringOne[4]; // returns the character in the determined position, as an array => index 0

   // echo strlen($stringOne); // string length
    //echo strtoupper($stringOne); // uppercase
    //echo strtolower($stringOne); // lowercase
    //echo str_replace('m', 'w', $stringOne); // replaces the 1st arg with the 2nd in the 3rd arg (in this case that variable)



// NUMBERS

    $radius = 25 ;// integer -> número entero
    $pi = 3.141516; // float -> or double, decimales.

    // basic math operations -> +, -, *, /, ** (elevado a), etc.

   // echo $pi * $radius**2 ;

    //order of operations ( B I D M A S ) brackets, indices(potencias), division, multiplicacion, suma, resta.

// increments & decrements operations

  //  echo $radius++; // +1
  //  echo $radius; // renders the previous operation

   // echo $radius--; // -1
   // echo $radius;

//shorthand operations

    $age = 20;
    $age = $age+10;
   // echo $age;

    $age+=10; //shorthand for the previous operation, the same with -, *, etc
  //  echo $age;

// NUMBERS FUNCTIONS

  //  echo floor($pi); // returns the previous integer of a float. -> 3
   // echo ceil($pi); // returns the next integer of a float -> 4
   // echo pi(); // literally renders the number of pi



//ARRAYS

// indexed arrays

    $family = ['juani', 'albiña', 'loretinchi'];
    //echo $family[1]; // position

    $familyTwo = array('albiña', 'juani', 'loretinchi'); // another way to create an array
    
    $ages = [10, 20, 30, 40]; // if i wanted to render this i couldn't because the browser expects strings, so in order to do that we have the next option:

   //     print_r($ages); // prints a Readable array of numbers

    $ages[2] = 35; // overwrite a value
   //     print_r($ages); 
    
    $ages[] = 50; // adds a new value and new position to the array
   //     print_r($ages);

    array_push($ages, 60); // the same as above, first parameter is the array, 2nd is the value we want to add
   // print_r($ages);

   // echo count($ages); // counts the number of elements on the array

    $wholeFamily = array_merge($family, $familyTwo); // merges two arrays into one 
   // print_r($wholeFamily);

// associative arrays (key, value)

    $ninjasBelt = ['shaun' => 'black', 'mario' => 'green', 'luigi' => 'brown'];
   // echo $ninjasBelt['luigi'];

    $ninjasBeltTwo = array('peach' => 'yellow', 'bowser' => 'orange'); // the other way to creating an array
   // print_r($ninjasBeltTwo);

    $ninjasBeltTwo['Toad'] = 'pink'; // add a new value to the array, the same for overwriting
   // print_r($ninjasBeltTwo);

// multidimensional arrays: array inside array

    $blogs = [  // multidimensional array with indexed arrays inside
        ['mario party', 'mario', 'lorem', 30],
        ['mario kart', 'toad', 'lorem', 28],
        ['zelda', 'link', 'lorem', 98]
    ];
    //print_r($blogs); // prints the whole array of arrays
    //print_r($blogs[2]); // prints the array in the defined position
    //print_r($blogs[2][1]); // prints the value of the 2nd position of the general array

    $blogs = [  // multidimensional array with associative arrays (key, value) inside
        ['title'=>'mario party', 'author'=>'mario', 'content'=>'lorem', 'likes'=>30],
        ['title'=>'mario kart', 'author'=>'toad', 'content'=>'lorem', 'likes'=>28],
        ['title'=>'zelda', 'author'=>'link', 'content'=>'lorem', 'likes'=>98]
    ];
    //echo $blogs[2]['content']; // to print: array, position, key.

    //$popped = array_pop($blogs); // takes off the element in the last position of the array
    //print_r($popped) ;



// LOOPS

// for

    // for($i=0; $i<5; $i++ ){ // (initialize i variable with value 0; condition; after the code executes, add one to the variable.)
    //     echo 'some template';
    // }

   // for($i=0; $i<count($family);$i++){ // we dont know the amount of blogs, so we pass the count method 
    //    echo $family[$i] . '<br/>'; //[i = each element of the array]
    //}

    //foreach($family as $member){ //('array' as 'item in the array')
    //    echo $member . '<br/>';
    //}
    
    
    // foreach($products as $product){
        //     echo $product['name'] . ' - ' . $product['price'] . '€';
        //     echo '<br/>';
        // }
        
// while 
        
    // $i=0; //set the variable outside the while code
    // while($i < count($products)){ 
        //     echo $products[$i]['name']; // echoes the product name in the i position of the original array
        //     echo '<br/>';
        //     $i++; //increments i by 1
        // }
        
        
            
// BOOLEANS AND COMPARISONS

    // echo true; // prints '1'
    //echo false; // prints ''

//comparisons: 

    // numbers
    // 5 > 10 -> false, ''
    // 5 < 10 -> true, '1'
    // 5 >= 5 -> true
    // 5 <= 5 -> true
    // 5!= 10 -> true

//strings
    //    echo 'shaun' < 'yoshi' ; // true, s comes before y in the alphabet
    //    echo 'shaun' > 'yoshi'; // false
    //    echo 'shaun' > 'Shaun'; // true 'cus lowercase comes after than uppercase in the ASCII table

// loose vs strict equal comparisons

    //echo 5 == '5'; // true 'cus is loose equal, its not the same type of data
    //echo 5 === '5'; // false, they are not strictly the same




// CONDITIONAL STATEMENTS (if, elseif, else)

// foreach($products as $product){
    
    //     // if($product['price'] > 28 && $product['price'] < 80){ // Y, dos condiciones
        //     //     echo $product['name'].$product['price'].'<br/>';
        //     // }
        
        //     if ($product['price'] > 30 || $product['price']<20){ // O, una de dos condiciones
            //         echo $product['name'].$product['price'].'<br/>';
            //     }
            
            // }
                        
                        
// BREAK & CONTINUE

// break: breaks out of the LOOP at some point of the iteration

// foreach($products as $product){
    //     if ($product['name'] === 'sandias'){ 
        //         break;
        //     }
        
        //     echo $product['name'];
        
        // }
        
        // continue: if the condition is met, skip the return and continue with the loop
        
        // foreach($products as $product){
            //     if ($product['price'] > 40){ 
                //         continue;
                //     }
                
                //     echo $product['name'];
                
                // }
                                        
    $products = [
        ['name' => 'naranjas', 'price' => 30],
        ['name' => 'manzanas', 'price' => 50],
        ['name' => 'peras', 'price' => 20],
        ['name' => 'sandias', 'price' => 80],
        ['name' => 'uvas', 'price' => 10],
        ['name' => 'duraznos', 'price' => 25],
    ];


// FUNCTIONS

    function sayHello($name = 'User', $time = 'Morning') { // on the = we pass the default value, if one is not defined.
        echo "Good $time $name"; 
    }

    //sayHello('Juani', 'Night');

    // function formatProduct($product){
    //     echo "{$product['name']} costs {$product['price']}€ <br/>";
    // }

   // formatProduct(['name'=>'jamón ibérico', 'price'=>90]); // associative array as parameter

    function formatProduct($product){
        return "{$product['name']} costs {$product['price']}€ <br/>"; //returns the value, so we can store it in a variable
    }

    $formatted = formatProduct(['name'=>'jamón ibérico', 'price'=>90]);

    //echo $formatted; // we stored the returned value of the function on this variable


// VARIABLE SCOPES

    // local scope var

    function myFunc(){
        $price=10; // this var only works inside the function
        echo $price;
    }
    //myFunc();

    function myFuncTwo($age){ // another local variable
        echo $age;
    }
  //  myFuncTwo(28);

    // global scope var

    $name = 'Juani'; // global var

    function greetings(){ // the function will search for a local var
        global $name; // we 'insert' the var inside the function with 'global'
        $name = 'Albiña'; // we can also overwrite the var, it affects the global var 
        echo "Hello $name";
    }
   // greetings();

    function sayBye($name){ //the parameter is a local var
        $name='Loretiño';// ^that means we can overwrite it in the function but it WONT affect the global var
        echo "Goodbye $name";
    }
    // sayBye($name); // prints 'Goodbye Loretiño'
    // echo $name; // prints 'Albiña'

    function sayByeTwo(&$name){ //now it affects the global var 
        $name='Loretiño';// ^
        echo "Goodbye $name";
    }
    //sayByeTwo($name); // prints 'Goodbye Loretiño'
   // echo $name; // prints 'Loretiño', with the & we changed the var to a global scope.


// INCLUDE
  // sort of an importation of another file

  include('ninjas.php'); // it carries on even if there's an error with the file or pathk
  echo 'that was the other file <br/>';

// REQUIRE

    require('ninjas.php'); //REQUIRES the file to carry on

//both can also be written without the ():
    require 'ninjas.php';
    include 'ninjas.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP TEST</title>
</head>
<body>
<!--USING A LOOP IN THE HTML TEMPLATE-->
 <h1>Lista de frutas</h1>

 <ul>

 <!-- WE OPEN THE LOOP IN A PHP TAG -->
    <?php foreach ($products as $product) { ?>
        <?php if ($product['price'] > 20) { ?>
        <li> <?php echo $product['name'].$product['price']; ?></li>
        <?php }?>
<!--CLOSING THE LOOP IN ANOTHER PHP TAG -->
    <?php } ?> 

 </ul>

 <div>
     <?php include 'content.php' ?>
 </div>

</body>
</html>