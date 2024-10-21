<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Photo') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your profile photo.") }}
        </p>
    </header>

    <form method="post" action="{{route('profile.photo')}}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="profile_image" :value="__('Profile Photo')" />
            <div class="flex flex-col items-start mt-1">
                <img id="preview-image"
                     src="{{ auth()->user()->image ? Auth::user()->imageUrl() : 'https://via.placeholder.com/150' }}"
                     alt="Profile Image Preview"
                     style="width:100px;height:100px;border-radius:50%"
                     class="h-12 w-12 rounded-full mr-3">
                <input type="file" id="profile_image" name="image" accept="image/*" class="mt-3 block w-full text-gray-500 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" onchange="previewImage(event)">
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('profile_image')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'photo-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Photo updated.') }}</p>
            @endif
        </div>
    </form>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('preview-image');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</section>
