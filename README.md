# PHP MySQL CRUD Class PDO
  Create, Read, Update and Delete easily!<br />
  Connection included<br />
  Don't worry about closing the connection since it does automatically after each use with the default __destruct() function
  
# Required files:
  1) config.php<br />
  2) SQL.php<br />
  Yep that's all you need

# Functions:
  1) connect()<br />
  2) getData()<br />
  3) execute()

# Usage:

  # Step 1: Edit the 'config.php' file

    <?php
    /**
     * Database Connection Parameters
     */
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_NAME', 'testDB');
    define('DB_CHARSET', 'utf8mb4');

  # Step 2: Call the class & start using
  
    <?php
    /* Calling the class */
    require 'SQL.php';
    $sql = new SQL();
    
    /* MySQL INSERT query */
    $sql->execute('INSERT INTO fruits (id, name) VALUES (1, "Apple")');

    /* MySQL SELECT query */
    $data = $sql->getData('SELECT id, name FROM fruits');
    foreach ($data as $fruit){
      echo 'Id: ' . $fruit['id'] . ' Name: ' . $fruit['name'] . '<br />';
    }

    /* MySQL UPDATE query */
    $sql->execute('UPDATE fruits SET name="Apple" WHERE id=1');

    /* MySQL DELETE query */
    $sql->execute('DELETE FROM fruits WHERE id=1');

# Advanced Usage:

  # Use the connect() function to execute your own code

    <?php
    /* Let's use the '$pdo' variable to execute a custom code */
    $pdo = $sql->connect();
    
    /* Custom code */
    $query = ('INSERT INTO fruits (id, name) VALUES (2, "Grape")');
    try{
      $pdo->exec($query);
    } catch(PDOException $e){
      die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
  
