What is this package
====================

Many packages need the project hosting them to have a "DEBUG" setting.
Those packages can act differently whether the DEBUG setting is set or not.
For instance, a package could decide to enable or disable the cache based on this setting, or a package
could display detailed exception backtrace if debug is enabled.

This package contains a Mouf installer that will create a `DEBUG` constant in your `config.php` and initialize
it to true.

Mouf package
------------

This package is part of Mouf (http://mouf-php.com), an effort to ensure good developing practices by providing a graphical dependency injection framework.
