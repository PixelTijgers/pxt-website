<?php

// Controller namespacing.
namespace App\Http\Controllers\Admin\Modules;
use App\Http\Controllers\Controller;

// Facades.
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;

// Models.
use App\Models\Team;

// Request
use App\Http\Requests\TeamRequest;

// Traits
use App\Traits\DataTableActionsTrait;
use App\Traits\HasRightsTrait;

class TeamController extends Controller
{
    /**
     * Traits
     *
     */
    use DataTableActionsTrait;
    use HasRightsTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        // Init datatables.
        if (request()->ajax()) {
            return DataTables::of(Team::query())
                ->addColumn('action', function (Team $teams) {
                    return
                        '<div class="d-flex">' .
                            $this->setAction('team.index', $teams, 'view', 'teams', false) .
                            $this->setAction('team.edit', $teams, 'update', 'teams') .
                            $this->setAction('team.destroy', $teams, 'destroy', 'teams') .
                        '</div>';
                })
                ->make(true);
        }

        // Set values.
        $html = $builder
                    ->addColumn([
                        'title' => __('form.name'),
                        'data' => 'name',
                    ])
                    ->addColumn([
                        'title' => __('form.name_short'),
                        'data' => 'name_short',
                    ])
                    ->addAction([
                        'title' => __('form.action'),
                        'class' => 'actionHandler'
                    ])
                    ->parameters([
                        'order' => [
                            0,
                            'asc'
                        ],
                    ]);

        return view('admin.modules.team.index', compact('html'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TeamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Init view.
        return view('admin.modules.team.createEdit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $team
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        // Post data to database.
        $team = Team::Create($request->validated());

        // Return back with message.
        return redirect()->route('team.index')->with([
                'type' => 'success',
                'message' => __('form.') . __('admin.msg_add_success')
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        // Init view.
        return view('admin.modules.team.createEdit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TeamRequest  $request
     * @param  int  $team
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, Team $team)
    {
        // Set data to save into database.
        $team->update($request->validated());

        // Save data.
        $team->save();

        // Return back with message.
        return redirect()->route('team.index')->with([
                'type' => 'success',
                'message' => __('form.') . __('admin.msg_edit_success')
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        // Delete the model.
        $team->delete();

        // Return back with message.
        return redirect()->back()->with([
            'type' => 'success',
            'message' => __('form.') . __('admin.msg_delete_success')
        ]);
    }
}
