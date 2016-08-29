# SitemapXML

## Version
v 3.8 07.07.2016 12:39

Author
Andrew Berezin http://eCommerce-Service.com

Thanks
Special thanks to DivaVocals for the quality of the readme.

## Description
This Script generates an Sitemap as described here:
http://www.sitemaps.org/
http://support.google.com/webmasters/bin/answer.py?hl=en&answer=156184&topic=8476&ctx=topic

Zen-Cart Version
--------------
1.3.8, 1.3.9x, 1.5.5

Support thread
--------------
http://www.zen-cart.com/showthread.php?126810-SitemapXML-v-2

http://zen-cart.su/plugins/sitemap-xml/msg7/

https://github.com/AndrewBerezin/zen-cart-sitemap-xml

Affected files
--------------
None

Affects DB
--------------
Yes (creates new records into configuration_group, configuration and admin_pages tables).

DISCLAIMER
--------------
Installation of this contribution is done at your own risk.
Backup your ZenCart database and any and all applicable files before proceeding.

Features:
--------------
* supports Search-Engine Safe URLs (including MagicSeo)
* could be accessed by http or command line
* autogenerates multiple sitemaps for sites with over 50.000 URLs
* autogenerates multiple sitemaps if filesize exceeded 10MB
* writes files compressed or uncompressed (You can use the gzip feature or compress your Sitemap files using gzip)
* using index.php wrapper - http://domain.com/index.php?main_page=sitemapxml
* using languages file and etc.
* auto-notify Google and other SE.
* generation of a sitemap index file
* generation of xml-sitemaps for (separate files):
  1. Products with images (supports multilangual products, support hideCategories)
  2. Categories with images (supports multilangual categories, support hideCategories)
  3. Manufacturers with images
  4. Main (Home) page
  5. Reviews
  6. EZ-pages
    * multi-language support,
    * 'EZ pages rel=nofollow attribute' support (http://www.zen-cart.com/index.php?main_page=product_contrib_info&products_id=944),
    * 'date_added'/'last_modified' support,
    * check internal links ('alt_url') by "noindex" rule (main_page in ROBOTS_PAGES_TO_SKIP),
    * toc_chapter proccessing
  7. Testimonial Manager http://www.zen-cart.com/downloads.php?do=file&id=299
  8. News Box Manager http://www.zen-cart.com/downloads.php?do=file&id=147
  9. News and Article Manager & Optional Sideboxes http://www.zen-cart.com/downloads.php?do=file&id=791
  10. Product reviews page

If the products, categories, reviews have not changed since the last generation (time creation corresponding xml-sitemap file), a new xml-sitemap file not created (using existing xml-sitemap).

Priority is calculated on the basis of the positions in the selection from the database, ie the operator ORDER BY in the sql query. First item have priority=1.00, last=0.10. So can no longer be situations where all items in the file have the same priority.
* Products - ORDER BY p.products_sort_order ASC, last_date DESC
* Categories - ORDER BY c.sort_order ASC, last_date DESC
* Reviews - ORDER BY r.reviews_rating ASC, last_date DESC
* EZ-pages - ORDER BY p.sidebox_sort_order ASC, last_date DESC
* Testimonials - ORDER BY last_date DESC
* Box News - ORDER BY last_date DESC

$_GET parameters:
-------------------------
ping=yes - Pinging Search Engine Systems.

inline=yes - output file sitemapindex.xml. In Google Webmaster Tools you can define your "Sitemap URL":
  http://your_domain/index.php?main_page=sitemapxml&inline=yes
  And every time Google will get index.php?main_page=sitemapxml he will receive a fresh sitemapindex.xml.

genxml=no - don't generate xml-files.

rebuild=yes - force rebuild all sitemap*.xml files.

Comments and suggestions are welcome.
If you need any more sitemaps (faq, news, etc) you may ask me, but I will do only if it matches with my interests.

Install:
--------------
0. BACK UP your database & store.
1. Unzip the SitemapXML package to your local hard drive, retaining the folder structure.
2. Rename the "YOUR_Admin" folder in the "sitemapXML" folder to match the name of your admin folder.
     sitemapXML/YOUR_Admin/
3. Upload the files from "sitemapXML" to the root of your store. (DO NOT upload the "sitemapXML" folder, just the CONTENTS of this folder  (copy ALL of the add-on files to your store!! Most issues are caused by store owners who decide to NOT load ALL of the module files)
4. Set permissions on the directory /sitemap/ to 777.
5. Go to Admin -> Configuration -> Sitemap XML and setup all parameters.
6. Go to Admin -> Tools -> Sitemap XML (If error messages occur, change permissions on the XML files to 777).
7. To have this update and automatically notify Google, you will need to set up a Cron job via your host's control panel.
8. For Zen-Cart version 1.3.9f and earlier. Edit file includes/.htaccess:
  Find
  <FilesMatch ".*\.(js|JS|css|CSS|jpg|JPG|gif|GIF|png|PNG|swf|SWF)$">
  Replace by
  <FilesMatch ".*\.(js|JS|css|CSS|jpg|JPG|gif|GIF|png|PNG|swf|SWF|xsl|XSL)$">

Upgrade:
--------------
0. BACK UP your database & store.
1. Unzip the SitemapXML package to your local hard drive, retaining the folder structure.
2. Rename the "YOUR_Admin" folder in the "sitemapXML" folder to match the name of your admin folder.
     sitemapXML/YOUR_Admin/
3. Upload the files from "sitemapXML" to the root of your store. (DO NOT upload the "sitemapXML" folder, just the CONTENTS of this folder (copy ALL of the add-on files to your store!! Most issues are caused by store owners who decide to NOT load ALL of the module files)

Deleting OLD copies of this mod (circa 1.3.8 - such as version 2.1.0, which was around for a number of years)
--------------
a) Delete the following files from your admin directory:
- ./includes/boxes/extra_boxes/googlesitemap_tools_dhtml.php
- ./includes/extra_datafiles/googlesitemap.php
- ./includes/languages/english/googlesitemap.php
- ./includes/languages/english/extra_definitions/googlesitemap.php
- ./includes/languages/italian/extra_definitions/googlesitemap.php
- ./includes/languages/italian/googlesitemap.php
- ./includes/languages/russian/googlesitemap.php
- ./includes/languages/russian/extra_definitions/googlesitemap.php
- ./googlesitemap.php

b) Run the following SQL in admin->tools->install SQL Patches:
- SET @configuration_group_id=0;
- SELECT (@configuration_group_id:=configuration_group_id) FROM configuration_group WHERE configuration_group_title= 'Google XML Sitemap' LIMIT 1;
- DELETE FROM configuration WHERE configuration_group_id = @configuration_group_id AND configuration_group_id != 0;
- DELETE FROM configuration_group WHERE configuration_group_id = @configuration_group_id AND configuration_group_id != 0;

Un-Install:
--------------
1. Go to Admin -> Tools -> Sitemap XML and click "Un-Install SitemapXML SQL".
2. Delete all files that were copied from the installation package.

History
--------------
v 2.0.0 02.02.2009 19:21 - Initial version

v 2.1.0 30.04.2009 10:35 - Lot of changes and bug fixed

v 3.0.2 11.08.2011 16:14 - Lot of changes and bug fixed, Zen-Cart 1.5.0 Support, MagicSeo Support

v 3.0.3 27.08.2011 13:11 - Small bug fix, delete Zen-Cart 1.5.0 Autoinstall

v 3.0.4 30.09.2011 14:58 - Code cleaning, Readme corrected, Small bug fix, Zen-Cart 1.5.0 compliant - replace admin $_GET by $_POST

v 3.0.5 02.12.2011 02:11 - Support Box News module, cleaning

v 3.1.0 14.12.2011 13:32 - Code cleaning, Readme corrected, Small bug fix,
                           Replace Configuration parameter 'Generate language for default language' by 'Using parameter language in links',
                           Modified algorithm for processing multi-language links
                           Add Sitemap Files List to admin

v 3.2.2 07.05.2012 19:12 - Bug fixes
                           Traditional code cleaning
                           Correct MagicSeo Support
                           Truncate additional multi files
                           Add sitemapXML simple file manager
                           Add 'Start Security Token'
                           Rename sitemapxml_homepage.php to sitemapxml_mainpage.php
                           Add image sitemap support http://support.google.com/webmasters/bin/answer.py?answer=178636 for products, categories, manufacturers

v 3.2.4 28.05.2012 13:38 - Bug fixes
                           Add parameter "Check Dublicates"
                           Add parameter "Sitemap directory"

v 3.2.5 31.05.2012 14:52 - Add parameter "Use cPath parameter in products url". Coordinate this value with the value of variable $includeCPath in file init_canonical.php

v 3.2.6 17.06.2012 16:13 - Bug fixes
                           Rewrite gss.xls

v 3.2.7 24.09.2012 13:23 - ReadMe editing - thanks to Scott C Wilson aka swguy (http://www.zen-cart.com/member.php?22320-swguy)
                           Products additional images sitemap support
                           Bug fix 'inline=yes'

v 3.2.8 24.01.2013 18:10 - Add url encoded for RFC 3986 compatibility.

v 3.2.9 24.02.2013 13:48 - Bug fixes
                           Delete xml validations
                           Delete absolute path from information message

v 3.2.10 22.04.2013 8:15 - Add confirm() to delete/truncate

v 3.2.12 19.09.2013 8:06 - Replace absolute path to .xsl

v 3.3.1 31.01.2015 16:27 - Bug fixes
                           Add Product reviews pages
                           Add plugin control

v 3.6.0 26.04.2016 10:33   - Bug fixes

v 3.7.0 07.07.2016 11:25   - Add configuration parameter for categories paging

v 3.8.0 07.07.2016 12:39   - Code Review. Thanks to steve aka torvista

v 3.9.0 29.08.2016 18:56   - Add auto installer. Thanks to Frank Riegel aka frank18