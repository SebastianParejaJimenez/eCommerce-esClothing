
<div class="main-modal fixed w-full h-100  inset-0 z-50 overflow-auto flex justify-center items-center animated fadeIn faster"
style="background: rgba(0,0,0,.7);">
<div class="border border-gray-500 shadow-lg modal-container bg-white w-7/12 h-[97%] max-h-[97%] mx-auto rounded shadow-lg z-50 overflow-auto">
    <div class="modal-content py-4 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3">
            <p class="text-2xl font-bold">Cambiar Informacion de Usuario</p>
            <div class="modal-close cursor-pointer z-50">
                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18"
                    height="18" viewBox="0 0 18 18">
                    <path
                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                    </path>
                </svg>
            </div>
        </div>
        <!--Body-->
        <div class="my-5 max-h-full">
            @if (Auth::user())
                @livewire('profile.update-profile-information-form')
            @endif
        </div>
    </div>
</div>
</div>
