<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your IP Address</title>
</head>
<?php
// PHP program to find sum of two large numbers.


// Function for finding sum of larger numbers
function findSum($str1, $str2): string
{
    // Before proceeding further, make sure length
    // of str2 is larger.
    if (strlen($str1) > strlen($str2)) {
        $t = $str1;
        $str1 = $str2;
        $str2 = $t;
    }

    // Take an empty string for storing result
    $str = "";

    // Calculate length of both string
    $n1 = strlen($str1);
    $n2 = strlen($str2);

    // Reverse both of strings
    $str1 = strrev($str1);
    $str2 = strrev($str2);

    $carry = 0;
    for ($i = 0; $i < $n1; $i++) {
        // Do school mathematics, compute sum of
        // current digits and carry
        $sum = ((ord($str1[$i]) - 48) + ((ord($str2[$i]) - 48) + $carry));
        $str .= chr($sum % 10 + 48);

        // Calculate carry for next step
        $carry = (int)($sum / 10);
    }

    // Add remaining digits of larger number
    for ($i = $n1; $i < $n2; $i++) {
        $sum = ((ord($str2[$i]) - 48) + $carry);
        $str .= chr($sum % 10 + 48);
        $carry = (int)($sum / 10);
    }

    // Add remaining carry
    if ($carry)
        $str .= chr($carry + 48);

    // reverse resultant string
    $str = strrev($str);

    return $str;
}

// Driver code

$filename = "count";
if (!file_exists($filename)) {
    $file = fopen("count", "w");
    fwrite($file, "1");
    fclose($file);
} else {
    $readFile = fopen("count", "r");
    $buffer = fgets($readFile);
    fclose($readFile);
    $sum = findSum($buffer, "1");
    $writeFile = fopen("count", "w");
    fwrite($writeFile, $sum);
    fclose($writeFile);
}
$readFile = fopen("count", "r");
$text = fgets($readFile);
fclose($readFile);

// This code is contributed by mits
?>
<body>
<div class="textBox">
    <p>Total visits: <b><?= $text ?></b></p>
    <p>Your IP Address: <b><?= $_SERVER["HTTP_CF_CONNECTING_IP"] ?></b></p>
    <p>Your IP Location: <b><?= $_SERVER["HTTP_CF_IPCOUNTRY"] ?></b></p>
</div>
</body>
<style>
    .textBox {
        left: 50%;
        right: 50%;
        margin: 50px;
        padding: 30px;
        border: 3px solid green;
        font-size: xxx-large;
    }
</style>
</html>
