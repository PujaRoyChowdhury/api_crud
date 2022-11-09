<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    //
    function list()
    {
        return Device::all();
    }

    function add(Request $request)
    {
        $device = new Device;

        $device->name = $request->name;
        $device->member_id = $request->member_id;

        $result = $device->save();

        if($result)
        {
            return ["result"=>"data save"];
        }
        else{
            return ["result"=>"data don't save"];
        }
    }

    function update(Request $request)
    {
        $device = Device::find($request->id);
        $device->name = $request->name;
        $device->member_id = $request->member_id;

        $result = $device->save();
        if($result)
        {
            return ["result"=>"data updated"];
        }
        else{
            return ["result"=>"data updated failed"];
        }
    }
    function delete($id)
    {
        $device = Device::find($id);
        $result=$device->delete();

        if($result)
        {
            return ["result"=>"data deleted"];
        }
        else{
            return ["result"=>"data deleted failed"];
        }
    }

}
