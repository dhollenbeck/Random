Random
======

Random Data Generator - use to create fake testing and demo data for your applications.

## Usage ##
```php

require_once '/path/to/random.php';

//names
$lastname = Random::lastname();
$firstname = Random::firstname();
$girl = Random::firstname('F');
$boy = Random::firstname('M');

//address
$street1 = Random::street1();
$street2 = Random::street2();
$city = Random::city();
$state = Random::state();
$zip = Random::zip();

//datetime
$dob = Random::birthdate();
$appt = Random::date('Y-m-d H:i:s', '+1 days', '+50 days');
$am_pm = Random::date('a');
$timezone = Random::date('e');

//person array
$male = Random::person('M');
$female = Random::person('F');
$either = Random::person();

//misc
$phone = Random::phone();
$letters = Random::letters(3);
$digits = Random::digits(2);

//lexicon (#=digit, ?=letter, *=either)
$ssn = Random::lexicon('###-##-####');
$password = Random::lexicon('My password is: *********');

//populating your database
$user = new Database\Model\User();
for($i=0;$i<1000;$i++){
	$person = Random::person();
	$user->create($person);
}
```

## Simlar Projects ##
https://github.com/fzaninotto/Faker

## Legal (MIT License)

Copyright (c) 2013 Dan Hollenbeck

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.