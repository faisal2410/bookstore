# BookStore Project
## Overview

The BookStore project demonstrates PHP Object-Oriented Programming (OOP) concepts such as nested namespaces, helper files, and PSR-4 autoloading. This project creates a simple library where we manage information about books, format their details, and organize the code for scalability and maintainability. Using composer for PSR-4 autoloading, we can dynamically load classes based on namespaces, following modern PHP standards.

## Key Concepts
1. **Nested Namespaces**: Organizes classes into namespaces that mirror directory structures, making code modular and easier to navigate.
2. **Helper Files**: Contains utility functions that are reusable across the project.
3. **PSR-4 Autoloading**: Uses Composer to autoload classes based on their namespaces and directory paths.


## Project Structure
 
 ```
 BookStore/
├── src/
│   ├── Helpers/
│   │   └── Formatter.php       # Helper file to format book information
│   ├── Models/
│   │   └── Book.php            # Book model with title and author properties
│   ├── Services/
│   │   └── BookService.php     # Service to manage book information
│   └── main.php                # Entry file for the project
└── composer.json               # Composer configuration for PSR-4 autoloading

```


## Requirements
PHP 7.4 or later

Composer (for dependency management and autoloading)

## Steps to Create the Project
1. Set up Project Directory
Create the project directory and navigate into it:

```
mkdir BookStore
cd BookStore
```
2. Initialize Composer

    Run the following command to create a composer.json file:

```
composer init
```
This command will prompt you for details about the project; you can skip most prompts by pressing Enter. At the end, open the generated composer.json file and edit it to set up PSR-4 autoloading as follows:

```json
{
    "autoload": {
        "psr-4": {
            "BookStore\\": "src/"
        }
    }
}
```
3. Create the Directory Structure

   Set up the necessary folders and files:

```bash
mkdir -p src/Helpers src/Models src/Services
touch src/Helpers/Formatter.php src/Models/Book.php src/Services/BookService.php src/main.php
```
4. Write Code for Each Component

   src/Models/Book.php
This file defines the Book class to represent book details.

```php

<?php
namespace BookStore\Models;

class Book {
    private string $title;
    private string $author;

    public function __construct(string $title, string $author) {
        $this->title = $title;
        $this->author = $author;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getAuthor(): string {
        return $this->author;
    }
}
```
src/Services/BookService.php

This file defines the BookService class that uses the Book and Formatter classes to manage book information.

```php

<?php
namespace BookStore\Services;

use BookStore\Models\Book;
use BookStore\Helpers\Formatter;

class BookService {
    public function getFormattedBookInfo(Book $book): string {
        return Formatter::formatBookInfo($book->getTitle(), $book->getAuthor());
    }
}
```
src/Helpers/Formatter.php

This helper file contains a static method to format book details.

```php

<?php
namespace BookStore\Helpers;

class Formatter {
    public static function formatBookInfo(string $title, string $author): string {
        return "Title: $title, Author: $author";
    }
}
```
src/main.php

The entry file of the project, which instantiates and uses the other classes.

```php

<?php

require_once __DIR__ . '/../vendor/autoload.php';

use BookStore\Models\Book;
use BookStore\Services\BookService;

$book = new Book("The Great Gatsby", "F. Scott Fitzgerald");
$service = new BookService();

echo $service->getFormattedBookInfo($book);
```
5. Install Autoloading with Composer
  
   Run the following command to install Composer’s autoloading:

```bash

composer install
```
This command will create a vendor folder with autoload files based on the PSR-4 configuration.

## How to Run the Project
Run the project by executing main.php from the command line:

```bash

php src/main.php
```
You should see output similar to:

```yaml

Title: The Great Gatsby, Author: F. Scott Fitzgerald
```
## Summary

This project demonstrates:

Organizing code with nested namespaces for modularity.
Creating helper files to manage utility functions.
Autoloading classes with Composer following PSR-4 standards, enhancing scalability and maintenance.
By setting up this project, you’ll gain a strong foundation in organizing and autoloading PHP code in a professional, scalable way.






