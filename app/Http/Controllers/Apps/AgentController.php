<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Apps\SalesAgent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AgentController extends Controller
{
    protected $view = 'apps.agents.';
    protected $route = 'apps.agent.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('agent-access');
        $title = 'Delete Permissions!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view($this->view.'index', [
            'agents'  => SalesAgent::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('agent-create');
        return view($this->view.'create', [
            'agent' => new SalesAgent(),
            'halls' => DB::table('halls')->pluck('name', 'id'),
            'zones' => DB::table('sections')->pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('agent-create');
        $request->validate([
            'hall'    => 'required',
            'section' => 'required',
            'name'    => 'required|string',
            'status'  => 'required',
        ]);

        $agent = new SalesAgent();
        $agent->saveSalesAgent($agent, $request);

        Alert::success('Successfully saved!', 'Record has been saved successfully');
        return redirect()->route($this->route.'index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->authorize('agent-show');
        $agent = SalesAgent::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('agent-edit');
        return view($this->view.'edit', [
            'agent' => SalesAgent::findOrFail($id),
            'halls' => DB::table('halls')->pluck('name', 'id'),
            'zones' => DB::table('sections')->pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('agent-edit');
        $agent = SalesAgent::findOrFail($id);
        $agent->saveSalesAgent($agent, $request);

        Alert::success('Successfully updated!', 'Record has been updated successfully');
        return redirect()->route($this->route.'edit', $agent);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('agent-delete');
        $agent = SalesAgent::findOrFail($id);
        $agent->delete();

        Alert::warning('Successfully deleted!', 'Record has been deleted successfully');
        return redirect()->route($this->route.'index');
    }
}
