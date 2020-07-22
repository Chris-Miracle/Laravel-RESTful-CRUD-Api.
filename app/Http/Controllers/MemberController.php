<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Member;
use App\Http\Resources\Member as MemberResource;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Members
        $member = Member::paginate(7);

        // Return collection of Members as a resource
        return MemberResource::collection($member);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Here you first confirm if it is a 'put' method
        // which is 'update', if it isn't a put method
        // it creates a new member.
        $member = $request->isMethod('put') ? Member::findOrfail
        ($request->member_id) : new Member;

        $member->id = $request->input('member_id');
        $member->name = $request->input('name');
        $member->email = $request->input('email');
        $member->phone = $request->input('phone');
        $member->address = $request->input('address');
        $member->quote = $request->input('quote');

        if($member->save()){
            return new MemberResource($member);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get a member
        $member = Member::findOrfail($id);

        // Return a member
        return new MemberResource($member);
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
        //get a member
        $member = Member::findOrfail($id);

        // delete a member
        if($member->delete()){
            return new MemberResource($member);
        }
    }
}
