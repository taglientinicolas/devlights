<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Deal;
use App\Http\Requests\DealRequest;
use Carbon\Carbon;

class DealsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $deals = Deal::select(['id', 'internal_name', 'title', 'sale_price', 'normal_price', 'is_on_sale']);

            return DataTables::of($deals)
                ->addColumn('actions', function ($deal) {
                    return '<a href="'.route('deals.edit', $deal->id).'" class="btn btn-sm btn-primary">Editar</a> '.
                           '<form action="'.route('deals.destroy', $deal->id).'" method="POST" style="display:inline">
                                '.csrf_field().'
                                '.method_field('DELETE').'
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'¿Are you sure?\')">Delete</button>
                            </form>';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('deals.index');
    }

    public function edit($id)
    {
        $deal = Deal::findOrFail($id);
        return view('deals.edit', compact('deal'));
    }

    public function update(DealRequest $request, Deal $deal)
    {
        try {
            $data = $request->validated();
            $data['release_date'] = Carbon::parse($request->input('release_date'))->timestamp;
            $data['last_change'] = Carbon::parse($request->input('last_change'))->timestamp;
            $deal->update($data);
            return redirect('/deals')->with('success', 'Deal updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the deal.');
        }
    }

    public function destroy(Deal $deal)
    {
        try {
            $deal->delete();
            return redirect('/deals')->with('success', 'Deal deleted successfully.');
        } catch (\Exception $e) {
            return redirect('/deals')->with('error', 'An error occurred while deleting the deal.');
        }
    }


    public function create()
    {
        return view('deals.create');
    }

    public function store(DealRequest $request)
    {
        try {
            $data = $request->validated();
            $data['release_date'] = Carbon::parse($request->input('release_date'))->timestamp;
            $data['last_change'] = Carbon::parse($request->input('last_change'))->timestamp;
            Deal::create($data);

            return redirect('/deals')->with('success', 'Deal created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while creating the deal.');
        }
    }

}
