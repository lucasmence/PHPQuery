# PHPQuery
Making your connection with MySQL using PHP more simple;

First, you need to edit the **database.json** file like this.

```json

{
    "hostname" : "mysql.website.com",
    "databaseName" : "database",
    "username" : "john",
    "password" : "12345678",
    "port" : "3306"
}

``` 

Showing a example to how use the class properly.

Here's my current table.

|Table: USERS|Type|
|-------------|----|
|ID|INTEGER|
|NAME|VARCHAR(64)|
|EMAIL|VARCHAR(256)|
|AGE|INTEGER|

Example of a simple SELECT statement;

```php

    include_once 'PHPQuery.php';
    
    $data = [
            'fields' => 'NAME, EMAIL',
            'table' => 'USERS',
            'where' => 'md5(ID) = ?',
            'parameters' => [$user->id]
        ];

    $query = new PHPQuery();
    
    $items = $query->select($data);
    
    //equal to: select NAME, EMAIL from USERS where ID = $user->id
``` 
