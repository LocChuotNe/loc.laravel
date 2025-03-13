<?php
class Car {
    public $brand;
    public $model;
    public function startEngine() {
        echo "The engine of " . $this->brand . " " . $this->model . " is started.";
    }
    public function stopEngine() {
        echo "The engine of " . $this->brand . " " . $this->model . " is stopped.";
    }
}
// Tạo đối tượng từ lớp Car
$myCar = new Car();
$myCar->brand = "Toyota";
$myCar->model = "Corolla";
// Sử dụng phương thức của đối tượng
$myCar->startEngine();
