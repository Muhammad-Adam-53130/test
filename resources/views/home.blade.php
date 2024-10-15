<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            hello, {{ $name ?? 'no data' }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <h2 class="bg-white p-6 text-center uppercase font-black text-3xl">Home</h2>
                <div class="container mx-auto p-6">
                    <div class="max-w-md mx-auto"> <!-- Smaller container for the form -->
                        <form action="{{ route('home') }}" method="GET" class="flex flex-col items-center space-y-4">
                            <input type="text" name="name" placeholder="Enter your name"
                                value="{{ old('name', $name) }}"
                                class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 ease-in-out text-center">
                            <button type="submit"
                                class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-200 ease-in-out">
                                Submit
                            </button>
                            <button type="button" onclick="resetForm()" style="padding: 10px; background-color: transparent; border: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                                </svg>
                            </button>                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function resetForm() {
        let baseUrl = window.location.origin + window.location.pathname;
        window.location.href = baseUrl;
    }
</script>
