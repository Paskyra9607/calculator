<?php
if ($_SERVER["REQUEST_URI"] === '/calculate') {
    echo json_encode(
        [
            "result" => calculate(json_decode(file_get_contents('php://input'), true)['expression'])
        ]
    );
    die;
}
// Load the HTML file
$htmlContent = file_get_contents('index.html');

// Output the modified HTML
echo $htmlContent;

function calculate($expression)
{
    if (str_contains($expression, "*")) {
        return multiply($expression);
    }
    if (str_contains($expression, "+")) {
        return addition($expression);
    }
    if (str_contains($expression, "-")) {
        return subtraction($expression);
    }
    if (str_contains($expression, "/")) {
        return division($expression);
    }

}

function multiply($expression)
{
  $numbers = explode('*', $expression);
  $result = 1;
  foreach ($numbers as $number) {
    $result *= (float)trim($number);
  }
  return $result;
}

function addition($expression)
{
  $numbers = explode('+', $expression);
  $result = 0;
  foreach ($numbers as $number) {
    $result += (float)trim($number);
  }
  return $result;
}

function subtraction($expression)
{
  $numbers = explode('-', $expression);
  $result = 0;
  foreach ($numbers as $number) {
    $result -= (float)trim($number);
  }
  return $result;
}

function division($expression)
{
  $numbers = explode('/', $expression);
  $result = 1;
  foreach ($numbers as $number) {
    $result /= (float)trim($number);
  }
  return $result;
}
?>