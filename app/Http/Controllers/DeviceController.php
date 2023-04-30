<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;


class DeviceController extends Controller
{
     function list($id=null)//if we are not getting any id it should be null by default
    {
        return $id?Device::find($id):Device::all();//if id is not null it finds the id but if null it finds all
    }

    function add(Request $req)
    {
        $device = new Device;
        $device->name=$req->name;
        $device->email=$req->email;
        $result=$device->save();//to save the data to the database and returns a boolean value to indicate if it was successful or not
        if($result)
        {
            return ["Result" => "Data has been saved"];

        }
        else
        {
            return ["Result"=>"Operation failed"];
        }
    }

}
