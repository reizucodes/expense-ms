<div id="delete-{{$category->id}}" class="modal">
  <div class="relative w-full max-w-md max-h-full">
    <div class=" text-center">
      <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-${color}-100 sm:mx-0 sm:h-10 sm:w-10">
        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
        </svg>
      </div>
      <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
          Are you sure?
        </h3>
        <div class="mt-2">
          <p class="text-sm text-gray-500">
            This action cannot be undone.
          </p>
        </div>
      </div>
      <div class="text-right mt-2">
        <a href="" rel="modal:close" class="inline-flex items-center px-3 py-2 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest shadow-lg bg-gray-100 hover:bg-gray-200 hover:text-gray-600 disabled:opacity-25 transition ease-in-out duration-150">Cancel</a>
        <form class="inline-block" action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="submit" class="ml-2 inline-flex items-center px-3 py-2 border border-transparent rounded-md font-semibold text-xs text-gray-600 uppercase tracking-widest shadow-md bg-red-300 hover:bg-red-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer" rel="modal:close" value="Delete">
        </form>
      </div>
    </div>
  </div>
</div>
