<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Hash;
use Validator;
use App\Link;
class UrlShortener extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *  params :
     *      link
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //
        //We first define the Form validation rule(s)

        /*
         * params :
         *      link
         */
        $rules = array(
            'link' => 'required|url'
        );
        //Then we run the form validation
        $validation = Validator::make($request->all(),$rules);
        //If validation fails, we return to the main page with an error info
        if($validation->fails()) {
            $error_messages = implode(',', $validation->messages()->all());
            $response_array = array('success' => false, 'error' => $error_messages ,'error_code' => 101);
        } else {
            $newLink = urlencode($request->link);
            //Now let's check if we already have the link in our database. If so, we get the first result
            $link = Link::where('url','=',$newLink)->first();
            //If we have the URL saved in our database already, we provide that information back to view.
            if($link) {
                $newHash = $link->hash;
                //Else we create a new unique URL
            } else {
                //First we create a new unique Hash
                do {
                    $newHash = Str::random(6);
                } while(Link::where('hash','=',$newHash)->count() > 0);

                //Now we create a new database record
                Link::create(array('url' => $newLink,'hash' => $newHash ));
            }
            $newHash = asset('/') . $newHash;
            //dd($newHash);
            $response_array = array(
                'success' => true,
                'link' => $newHash
            );
        }

        return response()->json($response_array , 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
