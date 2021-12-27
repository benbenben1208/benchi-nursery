<?php
namespace App\Facades;
use Illuminate\Support\Facades\Facade;

class JobService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'JobService';
    }
}
