<?php

require_once __DIR__ . '/../vendor/autoload.php';

use BookStore\Models\Book;
use BookStore\Services\BookService;

$book = new Book("The Great Gatsby", "F. Scott Fitzgerald");
$service = new BookService();

echo $service->getFormattedBookInfo($book);
