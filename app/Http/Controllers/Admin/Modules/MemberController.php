<?php

// Controller namespacing.
namespace App\Http\Controllers\Admin\Modules;
use App\Http\Controllers\Controller;

// Facades.
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;
use Maatwebsite\Excel\Facades\Excel;

// Models.
use App\Models\Member;

// Request
use App\Http\Requests\MemberRequest;

// Exports
use App\Exports\Members\MembersExport;

// Traits
use App\Traits\DataTableActionsTrait;
use App\Traits\HasRightsTrait;
use App\Traits\MediaHandlerTrait;

class MemberController extends Controller
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
            return DataTables::of(Member::query()->with(['team']))
                ->editColumn('name', function(Member $member) {

                    if($member->getFirstMediaUrl('memberImage'))
                    {
                        $avatarName = '<div class="d-flex align-items-center">';

                        $avatarName .= '<img class="mr-2" src="' . $member->getFirstMediaUrl('memberImage') . '" width="20" height="20" />';

                        $avatarName .= $member->name;

                        $avatarName .= '</div>';
                    }
                    else
                        $avatarName = $member->name;

                    return $avatarName;
                })
            ->editColumn('street', function (Member $member){
                return $member->street . ' ' . $member->number;
            })
            ->addColumn('action', function (Member $member) {
                return
                    '<div class="d-flex">' .
                        $this->setAction('member.index', $member, 'view', 'members', false) .
                        $this->setAction('member.edit', $member, 'update', 'members') .
                        $this->setAction('member.destroy', $member, 'destroy', 'members') .
                    '</div>';
            })
            ->rawColumns(['name', 'action'])
            ->make(true);
        }

        // Set values.
        $html = $builder
                    ->addColumn([
                        'title' => __('form.name'),
                        'data' => 'name',
                    ])
                    ->addColumn([
                        'title' => __('form.team'),
                        'data' => 'team.name',
                    ])
                    ->addColumn([
                        'title' => __('form.email'),
                        'data' => 'email',
                    ])
                    ->addColumn([
                        'title' => __('form.mobile'),
                        'data' => 'mobile',
                    ])
                    ->addAction([
                        'title' => __('form.action'),
                        'class' => 'actionHandler'
                    ])
                    ->parameters([
                        'order' => [
                            0,
                            'asc'
                        ]
                    ]);

        return view('admin.modules.member.index', compact('html'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MemberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Init view.
        return view('admin.modules.member.createEdit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $member
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {
        // Post data to database.
        $member = Member::create($request->validated());

        // Upload avatar.
        $this->manageInputMedia($member, 'memberImage');

        // Return back with message.
        return redirect()->route('member.index')->with([
                'type' => 'success',
                'message' => __('modules.member') . __('modules.add_success')
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        // Init view.
        return view('admin.modules.member.createEdit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MemberRequest  $request
     * @param  int  $member
     * @return \Illuminate\Http\Response
     */
    public function update(MemberRequest $request, Member $member)
    {
        // Set data to save into database.
        $member->update($request->validated());

        // Only change avatar when there's a file uploaded.
        if($request->exists('memberImageCurrentImage') && !$request->filled('memberImageCurrentImage'))
            $member->clearMediaCollection('memberImage');
        elseif($request->hasFile('memberImage'))
            // Upload avatar.
            $this->manageInputMedia($member, 'memberImage');

        // Save data.
        $member->save();

        // Return back with message.
        return redirect()->route('member.index')->with([
                'type' => 'success',
                'message' => __('modules.member') . __('modules.edit_success')
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        // Delete the model.
        $member->delete();

        // Return back with message.
        return redirect()->back()->with([
            'type' => 'success',
            'message' => __('modules.member') . __('modules.delete_success')
        ]);
    }

    public function export()
    {
        return Excel::download(new MembersExport, 'Overzicht-spelers_' . date('Y') . '_' . date('m') . '_' . date('d') . '_' . date('His') . '.xlsx');
    }
}
