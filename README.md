# Delaford website

[![Build Status](https://travis-ci.org/delaford/website.svg?branch=master)](https://travis-ci.org/Delaford/website) 

Register your player here to start your adventure.


[![Greenkeeper badge](https://badges.greenkeeper.io/Delaford/website.svg)](https://greenkeeper.io/)

---

First, create your `MySQL` database. Easy peasy. Call it `delaford`, I guess. Then fork this repo.

Secondly, in your terminal, make a new directory called `delaford` and type the following:

      git clone https://github.com/YOUR_USERNAME/website
      cp .env.example .env

Then, let's edit the `.env` file we just created from our last command (`cp`) and put in the database credentials.

Now, let's make the website. In your terminal, at `/delaford/website/`, type:

      composer install
      php artisan jwt:secret
      php artisan key:generate
      php artisan migrate
      php artisan config:cache
      npm install
      npm run dev

Your website's CSS should now be compiled and your database's tables should now be created. Also, your secret JWT authentication key was created along with the Laravel application key.

Time to make your player! Let's serve up the website:

      $ php artisan serve

Now go to `https://localhost:8000` and register your player account. You are all set!

### Caution

This is NOT needed to run the game locally. When Delaford runs locally, it creates a local player.