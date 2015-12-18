This plugin extends [Kirby CMS](http://getkirby.com) with some basic and extremely easy footnote functionalities. The syntax is simple to understand and if the plugin is removed the remaining text still makes sense.


# Installation & Update
1. Download [Footnotes](https://github.com/distantnative/footnotes/zipball/master/)
2. Copy the `site/plugins/footnotes` directory to `site/plugins/`
3. Add CSS for the footnotes (optional)  
`.footnote`: in-text reference number, `sup` tag  
`.footnotes`: `div` wrapper for list of footnotes, `ol` list inside  
`.footnotedivider`: `div` element before the `ol` list  


# Usage
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


# Options

You can find the full information and documentation of all options over at the [Github repository](https://github.com/distantnative/footnotes).

