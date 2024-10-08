<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 py-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-3xl font-semibold text-gray-800 mb-4">Medicine Details</h1>
        
        <div class="bg-gray-50 border border-gray-200 rounded-lg shadow-sm">
            <!-- Medicine Header -->
            <div class="border-b border-gray-200">
                <div class="px-4 py-5 sm:px-6 flex items-center">
                    <!-- Medicine Image -->
                    <img src="{{ asset('storage/' . $medicine->image) }}" alt="{{ $medicine->name }}" class="w-20 h-20 rounded-full object-cover mr-4">
                    <h2 class="text-2xl font-semibold text-gray-800">{{ $medicine->name }}</h2>
                </div>
            </div>
            
            <!-- Medicine Details -->
            <div class="px-4 py-5 sm:px-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <p class="text-gray-700"><strong>Category:</strong> {{ $medicine->category->name ?? 'N/A' }}</p>
                    <p class="text-gray-700"><strong>Supplier:</strong> {{ $medicine->supplier->name ?? 'N/A' }}</p>
                    <p class="text-gray-700"><strong>Quantity:</strong> {{ $medicine->quantity }}</p>
                    <p class="text-gray-700"><strong>Expiry Date:</strong> {{ $medicine->expiry_date }}</p>
                    <p class="text-gray-700 text-xl font-medium"><strong>Price:</strong> ${{ number_format($medicine->price, 2) }}</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-4 border-t border-gray-200 bg-gray-50 px-4 py-4 sm:px-6">
                @if(Auth::user()->role == 'admin')
                    <a href="{{ route('medicines.edit', $medicine->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-600 text-white font-medium rounded-md shadow-sm hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50 transition duration-150">
                        Edit
                    </a>
                    <form action="{{ route('medicines.destroy', $medicine->id) }}" method="POST" class="inline-flex">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 text-white font-medium rounded-md shadow-sm hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 transition duration-150" onclick="return confirm('Are you sure you want to delete this purchase?');">
                            Delete
                        </button>
                    </form>
                @endif
                <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white font-medium rounded-md shadow-sm hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 transition duration-150">
                    Back to List
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
