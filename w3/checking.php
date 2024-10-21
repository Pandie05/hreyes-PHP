<?php
 
require_once "./account.php";

class CheckingAccount extends Account 
{
	const OVERDRAW_LIMIT = -200;

	public function withdrawal($amount) 
	{

		//if empty, return false
		if (empty($amount)) {
			return false;
		}

		// write code here. Return true if withdrawal goes through; false otherwise
		if ($this->balance - $amount >= self::OVERDRAW_LIMIT) {
			$this->balance -= $amount;
			return true;
		} else {
			return "Insufficient funds";
		}
	} // end withdrawal

	//freebie. I am giving you this code.
	public function getAccountDetails() 
	{
		$str = "<h2>Checking Account</h2>";
		$str .= parent::getAccountDetails(); 
		return $str;
	}
}


// The code below runs everytime this class loads and 
// should be commented out after testing.

//$checking = new CheckingAccount ('C123', 1000, '12-20-2019');

//echo $checking->getAccountDetails();
//echo $checking->getStartDate();
    
?>
