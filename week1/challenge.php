<?php
include_once "climatedata.php";

//Task 2
echo climatedata()["1921"]["jul"] . "<br>";
echo climatedata()["2021"]["jul"] . "<br>";

//Task 3
function get_temp($year, $month){
    return climatedata()[$year][$month];
}

//Task 4
function print_temps(){
    $output = "";
    foreach(climatedata() as $year => $months){
        foreach($months as $month => $temp){
            if($temp == null) continue;
            $output .= ($month !== "av") ? "$year / $month: $temp <br>" : "$year Avg: $temp <br>";
        }
    }
    return $output;
}
echo print_temps();

//Task 5

function get_avg($year){
    return get_temp($year, "av");
};

function calc_avg($year){
    $output = 0;
    $count = 0;
    foreach(climatedata()[$year] as $month => $temp){
        if($month == "av") continue;
        $count++;
        $output += $temp;
    }
    return $output / $count;
}
function calculate_all_year_averages(){
    $output = "";
    foreach(climatedata() as $year => $months){
        $avg_stored = get_avg($year);
        $avg_calced = calc_avg($year);
        $output .= "$year : Avg Stored = $avg_stored | Avg Calculated = $avg_calced <br>";
    }
    return $output;
}
echo calculate_all_year_averages();

//Task 6
function to_farenheit($v){
    return ($v * (9/5)) + 32;
}
function data_to_farenheit(){
    $output = "";
    foreach(climatedata() as $year => $months){
        foreach($months as $month => $temp){
            if($month == "av") continue;
            $temp_f = to_farenheit($temp);
            $output .= "$year / $month : $temp_f <br>";
        }
    }
}
echo data_to_farenheit();

//Task 7
function find_months_with_temp($target_temp){
    $output = "";
    foreach(climatedata() as $year => $months){
        foreach($months as $month => $temp){
            if($month == "av") continue;
            if($temp == $target_temp) $output .= "($year / $month)";
        }
    }
    return $output . "<br>";
}
echo find_months_with_temp(5.0);

//Task 8
function find_months_with_temp_equal_or_above($target_temp){
    $output = "";
    foreach(climatedata() as $year => $months){
        foreach($months as $month => $temp){
            if($month == "av") continue;
            if($temp >= $target_temp) $output .= "($year / $month)";
        }
    }
    return $output . "<br>";
}
echo find_months_with_temp_equal_or_above(5.0);

//Task 9 Todo
function calculate_all_year_averages_table(){
    $output = <<<EOT
    <table>
        <tr>
            <th>Year</th>
            <th>Stored</th>
            <th>Average</th>
        </tr>
EOT;

    foreach(climatedata() as $year => $months){
        $avg_stored = get_avg($year);
        $avg_calced = calc_avg($year);

        $table_entry = <<<EOT
        <tr>
            <td>$year</td>
            <td>$avg_stored</td>
            <td>$avg_calced</td>
        </tr>
EOT;
        $output .= $table_entry;
    }
    return $output . "</table>";
}

echo calculate_all_year_averages_table() . "<br>";
//Task 10 Todo

echo <<<EOT
<style>
.red{
    background-color: red;
}
.yellow{
    background-color: yellow;
}
.green{
    background-color: green;
}
.blue{
    background-color: skyblue;
}
</style>
EOT;

function get_temp_colour($temp){
    $red_threshold    = 8;
    $yellow_threshold = 7.5;
    $green_threshold  = 7;
    $blue_threshold   = 0;

    if($temp > $red_threshold) return "red";
    if($temp <= $red_threshold && $temp > $yellow_threshold) return "yellow";
    if($temp <= $yellow_threshold && $temp > $green_threshold) return "green";
    if($temp <= $green_threshold) return "blue";
}
function calculate_all_year_averages_table_color(){
    $output = <<<EOT
    <table>
        <tr>
            <th>Year</th>
            <th>Stored</th>
            <th>Average</th>
        </tr>
EOT;

    foreach(climatedata() as $year => $months){
        $avg_stored = get_avg($year);
        $avg_calced = calc_avg($year);

        $temp1 = get_temp_colour($avg_stored);
        $temp2 = get_temp_colour($avg_calced);
        
        $table_entry = <<<EOT
        <tr>
            <td>$year</td>
            <td class="$temp1">$avg_stored</td>
            <td class="$temp2">$avg_calced</td>
        </tr>
EOT;
        $output .= $table_entry;
    }
    return $output . "</table>";
}
echo calculate_all_year_averages_table_color() . "<br>";
?>