# [Comments Evolved](https://github.com/eustasy/comments-evolved)

[![Build Status](https://travis-ci.org/eustasy/comments-evolved.svg?branch=master)](https://travis-ci.org/eustasy/comments-evolved)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/75aa613d9bc845f4aaa8d3e32aba2b14)](https://www.codacy.com/app/lewisgoddard/comments-evolved?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=eustasy/comments-evolved&amp;utm_campaign=Badge_Grade)
[![Code Climate](https://codeclimate.com/github/eustasy/comments-evolved/badges/gpa.svg)](https://codeclimate.com/github/eustasy/comments-evolved)
[![Bountysource](https://www.bountysource.com/badge/tracker?tracker_id=263640)](https://www.bountysource.com/teams/eustasy/issues?tracker_ids=263640)

Comments Evolved for HTML is two small PHP functions for activating various commenting systems on any php based website.

If you're looking for integration on WordPress, or just want to see the "original" (very little of that code remains), then there is a [plugin page](https://wordpress.org/plugins/gplus-comments/) and a [GitHub repo](https://github.com/CloudHeroDevOps/comments-evolved) you can look at.

### Setup
In the `CommentsEvolved_Config.php` file, change the Disqus Shortname and API Key to your own. To obtain these will need to [sign up your site](https://disqus.com/admin/signup/) and [register an applicatiom](https://disqus.com/api/applications/).

You may also wish to change the default Publisher and Author IDs if your are planning to use CommentsEvolved_Header.php

### Usage
To use, do somethings like this.
```
$Canonical = 'https://example.com/hello-owl'
$HTML_Safe_Title = 'Hello Owl';

require 'CommentsEvolved_Comments.php';
// Adds a Canonical, Stylesheet, and Google Author and Publisher Links.
CommentsEvolved_Header($Canonical);

require 'CommentsEvolved_Comments.php';

CommentsEvolved_Comments($Canonical, $HTML_Safe_Title);

/* CommentsEvolved_Comments(
	$Canonical, // Canonical URL
	$HTML_Safe_Title, // HTML Safe Title
	$Disqus [boolean: true, false; default: true;], // Disqus Comments
	$Facebook [boolean: true, false; default: true;], // Facebook Comments
	$GooglePlus [boolean: true, false; default: true;], // Google Plus Comments - EXPERIMENTAL
	$Load_jQuery [boolean: true, false; default: true;], // Load jQuery
); */

```
