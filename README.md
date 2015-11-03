# LaMetric PHP

A PHP wrapper for accessing the LaMetric API. This is a simple example to show how to push data to an Indicator App.

## Requirements

- PHP 5.3 or higher
- cURL
- Registered LaMetric developer account

## Get started

To use the LaMetric API you must create a developer account and associate your device. From there, you will need to create an [Indicator App](https://developer.lametric.com/applications/createdisplay).

---

### Installation

```
$ composer require raphaelz/lametric-php
```

### Initialize the class

```php
use Lametric\Lametric;

$lametric = new Lemetric(array(
    'pushURL' => 'YOUR_PUSH_URL',
    'token' => 'YOUR_TOKEN',
));

```
## Available methods

### Send Push Notification

```php
$lametric->push("Hello World!");
```

### Change Icon

```php
// Setting icon number to 95 will show a lightning icon
$lametric->setIcon(95);
```

**The icon number can be found in the icon gallery.**
**You can also create your own icon, but create a note of the number when it is inserted in the gallery listed under My.**



## TODO
This is an early release of the wrapper, which is in need of some additional features:

- `Support multiple frames`
- `Support other types of Indicator apps (e.g. Metric, Goal, Sparkline)`

## Credits

Copyright (c) 2015 - Programmed by Raphael Z.

## License

Copyright (c) 2015 Raphael Z.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
