<?php

namespace RootNameSpace\Belajar\PHP\MVC\App;

class View
{
    public static function render(string $view, array $model = ['title' => 'Bookstore']): void
    {
        require __DIR__ . '/../View/header.php';
        require __DIR__ . '/../View/' . $view . '.php';
        require __DIR__ . '/../View/footer.php';
    }

    public static function redirect(string $path): void{
        header('Location: ' . $path);
    }

    public static function component(string $view)
    {
        require __DIR__ . '/../View/component/' . $view . '.php';
    }
}
