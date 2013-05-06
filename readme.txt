=== eewee restaurant menu ===
Contributors: eewee
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: restaurant, menu, carte, food, eat, dish of the day
Requires at least: 3.1
Tested up to: 3.5
Stable tag: trunk

Management of restaurant menus. Composition dish of the day. Create your own dishes with ingredients, prices, ...

== Description ==

Management of restaurant menus. Composition dish of the day. Create your own dishes with ingredients, prices, ...

PS: question, [eewee.fr](http://www.eewee.fr).

* See the [Changelog](http://wordpress.org/extend/plugins/eewee-restaurant-menu/changelog/) for what's new.

== Installation ==

1. Download the plugin Zip archive.
1. Upload plugin folder to your '/wp-content/plugins/' directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Screenshots ==

1. Dish (front-office)
2. Restaurant menu (front-office)
3. Create your dish (back-office)
4. Create a category dish (back-office)
5. Create your menu (back-office)
6. Compose your menu (back-office)
7. Create your currency (back-office)

== Frequently Asked Questions ==
* More informations : [eewee.fr](http://www.eewee.fr).

== Upgrade Notice ==
* ...

== Changelog ==

= 1.4 =
* Add : Location currency
* Add : Separator price
* Add : 2 decimal places
* SQL : ALTER TABLE  `wp_eewee_restaurant_devise` ADD  `LOCATION` INT( 11 ) NOT NULL AFTER  `ETAT`, ADD  `SEPARATOR` INT( 11 ) NOT NULL AFTER  `LOCATION`

= 1.3 =
* Fixed : debug mode

= 1.2 =
* Creating tables on plugin activation

= 1.1 =
* Add shortcode : menu & list flats

= 1.0 = 
* Plugin 1st version