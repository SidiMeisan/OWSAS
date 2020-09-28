# OWSAS
Open Web Student Application System base on Laravel

The Student Application System (SAS) is an information system that will allow school leavers to view the programmes available at different universities and submit applications to join the programmes easily. Each applicant will record their qualifications to be used repeatedly for the applications. University administrators will be able to record different types of qualifications and match equivalent qualifications. The SAS Admin will be responsible for recording the various types of qualifications and register new universities and the respective university administrators.

# Author
Erico Rahmad Darmanto &&
Sidi Meisanjaya

# git instruction
... Clone the project 

git clone https://github.com/SidiMeisan/OWSAS.git

cd OWSAS

...See all branch on this project

git branch -a

...If you just want to take a quick peek at an upstream branch, you can check it out directly:

git checkout origin/Name-of-branch

...But if you want to work on that branch, you'll need to create a local tracking branch which is done automatically by:

$ git checkout Name-of-branch

...At this point, things are getting pretty crazy, so run gitk to see what's going on:
gitk --all &

## installation
## Windows users:

for XAMPP
- Download Composer: https://getcomposer.org/


for WAMP
- Download wamp: http://www.wampserver.com/en/
- Download and extract cmder mini: https://github.com/cmderdev/cmder/releases/download/v1.1.4.1/cmder_mini.zip
- Update windows environment variable path to point to your php install folder (inside wamp installation dir) (here is how you can do this http://stackoverflow.com/questions/17727436/how-to-properly-set-php-environment-variable-to-run-commands-in-git-bash)
cmder will be refered as console

##XAMPP WAMP and users continue here:
- import `exportl.sql` from folder database
- open Command Prompt and go to project folder
- create `.env` from `.env.example`  (cd your project root directory and run `mv .env.example .env`)
- change `.env` 
- Run `composer install` or php ```composer.phar install```
- Run `php artisan key:generate`
- Run `php artisan serve`

#####You can now access your project at localhost:8000 :)

## If for some reason your project stop working do these:
- `composer install`
- `php artisan migrate`
