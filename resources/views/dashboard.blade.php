<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <p class="text-sm text-gray-500">Total Properties</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $totalProperties }}</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <p class="text-sm text-gray-500">Pending Review</p>
                    <p class="text-3xl font-bold text-yellow-600 mt-1">{{ $pendingReview }}</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <p class="text-sm text-gray-500">Published</p>
                    <p class="text-3xl font-bold text-green-600 mt-1">{{ $published }}</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <p class="text-sm text-gray-500">Total Users</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $totalUsers }}</p>
                </div>
            </div>

            @if ($pendingReview > 0)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-semibold text-gray-900">Attention needed</h3>
                            <p class="text-sm text-gray-500 mt-1">
                                {{ $pendingReview }} {{ Str::plural('property', $pendingReview) }} waiting for review.
                            </p>
                        </div>
                        <a href="{{ route('properties.index') }}" class="text-sm font-medium text-emerald-700 hover:underline">
                            Review now →
                        </a>
                    </div>
                </div>
            @endif

            <div class="bg-white rounded-lg shadow-sm border border-gray-200 mt-8">
            <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                <h3 class="font-semibold text-gray-900">Recent Properties</h3>
                <a href="{{ route('properties.index') }}" class="text-sm text-emerald-700 hover:underline">
                    View all →
                </a>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">City</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Edit</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($recentProperties as $property)
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $property->title }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $property->city }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">SAR {{ number_format($property->price, 0) }}</td>
                            <td class="px-6 py-4 text-sm">
                                @php
                                    $badgeColors = [
                                        'published' => 'bg-green-100 text-green-800',
                                        'pending_review' => 'bg-yellow-100 text-yellow-800',
                                        'rejected' => 'bg-red-100 text-red-800',
                                        'suspended' => 'bg-gray-200 text-gray-800',
                                    ];
                                @endphp
                                <span class="px-2 py-1 text-xs rounded-full {{ $badgeColors[$property->status] ?? 'bg-gray-100 text-gray-800' }}">
                                    {{ ucwords(str_replace('_', ' ', $property->status)) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <a href="{{ route('properties.edit', $property) }}" class="text-emerald-700 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        </div>
    </div>
</x-app-layout>