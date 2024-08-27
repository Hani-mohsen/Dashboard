<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class RevewController extends Controller
{
    public function allreview(){
        $review = ProductReview::latest()->get();
        return view('backend.review.review_all', compact('review'));
    }
}
