<b>Project Xploon</b> Test: <br/>
Create a Laravel Application with SQLite as your database (feel free to
utilize a Laravel starter app or other pre-built components like Breeze,
Jetstream or suggest Fortify)

<b>Requirements:</b>

 1. Can be used only when logged in. <br>
 2. Calls the above endpoint to get the data to return.<br>
 3. Which when called always returns the data, but regardless of
when/how many times it is called should never request the data from our
server more than 1 time per hour<br>
4. Once logged in the user should see a single-page js app that
shows a styled table-like display containing information fetched from
your local endpoint<br>
5. Add a button below the table which, when clicked will force a
refresh of the data in the table<br>
6. Create an Artisan command that can be used to force the refresh
of this data the next time the Laravel endpoint is called<br>
7. Use traits and interfaces

<b>Submit:</b><br> upload to github and share you repository

<b>Installation:</b><br>
Instructions on how to install and set up the project. Include any dependencies that need to be installed and how to install them.<br>
composer install<br>
composer require laravel/jetstream<br>
php artisan jetstream:install livewire<br>
copy .env.example .env<br>
npm install<br>
npm run dev<br>
build Database<br>
touch database/database.sqlite<br>
php artisan migrate<br>


artsian command to refresh the data cache to get the data again when you got messege 429 Too many requests:<br>
php artisan data:refresh<br>

after running the command please try with a refresh.<br>



