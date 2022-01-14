<?php
require_once 'vendor/autoload.php';
require 'DBconn.php';
$faker = Faker\Factory::create();

$dbConn = new PDOConn();

$dbConn->connect();

// echo '<table>
//     <tr>
//     <th>Date</th>
//     <th>Company</th>
//     <th>Quantity</th>    
//     </tr>
// ';
echo '<p>';
for($i=0;$i<1000;$i++){
echo '<tr><td>';
$date = $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null)->format('Y-m-d');
// create date
// echo $date.'</td>';
//create company
$company=$faker->company;
// echo '<td>'.$company.'</td>';
//create quantity
$qty=$faker->numberBetween($min = 100, $max = 100000);
// echo '<td>'.$qty.'</td></tr>';
// $dbConn->insert($date,$company,$qty);
echo '("'.$date.'","'.$company.'",'.$qty.'),';
}
echo '</p>';
// echo '</table>';
?>