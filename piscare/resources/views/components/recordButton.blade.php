<div>
    {{-- 新規作成処理の場合 --}}
    @if ($action === 'store')
        <form action="" class="row" id="form-record">
            @csrf
            <input type="hidden" value="{{ $date }}" name="date">
            <div class="row">
                <button
                    type="submit"
                    class="btn m-0 p-1 shadow-none"
                    name="flag_breakfast"
                    {{-- value="{{ $record->flag_breakfast }}" --}}
                    form="form-record"
                    formaction="{{ route('breakfast.store')}}"
                    formmethod="POST"
                >
                    <i class="fa fa-fish"></i>
                </button>
                <button
                    type="submit"
                    class="btn m-0 p-1 shadow-none"
                    name="flag_lunch"
                    {{-- value="{{ $record->flag_lunch }}" --}}
                    form="form-record"
                    formaction="{{ route('lunch.store')}}"
                    formmethod="POST"
                >
                    <i class="fa fa-fish"></i>
                </button>
                <button
                    type="submit"
                    class="btn m-0 p-1 shadow-none"
                    name="flag_dinner"
                    {{-- value="{{ $record->flag_dinner }}" --}}
                    form="form-record"
                    formaction="{{ route('dinner.store')}}"
                    formmethod="POST"
                >
                    <i class="fa fa-fish"></i>
                </button>
            </div>
        </form>
    @endif
    {{-- 更新処理の場合 --}}
    @if ($action === 'update')
        <form class="row" id="form-record">
            @csrf
            <input type="hidden" value="{{ $date }}" name="date">
            <div class="row">
                <button
                    type="submit"
                    class="btn m-0 p-1 shadow-none"
                    name="flag_breakfast"
                    {{-- value="{{ $record->flag_breakfast }}" --}}
                    form="form-record"
                    formaction="{{ route('breakfast.update')}}"
                    formmethod="POST"
                >
                    <i class="fa fa-fish"></i>
                </button>
                <button
                    type="submit"
                    class="btn m-0 p-1 shadow-none"
                    name="flag_lunch"
                    {{-- value="{{ $record->flag_lunch }}" --}}
                    form="form-record"
                    formaction="{{ route('lunch.update')}}"
                    formmethod="POST"
                >
                    <i class="fa fa-fish"></i>
                </button>
                <button
                    type="submit"
                    class="btn m-0 p-1 shadow-none"
                    name="flag_dinner"
                    {{-- value="{{ $record->flag_dinner }}" --}}
                    form="form-record"
                    formaction="{{ route('dinner.update')}}"
                    formmethod="POST"
                >
                    <i class="fa fa-fish"></i>
                </button>
            </div>
        </form>
    @endif

</div>
