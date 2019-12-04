<?php
    /**
     * A class for various DB operations
     */
    class DBOperations {
    
        public static function createConnection() {
            include '../includes/DBCredentials.php';
            $conn = new mysqli($servername, $username, $password, $dbname);
        
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } else {
                return $conn;
            }
        }

        /**
        * Creates a new connection and executes the provided query.
        *
        * If you want to use a non-paramatrized query, pass in only the first parameter - $query.
        * If you want to use parameters, you have to pass BOTH $paramTypesString AND $paramArray
        * Example: prepareAndExecute("SELECT * FROM users WHERE email = ? AND firstname = ?", 'ss', ['myEmail','myPassword']		
        * @param string $query - The query
        * @param optional $paramTypesString - The types of the parameters within a single string
        * @param optional  $paramArray - An array of the parameters

        * @return mysqli_result
        */
        static function prepareAndExecute($query, $paramTypesString = null, $paramArray = null) {
            $conn = DBOperations::createConnection();
	
            $sqlQuery = $conn->prepare($query);
            
            //check if bindable parameters are passed
            if(isset($paramTypesString)) {
                $bindArgs = array();
                $bindArgs[] = $paramTypesString;

                foreach ($paramArray as $param) {
                    $bindArgs[] = $param;
                }
                $sqlQuery->bind_param($paramTypesString, ...$paramArray);
                // call_user_func_array(array($sqlQuery, 'bind_param'), $bindArgs);
            }

            $sqlQuery->execute();
            $result = $sqlQuery->get_result();

            $conn->close();

            return $result;
        }
    }
?>