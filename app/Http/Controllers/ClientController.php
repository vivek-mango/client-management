<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use DataTables;

class ClientController extends Controller
{

    /**
     * Display a listing of clients.
     *
     * @param  Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $data = Client::select('*')->orderBy('created_at', 'DESC')->get();

        if ($request->ajax()) {
            return DataTables::of($data)->addIndexColumn()->addColumn('created_at', function ($row) {
                $date = date("d M Y", strtotime($row->created_at));
                return $date;
            })->addColumn('action', function ($row) {
                return '<div class="row"><a href="' . route('clients.edit', $row->id) . '"><button class="btn btn-success btn-sm" style="margin: 0px 5px;">Edit</button></a>' .
                    '<form action="' . route("clients.destroy", $row->id) . '" method="post">' .
                    csrf_field() .
                    method_field("delete") .
                    '<button class="btn btn-danger btn-sm" type="submit" onclick="return confirm(\'Are you sure you want to delete this client?\')" style="width: 70px;">Delete</button>' .
                    '</form></div>';
            })->rawColumns(['action'])->make(true);
        }
        return view('clients/client-list');
    }

    /**
     * Show the form for creating a new client.
     *
     * @return View
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created client in the database.
     *
     * @param  Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'client_type' => 'required|in:0,1',
            'date_of_birth' => 'nullable|date',
            'contact_name' => 'required|string',
            'company_name' => 'required|string',
            'company_email' => 'required|email',
            'company_registration_number' => 'nullable|string',
            'contact_email' => 'required|email',
        ]);

        Client::create($data);
        return redirect()->route('lists')->with('success', __('Client created successfully.'));
    }

    /**
     * Remove the specified client from the database.
     *
     * @param  int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect()->route('lists')->with('success', __('Client deleted successfully.'));
    }

    /**
     * Show the form for editing the specified client.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        $client = Client::find($id);

        return view('clients/edit', compact('client'));
    }

    /**
     * Update the specified client in the database.
     *
     * @param  Request $request
     * @param  int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);

        $data = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_email' => 'required|email|unique:clients,company_email,' . $id,
            'client_type' => 'required|in:0,1',
            'date_of_birth' => $request->input('client_type') == '0' ? 'required_if:client_type,0' : '',
            'company_registration_number' => $request->input('client_type') == '1' ? 'required_if:client_type,1' : '',
            'contact_name' => 'required|string|max:255',
            'contact_email' => 'required|email|unique:clients,contact_email,' . $id,
        ]);
        $client->update($data);

        return redirect()->route('lists')->with('success', __('Client updated successfully.'));
    }
}
