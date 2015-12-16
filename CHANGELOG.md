Changelog
===

**16.12.2015**

1. Remove php short tag support
    * Using short tags is not recommended because it presents a problem when mixing php and xml. However, short echo (<?=) is still acceptable and works regardless of short_open_tags value on PHP 5.4 and up.

**14.12.2015**

1. Update Bootstrap to 3.3.6
2. Install new versions of jQuery
    * Master template now checks if it should use jQuery version 1 or 2 depending on the browser.
3. Correct users POST methods
