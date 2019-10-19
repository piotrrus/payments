# payments

## Payments Import App 

The App is designed to import data from csv files to database.
Data stored to database at the moment are not validated.
According to task rules - it's been used only clear OOP Php (no framework) and without any external library.

I put also second solution: Rest by Laravel and Front in Angular : https://github.com/piotrrus/payments-rest-angular.

## Server
What you can find on the Github except the code?
 - readme
 - sql files
 - some screens
 
## Database 
MySQL relational database is divided into several tables:
 - Banks (bank data with currency)
 - Banks files types (avalaible file types for choosen bank)
 - Clients (fundametal client informations) - not used
 - Clients accounts (clients accounts numbers) - not used
 - Currency (list of avalaible currencies)
 - Files types (list of avalaible file types)
 - Payment operations (all clients operations) - some data should be separated = not used
 - Payment operations2 (all clients operations)
 
I've used simple and old PDO library class to handle with database.

There's another table, that should be used IMHO (but i didn't at the moment) to store data for client accounts.
And this information (account_id) should be put into payment operation table.

## Code
I've used only clear OOP Php with Bootstrap external CSS library - to improve the look of the app.

App files is organised according to MVC pattern.

Controllers organise all needed operations and use a Template class to show choosen view file together with supported data.

All operations associated with database were placed in a two database library classes: abstract DbBase and Database.

It's been used very simple autoloader to load classes automatically.
Queries needed to get data from database were constructed as a pure text. No Sql contructor, no ORM were used.

All post data are taken from Request class, which provide sanitized value by key.
I've assumed that can be different file formats, so i decide to use FileFactory to provide the right file class.
