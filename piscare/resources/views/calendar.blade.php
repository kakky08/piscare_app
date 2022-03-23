@extends('app')
@section('content')
    @include('components.navbar')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <main class="col-md-9 col-lg-10 px-md-4 py-4">

                <p>{{ $test }}</p>
                <div class="card">
                <div class="card-header">Test vuejs-datepicker</div>
                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">Start Date</label>
                            <div class="col-md-6">
                                <datepicker-component name="start_date" defaultdate="{{ \Carbon\Carbon::now()->format("Y/m/d") }}"  />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date2" class="col-md-4 col-form-label text-md-right">End Date</label>
                            <div class="col-md-6">
                                <datepicker-component name="end_date" defaultdate="{{ \Carbon\Carbon::now()->addYears("1")->addDay("-1")->format("Y/m/d") }}"/>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input type="text" name="dummy" style="display:none;">
                                <button type="submit" class="btn btn-primary">
                                    登録
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
                <div class="card">
                    <div class="card-header text-center">
                        <a href="{{ url('calendar/?date=' . $calendar->getPreviousMonth()) }}"
                            class="btn btn-outline-secondary float-left">
                            前の月
                        </a>
                        <span>{{ $calendar->getTitle() }}</span>
                        <a href="{{ url('calendar/?date=' . $calendar->getNextMonth()) }}"
                            class="btn btn-outline-secondary float-right">
                            次の月
                        </a>
                    </div>
                    <div class="card-body">
                        {!! $calendar->render() !!}
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
