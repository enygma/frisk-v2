Frisk : Lightweight Functional Testing
======

Frisk is functional testing framework designed to be run from the command line. It 
allows for simple gets/posts and passing the results through assertions to test the 
resulting content.

Requirements
--------------
* PHP 5.3+
* pecl_http extension

Instructions:
--------------

Currently assertions are working, but test handling is still in progress.

You can run the sample code for now by:
* making "frisk.php" executable
* changing the php path at the top of the file
* ./frisk.php

TODO
--------------
* finish out test handling (Tests as RequestCollections)
* implement URI tracking in Request objects ("browser history")
* add checking for form fields in remote page ("name=" or "id=", using XPath? or is that too slow?)
* [?] ability to fetch certain assertion from the chain?

