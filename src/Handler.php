<?php
include_once('Message.php');
include_once('Parser.php');

class Handler
{
    public function processMessage(string $message): void
    {
        $parser = new Parser($message);
        $parser->parse();
    }
}
