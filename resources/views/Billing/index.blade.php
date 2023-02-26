<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel 9 CRUD Tutorial Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Laravel 9 CRUD Example Tutorial</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('billing.create') }}"> Create Company</a>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('billing.create') }}">User List</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Amount</th>
                    <th>description</th>
                    <th>client ID</th>
                    <th>Due Date</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($billing as $billing)
                    <tr>
                        <td>{{ $billing->amount }}</td>
                        <td>{{ $billing->description }}</td>
                        <td>{{ $billing->client_id }}</td>
                        <td>{{ $billing->due_date }}</td>
                        <td>
                            <form action="{{ route('billing.destroy',$billing->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('billing.edit',$billing->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>


    </div>
</body>
</html>
