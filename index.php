<?php
require_once 'src/class.AIM-BOT.php';
$bot = new AIM_BOT();

/**
 * This Setup Part Required
 * Please enter the details of the bot token and chat id
 * on the telegram bot that you have created.
 */
$bot->setup([
  'TOKEN'   => '5061562370:AAEpg159Fswx4PHVqo7oHZ4t0w51kme9bHo', // Put Your Token Here.
  'CHAT_ID' => '5014788296', // Put Your Chat ID Here.
  'PARSE'   => 'HTML', // Optional For Parsing CHAT.
]);

/**
 * To send a message, please use the command $bot->putMessage(string $message) below.
 */
$putMessage = $bot->putMessage('Hello World!!');

/**
 * After the message is filled in the $message variable above,
 * then you do a conditional with the $bot->send() method.
 */
if($bot->send()) {
  echo '<b>Success!</b> Your message has successfully to send...';
}
?>