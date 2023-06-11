{{-- Message --}}
@if (Session::has('success'))
<div id="toast-default" class="flex items-center  p-3 mt-2 text-gray-500 bg-green-200 rounded-lg shadow  " role="alert">
  <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg  ">
    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
  </div>
  <div class="ml-3 text-sm font-normal">{{ session('success') }}</div>
</div>

@endif
@if (Session::has('error'))
<div id="toast-default" class="flex items-center  p-3 mt-2 text-gray-500 bg-red-200 rounded-lg shadow  " role="alert">
  <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-300 rounded-lg  ">
    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
  </div>
  <div class="ml-3 text-sm font-normal">{{ session('error') }}</div>
</div>
<!--
<div id="alert" class="flex p-4 mb-4 bg-red-100 border-t-4 border-red-500 dark:bg-red-200" role="alert">
  <svg class="flex-shrink-0 w-5 h-5 text-red-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
  </svg>
  <div class="ml-3 font-medium text-red-700">
    {{ session('error') }}
  </div>
</div>
-->
@endif
<!--ERROR CATCH-->
@if ($errors->any())
<div>
  <div id="alert" class="flex p-4 mb-4 bg-red-100 border-t-4 border-red-500 dark:bg-red-200" role="alert">
    <ul class="list-none">
      @foreach ($errors->all() as $error)
      <li class="flex">
        <svg class="flex-shrink-0 w-5 h-5 text-red-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
        </svg>
        <div class="ml-3 font-medium text-red-700">{{ $error }}</div>
      </li>
      @endforeach
    </ul>
  </div>
</div>
@endif

<script>
  // Script For Close alert
  setTimeout(() => {
    const box = document.getElementById('toast-default');
    box.style.display = 'none';
  }, 2500)

</script>
