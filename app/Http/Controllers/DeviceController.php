<?php

namespace App\Http\Controllers;

use App\Models\Device;


class DeviceController extends Controller
{
    function list($id=null)//if we are not getting any id it should be null by default
    {
        return $id?Device::find($id):Device::all();
    }
}
