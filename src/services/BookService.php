<?php

namespace BookStore\Services;

use BookStore\Models\Book;
use BookStore\Helpers\Formatter;

class BookService
{
    public function getFormattedBookInfo(Book $book): string
    {
        return Formatter::formatBookInfo($book->getTitle(), $book->getAuthor());
    }
}
