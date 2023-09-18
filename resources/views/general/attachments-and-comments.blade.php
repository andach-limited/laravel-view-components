@if (count($model->attachmentsAndComments()))
    <x-card title="Attachments and Comments" class="mt-4">
        @foreach ($model->attachmentsAndComments() as $item)
            {!! Blade::render($item['display_html']) !!}
        @endforeach
    </x-card>
@endif

<x-card title="Add Attachment and/or Comment" class="mt-4">
    <x-form-textarea label="Add New Comment" name="new_comment"/>
    <x-form-input type="file" label="Add Attachment" name="new_attachment"/>
</x-card>
