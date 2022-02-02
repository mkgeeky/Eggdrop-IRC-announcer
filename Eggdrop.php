<?php
class Eggdrop
{
	public function Msg($messages)
	{
		global $IRC_BOT;
		if ($IRC_BOT["ENABLED"] && $IRC_BOT["TYPE"] == "eggdrop") {
			$bot = array(
				'ip' => '', // Change to your IP
				'port' => , // Change to the port you selected in Eggdrop-IRC-announcer.tcl
				'pass' => '', // Change to the password you selected in Eggdrop-IRC-announcer.tcl
				'pidfile' => '', // Change to the path to the pid. file
				'sleep' => 5,
				);
			if (empty($messages))
				die('Empty message');
			if ($bot['hand'] = fsockopen($bot['ip'], $bot['port'], $errno, $errstr, 45)) {
				sleep($bot['sleep']);
				if (is_array($messages)) {
					foreach ($messages as $message) {
						fputs($bot['hand'], $bot['pass'] . $message . "\n");
						sleep($bot['sleep']);
						return "Message sent";
					}
				} else {
					fputs($bot['hand'], $bot['pass'] . ' ' . $messages . "\n");
					sleep($bot['sleep']);
					return "Message sent";
				}
				fclose($bot['hand']);
			}
		}
	}
}
