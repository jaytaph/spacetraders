# Spacetraders API for PHP

Consists of an API to be used in your own application

Each api call consists of the following:

- Instantiate an api command.

   For instance:  `Jaytaph\Spacetraders\Api\Command\Fleet\ListCommand(1, 20)`. Each command can have a number of arguments 
   that depends on the call. For instance, the list commands have a page number and limit argument to fetch a given page.
-  Create an API instance. The constructor takes a boolean argument that indicates if the token should be retrieved from the
  `.token` file. If not, you can set it with `$api->setToken($token)`. The token is then used in the authorization header.
- Next, execute the given command. It will return a `ApiResponse` object. This object contains the response data, and the
  status code which can be used to check if the call was successful.
- Parse the response

#### Example: 
```
  $command = ListCommand(page: 1, limit: 20);
  $api = new Api(retrieveToken: true);
  $response = $api->execute($command);

  $response = ListResponse::fromJson($response->data);
  foreach ($response->ships as $ship) {
     print "You have a ship named {$ship->symbol}\n"; 
  }
```

Please read the spacetraders.io getting started documentation to use the API. Most of it will make sense then.
