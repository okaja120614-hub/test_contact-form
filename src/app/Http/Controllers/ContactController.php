<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $categories = Category::all();
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel-before', 'tel-center', 'tel-after', 'address', 'building', 'category', 'detail']);
        return view('confirm', compact('contact', 'categories'));
    }

    public function store(Request $request)
    {
        $contact = $request->only(['category_id', 'first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building', 'detail']);
        Contact::create($contact);
        return view('thanks');
    }
}
