<?php
function idx($array, $index, $default = null, $saniztize = true) {
  if (array_key_exists($index, $array)) {
    $value = $array[$index];
  } else {
    $value = $default;
  }
  if ($sanitize) {
    return htmlentities($value);
  } else {
    return $value;
  }
}

function echoEntity($value) {
  echo(htmlentities($value));
}

function assertNumeric($value) {
  if (is_numeric($value)) {
    return $value;
  } else {
    return null;
  }
}

