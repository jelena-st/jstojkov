@echo on
echo Starting Laravel setup...

REM Step 1: Composer install
call composer install --no-interaction

REM Step 2: NPM install
call npm install

REM Step 3: Copy .env
copy /Y .env.example .env

REM Step 4: Run migrations
call php artisan migrate

REM Step 4: Run migrations
call php artisan db:seed

REM Step 5: Generate key
call php artisan key:generate

REM Step 6: Build frontend assets
call composer run dev

echo Setup complete.
pause