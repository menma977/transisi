<?php
state1();
echo "<br/>";
state2();
echo "<br/>";
state3();

function state1()
{
  $values = [72, 65, 78, 75, 74, 90, 81, 87, 65, 55, 69, 72, 78, 79, 91, 100, 40, 67, 77, 86];

  echo "Nilai ujian sebuah kelas tersimpan dalam sebuah string berikut <br/>";
  echo implode(",", $values) . "<br/>";

  $averageValue = average($values);
  $highValue = high($values);
  $lowValue = low($values);

  echo "nilai rata-rata: $averageValue <br>";
  echo "7 nilai tertinggi: " . implode(", ", $highValue) . "<br>";
  echo "7 nilai terendah: " . implode(", ", $lowValue) . "<br>";
}

function state2($stringValue = "TranSISI")
{
  echo "Buatlah sebuah fungsi dalam PHP untuk menentukan jumlah huruf kecil dalam sebuah string. <br/>";

  $getLowerCase = isStringLowerCase($stringValue);
  $getUpperCase = isStringHigherCase($stringValue);

  echo "$stringValue mengandung: $getLowerCase hruf kecil<br>";
  echo "$stringValue mengandung: $getUpperCase huruf besar<br>";
}

function state3($stringValue = "Jakarta adalah ibukota negara Republik Indonesia")
{
  $getUnigram = unigram($stringValue);
  $getBigram = bigram($stringValue);
  $getTrigram = trigram($stringValue);

  echo "Unigram: $getUnigram <br>";
  echo "Bigram: $getBigram <br>";
  echo "Trigram: $getTrigram <br>";
}

function average($values)
{
  $averageValue = 0;
  foreach ($values as $value) {
    $averageValue += $value;
  }
  return $averageValue / count($values);
}

function high($values)
{
  $highValue = [];
  sort($values);
  $highToLow = array_reverse($values);

  foreach ($highToLow as $i => $iValue) {
    if ($i < 7) {
      $highValue[] = $iValue;
    }
  }

  return $highValue;
}

function low($values)
{
  $lowValue = [];
  sort($values);
  $highToLow = array_reverse($values);
  $lowToHigh = array_reverse($highToLow);

  foreach ($lowToHigh as $i => $iValue) {
    if ($i < 7) {
      $lowValue[] = $iValue;
    }
  }
  return $lowValue;
}

function isStringHigherCase($stringValue)
{
  $isLowerCase = 0;
  for ($i = 0, $iMax = strlen($stringValue); $i < $iMax; $i++) {
    if (ord($stringValue[$i]) >= 65 && ord($stringValue[$i]) <= 90) {
      $isLowerCase++;
    }
  }
  return $isLowerCase;
}

function isStringLowerCase($stringValue)
{
  $isHigherCase = 0;
  for ($i = 0, $iMax = strlen($stringValue); $i < $iMax; $i++) {
    if (ord($stringValue[$i]) >= 97 && ord($stringValue[$i]) <= 122) {
      $isHigherCase++;
    }
  }
  return $isHigherCase;
}

function unigram($stringValue)
{
  $stringToArray = explode(' ', $stringValue);

  $unigram = '';
  foreach ($stringToArray as $item) {
    $unigram .= $item . ', ';
  }
  return substr($unigram, 0, -2);
}

function bigram($stringValue)
{
  $stringToArray = explode(' ', $stringValue);

  $x = 0;
  $bigram = '';
  foreach ($stringToArray as $item) {
    if ($x < 1) {
      $bigram .= $item . ' ';
      $x++;
    } else {
      $bigram .= $item . ', ';
      $x = 0;
    }
  }
  return substr($bigram, 0, -2);
}

function trigram($stringValue)
{
  $stringToArray = explode(' ', $stringValue);

  $y = 0;
  $trigram = '';
  foreach ($stringToArray as $item) {
    if ($y < 2) {
      $trigram .= $item . ' ';
      $y++;
    } else {
      $trigram .= $item . ', ';
      $y = 0;
    }
  }
  return substr($trigram, 0, -2);
}