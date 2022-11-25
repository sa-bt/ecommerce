<?php

namespace App\Traits;

use RealRashid\SweetAlert\Facades\Alert;

Trait  Message
{
    public function success($message)
    {
       return Alert::toast($message, 'success')->position('bottom-left')->timerProgressBar();
    }
    public function alert($message)
    {
       return Alert::toast($message, 'alert')->position('bottom-left')->timerProgressBar();
    }
}
