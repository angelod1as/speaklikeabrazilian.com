@servers(['web' => 'www-data@66.175.222.55'])

@task('deploy', ['on' => 'web'])
    cd /var/www/speaklikeabrazilian.com/
    git reset --hard HEAD
    git clean -f
    git pull origin master
    composer dump-autoload
    composer update --no-dev --prefer-dist --profile -vvv
    php artisan migrate
@endtask
