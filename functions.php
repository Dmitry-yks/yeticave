<?php
$is_auth = rand(0, 1);
$user_name = 'Dimas'; // укажите здесь ваше имя
$categories = [
    'board' => "Доски и лыжи",
    'kreps' => "Крепления",
    'boots' => "Ботинки",
    'clothes' => "Одежда",
    'tools' => "Инструменты",
    'misc' => "Разное"
];
$info = [
    [
        "name" => "2014 Rossignol District Snowboard",
        "category"=> "Доски и лыжи",
        "prise"=>"10999",
        "gif"=>"img/lot-1.jpg"
    ],
    [
        "name"=> "DC Ply Mens 2016/2017 Snowboard ",
        "category"=> "Доски и лыжи",
        "prise"=>"159999",
        "gif"=>"img/lot-2.jpg "
    ],
    [
        "name"=> "Union Contact Pro 2015 года размер L/XL",
        "category"=> "Крепления",
        "prise"=>"8000",
        "gif"=>"img/lot-3.jpg "
    ],
    [
        "name"=> "Ботинки для сноуборда DC Mutiny Charocal",
        "category"=> "Ботинки",
        "prise"=>"10999",
        "gif"=>"img/lot-4.jpg "
    ],
    [
        "name"=> "Куртка для сноуборда DC Mutiny Charocal",
        "category"=> "Одежда",
        "prise"=>"7500",
        "gif"=>"img/lot-5.jpg "
    ],
    [
        "name"=> "Маска Oakley Canopy",
        "category"=> "Разное",
        "prise"=>"5400",
        "gif"=>"img/lot-6.jpg "
    ]
];
function format_sum($number){
    $withRub = true;
    $number = ceil($number);
    if ($number >= 1000){
        $result = number_format($number, 0, ".", " ");
    }
    else{
        $result = $number;
    }
    if ($withRub == true){
        return $result . '<b class=\"rub\"> ₽ </b>';
    }
    else{
        return $result;
    }

}


function time_lots (){
$time1 =strtotime('now');
$time2 =strtotime('tomorrow');
$time3 = $time2 - $time1;
$time_minutes = floor($time3/60);
$time_hours = floor($time_minutes/60);
$time_minutes = ($time_minutes - $time_hours*60);
$lot_time_now = sprintf('%02d:%02d', $time_hours, $time_minutes );
return $lot_time_now;
}




function compile_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';
 if (!file_exists($name)) {
     return $result;
 }
 ob_start();
 extract($data);
 require($name);
 $result = ob_get_clean();
    return $result;
}



?>

