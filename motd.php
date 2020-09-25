<?php 
/* Original code by UnconstructiveTab (reddit.com/u/UnconstructiveTab) (github.com/UnconstructiveTab/HydrogenMOTD) */

// Also, sorry about the code, it's messy and probably not really that useful

// Define Constants, like colors and spacing
define("RED", "\e[38;5;124m");
define("REDBG", "\e[48;5;124m");
define("GREEN", "\e[38;5;76m");
define("GREENBG", "\e[48;5;76m");//34
//define("BLUE", "\e[38;5;39m");
define("BLUE", "\e[36m");
define("BLUEBG", "\e[48;5;39m");
define("YELLOW", "\e[38;5;220m");
define("YELLOWBG", "\e[48;5;220m");
define("GRAY", "\e[38;5;240m");
define("BLACK", "\e[38;5;0m");
define("NC", "\033[0m");
define("TAB", "  ");
define("DTAB", "    "); // Double Tab
define("NL", "\n");
define("DNL", "\n\n"); // Double Newline
define("LINELEN", 15);

// Setup some of the system information
$uptime = shell_exec("uptime -p");
$percent = storagePercent()[0];
$empty = storagePercent()[1];
$gputemp = intval(trim(str_replace("'C", "", str_replace("temp=", "", shell_exec("sudo /opt/vc/bin/vcgencmd measure_temp")))));
$cputemp = intval(trim(shell_exec("cat /sys/class/thermal/thermal_zone0/temp") / 1000));
$filespace = explode("\n", shell_exec("df -h /"));

function genProgress($filled, $empty) { // Creates a color coded progress bar
	$bar = NC . "[" . BLUE;
	$bar = $bar . str_repeat("=", $filled);
	$bar = $bar . GRAY;
	$bar = $bar . str_repeat("=", $empty);
	$bar = $bar . NC . "]";
	return $bar;
}

function storagePercent() { // Converts the precentage of space left into a fraction of 44 for the progress bar
	$output = explode("\n", shell_exec("df --output=pcent /"));
	$filled = intval(intval(str_replace("%", "", $output[1])) * .44);
	$empty = 44 - $filled;
	return array($filled, $empty);
}

function showLogo() { // Just the logo
	echo TAB . BLUE . "     __ __  ____  ____________\n";
	echo TAB . BLUE . "  __/ // /_/ __ \/ ____/ ____/\n";
	echo TAB . BLUE . " /_  _  __/ / / / /   / /_    \n";
	echo TAB . BLUE . "/_  _  __/ /_/ / /___/ __/    \n";
	echo TAB . BLUE . " /_//_/  \____/\____/_/    \n\n";
}

// Echo everything to the console and that's it
showLogo();
echo TAB . NC . $uptime . NL;
echo TAB . NC . $filespace[0] . NL;
echo TAB . NC . $filespace[1] . NL;
echo DTAB . genProgress($percent, $empty);
echo DNL;
?>