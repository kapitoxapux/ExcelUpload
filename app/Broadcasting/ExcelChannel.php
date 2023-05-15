<?php

namespace App\Broadcasting;

class ExcelChannel
{

    public function __construct()
    {

    }

    /**
     * Authenticate the user's access to the channel.
     * @return array|bool
     */
    public function join(): array|bool
    {
        return true;
    }
}
