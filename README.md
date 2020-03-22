# PHP-MySQL-CRUD-Class-PDO
  Create, Read, Update and Delete easily!
  Connection included
  Don't worry about closing the connection since it does automatically after each use with the default __destruct() function

# Functions:
  [1] connect()
  [2] getData()
  [3] execute()
  Yep that's all you need

# Usage:

  # Step 1: Call the class and create connection
    <?php
    /* calling class */
    require 'SQL.php';

    /* Database Connection Parameters */
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_NAME', 'testDB');
    define('DB_CHARSET', 'utf8mb4');

    /* Getting the connection through the default __construct() function */
    $config = new SQL(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME,DB_CHARSET);

  # Step 2: Start using
    <?php
    /* MySQL INSERT query */
    $SQL->execute('INSERT INTO fruits (id, name) VALUES (1, "Apple")');

    /* MySQL SELECT query */
    $data = $SQL->getData('SELECT id, name FROM fruits');
    foreach ($data as $fruit){
      echo 'Id: ' . $fruit['id'] . ' Name: ' . $fruit['name'] . '<br />';
    }

    * MySQL UPDATE query */
    $SQL->execute('UPDATE fruits SET name="Apple" WHERE id=1');

    * MySQL DELETE query */
    $SQL->execute('DELETE FROM fruits WHERE id=1');


# Use the connect() function to execute your own code
    <?php
    /* Let's use the '$pdo' variable to execute a custom code */
    $pdo = $SQL->connect();
    
    /* Custom code */
    $query = ('INSERT INTO fruits (id, name) VALUES (2, "Grape")');
    try{
      $pdo->exec($query);
    } catch(PDOException $e){
      die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
  
