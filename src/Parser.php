<?php
include_once('Message.php');

class Parser
{
    private Message $message;

    public function __construct(string $mess)
    {
        $this->message = new Message($mess);
    }

    public function getMessage() : Message
    {
        return $this->message;
    }

    public function setMessage(Message $message): void
    {
        $this->message = $message;
    }

    public function parse() : void {
        $type = $this->message->getMessage()[0];
        if($type == 'A') {
            $this->message->AMessage($this->message->splitString($this->message->getMessage()));
        } elseif($type == 'B') {
            $this->message->BMessage($this->message->splitString($this->message->getMessage()));
        } elseif($type == 'C') {
            $this->message->CMessage($this->message->splitString($this->message->getMessage()));
        } elseif($type == 'D') {
            $this->message->DMessage($this->message->splitString($this->message->getMessage()));
        } elseif($type == 'E') {
            $this->message->EMessage($this->message->splitString($this->message->getMessage()));
        } elseif($type == 'F') {
            $this->message->FMessage($this->message->splitString($this->message->getMessage()));
        } elseif($type == 'G') {
            $this->message->GMessage($this->message->splitString($this->message->getMessage()));
        } elseif($type == 'H') {
            $this->message->HMessage($this->message->splitString($this->message->getMessage()));
        } elseif($type == 'I') {
            $this->message->IMessage($this->message->splitString($this->message->getMessage()));
        } elseif($type == 'J') {
            $this->message->JMessage($this->message->splitString($this->message->getMessage()));
        } elseif($type == 'K') {
            $this->message->KMessage($this->message->splitString($this->message->getMessage()));
        } elseif($type == '_') {
            $this->message->_Message($this->message->splitString($this->message->getMessage()));
        } elseif($type == 'L') {
            $this->message->LMessage($this->message->splitString($this->message->getMessage()));
        } elseif($type == 'M') {
            $this->message->MMessage($this->message->splitString($this->message->getMessage()));
        } elseif($type == 'N') {
            $this->message->NMessage($this->message->splitString($this->message->getMessage()));
        } elseif($type == 'R') {
            $this->message->RMessage($this->message->splitString($this->message->getMessage()));
        } elseif($type == 'S') {
            $this->message->SMessage($this->message->splitString($this->message->getMessage()));
        } elseif($type == 'T') {
            $this->message->TMessage($this->message->splitString($this->message->getMessage()));
        } elseif($type == 'V') {
            $this->message->VMessage($this->message->splitString($this->message->getMessage()));
        } elseif($type == 'W') {
            $this->message->WMessage($this->message->splitString($this->message->getMessage()));
        } elseif($type == 'X') {
            $this->message->XMessage($this->message->splitString($this->message->getMessage()));
        } elseif($type == 'Y') {
            $this->message->YMessage($this->message->splitString($this->message->getMessage()));
        } elseif($type == 'Z') {
            echo "<li>None</li>";
        } elseif($type == 'b') {
            $this->message->b_Message($this->message->splitString($this->message->getMessage()));
        } elseif($type == 'k') {
            $this->message->k_Message($this->message->splitString($this->message->getMessage()));
        } elseif($type == '>') {
            $this->message->CASMessage($this->message->splitString($this->message->getMessage()));
        } elseif($type == 'w') {
            $this->message->w_Message($this->message->splitString($this->message->getMessage()));
        }
    }
}