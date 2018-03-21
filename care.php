<?php
/**
 * Created by PhpStorm.
 * User: anna
 * Date: 3/21/18
 * Time: 5:38 PM
 */


interface Enginable
{
    public function fill();
}

interface Doorer
{
    public function doorNumber();
}

interface Transmissioner
{
    public function transmissionType();
}

class ElEngine implements Enginable
{
    public function fill()
    {
        echo 'recharge! </br>';
    }
}

class DiesEngine implements Enginable
{
    public function fill()
    {
        echo 'Fill from the D! </br>';
    }
}

class Sedan implements Doorer
{
    public function doorNumber()
    {
        echo 'It is Sedan (4 doors!) </br>';
    }
}

class AutoT implements Transmissioner
{
    public function transmissionType()
    {
        echo 'I will do it (auto) </br>';
    }
}

class ManualT implements Transmissioner
{
    public function transmissionType()
    {
        echo 'Do it yourself (manual) </br>';
    }
}

class Car
{
    public function __construct(Enginable $engine, Doorer $door, Transmissioner $gearbox)
    {
        $this->engine = $engine;
        $this->door = $door;
        $this->gearbox = $gearbox;
    }

    public function fill()
    {
        $this->engine->fill();
    }

    public function doorNumber()
    {
        $this->door->doorNumber();
    }

    public function transmissionType()
    {
        $this->gearbox->transmissionType();
    }
}

$car = new Car(new ElEngine, new Sedan, new ManualT);
$car->fill();
$car->doorNumber();
$car->transmissionType();
