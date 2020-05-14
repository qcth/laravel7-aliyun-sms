<?php

namespace Qcth\AliyunSms\Facade;

use Illuminate\Support\Facades\Facade;

class AliyunSms extends  Facade
{
    protected static  function  getFacadeAccessor()
    {
        return 'AliyunSms';
    }
}