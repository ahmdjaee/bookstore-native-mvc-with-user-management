<?php

namespace RootNameSpace\Belajar\PHP\MVC\App;

class View
{
    public static function render(string $view, array $model = ['title' => 'Bookstore'], bool $navbar = true): void
    {
        require __DIR__ . '/../View/header.php';
        ($navbar) ? require __DIR__ . '/../View/navbar.php' : null;
        require __DIR__ . '/../View/' . $view . '.php';
        require __DIR__ . '/../View/footer.php';
    }

    public static function redirect(string $path): void{
        header('Location: ' . $path);
    }
}
