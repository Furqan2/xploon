<div>
    <x-slot name="header">
        <div class="md:flex md:items-center md:justify-between md:space-x-5">
            <div class="flex items-start space-x-5">
                <div class="flex-shrink-0">
                    <div class="relative">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Users') }}
                        </h2>
                    </div>
                </div>

            </div>
        </div>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:datatable
                    searchable="name,email"
                    include="id, name, email, created_at"
                    dates="created_at"
                />
            </div>
        </div>
    </div>
</div>