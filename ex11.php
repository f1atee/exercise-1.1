<?php

$inputNumber = readline("Введите номер карты:");

$cardNumber = str_replace(' ','',$inputNumber);
$array = array();

for ($i = 0; $i < strlen($cardNumber); $i++) {
    $array[$i] = (int)($cardNumber[$i]);
}

function IsValid($card) {

    for ($i = 0; $i < count($card); $i += 2) {
        $card[$i] *= 2;

        if($card[$i] >= 10) {
            $card[$i] = $card[$i] % 10 + intdiv($card[$i],10);
        }
    }

    $isValid = (array_sum($card) % 10 == 0) ? "true" : "false";

    return ["isValid" => $isValid];

}

$paymentSystem = ["4" => "VISA",
    "5"=>"Mastercard ",
    "220"=>"MIR"];

if (array_key_exists($array[0], $paymentSystem)) {
    $paymentSystem = $paymentSystem[$array[0]];
}
elseif (array_key_exists(substr($array, 0, 3), $paymentSystem)){
    $paymentSystem = $paymentSystem[substr($array, 0, 3)];
}
else {
    $paymentSystem = "UNKNOWN";
}

print_r(IsValid($array));
print_r($paymentSystem);

