<?php

namespace Fcdniproua\Contacts\Controllers;

use Fcdniproua\Contacts\Models\Contact;
use Fcdniproua\Contacts\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('phones')->paginate(10);
        return view('contacts::index', compact('contacts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone.*' => ['required', function($attribute, $value, $fail) {
                if (!preg_match('/^\+?[0-9]{10,15}$/', $value)) {
                    $fail('The '.$attribute.' must be a valid phone number.');
                }
            }],
        ]);

        $contact = Contact::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name
        ]);

        var_dump($request->phone);
        foreach ($request->phone as $phone) {
//            $contact->phones()->create(['phone' => $phone]);
            $newPhone = $contact->phones()->create(['number' => $phone]);
            if (!$newPhone) {
                dd('Phone not saved:', $phone);
            }
        }

        return redirect()->route('contacts.index');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
