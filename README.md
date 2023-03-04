Sport performance tracker made with PHP
==

**Version 1.3.0**

## Date

- September 2020

## Language used

- HTML
- CSS
- JavaScript
- PHP

#### Libraries / Framework used

- Cloud UI Theme (http://www.urbanui.com/cloudui/light/index.html)
- JSON

## In which context did I this project?

We did this project as part of my studies in IT. This is a graded project for our third semester.

## The goal of the project

The aim of the project was to create a web application allowing a user with a bluetooth watch to follow his sports performances. This application, made here in PHP, was to use the MVC model. We started from the assumption that the watch sent the data to the server in a JSON file (here, the JSON file must be sent by the user). We also created various tools that were not required, such as the implementation of an account and an administrator interface to manage the different user accounts or the setting up of a scoreboard on the home page.

## Installation

If you want to try this application, first you have to clone this repository :

```bash
git clone https://github.com/0xARROWK/SportTrackPHP
```

Then, move in the `SportTrackPHP/app/model/db` directory and create a sqlite database named `sport-track.db` with the `create_db.sql` script.

```bash
sqlite3 sport-track.db < create_db.sql
```

Now, you can move `app` directory into the `html` directory of a web server (like apache or NGINX).
