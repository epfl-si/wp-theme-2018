
Epfl theme (Wordpress)
===
 * Based on [*_s* theme (underscores)](https://underscores.me/)
 * Implements the [elements](https://github.com/epfl-idevelop/elements) styleguide
 * Uses shortcodes to display special content served by EPFL APIs.

## Requirements
  * production build of [elements](https://github.com/epfl-idevelop/elements) located in `/assets`
  * composer

## Setup
  1. `$ composer install`
  2. Nothing more, you're ready to go! 🚀

## Shortcodes
Each shortcode has its own subfoler in the `shortcodes/` directory, placed at the root of the template.

The `_load.php` automatically loads all files named `controller.php` in all subfolders.

  ```
  ├── shortcodes/
  |   ├── _load.php
  |   ├── [shortcode-slug]/
  |       ├── controller.php
  |       └── view.php
  └── ├── ...
```
file|role
--|--
`controller.php`| - recover the plugin datas using (actions)[]<br/>- Pass data to the view<br>- Render view<br>- use (Shortcake)[https://github.com/wp-shortcake/shortcake] API to declare backend UI
`view.php`|Output shortcode's html using given datas

### Types
#### EPFL shortcode
These shortcodes are used to display data coming from EPFL Apis. the EPFL provides a **plugin** responsible for fetching the data, formatting it and declaring a correct backend UI via (Shortcake)[https://github.com/wp-shortcake/shortcake].

To share data between the plugin and the theme, the plugins use wordpress *(actions)[]*.

The role of the theme is only to output correct markup for each given shortcode, using the given data, retrieved with the corresponding *action*.

### Add a shortcode
1. Create a new folder in  `shortcodes/`
2. create `controller.php`
3. create `view.php`
4. implement your logic in the **controller**, your rendering in the **view**
5. enjoy!
