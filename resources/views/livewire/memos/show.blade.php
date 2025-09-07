<?php

use function Livewire\Volt\{state, mount};
use App\Models\Memo;

state(['memo' => null]);

mount(function (Memo $memo) {
    $this->memo = $memo;
});

$delete = function () {
    $this->memo->delete();
    $this->redirect('/memos', navigate: true);
};

?>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="text-2xl font-bold mb-4">{{ $memo->title }}</h1>
                <div class="text-sm text-gray-500 mb-4">
                    作成日: {{ $memo->created_at->format('Y年m月d日 H:i') }}
                </div>
                <div class="prose max-w-none mb-6">
                    {!! nl2br(e($memo->body)) !!}
                </div>
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('memos.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        戻る
                    </a>
                    <a href="{{ route('memos.edit', $memo) }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        編集
                    </a>
                    <button wire:click="delete" wire:confirm="本当に削除しますか？"
                        class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        削除
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
