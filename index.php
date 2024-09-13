<?php
require "vendor/autoload.php";


use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


// create a log channel
$log = new Logger('ipt10');
$log->pushHandler(new StreamHandler('ipt10.log'));


// add records to the log
$log->warning('Shanelle Kate Lopez');
$log->error('lopez.shanellekate@auf.edu.ph');
$log->info('profile', [
    'student_number' => '22-2038-102',
    'college' => 'College of Computer Studies',
    'program' => 'BS Information Technology',
    'university' => 'Angeles University Foundation'
]);


class TestClass
{
	private $logger;
    public $average;
    public $largest;
    public $smallest;

	public function __construct($logger_name)
	{
		$this->logger = new Logger($logger_name);
		$this->logger->pushHandler(new StreamHandler('ipt10.log'));
		$this->logger->info(__FILE__ . " Greetings to {$logger_name}");
	}


	public function greet($name)
	{
		// provide a greeting message with the name of the invoker
        $this->logger = new Logger($name);
		$this->logger->pushHandler(new StreamHandler('ipt10.log'));
		$this->logger->info(__METHOD__ . " Greetings to {$name}");
    }


    public function getAverage($data)
    {
	    $this->logger = new Logger('Average');
		$this->logger->pushHandler(new StreamHandler('ipt10.log'));
		    
        if(count($data)) {
            $average = array_sum($data)/count($data);
        }

        $this->logger->info(__CLASS__ . " get the average: " . $average);

        $this->average = $average;
    }


    public function getLargest($data)
    {
	    $this->logger = new Logger('Largest');
		$this->logger->pushHandler(new StreamHandler('ipt10.log'));
		    $this->logger->info(__CLASS__ . " Get the largest number: " . max($data));
	    $this->largest = max($data);
    }


    public function getSmallest($data)
    {
	    $this->logger = new Logger('Smallest');
		$this->logger->pushHandler(new StreamHandler('ipt10.log'));
		$this->logger->info(__CLASS__ . " Get the smallest number: " . min($data));
	    $this->smallest =  min($data);
    }
}

$my_name = readline("PLEASE INPUT YOUR NAME: ");
$obj = new TestClass($my_name);
echo $obj->greet($my_name);
$data = [100, 345, 4563, 65, 234, 6734, -99];
$obj->getAverage($data);
$obj->getLargest($data);
$obj->getSmallest($data);
$log->info("DATA", $data);
$log->info("OBJECT", [$obj->average, $obj->largest, $obj->smallest]);