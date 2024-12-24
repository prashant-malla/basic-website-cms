## System Requirement
* Laravel - 10.x
* php - 8.1.x
* composer - 2.x  

## Installation
*  Open terminal, navigate to your work directory and execute the following command:   
`git clone git@github.com:prashant-malla/basic-website-cms.git` or `https://github.com/prashant-malla/basic-website-cms.git`    
*  Navigate to the project directory : `cd basic-website-cms`
*  Install Composer Dependencies: `composer install`
* Install npm dependencies `npm install && npm run dev`
*  Copy the _.env.example_ file to _.env_ file : `cp .env.example .env`
*  Generate the Application key: `php artisan key:generate`
*  Set up database details inside `.env` file :    
```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=your_database_name
DB_USERNAME=database_username
DB_PASSWORD=database_user_password
```
* Run the migration and seeders: `php artisan migrate --seed`
* Install yarn

### Login Credentials
* Url: http://basic-website-cms.test/login
* Root(Admin) : `admin@example.com` : `password`
