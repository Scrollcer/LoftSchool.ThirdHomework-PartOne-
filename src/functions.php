<?php

function task1()
{
    define("NUMBER_OF_USERS", 50);

    $namesArray = ["Ivan", "Petr", "Denis", "Sergei", "Michail"];
    $usersArray = [];
    for ($i = 1; $i <= NUMBER_OF_USERS; $i++) {
        $usersArray[$i]['id'] = $i;
        $usersArray[$i]['name'] = $namesArray[array_rand($namesArray)];
        $usersArray[$i]['age'] = rand(18, 45);
    }

    $jsonArray = json_encode($usersArray);
    file_put_contents('users.json', $jsonArray);

    $decodedArray = json_decode(file_get_contents('users.json'), true);

    $userNameCount = ["Ivan" => 0, "Petr" => 0, "Denis" => 0, "Sergei" => 0, "Michail" => 0];
    $averageAge = 0;
    foreach ($decodedArray as $key => $value) {
        $averageAge += $value['age'];
        foreach ($userNameCount as $name => $count) {
            if ($value['name'] == $name) {
                $userNameCount[$value['name']] += 1;
            }
        }
    }

    $averageAge = intval($averageAge / 50);
    print_r($userNameCount);
    echo "</br>";
    echo "Average age - $averageAge";
}