<x-admin>
    <div class="row">
        @foreach ($charts as $chart)
            <div class="col-6">
                {!! $chart->container() !!}
            </div>
        @endforeach
    </div>
    {!! $charts['chart1']->script() !!}
    {!! $charts['chart2']->script() !!}
</x-admin>
