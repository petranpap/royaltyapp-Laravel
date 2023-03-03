<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class CashiersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cashiers =DB::table('users')
            ->where('admin','=',0)->paginate(10);

        return view('cashiers.index', compact('cashiers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cashier = User::find($id);
        $current_points = DB::table('points_history')
            ->select('points')
            ->where('clientid','=',$id)
            ->orderBy('points','desc')
            ->first();
        return view('cashiers.edit', compact('cashier','current_points'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        $cashier = User::find($id);
        $cashier->name = $request->input('name');
        $cashier->password = $request->input('password');
        $cashier->update();

//        $affected = DB::table('points_history')
//            ->insert(['points' => $request->input('new_points'),'clientid'=>$id,'updated_by'=>$authid]);
        return redirect('cashiers')->with('success', 'Cashier Updated');
    }



    /**
     * Remove the specified resource from storage.
     *
     */
    public function delete(Request $request)
    {
        DB::delete("DELETE FROM `users` WHERE  `id`=$request->id;");
        return redirect('cashiers')->with('delete', 'Cashier Deleted');
    }
}
