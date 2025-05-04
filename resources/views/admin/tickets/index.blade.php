<x-app-layout>
    @push('links')
    <x-app-datalink></x-app-datalink>
    @endpush

    <div class="content-wrapper w-100">
        <div class="container d-block mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center">
                                        <a class="btn btn-outline-primary" data-toggle="modal" data-target="#new-ticket">
                                            @lang('locale.new', ['param'=>__('locale.ticket', ['suffix'=>'', 'prefix'=>''])]) <i class="typcn icon typcn-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row grid-margin mb-2">
                                @if (!empty(session('message')))
                                <div class="col-12">
                                    <div class="alert alert-success" role="alert">
                                        <strong>@lang('locale.success')</strong>
                                        {{ session('message') }}
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="row overflow-auto">
                                <div class="col-12">
                                    <table cellspacing="0" class="table table-striped" id="order-listing" width="100%">
                                        <thead class="bg-primary">
                                            <th class="text-white">#</th>
                                            <th class="text-white">@lang('locale.created_at')</th>
                                            <th class="text-white">@lang('locale.ref')</th>
                                            <th class="text-white">@lang('locale.line', ['suffix'=>'', 'prefix'=>''])</th>
                                            @if(isauthorize([1]))
                                            <th class="text-white">@lang('locale.created_by')</th>
                                            @endif
                                            <th class="text-white">@lang('locale.amount')</th>
                                            <th class="text-white">@lang('locale.action', ['suffix'=>'s'])</th>
                                        </thead>
                                        <tbody>
                                            @foreach($tickets as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</td>
                                                <td>{{ $item->ref }}</td>
                                                <td>{{ $item->line->city_from." | ".$item->line->city_to }}</td>
                                                @if(isauthorize([1]))
                                                <td>{{ $item->creator->firstname ." ". $item->creator->name }}</td>
                                                @endif
                                                <td>{{ moneyFormat($item->amount) }}</td>
                                                <td>
                                                    <div style="display: inline-block">
                                                        @if(isauthorize([1, 2]))
                                                        <a class="btn btn-primary" href="{{ route('tickets.edit', $item->id) }}">
                                                            <i class="typcn icon typcn-edit"></i>
                                                        </a>                                                        
                                                        @endif
                                                        <a class="btn btn-warning" href="{{ route('tickets.show', $item->id) }}" title="@lang('locale.details')">
                                                            <i class="typcn icon typcn-eye"></i>
                                                        </a>                                                        
                                                    </div>
                                                    @if(isauthorize([1]))
                                                    <form action="{{ route('tickets.destroy', $item->id) }}" style="display: inline-block" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" onclick="if(!confirm('@lang('locale.do_you_confirm')')){ return false }">
                                                            <i class="typcn typcn-trash"></i>
                                                        </button>
                                                    </form>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <td colspan="5">TOTAL DES VENTES DE TICKETS</td>
                                            <td colspan="2" class="bg-primary text-white">{{ moneyFormat($tickets->sum('amount')) }}</td>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-new-ticket :lines="$lines"></x-new-ticket>
    @push('scripts')
    <x-app-datascript></x-app-datascript>
    @endpush
</x-app-layout>
