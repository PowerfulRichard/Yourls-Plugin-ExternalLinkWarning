# Yourls-Plugin-ExternalLinkWarning

A [YOURLS](http://yourls.org) plugin to warn visitors that they are about to visit an external link.  
demo：https://hurl.live/gh  
[中文版](https://gitee.com/richardhu714/yourls-plugin-external-link-warning)

## Features

show a warning pages when the upcoming link is different from your website domain name

## Setup

### YOURLS
* Download `plugin.php` in this repo.
* Edit `plugin.php` and rewrite line 126: change `$your_site` to your site.
* Place `plugin.php` into the `<yourls_root>/user/plugins/linkwarning` folder(If there is no such folder, create a new one).
* Activate the plugin in the admin zone of YOURLS
* Enjoy.
