<x-app-layout>
    <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <input type="hidden" name="sewa_id" id="sewa_id" value="{{ $sewa->id }}">
        <header class="shadow-lg sticky top-0 bg-white">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        @if ($sewa->jenis_sewa == 'sekali_jalan')
                            {{ __('Pengajuan sewa - Sekali jalan (Rp. ' . number_format($sewa->kapal->sewa_sekali_jalan, 2) . ' )') }}
                        @elseif($sewa->jenis_sewa == 'harian')
                            {{ __('Pengajuan sewa - Harian') }}
                        @else
                            {{ __('Pengajuan sewa - Per jam') }}
                        @endif
                    </h2>
                    <div>

                        <a href="{{ url()->previous() }}"
                            class="inline-flex justify-center py-2 px-4 border border-gray shadow-sm text-sm font-medium rounded-md text-gray focus:outline-none focus:ring-2 focus:ring-offset-2 mr-4">
                            Kembali
                        </a>

                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 mr-4">
                            Kirim
                        </button>


                    </div>
                </div>
        </header>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            <div class="md:grid mt-5 md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Detail pembayaran</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            This information will be processed so be careful what you create.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow sm:rounded-md sm:overflow-hidde">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                            <div class="col-span-6 sm:col-span-3">
                                <label for="nama_perusahaan" class="block text-sm font-medium text-gray-700">Nama
                                    perusahaan</label>
                                <input type="text" name="nama_perusahaan" id="nama_perusahaan"
                                    value="{{ $sewa->user->nama_perusahaan }}" disabled
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama penanggung
                                    jawab</label>
                                <input type="text" name="name" id="name" value="{{ $sewa->user->name }}" disabled
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            @if ($sewa->jenis_sewa == 'jam')
                                <div class="grid grid-cols-6 gap-6">

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="tanggal_sewa"
                                            class="block text-sm font-medium text-gray-700">Tanggal
                                            sewa</label>
                                        <input type="text" name="tanggal_sewa" id="tanggal_sewa"
                                            autocomplete="tanggal_sewa" value="{{ $sewa->tanggal_sewa }}" disabled
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="jam_sewa" class="block text-sm font-medium text-gray-700">Jam
                                            sewa</label>
                                        <input type="text" name="jam_sewa" id="jam_sewa" autocomplete="jam_sewa"
                                            value="{{ $sewa->jam_sewa }}" disabled
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="jam_selesai" class="block text-sm font-medium text-gray-700">Jam
                                            selesai</label>
                                        <input type="text" name="jam_selesai" id="jam_selesai"
                                            autocomplete="jam_selesai" value="{{ $sewa->jam_selesai }}" disabled
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                </div>
                            @else
                                <div class="grid grid-cols-6 gap-6">

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="tanggal_sewa"
                                            class="block text-sm font-medium text-gray-700">Tanggal
                                            sewa</label>
                                        <input type="text" name="tanggal_sewa" id="tanggal_sewa"
                                            autocomplete="tanggal_sewa" value="{{ $sewa->tanggal_sewa }}" disabled
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    @if ($sewa->jenis_sewa != 'sekali_jalan')
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="tanggal_selesai"
                                                class="block text-sm font-medium text-gray-700">Tanggal
                                                selesai</label>
                                            <input type="text" name="tanggal_selesai" id="tanggal_selesai"
                                                autocomplete="tanggal_selesai" value="{{ $sewa->tanggal_selesai }}"
                                                disabled
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    @else
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="jam_sewa" class="block text-sm font-medium text-gray-700">Jam
                                                sewa (WIB)</label>
                                            <input type="text" name="jam_sewa" id="jam_sewa" autocomplete="jam_sewa"
                                                value="{{ $sewa->jam_sewa }}" disabled
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    @endif
                                </div>
                            @endif

                            @if ($sewa->jenis_sewa == 'sekali_jalan')
                                <div>
                                    <label for="uang_muka" class="block text-sm font-medium text-gray-700">
                                        Uang muka
                                    </label>

                                    <div class="mt-1 mb-4 flex rounded-md shadow-sm">
                                        <span
                                            class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                            Rp.
                                        </span>
                                        <input type="hidden" name="uang_muka" id="uang_muka" value="84000000">
                                        <input type="text" name="uangMmuka" id="uangMuka"
                                            value="{{ number_format($sewa->uang_muka, 2) }}" disabled
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">

                                    </div>

                                    <p class="mt-2 text-sm text-gray-500">
                                        *Pembayaran uang muka dilakukan ketika sudah disetujui dari pihak perusahaan.
                                    </p>
                                </div>
                            @endif

                            <div>
                                <label for="note" class="block text-sm font-medium text-gray-700">
                                    Catatan
                                </label>
                                <div class="mt-1">
                                    <textarea id="note" name="note" rows="3"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                        placeholder="note for more informations"></textarea>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">
                                    Brief note for transaction.
                                </p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">
                                    Bukti pembayaran
                                </label>
                                <div
                                    class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">

                                        <div class="flex flex-wrap justify-center mb-6">
                                            <img class="img-preview max-w-sm h-auto shadow-lg rounded-lg" alt="" />
                                        </div>

                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                            viewBox="0 0 48 48" aria-hidden="true">
                                            <path
                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="mx-auto text-sm text-gray-600">
                                            <label for="image_url"
                                                class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span>Upload a file</span>
                                                <input id="image_url" name="image_url" type="file" accept="image/png"
                                                    class="sr-only" onChange="previewImage()">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">
                                            PNG, JPG, GIF up to 10MB
                                        </p>
                                    </div>
                                </div>
                                <x-jet-input-error for="image_url" class="mt-2" />
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <x-jet-section-border />

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 lg:flex lg:items-center lg:justify-between">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    <span class="block">Detail kapal</span>
                </h2>
            </div>

            <div class="md:grid mt-5 md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1 mr-12">
                    <div class="px-4 sm:px-0">

                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 rounded-md">
                            <div class="space-y-1 text-center">
                                <div class="flex flex-wrap justify-center mb-6">

                                    <img src="{{ asset('storage/' . $sewa->kapal->image_url) }}"
                                        class="img-preview max-w-sm h-auto shadow-lg rounded-lg" alt="" />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow sm:rounded-md sm:overflow-hidde">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama kapal</label>
                                <input type="text" name="name" id="name" value="{{ $sewa->kapal->name }}" disabled
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="jenis" class="block text-sm font-medium text-gray-700">Jenis</label>
                                <input type="text" name="jenis" id="jenis" value="{{ $sewa->kapal->jenis }}" disabled
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <x-jet-input-error for="jenis" class="mt-2" />
                            </div>

                            <div class="grid grid-cols-6 gap-6">

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="kapasitas" class="block text-sm font-medium text-gray-700">Kapasitas
                                        (GT)</label>
                                    <input type="number" min="1" name="kapasitas" id="kapasitas"
                                        value="{{ $sewa->kapal->kapasitas }}" disabled
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <x-jet-input-error for="kapasitas" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="panjang" class="block text-sm font-medium text-gray-700">Panjang
                                        (M)</label>
                                    <input type="number" min="1" name="panjang" id="panjang" autocomplete="panjang"
                                        value="{{ $sewa->kapal->panjang }}" disabled
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <x-jet-input-error for="panjang" class="mt-2" />
                                </div>
                            </div>
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">
                                    Description
                                </label>
                                <div class="mt-1">
                                    <textarea id="description" name="description" rows="3" disabled
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                        placeholder="Description for more informations">{{ $sewa->kapal->description }}</textarea>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">
                                    Brief description for new product.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @section('file-upload')
        <script>
            function previewImage() {
                const image = document.querySelector('#image_url');
                const imgPreview = document.querySelector('.img-preview');

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                };
            }
        </script>
    @stop

</x-app-layout>
