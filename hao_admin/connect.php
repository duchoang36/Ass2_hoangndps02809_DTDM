<?php

/**
 * A class file to connect to database
 */
class DB_CONNECT {

    // constructor mac dinh khong doi
    function __construct() {
        // connecting to database
        $this->connect();
    }

    // destructor
    function __destruct() {
        // closing db connection
        $this->close();
    }

    /**
     * Function to connect with database
     */
    function connect() {
        // import database connection variables
		// doc file config.php da tao
        require_once('config.php');

        // Connecting to mysql database
		// sau $ la ten bien
        $con = @mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die(mysql_error());

        // Selecing database
		// vao ban da tao conner_hao
        $db = mysql_select_db(DB_DATABASE) or die(mysql_error()) or die(mysql_error());
		@mysql_set_charset('utf8');
        // returing connection cursor
        return $con;
    }

    /**
     * Function to close db connection
     */
    function close() {
        // closing db connection
        mysql_close();
    }

}

?>