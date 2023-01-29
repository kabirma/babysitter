@extends('front.layout.app')

@section('content')
    @include('front.customer.sidebar')
    <div class="col-sm-8 card">
        <div class="col-sm-12 card-body">
            <h4>Schedule</h4>
            <hr>
            @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    <i class="fa fa-check"></i> {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger text-center">
                    <i class="fa fa-times"></i> {{ Session::get('error') }}
                </div>
            @endif
            @php
                $customer = Auth::guard('customer')->user();
                $schedule=unserialize($customer->schedule);
            @endphp
            <form method="post" action="{{ route('schedule_submit') }}" class="row">
                @csrf
                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $week_day=['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
                        @endphp
                        @for ($j = 0; $j < 7; $j++)
                            <tr>
                                <td>{{$week_day[$j]}}
                                    <input type="hidden" name="day[]" value="{{$week_day[$j]}}">
                                </td>
                                <td class="select-border">
                                    <select name="start_time[]" id="" class="form-control basic-select">
                                        <option value="" selected>Select Time</option>
                                        @for ($i = 1; $i <= 24; $i++)
                                            <option value="{{$i}}" @if(isset($schedule[$week_day[$j]]) && $schedule[$week_day[$j]]['start_time']==$i) selected @else @endif>{{ $i . ':00' }}</option>
                                        @endfor
                                    </select>
                                </td>
                                <td class="select-border">
                                    <select name="end_time[]" id="" class="form-control basic-select">
                                        <option value="" selected>Select Time</option>
                                        @for ($i = 1; $i <= 24; $i++)
                                            <option value="{{$i}}" @if(isset($schedule[$week_day[$j]]) && $schedule[$week_day[$j]]['end_time']==$i) selected @else @endif>{{ $i . ':00' }}</option>
                                        @endfor
                                    </select>
                                </td>
                            </tr>
                        @endfor

                    </tbody>
                </table>
                <div class="col-sm-4 offset-sm-4">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Update Schedule</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </section>
@endsection
