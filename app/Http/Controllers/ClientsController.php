<?php

namespace App\Http\Controllers;
use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Clients::orderBy('updated_at','desc')->paginate(15);
        return view('clients.index', compact('clients'));
    }

    /**
     * Display a listing of the resource by lifetime points.
     */
    public function index_lifetime()
    {

        $lifetime_points = DB::table('lifetime_points')
            ->join('clients','clients.id','=','lifetime_points.clientid')
            ->select('lifetime_points.points','clients.id','clients.fname','clients.lname','clients.phone_1','clients.phone_2')
            ->orderByDesc('lifetime_points.points')
            ->get();

        return view('clients.lifetime_points', compact('lifetime_points'));
    }

    /**
     * Store a newly created resource in storage
     */
    public function store(Request $request,$authid)
    {
//        Create the vars
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $phone_1 = $request->input('phone_1');
        $phone_2 = $request->input('phone_2');
        $email = $request->input('email');
        $notes = $request->input('notes');

//        Store in DB
        $data=array('fname'=>$fname,"lname"=>$lname,"phone_1"=>$phone_1,"phone_2"=>$phone_2,"email"=>$email,"new_points"=>50,"notes"=>$notes);
        DB::table('clients')->insert($data);
        $id = DB::getPdo()->lastInsertId();
        $lifetime_points_data = array('clientid'=>$id,'points'=>50);
        $points_history_data = array('clientid'=>$id,'points'=>50,'updated_by'=>$authid);
        DB::table('lifetime_points')->insert($lifetime_points_data);
        DB::table('points_history')->insert($points_history_data);
        return redirect()->route('clients')->with('status','Client '.$fname.' '.$lname.' has been created ');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Client $client)
    {
        return view('clients.show',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $client = Clients::find($id);

//        $client = DB::table('clients')
//            ->join('points_history','clients.id','=','points_history.clientid')
//            ->select('clients.id','clients.fname','clients.lname','clients.email','clients.phone_1','clients.phone_2','points_history.points')
//            ->where('clients.id','=',$id);
        $current_points = DB::table('points_history')
            ->select('points')
            ->where('clientid','=',$id)
            ->orderBy('points','desc')
            ->first();

        $points_history = DB::table('points_history')
            ->join('clients','clients.id','=','points_history.clientid')
            ->join('users','users.id','=','points_history.updated_by')
            ->where('clients.id','=',$id)
            ->orderBy('points_history.id','desc')->get();

        $lifetime_points = DB::table('lifetime_points')
            ->join('clients','clients.id','=','lifetime_points.clientid')
            ->select('points')
            ->where('clients.id','=',$id)->first();

        return view('clients.edit', compact('client','current_points','points_history','lifetime_points'));
    }

    public function search(Request $request)
    {

        //        Create the vars

        $search = $request->input('search');


        $client_data = DB::table('clients')
            ->select('clients.id','clients.fname','clients.lname','clients.email','clients.phone_1','clients.phone_2','clients.new_points')
            ->where('clients.phone_1','LIKE','%'.$search.'%')
            ->orWhere('clients.phone_2','LIKE','%'.$search.'%')->get();

        return view('clients.search', compact('client_data'));
    }


    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id,$authid)
    {
        $client = Clients::find($id);
        $client->fname = $request->input('fname');
        $client->lname = $request->input('lname');
        $client->email = $request->input('email');
        $client->phone_1 = $request->input('phone_1');
        $client->phone_2 = $request->input('phone_2');
        $client->new_points = $request->input('new_points');
        $client->notes = $request->input('notes');
        $client->update();

        $affected = DB::table('points_history')
            ->insert(['points' => $request->input('new_points'),'clientid'=>$id,'updated_by'=>$authid]);
        $lifetime_points_now = DB::table('lifetime_points')
            ->join('clients','clients.id','=','lifetime_points.clientid')
            ->select('points')
            ->where('clients.id','=',$id)->sum('points');

        $new_lifetime_points = $lifetime_points_now+$request->input('receipt');

        DB::table('lifetime_points')
            ->where('clientid','=',$id)
            ->update(['points' => $new_lifetime_points]);

        return redirect('clients')->with('status', 'Data Updated '.$new_lifetime_points);
    }

    public function redeem(Request $request, $id,$authid)
    {
        $client = Clients::find($id);
        $redeem_500 = $client->new_points - $request->input('redeemed_points');
        $client->new_points = $redeem_500;
        $client->update();
        $redeemed_points = $client->new_points - $request->input('redeemed_points');

        $affected = DB::table('points_history')
            ->insert(['points' => $redeem_500,'clientid'=>$id,'updated_by'=>$authid]);
       return redirect('clients/edit/'.$id)->with('status', $redeemed_points.' Points Redeemed');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function delete(Request $request)
    {
        DB::delete("DELETE FROM `clients` WHERE  `id`=$request->id;");
        return redirect('clients')->with('status', 'Data Updated');
    }
}
