<?php

namespace App\Http\Controllers\User;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with('user')->latest()->get();
        return view('user/testimonials.index', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'review' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Testimonial::create([
            'user_id' => Auth::id(),
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        return redirect()->back()->with('success', 'Testimonial submitted successfully!');
    }

    public function testimonial()
    {
        $testimonials = Testimonial::with('user')->latest()->get();
        return view('welcome', compact('testimonials'));
    }
}
