<x-app-layout>
    <x-slot name="header">
        <h1 class="h1">
            {{ __('Create Product') }}
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('catalogues.index') }}">{{ __('Catalogues') }}</a>
                </li>
                <li class="breadcrumb-item"><a class="max-text-20ch"
                        href="{{ route('catalogues.show', $catalogue->id) }}">{{ $catalogue->catalogue_name }} </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Create Product') }}</li>
            </ol>
        </nav>
    </x-slot>

    <div class="card p-5">
        <h3 class="h3 fw-bold mb-48">{{ __('Form Create Product') }}</h3>
        <div class="">
            <form action="{{ route('catalogues.products.store', $catalogue->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="space-y-6">
                    <div class="mb-3">
                        <label for="product_name" class="form-label">{{ __('Product Name*') }}</label>
                        <input type="text" name="product_name" value="{{ old('product_name') }}" class="form-control"
                            id="product_name" required>
                        <x-input-error class="mt-2" :messages="$errors->get('product_name')" />
                    </div>

                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">{{ __('Thumbnail*') }}</label>
                        <input type="url" name="thumbnail" class="form-control" id="thumbnail" required>
                        <span>{{ __('Input using a CDN-hosted image URL') }}</span>
                        <x-input-error class="mt-2" :messages="$errors->get('thumbnail')" />
                    </div>

                    <div class="mb-3">
                        <label for="product_url" class="form-label">{{ __('Product URL*') }}</label>
                        <input type="url" name="product_url" value="{{ old('product_url') }}" class="form-control"
                            id="product_url" required>
                        <x-input-error class="mt-2" :messages="$errors->get('product_url')" />
                    </div>

                    <div class="mb-3">
                        <label for="original_price" class="form-label">{{ __('Original Price*') }}</label>
                        <input type="number" name="original_price" value="{{ old('original_price') }}"
                            class="form-control" id="original_price" required>
                        <x-input-error class="mt-2" :messages="$errors->get('original_price')" />
                    </div>

                    <div class="mb-3">
                        <label for="discounted_price" class="form-label">{{ __('Discounted Price') }}</label>
                        <input type="number" name="discounted_price" value="{{ old('discounted_price') }}"
                            class="form-control" id="discounted_price">
                        <x-input-error class="mt-2" :messages="$errors->get('discounted_price')" />
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('catalogues.show', $catalogue->id) }}" class="btn btn-light">
                            {{ __('Back') }}
                        </a>
                        <div class="d-flex gap-3">
                            <button type="reset" class="btn btn-outline-primary">
                                {{ __('Reset') }}
                            </button>
                            <button class="btn btn-primary" type="submit">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
