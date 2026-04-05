<?php
declare(strict_types=1);

function describeUser(string $name, ?int $age = null): string{
	if($age === null)
		return "$name's age is unknown \n";
		
	
	return "$name is $age years old \n";
	}

echo describeUser("Ada", 30);
echo describeUser("Ada", null);


function summarizeOrders(array $orders): array{
	$sum = 0;
	$count = 0;
	foreach ($orders as $order){
		$sum += $order["price"];
		$count++;
	}
	$output = ["total" => $sum, "count" => $count];
	return $output;
	} 
	
$orders = [
    ["item" => "Book",   "price" => 12.99],
    ["item" => "Pen",    "price" => 1.49],
    ["item" => "Laptop", "price" => 999.00],
];

$result = summarizeOrders($orders);
echo "Total: {$result["total"]} Count: {$result["count"]} \n";


function applydiscount(array $orders, $discountfn): array {
	return array_map($discountfn, $orders);;
	}
$discountrate = 10 / 100;
		

$discountfn = fn(array $order) => [
	"item" => $order["item"],
	"price" => round(($order["price"]) - ($order["price"] * $discountrate), 2)
	];
	
$answer = applydiscount($orders, $discountfn);

foreach ($answer as $order) {
	echo "{$order["item"]}: {$order["price"]} \n";
	}
	
interface paymentGateway{
	function charge(float $amount): bool;
	function getProviderName(): string;
	}
	
abstract class BaseGateway implements paymentGateway{
	protected string $providerName;
	
	function getProviderName(): string{
		return $this->providerName;
		}
	function charge(float $amount): bool{
		return true;
	}
	
	function logCharge(float $amount): void{
		$name = $this->getProviderName();
		echo "$name: charged $amount \n";
	}
}

class StripeGateway extends BaseGateway{
	public function __construct(
		private string $apiKey
		) {
		$this->providerName = "Stripe";
		}
}

$gateway = new StripeGateway("34543");
$gateway->logCharge(99.99);

trait Loggable {
	function log(string $message): void{
		echo "[LOG]: $message\n";
	}
		}
class PaymentService{
	use Loggable;
	function processPayment(float $amount): void{
		$this->log("Processing payment of $amount");
		}
}

$answer = new PaymentService;
$answer-> processPayment(150.00);


class InvalidOrderException extends RuntimeException{
	public function __construct(string $message, int $code = 0, ?\Throwable $previous = null)
	{
	parent::__construct($message, $code, $previous);}
	
}
	
	
class OrderProcessor{
	function process(array $order): string{
	if (!isset($order["amount"]))
		throw new InvalidOrderException("Order must have an amount");
		
	if ($order["amount"] <= 0)
		throw new InvalidOrderException("Amount must be positive"); 
	else return "Order processed for {$order['amount']}";
}
}

try{
	echo $processPayment->process([]);
	}catch(InvalidOrderException $e){
		echo $e->getMessage();
	}


try{
	echo $processPayment->process( ["amount" => -10]);
	}catch(InvalidOrderException $e){
		echo $e->getMessage();
		}


try{
	echo $processPayment->process( ["amount" => 150.00]);
	}catch(InvalidOrderException $e){
		echo $e->getMessage();
		}

