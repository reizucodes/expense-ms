<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Users') }}
    </h2>
  </x-slot>
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    @include('alert')
  </div>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <!-- Users Table -->
      <div class="mt-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200 ">
              <tr>
                <th scope="col" class="px-6 py-3">
                  Name
                </th>
                <th scope="col" class="px-6 py-3">
                  Email
                </th>
                <th scope="col" class="px-6 py-3">
                  User Type
                </th>
                <th scope="col" class="px-6 py-3">
                  Action
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr class="bg-white border-b   hover:bg-gray-50 ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                  {{$user->name}}
                </th>
                <td class="px-6 py-4">
                  {{$user->email}}
                </td>
                @php
                if($user->role == 1) $role = 'admin';
                else $role = 'user';
                @endphp
                <td class="px-6 py-4">
                  {{$role}}
                </td>
                <td class="px-6 py-4 ">
                  <div class="grid-cols-2">
                    <!-- Edit Button -->
                    <a href="{{route('admin.users.edit', $user->id)}}" rel="modal:open" class="font-medium text-blue-600 hover:underline">Edit</a>
                    <!-- Delete Button -->
                    <a href="#delete-{{$user->id}}" rel="modal:open" class="ml-2 font-medium text-red-600  hover:underline">Delete</a>
                    <!-- Delete Modal -->
                    @include('admin/users/delete', ['id' => $user->id])
                  </div>
                </td>
        </div>
        </tr>
        @endforeach
        </tbody>
        </table>
      </div>
      <div class="mt-4 float-right">
        <a href="{{route('admin.users.create')}}" rel="modal:open" class="inline-flex items-center px-3 py-2 border border-transparent rounded-md font-semibold text-xs text-gray-600 uppercase tracking-widest shadow-md bg-green-300 hover:bg-green-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150"> Create
        </a>
      </div>
    </div>
  </div>
  </div>
  <!--/container-->
</x-app-layout>
