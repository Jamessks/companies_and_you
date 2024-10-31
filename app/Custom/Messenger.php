<?php

namespace App\Custom;

class Messenger
{
    const FLASH_INDEX = "__messenger";
    const FLASH_SUCCESS = "success";
    const FLASH_NEUTRAL = "neutral";
    const FLASH_ERROR = "error";

    public static function success($message)
    {
        $messages = session()->get(self::FLASH_INDEX . '.' . self::FLASH_SUCCESS, []);
        $messages[] = $message;
        session()->flash(self::FLASH_INDEX . '.' . self::FLASH_SUCCESS, $messages);
    }

    public static function neutral($message)
    {
        $messages = session()->get(self::FLASH_INDEX . '.' . self::FLASH_NEUTRAL, []);
        $messages[] = $message;
        session()->flash(self::FLASH_INDEX . '.' . self::FLASH_NEUTRAL, $messages);
    }

    public static function error($message)
    {
        $messages = session()->get(self::FLASH_INDEX . '.' . self::FLASH_ERROR, []);
        $messages[] = $message;
        session()->flash(self::FLASH_INDEX . '.' . self::FLASH_ERROR, $messages);
    }
}
