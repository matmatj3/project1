<?php

namespace App\Http\Controllers;

use Laravel\Passport\Passport;
use App\Notification;
use Illuminate\Routing\Controller as BaseController;

class NotificationController extends BaseController
{
    public function index()
    {
        return Notification::all();
    }
 
    public function show($id)
    {
		//print "test $id";
		//$res = Notification::find($id) ;
		
		
        return Notification::find($id);
    }

    public function store(Request $request)
    {
        return Notification::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $Notification = Notification::findOrFail($id);
        $Notification->update($request->all());

        return $Notification;
    }

    public function delete(Request $request, $id)
    {
        $Notification = Notification::findOrFail($id);
        $Notification->delete();

        return 204;
    }
	
	
	
	
	
}