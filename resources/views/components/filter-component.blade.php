<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
        <form action="" method="post">
            @csrf
            <select name="category" id="category">
                <option value="">Select category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}
                    </option>
                @endforeach
            </select>
            <select name="type" id="type">
                <option value="">Select type</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ old('type') == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}</option>
                @endforeach
            </select>
            <label class="pl-3" for="date_from"><b>Date from</b></label>
            <input name="date_from" id="date_from" type="date">

            <label class="pl-3" for="date_to"><b>Date to</b></label>
            <input name="date_to" id="date_to" type="date">

            <input class="ml-3" name="most_popular" id="most_popular" type="checkbox">
            <label for="most_popular"><b>Sort by popularity</b></label>
            
            <input class="p-2 ml-3" type="submit" value="Filter">
        </form>
    </div>
</div>