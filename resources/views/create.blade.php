@include('layout.doctype')
@include('layout.nav')

@if(session('status'))
    <div class="alert alert-success">{{session('status')}}</div>
@endif
<form class="container" action="{{ url('create') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <div class="text-light mt-4">
                <h1 class="text-5xl">Add Product</h1>
            </div>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input type="text" name="title" id="username" autocomplete="username"
                                       value="{{ old('title') }}"
                                       class="block flex-1 border-0 bg-white py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                       placeholder="Enter the title of the product">
                            </div>
                            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price</label>
                    <div class="mt-2">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input type="text" name="price" id="username" autocomplete="username"
                                   value="{{ old('price') }}"
                                   class="block flex-1 border-0 bg-white py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                   placeholder="Enter the title of the product">
                        </div>
                        @error('price') <span class="text-danger">{{ $message }}</span> @enderror

                    </div>
                </div>
                <div class="col-span-full">
                    <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                    <div class="mt-2">
                        <textarea id="about" name="description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old('description') }}</textarea>
                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about yourself.</p>
                </div>

                <div class="col-span-full">
                    <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                    <div class="mt-2 flex items-center gap-x-3">
                        <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                        </svg>
                        <button type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Change</button>
                    </div>
                </div>

                <div class="mb-3">
                    <label>UpdateFile/Image</label>
                    <input type="file" name="image" class="form-control" />
                </div>

                <div class="col-span-full">
                    <!-- Add your "Save" button here -->
                    <button type="submit" class="inline-block bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                        Save
                    </button>
                    <a href="/" class="btn btn-primary">Back</a>
                </div>

            </div>
        </div>
    </div>
</form>

@include('layout.footer')
