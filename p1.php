<!doctype html>
<html lang="en">
<head>
<title>Temperature Converter</title>
<style>

 div.wrapper{
     width:33%;
     margin: 0 auto;
 }

 label {
    display:block;
    margin-bottom:5px;
    font-family: sans-serif;
    font-weight:200;
    font-size:1em;
    color: black;

}
fieldset{
    background-color:#F9CBC0;
    margin-bottom:10px;
}
legend {
    font-style:italic;
    font-size:1.2em;
    color:#444;
    padding:0px 20px 0 20px;
}

div.box{
    margin-top:10px;
}

</style>
</head>
<?php

    $numeric_error=$conversion_error="";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //methods of showing errors!
        if(!is_numeric($_POST['initialTemp']) || empty($_POST['initialTemp'])){
            $numeric_error = '<p class="error">Please input a numerical value</p>';
        } else{
            $initalTemp = $_POST['initialTemp'];
        }

        if(empty($_POST['selectedTemp'])){
            $conversion_error = '<p class="error">Please select your temperature conversion</p>';
        } else{
            $selectedTemp = $_POST['selectedTemp'];
        }
        
        //making sure the $initialTemp is set and numerical also $selectedTemp is chosen
        if(isset($_POST['initialTemp'])&&
        is_numeric($_POST['initialTemp'])&&
        isset($_POST['selectedTemp'])){

    //initialize the converted temp variable
     $convertedTemp ="";

    
    // logical function of multiunit conversions
    function CtoF(){
        $convertedTemp = ($_POST['initialTemp'] * 9 / 5) + 32;
        $convertedTemp = number_format($convertedTemp, 2);
        return $convertedTemp;
    }

    function FtoC(){
        $convertedTemp = ($_POST['initialTemp'] - 32) * 5 / 9;
        $convertedTemp = number_format($convertedTemp, 2);
        return $convertedTemp;
    }

    function KtoC(){
        $convertedTemp = $_POST['initialTemp'] - 273.15;
        $convertedTemp = number_format($convertedTemp, 2);
        return $convertedTemp;
    }

    function CtoK(){
        $convertedTemp = $_POST['initialTemp'] + 273.15;
        $convertedTemp = number_format($convertedTemp, 2);
        return $convertedTemp;
    }

    function KtoF(){
        $convertedTemp = (($_POST['initialTemp'] - 273.15) * 9 / 5) + 32;
        $convertedTemp = number_format($convertedTemp, 2);
        return $convertedTemp;
    }

    function FartoKel(){
        $convertedTemp = (($_POST['initialTemp'] - 32) * 5 / 9) + 273.15;
        $convertedTemp = number_format($convertedTemp, 2);
        return $convertedTemp;
    }

    //swith statement for different temp conversions
    switch($selectedTemp) {
        case 'CtoF':
            $convertedTemp = CtoF();
            $outcomeTemp= "<p>You inputted {$initalTemp}° Celcius is the same as {$convertedTemp}° Fahrenheit </p>";
            break;
        
        case 'FtoC':
            $convertedTemp = FtoC();
            $outcomeTemp= "<p>You inputted {$initalTemp}° Farenheit is the same as {$convertedTemp}° Celcius </p>";
            break;

        case 'KtoC':
            $convertedTemp = KtoC();
            $outcomeTemp= "<p>You inputted {$initalTemp}° Kelvin is the same as {$convertedTemp}° Celcius </p>";
            break;
        
        case 'CtoK':
            $convertedTemp = CtoK();
            $outcomeTemp= "<p>You inputted {$initalTemp}° Celcius is the same as {$convertedTemp}° Kelvin </p>";
            break;
        
        case 'KtoF':
            $convertedTemp = KtoF();
            $outcomeTemp= "<p>You inputted {$initalTemp}° Kelvin is the same as {$convertedTemp}° Fahrenheit </p>";
            break;

        case 'FartoKel':
            $convertedTemp = FartoKel();
            $outcomeTemp= "<p>You inputted {$initalTemp}° Fahrenheit is the same as {$convertedTemp}° Kelvin </p>";
            break;

        }
    }
}
    ?>


<!-- HTML part of the form -->
<body>
<div class="wrapper">
<form action="" method="post">

<h1>Multiunit Temperature Converter</h1>
        <p>Input your temperature number:  <input type="text" name="initialTemp" /></p>

        <fieldset>
        <legend>Choose your conversion:</legend>
        <p><input type="radio" name="selectedTemp" value="CtoF">°C to °F</p>
        <p><input type="radio" name="selectedTemp" value="FtoC">°F to °C</p>
        <br>
        <p><input type="radio" name="selectedTemp" value="KtoC">°K to °C</p>
        <p><input type="radio" name="selectedTemp" value="CtoK">°C to °K</p>
        <br>
        <p><input type="radio" name="selectedTemp" value="KtoF">°K to °F</p>
        <p><input type="radio" name="selectedTemp" value="FartoKel">°F to °K</p>


        </fieldset>

        <input type="submit" />
        </form>
    
        <div class="box">
        <?=$outcomeTemp;?>
        <span style="color:red"><?=$conversion_error;?></span>
        <span style="color:red"><?=$numeric_error;?></span>
        </div>
        <a href="https://github.com/barbara-pronsato/ITC250-P1"><p>Click here for the project documentation!</p></a>
        </div>
        </body>