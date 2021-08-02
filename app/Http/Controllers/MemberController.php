<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\Reservoir;
use Validator;
use PDF;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $defaultReservoir = 0;
        $members = Member::orderBy('surname')->get();
        // $members = Better::orderBy('type')->paginate(15)->withQueryString();
        $reservoirs = Reservoir::orderBy('area', 'desc')->get();

        if ($request->reservoir_id) {
            $members= Member::where('reservoir_id', (int)$request->reservoir_id)->get();
            $defaultReservoir = (int)$request->reservoir_id;
        } 
        
        return view('member.index', ['members' => $members,
        'defaultReservoir' => $defaultReservoir,
        'reservoirs' => $reservoirs,
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reservoirs = Reservoir::orderBy('title')->get();
        return view('member.create', ['reservoirs' => $reservoirs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'member_name' => ['required', 'alpha', 'min:3', 'max:100'],
            'member_surname' => ['required', 'alpha', 'min:3', 'max:150'],
            'member_live' => ['required', 'alpha', 'min:3', 'max:150'],
            'member_experience' => ['required', 'numeric', 'min:1'],
            'member_registered' => ['required', 'numeric'],
            'reservoir_id' => ['required', 'integer', 'min:1'],
            ]
        );
            if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator); 
        }
        if ($request->member_experience < $request->member_registered){
            $request->flash();
            return redirect()->back()->with('info_message', 'Member\'s experience can\'t be greater than registration time');
        }

        $member = new Member;
        $member->name = $request->member_name; 
        $member->surname = $request->member_surname; 
        $member->live = $request->member_live; 
        $member->experience = $request->member_experience; 
        $member->registered = $request->member_registered; 
        $member->reservoir_id = $request->reservoir_id; 
        $member->save();
        return redirect()->route('member.index')->with('success_message', 'Member successfuly created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        $reservoirs = Reservoir::all();
        return view('member.show', ['member'=>$member, 'reservoirs'=>$reservoirs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $reservoirs = Reservoir::orderBy('title')->get();
        return view('member.edit', ['member' => $member, 'reservoirs' => $reservoirs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $validator = Validator::make($request->all(), [
            'member_name' => ['required', 'alpha', 'min:3', 'max:100'],
            'member_surname' => ['required', 'alpha', 'min:3', 'max:150'],
            'member_live' => ['required', 'alpha', 'min:3', 'max:150'],
            'member_experience' => ['required', 'numeric', 'min:1'],
            'member_registered' => ['required', 'numeric'],
            'reservoir_id' => ['required', 'integer', 'min:1'],
            ]
        );
            if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator); 
        }

        $member->name = $request->member_name; 
        $member->surname = $request->member_surname; 
        $member->live = $request->member_live; 
        $member->experience = $request->member_experience; 
        $member->registered = $request->member_registered; 
        $member->reservoir_id = $request->reservoir_id; 
        $member->save();
        return redirect()->route('member.index')->with('success_message', 'Member successfuly updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('member.index')->with('success_message', 'Member successfuly deleted.');
    }

    public function pdf(Member $member)
    {
        $pdf = PDF::loadView('member.pdf', ['member'=> $member]);
        return $pdf->download($member->name. $member->surname.'.pdf');
    }
}
