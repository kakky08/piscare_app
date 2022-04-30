<div class="col-md-6 row">
    <div class="test">
        <datepicker-component
            name="start_date"
            defaultdate="{{ isset($select)
                                ? \Carbon\Carbon::createMidnightDate($year, $month, $record_day)->format("Y/m/d")
                                : \Carbon\Carbon::now()->format("Y/m/d") }}"
        >
        </datepicker-component>
    </div>
</div>
