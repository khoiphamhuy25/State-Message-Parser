<?php

class Message
{
    private string $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function splitString($inputString): array
    {
        $fields = array();
        $length = strlen($inputString);
        $fields[] = substr($inputString, 0, 1);


        for ($i = 1; $i < $length; $i += 3) {
            $field = substr($inputString, $i, 3);

            $fields[] = $field;
        }

        return $fields;
    }

    public function print(): void
    {
        echo $this->message;
    }

    function padToFourCharacters($inputString, $num)
    {
        $length = strlen($inputString);
        while ($length < $num) {
            $inputString .= "0";
            $length++;
        }
        return $inputString;
    }

    public function AMessage(array $message): void
    {
        echo "<ul>ID of the displayed screen: " . $message[1] . "</ul>";
        echo "<ul>Good Read next state: " . $message[2] . "</ul>";
        echo "<ul>ID of the error screen: " . $message[3] . "</ul>";
        echo "<ul>Read condition 1: " . $message[4];
        $tmp = $this->padToFourCharacters((strrev(decbin($message[4]))), 4);
        if ($tmp[0] == '1') {
            echo "<li>Read Track 3</li>";
        }
        if ($tmp[1] == '1') {
            echo "<li>Read Track 2</li>";
        }
        if ($tmp[2] == '1') {
            echo "<li>Read Track 1</li>";
        }
        if ($tmp[3] == '1') {
            echo "<li>Chip connect - read smart data</li>";
        }
        echo "</ul>";
        echo "<ul>Read condition 2: " . $message[5];
        $tmp = $this->padToFourCharacters((strrev(decbin($message[5]))), 4);
        if ($tmp[0] == '1') {
            echo "<li>Read Track 3</li>";
        }
        if ($tmp[1] == '1') {
            echo "<li>Read Track 2</li>";
        }
        if ($tmp[2] == '1') {
            echo "<li>Read Track 1</li>";
        }
        if ($tmp[3] == '1') {
            echo "<li>Chip connect - read smart data</li>";
        }
        echo "<li>Read condition 3: " . $message[6] . "</li>";
        $tmp = $this->padToFourCharacters((strrev(decbin($message[6]))), 4);
        if ($tmp[0] == '1') {
            echo "<li>Read Track 3</li>";
        }
        if ($tmp[1] == '1') {
            echo "<li>Read Track 2</li>";
        }
        if ($tmp[2] == '1') {
            echo "<li>Read Track 1</li>";
        }
        if ($tmp[3] == '1') {
            echo "<li>Chip connect - read smart data</li>";
        }
        if ($message[7] == '000') {
            echo "<ul>Card return flag: " . $message[7] . " - eject the card immediately</ul>";
        } else {
            echo "<ul>Card return flag: " . $message[7] . " - return the card as specified by a Transaction</ul>";
        }
        echo "<ul>No FIT Match next state: " . $message[8] . "</ul>";
    }

    public function BMessage(array $message): void
    {
        echo "<ul>ID of the displayed screen: " . $message[1] . "</ul>";
        echo "<ul>Timeout next state: " . $message[2] . "</ul>";
        echo "<ul>Cancel next state: " . $message[3] . "</ul>";
        echo "<ul>Local PIN Check Good PIN next state: " . $message[4] . "</ul>";
        echo "<ul>Local PIN Check Maximum Bad PINs next state: " . $message[5] . "</ul>";
        echo "<ul>ID of the error screen: " . $message[6] . "</ul>";
        echo "<ul>Remote PIN Check next state: " . $message[7] . "</ul>";
        echo "<ul>Local PIN Check Maximum PIN retries: " . intval($message[8]) . "</ul>";
    }

    public function CMessage(array $message): void
    {
        echo "<ul>Next State Number: " . $message[1] . "</ul>";
        for ($i = 2; $i <= 8; $i++) {
            echo "<ul>Field for reserved: " . $message[$i] . "</ul>";
        }
    }


    public function DMessage(array $message): void
    {
        echo "<ul>Next State Number: " . $message[1] . "</ul>";
        $tmp = strrev($this->padToFourCharacters(strrev(decbin($message[2])), 8));
        echo "<ul>Clear Mask: " . $message[2] . " or " . $tmp . "</ul>";
        $tmp = strrev($this->padToFourCharacters(strrev(decbin($message[3])), 8));
        echo "<ul>'A' Pre-set  Mask: " . $message[3] . " or " . $tmp . "</ul>";
        $tmp = strrev($this->padToFourCharacters(strrev(decbin($message[4])), 8));
        echo "<ul>'B' Pre-set Mask: " . $message[4] . " or " . $tmp . "</ul>";
        $tmp = strrev($this->padToFourCharacters(strrev(decbin($message[5])), 8));
        echo "<ul>'C' Pre-set Mask: " . $message[5] . " or " . $tmp . "</ul>";
        $tmp = strrev($this->padToFourCharacters(strrev(decbin($message[6])), 8));
        echo "<ul>'D' Pre-set Mask: " . $message[6] . " or " . $tmp . "</ul>";
        echo "<ul>Field for reserved: " . $message[7] . "</ul>";
        echo "<ul>Extension State Number: " . $message[8] . "</ul>";
    }

    public function EMessage(array $message): void
    {
        echo "<ul>ID of the displayed screen: " . $message[1] . "</ul>";
        echo "<ul>Timeout next state: " . $message[2] . "</ul>";
        echo "<ul>Cancel next state: " . $message[3] . "</ul>";
        echo "<ul>FDK 'A' or 'I' next state: " . $message[4] . "</ul>";
        echo "<ul>FDK 'B' or 'H' next state: " . $message[5] . "</ul>";
        echo "<ul>FDK 'C' or 'G' next state: " . $message[6] . "</ul>";
        echo "<ul>FDK 'D' or 'F' next state: " . $message[7] . "</ul>";
        echo "<ul>Keycode position in buffer: " . intval($message[8]) . "</ul>";
    }

    public function FMessage(array $message): void
    {
        echo "<ul>ID of the displayed screen: " . $message[1] . "</ul>";
        echo "<ul>Timeout next state: " . $message[2] . "</ul>";
        echo "<ul>Cancel next state: " . $message[3] . "</ul>";
        echo "<ul>FDK 'A' or 'I' next state: " . $message[4] . "</ul>";
        echo "<ul>FDK 'B' or 'H' next state: " . $message[5] . "</ul>";
        echo "<ul>FDK 'C' or 'G' next state: " . $message[6] . "</ul>";
        echo "<ul>FDK 'D' or 'F' next state: " . $message[7] . "</ul>";
        echo "<ul>ID of Amount Display Screen Number: " . $message[8] . "</ul>";
    }


    public function GMessage(array $message): void
    {
        echo "<ul>Amount Check Condition True next state: " . $message[1] . "</ul>";
        echo "<ul>Amount Check Condition False next state: " . $message[2] . "</ul>";

        echo "<ul>Buffer to be checked: ";
        if ($message[3] == '000') {
            echo "<li>000 - Amount buffer</li>";
        } elseif ($message[3] == '001') {
            echo "<li>001 - Buffer B</li>";
        } elseif ($message[3] == '002') {
            echo "<li>002 - Buffer C</li>";
        }
        echo "</ul>";

        echo "<ul>Integer Multiple Value: " . intval($message[4]) . "</ul>";
        echo "<ul>Number of Decimal Places: " . intval($message[5]) . "</ul>";
        echo "<ul>Currency Type: " . intval($message[6]) . "</ul>";
        echo "<ul>Amount Check Condition: " . $message[7] . "</ul>";
        echo "<ul>Field for reserved: " . $message[8] . "</ul>";
    }

    public function HMessage(array $message): void
    {
        echo "<ul>ID of the displayed screen: " . $message[1] . "</ul>";
        echo "<ul>Timeout next state: " . $message[2] . "</ul>";
        echo "<ul>Cancel next state: " . $message[3] . "</ul>";
        echo "<ul>FDK 'A' or 'I' next state: " . $message[4] . "</ul>";
        echo "<ul>FDK 'B' or 'H' next state: " . $message[5] . "</ul>";
        echo "<ul>FDK 'C' or 'G' next state: " . $message[6] . "</ul>";
        echo "<ul>FDK 'D' or 'F' next state: " . $message[7] . "</ul>";
        echo "<ul>Buffer and Display Parameters: ";
        if ($message[8] == '000') {
            echo "<li>000 - Display ‘X’ for each numeric key pressed. Store data in general purpose buffer C</li>";
        } elseif ($message[8] == '001') {
            echo "<li>001 - Display data as keyed in. Store data in general purpose buffer C</li>";
        } elseif ($message[8] == '002') {
            echo "<li>002 - Display ‘X’ for each numeric key pressed. Store data in general purpose buffer B</li>";
        } elseif ($message[8] == '003') {
            echo "<li>003 - Display data as keyed in. Store data in general purpose buffer B. Minimum data length is 3 digits</li>";
        }
        echo "</ul>";
    }

    public function IMessage(array $message): void
    {
        echo "<ul>ID of the displayed screen: " . $message[1] . "</ul>";
        echo "<ul>Central Response Timeout next state: " . $message[2] . "</ul>";
        echo "<ul>Send Track 2 Data: ";
        if ($message[3] == '000') {
            echo "No</ul>";
        } elseif ($message[3] == '001') {
            echo "Yes</ul>";
        }
        echo "<ul>Send Track 1 and/or Track 3 Data: ";
        if ($message[4] == '000' || $message[4] == '004') {
            echo "Don't send</ul>";
        } elseif ($message[4] == '001' || $message[4] == '005') {
            echo "Send Track 3 Data</ul>";
        } elseif ($message[4] == '002' || $message[4] == '006') {
            echo "Send Track 1 Data</ul>";
        } elseif ($message[4] == '003' || $message[4] == '007') {
            echo "Send Both 2 Tracks Data</ul>";
        }
        echo "<ul>Send Operation Code Data: ";
        if ($message[5] == '000') {
            echo "No</ul>";
        } elseif ($message[5] == '001') {
            echo "Yes</ul>";
        }
        echo "<ul>Send Amount Data: ";
        if ($message[6] == '000') {
            echo "No</ul>";
        } elseif ($message[6] == '001') {
            echo "Yes</ul>";
        }
        echo "<ul>Send PIN Buffer (Buffer A) Data/ Select Extended format: ";
        if ($message[7] == '000') {
            echo "Standard format. Do not send Buffer A</ul>";
        } elseif ($message[7] == '001') {
            echo "Standard format. Send Buffer A</ul>";
        } elseif ($message[7] == '128') {
            echo "Extended format. Do not send Buffer A</ul>";
        } elseif ($message[7] == '129') {
            echo "Extended format. Send Buffer A</ul>";
        }

        if (intval($message[8]) <= 7) {
            echo "<ul>Send General Purpose Buffer B and/or C: ";
            if ($message[8] == '000') {
                echo "000 - Send no buffers</ul>";
            } elseif ($message[8] == '001') {
                echo "001 - Send Buffer B</ul>";
            } elseif ($message[8] == '002') {
                echo "002 - Send Buffer C</ul>";
            } elseif ($message[8] == '003') {
                echo "003 - Send Buffers B and C</ul>";
            } elseif ($message[8] == '004') {
                echo $message[8] . " - Reserved</ul>";
            }
        } else {
            echo "<ul>Extension State Number: " . $message[8] . "</ul>";
        }
    }


    public function JMessage(array $message): void
    {
        echo "<ul>ID of Receipt Delivered Screen: " . $message[1] . "</ul>";
        echo "<ul>Next State: " . $message[2] . "</ul>";
        echo "<ul>ID of No Receipt Delivered Screen: " . $message[3] . "</ul>";
        echo "<ul>ID of Card Retained Screen: " . $message[4] . "</ul>";
        echo "<ul>ID of Statement Delivered Screen: " . $message[5] . "</ul>";
        echo "<ul>Field for reserved: " . $message[6] . "</ul>";
        echo "<ul>ID of BNA Notes Returned Screen: " . $message[7] . "</ul>";
        echo "<ul>Extension State Number: " . $message[8] . "</ul>";
    }

    public function KMessage(array $message): void
    {
        for ($i = 0; $i <= 7; $i++) {
            echo "<ul>Next state " . $i . ": " . $message[$i + 1] . "</ul>";
        }
    }


    public function _Message(array $message): void
    {
        for ($i = 0; $i <= 6; $i++) {
            echo "<ul>Next state " . $i . ": " . $message[$i + 1] . "</ul>";
        }
        echo "<ul>Extension State Number: " . $message[8] . "</ul>";
    }

    public function LMessage(array $message): void
    {
        echo "<ul>ID of the displayed screen: " . $message[1] . "</ul>";
        echo "<ul>Good Write next state: " . $message[2] . "</ul>";
        echo "<ul>Bad Write next state: " . $message[3] . "</ul>";
        echo "<ul>No Write Attempted next state: " . $message[4] . "</ul>";
        for ($i = 5; $i <= 8; $i++) {
            echo "<ul>Field for reserved: " . $message[$i] . "</ul>";
        }
    }

    public function MMessage(array $message): void
    {
        echo "<ul>ID of the displayed screen: " . $message[1] . "</ul>";
        echo "<ul>Timeout next state: " . $message[2] . "</ul>";
        echo "<ul>Cancel next state: " . $message[3] . "</ul>";
        echo "<ul>Local PIN Check Good PIN next state: " . $message[4] . "</ul>";
        echo "<ul>Local PIN Check Maximum Bad PINs next state: " . $message[5] . "</ul>";
        echo "<ul>ID of the error screen: " . $message[6] . "</ul>";
        echo "<ul>Remote PIN Check next state: " . $message[7] . "</ul>";
        echo "<ul>Local PIN Check Maximum PIN retries: " . intval($message[8]) . "</ul>";
    }

    public function NMessage(array $message): void
    {
        echo "<ul>Picture type: ";
        if ($message[1] == '000') {
            echo "Picture Type 0</ul>";
        } elseif ($message[1] == '001') {
            echo "Picture Type 1</ul>";
        }
        echo "<ul>Next State: " . $message[2] . "</ul>";
        for ($i = 3; $i <= 8; $i++) {
            echo "<ul>Field for reserved: " . $message[$i] . "</ul>";
        }
    }

    public function RMessage(array $message): void
    {
        echo "<ul>ID of the displayed screen: " . $message[1] . "</ul>";
        echo "<ul>Timeout next state: " . $message[2] . "</ul>";
        echo "<ul>Cancel next state: " . $message[3] . "</ul>";
        echo "<ul>FDK 'A' or 'I' next state: " . $message[4] . "</ul>";
        echo "<ul>FDK 'B' or 'H' next state: " . $message[5] . "</ul>";
        echo "<ul>FDK 'C' or 'G' next state: " . $message[6] . "</ul>";
        echo "<ul>FDK 'D' or 'F' next state: " . $message[7] . "</ul>";
        echo "<ul>Extension State Number: " . $message[8] . "</ul>";
    }

    public function SMessage(array $message): void
    {
        echo "<ul>No Language Code next state: " . $message[1] . "</ul>";
        for ($i = 2; $i <= 7; $i++) {
            echo "<ul>Language Code = " . ($i - 2) . " next state: " . $message[$i] . "</ul>";
        }
        echo "<ul>Extension state number: " . $message[8] . "</ul>";
    }

    public function TMessage(array $message): void
    {
        echo "<ul>ID of the displayed screen: " . $message[1] . "</ul>";
        echo "<ul>Good Read next state: " . $message[2] . "</ul>";
        echo "<ul>ID of the error screen: " . $message[3] . "</ul>";

        for ($i = 4; $i <= 6; $i++) {
            echo "<ul>Read condition $i: " . $message[$i] . "</ul>";
            $tmp = $this->padToFourCharacters((strrev(decbin($message[$i]))), 4);
            if ($tmp[0] == '1') {
                echo "<li>Read Track 3</li>";
            }
            if ($tmp[1] == '1') {
                echo "<li>Read Track 2</li>";
            }
            if ($tmp[2] == '1') {
                echo "<li>Read Track 1</li>";
            }
            if ($tmp[3] == '1') {
                echo "<li>Chip connect - read smart data</li>";
            }
        }

        echo "<ul>Field for reserved: " . $message[7] . "</ul>";
        echo "<ul>Extension state number: " . $message[8] . "</ul>";
    }

    public function VMessage(array $message): void
    {
        echo "<ul>Next State: " . $message[1] . "</ul>";
        for ($i = 2; $i <= 7; $i++) {
            echo "<ul>Language Code for Screen Group " . ($i - 1) . ": " . $message[$i] . "</ul>";
        }
        echo "<ul>Screen Group Size: " . $message[8] . "</ul>";
    }

    public function WMessage(array $message): void
    {
        echo "<ul>FDK ‘A’ Next State Number: " . $message[1] . "</ul>";
        echo "<ul>FDK ‘B’ Next State Number: " . $message[2] . "</ul>";
        echo "<ul>FDK ‘C’ Next State Number: " . $message[3] . "</ul>";
        echo "<ul>FDK ‘D’ Next State Number: " . $message[4] . "</ul>";
        echo "<ul>FDK ‘F’ Next State Number: " . $message[5] . "</ul>";
        echo "<ul>FDK ‘G’ Next State Number: " . $message[6] . "</ul>";
        echo "<ul>FDK ‘H’ Next State Number: " . $message[7] . "</ul>";
        echo "<ul>FDK ‘I’ Next State Number: " . $message[8] . "</ul>";
    }

    public function XMessage(array $message): void
    {
        echo "ID of the displayed screen: " . $message[1] . "\n";
        echo "Timeout next state: " . $message[2] . "\n";
        echo "Cancel next state: " . $message[3] . "\n";
        echo "FDK next state: " . $message[4] . "\n";
        echo "Extension state number: " . $message[5] . "\n";
        echo "Buffer ID: ";
        if ($message[6][1] == '1') {
            echo $message[6] . " - General purpose buffer B\n";
        } elseif ($message[6][1] == '2') {
            echo $message[6] . " - General purpose buffer C\n";
        } elseif ($message[6][1] == '3') {
            echo $message[6] . " - Amount buffer\n";
        }
        echo "FDKs active mask: \n";
        $tmp = $this->padToFourCharacters((strrev(decbin($message[7]))), 8);
        if ($tmp[0] == '1') {
            echo " FDK ‘A’ is active\n";
        }
        if ($tmp[1] == '1') {
            echo " FDK ‘B’ is active\n";
        }
        if ($tmp[2] == '1') {
            echo " FDK ‘C’ is active\n";
        }
        if ($tmp[3] == '1') {
            echo " FDK ‘D’ is active\n";
        }
        if ($tmp[4] == '1') {
            echo " FDK ‘F’ is active\n";
        }
        if ($tmp[5] == '1') {
            echo " FDK ‘G’ is active\n";
        }
        if ($tmp[6] == '1') {
            echo " FDK ‘H’ is active\n";
        }
        if ($tmp[7] == '1') {
            echo " FDK ‘I’ is active\n";
        }
        echo "Field for reserved: " . $message[8] . "\n";
    }

    public function YMessage(array $message): void
    {
        echo "<ul>ID of the displayed screen: " . $message[1] . "</ul>";
        echo "<ul>Timeout next state: " . $message[2] . "</ul>";
        echo "<ul>Cancel next state: " . $message[3] . "</ul>";
        echo "<ul>FDK next state: " . $message[4] . "</ul>";
        echo "<ul>Extension state number: " . $message[5] . "</ul>";

        echo "<ul>Buffer positions: ";
        if ($message[5] == '255') {
            echo "- Operation Code buffer position</ul>";
            echo "<li>Symbol 0: " . $message[6][0] . "</li>";
            echo "<li>Symbol 1: " . $message[6][1] . "</li>";
            echo "<li>Symbol 2: " . $message[6][2] . "</li>";
        } else {
            echo "- Operation Code buffer to be set to the values specified in the Extension state</ul>";
            echo "<li>Symbol 0: " . $message[6][0] . "</li>";
            echo "<li>Symbol 1: " . $message[6][1] . "</li>";
            echo "<li>Symbol 2: " . $message[6][2] . "</li>";
        }

        echo "<ul>FDKs active mask: </ul>";
        $tmp = $this->padToFourCharacters((strrev(decbin($message[7]))), 8);
        if ($tmp[0] == '1') {
            echo "<li>FDK ‘A’ is active</li>";
        }
        if ($tmp[1] == '1') {
            echo "<li>FDK ‘B’ is active</li>";
        }
        if ($tmp[2] == '1') {
            echo "<li>FDK ‘C’ is active</li>";
        }
        if ($tmp[3] == '1') {
            echo "<li>FDK ‘D’ is active</li>";
        }
        if ($tmp[4] == '1') {
            echo "<li>FDK ‘F’ is active</li>";
        }
        if ($tmp[5] == '1') {
            echo "<li>FDK ‘G’ is active</li>";
        }
        if ($tmp[6] == '1') {
            echo "<li>FDK ‘H’ is active</li>";
        }
        if ($tmp[7] == '1') {
            echo "<li>FDK ‘I’ is active</li>";
        }

        echo "<ul>Multi-Language Screens Selection Extension State: ";
        if ($message[8] == '255' || $message[8] == '000') {
            echo $message[8] . " - no Extension state</ul>";
        } else {
            echo $message[8] . "</ul>";
        }
    }

    public function b_Message(array $message): void
    {
        echo "<ul>ID of First Entry Screen: " . $message[1] . "</ul>";
        echo "<ul>Timeout next state: " . $message[2] . "</ul>";
        echo "<ul>Cancel next state: " . $message[3] . "</ul>";
        echo "<ul>Good next state: " . $message[4] . "</ul>";
        echo "<ul>CSP Fail next state: " . $message[5] . "</ul>";
        echo "<ul>ID of Second Entry Screen: " . $message[6] . "</ul>";
        echo "<ul>ID of Mis-Match First Entry Screen: " . $message[7] . "</ul>";
        echo "<ul>Extension state number: " . $message[8] . "</ul>";
    }

    public function k_Message(array $message): void
    {
        echo "<ul>Field for reserved: " . $message[1] . "</ul>";
        echo "<ul>Good Read Next State: " . $message[2] . "</ul>";
        echo "<ul>Field for reserved: " . $message[3] . "</ul>";
        echo "<ul>Field for reserved: " . $message[4] . "</ul>";
        echo "<ul>Field for reserved: " . $message[5] . "</ul>";
        echo "<ul>Field for reserved: " . $message[6] . "</ul>";

        echo "<ul>Card Return Flag: ";
        if ($message[7] == '000') {
            echo $message[7] . " - eject the card immediately</ul>";
        } elseif ($message[7] == '001') {
            echo $message[7] . " - return the card as specified by a Transaction Reply message</ul>";
        }

        echo "<ul>No FIT Match Next State Number: ";
        if ($message[8] == '000') {
            echo $message[8] . " - FITs are not used</ul>";
        } else {
            echo $message[8] . "</ul>";
        }
    }


    public function CASMessage(array $message): void
    {
        echo "<ul>Cancel Key Mask: </ul>";
        $tmp = $this->padToFourCharacters((strrev(decbin($message[1]))), 8);
        $this->echoFDKActiveStatus($tmp);

        echo "<ul>Deposit Key Mask:</ul>";
        $tmp = $this->padToFourCharacters((strrev(decbin($message[2]))), 8);
        $this->echoFDKActiveStatus($tmp);

        echo "<ul>Add More Key Mask:</ul>";
        $tmp = $this->padToFourCharacters((strrev(decbin($message[3]))), 8);
        $this->echoFDKActiveStatus($tmp);

        echo "<ul>Refund Key Mask:</ul>";
        $tmp = $this->padToFourCharacters((strrev(decbin($message[4]))), 8);
        $this->echoFDKActiveStatus($tmp);

        echo "<ul>Extension State 1: " . $message[5] . "</ul>";
        echo "<ul>Extension State 2: " . $message[6] . "</ul>";
        echo "<ul>Extension State 3: " . $message[7] . "</ul>";
        echo "<ul>Extension State 4: " . $message[8] . "</ul>";
    }

    private function echoFDKActiveStatus($tmp): void
    {
        if ($tmp[0] == '1') {
            echo "<li>FDK ‘A’ is active</li>";
        }
        if ($tmp[1] == '1') {
            echo "<li>FDK ‘B’ is active</li>";
        }
        if ($tmp[2] == '1') {
            echo "<li>FDK ‘C’ is active</li>";
        }
        if ($tmp[3] == '1') {
            echo "<li>FDK ‘D’ is active</li>";
        }
        if ($tmp[4] == '1') {
            echo "<li>FDK ‘F’ is active</li>";
        }
        if ($tmp[5] == '1') {
            echo "<li>FDK ‘G’ is active</li>";
        }
        if ($tmp[6] == '1') {
            echo "<li>FDK ‘H’ is active</li>";
        }
        if ($tmp[7] == '1') {
            echo "<li>FDK ‘I’ is active</li>";
        }
    }

    public function w_Message(array $message): void
    {
        echo "<ul>Field for reserved: " . $message[1] . "</ul>";

        echo "<ul>Leave/Capture Option: ";
        if ($message[2] == '000') {
            echo "000 - Leave at throat</ul>";
        } elseif ($message[2] == '001') {
            echo "001 - Capture unacceptable cheque to bin 1</ul>";
        }

        echo "<ul>Cheque Entry Retries: ";
        if ($message[3] == '000') {
            echo "000 - Do not allow cardholder retries</ul>";
        } elseif ($message[3] == '001') {
            echo "001 - Allow one further retry following initial rejection</ul>";
        } elseif ($message[3] == '002') {
            echo "002 - Allow two further retries</ul>";
        } elseif ($message[3] == '003') {
            echo "003 - Allow three further retries</ul>";
        }

        echo "<ul>Image Lift: ";
        if ($message[4] == '000') {
            echo "000 - no cheque images are lifted</ul>";
        } elseif ($message[4] == '001') {
            echo "001, an image of the cheque is produced which is suitable for display</ul>";
        }

        echo "<ul>Extension State 1: " . $message[5] . "</ul>";
        echo "<ul>Extension State 2: " . $message[6] . "</ul>";

        echo "<ul>Cancel Key Mask:</ul>";
        $tmp = $this->padToFourCharacters((strrev(decbin($message[7]))), 8);
        $this->echoFDKActiveStatus($tmp);

        echo "<ul>Deposit Key Mask:</ul>";
        $tmp = $this->padToFourCharacters((strrev(decbin($message[8]))), 8);
        $this->echoFDKActiveStatus($tmp);
    }

    public function ZDMessage(array $message) : void {
        echo ""
    }
}