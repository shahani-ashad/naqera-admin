<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Property
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('properties.update', $property) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                        <input type="text" name="title" value="{{ old('title', $property->title) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                            <input type="text" name="city" value="{{ old('city', $property->city) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                            <input type="text" name="type" value="{{ old('type', $property->type) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Purpose</label>
                            <select name="purpose" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm">
                                @foreach (['Book Now', 'Naqera Lease', 'For Sale'] as $option)
                                    <option value="{{ $option }}" {{ old('purpose', $property->purpose) === $option ? 'selected' : '' }}>
                                        {{ $option }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Price (SAR)</label>
                            <input type="number" step="0.01" name="price" value="{{ old('price', $property->price) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Host Name</label>
                            <input type="text" name="host_name" value="{{ old('host_name', $property->host_name) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Host Phone</label>
                            <input type="text" name="host_phone" value="{{ old('host_phone', $property->host_phone) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tourism License Number</label>
                        <input type="text" name="tourism_license_number" value="{{ old('tourism_license_number', $property->tourism_license_number) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm">
                            @foreach (['pending_review' => 'Pending Review', 'published' => 'Published', 'rejected' => 'Rejected', 'suspended' => 'Suspended'] as $value => $label)
                                <option value="{{ $value }}" {{ old('status', $property->status) === $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center gap-3 pt-2">
                        <button type="submit" class="bg-emerald-600 text-white font-medium px-5 py-2.5 rounded-lg hover:bg-emerald-700">
                            Save Changes
                        </button>
                        <a href="{{ route('properties.index') }}" class="text-gray-600 hover:underline text-sm">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>