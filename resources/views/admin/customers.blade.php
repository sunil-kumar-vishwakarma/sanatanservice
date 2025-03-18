@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/customers.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


    <div class="container">
        <main class="main-content">
            <div class="add-button-container add-customer-button" >
                <!-- <form class="search-form" action="#">
                    <input type="text" name="search" placeholder="Search customer..." class="search-input">
                    <button type="submit" class="search-button">Search</button>
                </form> -->
                <a href="#" class="add-button">+ Add Customer</a>
                <br>
            </div>
            <section class="customer-list">
                <table id="customerTable" class="customer-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>PROFILE</th>
                            <th>NAME</th>
                            <th>CONTACT NO.</th>
                            <th>EMAIL</th>
                            <th>BIRTH DATE</th>
                            <th>BIRTH TIME</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userdata as $users)
                        <tr>
                            <td>{{$users->id}}</td>
                            <td><img src="{{ asset('https://www.citypng.com/public/uploads/preview/download-black-male-user-profile-icon-png-701751695035033bwdeymrpov.png') }}" alt="Profile"></td>
                            <td>{{$users->name}}</td>
                            <td>{{$users->contactNo}}</td>
                            <td>{{$users->email}}</td>
                            <td>{{ \Carbon\Carbon::parse($users->birthDate)->format('d-m-Y') }}                            </td>
                            <td>{{ \Carbon\Carbon::parse($users->birthTime)->format('h:i A') }}</td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit">Edit</a>
                                <a href="#" class="action-button delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        

                        <!-- Add more customer items as needed -->
                    </tbody>
                </table>
            </section>
        </main>
    </div>

<script>
    $(document).ready(function () {
        $('#customerTable').DataTable({
            "paging": true,           // Enable pagination
            "searching": true,        // Enable search box
            "ordering": true,         // Enable sorting
            "info": true,             // Show table info
            "lengthMenu": [5, 10, 25, 50, 100], // Rows per page
            "pageLength": 10,         // Default number of rows
            "language": {
                "search": "Search Customers:", // Custom search box text
                "lengthMenu": "Show _MENU_ entries per page"
            },
            "columnDefs": [
                { "orderable": false, "targets": [1, 7] } // Disable sorting for Profile & Actions columns
            ]
        });
    });
</script>
@endsection
