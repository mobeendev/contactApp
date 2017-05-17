<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContactFormRequest;
use App\Http\Middleware\RedirectIfNotLoggedIn;
use Illuminate\Support\Facades\Redirect;

class ContactAppController extends Controller {

    public function __construct() {
        $this->middleware(RedirectIfNotLoggedIn::class);
    }

    /**
     * Show app dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard() {
        $contacts = \App\User::find(Auth::user()->id)->contact()->orderBy('created_at', 'desc')->paginate(3);
        return view('contacts.home', ['contacts' => $contacts]);
    }

    /**
     * Display contact listing
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $totalContacts = \App\User::find(Auth::user()->id)->contact()->count();
        $contacts = \App\User::find(Auth::user()->id)->contact()->orderBy('created_at', 'desc')->paginate(3);
        return view('contacts.list', ['contacts' => $contacts, 'total' => $totalContacts]);
    }

    /**
     * Show the form for creating a new contact.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('contacts.create');
    }

    /**
     * Save a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(ContactFormRequest $request) {

        $data = \App\User::find(Auth::user()->id)->contact()->save(new Contact(
                ['name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'company' => $request->company,
            'dob' => $request->dob,
        ]));

        return Redirect::to('contacts/all')->with('alert-success', 'Record added successfully.');
    }

    /**
     * Display the contact for given id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //    
        return view('contacts.show', ['contact' => Contact::find($id)]);
    }

    /**
     * Show the form for editing the contact.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
//        echo 'dd';
        
//        dd(Contact::find($id));
        
        return view('contacts.edit', ['contact' => Contact::find($id)]);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        //
        $this->validate($request, [
            'name' => 'required|min:3|regex:/^[\pL\s\-]+$/u',
//            'email' => 'required|unique:contacts|email',
            'phone' => 'required|numeric',
            'address' => 'required|max:200',
            'dob' => 'required|date_format:Y-m-d',
            'company' => 'required|max:250|regex:/^[a-zA-Z0-9 \- .]+$/',
        ]);

        $contact = Contact::find($request->contact_id);
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->address = $request->address;
        $contact->dob = $request->dob;
        $contact->company = $request->company;
        $contact->save();

        return Redirect::to('contacts/all')->with('alert-success', 'Record updated successfully.');

//        dd($contact);
    }

    /**
     * Remove the specified contact from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Contact::destroy($id);
        return Redirect::to('contacts/all')->with('alert-info', 'Record deleted successfully.');
    }

    /**
     * Show the search form.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $contacts = $keyword = null;
        if ($request->keyword) {

            $keyword = $request->keyword;

            //search contact in Database
//            $contacts = Contact::
//                    where('user_id', '=', Auth::user()->id)
//                    ->orWhere('name', 'like', '%' . $keyword . '%')
//                    ->orWhere('company', 'like', '%' . $keyword . '%')
//                    ->orWhere('email', 'like', '%' . $keyword . '%')
//                    ->orderBy('id')
//                    ->paginate(2);

            $contacts = \DB::table('contacts')->whereUserId(Auth::user()->id)
                ->where(function($q) use ($keyword) {
                $q->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('company', 'like', '%' . $keyword . '%')
                ->orWhere('email', 'like', '%' . $keyword . '%');
            }) ->whereNull('deleted_at')->paginate(2);
        }
        return view('contacts.search', ['contacts' => $contacts, 'keyword' => $keyword]);
    }

    public function listing() {
        return view('contacts.list');
    }

}
