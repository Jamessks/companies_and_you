<select
    {{ $attributes->merge(['class' => 'cursor-pointer rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600']) }}
    multiple>
    @foreach ($relationsData as $key => $item)
        <option value={{ $item->id }} @selected($selectedOption != null ? $selectedOption->contains($item->id) : '')>
            {{ $item->name }}</option>
    @endforeach
</select>
