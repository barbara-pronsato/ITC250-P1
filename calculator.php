<?php

// Trip  Calculator Basic 

// define variables and initialize them with empty values

$nameErr = $milesErr = $hoursPerDayErr = $priceGallonErr = $efficiencyErr = '';
$name = $miles = $priceGallon = $efficiency = $total = $total_f = ''; 

if($_SERVER['REQUEST_METHOD'] == 'POST') {

if(empty($_POST['name'] )) {
    $nameErr = 'Please fill out your name';
} else {
    $name = $_POST['name'];
}

if(empty($_POST['miles'] )) {
    $milesErr = 'Please fill out how many miles';
} else {
    $miles = $_POST['miles'];
}

if(empty($_POST['priceGallon'] )) {
    $priceGallonErr = 'Please enter how many miles';
} else {
    $priceGallon = $_POST['priceGallon'];
}

if($_POST['efficiency'] == 'NULL') {
    $efficiencyErr = 'Please select your efficiency';
} else {
    $efficiency = $_POST['efficiency'];
}

}  // END SERVER REQUEST

?>
<!doctype html>
<html lang="en">
<head>
<title>Trip Calculator</title>

<style>

* {
    padding:0;
    margin:0;
    box-sizing:border-box;
}

form {
        width:500px;
        margin:0 auto; 
        background:#fff9c4; 
    }

h2, p {
        text-align: center;
    }

body {

    padding-top:30px; 

}

form li {
    list-style-type:none;
    margin-left:10px;
}

label {
    margin-bottom:10px;
    margin-top:30px;
    display:block;
    font-size:16px;

}

span {
    float:left;
}


input {
    margin-bottom:10px;
}

input[type=text] {
    display:block;
    height:25px;
}



select {
    display:block;
}

h1, h2 {
    text-align:center;
}

.error {

    color: red;
    display:block;
}

fieldset {
    padding-left:10px;
}


</style>
</head>
<body>
<h1>Trip Calculator </h1>
<form action=" <?php echo $_SERVER['PHP_SELF'];  ?>" method="post">

<fieldset>
<label>Name</label>
<input type="text" name="name">

<label>How many miles will you be driving? </label>
<input type="text" name="miles">

<label>Price per gallon</label>

<ul>
<li><input type="radio" name="priceGallon" value="3.09">$3.09</li>
<li><input type="radio" name="priceGallon" value="3.99">$3.99</li>
<li><input type="radio" name="priceGallon" value="4.00">$4.00</li>
</ul>



<label>Select your fuel efficiency</label>
<select name="efficiency">
<option value="NULL">Select one</option>
<option value="10">Terrible</option>
<option value="20">Not as Terrible</option>
<option value="30">Better</option>
<option value="40">Good</option>
</select>

<input type="submit" name="submit" value="Calculate">
<input type="reset" name="reset" value="Reset">


</fieldset>
</form>
</body>
</html>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

if(isset($_POST['miles'],
            $_POST['priceGallon'],
            $_POST['efficiency'],
            $_POST['name'])&&
            is_numeric($_POST['miles']) &&
            is_numeric($_POST['priceGallon']) &&
            is_numeric($_POST['efficiency'])) {

        // if(empty($name && $priceGallon && $efficiency && $miles)) {
        // echo '<h2>Error!</h2>';
        // echo 'Please fill out the fields';
        
        // }  else {
        $gallons = $_POST['miles'] / $_POST['efficiency'];
        $dollars = $gallons * $_POST['priceGallon']; 
        $hours = $_POST['miles'];

        $name = $_POST['name'];
   
        echo '<h2> Calculator Results </h2>';
        echo '<ul>';
        echo '<li> '.$name.' You have driven ' .$_POST['miles']. 'miles </li>';
        echo '<li> Your vehicle has an efficiency rating of '.$_POST['efficiency'].' miles per gallon </li>';
        echo '<li> Your total cost for gas will be $ '.number_format($dollars, 2). 'dollars </li>'; 
        echo '</ul>';

            } else { // error
            echo '<h2> Error!</h2>';
            echo 'Please enter your name, miles, price of gas and fuel efficiency'; 
            }
}

?>