<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Información del Perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Aca puedes actualizar la informacion de tu perfil como Nombre de usuario o Correo.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Nombre de Usuario') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="ciudad" value="{{ __('Numero de Telefono') }}" />
            <x-jet-input id="ciudad" type="text" class="mt-1 block w-full" wire:model.defer="state.numero_telefono" />
            <x-jet-input-error for="ciudad" class="mt-2" />
        </div>
        <!-- Ciudad -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="ciudad" value="{{ __('Pais') }}" />
            <x-jet-input id="ciudad" type="text" class="mt-1 block w-full" wire:model.defer="state.pais" />
            <x-jet-input-error for="ciudad" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="ciudad" value="{{ __('Ciudad') }}" />
            <x-jet-input id="ciudad" type="text" class="mt-1 block w-full" wire:model.defer="state.ciudad" />
            <x-jet-input-error for="ciudad" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="ciudad" value="{{ __('Codigo Postal') }}" />
            <x-jet-input id="ciudad" type="text" class="mt-1 block w-full" wire:model.defer="state.codigo_postal" />
            <x-jet-input-error for="ciudad" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="ciudad" value="{{ __('Direccion') }}" />
            <x-jet-input id="ciudad" type="text" class="mt-1 block w-full" wire:model.defer="state.direccion" />
            <x-jet-input-error for="ciudad" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            <div class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <div>
                    <span class="font-medium">Actualizado!</span>
                </div>
            </div>
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Guardar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
