<?php
const BASE_URL = 'http://localhost:8001';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $model['title'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= BASE_URL . '/style/style.css' ?>">
    <link rel="stylesheet" href="<?= BASE_URL . '/style/notfound.css' ?>">
    <link href="<?= BASE_URL . '/assets/fontawesome/css/fontawesome.css' ?>" rel="stylesheet" />
    <link href="<?= BASE_URL . '/assets/fontawesome/css/brands.css' ?>" rel="stylesheet" />
    <link href="<?= BASE_URL . '/assets/fontawesome/css/solid.css' ?>" rel="stylesheet" />
</head>

<body style="height: 100vh;">