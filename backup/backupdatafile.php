 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"  data-parsley-validate="" method="post" novalidate>
    <?php
    $password = "bkup@db@123";
    $errors = array(
        1 => "Submission Failed. Please try again.",
        2 => "Password Wrong",
    );
    $error_id = isset($_GET['err']) ? (int) $_GET['err'] : 0;
   
    if ($error_id == 1) {
        echo '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">Ã—</button>
                    <strong>Oh snap!</strong> ' . $errors[$error_id] . '
            </div>';
    }
    elseif ($error_id == 2) {
        echo '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">Ã—</button>
                    <strong>Oh snap!</strong> ' . $errors[$error_id] . '
            </div>';
    }
    ?>        
<!--<input value="Download" type="submit" name='go' class="btn btn-primary waves-effect waves-light">
    -->
    <br>
     <div class="row">
         <div class="col-md-12 text-center"><h4>Anona DB</h4></div>
     </div>
    <div class="row">
        <br>
        <div class="col-md-12">
            <div class="col-md-2"></div>
            <div class="col-md-2 text-right"><label> Password </label></div>
            <div class="col-md-4"><input type="password" name="db_password" placeholder="Enter Password" class="col-md-2 form-control"/></div>
                
        </div>
        <br>
    </div>
    <center><br>
        <br>
        <button name="go" class="btn btn-primary waves-effect waves-light" type="submit"   >	Download Full Database </button><br>
        <br>
        <br>
    </center>
    <!--<div class="pbarcontainer">
<div class="progress progress-striped active">
<div class="bar" style="width: 0%;"></div>
</div>
</div>â€‹ -->
</form>
<?php
/* ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL); */
if (isset($_POST['go']) ) { // button name	
  
    /**
     * This file contains the Backup_Database class wich performs
     * a partial or complete backup of any given MySQL database
     * @version 1.0
     */
    
    function db_connect() {
        // Define connection as a static variable, to avoid connecting more than once 
        static $connection;
        // Try and connect to the database, if a connection has not been established yet
        if (!isset($connection)) {
            // Load configuration as an array. Use the actual location of your configuration file
            // Put the configuration file outside of the document root
            if ($_SERVER['HTTP_HOST'] == "localhost") {
                //enter your MySQL database host name, often it is not necessary to edit this line
                $db_host = "localhost";
                //enter your MySQL database username		
                $db_username = "appuser"; // musclefu_testv1
                //enter your MySQL database password
                $db_password = "Admin@1234"; // lFz9Tmpp8c
                //enter your MySQL database name
                $db_name = "lifestyle"; // musclefu_testv1
            } else {
                //enter your MySQL database host name, often it is not necessary to edit this line
                $db_host = "localhost";
                //enter your MySQL database username		
                $db_username = "appuser"; // musclefu_testv1
                //enter your MySQL database password
                $db_password = "Admin@1234"; // lFz9Tmpp8c
                //enter your MySQL database name
                $db_name = "lifestyle"; // musclefu_testv1
            }
            define('API_DBHOSTNAME', $db_host);
            define('API_DBUSERNAME', $db_username);
            define('API_DBPASSW', $db_password);
            define('API_DBNAMEDB', $db_name);
            $connection = mysqli_connect($db_host, $db_username, $db_password, $db_name);
            //mysql_set_charset('utf8',$connection);
            date_default_timezone_set('Asia/Kuwait');
            mysqli_set_charset($connection, 'utf8');
        }
        define("DB_USER", 'appuser');
        define("DB_PASSWORD", 'Admin@1234');
        define("DB_NAME", 'lifestyle');
        define("DB_HOST", 'localhost');
        define("BACKUP_DIR", '../mysql-backup'); // Comment this line to use same script's directory ('.')
        define("BACKUP_DIR_NAME", '../mysql-backup'); // Comment this line to use same script's directory ('.')
        define("TABLES", '*'); // Full backup
//define("TABLES", 'table1 table2 table3'); // Partial backup
        define("CHARSET", 'utf8');
        define("GZIP_BACKUP_FILE", true);  // Set to false if you want plain SQL backup files (not gzipped)
        /**
         * The Backup_Database class
         */
        class Backup_Database {
            /**
             * Host where the database is located
             */
            var $host;
            /**
             * Username used to connect to database
             */
            var $username;
            /**
             * Password used to connect to database
             */
            var $passwd;
            /**
             * Database to backup
             */
            var $dbName;
            /**
             * Database charset
             */
            var $charset;
            /**
             * Database connection
             */
            var $conn;
            /**
             * Backup directory where backup files are stored 
             */
            var $backupDir;
            var $backupDirName;
            /**
             * Output backup file
             */
            var $backupFile;
            /**
             * Use gzip compression on backup file
             */
            var $gzipBackupFile;
            /**
             * Constructor initializes database
             */
            function Backup_Database($host, $username, $passwd, $dbName, $charset = 'utf8') {
                $this->host = $host;
                $this->username = $username;
                $this->passwd = $passwd;
                $this->dbName = $dbName;
                $this->charset = $charset;
                $this->conn = $this->initializeDatabase();
                $this->backupDir = BACKUP_DIR ? BACKUP_DIR : '.';
                $this->backupDirName = BACKUP_DIR_NAME;
                $this->backupFile = 'myphp-backup-' . $this->dbName . '-' . date("Ymd_His", time()) . '.sql';
                $this->gzipBackupFile = GZIP_BACKUP_FILE ? GZIP_BACKUP_FILE : true;
            }
            protected function initializeDatabase() {
                try {
                    $conn = mysqli_connect($this->host, $this->username, $this->passwd, $this->dbName);
                    if (mysqli_connect_errno()) {
                        throw new Exception('ERROR connecting database: ' . mysqli_connect_error());
                        die();
                    }
                    if (!mysqli_set_charset($conn, $this->charset)) {
                        mysqli_query($conn, 'SET NAMES ' . $this->charset);
                    }
                } catch (Exception $e) {
                    print_r($e->getMessage());
                    die();
                }
                return $conn;
            }
            /**
             * Backup the whole database or just some tables
             * Use '*' for whole database or 'table1 table2 table3...'
             * @param string $tables
             */
            public function backupTables($tables = '*') {
                try {
                    /**
                     * Tables to export
                     */
                    if ($tables == '*') {
                        $tables = array();
                        $result = mysqli_query($this->conn, 'SHOW TABLES');
                        while ($row = mysqli_fetch_row($result)) {
                            $tables[] = $row[0];
                        }
                    } else {
                        $tables = is_array($tables) ? $tables : explode(',', $tables);
                    }
                    $sql = 'CREATE DATABASE IF NOT EXISTS `' . $this->dbName . "`;\n\n";
                    $sql .= 'USE ' . $this->dbName . ";\n\n";
                    /**
                     * Iterate tables
                     */
                    foreach ($tables as $table) {
                        // $this->obfPrint("Backing up `".$table."` table...", 0, 0);
                        /**
                         * CREATE TABLE
                         */
                        $sql .= 'DROP TABLE IF EXISTS `' . $table . '`;';
                        $row = mysqli_fetch_row(mysqli_query($this->conn, 'SHOW CREATE TABLE `' . $table . '`'));
                        $sql .= "\n\n" . $row[1] . ";\n\n";
                        /**
                         * INSERT INTO
                         */
                        $row = mysqli_fetch_row(mysqli_query($this->conn, 'SELECT COUNT(*) FROM `' . $table . '`'));
                        $numRows = $row[0];
                        // Split table in batches in order to not exhaust system memory 
                        $batchSize = 1000; // Number of rows per batch
                        $numBatches = intval($numRows / $batchSize) + 1; // Number of while-loop calls to perform
                        for ($b = 1; $b <= $numBatches; $b++) {
                            $query = 'SELECT * FROM `' . $table . '` LIMIT ' . ($b * $batchSize - $batchSize) . ',' . $batchSize;
                            $result = mysqli_query($this->conn, $query);
                            $numFields = mysqli_num_fields($result);
                            for ($i = 0; $i < $numFields; $i++) {
                                $rowCount = 0;
                                while ($row = mysqli_fetch_row($result)) {
                                    $sql .= 'INSERT INTO `' . $table . '` VALUES(';
                                    for ($j = 0; $j < $numFields; $j++) {
                                        $row[$j] = addslashes($row[$j]);
                                        $row[$j] = str_replace("\n", "\\n", $row[$j]);
                                        if (isset($row[$j])) {
                                            $sql .= '"' . $row[$j] . '"';
                                        } else {
                                            $sql .= '""';
                                        }
                                        if ($j < ($numFields - 1)) {
                                            $sql .= ',';
                                        }
                                    }
                                    $sql .= ");\n";
                                }
                            }
                            $this->saveFile($sql);
                            $sql = '';
                        }
                        $sql .= "\n\n\n";
                        // $this->obfPrint(" OK");
                    }
                } catch (Exception $e) {
                    print_r($e->getMessage());
                    return false;
                }
                return ($this->saveFile($sql) and $this->gzipBackupFile());
            }
            /**
             * Save SQL to file
             * @param string $sql
             */
            protected function saveFile(&$sql) {
                if (!$sql)
                    return false;
                try {
                    if (!$this->gzipBackupFile) {
                        $this->obfPrint('Saving backup file to ' . $dest . ' ...', 1, 0);
                    }
                    if (!file_exists($this->backupDir)) {
                        mkdir($this->backupDir, 0777, true);
                    }
                    file_put_contents($this->backupDir . '/' . $this->backupFile, $sql, FILE_APPEND | LOCK_EX);
                } catch (Exception $e) {
                    print_r($e->getMessage());
                    return false;
                }
                if (!$this->gzipBackupFile) {
                    $this->obfPrint(' OK');
                }
                return true;
            }
            /*
             * Gzip backup file
             *
             * @param integer $level GZIP compression level (default: 9)
             * @return string New filename (with .gz appended) if success, or false if operation fails
             */
            protected function gzipBackupFile($level = 9) {
                global $base_url;
                if (!$this->gzipBackupFile) {
                    return true;
                }
                $source = $this->backupDir . '/' . $this->backupFile;
                $sourcenames = $this->backupDirName . '/' . $this->backupFile;
                //$source =   $this->backupFile;
                $dest = $source . '.gz';
                $destnames = $sourcenames . '.gz';
                $this->obfPrint('Zipping backup file saved to server directory ' . $base_url . $destnames . ' ...', 1, 0);
                $mode = 'wb' . $level;
                if ($fpOut = gzopen($dest, $mode)) {
                    if ($fpIn = fopen($source, 'rb')) {
                        while (!feof($fpIn)) {
                            gzwrite($fpOut, fread($fpIn, 1024 * 256));
                        }
                        fclose($fpIn);
                    } else {
                        return false;
                    }
                    gzclose($fpOut);
                    if (!unlink($source)) {
                        return false;
                    }
                } else {
                    return false;
                }
                $this->obfPrint(' OK');
                echo '<br><a href="' . $base_url . $destnames . '" target="_blank">Save As Local Copy</a><br>';
                return $dest;
            }
            /**
             * Prints message forcing output buffer flush
             *
             */
            public function obfPrint($msg = '', $lineBreaksBefore = 0, $lineBreaksAfter = 1) {
                if (!$msg) {
                    return false;
                }
                $output = '';
                if (php_sapi_name() != "cli") {
                    $lineBreak = '<br />';
                } else {
                    $lineBreak = '\n';
                }
                if ($lineBreaksBefore > 0) {
                    for ($i = 1; $i <= $lineBreaksBefore; $i++) {
                        $output .= $lineBreak;
                    }
                }
                $output .= $msg;
                if ($lineBreaksAfter > 0) {
                    for ($i = 1; $i <= $lineBreaksAfter; $i++) {
                        $output .= $lineBreak;
                    }
                }
                if (php_sapi_name() == "cli") {
                    $output .= "\n";
                }
                echo $output;
                ob_flush();
                flush();
            }
        }
        /**
         * Instantiate Backup_Database and perform backup
         */
// Report all errors
        error_reporting(E_ALL);
// Set script max execution time
        set_time_limit(900); // 15 minutes
        $backupDatabase = new Backup_Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $result = $backupDatabase->backupTables(TABLES, BACKUP_DIR) ? 'OK' : 'KO';
        $backupDatabase->obfPrint('Backup result: ' . $result, 1);
    }
//POST ends
   
  
    
    if($password == $_POST['db_password']){
         db_connect();
    }else{
        echo '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">Ã—</button>
                    <strong>Oh snap!</strong> ' . $errors[2] . '
            </div>';
        //var_dump($_GET['err']);exit;
        //
    }
}
?>					