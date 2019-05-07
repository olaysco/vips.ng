<?php

Class User{

	/**
	 * initializes the user details
	 */
	public $id, $full_name, $hear_about, $email, $phone_number, $referral_code;

	/**
	 * constructs user object
	 * 
	 * @param string $full_name, $hear_about, $email, $phone_number, $referral_code
	 * @return null
	 * 
	 */
	public function __construct($id ='', $full_name = '', $hear_about = '', $email = '', $phone_number = '', $referral_code = '')
	{
		$this->setId($id);
		$this->setFullName($full_name);
		$this->setHearAbout($hear_about);
		$this->setEmail($email);
		$this->setPhoneNumber($phone_number);
		$this->setReferralCode($referral_code);
	}

	/**
	 * set id property
	 * 
	 * @param int $id
	 * @return null
	 * 
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * set full_name property
	 * 
	 * @param string $full_name
	 * @return null
	 * 
	 */
	public function setFullName($full_name)
	{
		$this->full_name = $full_name;
	}

	/**
	 * set hear_about property
	 * 
	 * @param string $hear_about
	 * @return null
	 * 
	 */
	public function setHearAbout($hear_about)
	{
		$this->hear_about = $hear_about;
	}

	/**
	 * set email property
	 * 
	 * @param string email
	 * @return null
	 * 
	 */
	public function setEmail($email){
		$this->email = $email;
	}

	/**
	 * set phone_number property
	 * 
	 * @param string $phone_number
	 * @return null
	 * 
	 */
	public function setPhoneNumber($phone_number)
	{
		$this->phone_number = $phone_number;
	}

	/**
	 * set referralcode property
	 * 
	 * @param string $referral_code
	 * @return null
	 * 
	 */
	public function setReferralCode($referral_code)
	{
		$this->setReferralCode = $referral_code;
	}

	/**
	 * 
	 * Destructs User object
	 * @param null
	 * @return null
	 */
	public function __destruct()
	{

	}
}

?>
