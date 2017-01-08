# LaMetric PHP

A PHP wrapper for creating push and pull applications with the LaMetric API.

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

### Initialize the class with configuration (push application)

```php
use Lametric\Lametric;

$lametric = new Lametric(array(
    'pushURL' => 'YOUR_PUSH_URL',
    'token' => 'YOUR_TOKEN',
));

```

### Initialize the class without configuration (poll application)

```php
use Lametric\Lametric;

$lametric = new Lametric();

```

## Available methods

### Change Icon

Set the default icon before pushing a message. This only applies to pushes without an icon # set.

```php
// Setting icon number to 95 will show a lightning icon
$lametric->setIcon(95);
```

*The icon number can be found in the icon gallery.*

*You can also create your own icon, but make a note of the number when it is inserted in the public gallery.*

### Send Push Notification

The push method allows you to send push notification to Lametric using a simple message, a message with the icon # specified, and an array (frames).

```php
// Send a simple push notification. Icon must be set using the setIcon method, otherwise it will default to null.
$lametric->push("Hello World!");

// Send a push notification with specific icon number.
$lametric->push("Hello World!", 95);

// Send a push notification with an array (frames) as parameter. Must use key, value pairs: text, icon.
// Note: The frames are not stored after the notification as been sent.
$lametric->push(array(array('text'=>'Frame 1', 'icon'=>51), array('text'=>'Frame 2', 'icon'=>62)));

```

### Add Frames

With the addFrame and addFrames method, frames can be added for either a push or poll application.

```php
// Add frame to notification.
$lametric->addFrame('Notification', 98);

// Add frames for use later
$lametric->addFrames(array(array('text'=>'Frame 1', 'icon'=>51), array('text'=>'Frame 2', 'icon'=>62)));
```

### Generate Data

When creating a poll application, use the generateData method in conjunction with the addFrame or addFrames methods to generate the necessary JSON data for the Lametric to retrieve.

```php
// Return frames as an array
$lametric->generateData();

// Return frame array as JSON data (poll method)
$lametric->generateData(true);
```

### Clear Frames
```php
// Clear frames array for object
$lametric->clearFrames();
```

## TODO
This is an early release of the wrapper, which is in need of some additional features:

- `Support other types of Indicator apps (e.g. Metric, Goal, Sparkline)`

## Credits

Copyright (c) 2017 - Programmed by Raphael Z.

## License

Copyright (c) 2017 Raphael Z.

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
