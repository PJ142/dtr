<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dtr;

class DTRController extends Controller
{
    public function deleteDtr(Dtr $dtr){
        if (auth()->user()->id === $dtr['user_id']){
            $dtr->delete();
        }
        return redirect('/');
    }
    public function updateDtr(Dtr $dtr,Request $request){
        if (auth()->user()->id !== $dtr['user_id']){
            return redirect('/');
        }
        $incomingFields = $request->validate([
            'date' => 'required|date',
            'time_in_am' => 'required',
            'time_out_am' => 'required',
            'time_in_pm' => 'required',
            'time_out_pm' => 'required'
        ]);

        $dtr->update($incomingFields);
        return redirect('/');
    }

    public function edit(Dtr $dtr){
        if (auth()->user()->id !== $dtr['user_id']){
            return redirect('/');
        }
        return view('Edit',['edit'=>$dtr]);
    }

    public function createDtr(Request $request) {
        $incomingFields = $request->validate([
            'date' => 'required|date',
            'time_in_am' => 'required',
            'time_out_am' => 'required',
            'time_in_pm' => 'required',
            'time_out_pm' => 'required'
        ]);

        $incomingFields['date'] = strip_tags($incomingFields['date']);
        $incomingFields['time_in_am'] = strip_tags($incomingFields['time_in_am']);
        $incomingFields['time_out_am'] = strip_tags($incomingFields['time_out_am']);
        $incomingFields['time_in_pm'] = strip_tags($incomingFields['time_in_pm']);
        $incomingFields['time_out_pm'] = strip_tags($incomingFields['time_out_pm']);
        $incomingFields['user_id'] = auth()->id();
        Dtr::create($incomingFields);
        return redirect('/');
    }
}
