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
	for( $index = 0; $index < count($orders); $index++ ){
		$sum += $orders[$index]["price"];
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
