   <x-app-layout>
       <x-slot:heading>
           Edit Company Form
       </x-slot:heading>
       <form method="POST" action="{{ route('companies.update', $company->id) }}">
           @csrf
           @method('PUT')
           <div class="space-y-12">
               <div class="border-b border-gray-900/10 pb-12">
                   <h2 class="text-base font-semibold leading-7 text-gray-900">Edit company: {{ $company->name }}</h2>
                   <p class="mt-1 text-sm leading-6 text-gray-600">Provide some basic details about the company.</p>
                   <div class="block space-y-6 mt-6">
                       <x-form.form-field>
                           <x-form.form-label for="title">Company Name</x-form.form-label>
                           <div class="mt-2">
                               <x-form.form-input type="text" name="name" id="name"
                                   placeholder="MyCompany.inc" required
                                   value="{{ $company->name }}"></x-form.form-input>
                               @error('title')
                                   <x-form.form-error>{{ $message }}</x-form.form-error>
                               @enderror
                           </div>
                       </x-form.form-field>
                       <x-form.form-field>
                           <x-form.form-label for="address">Company Address</x-form.form-label>
                           <div class="mt-2">
                               <x-form.form-input type="text" name="address" id="address"
                                   placeholder="123 Main St, New York, NY 10001" required
                                   value="{{ $company->address }}"></x-form.form-input>
                               @error('address')
                                   <x-form.form-error>{{ $message }}</x-form.form-error>
                               @enderror
                           </div>
                       </x-form.form-field>
                       <x-form.form-field>
                           <x-form.form-label for="website">Company Website</x-form.form-label>
                           <div class="mt-2">
                               <x-form.form-input type="text" name="website" id="website"
                                   placeholder="https://mycompany.com" required
                                   value="{{ $company->website }}"></x-form.form-input>
                               @error('website')
                                   <x-form.form-error>{{ $message }}</x-form.form-error>
                               @enderror
                           </div>
                       </x-form.form-field>
                       <x-form.form-field>
                           <x-form.form-label for="email">Company Email</x-form.form-label>
                           <div class="mt-2">
                               <x-form.form-input type="email" name="email" id="email"
                                   placeholder="mycompany.hr@domain.com" required
                                   value="{{ $company->email }}"></x-form.form-input>
                               @error('email')
                                   <x-form.form-error>{{ $message }}</x-form.form-error>
                               @enderror
                           </div>
                       </x-form.form-field>
                   </div>
               </div>
           </div>

           <div class="mt-6 flex items-center justify-between gap-x-6">
               <div>
                   <x-basic.interchangeable-btn form="company-delete" type="submit" types="1"
                       element="button">Delete</x-basic.interchangeable-btn>
               </div>
               <div>
                   <x-basic.interchangeable-btn href="{{ url()->previous() }}"
                       types="0">Cancel</x-basic.interchangeable-btn>
                   <x-basic.interchangeable-btn type="submit" types="2"
                       element="button">Save</x-basic.interchangeable-btn>
               </div>
           </div>
       </form>
       <form id="company-delete" action="{{ route('companies.destroy', $company->id) }}" method="POST"
           onsubmit="return confirm('Are you sure you want to delete this company?');">
           @csrf
           @method('DELETE')
       </form>
   </x-app-layout>
