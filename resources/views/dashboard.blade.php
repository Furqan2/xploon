<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table table-striped table-bordered" style="width:100%" id="table">
                    <thead>
                        <tr id="thUp">
                            @foreach ($data->data->headers as $header)
                            <th class="text-center">{{$header}}</th>
                            @endforeach
                        </tr>

                    </thead>
                    <tbody id="tableBody">
                        @foreach ($data->data->rows as $row)
                        <tr>

                            <td>{{$row->id}}</td>
                            <td>{{$row->fname}}</td>
                            <td>{{$row->lname}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{date('d-m-Y', strtotime($row->date))}}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button id="refreshBtn" class="btn btn-primary float-right">Force Refresh</button>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
        const myButton = document.querySelector('#refreshBtn');
        myButton.addEventListener('click', () => {
            // Send a POST request to the controller function
            fetch('/getData')
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    // Update the DOM with the data
                    var dynamicHtml = '';

                    // Loop through the data and generate dynamic HTML
                    $.each(data.data.headers, function(index, item) {
                        dynamicHtml += `
                            <th class="text-center">${item}</th>
                `;
                    });

                    // Update the content of the myDiv placeholder with the dynamic HTML
                    $('#thUp').html(dynamicHtml);
                    var dynamicHtmlTable = '';

                    // Loop through the data and generate dynamic HTML
                    $.each(data.data.rows, function(index, item) {
                        dynamicHtmlTable += `<tr>
                            <td>${item.id}</td>
                            <td>${item.fname}</td>
                            <td>${item.lname}</td>
                            <td>${item.email}</td>
                            <td>${new Date(item.date).toLocaleDateString("en-US")}</td>
                            </tr>
    `;
                    });

                    // Update the content of the myDiv placeholder with the dynamic HTML
                    $('#tableBody').html(dynamicHtmlTable);
                });
        });
    </script>
</x-app-layout>