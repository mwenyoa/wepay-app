<x-app-layout>
    <div class="container mx-5">
        <form method="POST" action="{{ route('create-merchant.store') }}" class="min-h-screen flex flex-col min-w-[50] sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            @csrf
            <h4 class="m-3">Merchant Registration</h4>
            <div class="mt-4">
                    <x-input-label for="name">Name</x-input-label>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="description">Description:</x-input-label>
                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description"  required />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

                <div class="mt-4">
                    <!-- <x-input-label for="legal_id">Legal Entity ID</x-input-label> -->
                    <x-text-input id="legal_entity_id" class="block mt-1 w-full" type="hidden" name="legal_entity_id" value="{{ Auth::user()->legal->legal_entity_id }}" required hidden />
                    <x-input-error :messages="$errors->get('legal_entity_id')" class="mt-2" />
                </div>
            <div class="mt-4">
                <x-primary-button class="ml-4">{{__('Create Merchant')}}</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
