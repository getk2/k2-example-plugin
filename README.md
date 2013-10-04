Example K2 plugin (for developers)
=================

One of the things that make K2 very powerful is the K2 plugin API, which is built on top of Joomla!'s plugin API.

Using a K2 plugin you can easily extend the forms used for items, categories and user profiles.
That means you can write a simple plugin to add additional fields and extend K2 forms beyond "extra fields". So you can write any plugin that brings programmatic logic inside the K2 item, category and user forms, which is by definition beyond the powers of any "CCK" system.

The K2 plugin has 8 trigger events for the frontend and another 8 for the backend (so you can create additional fields in your K2 forms and then display them in your site). The naming conventions are similar to Joomla!'s. For the item display in the frontend we have 6 events, identical to Joomla's plugin events and named with the "onK2" prefix instead of just "on". There is 1 event for the category display and 1 more for the user profile display in the frontend. There are also 6+2 events for the backend, which are used to extend the backend forms for the item (one for each tab of the item form plus one generic), category and user profile forms.

Since we're basically adding fields in the backend for these 3 forms, we need to define these fields somewhere. We do so inside the XML of the plugin by defining additional "groups" of parameters (or fields in Joomla! 1.6+).

If we want to extend the item form for example, we create a new parameter <params> group with the attribute "name" and value "item-content" or "item-video" (where the value part targets a specific tab in the item form). In a similar fashion, we create parameter groups for "category" and "user". In these groups we can now write new fields in XML format and we can also make use of Joomla! content elements (or write our own). These XML fields will extend the forms in the backend. To display the output of these forms in the frontend, we just use a function to render the form values entered.

Just to wrap things up, this is the basic concept of a K2 plugin: We define XML fields in the plugin, which extend the item, category and user forms in the backend. Then we use a function in the frontend (in the main plugin php file) to render these fields.

Download the example plugin we provide and examine the code. This example plugin adds an extra field where you can input a YouTube URL and it will automatically convert it to a video in the frontend. We extend all 3 forms in the backend (item, category, user).

The plugin can be installed using Joomla! extension installer.

K2 plugins are installed inside the "/plugins/K2/" folder in your Joomla! site.


## DOWNLOAD
All releases are published here: https://github.com/joomlaworks/example-k2-plugin/releases

For Joomla! 1.5 use version 2.1.
For Joomla! 2.5 or newer user version 2.2.


## LEARN MORE
Visit the Example K2 Plugin product page at: http://getk2.org/redir/example
