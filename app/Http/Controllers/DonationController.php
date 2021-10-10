<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Institution;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Class DonationController
 * @package App\Http\Controllers
 */
class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donations = Donation::paginate();

        // Retrieving user data:
        $user = auth()->user();
        $user_id = $user->id;

        return view('donation.index', compact('donations', 'user_id'))
            ->with('i', (request()->input('page', 1) - 1) * $donations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $donation = new Donation();

        // authenticating date:
        $now = Carbon::now();
        // $dt2 = Carbon::createFromDate(1987, 4, 23); Just for test
        $dates = DB::table('donations')->pluck('created_at');

        foreach ($dates as $date) {
            
            $val = $now->isSameMonth($date);
        }

        $countries = DB::table('institutions')->pluck('country');
        if ($countries->duplicates()) {
            $what = true;
        }
        // Institution object:
        $institution = Institution::pluck('name_institution', 'id');
        
        // User object:
        $user = User::pluck('name', 'id');
        

        return view('donation.create', compact('donation', 'institution', 'user', 'val', 'what'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        
        request()->validate(Donation::$rules);
        
        $donation = Donation::create($request->all());

        return redirect()->route('donation.index')
            ->with('success', 'Thanks for your donation!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $donation = Donation::find($id);

        return view('donation.show', compact('donation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donation = Donation::find($id);

        // Institution object:
        $institution = Institution::pluck('name_institution', 'id');
        
        // User object:
        $user = User::pluck('name', 'id');

        return view('donation.edit', compact('donation', 'institution', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Donation $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donation $donation)
    {
        request()->validate(Donation::$rules);

        $donation->update($request->all());

        return redirect()->route('donation.index')
            ->with('success', 'Donation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $donation = Donation::find($id)->delete();

        return redirect()->route('donation.index')
            ->with('success', 'Donation deleted successfully');
    }
}
