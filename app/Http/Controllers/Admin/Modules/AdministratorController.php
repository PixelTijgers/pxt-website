<?php

// Controller namespacing.
namespace App\Http\Controllers\Admin\Modules;
use App\Http\Controllers\Controller;

// Facades.
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;

// Models.
use App\Models\Administrator;

// Request
use App\Http\Requests\AdministratorRequest;

// Traits
use App\Traits\DataTableActionsTrait;
use App\Traits\HasRightsTrait;
use App\Traits\MediaHandlerTrait;

class AdministratorController extends Controller
{
    /**
     * Traits
     *
     */
    use DataTableActionsTrait;
    use HasRightsTrait;
    use MediaHandlerTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        // Init datatables.
        if (request()->ajax()) {
            return DataTables::of(Administrator::query())
            ->editColumn('name', function(Administrator $administrator) {

                $avatarName = '<img src="' . $administrator->getFirstMediaUrl('avatar') . '" width="20" height="20" />';

                $avatarName .= $administrator->name;

                return $avatarName;
            })
            ->editColumn('email', function(Administrator $administrator) {
                return '<a href="mailto:' . $administrator->email . '">' . $administrator->email . '</a>';
            })
            ->editColumn('id', function(Administrator  $administrator) {
                return __('admin.' . \Arr::first(@$administrator->roles->pluck('name')->toArray()));
            })
            ->addColumn('action', function (Administrator $administrator) {
                return
                    '<div class="d-flex">' .
                    $this->setAction('administrator.index', $administrator, 'view', 'administrators', false) .
                    $this->setAction('administrator.edit', $administrator, 'update', 'administrators') .
                    $this->setAction('administrator.destroy', $administrator, 'destroy', 'administrators') .
                    '</div>';
            })
            ->rawColumns([
                'name',
                'email',
                'action'
            ])
            ->make(true);
        }

        // Set values.
        $html = $builder
                    ->addColumn([
                        'title' => __('form.name'),
                        'data' => 'name'
                    ])
                    ->addColumn([
                        'title' => __('form.email'),
                        'data' => 'email',
                    ])
                    ->addColumn([
                        'title' => __('form.phone'),
                        'data' => 'phone',
                    ])
                    ->addColumn([
                        'title' => __('form.usertype'),
                        'data' => 'id',
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
        return view('admin.modules.administrator.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Init view.
        return view('admin.modules.administrator.createEdit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdministratorRequest $request)
    {
        // Insert data into database.
        $administrator = Administrator::Create([
            'password' => \Hash::make($request->password)
        ] + $request->validated());

        // If the user role is Super Admin, no new permissions will be added to the database.
        // This is because the Super Admin has all rights.
        // Set role to administrator
        $administrator->assignRole($request->role);

        // Add new permissions.
        if($request->role != 'superadmin')
            $administrator->syncPermissions(array_keys($request->permission));

        // Upload avatar.
        $this->manageInputMedia($administrator, 'avatar');

        // Return back with message.
        return redirect()->route('administrator.index')->with([
                'type' => 'success',
                'message' => __('form.administrator') . __('admin.msg_edit_success')
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrator $administrator)
    {
        // Init view.
        return view('admin.modules.administrator.createEdit', compact('administrator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function update(AdministratorRequest $request, Administrator $administrator)
    {
        // Set data to save into database.
        // Array filter is to remove the empty password.
        if($request->filled('password'))
        {
            $administrator->update([
                'password' => \Hash::make($request->password)
            ] + $request->validated());
        }
        else
        {
            $administrator->update(array_filter($request->validated()));
        }

        // Remove older role.
        $administrator->removeRole(\Arr::first($administrator->roles->pluck('name')->toArray()));

        // If the user role is Super Admin, no new permissions will be added to the database.
        // This is because the Super Admin has all rights.
        // Set role to administrator
        $administrator->assignRole($request->role);

        // Add new permissions.
        if($request->role != 'superadmin')
            $administrator->syncPermissions(array_keys($request->permission));

        // Only change avatar when there's a file uploaded and upload avatar.
        if($request->hasFile('avatar'))
            $this->manageInputMedia($administrator, 'avatar');

        // Save data.
        $administrator->save();

        // Return back with message.
        return redirect()->route('administrator.index')->with([
                'type' => 'success',
                'message' => __('form.administrator') . __('admin.msg_edit_success')
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $administrator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrator $administrator)
    {
        // Prevent user from deleting him- or herself.
        if(auth()->user()->id == $administrator->id)
            // Return back with message.
            return redirect()->back()->with([
                'type' => 'danger',
                'message' => __('admin.msg_alert_error_user')
            ]);

        // Delete the avatar.
        $administrator->clearMediaCollection('avatar');

        // Delete the model.
        $administrator->delete();

        // Return back with message.
        return redirect()->back()->with([
            'type' => 'success',
            'message' => __('form.administrator') . __('admin.msg_delete_success')
        ]);
    }
}
