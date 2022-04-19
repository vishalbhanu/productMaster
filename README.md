# productMaster
Laravel Test

# Create Database with name cartd

# IMPORTANT

# Migrate table in Database using below command
php artisan migrate

# For Customer Login
http://localhost/ProjectName/public/

# For Admin Login
http://localhost/ProjectName/public/admin

# Auth Guard Used For Admin and User

# To add Product Using Factory
In Terminal Or Cmd use Below Command.
php artisan tinker
In CommandLine use below command
Product::factory()->count(20)->create()   

# To check the log
tail -f .\storage\logs\laravel.log

# If Bootstrap features are not working then use below command
npm run dev
