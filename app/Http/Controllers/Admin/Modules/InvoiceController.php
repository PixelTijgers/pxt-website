<?php

// Controller namespacing.
namespace App\Http\Controllers\Admin\Modules;
use App\Http\Controllers\Controller;

// Facades.
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;

// Models.
use App\Models\Invoice;

// Request
use App\Http\Requests\InvoiceRequest;

// Traits
use App\Traits\DataTableActionsTrait;
use App\Traits\HasRightsTrait;

// Carbon
use Carbon\Carbon;

class InvoiceController extends Controller
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
            return DataTables::of(Invoice::query()->with(['client']))
            ->editColumn('type', function(Invoice $invoice) {
                return __(ucfirst($invoice->type));
            })
            ->editColumn('invoice_date', function(Invoice $invoice) {
                return $invoice->invoice_date->formatLocalized('%e %B %Y');
            })
            ->editColumn('is_payed', function(Invoice $invoice) {
                if($invoice->is_payed === true)
                    return '<span class="badge bg-success d-block"><i class="fas fa-check"></i></span>';
                else
                    return '<span class="badge bg-danger d-block"><i class="fas fa-times"></i></span>';
            })
            ->addColumn('action', function (Invoice $invoice) {
                return
                    '<div class="d-flex">' .
                    $this->setAction('invoice.index', $invoice, 'view', 'invoices', false) .
                    $this->setAction('invoice.edit', $invoice, 'update', 'invoices') .
                    $this->setAction('invoice.destroy', $invoice, 'destroy', 'invoices') .
                    '</div>';
            })
            ->rawColumns([
                'is_payed',
                'action'
            ])
            ->make(true);
        }

        // Set values.
        $html = $builder
                    ->addColumn([
                        'title' => __('Invoice ID'),
                        'data' => 'id'
                    ])
                    ->addColumn([
                        'title' => __('Client'),
                        'data' => 'client.name'
                    ])
                    ->addColumn([
                        'title' => __('Type'),
                        'data' => 'type'
                    ])
                    ->addColumn([
                        'title' => __('Date'),
                        'data' => 'invoice_date'
                    ])
                    ->addColumn([
                        'title' => __('Payed'),
                        'data' => 'is_payed',
                        'class' => 'published'
                    ])
                    ->addAction([
                        'title' => __('Actions'),
                        'class' => 'actionHandler'
                    ])
                    ->parameters([
                        'order' =>
                            [0,'asc']
                    ]);

        // Init view.
        return view('admin.modules.invoice.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Init view.
        return view('admin.modules.invoice.createEdit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceRequest $request)
    {
        // Post data to database.
        Invoice::Create($request->validated());

        // Return back with message.
        return redirect()->route('invoice.index')->with([
                'type' => 'success',
                'message' => __('Item Add')
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        // Init view.
        return view('admin.modules.invoice.createEdit', compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(InvoiceRequest $request, Invoice $invoice)
    {
        // Set data to save into database.
        $invoice->update($request->validated());

        // Save data.
        $invoice->save();

        // Return back with message.
        return redirect()->route('invoice.index')->with([
                'type' => 'success',
                'message' => __('Item Edit')
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        // Delete the model.
        $invoice->delete();

        // Return back with message.
        return redirect()->back()->with([
            'type' => 'success',
            'message' => __('Item Delete')
        ]);
    }
}
