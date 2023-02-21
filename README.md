# Blog
Website where you can post new articles and add comments. Also articles and comments could be updated or delated.

Project designed with Laravel and interaction with database realized using Eloquent ORM.

Architecture of project build on REST principles. Entities user interacts with includes all CRUD list operations.

If you want to deploy this project local you must have SQLite database installed on you computer. And then after cloning this project run the command :
```
make setup
```
For running on local server:
```
make start
```
For easier interaction with project I added seeder which will add some articles and comments at the stage of setup.

*Now working at authentication and authorization in this project. Will be updated soon.*
