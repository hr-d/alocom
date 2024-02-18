<?php


namespace HRD\Alocom\Models;

class Authority
{
    const ACCESS_LEVEL_ATTENDEE = "participant";
    const ACCESS_LEVEL_ASSISTANT = "assistant";
    const ACCESS_LEVEL_TEACHER = "teacher";

    public static function get_authorities()
    {
        return [
            self::ACCESS_LEVEL_ATTENDEE,
            self::ACCESS_LEVEL_ASSISTANT,
            self::ACCESS_LEVEL_TEACHER,
        ];
    }

    public static function check(string $authorityName)
    {
        if (in_array($authorityName, Self::get_authorities())) {
            return true;
        }
        return false;
    }
}
