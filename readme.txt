=== GP OpenAI Translate ===
Contributors: meloniq
Tags: glotpress, translate, openai
Requires at least: 4.9
Tested up to: 6.6
Stable tag: 1.0
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A OpenAI translate plugin for GlotPress as a WordPress plugin.

== Description ==

A OpenAI translate plugin for [GlotPress as a WordPress plugin](https://github.com/GlotPress/GlotPress).


Note: This plugin assumes the source language is English as support for automated translation from other source languages is limited.

= Configuration =

Once you have installed GP OpenAI Translate, go to your WordPress admin screen and select "Settings > GP OpenAI Translate".

You will have three Fields to configure:

	1. Translation Provider
	2. Global API Key
	3. Client ID

= OpenAI =

DeepL has a free tier that allows you to access the API for 500k characters per month.  Additional characters require a DeepL API Pro (aka paid) account.

* Login/signup [DeepL API](https://www.deepl.com/)
* Go to your account and scroll down to [Authentication Key for DeepL API](https://www.deepl.com/pro-account/summary)
* Copy the `Authentication Key` and put it into `Global API Key` of GP OpenAI Translate.


= Setting the API key =

To set the API key for all users, go to the WordPress Dashboard, then Settings, then "GP OpenAI Translate" and set the API key.

To set if for a specific user, go to the users profile and scroll down to the "GP OpenAI Translate" section and set the API key.

Note, if both a global and user API key are set, the user API key will override the global API key.


== Changelog ==

= 1.0 =
* Release date: October 21, 2024
* Initial release.
