<!DOCTYPE html>
<html>
<head>
<title>PHP Object Oriented | Sandbox</title>
</head>
<?php


echo '//Ternary Operators<br>';
// echo ( condition ) ? if TRUE execute : if FALSE execute;
$name_1 = 'Michael';
$name_2 = 'Steve';
echo ( $name_1 == $name_2 ) ? 'TRUE' : 'FALSE' ; 
echo '<br>';
echo ( $name_1 != $name_2 ) ? 'TRUE' : 'FALSE' ; 
echo '<br><br>';

$loggedIn = false;
$isTrue = ($loggedIn == true) ? true: false;
echo '$isTrue = '.$isTrue.'<br>';
echo '<br>';


echo 
	'//Abstract class cannot be instantiated.<br>
    Other classes can extend an abstract class to gain<br>
    access to protected and public members, but not private.'; 
abstract class Customer{
	protected $id;
	protected $name;
	// Only accessed from self and child extending class
	protected $password; 

	public function __construct( $id, $name, $password ){
		$this->id = $id;
		$this->name = $name;
		$this->password = $password;
	}
	// getPassword() can be called from extended class
	public function getPassword(){
		return $this->password;
	}
}
class Account extends Customer{
	private $balance;

	public function __construct($id, $name, $password, $balance){
		parent::__construct($id, $name, $password);
		$this->balance = $balance;
		echo '<br>'.__CLASS__.'<br>';
		echo __LINE__.'<br>';
		echo __DIR__.'<br>';		
		echo __METHOD__.'<br>';
		echo __FUNCTION__.'<br>';	
		echo __NAMESPACE__.'<br>';
	}
	public function getBalance(){
		return $this->balance;
	}
	public function printAccount(){
		echo $this->id.', '.
		$this->name.', '.
		$this->getPassword().', '.
		$this->balance;
	}
	public function getPassword(){
		return $this->password;
	}
}
$customer = new Account(1, 'Steve Jobs', 'Password123', 99);
echo 'Balance = '.$customer->getBalance().'<br>';
echo 'Account = ';
$customer->printAccount();
echo '<br>Password = '.$customer->getPassword().'<br><br>';


echo '//Accessing static variable/function without instantiation<br>';
class Name{
	public static $name = 'Name';
	private $first;
	private $last;

	public function __construct($first, $last){
		$this->first = $first;
		$this->last = $last;
	}
	public static function getName(){
		return self::$name;
	}
	public function getFirst(){
		return $this->first;
	}
	public function getLast(){
		return $this->last;
	}
}
echo Name::getName().'<br>'; // prints “MyName”
echo Name::$name.'<br>';

$name = new Name('Michael', 'Jordan');
echo $name->getFirst().'<br>';
echo $name->getLast().'<br><br>'; // prints “MyName”


echo '//Arrays<br>';
$cars = array('Honda','Toyota','Ferrari','BMW');
foreach( $cars as $make ){
	echo $make.'<br>';
}
echo '<br>';


echo '//Associative Array<br>';
$people = array('Michael' => 'Ferrari', 'Steve' => 'Mercedes',
				'Vanessa' => 'Toyota', 'Kate' => 'Honda');

foreach( $people as $person => $car ){
	echo $person.', ';
	echo $car.'<br>';
}
echo '<br>';


echo '//Sorting Algorithms and Recursion<br>';
$numbers = array("5", "2", "3", "7", "4", "0", "9");
print_r( $numbers ); 
echo '<br>';
var_dump( $numbers ); 
echo '<br>';

for( $i = 0; $i < count( $numbers ); $i++ ){
	echo $numbers[$i];
	echo '<br>';
}

function printArray( $numbers, $i ){
	if( $i > 0 ){
		echo $numbers[$i];
		echo '<br>';
		printArray( $numbers, $i-- );	
	}
	else{
		echo 'hello';
	}
}
printArray( $numbers, count( $numbers ) );

function recurse( $number ){
	
	if( $number == 0){
		return $number;
	}
	else{
		echo 'recurse('.$number.')<br>';
		return recurse( $number - 1 );
	}
}
$result = recurse( 22 );
echo '<br>';


?>
</body>
</html>

