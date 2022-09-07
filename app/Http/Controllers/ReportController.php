<?php


namespace App\Http\Controllers;


use App\Http\Requests\CreateReportRequest;
use App\Mail\NewReport;

use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store(CreateReportRequest $request)
    {
        $mail = new NewReport(
            $request->get('name'),
            $request->get('email'),
            $request->get('number'),
        );

        Mail::to('info@test.com')->send($mail);

        session()->flash('success', trans('messages.report.success'));

        return redirect()
            ->back();
    }

}
