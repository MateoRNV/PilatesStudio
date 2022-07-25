<?php

namespace BMS\Helper\Traits;

trait FlashMessageTrait
{
    public function flashMessage(string $message, string $classMessage): void
    {
        $_SESSION['message'] = $message;
        $_SESSION['class_message'] = $classMessage;
    }
}