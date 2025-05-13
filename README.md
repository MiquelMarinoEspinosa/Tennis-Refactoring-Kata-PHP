_Support this and all my katas via [Patreon](https://www.patreon.com/EmilyBache)_

# Tennis Refactoring Kata

You can find out more about this exercise and where it comes from in [this YouTube video](https://youtu.be/XifUs1FhWRc). There are also some Guided Learning Hour videos that include demos of me solving parts of it.

* [Refactoring: What you need to know](https://youtu.be/K7xSsNpeM8I) - includes demo of TennisGame3 in C#
* [Refactoring Skills: Extract Function](https://youtu.be/lOAktlPd8uk) - includes demo of TennisGame6 in C#

# The Scenario

Imagine you work for a consultancy company, and one of your colleagues has been doing some work for the Tennis Society. The contract is for 10 hours billable work, and your colleague has spent 8.5 hours working on it. Unfortunately he has now fallen ill. He says he has completed the work, and the tests all pass. Your boss has asked you to take over from him. She wants you to spend an hour or so on the code so she can bill the client for the full 10 hours. She instructs you to tidy up the code a little and perhaps make some notes so you can give your colleague some feedback on his chosen design. You should also prepare to talk to your boss about the value of this refactoring work, over and above the extra billable hours.

There are several versions of this refactoring kata, each with their own design smells and challenges. I suggest you start with the first one, with the class "TennisGame1". The test suite provided is fairly comprehensive, and fast to run. You should not need to change the tests, only run them often as you refactor.

There is a deliberate error in several of the implementations - the player names are hard-coded to "player1" and "player2". After you refactor, you may want to fix this problem and add suitable test cases to prove your fix works.

If you like this Kata, you may be interested in [my books](https://leanpub.com/u/emilybache) and website [SammanCoaching.org](https://sammancoaching.org)

## Kata Description

Here is a description of the problem this code is designed to solve: [Tennis Kata](https://sammancoaching.org/kata_descriptions/tennis.html).

## Questions to discuss afterwards

* How did it feel to work with such fast, comprehensive tests?
* Did you make mistakes while refactoring that were caught by the tests?
* If you used a tool to record your test runs, review it. Could you have taken smaller steps? Made fewer refactoring mistakes?
* Did you ever make any refactoring mistakes and then back out your changes? How did it feel to throw away code?
* What would you say to your colleague if they had written this code?
* What would you say to your boss about the value of this refactoring work? Was there more reason to do it over and above the extra billable hour or so?

## Code Reading Practice
Test your code reading skills. Here is a description of what to do: [Scanning for Code Smells](https://sammancoaching.org/exercises/code_reading.html). There are suitable lists of urls to open in some of the language subdirectories.

# Tennis Refactoring Kata - PHP Version

See the [top level readme](../README.md) for general information about this exercise. This is the PHP version of the
 Tennis Refactoring Kata.

## Installation

The kata uses:

- [PHP 8.0+](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org)

Recommended:
- [Git](https://git-scm.com/downloads)

See [GitHub cloning a repository](https://help.github.com/en/articles/cloning-a-repository) for details on how to
create a local copy of this project on your computer.

```sh
git clone git@github.com:emilybache/Tennis-Refactoring-Kata.git
```

or

```shell script
git clone https://github.com/emilybache/Tennis-Refactoring-Kata.git
```

Install all the dependencies using composer

```shell script
cd Tennis-Refactoring-Kata/php
composer install
```

Run all the tests

```shell script
composer tests
```

## Dependencies

The kata uses composer to install:

- [PHPUnit](https://phpunit.de/)
- [PHPStan](https://github.com/phpstan/phpstan)
- [Easy Coding Standard (ECS)](https://github.com/symplify/easy-coding-standard)
- [PHP CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer/wiki)

## Folders

- `src` - contains the TennisGame interface and three TennisGame classes, which need improving (see
  [top level readme](../README.md) for more information)
- `tests` - contains the three corresponding TennisGameTests, one for each class. All the tests are passing, and
  shouldn't need to be changed.

## Testing

PHPUnit is pre-configured to run tests. PHPUnit can be run using a composer script. To run the unit tests, from the
 root of the PHP kata run:

```shell script
composer tests
```

On Windows a batch file has been created, similar to an alias on Linux/Mac (e.g. `alias pu="composer test"`), the same
 PHPUnit `composer test` can be run:

```shell script
pu.bat
```

### Tests with Coverage Report

To run all test and generate a html coverage report run (requires [xdebug](https://xdebug.org/download)):

```shell script
composer test-coverage
```

The test-coverage report will be created in /builds, it is best viewed by opening **index.html** in your browser.

## Code Standard

Easy Coding Standard (ECS) is used to check for style and code standards, **PSR-12** is used. The current code is not
 upto standard!

### Check Code

To check code, but not fix errors:

```shell script
composer check-cs
```

On Windows a batch file has been created, similar to an alias on Linux/Mac (e.g. `alias cc="composer check-cs"`), the
 same `composer check-cs` can be run:

```shell script
cc.bat
```

### Fix Code

There are may code fixes automatically provided by ECS, if advised to run --fix, the following script can be run:

```shell script
composer fix-cs
```

On Windows a batch file has been created, similar to an alias on Linux/Mac (e.g. `alias fc="composer fix-cs"`), the same
 `composer fix-cs` can be run:

```shell script
fc.bat
```

## Static Analysis

PHPStan is used to run static analysis checks.  The current code is not upto standard!

```shell script
composer phpstan
```

On Windows a batch file has been created, similar to an alias on Linux/Mac (e.g. `alias ps="composer phpstan"`), the
 same `composer phpstan` can be run:

```shell script
ps.bat
```

**Happy coding**!

### Init development environment
The development environment require `docker` installed

Run the following commands:

```
make build
make up
make install
```

### Refactor
#### Initial code coverage
- The initial code coverage is about `98.12%`
  - All classes have got `100%` coverage except the `TennisGame2`, which has got `94.12%`
    - The coverage could be increased one this class before starting the refactor of this class
  - The coverage is good enough to start the refactor process

### Refactor strategy
- The refactor will basically consists in the following strategy
  - Identify at the first stages quick wins
    - extract paragraphs into methods
    - use queries instead of temp variables
    - split and slide whiles and foreachs
    - introduce constants for magic numbers
    - remove duplicated code
    - apply safe guards early returns when possible
  - Apply the refactor in a baby step manner
  - Execute the tests for each change before commiting the changes
  - Commit changes frequently to have a safe rollback point
  - Divise further design as you get familiar with the code through the refactor process
- The process as well as the decisions taken will be commented at the `Refactor` section in this `README.md` file
- Having said that, let's start the refactor with [TennisGame1](./src/TennisGame1.php) class. **Happy refactoring! :=)**

### Refactor
#### TennisGame1
- With a first look scrolling up and down slowly, the class has a certain degree of indentation and nesting level as well as some conditional branches which increase the code complexity
  - The first idea would be reduce the level of nesting with `extract method`
  - Reduce the code complexity reducing the `conditional branches`
- Colapsing and opening methods analysis
  - Colapsing the whole methods and just open one level of indentation, it can be found the first level of indentation
    - I think that applying safe guards should help on reducing this conditional branches
    - In case of `wonPoint` method it could even be solved with a `ternary` statement
    - When it comes to the `getScore` there is a `temp variable` called `score` - go figure :P - which is used as a returned result. This `temp variables` use to lead to implement a couple code to update this variable status. I think in this cases `safe guards` AKA early returns could help at list to reduce the number of branches conditions
    - Also I think that to follow [PSR12](https://www.php-fig.org/psr/psr-12/) the attributes name should change to be `camelCase`
- Apply `ternary` instruction at `wonPoint` method
  - Also it could have been change using `safe guard`
- Apply `safe guard` early return at first branch condition at `getScore` method
  - Return directly the `match` result value without returning the `score` variable
- Apply `safe guard` early return to second condition at `getScore` method
  - `safe guard` at first condition without returning the `score` variable