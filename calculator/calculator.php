<?php

class Calculate
{
    private $x;
    private $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function addition()
    {
        return $this->x + $this->y;
    }

    public function minus()
    {
        return $this->x - $this->y;
    }

    public function division()
    {
        return $this->x / $this->y;
    }

    public function multiply()
    {
        return $this->x * $this->y;
    }
}

$calculator = new Calculate($_POST['x'], $_POST['y']);

switch ($_POST['operator']) {
    case "+":
        echo $calculator->addition();
        break;
    case "-":
        echo $calculator->minus();
        break;
    case "*":
        echo $calculator->multiply();
        break;
    case "/":
        echo $calculator->division();
        break;
}

try {
    if ($_POST["operator"] == "/" && $_POST["y"] == 0) {
        throw new Exception("mẫu số không thể bằng 0");
        }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
};

