# Seeding
## Product seeding done with Product factory. Therefore run seeding after or with migration. 
(php artisan migrate --seed) or (php artisan migrate and php artisan db:seed)

# Rules
## I have done 2 ways of creating rules
1. by programmer defined rules using class
2. custom rules that can be created by user (rules stored in db and data displayed using this criterias). Considering the time constraint, i have not added to option to create multiple condition on 1 go. So on the same rule name new conditions can be added.

# scalability
For creating custom rules from user end, there has to be a proper rule creation form to be developed which has to be CRUD. I have had the basic rule creation in place for now with 1 criteria at a time. But multiple conditions can be added to the same rule by creating a new rule with a previous added rule name.

# design
The page designs are just basic bootstrap

# commands or steps to start
### create .env file from .env.example and define the db details
### composer update
### php artisan key:generate
### php artisan cache:clear
### php artisan migrate --seed
### php artisan serve
