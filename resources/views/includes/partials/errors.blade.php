@if ($errors->any())
<div class="p-4 rounded-md bg-red-50">
    <div class="flex">
        <div class="flex-shrink-0">
            <!-- Heroicon name: x-circle -->
            <svg class="w-5 h-5 text-red-400"
                 xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 20 20"
                 fill="currentColor">
                <path fill-rule="evenodd"
                      d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                      clip-rule="evenodd" />
            </svg>
        </div>
        <div class="ml-3">
            <h3 class="text-sm font-medium leading-5 text-red-800">
                There were {{ count($errors->all()) }} errors with your submission
            </h3>
            <div class="mt-2 text-sm leading-5 text-red-700">
                <ul class="pl-5 list-disc">
                    @foreach ($errors->all() as $error)
                    <li class="mb-1">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endif