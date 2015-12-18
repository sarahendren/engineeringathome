![Footnotes for Kirby CMS](http://distantnative.com/remote/github/kirby-footnotes-github.png)  

[![Release](https://img.shields.io/github/release/distantnative/footnotes.svg)](https://github.com/distantnative/footnotes/releases)  [![Issues](https://img.shields.io/github/issues/distantnative/footnotes.svg)](https://github.com/distantnative/footnotes/issues) [![License](https://img.shields.io/badge/license-GPLv3-blue.svg)](https://raw.githubusercontent.com/distantnative/footnotes/master/LICENSE)
[![Moral License](https://img.shields.io/badge/buy-moral_license-8dae28.svg)](https://gumroad.com/l/kirby-footnotes)

This plugin extends [Kirby CMS](http://getkirby.com) with some basic and extremely easy footnote functionalities. The syntax is simple to understand and if the plugin is removed the remaining text still makes sense.

**The plugin is free. However, I would really appreciate if you could support me with a [moral license](https://gumroad.com/l/kirby-footnotes)!**


# Table of Contents
1. [Installation & Update](#Installation)
2. [Usage](#Usage)
3. [Options](#Options)
4. [Help & Improve](#Help)
5. [Version History](#VersionHistory)


# Installation & Update <a id="Installation"></a>
1. Download [Footnotes](https://github.com/distantnative/footnotes/zipball/master/)
2. Copy the `footnotes` directory to `site/plugins/`
3. Add CSS for the footnotes (optional)  
`.footnote`: in-text reference number, `sup` tag  
`.footnotes`: `div` wrapper for list of footnotes, `ol` list inside  
`.footnotedivider`: `div` element before the `ol` list  


# Usage <a id="Usage"></a>
Adding footnotes to your Kirbytext field is simple. Just type them inline in your post in square brackets like this:

```
[1. This is a footnote.]
```

Each footnote must have a number followed by a period, a space and the actual footnote. It does not matter which number as the footnotes will be automatically renumbered. Footnotes can contain anything you like including links or images and are automatically linked back to the spot in the text where the note was made.

```
“In a deterritorialized context, the conventional one-to-one 
relationship between state and territory is increasingly 
questioned and challenged” [1. Wong, L. (2002): Home away from 
home? Abingdon: Routledge. Seite 171]
```

**In-text reference:**  
![In-text reference](https://cloud.githubusercontent.com/assets/3788865/5635753/670ccacc-95ec-11e4-81b8-7cdc20b077b2.png)
**Footnotes list at the end of the text:**  
![Footnotes list](https://cloud.githubusercontent.com/assets/3788865/5635754/67339fe4-95ec-11e4-981a-ef3f47075935.png)

Notes:  
- You should not include square brackets [] inside the footnotes themselves.
- Unique footnote numbers are recommended, especially if the text is identical for multiple footnotes.

### Reference-less footnotes
To have a footnote / an information included in the footnotes list at the end of the text, but not as a reference number inside the text, just prepend a `<no>` tag to the footnote:
```
[1. <no>**Photo credits:** (link:http://www.flickr.com/photos/cubagallery/ text:Cuba Gallery)]
```


# Options <a id="Options"></a>

**Global footnotes**  
Footnotes can be used either as method on a text field, e.g. `$page->text()->footnotes()->kirbytext()`, when creating templates - or globally set for all Kirbytext outputs. To do the latter add the following to your `site/config/config.php`:
```php
c::set('footnotes.global', true);
```

**Smooth scrolling & Offset**  
There are also options to enable a smooth scrolling effect to the footnotes list and to define a certain offset to the end scrolling position (e.g. if a fixed header menu is used):

```php
c::set('footnotes.smoothscroll', true);
c::set('footnotes.offset', 0);
```

**Merge identical footnotes**  
Sometimes it might be handy to not repeat identical footnotes, but rather to reference only one single footnotes list entry. To do so add the following option to your `site/config/config.php`:

```php
c::set('footnotes.merge', true);
```

**Remove footnotes**  
If you wanna show the footnotes on certain pages (e.g. single article) but not on others (e.g. on the blog overview), you can add a parameter to the footnotes field method and it will remove all footnotes (the in-text references and the list):
```php
echo $post->text()->footnotes(false)->kirbytext();
```

**Template whitelist**  
You can allow footnotes only on specific templates by adding the following to your `site/config/config.php`:
```php
c::set('footnotes.templates.allow', array(
  'about',
  'blog',
  'project'
));
```

**Template blacklist**
You can restrict footnotes from specific templates by adding the following to your `site/config/config.php`:
```php
c::set('footnotes.templates.ignore', array(
  'about',
  'blog',
  'project'
));
```


# Help & Improve <a id="Help"></a>
*If you have any suggestions for further configuration options, [please let me know](https://github.com/distantnative/footnotes/issues/new).*


# Version history <a id="VersionHistory"></a>
Check out the more or less complete [changelog](https://github.com/distantnative/footnotes/blob/master/CHANGELOG.md).
