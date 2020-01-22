<?php

if (isset($_POST["initialTemp"])){
    //compute temperature
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
            echo "<p>You inputted $initalTemp °C is the same as $convertedTemp °F </p>";
            break;
        

        case 'FtoC':
            $convertedTemp = FtoC();
            echo "<p>You inputted $initalTemp °F is the same as $convertedTemp °C </p>";
            break;

        case 'KtoC':
            $convertedTemp = KtoC();
            echo "<p>You inputted $initalTemp °K is the same as $convertedTemp °C </p>";
            break;
        

        case 'CtoK':
            $convertedTemp = CtoK();
            echo "<p>You inputted $initalTemp °C is the same as $convertedTemp °K </p>";
            break;
        

        case 'KtoF':
            $convertedTemp = KtoF();
            echo "<p>You inputted $initalTemp °K is the same as $convertedTemp °F </p>";
            break;
        

        case 'FartoKel':
            $convertedTemp = FartoKel();
            echo "<p>You inputted $initalTemp °F is the same as $convertedTemp °K </p>";
            break;
        }


    //shows data
    

}
    else{ 
        //shows form
        //form goes inside here!
        echo'
        <form action="" method="post">
        <p>Input your tempurate number:  <input type="text" name="initialTemp" /></p>

        <fieldset>
        <legend>Choose your conversion:</legend>
        <p><input type="radio" name="selectedTemp" value="CtoF">°C to °F</p>
        <p><input type="radio" name="selectedTemp" value="FtoC">°F to °C</p>
        <p><input type="radio" name="selectedTemp" value="KtoC">°K to °C</p>
        <p><input type="radio" name="selectedTemp" value="CtoK">°C to °K</p>
        <p><input type="radio" name="selectedTemp" value="KtoF">°K to °F</p>
        <p><input type="radio" name="selectedTemp" value="FartoKel">°F to °K</p>



        </fieldset>






        <input type="submit" />
        </form>
        ';
    }