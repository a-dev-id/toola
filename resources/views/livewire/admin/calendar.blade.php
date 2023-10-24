@section('title', 'Calendar')
@push('css')
<style>
    .ui-datepicker {
        z-index: 1050 !important;
    }

</style>
@endpush

@push('js')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            timeZone: 'Asia/Singapore',
            initialView: 'timeGridWeek',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            businessHours: {
                daysOfWeek: [ 0, 1, 2, 3, 4, 5, 6],
                startTime: '08:00',
                endTime: '23:00',
            },
            slotMinTime:'08:00',
            slotMaxTime:'23:00',
            height: 'auto',
            buttonText: {
                today: 'Today',
                month: 'Month',
                week: 'Week',
                day: 'Day',
            },
            nowIndicator: true,
        });
        calendar.render();
    });
</script>

<script>
    $('.customers').select2({
        dropdownParent: $('#appointment')
    });
</script>

<script>
    $( function() {
        $(".datepicker").datepicker({
        numberOfMonths: 2,
        showButtonPanel: true
        });
    });
</script>
@endpush

<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>@yield('title')</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" wire:navigate>Home</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <!-- Bookmark Start-->
                    <div class="bookmark">
                        <ul>
                            <li>
                                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#appointment" aria-controls="appointment">
                                    Add appointment <i class="fa-solid fa-plus ms-2"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <!-- Bookmark Ends-->
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    {{-- offcanvas --}}
    <div class="offcanvas offcanvas-end show" data-bs-backdrop="static" tabindex="-1" id="appointment" aria-labelledby="appointmentLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="appointmentLabel">New appointment</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form>
                <div class="mb-2">
                    <label class="col-form-label">Username</label>
                    <select class="customers col-sm-12">
                        <option value="">- choose something -</option>
                        <option value="AL">Alabama</option>
                        <option value="WY">Wyoming</option>
                        <option value="WY">Peter</option>
                        <option value="WY">Hanry Die</option>
                        <option value="WY">John Doe</option>
                    </select>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-form-label">Booking date</label>
                    <div class="col-sm-12">
                        <div class="input-group">
                            <input class="datepicker-here form-control datepicker" type="text" placeholder="select the date">
                        </div>
                    </div>
                </div>
                <div class="position-absolute bottom-0 mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>