<?php

state1();
state1("fghp");
state1("fjrstp");
state1("fghq");
state1("fst");
state1("pqr");
state1("fghh");

function state1($stringValue = "fghi")
{
  $data = [["f", "g", "h", "i"], ["j", "k", "p", "q"], ["r", "s", "t", "u"]];
  find($data, $stringValue);
  echo "</br>";
  echo "</br>";
}

function find($array, $statement)
{
  $stringToArray = str_split($statement);
  $lastKey = 0;
  $setData = 0;
  $isValid = "false";
  foreach ($stringToArray as $item) {
    foreach ($array as $key => $value) {
      if ($value[$setData] === $item) {
        if ($lastKey === $key) {
          $isValid = "true";
          $setData++;
          break;
        }
        $setData--;
        $isValid = "false";
        break;
      }
    }
  }

  echo $isValid;
  echo "</br>==============================</br>";
}