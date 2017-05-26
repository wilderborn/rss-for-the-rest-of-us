## RSS for the rest of us.

This is an RSS Reader built for the rest of us. Simple and easy to use, it's like Netflix for your feeds using the [new JSON format](https://jsonfeed.org/version/1). XML is dead. Long live RSS.

## About this application

It's running on <https://rss.fortherestof.us> and we automatically deploy changes to `master` into production. [We](https://wilderborn.com) built it in an afternoon as a diversion from our regular responsibilities. Turns out, it's kinda cool.

## How to hack on it yourself

RSS FTROU is built on [Laravel](https://laravel.com). To get started, clone (or fork) the repo for follow these steps:

- Copy the `.env.example` file to `.env` and set appropriate database settings
- Run `composer install`
- Run `yarn && yarn run dev`
- Hack away!

## Contributing

Thank you for considering contributing! We'll accept Pull Requests for features, just make sure they're easy to test. That's it, no need to make this any more complicated.

## License

RSS For the Rest of US is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
