# How to setup the app:
- Open your command line and go to app folder
- Run command: php artisan migrate
- After that run another command: php artisan db:seed, to populate database with random data
# How to run the app:
- Run start_server.bat
- Open your browser and go to localhost, you will see a welcome page
# How to use the APIs:
- Open Postman and for every request in Headers tab enter key:Api-Token value: Token123
- To get all students, in postman go to localhost/student, select GET method and click SEND
- To get one student based on id, in postman go to localhost/student/{id}, select GET method and click SEND
- To create student record, in postman go to Body tab and enter for key: name, surname, indexno, address. For values enter what you like. Go to localhost/student, select POST method and click SEND
- To update student record, in postman go to Body tab and enter for key: name, surname, indexno, address. For values enter what you like.
Go to localhost/student/{id}, select PUT method and click SEND
- To delete student record based on id, in Postman go to localhost/student/{id}, select DELETE method and click SEND

| Parameter name |  Type  |   Requried   |  Unique |
| :---: | :---: | :---: | :---: |
|   name         | String |  Yes       |   No    |
|   surname      | String |  Yes       |   No    |
|   indexno      | Integer|  Yes       |   Yes   |
|   address      | String | No         |   No    |

