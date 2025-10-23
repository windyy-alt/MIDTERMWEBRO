<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    
    public function index()
    {
        $members = Member::all();
        return view('member', compact('members'));
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:members,email',
            'phone' => 'nullable'
        ]);

        Member::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return redirect()->route('member.index')->with('success', 'Member added successfully!');
    }

    
    public function edit(Member $member)
    {
        return view('member_edit', compact('member'));
    }

 
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:members,email,' . $member->id,
            'phone' => 'nullable'
        ]);

        $member->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return redirect()->route('member.index')->with('success', 'Member updated successfully!');
    }

 
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('member.index')->with('success', 'Member deleted successfully!');
    }
}