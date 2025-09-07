<?php

use function Livewire\Volt\{state, rules};

state([
    'title' => '',
    'body' => '',
]);

rules([
    'title' => 'required|max:50',
    'body' => 'required|max:2000',
]);

$save = function () {
    $validated = $this->validate();

    auth()->user()->memos()->create($validated);

    $this->redirect('/memos', navigate: true);
};

?>

<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
    <form wire:submit="save" class="space-y-4">
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">タイトル</label>
            <input type="text" wire:model="title" id="title"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="メモのタイトルを入力">
            @error('title')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="body" class="block text-sm font-medium text-gray-700">本文</label>
            <textarea wire:model="body" id="body" rows="6"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="メモの内容を入力"></textarea>
            @error('body')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center justify-end">
            <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                保存
            </button>
        </div>
    </form>
</div>
