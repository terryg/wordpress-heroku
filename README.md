# WordPress 5 on Heroku

Credit to [mhoofman/wordpress-heroku](https://github.com/mhoofman/wordpress-heroku).

This project is a template for installing and running [WordPress](http://wordpress.org/) on [Heroku](http://www.heroku.com/). The repository comes bundled with:
* [WP Offload Media Lite](https://wordpress.org/plugins/amazon-s3-and-cloudfront/)
* [WP SendGrid](https://wordpress.org/plugins/wp-sendgrid/)
* [WordPress HTTPS](https://wordpress.org/plugins/wordpress-https/)

## Installation

Clone the repository from Github

    $ git clone git://github.com/terryg/wordpress-heroku

With the [Heroku gem](http://devcenter.heroku.com/articles/heroku-command), create your app

    $ cd wordpress-heroku
    $ heroku create
    Creating app... done, ⬢ obscure-fjord-98993
    https://obscure-fjord-98993.herokuapp.com/ | https://git.heroku.com/obscure-fjord-98993.git

Add a database to your app

    $ heroku addons:create cleardb
    Creating cleardb on ⬢ obscure-fjord-98993... free
    Created cleardb-spherical-32517 as CLEARDB_COPPER_URL
    Use heroku addons:docs cleardb to view documentation

Add SendGrid for e-mail

    $ heroku addons:create sendgrid
    Creating sendgrid on ⬢ obscure-fjord-98993... free
    Created sendgrid-tetrahedral-47962 as SENDGRID_PASSWORD, SENDGRID_USERNAME
    Use heroku addons:docs sendgrid to view documentation

Create a new branch for any configuration/setup changes needed

    $ git checkout -b production
    
Set unique keys and salts in the Heroku environment variables.

    $ ./heroku-config-set.sh

Deploy to Heroku

    $ git push heroku production:master

## Usage

The file system associated with a Heroku app is ephemeral.  Add new
plugins and themes to the local repository and then push to Heroku.
