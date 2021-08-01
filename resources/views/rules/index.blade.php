<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rules') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-2">
            <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 space-x-2">
                <!-- Heroicon name: solid/check -->
                <svg aria-hidden="true" data-prefix="far" data-icon="plus-square" class="h=5 w-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M352 240v32c0 6.6-5.4 12-12 12h-88v88c0 6.6-5.4 12-12 12h-32c-6.6 0-12-5.4-12-12v-88h-88c-6.6 0-12-5.4-12-12v-32c0-6.6 5.4-12 12-12h88v-88c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v88h88c6.6 0 12 5.4 12 12zm96-160v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48zm-48 346V86c0-3.3-2.7-6-6-6H54c-3.3 0-6 2.7-6 6v340c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"/></svg>
                <div>
                    Create
                </div>
            </button>

            <table
                class="bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full divide-y divide-gray-200 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        ID
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Email
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Bucket
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Path
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody>
                <!-- Odd row -->
                @forelse ($rules as $rule)
                    <tr class="odd:bg-white even:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $rule->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $rule->email }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $rule->bucket }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $rule->path }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="space-x-2 flex">
                                <a href="{{ route('rules.edit', $rule->id) }}"
                                   class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form method="POST" action="{{ route('rules.destroy', $rule->id) }}">
                                    @csrf
                                    @method('DELETE')


                                    <a href="{{ route('logout') }}" class="text-indigo-600 hover:text-indigo-900"
                                       onclick="event.preventDefault();
                                                confirm('Are you sure?') && this.closest('form').submit();">
                                        {{ __('Delete') }}
                                    </a>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="odd:bg-white even:bg-gray-50">
                        <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            No rules found
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $rules->links() }}
        </div>
    </div>
</x-app-layout>
