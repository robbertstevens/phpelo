# PHPElo

This is an implementation of the [Elo system](https://en.wikipedia.org/wiki/Elo_rating_system) created by [Arpad Elo](https://en.wikipedia.org/wiki/Arpad_Elo)


Too create a match you can use the `MatchFactory` class. The code below will create match between players both with an elo of 1500.


```php
$match = MatchFactory::createFromElo(1500, 1500);
```


To get the prediction of who is most likely to win the match. You can use the code below, this will return an percentage

```php 
$expectedResult = $match->calculateExpectedResult();
```
