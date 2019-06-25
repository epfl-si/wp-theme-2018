
Epfl theme (Wordpress)
===
 * Based on [*_s* theme (underscores)](https://underscores.me/)
 * Implements the [elements](https://github.com/epfl-idevelop/elements) styleguide
 * Uses shortcodes to display special content served by EPFL APIs.

## Requirements
  * production build files of [elements](https://github.com/epfl-idevelop/elements) located in `/assets` (create a new version if needed)
  * composer

## How to install
  1. Copy (or symlink) the theme in the `/wp-content/themes` directory of your project
  2. Nothing more, you're ready to go! 🚀

## Build a new release
### Recovering the last version of the styleguide
  - Clone element repository `git clone git@github.com:epfl-idevelop/elements.git`
  - `git checkout `
  - Go on master branch `git checkout master`
  - update `git pull`
  - Delete branch to ensure to have the updated files of elements `git branch -D dist/frontend`
  - Update branch again `git pull; git fetch`
  - Go on `git checkout dist/frontend`

  - Go on wp-theme-2018 repository 
  - Go on dev branch `git checkout dev`
  - Update branch `git pull`
  - Copy elements files from elements:dist/frontend to wp-theme-2018 cloned repository (in parent theme folder). 
    - Assuming you have both repositories cloned in the same parent directory, you can use following
      commands (be sure to be in dist/frontend branch in elements repository!):
      `cp -r ../elements/* wp-themes-2018/assets/`
    - Delete unwanted file `rm wp-themes-2018/assets/package.json`
    - Go back to element repository `cd ../elements`
    - Go on dev branch `git checkout dev`
    - elementversion=`cat VERSION`
    - Check the number version `echo $elementversion`
  - Commit the builds `git commit -am "New element version $elementversion"`
  - Push `git push`
  - Here you go, you just updated the styleguide version contained in this theme !

### Create a new release
#### Requirements:
  - understand the gitflow logic ([gitflow cheatsheet](https://danielkummer.github.io/git-flow-cheatsheet/))
  - install `git flow` locally [How to install gitflow](https://github.com/nvie/gitflow/wiki/Installation)
  - initialise git flow in your repo by typing `git flow init`
  
  Which branch should be used for bringing forth production releases?
   - dev
   - feature-epfl-card
   - feature-epfl-news-homepage
   - feature-epfl-news-list
   - feature-epfl-scienceqa
   - feature-memento
   - fix-news-container-full
   - fix-version-number
   - master
Branch name for production releases: [master] 

Which branch should be used for integration of the "next release"?
   - dev
   - feature-epfl-card
   - feature-epfl-news-homepage
   - feature-epfl-news-list
   - feature-epfl-scienceqa
   - feature-memento
   - fix-news-container-full
   - fix-version-number
Branch name for "next release" development: [] dev

How to name your supporting branch prefixes?
Feature branches? [feature/] 
Bugfix branches? [bugfix/] 
Release branches? [release/] 
Hotfix branches? [hotfix/] 
Support branches? [support/] 
Version tag prefix? [] 
Hooks and filters directory? [/home/greg/workspace-idevelop/epfl-theme/.git/hooks] 

  ### process
  - make sure your local branches `master` and `dev` are up-to-date
  - Go on dev branch `git checkout dev`
  - Define new number version (Current `cat wp-theme-2018/VERSION`)
  - start a release: `git flow release start x.x.x`
  - update the following files:
    - `wp-theme-2018/VERSION` with the version number
    - `wp-theme-2018/style.css` with the version number
    - `CHANGELOG.md` with a description of **all the changes since last release**
  - commit them in a "Bump version" commit `git commit -am "Bump version"`
  - finish the release: `git flow release finish x.x.x -p -m "x.x.x"`
  - head over this repo on github, on the **release** tab (or go directly using https://github.com/epfl-idevelop/wp-theme-2018/releases/edit/x.x.x)
  - go to **Draft a new release**
  - choose the release number you just created, insert the changelog informations into the release description
  - Publish the release
  - congratulation, the repo has been released ! 🎉


## Shortcodes
Each shortcode has its own subfoler in the `shortcodes/` directory, placed at the root of the template.

The `index.php` automatically loads all files named `controller.php` in all subfolders.

  ```
  ├── shortcodes/
  |   ├── index.php
  |   ├── placeholder.php
  |   ├── [shortcode-slug]/
  |       ├── controller.php
  |       └── view.php
  └── ├── ...
```
file|role
--|--
`controller.php`| - recover the plugin datas using (actions)[]<br/>- Pass data to the view<br>- Render view<br>- use (Shortcake)[https://github.com/wp-shortcake/shortcake] API to declare backend UI
`view.php`|Output shortcode's html using given datas
`shortcake.php`|Defines shortcake admin interface
`placeholder.php`|a custom component to display in admin editor

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
