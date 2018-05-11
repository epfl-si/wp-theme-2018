
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
`controller.php`| - recover the plugin datas using filters<br/>- Pass data to the view<br>- Render view
`view.php`|Output shortcode's html using given datas

### Add a shortcode
1. Create a new folder in  `shortcodes/`
2. create `controller.php`
3. create `view.php`
4. implement your logic in the **controller**, your rendering in the **view**
5. enjoy!