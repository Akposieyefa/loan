<?php
    /**
     * this is the root database class
     */
    class DB
    {
        public $link;
        public $error;

        private $config =  array(
            'host' 		=> 'localhost',
            'user' 		=> 'root',
            'password' 	=> '',
            'dbname' 	=> 'loan'
        );
        
        public function __construct()
        {
            $this->dbConnect();
        }

        /**
         * databade connection method 
         */
        public function dbConnect()
        {
            try {
                $this->link = new PDO('mysql:host=' .$this->config['host'].'; dbname=' . $this->config['dbname'], $this->config['user'], $this->config['password']);
                $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->link;
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                return $this->error;
            }
        }

        /**
         * create query method
         */
        public function createQuery($query)
        {
            $query->execute() or
            die($this->$error . __LINE__);
            $rowCount = $query->rowCount();
            if ($rowCount) {
                return $rowCount;
            } else {
                return false;
            }
        }

         /**
          * read query method
          */
        public function readQuery($query)
        {
             $query->execute() or
             die($this->$error . __LINE__);
             $rowCount = $query->fetchAll();
             if ($rowCount > 0) {
                 return $rowCount;
             } else {
                 return false;
             }
        }


}
