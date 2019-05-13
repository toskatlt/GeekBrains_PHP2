<?php

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A(); // создание объекта экземпляра класса
$a2 = new A(); // создание второго объекта экземпляра того же класса
$a1->foo(); // Вывод: 1. Так как стоит предварительное приращение инкримента
$a2->foo(); // Вывод: 2. Так как переменная a2 является экземпляром того же класса
$a1->foo(); // Вывод: 3.
$a2->foo(); // Вывод: 4.


class B {
    public function foo() {
        static $y = 0;
        echo ++$y;
    }
}
class C extends B {
}
$b1 = new B(); // создание объекта экземпляра класса 
$c1 = new C(); // создание объекта копии экземпляра класса
$b1->foo(); // Вывод: 1. Так как стоит предварительное приращение инкримента
$c1->foo(); // Вывод: 1. Запуск копии экземпляра класса из другой области памяти счетчик переменной $y начинается с начала
$b1->foo(); // Вывод: 2. Так как стоит предварительное приращение инкримента
$c1->foo(); // Вывод: 2. Так как стоит предварительное приращение инкримента