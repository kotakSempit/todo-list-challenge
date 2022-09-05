# Todo List Application
Repository for a simple Todo List Application (With bugs!!)

## Bug Hunting List 
- User cannot mark their task as completed. Completed task should be automatically listed in the `Completed Tasks` list when user mark the task checkbox. No error returned from the server. I wonder why..?
- User cannot delete their task. The system return error status `403 This Action Is Unauthorized`.

## Feature Request List
- Can user know when they completed their task? Maybe add date and time to the task? 

## Setup Guide

### 1) Application Setup
#### 1.1) Development with Docker/Laravel Sail
- Ensure [Docker](https://www.docker.com/get-started) is installed and running on your development pc.
- If you are using Windows OS, make sure to setup your docker installation properly. [Docker Desktop For WSL 2](https://docs.docker.com/desktop/windows/wsl/)
- Clone repository to your workspace folder (!!IMPORTANT!! For Windows OS, clone the repository in your WSL environment folder, not in Windows environment folder).
- Open terminal (or WSL terminal in Windows OS), navigate to application directory.
- Install the application's dependencies by executing the following command.
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```
- Copy environment keys.
```
cp .env.example .env
```
- Configure bash alias for sail application
```
alias sail='bash vendor/bin/sail'
```
- Run this command to initialize all service containers required in docker.
```
sail up -d
```
- Generate application key.
```
sail artisan key:generate
```
- Migrate and seed database.
```
sail artisan migrate:fresh --seed
```
- Application is available at [http://localhost](http://localhost) (Need to generate assets first, refer next section).
- Read more details on [Laravel Sail](https://laravel.com/docs/9.x/sail).

#### 1.2) Frontend Development Setup
- Run this command to install application front-end dependencies
```
sail npm install
```
- Run this command to generate assets and starting up Vite development server.
```
sail npm run dev
```
- Read more details on [Vite - Asset Bundling](https://laravel.com/docs/9.x/vite#running-vite).

### 2) Laravel Telescope
Telescope provides insight into the requests coming into your application, exceptions, log entries, database queries, queued jobs, mail, notifications, cache operations, scheduled tasks, variable dumps, and more. Publish telescope assets and it will be available at [http://localhost/telescope](http://localhost/telescope).
```
sail artisan telescope:publish
```

## Built With
### Tech Stack
- [Docker](https://www.docker.com/) (Containerization)
- [MySQL](https://www.mysql.com/) (Database management system)
- [Php](https://www.php.net/) (PHP Language)
- [Redis](https://redis.io/) (Cache, Queue and Message Broker)

### Backend
- [Faker](https://fakerphp.github.io/) (Fake data generator)
- [Gravatar](https://github.com/creativeorange/gravatar) (Gravatar for user avatar)
- [Laravel Framework](https://laravel.com/) (Version 9)
- [Laravel Horizon](https://laravel.com/docs/9.x/horizon) (Laravel queue monitoring)
- [Laravel Ignition](https://flareapp.io/ignition) (A beautiful error page for Laravel) 
- [Laravel Jetstream](https://jetstream.laravel.com/) (Laravel starter kit)
- [Laravel Query Builder](https://spatie.be/docs/laravel-query-builder/v5/introduction) (Easily build Eloquent queries from API requests)
- [Laravel Sail](https://laravel.com/docs/9.x/sail) (Store application setting in database)
- [Laravel Sanctum](https://laravel.com/docs/9.x/sanctum) (Laravel authentication system)
- [Laravel Telescope](https://laravel.com/docs/9.x/telescope) (Laravel debug assistant)
- [Ziggy](https://github.com/tighten/ziggy) (Javascript named route helper for Laravel)

### Frontend
- [Inertia.js](https://inertiajs.com/) (Modern Monolith System)
- [Bootstrap v5](https://getbootstrap.com/docs/5.0/getting-started/introduction/) (Bootstrap frontend toolkit)
- [Vue.js](https://vuejs.org/guide/introduction.html) (Version 3 with Composition API)
- [Luxon](https://moment.github.io/luxon/) (Wrapper for JavaScript dates and times)