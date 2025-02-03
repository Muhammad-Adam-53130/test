@props(['id' => null, 'maxWidth' => null])

<!-- Modal Structure -->
<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>

    <!-- Modal Dialog -->
    <div class="modal-dialog" role="document" style="max-width: {{ $maxWidth ?? '500px' }};">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="text-sm text-gray-600 dark:text-gray-400">
                    {{ $content }}
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                {{ $footer }}
            </div>
        </div>
    </div>
</x-modal>
