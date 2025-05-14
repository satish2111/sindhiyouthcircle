<?php

namespace App\Controllers;

use App\Models\FinancialYearModel;
use CodeIgniter\Controller;

class FinancialYearController extends BaseController
{
    public function index()
    {
        $model = new FinancialYearModel();
        $data['years'] = $model->findAll();
        return view('financial_year/index', $data);
    }

    public function create()
    {
        return view('financial_year/create');
    }

    public function store()
{
    $rules = [
        'start_date' => 'required|valid_date',
        'end_date'   => 'required|valid_date|check_date_range[start_date]',
        'status'     => 'required|in_list[Active,Inactive]',
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $model = new FinancialYearModel();
    if ($this->request->getPost('status') === 'Active') {
        $model->where('status', 'Active')->set(['status' => 'Inactive'])->update();
    }
    $model->save($this->request->getPost());

    return redirect()->to('/financial-year')->with('success', 'Financial Year added.');
}


    public function edit($id)
    {
        $model = new FinancialYearModel();
        $data['year'] = $model->find($id);

        return view('financial_year/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'start_date' => 'required|valid_date',
            'end_date'   => 'required|valid_date|check_date_range[start_date]',
            'status'     => 'required|in_list[Active,Inactive]',
        ];
    
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        $model = new FinancialYearModel();
        if ($this->request->getPost('status') === 'Active') {
            $model->where('status', 'Active')->set(['status' => 'Inactive'])->update();
        }
        $model->update($id, $this->request->getPost());
    
        return redirect()->to('/financial-year')->with('success', 'Updated successfully.');
    }

    public function delete($id)
    {
        $model = new FinancialYearModel();
        $model->delete($id);

        return redirect()->to('/financial-year')->with('success', 'Deleted successfully.');
    }
}
