<div class="col-span-6 sm:col-span-4">
    <jet-label for="{{ $field->snake() }}" value="{{ $field->studly() }}" />
    <jet-image-input id="{{ $field->snake() }}" v-model="form.{{ $field->snake()  }}" class="mt-1 block w-full" />
    <jet-input-error :message="form.errors.{{ $field->snake() }}" class="mt-2" />
</div>
