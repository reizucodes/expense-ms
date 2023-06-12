<div id="{{route('admin.users.edit', $user->id)}}">
  <div class="relative w-full max-w-md max-h-full">
    <div class="px-6 py-2 text-center">
      <h2 class="text-lg font-medium text-gray-500">Edit User</h2>
      <form action="{{route('admin.users.update', $user->id)}}" method="POST">
        @csrf
        @method("PATCH")
        <!-- Name-->
        <div class=" text-left">
          <x-input-label for="name" :value="__('Name')" />
          <x-text-input id="name" class="block mt-1 w-full  hover:border-gray-500" type="text" name="name" :value="old('name',$user->name)" required autofocus autocomplete="name" />
          <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- Email Address -->
        <div class="mt-4 text-left">
          <x-input-label for="email" :value="__('Email')" />
          <x-text-input id="email" class="block mt-1 w-full  hover:border-gray-500" type="email" name="email" :value="old('email',$user->email)" required autocomplete="username" />
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Password -->
        <div class="mt-4 text-left">
          <x-input-label for="password" :value="__('Password')" />
          <x-text-input id="password" class="block mt-1 w-full  hover:border-gray-500" type="password" name="password" required autocomplete="new-password" />
          <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <!-- User Type -->
        <div class="inline-block relative h-full w-full mt-4 text-left">
          <x-input-label for="role" :value="__('User Role')" />
          <select id="role" name="role" class="block  mt-1 appearance-none w-full text-gray-500 bg-white border-gray-300  hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
            <option selected value={{$user->role}}>{{$user->role == 1 ? 'admin' : 'user'}}</option>
            <option value="1">admin</option>
            <option value="0">user</option>
          </select>
        </div>
        <!-- Submit and Cancel-->
        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="inline-flex items-center px-3 py-2 border border-transparent rounded-md font-semibold text-xs text-gray-600 uppercase tracking-widest shadow-md hover:shadow-lg bg-blue-300 hover:bg-blue-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
            {{ __('Save') }}
          </button>
          <a href="" rel="modal:close" class="ml-2 inline-flex items-center px-3 py-2 border border-transparent rounded-md font-semibold text-xs text-gray-600 uppercase tracking-widest shadow-md hover:shadow-lg bg-red-300 hover:bg-red-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
            {{ __('Cancel') }}
          </a>
        </div>
      </form>
    </div>
  </div>
</div>
