<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('category')->get();
        $categories = Category::all();

        return view('index', compact('contacts','categories'));
    }

    public function confirm(ContactRequest $contactRequest)
    {
        $contact = $contactRequest->only(['category_id','first_name','last_name','gender','email','tel','address','building','detail','content']);
        $categories = Category::all();
        return view('confirm', compact('contact','categories'));
    }

    public function store(ContactRequest $contactRequest)
    {
        $contact = $contactRequest->only(['category_id','first_name','last_name','gender','email','tel','address','building','detail']);
        Contact::create($contact);
        return view('thanks');
    }

    public function admin()
    {
        $contacts = Contact::with('category')->Paginate(7);
        $categories = Category::all();

        return view('admin', compact('contacts','categories'));
    }

    public function choose(Request $request)
    {
        $contacts = Contact::with('category')->get();
        $categories = Category::all();
        $deletedId = $request->id;

        $maxContactsElementNumber = 0;
        if($contacts != null){
           $maxContactsElementNumber = count($contacts);
        }//$contacts&null

        $i = 0;
        $inverseDeletedIdValidMarker = 0;
        $inverseDeletedId = 0;
        for($i=1;$i<=$maxContactsElementNumber;$i++){
           if($deletedId == $contacts[$i-1]->id){
             $inverseDeletedIdValidMarker = 1;
             $inverseDeletedId = $i;
           }//$deletedId
        }//$i

        return view('choose', compact('contacts','categories','inverseDeletedId','inverseDeletedIdValidMarker'));
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }

    public function search(Request $request){
        $contacts = Contact::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->Paginate(7);
        $categories = Category::all();
        return view('/admin',compact('contacts', 'categories'));
    }


    
}
