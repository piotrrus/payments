# payments

## Payments Import App 

- not finished yet, but the work is in progress

## Description
The App is designed to import data from csv files to database.

## Server
What you can find on the Github except the code?
 - Readme
 - sql files
 - some screens
 
## Database 
MySQL relational database is divided into several tables:
 - Banks (bank data with currency)
 - Banks files types (avalaible file types for choosen bank)
 - Clients (fundametal client informations)
 - Clients accounts (clients accounts numbers)
 - Currency (list of avalaible currencies)
 - Files types (list of avalaible file types)
 - Payment operations (all clients operations)

There's another table, that should be used IMHO (but i didn't at the moment) to store data for client accounts.
And this information (account_id) should be put into payment operation (for a future, maybe).

## Code
I've used only clear OOP Php (no framework) with Bootstrap external CSS library - to improve the look of the app.
App files is organised according to MVC pattern.

Controllers use a Template library to show choosen view file together with supported data.
All operations associated with database were placed in a two database library files: DbBase and Database.
I'm using simple autoloader to load classes automatically.
Queries needde to get data from database were constructed as a pure text. No Sql contructor, no ORM were used.
