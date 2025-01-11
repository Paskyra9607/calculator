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
  $number1 = trim($numbers[0]);
  $number2 = trim($numbers[1]);
  return (float)$number1 * (float)$number2;
}

function addition($expression)
{
  $numbers = explode('+', $expression);
  $number1 = trim($numbers[0]);
  $number2 = trim($numbers[1]);
  return (float)$number1 + (float)$number2;
}

function subtraction($expression)
{
  $numbers = explode('-', $expression);
  $number1 = trim($numbers[0]);
  $number2 = trim($numbers[1]);
  return (float)$number1 - (float)$number2;
}

function division($expression)
{
  $numbers = explode('/', $expression);
  $number1 = trim($numbers[0]);
  $number2 = trim($numbers[1]);
  return (float)$number1 / (float)$number2;
}
?>