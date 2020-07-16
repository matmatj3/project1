
This is an example application for a system where users have notifications which are managed through a REST api 
 
code for the endpoints is located in 
/app/Http/Controllers/NotificationController.php  

The application has the functionality to create a user, send credentials to get a token and do operations 
on the notifications table. 

A user is created in the users table using standard laravel authentication. an oauth password grant client is created using the laravel users as the provider. The user credentials can be used to get the authentication token to access the protected routes. 

the notifications table has the fields
- id integer	primary key
- user_id integer		id of the user in the users table 
- status	varchar     status read or unread

These are the endpoints:  

- /api/notification-user   POST  create a user and oauth client and get the secret and client id
- /oauth/token POST  send the email, password, clientID and secret and recieve authentification token

-  GET  get all notifications  (protected route
- /api/notifications/{id} GET  get notification by id (protected route)
- /api/notifications POST  create notification (protected route)
- /api/notifications/{id} PUT  update notification (protected route)
- /api/notifications/{id} DELETE  delete notification (protected route)

- /api/notifications/{user_id}/by-user GET get list of notifications by user (protected route)
- /api/notifications/delete-all GET delete all notifications for all users (protected route)

- /api/create-test-users GET  create 100 test users (protected route)
- /api/yelp-api GET  connect to external api


