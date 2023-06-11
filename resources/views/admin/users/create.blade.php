<div id={{route('admin.users.create')}}">
  <div class="relative w-full max-w-md max-h-full">

    <div class="p-6 pb-2 text-center">
      <h2 class="text-lg font-normal text-gray-800 dark:text-gray-400">Add User</h2>

      <form action="{{route('admin.users.store')}}" method="POST">
        @csrf
        <!-- Name-->
        <div class=" text-left">
          <x-input-label for="name" :value="__('Name')" />
          <x-text-input id="name" class="block mt-1 w-full  hover:border-gray-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
          <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- Email Address -->
        <div class="mt-4 text-left">
          <x-input-label for="email" :value="__('Email')" />
          <x-text-input id="email" class="block mt-1 w-full  hover:border-gray-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Password -->
        <div class="mt-4 text-left">
          <x-input-label for="password" :value="__('Password')" />
          <x-text-input id="password" class="block mt-1 w-full  hover:border-gray-500" type="password" name="password" required autocomplete="new-password" />
          <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <!-- Confirm Password -->
        <div class="mt-4 text-left">
          <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
          <x-text-input id="password_confirmation" class="block mt-1 w-full  hover:border-gray-500" type="password" name="password_confirmation" required autocomplete="new-password" />
          <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <!-- User Type -->
        <div class="inline-block relative h-full w-full mt-4 text-left">
          <x-input-label for="role" :value="__('User Role')" />
          <select id="role" name="role" class="block  mt-1 appearance-none w-full bg-white border-gray-300  hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
            <option selected>Select user type</option>
            <option value="1">admin</option>
            <option value="0">user</option>
          </select>
        </div>
        <!-- Submit and Cancel-->
        <div class="flex items-center justify-end mt-4">
          <button type="submit" class="ml-4 inline-flex items-center px-3 py-2 border border-transparent rounded-md font-semibold text-xs text-gray-600 uppercase tracking-widest shadow-md bg-green-300 hover:bg-green-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
            {{ __('Create User') }}
          </button>
          <a href="" rel="modal:close" class="ml-4 inline-flex items-center px-3 py-2 border border-transparent rounded-md font-semibold text-xs text-gray-600 uppercase tracking-widest shadow-md bg-red-300 hover:bg-red-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
            {{ __('Cancel') }}
          </a>
        </div>
      </form>
    </div>
  </div>
</div>
