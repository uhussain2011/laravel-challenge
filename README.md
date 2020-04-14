## requirements to run the test

Developed in Laravel, using PHP 7.4. I normally develop in Laragon as its very quick in comparison to Docker but due to issues with Git I used Docker. 
The Database used is MySQL, port: 3306, database: homestead, password: secret. 

## Chosen Laravel MVC

Its my favourite MVC & one that I most comfortable with working with & continue to learn it almost everyday through developing projects and learning through Laracasts.

## database

The tables as well as the controller, model were built using php artisan commands, in future to speed up the process commands like ‘php artisan make:model -cm’ could be used.


## development choices

After adding the form into w3schools to see what it looks like, I decided to use the store method for the CRUD. Initially it was single table, People model and migration to store the data, then the data was bought to view using the index method. 
I then created the relationship between role and people and created the delete and edit/update functionality. I then added validation for 4 employees having the same role max and 10 record max as well as basic validation for each input. 

## what would I improve?

-	Add ternary validation “@error(‘email’) is-danger @enderror }}” to inputs.
-	Create a factory to populate the database
-   Add drop down for role selection (but that was not in the design)
-	Use artisan command such as “php artisan make:model -cm” so everything is connected together.
-	I could add a login for a User or/and admin
-	Instead of validating a request, building up $people = new People();, assign attributes and persist I could tie this all up into 1 to avoid duplication.



