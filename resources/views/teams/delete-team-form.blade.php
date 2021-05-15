<x-jet-action-section>
    <x-slot name="title">
        {{ __('Eliminar equipo') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Elimina definitivamente este equipo.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Una vez que se elimina un equipo, todos sus recursos y datos se eliminarán de forma permanente. Antes de eliminar este equipo, descargue cualquier dato o información sobre este equipo que desee conservar.') }}
        </div>

        <div class="mt-5">
            <x-jet-danger-button wire:click="$toggle('confirmingTeamDeletion')" wire:loading.attr="disabled">
                {{ __('Eliminar equipo') }}
            </x-jet-danger-button>
        </div>

        <!-- Delete Team Confirmation Modal -->
        <x-jet-confirmation-modal wire:model="confirmingTeamDeletion">
            <x-slot name="title">
                {{ __('Eliminar equipo') }}
            </x-slot>

            <x-slot name="content">
                {{ __('¿Estás seguro de que deseas eliminar este equipo? Una vez que se elimina un equipo, todos sus recursos y datos se eliminarán de forma permanente.') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingTeamDeletion')" wire:loading.attr="disabled">
                    {{ __('Cancelar') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="deleteTeam" wire:loading.attr="disabled">
                    {{ __('Eliminar Equipo') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>
    </x-slot>
</x-jet-action-section>
