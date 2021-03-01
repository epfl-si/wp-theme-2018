
Epfl theme (Wordpress)
===
 * Based on [*_s* theme (underscores)](https://underscores.me/)
 * Implements the [elements](https://github.com/epfl-si/elements) styleguide
 * Uses shortcodes to display special content served by EPFL APIs.

## Requirements
  * production build files of [elements](https://github.com/epfl-si/elements) located in `/assets` (create a new version if needed)
  * composer

## How to install
  1. Copy (or symlink) the theme in the `/wp-content/themes` directory of your project
  2. Nothing more, you're ready to go! 🚀

## Build a new release
### Recovering the last version of the styleguide
  - Clone element repository `git clone git@github.com:epfl-si/elements.git`
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
  - update the following files:
    - `wp-theme-2018/VERSION` with the version number
    - `wp-theme-2018/style.css` with the version number
    - `CHANGELOG.md` with a description of **all the changes since last release**
  - commit them in a "Bump version" commit `git commit -am "Bump version"`
  - head over this repo on github, on the **release** tab (or go directly using https://github.com/epfl-si/wp-theme-2018/releases/edit/x.x.x)
  - go to **Draft a new release**
  - choose the release number you just changed, insert the changelog informations into the release description
  - Publish the release
  - congratulation, a new version has been released ! 🎉
