<?php


namespace App\Http\Controllers;


use App\Http\Requests\CreateContactRequest;
use App\Mail\NewContact;

use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store(CreateContactRequest $request)
    {
        $mail = new NewContact(
            $request->get('name'),
            $request->get('email'),
            $request->get('number'),
        );

        Mail::to('info@dev.com')->send($mail);

        session()->flash('success', trans('messages.report.success'));

        return redirect()
            ->back();
    }

}
