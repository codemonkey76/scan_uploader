<x-jet-form-section submit="updateRule">
    <x-slot name="title">
        {{ __('Edit Rule') }}
    </x-slot>
    <x-slot name="description">
        {{ __('Update the rule information') }}
    </x-slot>
    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email address') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.lazy="rule.email" autocomplete="email" />
            <x-jet-input-error for="rule.email" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="bucket" value="{{ __('Bucket') }}" />
            <x-jet-input id="bucket" type="text" class="mt-1 block w-full" wire:model.lazy="rule.bucket" autocomplete="bucket" />
            <x-jet-input-error for="rule.bucket" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="region" value="{{ __('Region') }}" />
            <x-jet-input id="region" type="text" class="mt-1 block w-full" wire:model.lazy="rule.region" autocomplete="region" />
            <x-jet-input-error for="rule.region" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="key" value="{{ __('Access Key ID') }}" />
            <x-jet-input id="key" type="text" class="mt-1 block w-full" wire:model.lazy="rule.key" autocomplete="key" />
            <x-jet-input-error for="key" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="secret" value="{{ __('Secret Key') }}" />
            <x-jet-input id="secret" type="text" class="mt-1 block w-full" wire:model.lazy="rule.secret" autocomplete="secret" />
            <x-jet-input-error for="secret" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="path" value="{{ __('Path') }}" />
            <x-jet-input id="path" type="text" class="mt-1 block w-full" wire:model.lazy="rule.path" autocomplete="path" />
            <x-jet-input-error for="path" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="mimeType" value="{{ __('Mime Type') }}" />
            <x-jet-input id="mimeType" type="text" class="mt-1 block w-full" wire:model.lazy="rule.mimeType" autocomplete="mimeType" />
            <x-jet-input-error for="mimeType" class="mt-2" />
        </div>
    </x-slot>
    <x-slot name="actions">
        <x-jet-secondary-button type="button" wire:click="back" class="mr-3">
            {{ __('Back') }}
        </x-jet-secondary-button>
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
