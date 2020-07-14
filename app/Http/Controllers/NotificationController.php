<?php

namespace App\Http\Controllers;

use Laravel\Passport\Passport;
use App\Notification;
use Illuminate\Routing\Controller as BaseController;

class NotificationController extends BaseController
{
	
	 /**
     * Basic REST functions for notifications
     *
     * 
     */
    public function index()
    {
        return Notification::all();
    }
 
    public function show($id)
    {
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
	
	/**
     * creates a user and password grant oauth client  
	 * the email, password, clientID and secret can be passed to 
	 * /oauth/token to get the authentication token 
     *
     * 
     */
	public function registerNotificationUser(Request $request)
	{
		$user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
		print $user->id ;

		$clients = new ClientRepository() ;
		
		$name = 'Password Grand Client';
		$client = $clients->createPasswordGrantClient(
            $user->id, $name, 'http://localhost', 'users'
        );
		print "<pre>".print_r($client);
		
		$response = new stdClass();		
		$response->user_id = $user->id;
		$response->client_id = $client->id;
		$response->secret = $client->secret;
		return $response;
		
	}

	
	/**
     * Displays response from yelp api to demonstrate an api connection. 
     *
     * 
     */
	public function yelpApi()
	{
		print "connecting to api:<br>";
		
		$token = 'WlmH5ynCSPZI8lm4zAlNvaDWaG4Y2N28tsoeRijvia7227MzVv1DnZ6fsyyeC2sSxk3nnBW7VPQztP4nMawoCe_Z5I2UunYuQhldK5kWdfCn9e_AGIzlCu7zNdQHX3Yx';
		$client = new Client();

		$res = $client->request('GET', 'https://api.yelp.com/v3/businesses/tW0Zr4o5cFPR7bNxiJ4HCw', [
		'headers' => [
		'Authorization' => 'Bearer ' . $token,   
		'Accept' => 'application/json',
		'Content-type' => 'application/json'
		]]);

		print "<pre>".json_encode(json_decode($res->getBody()), JSON_PRETTY_PRINT);

	}
	
	
}