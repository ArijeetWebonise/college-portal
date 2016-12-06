<?php
foreach (glob("model/*.php") as $filename)
{
	require_once $filename;
}

class Model {
	public function getAccountList()
	{
		require_once 'phpClass/sql.php';
		$list=array();
		$ret=$db->GetData('*','account');
		while($row=$db->fetch($ret)){
			$firstname=$row['First Name'];
			$middlename=$row['Middle Name'];
			$lastname=$row['Last Name'];
			$username=$row['UserName'];
			$prn=$row['prn'];
			$email=$row['email'];
			$mobile=$row['mobile'];
			$Birthday=$row['BirthDay'];
			$sex=$row['sex'];
			$parentName=$row['parentName'];
			$pnumber=$row['parentphone'];
			$pass=$row['password'];
			$year=$row['year'];
			$class=$row['class/branch'];
			$list[$firstname]=new Account(array(
				'firstname'=>$firstname,
				'middlename'=>$middlename,
				'lastname'=>$lastname,
				'username'=>$username,
				'prn'=>$prn,
				'email'=>$email,
				'mobile'=>$mobile,
				'Birthday'=>$Birthday,
				'sex'=>$sex?'M':'F',
				'parentName'=>$parentName,
				'pnumber'=>$pnumber,
				'pass'=>$pass,
				'year'=>$year,
				'class'=>$class
			));
		}
		return $list;
	}
	
	public function getAccount($title)
	{
		// we use the previous function to get all the Accounts and then we return the requested one.
		// in a real life scenario this will be done through a db select command
		$allAccounts = $this->getAccountList();
		return $allAccounts[$title];
	}
	
	
}

?>