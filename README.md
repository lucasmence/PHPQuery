# PHPQuery
Making your MySQL connection with PHP simpler;

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

**INSERT statement;**

```php

    include_once 'PHPQuery.php';
    
    $data = [
            'table' => 'USERS',
            'fields' => 'NAME, EMAIL, AGE',
            'parameters' => ['Lucas', 'lucas@website.com', '22']
            ];

    $query = new PHPQuery();
    
    $items = $query->insert($data);
    
``` 

**UPDATE statement;**

```php

    include_once 'PHPQuery.php';
    
    $data = [
            'table' => 'USERS',
            'fields' => ['NAME', 'AGE'],
            'values' => ['Mence', '23']
            'where' => 'NAME = ? and AGE = ?'
            'parameters' => ['Lucas', '22'];
            ];

    $query = new PHPQuery();
    
    $items = $query->insert($data);
    
``` 

**Important note:** Please don't forget to edit your **.htaccess** file to block the direct access of **database.json** file, adding these command lines:

```html
<Files "database.json">  
  Require all denied
</Files>
``` 
