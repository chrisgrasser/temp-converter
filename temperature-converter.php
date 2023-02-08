<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Lab No. 5 - Temp. Converter</title>
</head>

<body>

    <?php
    // function to calculate converted temperature
    function convertTemp($temp, $unit1, $unit2)
    {
        // conversion formulas
        // Celsius to Fahrenheit = T(°C) × 9/5 + 32
        // Celsius to Kelvin = T(°C) + 273.15
        // Fahrenheit to Celsius = (T(°F) - 32) × 5/9
        // Fahrenheit to Kelvin = (T(°F) + 459.67)× 5/9
        // Kelvin to Fahrenheit = T(K) × 9/5 - 459.67
        // Kelvin to Celsius = T(K) - 273.15

        // You need to develop the logic to convert the temperature based on the selections and input made
        if ($unit1 == "celsius" && $unit2 == "fahrenheit") {
            $temp = floatval($temp) * (9 / 5) + 32;
            return $temp;
        } elseif ($unit1 == "celsius" && $unit2 == "kelvin") {
            $temp = floatval($temp) + 273.15;
            return $temp;
        } elseif ($unit1 == "fahrenheit" && $unit2 == "celsius") {
            $temp = (floatval($temp) - 32) * (5 / 9);
            return $temp;
        } elseif ($unit1 == "fahrenheit" && $unit2 == "kelvin") {
            $temp = (floatval($temp) + 459.67) * (5 / 9);
            return $temp;
        } elseif ($unit1 == "kelvin" && $unit2 == "fahrenheit") {
            $temp = floatval($temp) * (9 / 5) - 459.67;
            return $temp;
        } elseif ($unit1 == "kelvin" && $unit2 == "celsius") {
            $temp = floatval($temp) - 273.15;
            return $temp;
        } else {
            return $temp;
        }
    } // end function

    // Logic to check for POST and grab data from $_POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Store the original temp and units in variables
        // You can then use these variables to help you make the form sticky
        // then call the convertTemp() function
        // Once you have the converted temperature you can place PHP within the converttemp field using PHP
        // I coded the sticky code for the originaltemp field for you

        $originalTemperature = $_POST['originaltemp'];
        $originalUnit = $_POST['originalunit'];
        $conversionUnit = $_POST['conversionunit'];

        // call function
        if ($originalTemperature != "") {
            $convertedTemp = convertTemp($originalTemperature, $originalUnit, $conversionUnit);
        }
    } // end if

    ?>
    <!-- Form starts here -->
    <div class="header">
        <h1>Temperature Converter</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-12 mt-4">
                <div class="border m-1">
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                        <label for="temp">Temperature</label>
                        <!-- You could have also used a Ternary on the line below -->
                        <input type="text" value="<?php if (isset($_POST['originaltemp'])) {
                                                        echo $_POST['originaltemp'];
                                                    }
                                                    ?>" name="originaltemp" size="14" maxlength="7" id="temp">

                        <select name="originalunit" <?php if (isset($_POST['originalunit'])) {
                                                        $originalUnit = $_POST['originalunit'];
                                                    } else {
                                                        $originalUnit = "";
                                                    }
                                                    ?>>
                            <option value="--Select--" <?php if ($originalUnit == "--Select--") echo ' selected="selected"'; ?>>--Select--</option>
                            <option value="celsius" <?php if ($originalUnit == "celsius") echo ' selected="selected"'; ?>>Celsius</option>
                            <option value="fahrenheit" <?php if ($originalUnit == "fahrenheit") echo ' selected="selected"'; ?>>Fahrenheit</option>
                            <option value="kelvin" <?php if ($originalUnit == "kelvin") echo ' selected="selected"'; ?>>Kelvin</option>
                        </select><br>

                        <label for="convertedtemp">Converted Temperature</label>
                        <input type="text" value="<?php if (isset($convertedTemp)) {
                                                        echo $convertedTemp;
                                                    }
                                                    ?>" name="convertedtemp" size="14" maxlength="7" id="convertedtemp" disabled>

                        <select name="conversionunit" <?php if (isset($_POST['conversionunit'])) {
                                                            $conversionUnit = $_POST['conversionunit'];
                                                        } else {
                                                            $conversionUnit = "";
                                                        }
                                                        ?>>
                            <option value="--Select--" <?php if ($conversionUnit == "--Select--") echo ' selected="selected"'; ?>>--Select--</option>
                            <option value="celsius" <?php if ($conversionUnit == "celsius") echo ' selected="selected"'; ?>>Celsius</option>
                            <option value="fahrenheit" <?php if ($conversionUnit == "fahrenheit") echo ' selected="selected"'; ?>>Fahrenheit</option>
                            <option value="kelvin" <?php if ($conversionUnit == "kelvin") echo ' selected="selected"'; ?>>Kelvin</option>
                        </select><br>
                        <input type="submit" value="Convert" />
                    </form>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 mt-4">
                <div class="border calc-box m-1">
                    <h3>Conversion Formulas</h3>
                    <!-- // Celsius to Fahrenheit = T(°C) × 9/5 + 32
                    // Celsius to Kelvin = T(°C) + 273.15
                    // Fahrenheit to Celsius = (T(°F) - 32) × 5/9
                    // Fahrenheit to Kelvin = (T(°F) + 459.67)× 5/9
                    // Kelvin to Fahrenheit = T(K) × 9/5 - 459.67
                    // Kelvin to Celsius = T(K) - 273.15 -->
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    Celsius to Fahrenheit
                                </td>
                                <td>
                                    T(°C) × 9/5 + 32
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Celsius to Kelvin
                                </td>
                                <td>
                                    T(°C) + 273.15
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Fahrenheit to Celsius
                                </td>
                                <td>
                                    (T(°F) - 32) × 5/9
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Fahrenheit to Kelvin
                                </td>
                                <td>
                                    (T(°F) + 459.67)× 5/9
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Kelvin to Fahrenheit
                                </td>
                                <td>
                                    T(K) × 9/5 - 459.67
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Kelvin to Celsius
                                </td>
                                <td>
                                    T(K) - 273.15
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>