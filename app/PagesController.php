<?php

namespace Laracasts\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Laracasts\Mail\SupportTicket;

class PagesController extends Controller
{
    /**
     * Show the contact page.
     *
     * @return View
     */
    public function contact()
    {
        return view('page.contact');
    }

    /**
     * Submit a contact request to the admin
    */
    public function postContact()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'question' => 'required',
            'verification' => 'required|in:5,five'
        ]);

        Mail::to(config('laracasts.supportEmail'))->send(
            new SupportTicket(request('email'), request('question'))
        );

        flash()->overplay(
            'Message Sent!',
            'Jeffrey will get back to you as soon as possible.'
        );

        return redirect('/');
    }

    /**
     * Show the frequently asked question page.
     *
     * @return View
     */
    public function faq()
    {
        $question = $this->getFaqs();

        return view('pages.faq', compact('question'));
    }

    /**
     * how the testimonials page.
     *
     * @return View
     */
    public function testimonials()
    {
    $testimonials = $this->gettestimonials(200);

    return view('pages.testimonials', compact('testimonials'));
    }
}
