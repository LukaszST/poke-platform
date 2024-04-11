<p align="center"><a href="/"><img src="public/logo.png"></a></p>


## About Poke Platform

Poke Platform will be web application to track prices and your collection with Pokemon cards and product. 

## How to run
1. Run to get vendor directory
```shell
docker run --rm --interactive --tty -v $(pwd):/app composer install
```
2. Copy `.`env.examle`` to ``.env``
3. The run by Laravel sail
```shell
vendor/bin/sail up -d
```
3. Go to ``localhost``
4. Clock on generate app key

## Functionality documentation

1. WIP


## Planned functionality
- [x] Login and registration
- [x] List my collection of cards
- [x] Adding card from my collection
- [x] Removing  card from my collection
- [x] Integration with https://pokemontcg.io/ 
- [x] ~~CRUD or other~~ Command to update prices and save to DB
- [x] Storing locally data from API
  - [x] Storing data for cards
    - [x] Add information about set to easier search
  - [x] Storing data for sets
- [x] Saving images from API
- [x] Trade card with other with secure approve
- [x] Showing historical prices for cards
- [x] Add card info (name, set, picture) on the price chart view
 
## #100commitow

I want to create fast MVP with a lot of mistakes and bad decisions and after working web application make refactor. Using techniques patterns, and guides from Refactoring books.

## First Ideas how to write bad application

Let's play a game about writting bad code and then fixing it and learning a lot.
- [x] Logic in controller
- [x] Logic in views
- [ ] God object user
- [ ] everything its connected together
- [x] DB Queries from all places
- [x] Third party classes in all places in project
