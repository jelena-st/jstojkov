<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if (Auth::check())
                @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
                    {{ __('Dashboard') }}
                @else
                    {{ __('My Bids') }}
                @endif
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('horse.list') }}" class="btn btn-danger mb-4">Go to Homepage</a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                            google.charts.load('current', {
                                'packages': ['corechart']
                            });
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {
                                var data = google.visualization.arrayToDataTable({!! $chartData !!});

                                var options = {
                                    title: 'Number of Bids per Day',
                                    hAxis: {
                                        title: 'Date',
                                        titleTextStyle: {
                                            color: '#333'
                                        }
                                    },
                                    vAxis: {
                                        title: 'Bids',
                                        minValue: 0
                                    },
                                    legend: {
                                        position: 'none'
                                    }
                                };

                                var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                                chart.draw(data, options);
                            }
                        </script>
                        <div id="chart_div" style="width: 100%; height: 500px;"></div>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th colspan="2">Horse</th>
                                    <th>Amount</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bids as $bid)
                                    <tr>
                                        <td>{{ $bid->id }}</td>
                                        <td>{{ $bid->horse->name }}</td>
                                        <td>
                                            <img src="{{ asset($bid->horse->image) }}" alt="horse"
                                                class="w-20 h-20 object-cover">
                                        </td>
                                        <td>{{ $bid->amount }}$</td>
                                        <td>{{ $bid->created_at->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                @endforeach
                                @if ($bids->isEmpty())
                                    <tr>
                                        <td colspan="11" class="text-center">No bids found.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
