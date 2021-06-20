<?php

namespace Helpers;

class JsonChecker
{
    public static function isValid($data = NULL)
    {
        if (!empty($data)) {
            @json_decode($data);
            return (json_last_error() === JSON_ERROR_NONE);
        }
        return false;
    }
}
