# Project 3
+ By: Jonathon Brown
+ Production URL: <http://p3.jonbrowndeveloper.me>

## Outside resources
used [Twitter Bootstrap 2.3.2](http://getbootstrap.com/2.3.2/)

also went through the [PHP Documentation](http://php.net/manual/en) for things like [array slicing](http://php.net/manual/en/function.array-slice.php) and [non case-sensitive string compare](http://php.net/manual/en/function.strcasecmp.php)

I checked out a few Stack Overflow posts for this project. [This one](https://stackoverflow.com/questions/5689918/php-strip-punctuation) was helpful for stripping punctuation. Then of course it gave me an issue which I then fixed with the [next stack overflow post...](https://stackoverflow.com/questions/475159/php-regex-what-is-class-at-offset-0).

## Code style divergences
- there are not any code style divergences

## Notes for instructor
+ I removed the 500 word limit from the application. 
+ You should also be able to paste in any text data and the controller file will then remove any non alpha characters.
+ I had trouble using the in line blade conditional statements within my 'create' view file. I would use a statement like {{ $var === "hello" ? "Hi" : "Goodbye" }} and it would always come back with an error saying that the variable was not yet initialized. So, I simply kept most of the logic within my Controller file (which is probably more appropriate anyway).
+ I also wanted to keep the footer like there is in Foobooks, however, I removed it because when I submitted the form on the 'create' page, it would sit there right in front of the outputted text. The answer is supposed to be that the footer has the 'absolute' tag, but that was already the case. I'm sure there could be a way to fix this with my CSS file, however, I didn't feel it worth my time to explore further. 