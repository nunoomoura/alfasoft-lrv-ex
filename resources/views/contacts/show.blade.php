<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contact - {{ $contact->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Validation Errors -->
                    <x-messages class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('contacts.update', $contact) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-label :value="__('ID:')" />

                            <div>{{ $contact->id }}</div>
                        </div>

                        <!-- Name -->
                        <div class="mt-4">
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $contact->name)" required />
                        </div>


                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $contact->email)" required />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="contact" :value="__('Contact')" />

                            <x-input id="contact" class="block mt-1 w-full" type="tel" name="contact" :value="old('contact', $contact->contact)" required />
                        </div>

                        <div class="mt-4">
                            <x-label :value="__('Created:')" />

                            <div>{{ $contact->updated_at }}</div>
                        </div>

                        <div class="mt-4">
                            <x-label :value="__('Last updated:')" />

                            <div>{{ $contact->updated_at }}</div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">{{ __('Update') }}</x-button>
                            <x-button type="button" class="ml-3" onclick="document.getElementById('deleteForm').submit()">{{ __('Delete') }}</x-button>
                        </div>
                    </form>
                    <form id="deleteForm" method="POST" action="{{ route('contacts.delete', $contact) }}">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
