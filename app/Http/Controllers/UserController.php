<?php
namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request; // <-- handling http request in lumen
use App\Models\User; // <-- The model
use App\Traits\ApiResponser; //<--- use to standarized our code for api response

// use DB; // <----if you're not using lumen eloquent you can use DB coponent in lumen

Class UserController extends Controller {  

use ApiResponser;

private $request;

public function __construct(Request $request){
$this->request = $request;
}

public function getUsers(){
    $users = User::all();
    return response()->json($users, 200);
    }
    

    public function index()
    {
    $users = User::all();
    return $this->successResponse($users);
}

//Get
// public function index()
// {
// $users = User::all();
// return $this->successResponse($users);
// }
public function add(Request $request ){
    $rules = [
        'user_name' => 'required|max:20',
        'book_name' => 'required|max:20',
        'reservation_date' => 'required|date',
        'return_date' => 'required|date',
];
$this->validate($request,$rules);
$user = User::create($request->all());
return $this->successResponse($user,
Response::HTTP_CREATED);
}
/**
* Obtains and show one user
* @return Illuminate\Http\Response
*/

//Get by ID
public function show($id)
{
$user = User::findOrFail($id);
return $this->successResponse($user);

}


//Update
public function update(Request $request,$id)
{
    $rules = [
        'user_name' => 'required|max:20',
        'book_name' => 'required|max:20',
        'reservation_date' => 'required|date',
        'return_date' => 'required|date',
];
$this->validate($request, $rules);
$user = User::findOrFail($id);
$user->fill($request->all());
// if no changes happen
if ($user->isClean()) {
return $this->errorResponse('At least one value must
change', Response::HTTP_UNPROCESSABLE_ENTITY);
}
$user->save();
return $this->successResponse($user);
}


//Delete
public function delete($id)
{
$user = User::findOrFail($id);
$user->delete();
return $this->successResponse($user);

}
}
