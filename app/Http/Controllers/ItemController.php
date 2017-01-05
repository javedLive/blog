<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Response;
use App\Item;
use Illuminate\Support\Facades\Redirect;
use DB;
use Event;
use App\Events\SendMail;
use App\Product;
use App\Category;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;

	class ItemController extends Controller
		{

			public function getItem()
				{
					return view('home');
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
		}
