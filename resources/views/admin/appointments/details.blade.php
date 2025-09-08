<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Details Booking') }}
            </h2>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                 
              
                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ Storage::url($appointment->product->thumbnail) }} " alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Product Interest</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $appointment->product->name }}</h3>
                        </div>
                    </div>  
                </div>

                <hr class="my-5">

                <div class="grid grid-cols-2 gap-5">
                    <div class="flex flex-col gap-y-4">
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Name</p>
                            <h3 class="text-indigo-950 text-xl font-bold">
                                {{ $appointment->name }}
                            </h3>
                        </div>
        
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Email</p>
                            <h3 class="text-indigo-950 text-xl font-bold">
                                {{ $appointment->email }}
                            </h3>
                        </div>
        
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Phone</p>
                            <h3 class="text-indigo-950 text-xl font-bold">
                                +{{ $appointment->phone }}
                            </h3>
                        </div>
                    </div>
                    <div class="flex flex-col gap-y-4">
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Brief</p>
                            <h3 class="text-indigo-950 text-xl font-bold">
                                {{ $appointment->brief }}
                            </h3>
                        </div>
        
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Budget</p>
                            <h3 class="text-indigo-950 text-xl font-bold">
                                ${{ number_format($appointment->budget, 0, ',', '.') }}
                            </h3>
                        </div>
        
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Meeting Date At</p>
                            <h3 class="text-indigo-950 text-xl font-bold">
                                {{ $appointment->meeting_at->format('M d, y') }}
                            </h3>
                        </div>

                    </div>
                </div>

                <hr class="my-5">

                <a href="#" class="text-center font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                    Follow Up Customer
                </a>
 
            </div>
        </div>
    </div>
</x-app-layout>
