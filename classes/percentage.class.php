<?php
    /**
     * this class take cares of the calculation to get the percentage 
     */
    class Percentage 
    {
        
        public $percentage;
        public $amount;
        public $calculation;

        function loanPecentage($percentage, $amount)
        {
            $this->percentage = $percentage;
            $this->amount = $amount;
            $this->calculation = ($this->percentage / 100) * $this->amount;
            return $this->calculation;
        }
    }