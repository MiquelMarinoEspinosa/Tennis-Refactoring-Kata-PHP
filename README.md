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
  - `safe guard` at second condition without retuning the `score` variable
  - `safe guard` at third condition without returning the `score` variable
  - `safe guard` at fourth condition without returning the `score` variable
- To apply `safe guard` in the third contion at `getScore`, the code will directly be extracted since it has got a `loop` which uses the `score` temp variable. Its result will directly be returned without using the `score` variable
  - The extracted method will eventually use the `score` temp variable. However, it will just be used in the scope of the new function
- Now the coverage indicates that the last line `return $score` cannot be covered after the refactors. Meaning that the `temp variable` `score` is not needed any longer in the scope of the `getScore` method
- Remove `score` `temp variable`
- It has been noticed that at the second conditon branch at `getScore` method, there is a `temp variable` called `minusResult`. Since the `temp variable` usees the value of the 2 fields class, it can easily be replace by a `query`
- Replace `minusResult` `temp variable` into a `query`
  - Replace `temp variable` initialization for a `query`
  - Use the `query` instead of the `temp variable` at the first condition
  - Use the `query` instead of the `temp variable` at the second condition
  - Use the `query` instead of the `temp variable` at the third condition
  - Remove `minusResults` `temp variable`
- Next steps
  - Create hook for `minusResults` instead of a getter method
  - Remove `elseif` and `else` instructions
  - Change conditions and `switch` instructions into `match` instructions
- Create property hook for `minusResults`
  - Use it at the first `minusResult` condition
  - Replace the second `minusResult` condition
  - Replace the third `minusResult` condition
  - Now the coverage and the IDE indicates that the `minusResult` is not used. Therefore, it can be removed
  - Remove `elseif` and `else` instructions since `guard clauses` are currently used for the sake of reducing complexity
    - Turn `elseif` at `getScore` method into a simple `if` condition
    - Remove `else` last condition branch at `getScore` method
- Replace conditions at second `getScore` condition to use `match` instead
  - Introduce `match` operator with the default condition
  - Turn `elseif` into simple `if` since `guard clause` are used
  - Add at `match` operator the third condition
  - Add at `match` operator the second condition
  - Add at `match` operator the first condition
  - Format `match` operators
- Now I would like to deeper analyze the for loop at `buildScore` method
  - It is a loop of just `2` iterations. There must be a way to simplify to remove this loop :/
  - I will start with stracting the `switch` instruction into its own method and pass as paremeter the `tempScore`
    - Although it has decreased the coverage because the result type hint forces to add a `default` condition at the `switch` instruction, it is not a problem because very likely the method would be `inline` again at some point
    - Initialize `tempScore` out the loop and turn `else` condition into `$i > 1` condition
    - Update `score` first iteration out of the loop and reduce loop iterations to `1`
    - A loop with `one` iteration is like no loop ^^. Removing the loop and inline its body
    - Transform `case 3` `switch` instruction into the `switch` `default` case
    - Remove `i` `temp variable` and its condition
- Remove `temp variable` `tempScore` at `buildScore` method
  - Use `m_score2` instead of `tempScore` at second `partialScore` call
  - Use `m_score1` intead of `tempScore` at first `partialScore` call
  - Remove `tempScore` `temp variable`
- Remove `score` `temp variable`
  - Inline previous last `score` update into last `score` update
  - Inline again new previous last `score` update into last `score` update
  - override the `score` value with the second instruction and remove first initialization
  - Return directly the value of the first instruction and remove the `score` `temp variable`
- Replace simple dot concatenation into `sprintf` at `buildScore`
- Turn `switch` at `partialScore` into `match`
  - Start with the `default` case
  - Rename `tempScore` parameter into `score`
  - Add `thirty` case at `match` operator
  - Add `Fifteen` case at `match` operator
  - Add `Love` case at `match` operator and remove `switch` instruction
- Inline `buildScore` at `getScore` method
- Next steps
  - Rename `m_score` and `playerName` attributes
  - Consider using `property hooks` for the three cases at `getScore` method
    - Otherwise extract `match` into their own methods
  - Extract condition into methods to make them more understandable
- Rename `m_score1` to `firstPlayerScore`
- Rename `m_score2` to `secondPlayerScore`
- It has been notice that at `wonPoint` method it is compared the `playerName` parameter with a harcoded string called `player1`. It might be assumed that not all the `first players` would be named as `player1`
  - Changing without commiting the unit test to pass another name as `first player` different than `player1`
    - It has also needed to be changed the [TestMaster](./tests/TestMaster.php) to pass another player name since just changing the [TennisGame1Test](./tests/TennisGame1Test.php) was not enough
    - As expected, it failed :/
      - Since the [TestMaster](./tests/TestMaster.php) is inherited for all the [tests](./tests/), it can be considered as a main flaw which can mask the fact that the tests does not cover the code in a proper manner
    - The fix should be to compared the `playerName` parameter at `wonPoint` with the current `player1Name` field to implement a dynamic logic independent of the parameter
      - May be a some kind of check could be done in case the parameter has a player name which does not belong to the current players game
      - A better suggestion might be to implement 2 different methods `wonPlayerOne` and `wonPlayerTwo` without parameters and they can be orchestrated by the client. Nevertheless, this approach will not be implemented since it would require to change the tests
    - Fix applied to compare with `player1Name` value instead with a harcoded string
- Another thing that just occurred to me it is that it might be used an `array` or even a `class` structure called `Score` for instance to keep track of the `players scores`. For now may be is to much. I would like to see the rest of the `Games` first before jumping into conclusions. For now I will leave it with the current fields
  - My smell was more on the fact that the `player2Name` it is not even used more than in the `__construction` method to write the field :/
  - Also another smell is the `score` suffix for both fields which indicates to have its own responsability. It might be that the `Score` class can manage all the logic and the `Game` just act either as a proxy or orchestrator
- Rename `player1Name` field to `firstPlayer`
- Rename `player2Name` field to `secondPlayer`
- Before going any further, it would be great to fix the hardcoded `player1` and `player2` at [TestMaster](./tests/TestMaster.php) as it is suggested at the initial kata's documentation. The ideas is to introduce the fix first at [TennisGame1Test](./tests/TennisGame1Test.php) backward compatible with the rest of the tests which will be refactor in further iterations
  - Introduce `protected` fields at `TestMaster` to save players' names
  - Update the new fields at `setUp` method at `TennisGame1Test` class
  - Pass the new test fields as parameter to create `TennisGame1`
  - Refactor `TestMaster` to use the new fields
    - Refactor `TestMaster` to use the new `firstPlayer` field. Initialized it as `player1` as default value
    - Refactor `TestMaster` to use the new `secondPlayer` field. Initialized it as `player2` as default value
    - Change `player1` player name at `TennisGame1Test` to `Novak Djokovic`
    - Change `player2` player name at `TennisGame1Test` to `Rafa Nadal`
    - Another interesting implementation will be to expose the `players names` from the `TennisGame1`. It might be considered in further iterations
  - Now the unit tests can be used dynamically on the game players' names
- `extract method` first condition at `getScore` method
- `extract method` second condition at `getScore` method
- it has just been noticed that there are still hardcoded code at both `TennisGame1` and `TennisMaster` which still reference to the `player1` and `player2` :F
  - Refactor `TestMaster` to use `firstPlayer` field at `data provider` instead of hardcoded `player1`
    - It cannot dynamically get changed at the `data provider` :(
      - The fields are not initialized when the `data provider` is executed
        - It executes before the `setUp` method and it would require `static` fields anyway
        - The expected message it is used at the assertion in the `TennisGame1Test` and I assume that also in the rest of the tests
        - On not very elegant way to solve it is to use `string replacement` just before the assertion is done
          - Create a `private` method at `TennisGame1` to replace `player1` with the current `firstPlayer` name and also change it at the `TennisGame1` to make the test pass
            - Remember to execute the whole `unit tests suite`
              - I was too focus just executing the `TennisGame1Test` suite. Fortunately, nothing bad happened ;P
          - Refactor use `sprintf` at `TennisGame1` instead of `dot concatenation`
          - Replace `player2` string at expected result and fix it at `TennisGame1`
          - Pull up the `fixExpectedResultPlayersNames` at `TestMaster` and make it `protected` to be reusable for the rest of the `test classes`
- Next steps
  - Use `hook` property to compute the `score`
  - Extract `match` logic for the first 3 cases
  - At this point the `TennisGame1` refactor might be considered done and I could jump to refactor the `TennisGame2` ^-^
- `extract method` `advantatge` build message
  - Extract logic for `firstPlayer`
  - Apply the logic also for `secondPlayer`
- `extract method` `win for` build message
  - Extract logic for `firstPlayer`
  - Apply the logic also for the `secondPlayer`
- Extract `match` logic for the first 3 cases at `partialScore`
  - Map score message for `0 -> love` into a constant
  - Apply logic for `1 -> Fifteen`
  - Apply `guard clause` for the already mapped cases and remove cases from the match operator
  - Apply logic for `2 -> Thirty`
  - Remove `match` operator and directly return `default`
  - Apply `ternary operator`
  - `inline method` `partialScore` in `getScore` method
    - inline `firstPlayer`
    - inline `secondPlayer` and remove `partialScore` method
- Extract `match` logic for `isTheGameEqualized` using the current score message mapping
  - use mapping for the first case `0 -> Love-All`
  - refactor change `isTheGameEqualized` method's name to `isDraw`
  - refactor change `hasEitherPlayerMoreThanThreePoints` method's name to `isEitherAdvantageOrWin`
  - introduce `guard clause` at `isDraw` mapping score message logic
    - Surprisingly has applied all cases just in one shot ^^
    - Remove all `match` cases but the `default` case
  - directly return the `default` case and remove the `match` operator
  - introduce `ternary operator`
  - use `sprintf` instead of `dot concatenation`
- `extract method` logic conditions
  - Extract `isDraw` logic into a method called `drawMessage`
  - Refactor `isEitherAdvantageOrWin` method's name to `isAdvantageOrWin`
  - Extract `isAdvantageOrWin` logic into a method call `advantageOrWinMessage`
  - Extract final return message into a method called `playersScore`
  - Extract `playersScore` duplicated logic into a new method called `playerScore`
    - Extract `firstPlayer` logic
    - Apply logic to the `secondPlayer`
- Remove `message` methods suffixes method's name
  - Remove suffix at `drawMessage`
  - Remove suffix at `advantageOrWinMessage`
- 2 `warnings` came up when the `unit tests` are executed
  - The cause is undefined index at `self::SCORE_MESSAGE_MAP[$this->firstPlayerScore]` at `draw` method
  - Add `isset` for an extra check warning suppresing
- Middleway considerations
  - Now the code look much more modular and it is easier to understand
    -  The function are smalled, they use not a lot of parameters - most of the times 0 - and most importantly they reveal their intent
  - I thought that very likely the rest of the `Games` have exactly the same business logic as `TennisGame1`
    - That woud be told by the `unit tests`
      - In case the `unit tests Games` use the same `data provider`, chances are that the logic can be share across the `Games`
      - In that case, a super class would be created, pull the current `TennisGame1` logic up and reuse it at the rest of the `Games`
    - Also it has been identified part of the logic which could be extracted into another class called `Score` or `PlayersScore`. I guess the first option is better
      - That was notice dues to the `score` suffix for 2 fields and also because at the `TennisGame1` the `presentation` and `business` logic is coupled. It would be great to move the `buisness` logic - even is kind of small - to another class
  - For now I will stick to the already planned refactors and reflect on this refactors in further iterations
- Introduce `scoreBoard` `property hook`
  - locate `draw` logic there and return the `property hook` when `isDraw`
  - move `advantageOrWin` logic to the `property hook`
  - move last return logic to the `property hook`
  - return directly the `scoreBoard` `property hook` value at the `getScore` method
    - something that a do not really fancy it is that the coverage for the `property hook getter` it is not shown :/
    - I willll keep it as it is because the `property hook` strategy can have great value in future iterations. Besides I am sure that in future `phpunit` versions, this issue will be fixed somehow :)
- Next steps
  - At this point the `TennisGame1` refactor can be considered finished :D
  - Let's start the refactor of `TennisGame2`

#### TennisGame2
  - `TennisGame2` class has not got `100%` coverage - `94.12%` instead
    - 2 private methods are not covered: `SetP1Score` and `SetP2Score`
    - The `TennisGame2Test` is identical to `TennisGame1Test` before the refactor
    - According to the IDE, the methods `SetP1Score` and `SetP2Score` are not used. Therefore, this class refactor will start removing these unused methods
- Remove `SetP1Score` unused method
  - Increased coverage up to `96.97%`
- Remove unused `SetP2Score` method
  - Increased coverage up to `100%`
- At this point and given that the unit test is exactly the same that the one used for `TennisGame1`, the `TennisGame2Test` can be refactor to use the changes applied at the `TennisGame1Test` and be ready to apply a refactor which will consists on creating a new abstract superclass which will have the game's logic
  - I could spend some time on refactoring `TennisGame2` as the logic would be different than the `TennisGame1`. Nevertheless, I would rather to invest this time in case any of the games has got a different logic or to do another kata
  - Refactor `TennisGame1Test` to `pull up` `testScores` logic to `TestMaster`
  - Refactor `TestMaster` `fixExpectedResultPlayersNames` from `protected` visibility to `private`
  - Refactor `TestMaster` `seedScores` visibility from `protected` to `private`
  - Make `TennisGame1Test` final
  - At this point, it would be geat to get rid of the `Test` field's which save the player's name to fix it in the `data provider`. To do so, it is required to expose via either getter or public field with asymetric visibility. I will go for the second option to practice a little this new php's feature :P
    - Refactor `TennisGame1` exposing `firstPlayer` as `public field with asymetric visibility` - private setter, public access
    - Use `firstPlayer` public field at `TestMaster`
    - Extend `seedScores` visibility to be used to the rest of none yet refactored tests
    - Remove `firstPlayer` field at `TestMaster`
    - Refactor `TennisGame1` exposing `secondPlayer` as `public field with asymetric visibility` - private setter, public access
    - Use `secondPlayer` public field at `TestMaster`
    - Remove `secondPlayer` field at `TestMaster`
    - At this point, it would be great to dynamically generate the name of the players to make sure that the tests continue to pass regardless the name of the players. For this purpouse, it will be used the [Faker](https://fakerphp.org/) library
      - Install `Faker` library
      - Use `Faker` to generate `firstName` `Game` at `TennisGame1Test`
      - Use `Faker` to generate `secondName` `Game` at `TennisGame1Test`
      - `pull up` `Faker\Factory` at `TestMaster` to be reused by children test classes
        - Create protected `faker` field at `TestMaster`
        - Use `faker` to generate `firstPlayer` name at `TennisGame1`
        - Use `faker` to generate `secondPlayer` name at `TennisGame1`