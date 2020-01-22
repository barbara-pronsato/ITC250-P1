<!doctype html>
<html lang="en">
<head>
<title>Temperature Converter</title>
<style>
* {
     padding:0;
     margin:0;
 }

 div.wrapper{
     width:300px;
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
fieldset {
    padding:15px 20px 15px 15px;
    border:1px solid green;
    margin:10px 0 0 10px;
    width: 400px;
}

legend {
    font-style:italic;
    font-size:1.2em;
    color:#444;
    padding:0px 20px 0 20px;
}
</style>
<?php
    $error="";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(is_numeric($_POST['initialTemp']) && !empty($_POST['selectedTemp'])){
    

    //compute temperature
    $convertedTemp ="";
    $initalTemp = $_POST['initialTemp'];
    $selectedTemp = $_POST['selectedTemp'];


    function CtoF(){
        $convertedTemp = ($_POST['initialTemp'] * 9 / 5) + 32;
        return $convertedTemp;
    }

    function FtoC(){
        $convertedTemp = ($_POST['initialTemp'] - 32) * 5 / 9;
        return $convertedTemp;
    }

    function KtoC(){
        $convertedTemp = $_POST['initialTemp'] - 273.15;
        return $convertedTemp;
    }

    function CtoK(){
        $convertedTemp = $_POST['initialTemp'] + 273.15;
        return $convertedTemp;
    }

    function KtoF(){
        $convertedTemp = (($_POST['initialTemp'] - 273.15) * 9 / 5) + 32;
        return $convertedTemp;
    }

    function FartoKel(){
        $convertedTemp = (($_POST['initialTemp'] - 32) * 5 / 9) + 273.15;
        return $convertedTemp;
    }


    switch($selectedTemp) {
        case 'CtoF':
            $convertedTemp = CtoF();
            $outcomeTemp= "<p>You inputted $initalTemp °C is the same as $convertedTemp °F </p>";
            break;
        
        case 'FtoC':
            $convertedTemp = FtoC();
            $outcomeTemp= "<p>You inputted $initalTemp °F is the same as $convertedTemp °C </p>";
            break;

        case 'KtoC':
            $convertedTemp = KtoC();
            $outcomeTemp= "<p>You inputted $initalTemp °K is the same as $convertedTemp °C </p>";
            break;
        
        case 'CtoK':
            $convertedTemp = CtoK();
            $outcomeTemp= "<p>You inputted $initalTemp °C is the same as $convertedTemp °K </p>";
            break;
        
        case 'KtoF':
            $convertedTemp = KtoF();
            $outcomeTemp= "<p>You inputted $initalTemp °K is the same as $convertedTemp °F </p>";
            break;

        case 'FartoKel':
            $convertedTemp = FartoKel();
            $outcomeTemp= "<p>You inputted $initalTemp °F is the same as $convertedTemp °K </p>";
            break;

        }
    }

    else{
        $error="Please input a numeric value for your temperature!";
        
    }
}


    //shows data
         //shows form
        //form goes inside here!

    ?>
<div class="wrapper">
<form action="" method="post">
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

        <div>
        <?=$outcomeTemp;?>
        <span style="color:red"><?=$error;?></span>
        </div>

        </div>