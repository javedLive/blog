
## Creating Laravel Api
Just copy the route inside of api.php

and In another application use the following code to access the api data ..
$client = new Client();
$response= $client->get('http://esb-bd.com/getUser');
dd($response->getBody()->getContents());