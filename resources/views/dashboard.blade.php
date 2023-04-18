
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Contact
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($contacts as $contact)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $contact->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $contact->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $contact->contact }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('contacts.show', $contact) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                                <form method="POST" action="{{ route('contacts.delete', $contact) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type submit class="appearance-none border-none font-medium text-red-600 hover:underline">
                                        Remove
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" colspan="4" align="center" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                There are no contacts available yet.
                            </th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-2">
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
