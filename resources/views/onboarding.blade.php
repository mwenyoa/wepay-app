<x-app-layout>
    <div class="container">
        <form method="POST" action="{{ route('legal-entity.store') }}">
            @csrf
            <div class="mt-4">
                    <x-input-label for="country">Country:</x-input-label>
                    <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" value="US" required />
         
            </div>

            <div class="mt-4">
                <x-input-label for="controller_email">Controller Email:</x-input-label>
                <x-text-input id="controller_email" class="block mt-1 w-full" type="email" name="controller[email]" value="{{ auth()->user()->email }}" required />
            </div>

                <!-- <div class="mt-4">
                    <x-input-label for="name">Name:</x-input-label>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name') }}" required />
                </div>

                <div class="mt-4">
                    <x-input-label for="description">Description:</x-input-label>
                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{ old('description') }}" required />
                </div>

                <div class="mt-4">
                    <x-input-label for="merchant_category_code">Merchant Category Code:</x-input-label>
                    <x-text-input id="merchant_category_code" class="block mt-1 w-full" type="text" name="merchant_category_code" value="{{ old('merchant_category_code') }}" required />
                </div> -->

            <div class="mt-4">
                <x-primary-button class="ml-4">{{__('On Board')}}</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>




<!-- 

Address
            <div class="mt-4">
                <x-input-label for="city">City:</x-input-label>
                <x-text-input id="city" class="block mt-1 w-full" type="text" name="address[city]" value="San Francisco" required />
            </div>

            <div class="mt-4">
                <x-input-label for="line1">Street Address:</x-input-label>
                <x-text-input id="line1" class="block mt-1 w-full" type="text" name="address[line1]" value="123 Fake Street" required />
            </div>

            <div class="mt-4">
                <x-input-label for="postal_code">Postal Code:</x-input-label>
                <x-text-input id="postal_code" class="block mt-1 w-full" type="text" name="address[postal_code]" value="94101" required />
            </div>

            <div class="mt-4">
                <x-input-label for="region">Region:</x-input-label>
                <x-text-input id="region" class="block mt-1 w-full" type="text" name="address[region]" value="CA" required />
            </div>

   
            <div class="mt-4">
                <x-input-label for="entity_name">Entity Name:</x-input-label>
                <x-text-input id="entity_name" class="block mt-1 w-full" type="text" name="entity_name" value="my business, LLC" required />
            </div>

            <div class="mt-4">
                <x-input-label for="primary_url">Primary URL:</x-input-label>
                <x-text-input id="primary_url" class="block mt-1 w-full" type="text" name="primary_url" value="" />
            </div>

            <div class="mt-4">
                <x-input-label for="country_of_formation">Country of Formation:</x-input-label>
                <x-text-input id="country_of_formation" class="block mt-1 w-full" type="text" name="entity_country_info[country_of_formation]" value="US" required />
            </div>

            <div class="mt-4">
                <x-input-label for="year_of_formation">Year of Formation:</x-input-label>
                <x-text-input id="year_of_formation" class="block mt-1 w-full" type="number" name="entity_country_info[year_of_formation]" value="1999" required />
            </div>

            <div class="mt-4">
                <x-input-label for="employer_identification_number">EIN:</x-input-label>
                <x-text-input id="employer_identification_number" class="block mt-1 w-full" type="text" name="entity_country_info[US][employer_identification_number]" value="" />
            </div>

            <div class="mt-4">
                <x-input-label for="legal_form">Legal Form:</x-input-label>
                <x-text-input id="legal_form" class="block mt-1 w-full" type="text" name="entity_country_info[US][legal_form]" value="limited_liability_company" required />
            </div>

    
            <div class="mt-4">
                <h2>Controller Information</h2>
            </div>

            <div class="mt-4">
                <x-input-label for="controller_city">Controller City:</x-input-label>
                <x-text-input id="controller_city" class="block mt-1 w-full" type="text" name="controller[address][city]" value="Beverly Hills" required />
            </div>

           
            <div class="mt-4">
                <x-input-label for="controller_country">Controller Country:</x-input-label>
                <x-text-input id="controller_country" class="block mt-1 w-full" type="text" name="controller[address][country]" value="US" required />
            </div>

      
            <div class="mt-4">
                <x-input-label for="controller_date_of_birth">Controller Date of Birth:</x-input-label>
                <x-text-input id="controller_date_of_birth" class="block mt-1 w-full" type="date" name="controller[date_of_birth]" value="1991-01-01" required />
            </div>
         


             Controller Email Verification
            <div class="mt-4">
                <x-input-label for="controller_email_verified">Controller Email Verified:</x-input-label>
                <x-text-input id="controller_email_verified" class="block mt-1 w-full py-4" type="checkbox" name="controller[email_is_verified]" value="1">{{ __('Select') }}</x-text-input>
            </div>


            <div class="mt-4">
                <x-input-label for="controller_first_name">Controller First Name:</x-input-label>
                <x-text-input id="controller_first_name" class="block mt-1 w-full" type="text" name="controller[name][first]" value="Foo" required />
            </div>

            <div class="mt-4">
                <x-input-label for="controller_last_name">Controller Last Name:</x-input-label>
                <x-text-input id="controller_last_name" class="block mt-1 w-full" type="text" name="controller[name][last]" value="Bar" required />
            </div>

            <div class="mt-4">
                <x-input-label for="controller_ssn">Controller SSN:</x-input-label>
                <x-text-input id="controller_ssn" class="block mt-1 w-full" type="text" name="controller[personal_country_info][US][social_security_number]" value="123-45-6789" />
            </div>
            <div class="mt-4">
                <x-input-label for="controller_phone">Controller Phone Number:</x-input-label>
                <x-text-input id="controller_phone" class="block mt-1 w-full" type="text" name="controller[phone][country_code]" value="+1" />
                <x-text-input id="controller_phone_number" class="block mt-1 w-full" type="text" name="controller[phone][phone_number]" value="555 555 5555" />
            </div>

            <div class="mt-4">
                <x-input-label for="controller_job_title">Controller Job Title:</x-input-label>
                <x-text-input id="controller_job_title" class="block mt-1 w-full" type="text" name="controller[job_title]" value="OWNER" required />
            </div>

            <div class="mt-4">
                <x-input-label for="controller_is_beneficial_owner">Controller Is Beneficial Owner:</x-input-label>
                <x-text-input id="controller_is_beneficial_owner" class="block mt-1 w-full py-4" type="checkbox" name="controller[is_beneficial_owner]" value="1" />
            </div>


            <div class="mt-4">
                <h2>Additional Representatives</h2>
            </div>

            <div class="mt-4">
                <x-input-label for="representative_1_first_name">Representative 1 First Name:</x-input-label>
                <x-text-input id="representative_1_first_name" class="block mt-1 w-full" type="text" name="additional_representatives[representative_1][first_name]" value="" />
            </div>

            <div class="mt-4">
                <x-input-label for="representative_1_last_name">Representative 1 Last Name:</x-input-label>
                <x-text-input id="representative_1_last_name" class="block mt-1 w-full" type="text" name="additional_representatives[representative_1][last_name]" value="" />
            </div>
