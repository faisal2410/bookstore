<?php

namespace BookStore\Helpers;

class Formatter
{
    public static function formatBookInfo(string $title, string $author): string
    {
        return "Title: $title, Author: $author";
    }
}
