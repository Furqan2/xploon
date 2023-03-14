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
    <script type="text/javascript" src="{{ URL::asset('js/refreshData.js') }}"></script>
</x-app-layout>