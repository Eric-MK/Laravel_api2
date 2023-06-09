<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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
       // return Device::where('name', $name)->get();//get() is used to retrieve all devices that match a certain name and When get() is called on the query builder instance, it executes the SQL query and returns the results as a collection of Device objects.
       return Device::where('name',"like","%".$name."%")->get();//The like is used to tell the query builder that we want to search for devices where the name column contains the $name parameter (which is a string).
    }

    function delete($id)
    {
        $device = Device::find($id);
        $result=$device->delete();//this line calls the delete method on the $device object to delete the record from the database.

        if ($result)
        {
            return ["Result" => "record has been deleted ".$id];

        }
        else
        {
            return ["Result" => "Delete operation has failed  ".$id];

        }
    }

    function testData(Request $req)
    {
        $rules=[
            "email"=>"required"
            //"member_id"=>"required|min:2|max:4"  atleast 2 characters
        ];
        $validator = Validator::make($req->all(),$rules);//$req->all() gets the request object with the parameters checks the $rules for rules

        if($validator->fails())
        {
            //return $validator->errors();
            return response()->json($validator->errors(),401);
        }
        else
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
}
