<div>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div x-data="{ isOpen: @entangle('isOpen') }"
         x-show="isOpen"
         x-cloak
         class="fixed inset-0 z-10 overflow-y-auto"
         aria-labelledby="modal-title"
         role="dialog"
         aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

            <div x-show="isOpen"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"
                 aria-hidden="true"></div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                  aria-hidden="true">&#8203;</span>


            <div x-show="isOpen"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="px-4 pt-5 pb-4 bg-gray-100 sm:p-6 sm:pb-4">
                    <h3 class="text-lg font-bold leading-6 text-gray-900"
                        id="modal-title">
                        Create User
                    </h3>
                </div>
                <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                    <div>
                        @include('includes.partials.errors')
                        <div class="mt-2">
                            <form id="createUser"
                                  wire:submit.prevent="save"
                                  class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">
                                        Name
                                    </label>
                                    <div class="mt-1">
                                        <input wire:model.defer="name"
                                               type="text"
                                               required
                                               class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">
                                        Email address
                                    </label>
                                    <div class="mt-1">
                                        <input wire:model.defer="email"
                                               id="email"
                                               name="email"
                                               type="email"
                                               autocomplete="email"
                                               required
                                               class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-6">
                                    <div>
                                        <label for="password"
                                               class="block text-sm font-medium text-gray-700">
                                            Password
                                        </label>
                                        <div class="mt-1">
                                            <input id="password"
                                                   wire:model.defer="password"
                                                   name="password"
                                                   type="password"
                                                   placeholder="*********"
                                                   autocomplete="current-password"
                                                   required
                                                   class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">
                                            Confirm Password
                                        </label>
                                        <div class="mt-1">
                                            <input type="password"
                                                   placeholder="*********"
                                                   wire:model.defer="password_confirmation"
                                                   required
                                                   class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label for="photo"
                                           class="block text-sm font-medium text-gray-700">
                                        Photo
                                        <x-loading target="photo" />
                                    </label>
                                    <div class="mt-2">
                                        <label for="photo"
                                               class="flex items-center cursor-pointer">
                                            @if ($photo)
                                            <img src="{{ $photo->temporaryUrl() }}"
                                                 class="object-cover w-12 h-12 overflow-hidden bg-gray-100 rounded-full">
                                            @else
                                            <span class="w-12 h-12 overflow-hidden bg-gray-100 rounded-full">
                                                <svg class="w-full h-full text-gray-300"
                                                     fill="currentColor"
                                                     viewBox="0 0 24 24">
                                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                </svg>
                                            </span>
                                            @endif

                                            <div class="px-3 py-2 ml-5 text-sm font-medium leading-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Change
                                            </div>
                                        </label>
                                        <input type="file"
                                               id="photo"
                                               accept="image/*"
                                               class="hidden"
                                               wire:model="photo">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-100 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit"
                            form="createUser"
                            class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Save
                    </button>
                    <button type="button"
                            wire:click="$set('isOpen', false)"
                            class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>