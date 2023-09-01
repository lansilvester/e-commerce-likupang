<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'pesan' => 'max:255',
        ]);
        Feedback::create($data);

        return redirect()->route('home')->with('success', 'Terima kasih atas feedback Anda!');
    }
}
