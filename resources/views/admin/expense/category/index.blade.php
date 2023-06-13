<x-app-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Expense Category') }}
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
                  Category
                </th>
                <th scope="col" class="px-6 py-3">
                  Description
                </th>
                <th scope="col" class="px-6 py-3">
                  Created At
                </th>
                <th scope="col" class="px-6 py-3">
                  Action
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach($categories as $category)
              <tr class="bg-white border-b hover:bg-gray-50 ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                  {{$category->name}}
                </th>
                <td class="px-6 py-4">
                  {{$category->description}}
                </td>
                <td class="px-6 py-4">
                  {{$category->created_at}}
                </td>
                <td class="px-6 py-4">
                  <div class="grid-cols-2">
                    <!-- Edit Button -->
                    <a href="{{route('admin.category.edit', $category->id)}}" rel="modal:open" class="font-medium text-blue-600 hover:underline">Edit</a>
                    <!-- Delete Button -->
                    <a href="#delete-{{$category->id}}" rel="modal:open" class="ml-2 font-medium text-red-600  hover:underline">Delete</a>
                    <!-- Delete Modal -->
                    @include('admin.expense.category.delete', ['id' => $category->id])
                  </div>
                </td>
        </div>
        </tr>
        @endforeach
        </tbody>
        </table>
      </div>
      <div class="mt-4 float-right text-sm">
        <a href="{{route('admin.category.create')}}" rel="modal:open" class="ml-2 mr-1 font-medium text-green-600  hover:underline"> Add Category
        </a>
      </div>
    </div>
  </div>
</x-app-layout>