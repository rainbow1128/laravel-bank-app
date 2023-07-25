<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LoanApplication;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{

    

    public function loanApplication(Request $request){

        

        //validate form data
        

        //save form data
        


        $application = new LoanApplication();
        $application -> name = $request->input('name');
        // $name = Auth::user()->name;
        $application -> name = Auth::user()->name;
        $application -> amount = $request->input('amount');
        $application -> repayment_period = $request->input('repayment_period');
        $interest_rate = $application->interest_rate;
    
        //process data and interest

        $interest_due = $application->amount * $application -> repayment_period * $interest_rate;
        $total_amount_due = $application->amount + $interest_due;

        $application->total_amount_due = $total_amount_due;


        //$application->setTotalAmountDue($total_amount_due);
        
        //save application data

        $application->save();

        //redirect user
        return redirect()-> route('dashboard.loans') -> with('success', 'application submitted successfully');

        //display data
        // return ['application' => $application, 'interest due' => $interest_due, 'total amount due' => $total_amount_due];




    }

    public function showApplications(){
        $name = Auth::user()->name;
        $loans = loanApplication::where('name', $name)->get();



        return view('dashboard.loans', ['loans' => $loans]);
    }

    public function editLoanApplication($loanId){

        $name = Auth::user()-> name;
        $loan =loanApplication::where('id', $loanId)->first();
        

        if (!$loan) {
            return redirect()->route('dashboard.loans')->with('error', 'Loan not found');
        } else {
            return view('dashboard.editLoan', ['loan' => $loan]);
        }

        

    }

    public function saveEditLoanApplication(Request $request, User $loanId){

        $name = Auth::user()-> name;
        $loan =LoanApplication::where('id', $loanId)->first();
        
        $loan -> id = $request-> input('id');
        
        $loan -> amount = $request->input('amount');
        $loan -> repayment_period = $request->input('repayment_period');
        $interest_rate = $loan->interest_rate;

        $interest_due = $loan->amount * $loan -> repayment_period * $interest_rate;
        $total_amount_due = $loan->amount + $interest_due;

        $loan->total_amount_due = $total_amount_due;

        $loan->save();

        return redirect()->route('dashboard.loans')->with('success', 'Loan details updated successfully');

    }

    public function deleteLoanApplication(){

    }
}
