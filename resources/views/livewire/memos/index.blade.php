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
