<?php

    /**
     * this the root helper class that take care of the validation 
     */

    class Helper
    {
        /**
         * validation method 
         */
        public function validation($data)
        {
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        /**
         * email validation method 
         */
        public function validEmail($email)
        {
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
            return $email;
        }

        /**
         * date fromat
         */

        public function formatDate($date)
        {
            return date('F j, Y', strtotime($date));
        }

    }
