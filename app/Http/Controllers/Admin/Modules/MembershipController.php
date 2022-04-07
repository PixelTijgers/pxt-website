<?php

// Controller namespacing.
namespace App\Http\Controllers\Admin\Modules;
use App\Http\Controllers\Controller;

// Facades.
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;

// Models.
use App\Models\Membership;

// Request
use App\Http\Requests\MembershipRequest;

// Traits
use App\Traits\DataTableActionsTrait;
use App\Traits\HasRightsTrait;

class MembershipController extends Controller
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
            return DataTables::of(Membership::query())
            ->addColumn('action', function (Membership $membership) {
                return
                    '<div class="d-flex">' .
                    $this->setAction('membership.index', $membership, 'view', 'memberships', false) .
                    $this->setAction('membership.edit', $membership, 'update', 'memberships') .
                    $this->setAction('membership.destroy', $membership, 'destroy', 'memberships') .
                    '</div>';
            })
            ->make(true);
        }

        // Set values.
        $html = $builder
                    ->addColumn([
                        'title' => __('form.name'),
                        'data' => 'name'
                    ])
                    ->addAction([
                        'title' => __('form.action'),
                        'class' => 'actionHandler'
                    ])
                    ->parameters([
                        'order' =>
                            [0,'asc']
                    ]);

        // Init view.
        return view('admin.modules.membership.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Init view.
        return view('admin.modules.membership.createEdit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MembershipRequest $request)
    {
        // Post data to database.
        Membership::Create($request->validated());

        // Return back with message.
        return redirect()->route('membership.index')->with([
                'type' => 'success',
                'message' => __('form.membership') . __('admin.msg_add_success')
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function edit(Membership $membership)
    {
        // Init view.
        return view('admin.modules.membership.createEdit', compact('membership'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function update(MembershipRequest $request, Membership $membership)
    {
        // Set data to save into database.
        $membership->update($request->validated());

        // Save data.
        $membership->save();

        // Return back with message.
        return redirect()->route('membership.index')->with([
                'type' => 'success',
                'message' => __('form.membership') . __('admin.msg_edit_success')
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $membership
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membership $membership)
    {
        // Delete the model.
        $membership->delete();

        // Return back with message.
        return redirect()->back()->with([
            'type' => 'success',
            'message' => __('form.membership') . __('admin.msg_delete_success')
        ]);
    }
}
