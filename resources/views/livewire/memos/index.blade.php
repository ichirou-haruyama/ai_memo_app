<?php

use function Livewire\Volt\{state};
use App\Models\Memo;

state([
    'memos' => fn() => Memo::where('user_id', auth()->id())
        ->orderBy('created_at', 'desc')
        ->get(),
]);

?>

<div>
    <div class="mb-4">
        <a href="{{ route('memos.create') }}"
            class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            新規作成
        </a>
    </div>
    <div class="space-y-2">
        @foreach ($memos as $memo)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('memos.show', $memo) }}" class="hover:text-blue-500">
                        {{ $memo->title }}
                    </a>
                </div>
            </div>
        @endforeach

        @if ($memos->isEmpty())
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    メモがありません。
                </div>
            </div>
        @endif
    </div>
</div>
