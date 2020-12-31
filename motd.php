<?php 

$color = "\e[38;5;160m"; // red
$gray = "\e[38;5;240m";
$reset = "\033[0m";
$bold = "\033[1m";

$uptime = shell_exec("uptime -p");

$main_hdd = (object) [
	"percent" => percent_calulator("/")[0],
	"empty" => percent_calulator("/")[1],
	"space" => explode("\n", shell_exec("df -h " . "/"))
];

$external_hdd = (object) [
	"percent" => percent_calulator("/dev/sda")[0],
	"empty" => percent_calulator("/dev/sda")[1],
	"space" => explode("\n", shell_exec("df -h " . "/dev/sda"))
];

function progress_bar($filled, $empty) { // Creates a color coded progress bar
	global $color, $gray, $reset, $bold;

	$filled = str_repeat("=", $filled);
	$empty = str_repeat("=", $empty);
	$bar = "{$reset}[{$bold}{$color}{$filled}{$gray}{$empty}{$reset}]";
	return $bar;
}

function percent_calulator($drive) { // Converts the precentage of space left into a fraction of 44 for the progress bar
	$output = explode("\n", shell_exec("df --output=pcent $drive"));
	$filled = intval(intval(str_replace("%", "", $output[1])) * .44);
	$empty = 44 - $filled;
	return array($filled, $empty);
}

echo "  " . $bold . $color . "    ___    ____  _______  __      __ __\n";
echo "  " . $bold . $color . "   /   |  / __ \/ ____/ |/ /     / // /\n";
echo "  " . $bold . $color . "  / /| | / /_/ / __/  |   /_____/ // /_\n";
echo "  " . $bold . $color . " / ___ |/ ____/ /___ /   /_____/__  __/\n";
echo "  " . $bold . $color . "/_/  |_/_/   /_____//_/|_|       /_/   \n\n";

echo "  " . $reset . $uptime . "\n";
echo "  " . $reset . $main_hdd->space[0] . "\n";
echo "  " . $reset . $main_hdd->space[1] . "\n";
echo "  " . "  " . progress_bar($main_hdd->percent, $main_hdd->empty) . "\n\n";
echo "  " . $reset . $external_hdd->space[0] . "\n";
echo "  " . $reset . $external_hdd->space[1] . "\n";
echo "  " . "  " . progress_bar($external_hdd->percent, $external_hdd->empty);
echo "\n\n";

?>
