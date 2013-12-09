[Comments Evolved](https://github.com/eustasy/comments-evolved)
=======================

Comments Evolved for HTML is two small PHP functions for activating various commenting systems on any php based website.

If you're looking for integration on WordPress, or just want to see the "original" (very little of that code remains), then there is a [plugin page](http://wordpress.org/plugins/gplus-comments/) and a [GitHub repo](https://github.com/CloudHeroDevOps/comments-evolved) you can look at.

###Setup
In the `CommentsEvolved_Config.php` file, change the Disqus Shortname and API Key to your own. To obtain these will need to [sign up your site](https://disqus.com/admin/signup/) and [register an applicatiom](http://disqus.com/api/applications/).

You may also wish to change the default Publisher and Author IDs if your are planning to use CommentsEvolved_Header.php

###Usage
To use, do somethings like this.
```
$Canonical = 'http://example.com/hello-owl'
$HTML_Safe_Title = 'Hello Owl';

require 'CommentsEvolved_Comments.php';
// Adds a Canonical, Stylesheet, and Google Author and Publisher Links.
CommentsEvolved_Header($Canonical);

require 'CommentsEvolved_Comments.php';

CommentsEvolved_Comments($Canonical,$HTML_Safe_Title,true,true,false,true);

/* CommentsEvolved_Comments(
	$Canonical, // Canonical URL
	$HTML_Safe_Title, // HTML Safe Title
	$Disqus [boolean: true, false; default: true;], // Disqus Comments
	$Facebook [boolean: true, false; default: true;], // Facebook Comments
	$GooglePlus [boolean: true, false; default: true;], // Google Plus Comments - EXPERIMENTAL
	$Load_jQuery [boolean: true, false; default: true;], // Load jQuery
); */

```
