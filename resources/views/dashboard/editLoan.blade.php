<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        html, body {
        height: 100%;
        }
        body, input, select { 
        padding: 0;
        margin: 0;
        outline: none;
        font-family: Roboto, Arial, sans-serif;
        font-size: 16px;
        color: #eee;
        }
        h1, h3 {
        font-weight: 400;
        }
        h1 {
        font-size: 32px;
        }
        h3 {
        color: #1c87c9;
        }
        .main-block, .info {
        display: flex;
        flex-direction: column;
        }
        .main-block {
        justify-content: center;
        align-items: center;
        width: 100%; 
        min-height: 100%;
        background: #ffc139;
        /*background: url("/uploads/media/default/0001/01/e7a97bd9b2d25886cc7b9115de83b6b28b73b90b.jpeg") no-repeat center;
        background-size: cover; */
        }
        .main-form {
        width: 80%; 
        padding: 50px;
        /*margin-bottom: 20px; */
        border-radius: 1%;
        background: rgb(255, 109, 5);
        }
        input, select {
        color: #000000;
        padding: 5px;
        margin-bottom: 20px;
        background: transparent;
        border: none;
        border-bottom: 1px solid #eee;
        }
        input::placeholder {
        color: rgb(0, 0, 0);
        }
        option {
        background: black; 
        border: none;
        }
        .metod {
        display: flex; 
        }
        input[type=radio] {
        display: none;
        }
        label.radio {
        position: relative;
        display: inline-block;
        margin-right: 20px;
        text-indent: 32px;
        cursor: pointer;
        }
        label.radio:before {
        content: "";
        position: absolute;
        top: -1px;
        left: 0;
        width: 17px;
        height: 17px;
        border-radius: 50%;
        border: 2px solid #1c87c9;
        }
        label.radio:after {
        content: "";
        position: absolute;
        width: 8px;
        height: 4px;
        top: 5px;
        left: 5px;
        border-bottom: 3px solid #1c87c9;
        border-left: 3px solid #1c87c9;
        transform: rotate(-45deg);
        opacity: 0;
        }
        input[type=radio]:checked + label:after {
        opacity: 1;
        }
        button {
        display: block;
        width: 200px;
        padding: 10px;
        margin: 20px auto 0;
        border: none;
        border-radius: 5px; 
        background: #1c87c9; 
        font-size: 14px;
        font-weight: 600;
        color: #fff;
        }
        button:hover {
        background: #095484;
        }
        @media (min-width: 568px) {
        .info {
        flex-flow: row wrap;
        justify-content: space-between;
        }
        input {
        width: 46%;
        }
        input.fname {
        width: 100%;
        }
        select {
        width: 48%;
        }
        }
  
        .success-message {
          padding: 10px;
          margin-bottom: 20px;
          border-radius: 5px;
          background-color: #4CAF50;
          color: #fff;
          }
          
          .view-loan-block {
              margin-top: 20px;
          }
  
          table {
              width: 100%;
              border-collapse: collapse;
              border-style: solid;
              border-color: #095484;
              
          }
          
          th, td {
              padding: 8px;
              text-align: center;
              color: #000000;
             
          }
          
          th {
              background-color: #1c87c9;
              color: #fff;
          }
          
          tr:nth-child(even) {
              background-color:  rgb(255, 109, 5);
          }
      </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Repayment Period</th>
                <th>Interest rate </th>
                <th>Total amount due </th>
                <th></th>
                <th></th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            @if($loan)
            <form action="{{route('loans.edit', ['loanId' => $loan->id])}}" method="POST">
                @csrf
                @method('PATCH')
                <tr>
                    <td>
                        <input type="number" value="{{ $loan->id }}" readonly>
                        
                    </td>
                    <td>
                        <input value = "{{ $loan->name }}" readonly>
                        
                    </td>
                    <td>
                        <input type="number" value="{{ $loan->amount }}">  
                    </td>
                    <td>
                        <select name="repayment_period">
                            <option value="{{ $loan->repayment_period }}" selected></option>
                            <option value="7">7 days</option>
                            <option value="14">14 days </option>
                            <option value="21">21 days </option>
                            <option value="28">28 days</option>
                            <option value="60">60 days </option>
                        </select>
                        
                    </td>
                    <td> <input type="number" value="{{ $loan->interest_rate }}" readonly> </td>
                    <td> <input type="number" value="{{$loan->total_amount_due}}" readonly> </td>
                    <td> <button type="submit"> Save </button></td>
                </form>
                   
                <td>
                    <form method="POST" action="{{route('loans.delete', $loan->id)}}"> 
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <i class="bi bi-trash-fill"></i>
                        </button>

                    
                    </form>
        
            
                    
                </td>
                    <!-- Add more columns as needed -->
                </tr>
            @else 
            <tr>
                <td>loan not found</td>
            </tr>

            @endif
        </tbody>
    </table>
    
</body>
</html>