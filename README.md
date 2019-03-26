# word-changes-tracker
A small php library that tracks changes in two text inputs.

![alt text](https://github.com/ScripTech/PHP-Libs/blob/master/word-changes-tracker_.PNG "Example")

## Usage

## Instalations:
```
  composer require edilson/word-changes-tracker
```

## In your app:
Use:
```php
    use EdilsonMucanze\WordChangesTracker\WordChangesTracker;
    use EdilsonMucanze\WordChangesTracker\Contracts\TrackChanges;
    use EdilsonMucanze\WordChangesTracker\Helpers\TrackChangesHelper;
    use EdilsonMucanze\WordChangesTracker\Helpers\StringFormat;

    $WCTrack = new WordChangesTracker();
    $StringFormat = new StringFormat();

```

Then:

```php
    $std_word = $StringFormat->StringFormat("Hello my name is Edilson im Fullstack Dev. I like PHP");
    $in_word = $StringFormat->StringFormat("Hello my name is Edilson i'm a Full Stack Dev. I love PHP");
    $response = $WCTrack->stringCompare($std_word, $in_word);
    $TrackHelper = new TrackChangesHelper($response);
    $changes = $TrackHelper->traceChanges(true);
```

WordChangesTracker will Return array:
```
  Array (
    [new] => Hello my name is Edilson i'm a Full Stack Dev. I love PHP
    [old] => Hello my name is Edilson im Fullstack Dev. I like PHP
    )
  *
  print_r($changes).
```
