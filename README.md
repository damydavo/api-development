# Api consumption/api-crud implementation

An Assessment.

# Technology Stack Used

1.  Php(no framework)
2.  MySQL(database)

# INFORMATION GUIDE

> The project has two folders external folder for API CONSUMPTION and V1 folder to the CRUD IMPLEMENTATION.

1.  external: url:http://localhost/api/external/books.php
2.  v1 folder for the CRUD implementation.

# INSTALLATION GUIDE

1. git clone https://github.com/damydavo/api-development.git
2. database.sql, can be imported, the parameter can be changed in app/Database.php

# Route Api

Books

| Routes                           |  HTTP  |           Description |
| -------------------------------- | :----: | --------------------: |
| localhost/api/v1                 |  GET   |         Get All Books |
| localhost/api/v1/single.php?id=1 |  GET   |     Get A Single Book |
| localhost/api/v1/create.php      |  POST  |         Create A book |
| localhost/api/v1/edit.php        |  PUT   | Update data of a book |
| localhost/api/v1/destroy.php     | Delete |         Delete a Book |
