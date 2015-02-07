# PHP-calendar
Simple Calendar class

##usage

```php
//shows month of april, 2015
$calendar = new Calendar(4, 2015);
//leave the calendar constructor empty for the current month

print_r($calendar->getCalendar());
```

output
```
Array
(
    [0] => Array
        (
            [0] => 
            [1] => 
            [2] => 
            [3] => 1
            [4] => 2
            [5] => 3
            [6] => 4
        )

    [1] => Array
        (
            [0] => 5
            [1] => 6
            [2] => 7
            [3] => 8
            [4] => 9
            [5] => 10
            [6] => 11
        )

    [2] => Array
        (
            [0] => 12
            [1] => 13
            [2] => 14
            [3] => 15
            [4] => 16
            [5] => 17
            [6] => 18
        )

    [3] => Array
        (
            [0] => 19
            [1] => 20
            [2] => 21
            [3] => 22
            [4] => 23
            [5] => 24
            [6] => 25
        )

    [4] => Array
        (
            [0] => 26
            [1] => 27
            [2] => 28
            [3] => 29
            [4] => 30
        )

)

```
