<?php

namespace App\Livewire;

use App\Models\Report;
use App\Models\Satker;
use Livewire\Component;

class ReportTable extends Component
{
    public $filter = '';

    public function render()
    {
        return view('livewire.report-table', [
            'satkers' => Satker::all(),
            'reports' => Report::where('satker_id', 'LIKE', '%' . $this->filter . '%')->get()
        ]);
    }
}
