@if ($logs->count())
    @foreach ($logs as $log)
    <tr>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $log->causer->name ?? 'System' }}</td>
        <td class="px-6 py-4 text-sm text-gray-500">{{ $log->description }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $log->created_at->format('Y-m-d H:i:s') }}</td>
    </tr>
    @endforeach
@else
    <tr>
        <td colspan="3" class="text-center py-4">Tidak ada aktivitas log.</td>
    </tr>
@endif
