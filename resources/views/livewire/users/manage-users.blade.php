<div>
    @livewire('users.create-user')
    @livewire('users.edit-user')
    <header>
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-between">
                <h1 class="text-3xl font-bold leading-tight text-gray-900">
                    Users
                </h1>
                <button type="button"
                        wire:click="createUser"
                        class="inline-flex items-center px-4 py-2 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5 mr-3 -ml-1"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 4v16m8-8H4" />
                    </svg>
                    Create user
                </button>
            </div>
        </div>
    </header>
    <main class="mt-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="text-left text-gray-700 bg-gray-200">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-bold tracking-wider uppercase">

                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-bold tracking-wider uppercase">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-bold tracking-wider uppercase">
                                            Email
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-bold tracking-wider uppercase">
                                            Date Created
                                        </th>
                                        <th scope="col"
                                            class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-10 h-10 rounded-full"
                                                         src="{{ $user->getAvatar() }}"
                                                         alt="">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-base font-bold text-gray-900">
                                                {{ $user->name }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-base font-bold text-blue-400">
                                                {{ $user->email }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            {{ $user->created_at->format('F d Y') }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                            <button type="button"
                                                    wire:click="editUser('{{ $user->id }}')"
                                                    class="inline-flex items-center px-1 py-1 text-sm text-gray-500 bg-white border rounded-md shadow-sm hover:bg-gray-100">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="w-4 h-4"
                                                     viewBox="0 0 20 20"
                                                     fill="currentColor">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                            </button>
                                            <button type="button"
                                                    wire:click="editUser('{{ $user->id }}')"
                                                    class="inline-flex items-center px-1 py-1 text-sm text-yellow-500 bg-white border rounded-md shadow-sm hover:bg-gray-100">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="w-4 h-4"
                                                     viewBox="0 0 20 20"
                                                     fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                          d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z"
                                                          clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                            <button type="button"
                                                    x-data="{}"
                                                    x-on:click="if( confirm('Are you sure you want to delete this?') ){$wire.deleteUser('{{ $user->id }}')}"
                                                    class="inline-flex items-center px-1 py-1 text-sm text-red-500 bg-white border rounded-md shadow-sm hover:bg-gray-100">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="w-4 h-4"
                                                     viewBox="0 0 20 20"
                                                     fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                          d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                          clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5"
                                            class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-base font-bold text-gray-900">
                                                No users available.
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
</div>