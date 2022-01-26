<div class="text-center">
   Filtrera på:
    <select class="form-select form-select-sm
    appearance-none
    px-1
    py-1
    pr-6
    text-sm
    border border-solid border-gray-300
    rounded
    m-0
    mb-1">
        <option value="">--- Ort ---</option>
        @foreach($places as $p)
            <option value="{{ $p->id }}">{{ $p->municipality }}</option>
        @endforeach
    </select>
</div>
