# greetings
This is a repo for hello world stuff.

This is the composer branch.

## Step 1

Replace the project credentials:
https://github.com/thompiler/greetings/blob/composer/src/helloworld/greetings.php#L12-L13

Test to see if variables are filtered out once the error is in Airbrake:
https://github.com/thompiler/greetings/blob/composer/src/helloworld/greetings.php#L26-L27

Both `keysBlocklist` and the old, deprecated `keysBlacklist` option should be
supported

## Step 2

To run it, use:


```
composer hello
```

## Step 3

Check the "context" tab in Airbrake to see if the variables are filtered
properly
