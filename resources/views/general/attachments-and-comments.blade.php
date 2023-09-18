@if (count($model->attachmentsAndComments()))
    <x-andach-card title="Attachments and Comments" class="mt-4">
        @foreach ($model->attachmentsAndComments() as $item)
            {!! Blade::render($item['display_html']) !!}
        @endforeach
    </x-andach-card>
@endif

<x-andach-card title="Add Attachment and/or Comment" class="mt-4">
    <x-form-textarea label="Add New Comment" name="new_comment"/>
    <x-form-input type="file" label="Add Attachment" name="new_attachment"/>
</x-andach-card>
