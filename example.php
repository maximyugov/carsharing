<?php

$request = [
    "rate" => "string", // enum: base, daily, hourly, student
    "km" => "number", // example: 14,5
    "minutes" => "number", // example: 7,3
    "driverAge" => "integer", // example: 18
    "additionalServices" => [ // example [wifi, driver]
        "string"
    ],
];