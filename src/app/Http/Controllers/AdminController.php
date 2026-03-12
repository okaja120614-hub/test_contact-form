<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class AdminController extends Controller
{
    public function admin()
    {
        $categories = Category::all();
        return view('admin', compact('categories'));
    }

    public function logout()
    {
        return view('logout');
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $query = Contact::query();

        if ($request->keyword) {
            $query->where(function ($q) use ($request) {
                $q->where('last_name', 'like', "%{$request->keyword}%")
                    ->orWhere('email', 'like', "%{$request->keyword}%");
            });
        }

        if ($request->gender) {
            $query->where('gender', $request->gender);
        }

        if ($request->category) {
            $query->where('category_id', $request->category);
        }

        if ($request->date) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->with('category')->paginate(7);

        return view('search', compact('contacts', 'categories'));
    }

    public function detail(Request $request)
    {
        $categories = Category::all();
        $contacts = Contact::with('category')->paginate(10);

        $contactDetail = Contact::with('category')
            ->find($request->id);

        return view('search', compact('contacts', 'contactDetail', 'categories'));
    }

    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();

        return redirect('/admin');
    }
}
