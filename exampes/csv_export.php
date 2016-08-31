<?php
abstract class Operations {

            private $_filePath;

            protected function __construct() {
                $this->_filePath = 'FILE_WITH_DATA.csv';
            }

            protected function getDataFromFile() {
                $file = new SplFileObject($this->_filePath);

                while (!$file->eof()) {
                    $aData[] = $file->fgetcsv();
                }

                return $aData;
            }

        }

        class DBOperation extends Operations {

            private $dbh;

            public function __construct() {

                parent::__construct();

                try {
                    $str_conn = "firebird:host=localhost;dbname=PATH_TO_DB_FILE=UTF8";
                    $this->dbh = new PDO($str_conn, "USER", "PASSWORD");
                } catch (PDOException $err) {
                    die($err->getMessage());
                }
            }

            public function updateDb() {
                $aData = $this->getDataFromFile();
                $count = 0;

                foreach ($aData as $val) {
                    $this->dbh->exec("UPDATE TABLE_NAME SET client_nr= '{$val[0]}' WHERE PESEL = '{$val[1]}'");
                    $count++;
                }

                return $count;
            }

            public function displaySolutions() {
                $aData = $this->getDataFromFile();
                $count = 0;

                foreach ($aData as $val) {

                    $result = $this->dbh->query("SELECT * FROM TABLE_NAME WHERE PESEL = '{$val[1]}'");

                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "Pesel: " . $row['PESEL'] . " Nr klienta: " . $row['client_nr'];
                        $count++;
                    }
                }

                return $count;
            }

            public function __destruct() {
                echo 'Operation Successfull';
                $this->dbh = null;
            }

        }

        $test = new DBOperation();
        echo "{$test->updateDb()} records updated.";

        echo "============ = SPRAWDZENIE============ = ";
        $results = $test->displaySolutions();
        $test = null;
        echo "W BAZIE ISTNIEJE: {$results}";
?>
