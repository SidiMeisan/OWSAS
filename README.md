# OWSAS
Open Web Student Application System base on Laravel

The Student Application System (SAS) is an information system that will allow school leavers to view the programmes available at different universities and submit applications to join the programmes easily. Each applicant will record their qualifications to be used repeatedly for the applications. University administrators will be able to record different types of qualifications and match equivalent qualifications. The SAS Admin will be responsible for recording the various types of qualifications and register new universities and the respective university administrators.

# git instruction
…or create a new repository on the command line

git init

git add README.md

git commit -m "first commit"

git remote add origin https://github.com/SidiMeisan/CreatePOS.git

git push -u origin master


…or push an existing repository from the command line

git remote add origin https://github.com/SidiMeisan/CreatePOS.git

git push -u origin master


…or import code from another repository
You can initialize this repository with code from a Subversion, Mercurial, or TFS project.

# installation
#Windows users:

- Download wamp: http://www.wampserver.com/en/
- Download and extract cmder mini: https://github.com/cmderdev/cmder/releases/download/v1.1.4.1/cmder_mini.zip
- Update windows environment variable path to point to your php install folder (inside wamp installation dir) (here is how you can do this http://stackoverflow.com/questions/17727436/how-to-properly-set-php-environment-variable-to-run-commands-in-git-bash)
- cmder will be refered as console

#Mac Os, Ubuntu and windows users continue here:

- Create a database locally named homestead utf8_general_ci
- Download composer https://getcomposer.org/download/
- Pull Laravel/php project from git provider.
- Rename .env.example file to .envinside your project root and fill the database information. (windows wont let you do it, so you have to open your console cd your project root directory and run mv .env.example .env )
- Open the console and cd your project root directory
- Run composer install or php composer.phar install
- Run php artisan key:generate
- Run php artisan migrate
- Run php artisan db:seed to run seeders, if any.
- Run php artisan serve
#####You can now access your project at localhost:8000 :)

#If for some reason your project stop working do these:
composer install
php artisan migrate
