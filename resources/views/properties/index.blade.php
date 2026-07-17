<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Properties
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">City</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Host</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">License</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($properties as $property)
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $property->title }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $property->city }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $property->type }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $property->host_name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">SAR {{ number_format($property->price, 0) }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $property->tourism_license_number ?? '—' }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    @if ($property->status === 'published')
                                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Published</span>
                                    @elseif ($property->status === 'pending_review')
                                        <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">Pending Review</span>
                                    @elseif ($property->status === 'rejected')
                                        <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">Rejected</span>
                                    @else
                                        <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-800">{{ $property->status }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm space-x-2">
                                    <a href="{{ route('properties.edit', $property) }}" class="text-blue-700 hover:underline">Edit</a>
                                    @if ($property->status !== 'published')
                                        <form action="{{ route('properties.approve', $property) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-green-700 hover:underline">Approve</button>
                                        </form>
                                    @endif
                                    @if ($property->status !== 'rejected')
                                        <form action="{{ route('properties.reject', $property) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-red-700 hover:underline">Reject</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>