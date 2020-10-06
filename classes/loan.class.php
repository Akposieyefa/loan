<?php
    /**
     * the loan class 
     */
    include_once("db.class.php");
    include_once('percentage.class.php');
    include_once('helper.class.php');

    class Loan Extends Percentage 
    {
        public  $today;
        public  $due_date;
        public  $hours;
        public  $time_left;
        public  $week;
        public  $week_count;
        public  $percent;
        public  $calulate;
        public  $getIntrest;
        public  $newDebt;
        private $link;
        private $helper;

        public function __construct()
        {
            $this->DBlink = new DB();
            $this->helper = new Helper();
        }
        /**
         * the loan create mehtod 
        */
        public function loanCreate($data) 
        {
            $this->date = date('Y:m:d');
            $firstName  = $this->helper->validation($data['firstName']);
            $lastName   = $this->helper->validation($data['lastName']);
            $email   	= $this->helper->validation($data['email']);
            $phone      = $this->helper->validation($data['phone']);
            $duration   = $this->helper->validation($data['duration']);
            $amount     = $this->helper->validation($data['amount']);
            $validMail  = $this->helper->validEmail($email);

            if ($firstName == "" || $lastName == "" || $email == "" || $phone == "" || $duration == "") {
                $msg = "<div class='alert alert-danger'>All fields are required...!</div>";
                return $msg;
            }elseif (!$validMail) {
                $msg = "<div class='alert alert-danger'>Email address must be valid...!</div>";
                return $msg;
            }else {

                /**
                 * calculation begins
                 */
                $this->week = 7;
                $this->percent = 9;
                $this->today = strtotime("now");
                $this->due_date = strtotime($duration);
                $this->hours = $this->due_date - $this->today;
                $this->hours = $this->hours/3600;
                $this->time_left = $this->hours / 24;
                $this->time_left = round($this->time_left);
                $this->week_count = round($this->time_left / $this->week);
                $this->calulate = parent::loanPecentage($this->percent, $amount);
                $this->getIntrest = $this->calulate * $this->week_count;
                $this->newDebt = $amount + $this->getIntrest;
                //end

                /**
                 * insert to database
                 */
                $query = "INSERT INTO customer(firstName, lastName,email, phone, timeSpan, ammount, total) VALUES(?,?,?,?,?,?,?)";
                $stmt =  $this->DBlink->link->prepare($query);
                $stmt->bindParam(1, $firstName);
                $stmt->bindParam(2, $lastName);
                $stmt->bindParam(3, $email);
                $stmt->bindParam(4, $phone);
                $stmt->bindParam(5, $duration);
                $stmt->bindParam(6, $amount);
                $stmt->bindParam(7, $this->newDebt);
                $inserted_row = $this->DBlink->createQuery($stmt);
                if ($inserted_row) {
                    $msg = "<div class='alert alert-success'>Success....!</div>";
                    return $msg;
                } else {
                    $msg = "<div class='alert alert-danger'>Error...! </div>";
                    return $msg;
                }
            }
        }

        /**
         * Get all data from database
        */
        public function getAllCustomers()
        {
            $query = "SELECT * FROM customer ORDER BY id DESC";
            $stmt =  $this->DBlink->link->prepare($query);
            $result = $this->DBlink->readQuery($stmt);
            return $result;
        }
        
    }