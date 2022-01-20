<?php

state1();
echo "<br/>";
state2();

function state1()
{
  $data = [];
  $restrictData = [1, 2, 5, 7, 10, 11, 13, 14, 17, 19, 22, 23, 25, 26, 29, 31, 34, 35, 37, 38, 41, 43, 46, 47, 49, 50, 53, 55, 58, 59, 61, 62];
  for ($i = 1; $i <= 64; $i++) {
    $data[] = $i;
  }

  $start = 0;
  $counter = 7;

  echo "<table style='text-align: center'>";
  foreach ($data as $value) {
    if ($start === 0) {
      echo "<tr>";
    }
    if (in_array($value, $restrictData, true)) {
      echo "<td style='background-color: black;color: white'>" . $value . "</td>";
    } else {
      echo "<td>" . $value . "</td>";
    }
    if ($start === $counter) {
      echo "</tr>";
      $start = 0;
    } else {
      $start++;
    }
  }
  echo "</table>";
}

function state2($stringValue = "DFHKNQ")
{
  echo "saya bingung terlalu luas untun encryption";
  echo "<br/>";
  echo crypt($stringValue, "salt");
}