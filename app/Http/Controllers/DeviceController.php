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

    function update(Request $req)
    {
        $device = Device::find($req->id);//find id to update
        $device->name=$req->name;
        $device->email=$req->email;
        $result = $device->save();

        if($result)
        {
            return ["result" => "data has been updated"];

        }
        else
        {
            return ["result" => "data has not been updated"];

        }
    }

    function search($name)
    {
        return Device::where('name', $name)->get();//get() is used to retrieve all devices that match a certain name and When get() is called on the query builder instance, it executes the SQL query and returns the results as a collection of Device objects.

    }
}
