<div>

    <x-slot name="header">

        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-600 leading-tight">
                Lista de Productos
            </h2>

            {{-- botón para agregar producto --}}
            <x-button-enlace class="ml-auto" href="{{ route('admin.products.create') }}">
                Agregar Producto
            </x-button-enlace>
        </div>

    </x-slot>

    {{-- container para que quede dentro de nuestro contenedor --}}
    <div class="container py-12">

        <x-table-responsive>

            {{-- Buscador --}}
            <div class="px-6 py-4">
                <x-jet-input wire:model="search" class="w-full" type="text" placeholder="Ingrese producto que quiere buscar?" />
            </div>

            {{-- tabla --}}
            @if ($products->count())
                <table class="w-full leading-normal">
                    <thead>
                        <tr>

                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Categoría
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Estado
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Precio
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Editar
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>

                                {{-- foto y nombre del producto --}}
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            {{-- <img class="w-full h-full rounded-full object-cover" src="{{ Storage::url($product->images->first()->url) }}" alt="{{ $product->name }}" /> --}}
                                            <img class="w-full h-full rounded-full object-cover" src="{{ $product->images->first()->url }}" alt="{{ $product->name }}" />
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $product->name }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                {{-- Categoría del producto --}}
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $product->subcategory->category->name }}
                                    </p>
                                </td>

                                {{-- Estado del producto --}}
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">

                                    @switch($product->status)
                                        @case(1)
                                            <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                                <span class="relative">
                                                    Borrador
                                                </span>
                                            </span>
                                            @break
                                        @case(2)
                                            <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                <span class="relative">
                                                    Publicado
                                                </span>
                                            </span>
                                            @break
                                        @default
                                    @endswitch

                                </td>

                                {{-- Precio del producto --}}
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $product->price }} USD
                                    </p>
                                </td>

                                {{-- Editar --}}
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        <a href="{{ route('admin.products.edit', $product) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                    </p>
                                </td>



                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div>
                    <p class="px-6 py-4 text-center text-gray-500 text-sm">
                        No hay ningún registro con ese nombre.
                    </p>
                </div>
            @endif

            {{-- links de pagination --}}
            @if ($products->hasPages())
                <div class="px-6 py-4">
                    {{ $products->links() }}
                </div>
            @endif

        </x-table-responsive>

    </div>


</div>
