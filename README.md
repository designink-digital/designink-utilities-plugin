# DesignInk Utilities Plugin

The primary goal of this plugin is to automate the creation of some of the basic elements in creating and maintaining a website, allowing our designers to
"just design" instead of having to recreate the same blank canvas each time.

The DesignInk Utilities plugin is a collection of several years of tricks and scripts we have developed to facilitate [WordPress](https://wordpress.org/)
development. Many of the functionalities are geared toward the [WP Jump Start](https://wpjumpstart.com) theme we used for many years, but with the
abandonment of the project in 2020, we will continue to add support for our future themes and tools. A child theme template installer is incorporated
into the plugin, as well as a stylesheet to convert Bootstrap-like columns into an inline-block layout, and a Jump Start master stylesheet. This plugin
brings added features to Jump Start's theme options for a dynamic, fixed mobile header and a full-width standard header. A list of features is as follows:

* DesignInk Digital's child theme installler
* Theme option for fixed mobile header
* Theme option for full-width standard header
* Custom styling and script for [GDPR Cookie Consent](https://wordpress.org/plugins/cookie-law-info/) plugin
* Shared code libraries for this and other plugins
* Inline-block layout conversion
* Basic Jump Start default styles
* Support for repeating Jump Start viewport events

## Configuration Options

In the admin panel, there are a few options under ```Settings > DesignInk Utility Settings```. If you do not want to use the custom Jump Start styles or the
inline-block styles, you can uncheck the option for **_Use Custom Styles_**. The **_Custom Plugin Updates SSL_** option is only for use in conjunction with the
[DesignInk Plugin Update Server](https://github.com/kyle-niemiec/designink-plugin-update-server) if using a private GitHub repository to provide plugin updates.

## Child Theme Installer

To install the Jump Start child theme template, go to ```Appearance > DesignInk Child Theme Installer```