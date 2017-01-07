<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Requests;
use Response;
use App\Item;
use Illuminate\Support\Facades\Redirect;
use DB;
use Event;
use App\Events\SendMail;
use App\Product;
use App\Category;

use GuzzleHttp\Psr7;
use App\User;
use Carbon\Carbon;


	class ItemController extends Controller
		{

			public function getItem()
				{
					$now = Carbon::now();
					$month=$now->month;
					$day=$now->toDateString();
					return view('home',compact('now','month','day'));
				}

			public function itemList()
				{
					$items= DB::select(DB::raw("SELECT id,title,description FROM `items` WHERE status=1"));
					return view('list',compact('items'));
				}

			public function store(Request $request)
			{
				$item= new Item();
				$item->title = $request->input(['title']);
				$item->description=$request->input(['description']);
                $item->email = $request->input(['email']);
				$item->status = '0';
				$item->save();
                Event::fire(new SendMail($item->id));
               
				return Response::json($item);
			}

			public function delete(Request $request)
			{
			    $id=$request->id;
				 Item::where(['id'=>$id])->delete();
				 return Redirect::back();  			
			} 

			public function update(Request $request)
			{
			    $id=$request->id;
				 Item::where(['id'=>$id])->update($request->all());
				 return Redirect::back();       			
			} 	


			public function getUnread()
			{

				$items=DB::select(DB::raw("SELECT count(*) as total from items where status =0"));
				
				 return Response::json($items);
			}		

			public function status_update()
			{
				$items=DB::select(DB::raw("UPDATE items SET status=1 WHERE status=0"));
				return Response::json($items);
			}

			public function savePost()
			{
				return view('savePost');
			}

			public function gettestItem()
			 {
  					$categories = Category::with('products')->get();
  					return view('products', compact('categories'));

			 }

			public function getApiValue()
			{
				$client = new Client();
			//	$request = $client->request('GET', 'http://localhost/test/api/info');
				$response = $client->request('GET', 'http://localhost/test/api/info');
	//			echo $response->getReasonPhrase(); 
				
			//	echo $response->getStatusCode();
				$stream =$response->getBody();
				echo $stream->getContents();
			//	$stream = $request->getBody();
			//	$contents = $stream->getContents(); 
			//	dd($contents);
			}

				

			public function saveApiData()
			    {/*
						##Get Data using Get Method
						    $client = new Client();			   
				 $response= $client->get('http://esb-bd.com/getUser');				 
				 dd($response->getBody()->getContents());	
			    */
			 

				  $body['title'] = "Body Title";
    			  $body['content'] = "Body Description";

    			  $client = new Client();
			///	  $url = "http://esb-bd.com/getUser";

			//	  $response = $client->createRequest("GET", $url, ['auth' => ['yusuf@yahoo.co','123456'],'body'=>$body]);

				  $response =   $client->request('GET', 'http://esb-bd.com/getUser', ['auth' => ['yusuf@yahoo.co', '123456']]);
				   dd($response->getBody()->getContents());	
				//  $response = $client->send($response);

				//  dd($response);			
				}

				public function registerPage()
				{
						return view('modal_test');
				}

			public function getRegister (Request $request)
			{
				$user = new User();
        		$user->name = $request->Input(['name']);
       			$user->email = $request->Input(['email']);
        		$user->password = bcrypt($request->Input(['password']));
       			$user->save();       
			}

			public function search(Request $request){
				$name=$request->name;

		        $result = DB::table('users')
		            ->select(DB::raw("*"))
		            ->where('name', '=', $name)
		            ->get();
       			return $result;
			}

			public function getUser(){
				$user = User::all();
				return $user;
			}

		}
