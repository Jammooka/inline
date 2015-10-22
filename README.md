# Inline

Inline is a stupidly simple and potentially dangerous plugin that uses file_get_contents to return the specified file as a string. This works great for inlining SVGs from a local file, though bear in mind that if you were to pass anything with sensitive data, it'll dump it out no questions asked. Give it a jpeg file and prepare for some gibberish.

**Never allow dynamic data into this, and probably keep it away from your client!**

In an effort to prevent any obvious security risks, it's limited to a certain folder, which is set in the config file. If it doesn't have this set, it won't do anything except log an error for the template debugger.

/*<br>
|--------------------------------------------------------------------------<br>
| Inline SVG Folder<br>
|--------------------------------------------------------------------------<br>
|<br>
*/<br>
$config['svg_folder'] = '/home/xxxxx/public_html/assets/images/';

---

To use, simply drop the filename into the file parameter:

{exp:inline:svg file="filename.svg"}
