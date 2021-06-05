# Garage challenge
This challenge is about design an application using OOP and PHP for a parking company that wants to
scale up and want's to have better understanding and control of their available parking slots
and define the vehicle types which floor supports.

## Requirements
- One garage can have one or multiple floors;
- Each floor accepts one or more vehicles types: (ex: cars and Trucks)
- Each floor has a max capacity of slots;
- Each has the status available/notAvailable

## Folder Structure
    .
    ├── src                     # Source files
        ├── Contracts           # Interfaces
        ├── Exceptions          # Exceptions
    ├── test                    # Automated tests
        ├── Unit                # Unit tests
    ├── .gitignore
    ├── composer.json
    ├── composer.lock
    ├── phpunit.xml
    └── README.md

## Testing
```
./vendor/phpunit/phpunit/phpunit
```
