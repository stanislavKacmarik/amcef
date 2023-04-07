## Todo apps

Simple app in laravel to manage todos

### Dev setup
dependency: docker,
run
```
docker run --rm \
-u "$(id -u):$(id -g)" \
-v "$(pwd):/var/www/html" \
-w /var/www/html \
laravelsail/php82-composer:latest \
composer install --ignore-platform-reqs
```
then
`cp .env.example .env`, 
modify configuration (at used is database and mail)

BE - run:

`./vendor/bin/sail up` (or setup alias: `vim ~/.bashrc` => add `alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'`)

FE:

install `./vendor/bin/sail npm ci`

run `./vendor/bin/sail npm run dev`

Note: use user with email `test@test.com` and password `password` to see all filters in home page with enough data